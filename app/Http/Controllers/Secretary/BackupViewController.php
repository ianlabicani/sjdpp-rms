<?php

namespace App\Http\Controllers\Secretary;

use App\Http\Controllers\Controller;
use App\Services\DatabaseBackupService;

class BackupViewController extends Controller
{
    public function __construct(protected DatabaseBackupService $backupService) {}

    public function index()
    {
        $backups = $this->backupService->getBackups();

        return view('secretary.backup.index', compact('backups'));
    }
}
