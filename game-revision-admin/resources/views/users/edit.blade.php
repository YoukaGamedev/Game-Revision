@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-white">Edit User</h1>
    <a href="{{ route('users.index') }}"
       class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors text-sm font-medium">
        ← Back to List
    </a>
</div>

<div class="bg-[#2A2D3E] rounded-xl border border-white/5 p-6 shadow-lg">
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Name --}}
        <div class="mb-4">
            <label class="block text-gray-300 mb-1" for="name">Name</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}"
                   class="w-full px-4 py-2 rounded-lg bg-[#1F2028] text-gray-300 focus:outline-none" required>
            @error('name')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-4">
            <label class="block text-gray-300 mb-1" for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}"
                   class="w-full px-4 py-2 rounded-lg bg-[#1F2028] text-gray-300 focus:outline-none" required>
            @error('email')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password (opsional) --}}
        <div class="mb-6">
            <label class="block text-gray-300 mb-1" for="password">Password (biarkan kosong jika tidak diubah)</label>
            <input id="password" name="password" type="password"
                   class="w-full px-4 py-2 rounded-lg bg-[#1F2028] text-gray-300 focus:outline-none">
            @error('password')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Role --}}
        <div class="mb-4">
            <label class="block text-gray-300 mb-1" for="role">Role</label>
            <select id="role" name="role"
                    class="w-full px-4 py-2 rounded-lg bg-[#1F2028] text-gray-300 focus:outline-none">
                <option value="admin" {{ old('role', 'admin') == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            @error('role')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
                class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition-colors font-medium">
            Update User
        </button>
    </form>
</div>
@endsection
