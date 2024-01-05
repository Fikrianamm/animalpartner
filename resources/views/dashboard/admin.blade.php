<x-app-layout>
    <div class="flex items-start w-11/12 mx-auto">
        <x-success-toast />
        <div class="grid grid-cols-3 gap-4">
            <h3 class="text-2xl col-span-3 mb-2 font-semibold">Selamat datang kembali {{ $user->name }}</h3>
            <div class="col-span-2 mt-4">
                <h3 class="text-2xl col-span-3 mb-2 font-semibold">Tinjau Artikel</h3>
                <div class="flex gap-2 items-center">
                    <x-search name="artikel" href="dashboard" />
                </div>
                <div class="grid grid-cols-3 gap-4 items-start justify-center mb-4 mt-4">
                    @foreach ($articles as $article)
                        <x-artikel-item :article="$article" />
                    @endforeach
                </div>
                {{ $articles->links() }}
            </div>
            <div>
                <h3 class="text-2xl col-span-3 mb-2 font-semibold">Kelola Akun</h3>

                <ul role="list"
                    class="max-w-sm divide-y divide-gray-200 dark:divide-gray-700 h-80 overflow-y-scroll">
                    @foreach ($users as $user)
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center space-x-3 rtl:space-x-reverse">
                                <div class="flex-shrink-0">
                                    <img class="w-8 h-8 rounded-full" src="{{ $user->image }}" alt="">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-semibold text-gray-900 truncate dark:text-white">
                                        {{ $user->name }}
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                        Role : {{$user->role}}
                                    </p>
                                </div>

                                <button id="dropdownTopButton" data-dropdown-toggle="dropdown-{{ $user->id }}"
                                    data-dropdown-placement="top"
                                    class="me-3 mb-3 md:mb-0 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    type="button">Ubah role <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 5 5 1 1 5" />
                                    </svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div id="dropdown-{{ $user->id }}"
                                    class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownTopButton">
                                        <form action="">
                                            @csrf
                                            <li>
                                                <div
                                                    class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <input id="default-radio-4" type="radio" value=""
                                                        name="default-radio"
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    <label for="default-radio-4"
                                                        class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Pemilik
                                                        hewan</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div
                                                    class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <input checked id="default-radio-5" type="radio" value=""
                                                        name="default-radio"
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    <label for="default-radio-5"
                                                        class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Dokter</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div
                                                    class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <button type="submit"
                                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-md text-sm px-2 py-1.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 w-full">
                                                        Simpan
                                                    </button>
                                                </div>
                                            </li>
                                        </form>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
</x-app-layout>
