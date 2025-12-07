<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Game Revision Admin')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('asset/images/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="bg-[#1F2230] min-h-screen text-white" style="font-family: 'Inter', sans-serif;">

<div class="flex h-screen overflow-hidden">
    
    <!-- Sidebar -->
    <aside class="w-64 bg-[#2A2D3E] flex-shrink-0 border-r border-white/5">
        <div class="p-6">
            <!-- Logo & Profile -->
            <div class="flex items-center gap-3 mb-8">
                <img src="{{ asset('asset/images/logo.png') }}" alt="Profile" class="w-12 h-12 rounded-xl">
                <div class="flex-1">
                    <h3 class="text-sm font-semibold text-white">Revision</h3>
                    <p class="text-xs text-gray-400">Administrator</p>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="space-y-1">

                <!-- Dashboard -->
                <a href="{{ route('revisions.index') }}" 
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-purple-400 hover:bg-purple-500/20 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </a>

                <!-- User -->
                <a href="{{ route('users.index') }}" 
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-400 hover:bg-white/5 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M17 20v-2a4 4 0 00-4-4H7a4 4 0 00-4 4v2m14-8a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <span class="font-medium">User</span>
                </a>

            </nav>

        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        
        <!-- Top Header -->
        <header class="bg-[#2A2D3E] border-b border-white/5 px-8 py-4 flex items-center justify-between">
            <!-- Date -->
            <div class="flex items-center gap-2 text-sm text-gray-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>{{ \Carbon\Carbon::now()->format('d/m/Y') }}</span>
            </div>

            <!-- User Dropdown -->
            <div class="relative" x-data="{ open: false }">
                @auth
                    <button @click="open = !open" class="flex items-center gap-2 text-sm focus:outline-none">
                        <span class="font-medium text-white">{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div x-show="open" @click.away="open = false" 
                         class="absolute right-0 mt-2 w-40 bg-[#2A2D3E] border border-white/10 rounded-lg shadow-lg overflow-hidden z-50">
                        <form action="{{ route('logout') }}" method="POST" class="block">
                            @csrf
                            <button type="submit" 
                                class="w-full text-left px-4 py-2 text-sm text-red-400 hover:bg-red-500/20 transition-colors">
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-400 hover:text-white transition">Login</a>
                @endauth
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto p-8">
            @if(session('success'))
                <div class="bg-green-500/10 border border-green-500/20 text-green-400 px-6 py-4 rounded-lg mb-6 flex items-center animate-fade-in">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            @yield('content')
        </main>

    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<script>
document.addEventListener("DOMContentLoaded", () => {
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

<style>
@keyframes fade-in {
    from { opacity: 0; transform: translateY(-8px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
    animation: fade-in 0.3s ease-out;
}
::-webkit-scrollbar { width: 8px; }
::-webkit-scrollbar-track { background: #1F2230; }
::-webkit-scrollbar-thumb { background: #374151; border-radius: 4px; }
::-webkit-scrollbar-thumb:hover { background: #4B5563; }
</style>

</body>
</html>
