@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Daftar Pengguna</h1>
        <a href="{{ route('users.create') }}" 
           class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-colors text-sm font-medium">
            + Tambah Pengguna
        </a>
    </div>

    <div class="bg-[#2A2D3E] rounded-xl border border-white/5 p-6 shadow-lg">
        <table class="w-full text-left text-sm text-gray-300">
            <thead class="border-b border-white/10 text-gray-400 uppercase text-xs">
                <tr>
                    <th class="py-3 px-4">#</th>
                    <th class="py-3 px-4">Name</th>
                    <th class="py-3 px-4">Email</th>
                    <th class="py-3 px-4">Role</th>
                    <th class="py-3 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $index => $user)
                <tr class="border-b border-white/5 hover:bg-white/5 transition">
                    <td class="py-3 px-4">{{ $index + 1 }}</td>
                    <td class="py-3 px-4 font-medium">{{ $user->name }}</td>
                    <td class="py-3 px-4">{{ $user->email }}</td>
                    <td class="py-3 px-4">{{ ucfirst($user->role ?? 'user') }}</td>
                    <td class="py-3 px-4 text-right space-x-2">
                        <a href="{{ route('users.edit', $user) }}"
                           class="text-blue-400 hover:text-blue-500 font-medium">
                            Edit
                        </a>

                        <form action="{{ route('users.destroy', $user) }}" 
                              method="POST" 
                              class="inline"
                              onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="text-red-400 hover:text-red-500 font-medium">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-6 text-center text-gray-500">No users found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
