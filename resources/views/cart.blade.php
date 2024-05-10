<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">
                    @if(session('cart'))
                        <?php $total = 0; ?> 
                        <div class="cart">
                            @foreach(session('cart') as $id => $details)
                                <?php $total += $details['price'] * $details['quantity']; ?>
                                <div class="item">
                                    <img src="{{url('images/products/bg4000.jpg')}}" alt="{{ $details['name'] }}" style="width: 100px">
                                    <p>{{ $details['name'] }}</p>
                                    <p>Price: ${{ number_format($details['price'], 2) }}</p>
                                    <p>Quantity: {{ $details['quantity'] }}</p>
                                    <form action="{{ route('update.cart', $id) }}" method="POST">
                                        @csrf
                                        <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1">
                                        <x-secondary-button type="submit">Update</x-secondary-button>
                                    </form>
                                    <div class="m-2">
                                        <a class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150" href="{{ route('remove.from.cart', $id) }}">
                                            Remove
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            <div class="total">
                                <strong>Total: ${{ number_format($total, 2) }}</strong> 
                            </div>
                        </div>
                        <div class="m-2">
                            <form action="{{ route('checkout.checkout') }}" method="POST">
                                @csrf
                                <button class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150" type="submit">
                                    Proceed to Checkout
                                </button>
                            </form>
                        </div>
    
                    @else
                        <p>Your cart is empty!</p>
                    @endif
                    <div class="m-4">
                        <a class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150" href="{{ route('products.index') }}">Back to Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>