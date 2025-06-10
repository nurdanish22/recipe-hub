<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Profile
        </h2>
    </x-slot>
    <div class="container mx-auto py-8 max-w-2xl">
        <div class="bg-white border border-gray-300 rounded-xl shadow p-8">
            <h1 class="text-3xl font-bold mb-4 text-gray-900">{{ $user->username }}</h1>
            <p class="text-gray-700 mb-2"><span class="font-semibold">Email:</span> {{ $user->email }}</p>
            <p class="text-gray-500 mb-4"><span class="font-semibold">Role:</span> {{ $user->role }}</p>
            <div class="flex gap-4 mt-6">
                <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-4 rounded">Edit</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
