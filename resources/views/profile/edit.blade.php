<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h3 class="text-lg font-semibold mb-4">My Recipes</h3>
                @if($user->recipes->isEmpty())
                    <div class="text-gray-500">You haven't created any recipes yet.</div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($user->recipes as $recipe)
                            <div class="bg-gray-50 rounded-lg shadow p-4 flex flex-col">
                                <img src="{{ $recipe->image_url }}" alt="{{ $recipe->title }}" class="rounded mb-4 h-32 w-32 object-cover mx-auto">
                                <h4 class="text-md font-semibold mb-2 text-center">{{ $recipe->title }}</h4>
                                <p class="text-gray-600 text-sm mb-2 text-center">{{ $recipe->category }}</p>
                                <a href="{{ route('recipes.show', $recipe->id) }}" class="mt-auto bg-green-500 hover:bg-green-700 text-black font-bold py-1 px-3 rounded text-center">View</a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
