<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex justify-end p-2">
                </div>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <form action="">
                                    <label for="">Search: </label>
                                    <input type="search" name="search" id="" class="form-control"
                                        value="{{ $search }}"><br>
                                    <p>Enter Product Barcode here</p><br>
                                    <button
                                        class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col p-2 bg-slate-100">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            No.</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Quantity</th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($barcode as $barcode)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    {{ $i . '.' }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    {{ $barcode->products->name }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    {{ $barcode->products->quantity }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex justify-end">
                                                    <div class="flex space-x-2">
                                                        <form method="POST"
                                                            action="{{ route('inventory.stockin.update', $barcode->products->id) }}">
                                                            @csrf
                                                            <div class="sm:col-span-6">
                                                                <label for="quantity"
                                                                    class="block text-sm font-medium text-gray-700">
                                                                </label>
                                                                <div class="mt-1">
                                                                    <input type="number" id="stockin" name="stockin"
                                                                        required
                                                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                                                </div>
                                                                @error('stockin')
                                                                    <span
                                                                        class="text-red-400 text-sm">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="sm:col-span-6 pt-5">
                                                                <button type="submit"
                                                                    class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Stock
                                                                    In</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex justify-end">
                                                    <div class="flex space-x-2">
                                                        <form method="POST"
                                                            action="{{ route('inventory.stockout.update', $barcode->products->id) }}">
                                                            @csrf
                                                            <div class="sm:col-span-6">
                                                                <label for="quantity"
                                                                    class="block text-sm font-medium text-gray-700">
                                                                </label>
                                                                <div class="mt-1">
                                                                    <input type="number" id="stockout" name="stockout"
                                                                        required
                                                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                                                </div>
                                                                @error('stockout')
                                                                    <span
                                                                        class="text-red-400 text-sm">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="sm:col-span-6 pt-5">
                                                                <button type="submit"
                                                                    class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Stock
                                                                    Out</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex justify-end">
                                                    <div class="flex space-x-2">
                                                        <form method="POST"
                                                            action="{{ route('inventory.bulk.update', $barcode->products->id) }}">
                                                            @csrf
                                                            <div class="sm:col-span-6">
                                                                <label for="quantity"
                                                                    class="block text-sm font-medium text-gray-700">
                                                                </label>
                                                                <div class="mt-1">
                                                                    <input type="number" id="bulk" name="bulk"
                                                                        required
                                                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                                                </div>
                                                                @error('bulk')
                                                                    <span
                                                                        class="text-red-400 text-sm">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="sm:col-span-6 pt-5">
                                                                <button type="submit"
                                                                    class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Stock
                                                                    Quantity</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</x-admin-layout>
