<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('allproducts.index') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Products Index</a>
                </div>
                <div class="flex justify-start p-2">
                    <a href="#" onclick="show('active');" class="px-4 py-2 bg-blue-400 hover:bg-blue-200 rounded-md">
                        Product</a>&nbsp;

                    <a href="barcode" class="px-4 py-2 bg-blue-400 hover:bg-blue-200 rounded-md">Barcodes</a>&nbsp;

                    <a href="#" onclick="show('active');"
                        class="px-4 py-2 bg-blue-400 hover:bg-blue-200 rounded-md">Linked Stores</a>&nbsp;

                    <a href="#" onclick="show('active');"
                        class="px-4 py-2 bg-blue-400 hover:bg-blue-200 rounded-md">Inventory</a>&nbsp;

                    <a href="#" onclick="show('active');"
                        class="px-4 py-2 bg-blue-400 hover:bg-blue-200 rounded-md">Prices</a>&nbsp;

                    <a href="#" onclick="show('active');"
                        class="px-4 py-2 bg-blue-400 hover:bg-blue-200 rounded-md">Activity</a>&nbsp;

                </div>
                <div class="flex flex-col p-2 bg-slate-100">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <div id="product">
                            <form method="POST" action="{{ route('allproducts.update', $product) }}">
                                @csrf
                                @method('PUT')
                                <div class="sm:col-span-6">
                                    <label for="name" class="block text-sm font-medium text-gray-700"> Name *
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="name" name="name" value="{{ $product->name }}"
                                            required
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('name')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>

                                <div class="sm:col-span-6">
                                    <label for="type" class="block text-sm font-medium text-gray-700"> Type *
                                    </label>
                                    <div class="mt-1">
                                        <select name="type" id="type" value="{{ $product->type }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />>
                                        @foreach ($type as $catitems)
                                            <option value="{{ $catitems->id }}">{{ $catitems->title }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    @error('type')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>

                                <div class="sm:col-span-6">
                                    <label for="brand" class="block text-sm font-medium text-gray-700"> Brand *
                                    </label>
                                    <div class="mt-1">
                                        <select name="brand" id="brand" value="{{ $product->brand }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />>
                                        @foreach ($brand as $catitems)
                                            <option value="{{ $catitems->id }}">{{ $catitems->title }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    @error('brand')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>

                                <div class="sm:col-span-6">
                                    <label for="category" class="block text-sm font-medium text-gray-700"> Category *
                                    </label>
                                    <div class="mt-1">
                                        <select name="category" id="category" value="{{ $product->category }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />>
                                        @foreach ($category as $catitems)
                                            <option value="{{ $catitems->id }}">{{ $catitems->title }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    @error('category')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>

                                <div class="sm:col-span-6">
                                    <label for="status" class="block text-sm font-medium text-gray-700"> Status
                                    </label>
                                    <div class="mt-1">
                                        <select name="status" id="status" value="{{ $product->status }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                    @error('category')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>

                                <div class="sm:col-span-6">
                                    <label for="description" class="block text-sm font-medium text-gray-700">
                                        Description
                                    </label>
                                    <div class="mt-1">
                                        <textarea type="text" id="description" name="description"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"> {{ $product->description }}</textarea>
                                    </div>
                                    @error('description')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>

                                <div class="sm:col-span-6">
                                    <label for="min_stock" class="block text-sm font-medium text-gray-700"> Min Stock
                                        Level
                                    </label>
                                    <div class="mt-1">
                                        <input type="number" id="min_stock" name="min_stock"
                                            value="{{ $product->min_stock }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('min_stock')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>

                                <div class="sm:col-span-6">
                                    <label for="reorder" class="block text-sm font-medium text-gray-700"> Re-order
                                        Level
                                    </label>
                                    <div class="mt-1">
                                        <input type="number" id="reorder" name="reorder"
                                            value="{{ $product->reorder }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('reorder')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>

                                <div class="sm:col-span-6">
                                    <label for="sale_price" class="block text-sm font-medium text-gray-700"> Sale
                                        Price
                                    </label>
                                    <div class="mt-1">
                                        <input type="number" step="any" id="sale_price" name="sale_price"
                                            value="{{ $product->sale_price }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('sale_price')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>

                                <div class="sm:col-span-6">
                                    <label for="product_image" class="block text-sm font-medium text-gray-700">
                                        Product
                                        Image
                                    </label>
                                    <div class="mt-1">
                                        <input type="file" id="product_image" name="product_image"
                                            value="{{ $product->image }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('product_image')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
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
