<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    {{-- <a href="{{ route('Warehouses.index') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Barcode Index</a> --}}
                </div>
                <div class="flex flex-col p-2 bg-slate-100">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                            <form method="POST" action="{{ route('Warehouses.update', $Warehouse) }}">
                                @csrf
                                @method('PUT')
                                <div class="sm:col-span-6">
                                    <label for="name" class="block text-sm font-medium text-gray-700"> Name *
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="name" name="name"
                                            value="{{ $Warehouse->name }}" required
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('name')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>

                                <div class="sm:col-span-6">
                                    <label for="address" class="block text-sm font-medium text-gray-700"> Address *
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="address" name="address"
                                            value="{{ $Warehouse->name }}" required
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('address')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>

                                <div class="sm:col-span-6">
                                    <label for="brand" class="block text-sm font-medium text-gray-700"> Town *
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="town" name="town"
                                            value="{{ $Warehouse->town }}" required
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('town')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>

                                <div class="sm:col-span-6">
                                    <label for="postalcode" class="block text-sm font-medium text-gray-700"> Postalcode
                                        *
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="postalcode" name="postalcode"
                                            value="{{ $Warehouse->postalcode }}" required
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('postalcode')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>

                                <div class="sm:col-span-6">
                                    <label for="city" class="block text-sm font-medium text-gray-700"> City
                                    </label>
                                    <div class="mt-1">
                                        <select name="city" id="city" value="{{ $Warehouse->city }}" required
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">

                                            <option value="London">London</option>
                                            <option value="Liverpool">Liverpool</option>
                                            <option value="Manchester">Manchester</option>
                                        </select>
                                    </div>

                                    @error('city')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>

                                <div class="sm:col-span-6">
                                    <label for="country" class="block text-sm font-medium text-gray-700"> Country
                                        *
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="country" name="country"
                                            value="{{ $Warehouse->country }}" required
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('country')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>

                                <div class="sm:col-span-6">
                                    <label for="phone" class="block text-sm font-medium text-gray-700"> Phone
                                    </label>
                                    <div class="mt-1">
                                        <input type="number" id="phone" name="phone"
                                            value="{{ $Warehouse->phone }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('phone')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>

                                <div class="sm:col-span-6">
                                    <label for="type" class="block text-sm font-medium text-gray-700"> Type
                                    </label>
                                    <div class="mt-1">
                                        <select name="type" id="type" value="{{ $Warehouse->type }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">

                                            <option value="Fixed" selected='selected'>Fixed</option>
                                            <option value="Mobile">Mobile</option>
                                        </select>
                                    </div>
                                    @error('type')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>

                                <div class="sm:col-span-6">
                                    <label for="fax" class="block text-sm font-medium text-gray-700"> Fax
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="fax" name="fax"
                                            value="{{ $Warehouse->fax }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('fax')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>

                                <div class="sm:col-span-6">
                                    <label for="email" class="block text-sm font-medium text-gray-700"> Email
                                        *
                                    </label>
                                    <div class="mt-1">
                                        <input type="email" id="email" name="email"
                                            value="{{ $Warehouse->email }}" required
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('email')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>

                                <div class="sm:col-span-6">
                                    <label for="note" class="block text-sm font-medium text-gray-700"> Note
                                    </label>
                                    <div class="mt-1">
                                        <textarea type="text" id="note" name="note"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">{{ $Warehouse->note }}</textarea>
                                    </div>
                                    @error('note')
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
