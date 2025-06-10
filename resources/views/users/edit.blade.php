<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit User
        </h2>
    </x-slot>
    <div class="container mx-auto py-8 max-w-xl">
        <div class="bg-white border border-gray-300 rounded-xl shadow p-8">
            <h1 class="text-2xl font-bold mb-4">Edit User</h1>
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="username">Username</label>
                    <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}" class="w-full border rounded px-3 py-2" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="w-full border rounded px-3 py-2" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="role">Role</label>
                    <input type="text" name="role" id="role" value="{{ old('role', $user->role) }}" class="w-full border rounded px-3 py-2" required>
                </div>
                <div class="flex gap-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Update</button>
                    <a href="{{ route('users.show', $user->id) }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
