<x-app-layout>
    <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welcome to Recipe Hub!
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

<div class="mt-10 mx-auto max-w-5xl px-4">
    <h3 class="text-2xl font-bold mb-6 text-gray-800">🍽 Recently Added Recipes</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 justify-center">
        @foreach($recipes as $recipe)
            <div class="p-6 bg-white border-2 border-grey-600 rounded-xl shadow-md hover:shadow-lg transition flex flex-col items-start mx-auto w-full max-w-xs mb-6">
                <h4 class="font-semibold text-lg mb-2 text-gray-900">{{ $recipe->title }}</h4>
                <p class="text-sm text-gray-700 mb-3 line-clamp-2">{{ $recipe->description }}</p>
                <a href="{{ route('recipes.show', $recipe->id) }}" class="mt-auto inline-block border-2 bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">View Recipe</a>
            </div>
        @endforeach
    </div>
</div>

</x-app-layout>

<!--         <div class="p-5 bg-orange-100 border border-orange-200 rounded-2xl shadow-md hover:shadow-lg transition">
            <h4 class="font-semibold text-lg mb-1 text-gray-900">Nasi Goreng Kampung</h4>
            <p class="text-sm text-gray-700">Simple and spicy village-style fried rice.</p>
        </div> -->