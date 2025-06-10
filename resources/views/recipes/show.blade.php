<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $recipe->title }}
        </h2>
    </x-slot>
    <div class="container mx-auto py-8">
        <div class="flex flex-col md:flex-row gap-8">
            <div class="md:w-1/2">
                <img src="{{ $recipe->image_url }}" alt="{{ $recipe->title }}" class="rounded-lg mb-4 mx-auto block shadow-md border border-gray-200">
            </div>
            <div class="md:w-1/2">
                <h1 class="text-3xl font-bold mb-2">{{ $recipe->title }}</h1>
                <p class="text-gray-600 mb-2">By {{ $recipe->user->username ?? 'Unknown' }}</p>
                <p class="mb-4">{{ $recipe->description }}</p>
                <div class="mb-4">
                    <span class="inline-block bg-gray-200 rounded px-3 py-1 text-sm font-semibold text-gray-700 mr-2">Category: {{ $recipe->category }}</span>
                    <span class="inline-block bg-gray-200 rounded px-3 py-1 text-sm font-semibold text-gray-700 mr-2">Difficulty: {{ $recipe->difficulty_level }}</span>
                    <span class="inline-block bg-gray-200 rounded px-3 py-1 text-sm font-semibold text-gray-700">Servings: {{ $recipe->servings }}</span>
                </div>
                <div class="mb-4">
                    @foreach($recipe->tags as $tag)
                        <span class="inline-block bg-green-100 text-green-800 rounded px-2 py-1 text-xs font-semibold mr-2">#{{ $tag->name }}</span>
                    @endforeach
                </div>
                <div class="mb-4">
                    <span class="mr-4">Cooking: {{ $recipe->cooking_time }} min</span>
                    <span>Prep: {{ $recipe->preparation_time }} min</span>
                </div>
                <div class="mb-4">
                    <span class="mr-4">Views: {{ $engagement->views_count ?? 0 }}</span>
                    <span class="mr-4">Likes: {{ $engagement->likes_count ?? 0 }}</span>
                    <span>Bookmarks: {{ $engagement->bookmarks_count ?? 0 }}</span>
                </div>
                @php
                    $isBookmarked = false;
                    if (auth()->check()) {
                        $isBookmarked = $recipe->bookmarks->where('user_id', auth()->id())->count() > 0;
                    }
                @endphp
                <div class="flex items-center gap-4 mb-4">
                    @if(auth()->check())
                        <form action="{{ $isBookmarked ? route('bookmarks.destroy', $recipe->id) : route('bookmarks.store', $recipe->id) }}" method="POST">
                            @csrf
                            @if($isBookmarked)
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-black font-bold rounded shadow">
                                    ★ Bookmarked
                                </button>
                            @else
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-yellow-300 text-gray-800 font-bold rounded shadow">
                                    ☆ Bookmark
                                </button>
                            @endif
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 font-bold rounded shadow">☆ Bookmark</a>
                    @endif
                </div>
                @if(auth()->check() && auth()->id() === $recipe->user_id)
                    <a href="{{ route('recipes.edit', $recipe->id) }}" class="inline-block px-4 py-2 bg-blue-500 hover:bg-blue-700 text-black font-bold rounded shadow mb-4">Edit Recipe</a>
                @endif
            </div>
        </div>
        <div class="mt-8">
            <h2 class="text-2xl font-semibold mb-4">Ingredients</h2>
            <ul class="list-disc list-inside mb-8">
                @foreach($recipe->ingredients as $ingredient)
                    <li>{{ $ingredient->quantity }} {{ $ingredient->unit }} {{ $ingredient->name }}</li>
                @endforeach
            </ul>
            <h2 class="text-2xl font-semibold mb-4">Steps</h2>
            <ol class="list-decimal list-inside">
                @foreach($recipe->steps->sortBy('step_number') as $step)
                    <li class="mb-4">
                        <span class="font-bold">Step {{ $step->step_number }}:</span> {{ $step->instruction }}
                        @if($step->image_url)
                            <div><img src="{{ $step->image_url }}" alt="Step {{ $step->step_number }} image" class="rounded mt-2 w-64"></div>
                        @endif
                    </li>
                @endforeach
            </ol>
        </div>
        <div class="mt-8">
            <h2 class="text-2xl font-semibold mb-4">Comments</h2>
            @if(auth()->check())
                <a href="{{ route('comments.create', $recipe->id) }}" class="inline-block mb-4 px-4 py-2 bg-green-500 hover:bg-green-700 text-black font-bold rounded shadow">Add Comment</a>
            @endif
            @if($recipe->comments->count())
                @foreach($recipe->comments as $comment)
                    <div class="mb-4 p-4 bg-gray-100 rounded">
                        <div class="flex items-center mb-2">
                            <span class="font-bold mr-2">{{ $comment->user->username ?? 'User' }}</span>
                            <span class="text-yellow-500">@for($i=0; $i<$comment->rating; $i++)★@endfor</span>
                            @if(auth()->check() && $comment->user_id === auth()->id())
                                <a href="{{ route('comments.edit', $comment->id) }}" class="ml-4 text-blue-600 hover:underline text-xs">Edit</a>
                            @endif
                        </div>
                        <p>{{ $comment->comment_text }}</p>
                    </div>
                @endforeach
            @else
                <p class="text-gray-500">No comments yet.</p>
            @endif
        </div>
    </div>
</x-app-layout>
