<?php

namespace App\Http\Controllers;

use App\Services\DatabaseBackupService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class BackupController extends Controller
{
    public function __construct(protected DatabaseBackupService $backupService) {}

    public function create(): Response
    {
        try {
            $filename = $this->backupService->createBackup();

            return response('Database backup created successfully.', 200)
                ->header('X-Backup-File', $filename);
        } catch (\Exception $e) {
            return response('Failed to create backup: '.$e->getMessage(), 500);
        }
    }

    public function list(): JsonResponse
    {
        try {
            $backups = $this->backupService->getBackups();

            return response()->json($backups, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function download(Request $request): BinaryFileResponse|Response
    {
        try {
            $filename = $request->query('file');

            if (! $filename) {
                return response('Filename is required', 400);
            }

            $filePath = $this->backupService->downloadBackup($filename);

            return response()->download($filePath, $filename, [
                'Content-Type' => 'application/octet-stream',
            ]);
        } catch (\Exception $e) {
            return response('Download failed: '.$e->getMessage(), 500);
        }
    }

    public function delete(Request $request): JsonResponse
    {
        try {
            $filename = $request->input('filename');

            if (! $filename) {
                return response()->json(['error' => 'Filename is required'], 400);
            }

            $this->backupService->deleteBackup($filename);

            return response()->json(['message' => 'Backup deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
