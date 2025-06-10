<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Bookmarks
        </h2>
    </x-slot>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Bookmarked Recipes</h1>
        @if($bookmarks->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($bookmarks as $bookmark)
                    @php $recipe = $bookmark->recipe; @endphp
                    <div class="bg-white rounded-lg shadow-md p-4 border border-gray-200 flex flex-col">
                        <a href="{{ route('recipes.show', $recipe) }}">
                            <img src="{{ $recipe->image_url }}" alt="{{ $recipe->title }}" class="rounded w-full h-40 object-cover mb-2">
                            <h2 class="text-xl font-semibold mb-1">{{ $recipe->title }}</h2>
                        </a>
                        <p class="text-gray-600 text-sm mb-2">By {{ $recipe->user->username ?? 'Unknown' }}</p>
                        <p class="text-gray-700 mb-2 line-clamp-2">{{ $recipe->description }}</p>
                        <form action="{{ route('bookmarks.destroy', $recipe->id) }}" method="POST" class="mt-auto">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-3 py-1 bg-yellow-400 hover:bg-yellow-500 text-black font-bold rounded shadow text-sm">
                                ★ Remove Bookmark
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">You have no bookmarks yet.</p>
        @endif
    </div>
</x-app-layout>
