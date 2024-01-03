<nav class="bg-white border-gray-200 ">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <div class="flex items-center gap-8">
            <a href="/" class="brand text-2xl">
                Animal Partner
            </a>
            <div class="items-center hidden w-full md:flex md:w-auto">
                <ul
                    class="flex font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-4 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white ">
                    <li>
                        <a href="/"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-rose-700 md:p-0 ">Beranda</a>
                    </li>
                    <li>
                        <a href="/forum"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-rose-700 md:p-0 ">Forum
                            </a>
                    </li>
                    <li>
                        <a href="/artikel"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-rose-700 md:p-0 ">Artikel</a>
                    </li>
                    <li>
                        <a href="/konsultasi"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-rose-700 md:p-0 ">Konsultasi</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            @if (Route::has('login'))
                <div class="flex items-center">
                    @auth
                        <button type="button" class="flex text-sm items-center text-gray-500 hover:text-gray-700"
                            id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                            data-dropdown-placement="bottom">
                            <span class="sr-only">Open user menu</span>
                            <div class="font-medium text-base">{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                        <!-- Dropdown menu -->
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow "
                            id="user-dropdown">
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                <li>
                                    <a href="{{ route('profile.edit') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Profil</a>
                                </li>
                                <li>
                                    <a href="{{ route('dashboard') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Dashboard</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">Log
                                            Out</a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="hidden md:block">
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900">Log
                                in </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="ml-4 px-4 py-2 bg-teal-500 font-semibold text-white hover:bg-teal-600 rounded-md">Register</a>
                            @endif
                        </div>
                    @endauth
                </div>
            @endif

            <button data-collapse-toggle="navbar-user" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 "
                aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:w-auto md:order-1" id="navbar-user">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-200 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white ">
                <li>
                    <a href="/"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-rose-700 md:p-0 ">Beranda</a>
                </li>
                <li>
                    <a href="/forum"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-rose-700 md:p-0 ">Forum
                        </a>
                </li>
                <li>
                    <a href="/artikel"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-rose-700 md:p-0 ">Artikel</a>
                </li>
                <li>
                    <a href="/konsultasi"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-rose-700 md:p-0 ">Konsultasi</a>
                </li>
                @auth
                    @else
                <li>
                    <a href="{{ route('login') }}"
                    class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-rose-700 md:p-0 ">Log
                    in</a>
                </li>
                <li>
                    <a href="{{ route('register') }}"
                    class="block py-2 px-3 rounded bg-teal-500 font-semibold text-white hover:bg-teal-600 md:p-0 ">Register</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
