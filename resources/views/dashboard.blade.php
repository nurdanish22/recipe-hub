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

<div class="mt-10 mx-auto max-w-6xl px-4">
    <h3 class="text-2xl font-bold mb-6 text-gray-800">🍽 Recently Added Recipes</h3>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Recipe Card 1 -->
        <div class="p-5 bg-orange-100 border border-orange-200 rounded-2xl shadow-md hover:shadow-lg transition">
            <h4 class="font-semibold text-lg mb-1 text-gray-900">Nasi Goreng Kampung</h4>
            <p class="text-sm text-gray-700">Simple and spicy village-style fried rice.</p>
        </div>

        <!-- Recipe Card 2 -->
        <div class="p-5 bg-green-100 border border-green-200 rounded-2xl shadow-md hover:shadow-lg transition">
            <h4 class="font-semibold text-lg mb-1 text-gray-900">Pasta Aglio e Olio</h4>
            <p class="text-sm text-gray-700">Garlic and olive oil pasta, ready in 15 minutes.</p>
        </div>

        <!-- Recipe Card 3 -->
        <div class="p-5 bg-blue-100 border border-blue-200 rounded-2xl shadow-md hover:shadow-lg transition">
            <h4 class="font-semibold text-lg mb-1 text-gray-900">Banana Pancakes</h4>
            <p class="text-sm text-gray-700">Fluffy, sweet, and perfect for breakfast.</p>
        </div>
    </div>
</div>

</x-app-layout>
