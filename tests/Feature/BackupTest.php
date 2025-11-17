<?php

use App\Models\Role;
use App\Models\User;
use App\Services\DatabaseBackupService;

beforeEach(function () {
    // Create roles if they don't exist
    if (! Role::where('name', 'priest')->exists()) {
        Role::create(['name' => 'priest']);
    }
    if (! Role::where('name', 'secretary')->exists()) {
        Role::create(['name' => 'secretary']);
    }
});

it('priest can trigger database backup', function () {
    $priestRole = Role::where('name', 'priest')->first();
    $user = User::factory()->create();
    $user->roles()->attach($priestRole);

    // Mock the backup service
    $mock = \Mockery::mock(DatabaseBackupService::class);
    $mock->shouldReceive('createBackup')->andReturn('backup_2025-01-01_00-00-00.sql');
    $this->app->instance(DatabaseBackupService::class, $mock);

    $response = $this->actingAs($user)->postJson(route('priest.backup.create'));

    expect($response->getStatusCode())->toBe(200);
});

it('secretary can trigger database backup', function () {
    $secretaryRole = Role::where('name', 'secretary')->first();
    $user = User::factory()->create();
    $user->roles()->attach($secretaryRole);

    // Mock the backup service
    $mock = \Mockery::mock(DatabaseBackupService::class);
    $mock->shouldReceive('createBackup')->andReturn('backup_2025-01-01_00-00-00.sql');
    $this->app->instance(DatabaseBackupService::class, $mock);

    $response = $this->actingAs($user)->postJson(route('secretary.backup.create'));

    expect($response->getStatusCode())->toBe(200);
});

it('unauthenticated user cannot backup database', function () {
    $response = $this->postJson(route('priest.backup.create'));

    expect($response->getStatusCode())->toBe(401);
});

it('can list backup files', function () {
    $priestRole = Role::where('name', 'priest')->first();
    $user = User::factory()->create();
    $user->roles()->attach($priestRole);

    // Mock the backup service
    $mock = \Mockery::mock(DatabaseBackupService::class);
    $mock->shouldReceive('getBackups')->andReturn([
        [
            'filename' => 'backup_2025-01-01_00-00-00.sql',
            'size' => 1024,
            'created_at' => now()->timestamp,
            'path' => storage_path('backups/backup_2025-01-01_00-00-00.sql'),
        ],
    ]);
    $this->app->instance(DatabaseBackupService::class, $mock);

    $response = $this->actingAs($user)->getJson(route('priest.backup.list'));

    expect($response->getStatusCode())->toBe(200);
    expect($response->json())->toBeArray();
});

it('can delete backup file', function () {
    $priestRole = Role::where('name', 'priest')->first();
    $user = User::factory()->create();
    $user->roles()->attach($priestRole);

    // Mock the backup service
    $mock = \Mockery::mock(DatabaseBackupService::class);
    $mock->shouldReceive('deleteBackup')->with('backup_2025-01-01_00-00-00.sql')->andReturn(true);
    $this->app->instance(DatabaseBackupService::class, $mock);

    $response = $this->actingAs($user)->postJson(route('priest.backup.delete'), [
        'filename' => 'backup_2025-01-01_00-00-00.sql',
    ]);

    expect($response->getStatusCode())->toBe(200);
    expect($response->json('message'))->toBe('Backup deleted successfully');
});
