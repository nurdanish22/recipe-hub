<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tags
        </h2>
    </x-slot>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">All Tags</h1>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($tags as $tag)
                <a href="{{ route('tags.show', $tag) }}" class="block bg-gray-100 hover:bg-gray-200 rounded p-4 text-center font-semibold text-lg text-gray-700 shadow">
                    #{{ $tag->name }}
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
