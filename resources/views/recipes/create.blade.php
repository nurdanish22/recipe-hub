<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Recipe
        </h2>
    </x-slot>
    <div class="container mx-auto py-8">
        <form method="POST" action="{{ route('recipes.store') }}">
            @csrf
            <div class="mb-4">
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required autofocus />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="description" :value="__('Description')" />
                <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ old('description') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="category" :value="__('Category')" />
                <x-text-input id="category" name="category" type="text" class="mt-1 block w-full" :value="old('category')" required />
                <x-input-error :messages="$errors->get('category')" class="mt-2" />
            </div>
            <div class="mb-4 flex gap-4">
                <div class="w-1/2">
                    <x-input-label for="cooking_time" :value="__('Cooking Time (min)')" />
                    <x-text-input id="cooking_time" name="cooking_time" type="number" class="mt-1 block w-full" :value="old('cooking_time')" required />
                    <x-input-error :messages="$errors->get('cooking_time')" class="mt-2" />
                </div>
                <div class="w-1/2">
                    <x-input-label for="preparation_time" :value="__('Preparation Time (min)')" />
                    <x-text-input id="preparation_time" name="preparation_time" type="number" class="mt-1 block w-full" :value="old('preparation_time')" required />
                    <x-input-error :messages="$errors->get('preparation_time')" class="mt-2" />
                </div>
            </div>
            <div class="mb-4 flex gap-4">
                <div class="w-1/2">
                    <x-input-label for="difficulty_level" :value="__('Difficulty Level')" />
                    <x-text-input id="difficulty_level" name="difficulty_level" type="text" class="mt-1 block w-full" :value="old('difficulty_level')" required />
                    <x-input-error :messages="$errors->get('difficulty_level')" class="mt-2" />
                </div>
                <div class="w-1/2">
                    <x-input-label for="servings" :value="__('Servings')" />
                    <x-text-input id="servings" name="servings" type="number" class="mt-1 block w-full" :value="old('servings')" required />
                    <x-input-error :messages="$errors->get('servings')" class="mt-2" />
                </div>
            </div>
            <div class="mb-4">
                <x-input-label for="image_url" :value="__('Image URL')" />
                <x-text-input id="image_url" name="image_url" type="text" class="mt-1 block w-full" :value="old('image_url')" required />
                <x-input-error :messages="$errors->get('image_url')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="tags" :value="__('Tags (comma separated)')" />
                <x-text-input id="tags" name="tags" type="text" class="mt-1 block w-full" :value="old('tags')" placeholder="e.g. vegan, spicy, dessert" />
                <x-input-error :messages="$errors->get('tags')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="ingredients" :value="__('Ingredients (one per line: quantity unit name)')" />
                <textarea id="ingredients" name="ingredients" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" rows="4" placeholder="e.g. 200 g Spaghetti&#10;2 pcs Eggs">{{ old('ingredients') }}</textarea>
                <x-input-error :messages="$errors->get('ingredients')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="steps" :value="__('Steps (one per line: instruction)')" />
                <textarea id="steps" name="steps" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" rows="4" placeholder="e.g. Boil the spaghetti&#10;Fry the pancetta.">{{ old('steps') }}</textarea>
                <x-input-error :messages="$errors->get('steps')" class="mt-2" />
            </div>
            <div class="flex justify-end">
                <x-primary-button>{{ __('Create Recipe') }}</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
