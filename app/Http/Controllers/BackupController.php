<?php

namespace App\Http\Controllers;

use App\Services\DatabaseBackupService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class BackupController extends Controller
{
    public function __construct(protected DatabaseBackupService $backupService) {}

    public function create(Request $request): RedirectResponse
    {
        try {
            $this->backupService->createBackup();

            $redirectRoute = $request->user()->hasRole('priest')
                ? 'priest.backup.index'
                : 'secretary.backup.index';

            return redirect()->route($redirectRoute)->with('success', 'Database backup created successfully.');
        } catch (\Exception $e) {
            $redirectRoute = $request->user()->hasRole('priest')
                ? 'priest.backup.index'
                : 'secretary.backup.index';

            return redirect()->route($redirectRoute)->with('error', 'Failed to create backup: '.$e->getMessage());
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
}
