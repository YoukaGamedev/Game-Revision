@extends('layouts.app')

@section('title', 'Edit Revisian')

@section('content')
<div class="bg-gradient-to-br from-[#0A0E24] via-[#101935] to-[#1A1F3B] min-h-screen py-10 px-6 text-white font-sans">
    <div class="max-w-3xl mx-auto bg-[#141A33]/80 backdrop-blur-xl rounded-2xl shadow-2xl p-8 border border-indigo-700/40">

        <h2 class="text-3xl font-bold mb-6 text-center bg-gradient-to-r from-indigo-400 to-fuchsia-500 bg-clip-text text-transparent">
            🎮 Edit Revisi Game
        </h2>

        <form action="{{ route('revisions.update', $revision) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Judul Game -->
            <div class="mb-5">
                <label class="block text-indigo-300 font-semibold mb-2">Judul Game</label>
                <input type="text" name="game_title" value="{{ old('game_title', $revision->game_title) }}"
                    class="w-full px-4 py-2 rounded-lg bg-[#1B2345] border border-indigo-600 focus:ring-2 focus:ring-fuchsia-500 focus:outline-none text-white placeholder-gray-400"
                    required>
                @error('game_title')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Platform -->
            <div class="mb-5">
                <label class="block text-indigo-300 font-semibold mb-2">Platform</label>
                <input type="text" name="platform" value="{{ old('platform', $revision->platform) }}"
                    class="w-full px-4 py-2 rounded-lg bg-[#1B2345] border border-indigo-600 focus:ring-2 focus:ring-fuchsia-500 focus:outline-none text-white"
                    required>
                @error('platform')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tanggal Revisi -->
            <div class="mb-5">
                <label class="block text-indigo-300 font-semibold mb-2">Tanggal Revisi</label>
                <input type="date" name="revision_date" value="{{ old('revision_date', $revision->revision_date->format('Y-m-d')) }}"
                    class="w-full px-4 py-2 rounded-lg bg-[#1B2345] border border-indigo-600 focus:ring-2 focus:ring-fuchsia-500 focus:outline-none text-white"
                    required>
                @error('revision_date')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tipe Revisi -->
            <div class="mb-5">
                <label class="block text-indigo-300 font-semibold mb-2">Tipe Revisi</label>
                <input type="text" name="revision_type" value="{{ old('revision_type', $revision->revision_type) }}"
                    class="w-full px-4 py-2 rounded-lg bg-[#1B2345] border border-indigo-600 focus:ring-2 focus:ring-fuchsia-500 focus:outline-none text-white"
                    required>
                @error('revision_type')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div class="mb-5">
                <label class="block text-indigo-300 font-semibold mb-2">Deskripsi</label>
                <textarea name="description" rows="5"
                    class="w-full px-4 py-2 rounded-lg bg-[#1B2345] border border-indigo-600 focus:ring-2 focus:ring-fuchsia-500 focus:outline-none text-white"
                    required>{{ old('description', $revision->description) }}</textarea>
                @error('description')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div class="mb-5">
                <label class="block text-indigo-300 font-semibold mb-2">Status</label>
                <select name="status"
                    class="w-full px-4 py-2 rounded-lg bg-[#1B2345] border border-indigo-600 focus:ring-2 focus:ring-fuchsia-500 focus:outline-none text-white"
                    required>
                    <option value="pending" {{ old('status', $revision->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ old('status', $revision->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ old('status', $revision->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="error" {{ old('status', $revision->status) == 'error' ? 'selected' : '' }}>Error</option>
                </select>
                @error('status')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Link GitHub -->
            <div class="mb-5">
                <label class="block text-indigo-300 font-semibold mb-2">Link GitHub</label>
                <input type="url" name="github_link" 
                    value="{{ old('github_link', $revision->github_link) }}"
                    placeholder="https://github.com/username/repo-name"
                    class="w-full px-4 py-2 rounded-lg bg-[#1B2345] border border-indigo-600 focus:ring-2 focus:ring-fuchsia-500 focus:outline-none text-white placeholder-indigo-300">
                @error('github_link')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror

                <p class="text-xs text-indigo-400 mt-1">Opsional — masukkan URL repo GitHub untuk revisi ini.</p>
            </div>

            <!-- Prioritas -->
            <div class="mb-5">
                <label class="block text-indigo-300 font-semibold mb-2">Prioritas (1-5)</label>
                <input type="number" name="priority" value="{{ old('priority', $revision->priority) }}" min="1" max="5"
                    class="w-full px-4 py-2 rounded-lg bg-[#1B2345] border border-indigo-600 focus:ring-2 focus:ring-fuchsia-500 focus:outline-none text-white"
                    required>
                @error('priority')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Upload Gambar -->
            <div class="mb-6">
                <label class="block text-indigo-300 font-semibold mb-2">Gambar (opsional)</label>
                @if($revision->image)
                    <div class="mb-3">
                        <p class="text-sm text-gray-400 mb-1">Gambar saat ini:</p>
                        <img src="{{ asset('storage/' . $revision->image) }}" alt="Preview" class="h-32 rounded-lg border border-indigo-600 shadow-md">
                    </div>
                @endif
                <input type="file" name="image" accept="image/*"
                    class="w-full px-4 py-2 rounded-lg bg-[#1B2345] border border-indigo-600 focus:ring-2 focus:ring-fuchsia-500 focus:outline-none text-white">
                @error('image')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-end gap-4">
                <button type="submit"
                    class="bg-gradient-to-r from-indigo-500 to-fuchsia-600 hover:from-indigo-600 hover:to-fuchsia-700 text-white px-6 py-2 rounded-lg shadow-lg hover:shadow-fuchsia-500/30 transition-all">
                    💾 Update
                </button>
                <a href="{{ route('revisions.index') }}"
                    class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg shadow-lg transition-all">
                    ❌ Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
