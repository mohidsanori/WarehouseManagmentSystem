<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <h1 class="flex justify-center p-2" style="font-family: Times New Roman, Times, serif; font-size: large;">
                    All Product
                </h1>
                <div class="flex justify-end p-2">
                    <a href="{{ route('barcode.create', $product) }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md">Add
                        New Barcode</a>
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
                                                Barcode Num</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Quantity</th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <div id="active">
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($barcode as $role)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            {{ $i . '.' }}
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            {{ $role->bar_num }}
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            {{ $role->quantity }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="flex justify-end">
                                                            <div class="flex space-x-2">
                                                                <a href="{{ url('/allproducts' . '/' . $role->product_id . '/barcode' . '/' . $role->id . '/print') }}"
                                                                    class="px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded-md">Print</a>
                                                                <a href="{{ url('/allproducts' . '/' . $role->product_id . '/barcode' . '/' . $role->id . '/edit') }}"
                                                                    class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Edit</a>
                                                                <form
                                                                    class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md"
                                                                    method="POST"
                                                                    action="{{ url('/allproducts' . '/' . $role->product_id . '/barcode' . '/' . $role->id . '/destroy') }}"
                                                                    onsubmit="return confirm('Are you sure?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit">Delete</button>
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
                                    </div>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-admin-layout>
