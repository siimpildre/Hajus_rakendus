<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <form method="POST" action="{{ route('chirps.store') }}">
                    @csrf
                    <textarea
                        name="message"
                        placeholder="{{ __('Mis on sul mõttes?') }}"
                        class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    >{{ old('message') }}</textarea>
                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                    <x-primary-button class="mt-4">{{ __('Postita') }}</x-primary-button>
                </form>

                <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
                @foreach ($chirps as $chirp)
                    <div class="p-6 flex space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>

                        <div class="flex-1">
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="text-gray-800">{{ $chirp->user->name }}</span>
                                    <small class="ml-2 text-sm text-gray-600">{{ $chirp->created_at->format('j M Y, H:i:s') }}</small>
                                    @unless ($chirp->created_at->eq($chirp->updated_at))

                                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>

                                    @endunless

                                    </div>

                                    @if ($chirp->user->is(auth()->user()))

                                    <x-dropdown>

                                    <x-slot name="trigger">

                                        <button>

                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">

                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />

                                            </svg>

                                        </button>

                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('chirps.edit', $chirp)">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>

                                        <!-- Delete chirp form -->
                                        <form method="POST" action="{{ route('chirps.destroy', $chirp) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('chirps.destroy', $chirp)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>


                                    </x-dropdown>

                                    @endif
                            </div>
                            <p class="mt-4 text-lg text-gray-900">{{ $chirp->message }}</p>
                            @if ($chirp->comments)
                                <div class="mt-4">
                                    @foreach ($chirp->comments as $comment)
                                        <div class="flex align-center gap-2 m-2">
                                            <!-- Display comment content -->
                                            <span class="text-gray-600">{{ $comment->user->name }}:</span> {{ $comment->comment }}
                                            @if (auth()->user()->isAdmin() || auth()->user()->id === $comment->user_id)
                                                <form method="POST" action="{{ route('comments.destroy', $comment) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <x-secondary-button onclick="event.preventDefault(); this.closest('form').submit();">
                                                        {{ __('Delete') }}
                                                    </x-secondary-button>
                                                </form>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <form method="POST" action="{{ route('comments.store') }}" class="mt-4">
                                @csrf
                                <input type="hidden" name="chirp_id" value="{{ $chirp->id }}">
                                <div class="form-group">
                                    <textarea name="comment" rows="3" cols="30" class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" placeholder="Add a comment..." required></textarea>
                                </div>
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 disabled:opacity-25 transition">{{ __('Add Comment') }}</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>