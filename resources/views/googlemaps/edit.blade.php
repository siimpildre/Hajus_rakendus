<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-8 flex flex-col-2"> 
            <form action="{{ route('googlemaps.update', $marker->id) }}" method="POST">
                @csrf
                @method('PUT')
                <x-text-input type="text" name="name" placeholder="Name" value="{{ $marker->name }}"/>
                <x-text-input type="text" name="latitude" placeholder="Latitude" value="{{ $marker->latitude }}"/>
                <x-text-input type="text" name="longitude" placeholder="Longitude" value="{{ $marker->longitude }}"/>
                <x-text-input name="description" placeholder="Description" value="{{ $marker->description }}"/>
                <x-primary-button type="submit">Update Marker</x-primary-button>
            </form>
            </div>
        </div>
    </div>
</x-app-layout>