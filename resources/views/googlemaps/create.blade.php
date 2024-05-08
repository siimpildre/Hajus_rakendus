<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form action="{{ route('googlemaps.create') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="latitude" placeholder="Latitude">
            <input type="text" name="longitude" placeholder="Longitude">
            <textarea name="description" placeholder="Description"></textarea>
            <button type="submit">Add Marker</button>
        </form>
    </div>
</x-app-layout>