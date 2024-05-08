<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8"> 
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Product</th>
                                <th scope="col" class="px-6 py-3">Description</th>
                                <th scope="col" class="px-6 py-3">Price</th>
                                <th scope="col" class="px-6 py-3">Add to Cart</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">
                                        <img src="{{ asset('images/products/image1.jpg') }}" alt="Product Name" style="width: 100px">
                                        {{ $product->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $product->description }}
                                    </td>
                                    <td class="px-6 py-4">
                                        ${{ number_format($product->price, 2) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700" href="{{ route('add.to.cart', $product->id) }}">Add to Cart</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="m-2">
                        <a class="bg-red-500 text-white py-2 px-4 rounded hover:bg-blue-700" href="{{ route('cart') }}">To Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
