<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Users
        </h2>
    </x-slot>

    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Users</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($users as $user)
                <div class="bg-white border border-gray-300 rounded-xl shadow p-4 flex flex-col items-start max-w-xs mx-auto mb-6">
                    <h2 class="text-xl font-semibold mb-2 text-gray-900">{{ $user->username }}</h2>
                    <p class="text-gray-600 mb-1">Email: {{ $user->email }}</p>
                    <p class="text-gray-500 mb-2">Role: {{ $user->role }}</p>
                    <a href="{{ route('users.show', $user->id) }}" class="mt-auto inline-block bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">View Profile</a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
