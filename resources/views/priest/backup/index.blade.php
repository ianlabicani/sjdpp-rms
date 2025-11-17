@extends('priest.shell')

@section('priest-content')
    <div class="pt-20 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Database Backups</h1>
                <p class="text-gray-600">Manage and download database backups</p>
            </div>

            <!-- Success/Error Messages -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg text-red-700">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Action Button -->
            <div class="mb-6">
                <form method="POST" action="{{ route('priest.backup.create') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="px-6 py-3 bg-green-600 text-white rounded-lg font-medium hover:bg-green-700 transition flex items-center gap-2">
                        <i class="fas fa-download"></i>
                        <span>Create New Backup</span>
                    </button>
                </form>
            </div>

            <!-- Backups Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Filename
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Size
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Created At
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($backups as $backup)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <code class="bg-gray-100 px-2 py-1 rounded">{{ $backup['filename'] }}</code>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ number_format($backup['size'] / 1024, 2) }} KB
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ date('M d, Y h:i A', $backup['created_at']) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <div class="flex items-center gap-3">
                                            <a href="{{ route('priest.backup.download', ['file' => $backup['filename']]) }}"
                                               class="text-blue-600 hover:text-blue-900 font-medium">
                                                Download
                                            </a>
                                            <button onclick="openRestoreModal('{{ $backup['filename'] }}')"
                                               class="text-amber-600 hover:text-amber-900 font-medium"
                                               title="Restore database from this backup">
                                                Restore
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center">
                                        <i class="fas fa-inbox text-4xl text-gray-300 mb-4 block"></i>
                                        <p class="text-gray-500">No backups yet. Create one to get started.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Restore Confirmation Modal -->
    <div id="restoreModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50" onclick="closeRestoreModal(event)" style="display: none; align-items: center; justify-content: center;">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4" onclick="event.stopPropagation()" style="margin: auto;">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Restore Database</h3>
            </div>

            <div class="px-6 py-4">
                <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <p class="text-sm text-red-700">
                        <strong>Warning:</strong> Restoring a backup will replace all current data with the backup data. This action cannot be undone. Make sure you want to proceed.
                    </p>
                </div>

                <p class="text-sm text-gray-600 mb-2">
                    Backup file: <code class="bg-gray-100 px-2 py-1 rounded text-gray-900" id="modalFilename"></code>
                </p>
            </div>

            <div class="px-6 py-4 border-t border-gray-200 flex gap-3 justify-end">
                <button onclick="closeRestoreModal()" class="px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg font-medium transition">
                    Cancel
                </button>
                <button onclick="submitRestore()" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition">
                    Restore
                </button>
            </div>
        </div>
    </div>

    <!-- Hidden Restore Form -->
    <form id="restoreForm" method="POST" action="{{ route('priest.backup.restore') }}" style="display: none;">
        @csrf
        <input type="hidden" name="filename" id="restoreFilename" value="">
    </form>

    <script>
        let currentRestoreFilename = null;

        function openRestoreModal(filename) {
            currentRestoreFilename = filename;
            document.getElementById('modalFilename').textContent = filename;
            const modal = document.getElementById('restoreModal');
            modal.style.display = 'flex';
        }

        function closeRestoreModal(event) {
            // Allow closing by clicking outside or on Cancel button
            if (event && event.target.id !== 'restoreModal') {
                return;
            }
            document.getElementById('restoreModal').style.display = 'none';
            currentRestoreFilename = null;
        }

        function submitRestore() {
            if (currentRestoreFilename) {
                document.getElementById('restoreFilename').value = currentRestoreFilename;
                document.getElementById('restoreForm').submit();
            }
        }

        // Close modal when pressing Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeRestoreModal();
            }
        });
    </script>
@endsection
