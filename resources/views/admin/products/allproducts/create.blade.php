<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('allproducts.index') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Product Index</a>
                </div>
                <div class="flex flex-col">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <form method="POST" action="{{ route('allproducts.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700"> Name *
                                </label>
                                <div class="mt-1">
                                    <input type="text" id="name" name="name" required
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
                                    <select name="type" id="type"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />>
                                    <option value="">--Select--</option>
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
                                    <select name="brand" id="brand"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />>
                                    <option value="">--Select--</option>
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
                                    <select name="category" id="category"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />>
                                    <option value="">--Select--</option>
                                    @foreach ($category as $catitems)
                                        <option value="{{ $catitems->id }}">{{ $catitems->title }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                @error('category')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="product_status">
                                <input type="hidden" id="status" name="status" value="active" />
                            </div>
                            <br>

                            <div class="sm:col-span-6">
                                <label for="description" class="block text-sm font-medium text-gray-700"> Description
                                </label>
                                <div class="mt-1">
                                    <textarea type="text" id="description" name="description"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"></textarea>
                                </div>
                                @error('description')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>

                            <div class="sm:col-span-6">
                                <label for="min_stock" class="block text-sm font-medium text-gray-700"> Min Stock Level *
                                </label>
                                <div class="mt-1">
                                    <input type="number" id="min_stock" name="min_stock" required
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('min_stock')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>

                            <div class="sm:col-span-6">
                                <label for="reorder" class="block text-sm font-medium text-gray-700"> Re-order Level
                                </label>
                                <div class="mt-1">
                                    <input type="number" id="reorder" name="reorder"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('reorder')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>

                            <div class="sm:col-span-6">
                                <label for="sale_price" class="block text-sm font-medium text-gray-700"> Sale Price
                                </label>
                                <div class="mt-1">
                                    <input type="number" step="any" id="sale_price" name="sale_price"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('sale_price')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>

                            <div class="sm:col-span-6">
                                <label for="product_image" class="block text-sm font-medium text-gray-700"> Product
                                    Image
                                </label>
                                <div class="mt-1">
                                    <input type="file" id="product_image" name="product_image"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('product_image')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="sm:col-span-6 pt-5">
                                <button type="submit"
                                    class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Create</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
