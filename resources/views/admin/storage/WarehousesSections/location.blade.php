<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <h1 class="flex justify-center p-2" style="font-family: Times New Roman, Times, serif; font-size: large;">
                    Warehouse Sections
                </h1>
                <div class="flex justify-end p-2">
                    {{-- <a href="{{ route('WarehousesSections.create') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md">Add
                        New Section</a> --}}
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
                                                Location</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Barcode Readable</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Barcode</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    @for ($i = 1; $i <= $warehouse->columns; $i++)
                                                        @for ($j = 1; $j <= $warehouse->rows; $j++)
                                                            @for ($k = 1; $k <= $warehouse->shelves; $k++)
                                                                @for ($l = 1; $l <= $warehouse->racks; $l++)
                                                                    Column: {{ $i }}
                                                                    Row: {{ $j }}
                                                                    Shelf: {{ $k }}
                                                                    Rack: {{ $l }} <br><br>
                                                                @endfor
                                                            @endfor
                                                        @endfor
                                                    @endfor
                                                </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    @for ($i = 1; $i <= $warehouse->columns; $i++)
                                                        @for ($j = 1; $j <= $warehouse->rows; $j++)
                                                            @for ($k = 1; $k <= $warehouse->shelves; $k++)
                                                                @for ($l = 1; $l <= $warehouse->racks; $l++)
                                                                    S{{ $warehouse->id }}
                                                                    C{{ $i }}
                                                                    R{{ $j }}
                                                                    S{{ $k }}
                                                                    R{{ $l }} <br><br>
                                                                @endfor
                                                            @endfor
                                                        @endfor
                                                    @endfor
                                                </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class=" items-center">
                                                    @php
                                                        $war = $warehouse->id;
                                                        $generate = new Picqer\Barcode\BarcodeGeneratorHTML();
                                                    @endphp
                                                    @for ($i = 1; $i <= $warehouse->columns; $i++)
                                                        @for ($j = 1; $j <= $warehouse->rows; $j++)
                                                            @for ($k = 1; $k <= $warehouse->shelves; $k++)
                                                                @for ($l = 1; $l <= $warehouse->racks; $l++)
                                                                    {!! $generate->getBarcode('S' . $war . 'C' . $i . 'R' . $j . 'S' . $k . 'R' . $l, $generate::TYPE_CODE_128) !!}<br>
                                                                @endfor
                                                            @endfor
                                                        @endfor
                                                    @endfor
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex justify-end">
                                                    <div class="  space-x-2">
                                                        @for ($i = 1; $i <= $warehouse->columns; $i++)
                                                            @for ($j = 1; $j <= $warehouse->rows; $j++)
                                                                @for ($k = 1; $k <= $warehouse->shelves; $k++)
                                                                    @for ($l = 1; $l <= $warehouse->racks; $l++)
                                                                        <a href="{{ url('/storage/WarehousesSections' . '/' . $warehouse->id . '/location' . '/S' . $warehouse->id . 'C' . $i . 'R' . $j . 'S' . $k . 'R' . $l) }}"
                                                                            class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Link
                                                                            Product</a> <br> <br>
                                                                    @endfor
                                                                @endfor
                                                            @endfor
                                                        @endfor
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
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
