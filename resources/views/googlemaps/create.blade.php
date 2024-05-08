<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-8 flex flex-col-2"> 
            <form action="{{ route('googlemaps.create') }}" method="POST">
                @csrf
                <x-text-input type="text" name="name" placeholder="Name"/>
                <x-text-input type="text" name="latitude" placeholder="Latitude"/>
                <x-text-input type="text" name="longitude" placeholder="Longitude"/>
                <x-text-input name="description" placeholder="Description"></x-text-input>
                <x-primary-button type="submit">Add Marker</x-primary-button>
            </form>
            </div>
        </div>
    </div>
</x-app-layout>