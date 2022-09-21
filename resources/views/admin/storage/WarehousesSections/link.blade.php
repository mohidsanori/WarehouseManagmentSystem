<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    {{-- <a href="{{ route('WarehousesSections.index') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Warehouse Section
                        Index</a> --}}
                </div>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                No</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Product</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Total Quantity</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Availiable to Link</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Assign Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @php
                                            $a = 1;
                                        @endphp
                                        @foreach ($product as $role)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        {{ $a . '.' }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        {{ $role->name }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        {{ $role->quantity }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        {{ $role->quantity - $role->linked_quantity }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex justify-end">
                                                        <div class="flex space-x-2">
                                                            <form method="POST"
                                                                action="{{ url('/storage/WarehousesSections' . '/' . $warehouse->id . '/location' . '/' . $location . '/link/assignquantity') }}">
                                                                @csrf
                                                                <div class="sm:col-span-6">
                                                                    <label for="linked_quantity"
                                                                        class="block text-sm font-medium text-gray-700">
                                                                        Quantity
                                                                    </label>
                                                                    <div class="mt-1">
                                                                        <input type="number" id="linked_quantity"
                                                                            name="linked_quantity"
                                                                            value="{{ $role->linked_quantity }}"
                                                                            required
                                                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                                                        <br>
                                                                        <input type="text"
                                                                            value="/ {{ $role->quantity }}" readonly
                                                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                                                    </div>
                                                                    @error('linked_quantity')
                                                                        <span
                                                                            class="text-red-400 text-sm">{{ $message }}</span>
                                                                    @enderror

                                                                </div>
                                                                <input type="hidden" id="product_id" name="product_id"
                                                                    value="{{ $role->id }}" />
                                                                <input type="hidden" id="warehouse_id"
                                                                    name="warehouse_id" value="{{ $warehouse->id }}" />
                                                                <input type="hidden" id="location" name="location"
                                                                    value="{{ $location }}" />
                                                                <div class="sm:col-span-6 pt-5">
                                                                    <button type="submit"
                                                                        class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Assign</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @php
                                                $a++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
