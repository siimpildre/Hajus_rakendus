<x-app-layout>
    <head>
        <style>
            #map {
                height: calc(100vh - 4rem); /* Full height minus header or padding */
            }
            @media (max-width: 640px) {
                #map {
                    height: calc(100vh - 2rem); /* Adjust for mobile */
                }
            }
        </style>
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Markers') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8"> 
                    <div class="flex flex-col md:flex-row h-screen">
                        <div id="map" class="flex-1"></div>
                        <div class="p-4 overflow-auto bg-white md:w-1/3 lg:w-1/4 h-full">
                            <h1 class="text-xl font-bold mb-4">Map Markers</h1>
                            <div class="space-y-2 mb-4">
                                @php $limitedMarkers = array_slice($googlemaps->toArray(), -10); @endphp
                                @foreach($limitedMarkers as $marker)
                                    <div class="flex items-center justify-between p-2 rounded shadow">
                                        <div>
                                            <div class="font-semibold">{{ $marker['name'] }}</div>
                                            <div class="text-sm text-gray-600">{{ $marker['description'] }}</div>
                                        </div>
                                        <div class="flex space-x-1">
                                            <a href="{{ route('googlemaps.edit', $marker['id']) }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                                Edit
                                            </a>
                                            <form action="{{ route('googlemaps.destroy', $marker['id']) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this marker?');">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button type="submit" >Delete</x-danger-button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <a href="{{ route('googlemaps.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Add New Marker
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Google Maps API -->
        <script>
            // Prepare marker data
            const googlemapsData = @json($googlemaps);
            function initMap() {
                // Define map options
                const mapOptions = {
                    zoom: 8,
                    center: new google.maps.LatLng(0, 0) // Default center if no googlemaps
                };
                // Initialize map
                const map = new google.maps.Map(document.getElementById('map'), mapOptions);
                const bounds = new google.maps.LatLngBounds();
                // Place googlemaps
                googlemapsData.forEach((data) => {
                    const mapMarker = new google.maps.Marker({
                        position: new google.maps.LatLng(data.latitude, data.longitude),
                        map: map,
                        title: data.name
                    });
                    // Extend the bounds to include this marker's position
                    bounds.extend(mapMarker.getPosition());
                });
                // Only fit the bounds if there are googlemaps
                if (googlemapsData.length > 0) {
                    map.fitBounds(bounds);
                } else {
                    map.setCenter(mapOptions.center);
                }
                // Add map click event listener
                google.maps.event.addListener(map, 'click', function(event) {
                    const markerName = prompt("Enter marker name:", "");
                    if (markerName) {
                        const markerDescription = prompt("Enter marker description:", "");
                        const clickMarker = new google.maps.Marker({
                            position: event.latLng,
                            map: map,
                            title: markerName
                        });
                        const markerData = {
                            name: markerName,
                            latitude: event.latLng.lat(),
                            longitude: event.latLng.lng(),
                            description: markerDescription,
                            _token: '{{ csrf_token() }}'
                        };
                        fetch('{{ route('googlemaps.store') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify(markerData)
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log('Marker saved:', data);
                        })
                        .catch(error => {
                            console.error('Error saving marker:', error);
                        });
                    }
                });
            }
        </script>
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLEMAPS_API_KEY') }}&callback=initMap">
        </script>
    </div>
</x-app-layout>