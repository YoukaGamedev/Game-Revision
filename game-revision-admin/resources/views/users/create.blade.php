@extends('layouts.app')

@section('title', 'Add User')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-white">Add User</h1>
    <a href="{{ route('users.index') }}"
       class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors text-sm font-medium">
        ← Back to List
    </a>
</div>

<div class="bg-[#2A2D3E] rounded-xl border border-white/5 p-6 shadow-lg">
    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="block text-gray-300 mb-1">Name</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}"
                   class="w-full px-4 py-2 rounded-lg bg-[#1F2028] text-gray-300 focus:outline-none" required>
            @error('name')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-gray-300 mb-1">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}"
                   class="w-full px-4 py-2 rounded-lg bg-[#1F2028] text-gray-300 focus:outline-none" required>
            @error('email')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-gray-300 mb-1">Password</label>
            <input id="password" name="password" type="password"
                   class="w-full px-4 py-2 rounded-lg bg-[#1F2028] text-gray-300 focus:outline-none" required>
            @error('password')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Role -->
        <div class="mb-6">
            <label for="role" class="block text-gray-300 mb-1">Role</label>
            <select id="role" name="role"
                    class="w-full px-4 py-2 rounded-lg bg-[#1F2028] text-gray-300 focus:outline-none">
                
                <!-- Default Admin -->
                <option value="admin" {{ old('role', 'admin') == 'admin' ? 'selected' : '' }}>
                    Admin
                </option>

                <!-- Jika nanti mau ada role lain tinggal buka komentar ini -->
                <!-- {{-- <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option> --}}
                {{-- <option value="superadmin" {{ old('role') == 'superadmin' ? 'selected' : '' }}>Super Admin</option> --}} -->
            </select>
            @error('role')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit -->
        <button type="submit"
                class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition-colors font-medium">
            Create User
        </button>
    </form>
</div>
@endsection
