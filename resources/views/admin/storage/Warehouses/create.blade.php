<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('Warehouses.index') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Warehouses Index</a>
                </div>
                <div class="flex flex-col">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <form method="POST" action="{{ route('Warehouses.store') }}">
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
                                <label for="address" class="block text-sm font-medium text-gray-700"> Address *
                                </label>
                                <div class="mt-1">
                                    <input type="text" id="address" name="address" required
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
                                    <input type="text" id="town" name="town" required
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('town')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>

                            <div class="sm:col-span-6">
                                <label for="postalcode" class="block text-sm font-medium text-gray-700"> Postalcode *
                                </label>
                                <div class="mt-1">
                                    <input type="number" id="postalcode" name="postalcode" required
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
                                    <select name="city" id="city" required
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                        <option value="">Select</option>
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
                                    <input type="text" id="country" name="country" required
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
                                    <select name="type" id="type"
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
                                    <input type="text" id="email" name="email" required
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
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"></textarea>
                                </div>
                                @error('note')
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
