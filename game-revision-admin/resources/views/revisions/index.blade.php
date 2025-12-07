@extends('layouts.app')

@section('title', 'Daftar Revisian Game')

@section('content')
<div class="space-y-6">
    
    <!-- Top Cards Row -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

        <!-- Pending -->
        <div class="bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl p-5 text-white relative overflow-hidden">
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-3">
                    <div class="bg-white/20 rounded-lg p-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-sm font-medium mb-1 opacity-90">Revisi Pending</h3>
                <p class="text-2xl font-bold">{{ $revisions->where('status', 'pending')->count() }}</p>
            </div>
        </div>

        <!-- In Progress -->
        <div class="bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl p-5 text-white relative overflow-hidden">
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-3">
                    <div class="bg-white/20 rounded-lg p-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-sm font-medium mb-1 opacity-90">Sedang Dikerjakan</h3>
                <p class="text-2xl font-bold">{{ $revisions->where('status', 'in_progress')->count() }}</p>
            </div>
        </div>

        <!-- Completed -->
        <div class="bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl p-5 text-white relative overflow-hidden">
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-3">
                    <div class="bg-white/20 rounded-lg p-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-sm font-medium mb-1 opacity-90">Revisi Selesai</h3>
                <p class="text-2xl font-bold">{{ $revisions->where('status', 'completed')->count() }}</p>
            </div>
        </div>

        <!-- error -->
        <div class="bg-gradient-to-br from-red-500 to-pink-500 rounded-2xl p-5 text-white relative overflow-hidden">
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-3">
                    <div class="bg-white/20 rounded-lg p-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v4m0 4h.01M10.29 3.86l-8.17 14A1 1 0 003 19h18a1 1 0 00.87-1.5l-8.17-14a1 1 0 00-1.74 0z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-sm font-medium mb-1 opacity-90">Error</h3>
                <p class="text-2xl font-bold">{{ $revisions->where('status', 'error')->count() }}</p>
            </div>
        </div>


        <!-- Total -->
        <!-- <div class="bg-gradient-to-br from-orange-400 to-pink-400 rounded-2xl p-5 text-white relative overflow-hidden">
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-3">
                    <div class="bg-white/20 rounded-lg p-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-sm font-medium mb-1 opacity-90">Total Revisi</h3>
                <p class="text-2xl font-bold">{{ $revisions->total() }}</p>
            </div>
        </div> -->

    </div>

    <!-- Table Section -->
    <div class="bg-[#2A2D3E] rounded-2xl p-6 border border-white/5 mt-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-white font-semibold">Daftar Revisi Game</h3>
            <a href="{{ route('revisions.create') }}"
               class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white text-sm rounded-lg transition">
                + Tambah Revisi
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-xs text-gray-400 border-b border-gray-700">
                        <th class="pb-3 font-medium">Judul Game</th>
                        <th class="pb-3 font-medium">Platform</th>
                        <th class="pb-3 font-medium">Tanggal</th>
                        <th class="pb-3 font-medium">Jenis Revisi</th>
                        <th class="pb-3 font-medium">Status</th>
                        <th class="pb-3 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @forelse($revisions as $revision)
                    <tr class="border-b border-gray-800 hover:bg-white/5 transition-colors">
                        <td class="py-3 text-white flex items-center gap-3">
                            @if($revision->image)
                                <img src="{{ asset('storage/' . $revision->image) }}" alt="img" class="w-8 h-8 rounded-full object-cover">
                            @else
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-purple-500 to-pink-500 flex items-center justify-center text-white text-xs font-bold">
                                    {{ strtoupper(substr($revision->game_title, 0, 1)) }}
                                </div>
                            @endif
                            <span>{{ $revision->game_title }}</span>
                        </td>
                        <td class="py-3 text-gray-300">{{ $revision->platform }}</td>
                        <td class="py-3 text-gray-400">{{ $revision->revision_date->format('d M Y') }}</td>
                        <td class="py-3 text-gray-300">{{ $revision->revision_type }}</td>
                        <td class="py-3">
                            @if($revision->status == 'completed')
                                <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-medium">Selesai</span>
                            @elseif($revision->status == 'error')
                                <span class="px-3 py-1 bg-red-500/20 text-red-400 rounded-full text-xs font-medium">Error</span>
                            @elseif($revision->status == 'in_progress')
                                <span class="px-3 py-1 bg-yellow-500/20 text-yellow-400 rounded-full text-xs font-medium">Proses</span>
                            @else
                                <span class="px-3 py-1 bg-orange-500/20 text-orange-400 rounded-full text-xs font-medium">Pending</span>
                            @endif
                        </td>
                        <td class="py-3 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('revisions.show', $revision) }}" 
                                   class="text-blue-400 hover:text-blue-300 text-sm">Lihat</a>
                                <a href="{{ route('revisions.edit', $revision) }}" 
                                   class="text-yellow-400 hover:text-yellow-300 text-sm">Edit</a>
                                <form action="{{ route('revisions.destroy', $revision) }}" 
                                    method="POST" class="inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-delete delete-btn text-red-400 hover:text-red-300 text-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-6 text-gray-400">Belum ada revisi game.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $revisions->links() }}
        </div>
    </div>
</div>

<!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    
    <script>
    document.addEventListener("DOMContentLoaded", () => {
        // Delete confirmation
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function () {
                const form = this.closest('.delete-form');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    background: '#2A2D3E',
                    color: '#fff',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) form.submit();
                });
            });
        });
    });
    </script>

@endsection
