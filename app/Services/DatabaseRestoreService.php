<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\DB;

class DatabaseRestoreService
{
    public function __construct(protected string $backupPath = 'backups') {}

    public function restore(string $filename): array
    {
        try {
            $backupDirectory = storage_path($this->backupPath);
            $filePath = "{$backupDirectory}/{$filename}";

            if (! file_exists($filePath)) {
                throw new Exception('Backup file not found: '.$filename);
            }

            if (! str_ends_with($filename, '.sql')) {
                throw new Exception('Invalid file type. Only .sql files are allowed.');
            }

            $fileSize = filesize($filePath);
            if ($fileSize > 52428800) { // 50MB limit
                throw new Exception('File size exceeds 50MB limit.');
            }

            $sql = file_get_contents($filePath);
            if (empty($sql)) {
                throw new Exception('Backup file is empty.');
            }

            // Validate basic SQL structure
            if (! preg_match('/^\s*(\/\*|--|#|DROP|CREATE|ALTER|INSERT|UPDATE|DELETE|SELECT)/im', $sql)) {
                throw new Exception('Invalid SQL file format.');
            }

            $pdo = DB::getPdo();

            // Disable foreign key checks during restore
            $pdo->setAttribute(\PDO::ATTR_AUTOCOMMIT, false);
            $pdo->exec('SET FOREIGN_KEY_CHECKS=0');

            // Execute restore
            $pdo->beginTransaction();

            try {
                // Remove all comment lines from the SQL
                $sqlLines = explode("\n", $sql);
                $cleanedLines = [];
                foreach ($sqlLines as $line) {
                    $trimmedLine = trim($line);
                    // Skip empty lines and comment lines
                    if (! empty($trimmedLine) && ! preg_match('/^(--|#|\/\*)/', $trimmedLine)) {
                        $cleanedLines[] = $trimmedLine;
                    }
                }
                $cleanedSql = implode(' ', $cleanedLines);

                // Split by semicolon, preserving quoted strings
                $parts = preg_split('/;(?=(?:[^\']*\'[^\']*\')*[^\']*$)/m', $cleanedSql);

                $statements = [];
                foreach ($parts as $part) {
                    $statement = trim($part);
                    if (! empty($statement)) {
                        $statements[] = $statement;
                    }
                }

                foreach ($statements as $statement) {
                    $pdo->exec($statement);
                }

                $pdo->commit();

                // Re-enable foreign key checks
                $pdo->exec('SET FOREIGN_KEY_CHECKS=1');
                $pdo->setAttribute(\PDO::ATTR_AUTOCOMMIT, true);

                return [
                    'success' => true,
                    'message' => 'Database restored successfully from '.$filename,
                    'statements_executed' => count($statements),
                    'file_size' => $fileSize,
                ];
            } catch (Exception $e) {
                if ($pdo->inTransaction()) {
                    $pdo->rollBack();
                }
                $pdo->exec('SET FOREIGN_KEY_CHECKS=1');
                throw $e;
            }
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => 'Restore failed: '.$e->getMessage(),
                'error' => $e->getMessage(),
            ];
        }
    }

    public function validateFile(string $filePath): array
    {
        try {
            if (! file_exists($filePath)) {
                return ['valid' => false, 'error' => 'File not found'];
            }

            if (! str_ends_with($filePath, '.sql')) {
                return ['valid' => false, 'error' => 'Invalid file type. Only .sql files are allowed.'];
            }

            $fileSize = filesize($filePath);
            if ($fileSize === 0) {
                return ['valid' => false, 'error' => 'Backup file is empty.'];
            }

            if ($fileSize > 52428800) {
                return ['valid' => false, 'error' => 'File size exceeds 50MB limit. Size: '.number_format($fileSize / 1024 / 1024, 2).' MB'];
            }

            $sql = file_get_contents($filePath, false, null, 0, 1000); // Read first 1000 bytes
            if (! preg_match('/^\s*(\/\*|--|#|DROP|CREATE|ALTER|INSERT|UPDATE|DELETE|SELECT)/im', $sql)) {
                return ['valid' => false, 'error' => 'Invalid SQL file format.'];
            }

            return [
                'valid' => true,
                'size' => $fileSize,
                'size_formatted' => number_format($fileSize / 1024, 2).' KB',
            ];
        } catch (Exception $e) {
            return ['valid' => false, 'error' => $e->getMessage()];
        }
    }
}
