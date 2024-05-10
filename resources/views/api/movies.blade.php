<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movies') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8"> 
                    <table class="w-full text-sm text-left text-gray-800">
                        <thead class="text-xs text-gray-300 uppercase bg-indigo-700">
                            <tr>
                                <th scope="col" class="px-6 py-3">Movie</th>
                                <th scope="col" class="px-6 py-3">Image</th>
                                <th scope="col" class="px-6 py-3">Description</th>
                                <th scope="col" class="px-6 py-3">Movie rating</th>
                                <th scope="col" class="px-6 py-3">Ranking</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($movies as $movie)
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4">
                                        {{ $movie['title'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                    <img src="{{ $movie['image'] }}" alt="{{ $movie['title'] }}" class="product-image hover:scale-150" width="50" height="50">
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $movie['description'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $movie['movie_rating'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $movie['rank'] }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>