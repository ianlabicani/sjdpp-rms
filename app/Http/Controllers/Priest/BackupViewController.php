<?php

namespace App\Http\Controllers\Priest;

use App\Http\Controllers\Controller;
use App\Services\DatabaseBackupService;

class BackupViewController extends Controller
{
    public function __construct(protected DatabaseBackupService $backupService) {}

    public function index()
    {
        $backups = $this->backupService->getBackups();
        return view('priest.backup.index', compact('backups'));
    }
}
