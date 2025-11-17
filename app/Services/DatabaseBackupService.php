<?php

namespace App\Services;

use Carbon\Carbon;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

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

        $host = config('database.connections.mysql.host');
        $database = config('database.connections.mysql.database');
        $user = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');
        $port = config('database.connections.mysql.port', 3306);

        // Build mysqldump command
        $command = [
            'mysqldump',
            '--host='.$host,
            '--port='.$port,
            '--user='.$user,
        ];

        if ($password) {
            $command[] = '--password='.$password;
        }

        $command[] = $database;

        try {
            $process = new Process($command);
            $process->setTimeout(null);
            $process->run();

            if (! $process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

            // Write the backup to file
            file_put_contents($backupPath, $process->getOutput());

            // Log the backup
            \Log::info("Database backup created successfully: {$filename}");

            return $filename;
        } catch (\Exception $e) {
            \Log::error("Database backup failed: {$e->getMessage()}");
            throw $e;
        }
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

    public function deleteBackup(string $filename): bool
    {
        $backupDirectory = storage_path('backups');
        $filePath = "{$backupDirectory}/{$filename}";

        // Security: ensure the file is in the backups directory
        if (! str_starts_with(realpath($filePath) ?? '', realpath($backupDirectory))) {
            throw new \Exception('Invalid backup file');
        }

        if (file_exists($filePath)) {
            \Log::info("Database backup deleted: {$filename}");

            return unlink($filePath);
        }

        return false;
    }

    public function downloadBackup(string $filename): string
    {
        $backupDirectory = storage_path('backups');
        $filePath = "{$backupDirectory}/{$filename}";

        // Security: ensure the file is in the backups directory
        if (! str_starts_with(realpath($filePath) ?? '', realpath($backupDirectory))) {
            throw new \Exception('Invalid backup file');
        }

        if (! file_exists($filePath)) {
            throw new \Exception('Backup file not found');
        }

        return $filePath;
    }
}
