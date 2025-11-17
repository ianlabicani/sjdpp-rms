<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DatabaseBackupService
{
    public function createBackup(): string
    {
        $backupDirectory = storage_path('backups');

        // Ensure backup directory exists
        if (! is_dir($backupDirectory)) {
            mkdir($backupDirectory, 0755, true);
        }

        $timestamp = Carbon::now()->format('Y-m-d_H-i-s');
        $filename = "backup_{$timestamp}.sql";
        $backupPath = "{$backupDirectory}/{$filename}";

        try {
            $backupContent = $this->generateBackup();

            // Write the backup to file
            file_put_contents($backupPath, $backupContent);

            // Verify file was created and has content
            if (! file_exists($backupPath) || filesize($backupPath) === 0) {
                throw new \Exception('Backup file was not created or is empty');
            }

            // Log the backup
            \Log::info("Database backup created successfully: {$filename}", [
                'size' => filesize($backupPath),
                'path' => $backupPath,
            ]);

            return $filename;
        } catch (\Exception $e) {
            // Clean up empty file if it exists
            if (file_exists($backupPath)) {
                unlink($backupPath);
            }

            \Log::error("Database backup failed: {$e->getMessage()}");

            throw $e;
        }
    }

    private function generateBackup(): string
    {
        $database = config('database.connections.mysql.database');
        $backup = "-- Database Backup\n";
        $backup .= '-- Generated at '.Carbon::now()->toDateTimeString()."\n";
        $backup .= "-- Database: {$database}\n\n";

        // Get all tables
        $tables = DB::select('SHOW TABLES');

        foreach ($tables as $table) {
            $tableName = array_values((array) $table)[0];

            // Get table structure
            $createTableResult = DB::select("SHOW CREATE TABLE {$tableName}");
            $backup .= "\n\n-- Table structure for table `{$tableName}`\n";
            $backup .= "DROP TABLE IF EXISTS `{$tableName}`;\n";
            $backup .= $createTableResult[0]->{'Create Table'}.";\n\n";

            // Get table data
            $rows = DB::table($tableName)->get();

            if (count($rows) > 0) {
                $backup .= "-- Data for table `{$tableName}`\n";

                foreach ($rows as $row) {
                    $values = [];
                    foreach ($row as $value) {
                        $values[] = $value === null ? 'NULL' : "'".addslashes($value)."'";
                    }
                    $columns = implode(', ', array_map(fn ($col) => "`{$col}`", array_keys((array) $row)));
                    $backup .= "INSERT INTO `{$tableName}` ({$columns}) VALUES (".implode(', ', $values).");\n";
                }
            }
        }

        return $backup;
    }

    public function getBackups(): array
    {
        $backupDirectory = storage_path('backups');

        if (! is_dir($backupDirectory)) {
            return [];
        }

        $files = array_diff(scandir($backupDirectory, SCANDIR_SORT_DESCENDING), ['..', '.']);
        $backups = [];

        foreach ($files as $file) {
            if (str_ends_with($file, '.sql')) {
                $filePath = "{$backupDirectory}/{$file}";
                $backups[] = [
                    'filename' => $file,
                    'size' => filesize($filePath),
                    'created_at' => filemtime($filePath),
                    'path' => $filePath,
                ];
            }
        }

        return $backups;
    }

    public function downloadBackup(string $filename): string
    {
        $backupDirectory = storage_path('backups');
        $filePath = "{$backupDirectory}/{$filename}";

        // Security: ensure the file is in the backups directory
        if (! str_starts_with(realpath($filePath) ?? '', realpath($backupDirectory) ?? '')) {
            throw new \Exception('Invalid backup file');
        }

        if (! file_exists($filePath)) {
            throw new \Exception('Backup file not found');
        }

        return $filePath;
    }
}
