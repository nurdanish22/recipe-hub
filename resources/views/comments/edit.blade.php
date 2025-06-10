<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Comment
        </h2>
    </x-slot>
    <div class="container mx-auto py-8">
        <form method="POST" action="{{ route('comments.update', $comment->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <x-input-label for="comment_text" :value="__('Comment')" />
                <textarea id="comment_text" name="comment_text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ old('comment_text', $comment->comment_text) }}</textarea>
                <x-input-error :messages="$errors->get('comment_text')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="rating" :value="__('Rating (1-5)')" />
                <x-text-input id="rating" name="rating" type="number" min="1" max="5" class="mt-1 block w-24" :value="old('rating', $comment->rating)" required />
                <x-input-error :messages="$errors->get('rating')" class="mt-2" />
            </div>
            <div class="flex justify-end">
                <x-primary-button>{{ __('Update Comment') }}</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
