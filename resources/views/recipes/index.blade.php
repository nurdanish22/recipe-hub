<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Recipes
        </h2>
    </x-slot>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Recipes</h1>
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif


        @if(isset($query) && $query !== '')
            <div class="mb-4 text-gray-700 text-center">
                Showing results for <span class="font-semibold">"{{ $query }}"</span>
            </div>
        @endif

        <!-- Filter Form -->
        <form method="GET" action="{{ route('recipes.index') }}" class="mb-8 flex flex-wrap gap-4 items-center justify-center">
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select name="category" id="category" class="border border-gray-300 rounded px-3 py-2">
                    <option value="">All</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" @if(request('category') == $cat) selected @endif>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="tag" class="block text-sm font-medium text-gray-700">Tag</label>
                <select name="tag" id="tag" class="border border-gray-300 rounded px-3 py-2">
                    <option value="">All</option>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" @if(request('tag') == $tag->id) selected @endif>{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-green-500 text-black font-bold rounded hover:bg-green-700">Filter</button>
        </form>
        <!-- End Filter Form -->

        @if($recipes->isEmpty())
            <div class="text-center text-gray-500 text-lg py-12">No recipes found.</div>
        @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($recipes as $recipe)
                <div class="bg-white rounded-lg shadow p-4 flex flex-col">
                    <img src="{{ $recipe->image_url }}" alt="{{ $recipe->title }}" class="rounded mb-4 h-48 w-48 object-cover">
                    <h2 class="text-xl font-semibold mb-2">{{ $recipe->title }}</h2>
                    <p class="text-gray-600 mb-2">By {{ $recipe->user->username ?? 'Unknown' }}</p>
                    <p class="text-gray-700 mb-4 line-clamp-3">{{ $recipe->description }}</p>
                    <a href="{{ route('recipes.show', $recipe->id) }}" class="mt-auto bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">View Recipe</a>
                </div>
            @endforeach
        </div>
        @endif
    </div>
</x-app-layout>
