<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Marker') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8"> 
                    <form action="{{ route('googlemaps.update', $marker->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <x-input-label>Name</x-input-label>
                        <x-text-input type="text" name="name" placeholder="Name" value="{{ $marker->name }}"/>
                        <x-input-label>Latitude</x-input-label>
                        <x-text-input type="text" name="latitude" placeholder="Latitude" value="{{ $marker->latitude }}"/>
                        <x-input-label>Longitude</x-input-label>
                        <x-text-input type="text" name="longitude" placeholder="Longitude" value="{{ $marker->longitude }}"/>
                        <x-input-label>Description</x-input-label>
                        <x-text-input name="description" placeholder="Description" value="{{ $marker->description }}"/>
                        <x-primary-button type="submit">Update Marker</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>