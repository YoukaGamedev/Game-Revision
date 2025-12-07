@extends('layouts.app')

@section('title', 'Detail Revisi')

@section('content')
<style>
/* 🎨 Tema Futuristik */
body {
    background: radial-gradient(circle at top, #0f172a, #020617);
    color: #e2e8f0;
    font-family: 'Orbitron', sans-serif;
}

/* 📦 Container utama */
.game-card {
    background: linear-gradient(145deg, rgba(31,41,55,0.95), rgba(15,23,42,0.95));
    border: 2px solid rgba(100, 255, 218, 0.4);
    border-radius: 20px;
    box-shadow: 0 0 25px rgba(0, 255, 180, 0.3);
    padding: 2rem;
    max-width: 800px;
    margin: 3rem auto;
    position: relative;
    overflow: hidden;
}

/* ✨ Efek neon di tepi */
.game-card::before {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: inherit;
    padding: 2px;
    background: linear-gradient(135deg, #00ffd5, #0077ff, #ff00ff);
    -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
    animation: rotate 6s linear infinite;
}
@keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* 🧩 Judul */
h2 {
    font-size: 2rem;
    font-weight: 900;
    color: #00ffe5;
    text-shadow: 0 0 15px #00ffd5;
}

/* 🧠 Label dan teks */
label {
    color: #94a3b8;
    font-size: 0.9rem;
}
p {
    color: #f8fafc;
}

/* 🖼️ Gambar game */
.game-image {
    width: 180px;
    height: 180px;
    border-radius: 15px;
    object-fit: cover;
    border: 2px solid #00ffd5;
    box-shadow: 0 0 25px #00ffd5aa;
    transition: transform 0.3s ease;
}
.game-image:hover {
    transform: scale(1.05);
}

/* 🧱 Field section */
.detail-section {
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    padding-bottom: 0.8rem;
    margin-bottom: 1rem;
}

/* 🚀 Tombol */
.btn {
    padding: 0.7rem 1.4rem;
    border-radius: 10px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: all 0.3s ease;
}
.btn:hover {
    transform: scale(1.05);
}

.btn-edit {
    background: linear-gradient(90deg, #facc15, #f59e0b);
    color: #000;
}
.btn-edit:hover {
    background: linear-gradient(90deg, #fbbf24, #fcd34d);
}

.btn-delete {
    background: linear-gradient(90deg, #ef4444, #b91c1c);
    color: white;
}
.btn-delete:hover {
    background: linear-gradient(90deg, #f87171, #dc2626);
}

.btn-back {
    background: linear-gradient(90deg, #64748b, #475569);
    color: white;
}
.btn-back:hover {
    background: linear-gradient(90deg, #94a3b8, #475569);
}

/* 🏷️ Status badge */
.status-badge {
    padding: 0.3rem 1rem;
    border-radius: 9999px;
    font-size: 0.9rem;
    font-weight: 700;
}
.status-completed { background: rgba(34,197,94,0.2); color: #4ade80; border: 1px solid #22c55e; }
.status-progress { background: rgba(234,179,8,0.2); color: #facc15; border: 1px solid #eab308; }
.status-failed { background: rgba(239,68,68,0.2); color: #f87171; border: 1px solid #ef4444; }

/* 🔗 Link GitHub */
.github-link {
    color: #facc15;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
}
.github-link:hover {
    color: #fde68a;
    text-shadow: 0 0 10px #facc15;
}

/* ✨ Animasi fade-in */
.fade-in {
    animation: fade 0.6s ease forwards;
    opacity: 0;
}
@keyframes fade {
    to { opacity: 1; transform: translateY(0); }
}
</style>

<div class="game-card fade-in">
    <div class="flex justify-between items-center mb-6">
        <h2>🎮 Detail Revisi</h2>
        <a href="{{ route('revisions.index') }}" class="btn btn-back">← Kembali</a>
    </div>

    <!-- 📸 Gambar Game -->
    @if($revision->image)
    <div class="flex justify-center mb-6">
        <img src="{{ asset('storage/' . $revision->image) }}" 
             alt="{{ $revision->game_title }}" 
             class="game-image">
    </div>
    @endif

    <!-- 🧾 Informasi Detail -->
    <div class="space-y-3">
        <div class="detail-section">
            <label>Judul Game</label>
            <p class="text-xl font-bold text-cyan-300">{{ $revision->game_title }}</p>
        </div>

        <div class="detail-section">
            <label>Platform</label>
            <p>{{ $revision->platform }}</p>
        </div>

        <div class="detail-section">
            <label>Tanggal Revisi</label>
            <p>{{ optional($revision->revision_date)->format('d F Y') ?? '-' }}</p>
        </div>

        <div class="detail-section">
            <label>Tipe Revisi</label>
            <p>{{ $revision->revision_type }}</p>
        </div>

        <div class="detail-section">
            <label>Status</label>
            <span class="status-badge 
                @if($revision->status === 'completed') status-completed
                @elseif($revision->status === 'in_progress') status-progress
                @else status-failed
                @endif">
                {{ ucfirst(str_replace('_', ' ', $revision->status)) }}
            </span>
        </div>

        <div class="detail-section">
            <label>Prioritas</label>
            <p>Level <span class="text-yellow-400 font-bold">{{ $revision->priority }}</span></p>
        </div>

        <!-- 🔗 Link GitHub -->
        @if($revision->github_link)
        <div class="detail-section">
            <label>Link GitHub</label>
            <p>
                <a href="{{ $revision->github_link }}" target="_blank" class="github-link">
                    🌐 {{ $revision->github_link }}
                </a>
            </p>
        </div>
        @endif

        <div class="detail-section">
            <label>Deskripsi</label>
            <p class="whitespace-pre-line text-gray-300">{{ $revision->description }}</p>
        </div>

        <div class="detail-section">
            <label>Dibuat Pada</label>
            <p class="text-sm text-gray-400">{{ optional($revision->created_at)->format('d F Y, H:i') ?? '-' }}</p>
        </div>

        <div>
            <label>Terakhir Diupdate</label>
            <p class="text-sm text-gray-400">{{ optional($revision->updated_at)->format('d F Y, H:i') ?? '-' }}</p>
        </div>
    </div>

    <!-- ⚙️ Tombol aksi -->
    <div class="flex gap-4 mt-6 justify-center">
        <a href="{{ route('revisions.edit', $revision) }}" class="btn btn-edit">✏️ Edit</a>

        <form action="{{ route('revisions.destroy', $revision) }}" 
              method="POST" class="inline delete-form">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-delete delete-btn">🗑️ Hapus</button>
        </form>
    </div>
</div>

<!-- ✅ SweetAlert untuk konfirmasi hapus -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function () {
      const form = this.closest('.delete-form');
      Swal.fire({
        title: 'Apakah kamu yakin?',
        text: "Data yang dihapus tidak bisa dikembalikan 🚨",
        icon: 'warning',
        background: '#0f172a',
        color: '#e2e8f0',
        showCancelButton: true,
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      });
    });
  });
});
</script>

<!-- 🛰️ Font Orbitron (gaya sci-fi) -->
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&display=swap" rel="stylesheet">
@endsection
