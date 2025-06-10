<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            #{{ $tag->name }}
        </h2>
    </x-slot>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Recipes with #{{ $tag->name }}</h1>
        @if($recipes->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($recipes as $recipe)
                    <div class="bg-white rounded-lg shadow-md p-4 border border-gray-200 flex flex-col">
                        <a href="{{ route('recipes.show', $recipe) }}">
                            <img src="{{ $recipe->image_url }}" alt="{{ $recipe->title }}" class="rounded w-full h-40 object-cover mb-2">
                            <h2 class="text-xl font-semibold mb-1">{{ $recipe->title }}</h2>
                        </a>
                        <p class="text-gray-600 text-sm mb-2">By {{ $recipe->user->username ?? 'Unknown' }}</p>
                        <p class="text-gray-700 mb-2 line-clamp-2">{{ $recipe->description }}</p>
                        <div class="mt-auto flex flex-wrap gap-2">
                            <span class="bg-gray-100 rounded px-2 py-1 text-xs">{{ $recipe->category }}</span>
                            <span class="bg-gray-100 rounded px-2 py-1 text-xs">{{ $recipe->difficulty_level }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">No recipes found for this tag.</p>
        @endif
    </div>
</x-app-layout>
