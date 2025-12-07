@extends('layouts.app')

@section('title', 'Tambah Revisian')

@section('content')
<div class="max-w-5xl mx-auto text-white font-[Orbitron]">

    <!-- Back Button -->
    <div class="mb-8">
        <a href="{{ route('revisions.index') }}"
           class="inline-flex items-center text-cyan-300 hover:text-cyan-200 transition-colors duration-200 font-medium">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Dashboard
        </a>
    </div>

    <!-- Container Card -->
    <div class="bg-gradient-to-br from-[#0A0E24]/90 via-[#101935]/90 to-[#1A1F3B]/90 rounded-3xl border border-indigo-500/40 shadow-[0_0_25px_rgba(99,102,241,0.3)] p-10 space-y-10 backdrop-blur-lg">

        <!-- Header -->
        <div class="text-center mb-6">
            <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-500 drop-shadow-lg">Tambah Revisian Baru</h2>
            <p class="text-cyan-200 text-sm mt-2">Isi form di bawah untuk menambahkan revisi game baru</p>
        </div>

        <!-- Form -->
        <form action="{{ route('revisions.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Judul Game -->
                <div class="md:col-span-2">
                    <label class="block text-cyan-300 font-semibold mb-2 flex items-center">
                        <span class="mr-2">🎮</span> Judul Game
                    </label>
                    <input type="text" name="game_title" value="{{ old('game_title') }}"
                           class="w-full px-4 py-3 rounded-xl bg-[#141a38]/70 border border-indigo-500/40 text-cyan-100 placeholder-cyan-400 focus:ring-2 focus:ring-purple-500 focus:outline-none transition duration-200"
                           placeholder="Masukkan judul game" required>
                </div>

                <!-- Platform -->
                <div>
                    <label class="block text-cyan-300 font-semibold mb-2 flex items-center">
                        <span class="mr-2">💻</span> Platform
                    </label>
                    <input type="text" name="platform" value="{{ old('platform') }}"
                           placeholder="PC, PlayStation, Mobile..."
                           class="w-full px-4 py-3 rounded-xl bg-[#141a38]/70 border border-indigo-500/40 text-cyan-100 placeholder-cyan-400 focus:ring-2 focus:ring-purple-500 focus:outline-none transition duration-200"
                           required>
                </div>

                <!-- Tanggal Revisi -->
                <div>
                    <label class="block text-cyan-300 font-semibold mb-2 flex items-center">
                        <span class="mr-2">📅</span> Tanggal Revisi
                    </label>
                    <input type="date" name="revision_date" value="{{ old('revision_date') }}"
                           class="w-full px-4 py-3 rounded-xl bg-[#141a38]/70 border border-indigo-500/40 text-cyan-100 focus:ring-2 focus:ring-purple-500 focus:outline-none transition duration-200"
                           required>
                </div>

                <!-- Tipe Revisi -->
                <div>
                    <label class="block text-cyan-300 font-semibold mb-2 flex items-center">
                        <span class="mr-2">🔧</span> Tipe Revisi
                    </label>
                    <input type="text" name="revision_type" value="{{ old('revision_type') }}"
                           placeholder="Bug Fix, UI Update..."
                           class="w-full px-4 py-3 rounded-xl bg-[#141a38]/70 border border-indigo-500/40 text-cyan-100 placeholder-cyan-400 focus:ring-2 focus:ring-purple-500 focus:outline-none transition duration-200"
                           required>
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-cyan-300 font-semibold mb-2 flex items-center">
                        <span class="mr-2">📊</span> Status
                    </label>
                    <select name="status"
                            class="w-full px-4 py-3 rounded-xl bg-[#141a38]/70 border border-indigo-500/40 text-cyan-100 focus:ring-2 focus:ring-purple-500 focus:outline-none transition duration-200"
                            required>
                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                        <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>⚡ In Progress</option>
                        <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>✅ Completed</option>
                        <option value="error" {{ old('status') == 'error' ? 'selected' : '' }}>❌ Error</option>
                    </select>
                </div>


                <!-- Link GitHub -->
                <div>
                    <label class="block text-cyan-300 font-semibold mb-2 flex items-center">
                        <span class="mr-2">🔗</span> Link GitHub
                    </label>
                    <input type="url" name="github_link" value="{{ old('github_link') }}"
                        placeholder="https://github.com/username/repo-name"
                        class="w-full px-4 py-3 rounded-xl bg-[#141a38]/70 border border-indigo-500/40 text-cyan-100 placeholder-cyan-400 focus:ring-2 focus:ring-purple-500 focus:outline-none transition duration-200">
                    <p class="text-xs text-cyan-400 mt-1"> Opsional — masukkan URL repo GitHub untuk revisi ini.</p>
                </div>


                <!-- Prioritas -->
                <div class="md:col-span-2">
                    <label class="block text-cyan-300 font-semibold mb-2 flex items-center">
                        <span class="mr-2">⭐</span> Prioritas (1–5)
                    </label>
                    <div class="flex items-center space-x-4">
                        <input type="range" name="priority" value="{{ old('priority', 1) }}" min="1" max="5"
                               class="flex-1 h-2 bg-indigo-500/30 rounded-lg appearance-none cursor-pointer"
                               oninput="this.nextElementSibling.textContent = this.value">
                        <span class="text-2xl font-bold text-purple-400 w-10 text-center">{{ old('priority', 1) }}</span>
                    </div>
                </div>

                <!-- Upload Gambar -->
                <div class="md:col-span-2">
                    <label class="block text-cyan-300 font-semibold mb-2 flex items-center">
                        <span class="mr-2 text-lg">🖼️</span> Gambar Game (Opsional)
                    </label>
                    <div class="relative border-2 border-dashed border-indigo-500/50 rounded-xl p-6 flex flex-col items-center justify-center hover:border-purple-400 hover:bg-indigo-950/20 transition duration-300 cursor-pointer">
                        <svg class="w-14 h-14 text-purple-400 mb-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        <p class="text-cyan-300 text-sm mb-2">Klik atau seret gambar ke sini</p>
                        <p class="text-indigo-400 text-xs">Format: JPG, PNG, GIF (max 2MB)</p>
                        <input type="file" name="image" accept="image/*"
                               class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewImage(event)">
                    </div>

                    <div id="image-preview" class="mt-4 hidden">
                        <p class="text-cyan-300 font-semibold mb-2">📸 Pratinjau:</p>
                        <img id="preview-img" class="w-48 h-48 object-cover rounded-lg border border-indigo-500/50 shadow-md" />
                    </div>
                </div>

                <script>
                    function previewImage(event) {
                        const file = event.target.files[0];
                        const preview = document.getElementById('image-preview');
                        const img = document.getElementById('preview-img');
                        if (file) {
                            img.src = URL.createObjectURL(file);
                            preview.classList.remove('hidden');
                        } else {
                            preview.classList.add('hidden');
                        }
                    }
                </script>

                <!-- Deskripsi -->
                <div class="md:col-span-2">
                    <label class="block text-cyan-300 font-semibold mb-2 flex items-center">
                        <span class="mr-2">📝</span> Deskripsi
                    </label>
                    <textarea name="description" rows="6"
                              class="w-full px-4 py-3 rounded-xl bg-[#141a38]/70 border border-indigo-500/40 text-cyan-100 placeholder-cyan-400 focus:ring-2 focus:ring-purple-500 focus:outline-none transition duration-200"
                              placeholder="Jelaskan detail revisian yang dilakukan..." required>{{ old('description') }}</textarea>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex gap-4 mt-10 pt-6 border-t border-indigo-500/30">
                <button type="submit"
                        class="flex-1 bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-8 py-4 rounded-xl font-bold text-lg hover:shadow-[0_0_20px_rgba(147,51,234,0.5)] transition-transform duration-200 hover:-translate-y-0.5">
                    💾 Simpan Revisian
                </button>
                <a href="{{ route('revisions.index') }}"
                   class="flex-1 bg-gradient-to-r from-gray-600 to-gray-700 text-white px-8 py-4 rounded-xl font-bold text-lg text-center hover:shadow-[0_0_15px_rgba(255,255,255,0.2)] transition">
                    ❌ Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
