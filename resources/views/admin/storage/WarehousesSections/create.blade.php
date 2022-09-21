<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('WarehousesSections.index') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Warehouse Section
                        Index</a>
                </div>
                <div class="flex flex-col">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <form method="POST" action="{{ route('WarehousesSections.store') }}">
                            @csrf
                            <div class="sm:col-span-6">
                                <label for="warehouse" class="block text-sm font-medium text-gray-700"> Warehouse
                                </label>
                                <div class="mt-1">
                                    <select name="warehouse" id="warehouse" required
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />>
                                    <option value="">--Select--</option>
                                    @foreach ($warehouse as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                @error('warehouse')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>

                            <div class="sm:col-span-6">
                                <label for="section" class="block text-sm font-medium text-gray-700"> Section
                                </label>
                                <div class="mt-1">
                                    <input type="text" id="section" name="section"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('section')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>

                            <div class="sm:col-span-6">
                                <label for="rows" class="block text-sm font-medium text-gray-700"> Rows
                                </label>
                                <div class="mt-1">
                                    <input type="number" id="rows" name="rows" required
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('rows')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>

                            <div class="sm:col-span-6">
                                <label for="columns" class="block text-sm font-medium text-gray-700"> Columns
                                </label>
                                <div class="mt-1">
                                    <input type="number" id="columns" name="columns" required
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('columns')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>

                            <div class="sm:col-span-6">
                                <label for="shelves" class="block text-sm font-medium text-gray-700"> Shelves
                                </label>
                                <div class="mt-1">
                                    <input type="number" id="shelves" name="shelves" required
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('shelves')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>

                            <div class="sm:col-span-6">
                                <label for="racks" class="block text-sm font-medium text-gray-700"> Racks
                                </label>
                                <div class="mt-1">
                                    <input type="number" id="racks" name="racks" required
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('racks')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>

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
