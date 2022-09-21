<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('barcode.index', $product) }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Barcode Index</a>
                </div>
                <div class="flex flex-col p-2 bg-slate-100">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                            <form method="POST"
                                action="{{ url('/allproducts' . '/' . $barcode->product_id . '/barcode' . '/' . $barcode->id . '/update') }}">
                                @csrf
                                <div class="sm:col-span-6">
                                    <label for="bar_num" class="block text-sm font-medium text-gray-700"> Barcode *
                                    </label>
                                    <button class="px-4 py-2 bg-blue-300 hover:bg-blue-500 rounded-md"
                                        style="float: right"
                                        onclick="getElementById('bar_num').value=Math.floor(Math.random()*10000000000000)">Generate</button>
                                    <div class="mt-1">
                                        <input type="number" id="bar_num" name="bar_num"
                                            value="{{ $barcode->bar_num }}" required
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('bar_num')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>

                                <div class="sm:col-span-6">
                                    <label for="quantity" class="block text-sm font-medium text-gray-700"> Quantity
                                        *
                                    </label>
                                    <div class="mt-1">
                                        <input type="number" id="quantity" name="quantity"
                                            value="{{ $barcode->quantity }}" required
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('quantity')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <div class="sm:col-span-6 pt-5">
                                    <button type="submit"
                                        class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
