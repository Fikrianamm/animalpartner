<x-app-layout>
    <div class="flex items-start justify-between w-11/12 mx-auto">
        <x-success-toast />
        <div class="grid grid-cols-1 md:grid-cols-3 w-full gap-4">
            <h3 class="text-2xl col-span-3 mb-2 font-semibold">Selamat datang kembali {{ $user->name }}</h3>

            <div class="col-span-2">
                <div class="flex gap-4">
                    <h2 class="text-2xl font-bold">Hewan Anda</h2>

                    <!-- addpet Modal toggle -->
                    <x-modal-toggle name="addpet" />

                    <!-- addpet Main modal -->
                    <x-pet-modal :species="$species" :user="$user">Tambah</x-pet-modal>

                </div>
                <div class="mt-4 grid grid-cols-3 gap-4">
                    @if ($animals->count())
                        @foreach ($animals as $animal)
                            <x-card-animal :animal="$animal" />
                        @endforeach
                    @else
                        <h1>Tambahkan Hewan Anda</h1>
                    @endif
                </div>
            </div>

            <div class="mt-4">
                <div class="flex flex-col">
                    <h3 class="text-2xl mb-2 font-semibold">Chat messages</h3>
                    <div>
                        <a href="/chat"
                            class="relative inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 16">
                                <path
                                    d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                <path
                                    d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                            </svg>
                            <span class="sr-only">Notifications</span>
                            Messages
                            @if ($chats->count())
                                <div
                                    class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900">
                                    {{ $chats->count() }}</div>
                            @endif
                        </a>
                    </div>
                </div>
                <div class="flex gap-4 mt-4">
                    <h2 class="text-2xl font-bold">Jadwal Mendatang</h2>

                    <!-- addschedule Modal toggle -->
                    <x-modal-toggle name="addschedule" />

                    <!-- addschedule Main modal -->
                    <x-schedule-modal :animals="$animals" :types="$types" />

                </div>
                <div
                    class="w-full p-4 mt-4 bg-white border border-gray-200 rounded-lg shadow-md md:max-w-xl grid grid-cols-1">

                    <ol class="relative border-s border-gray-200 dark:border-gray-700">
                        @if ($reminders->count())
                            @foreach ($reminders as $reminder)
                                <x-reminder-item :reminder="$reminder" />
                            @endforeach
                        @else
                            <h1>Tidak ada Jadwal</h1>
                        @endif
                    </ol>
                </div>
            </div>
            <div class="flex flex-col col-span-2 mt-4">
                <h3 class="text-2xl mb-2 font-semibold">Postingan Diskusi Anda</h3>
                <div class="h-80 overflow-y-scroll">
                    @foreach ($posts as $post)
                        <div class="border-b border-slate-300 py-2">
                            <div class="flex justify-between">
                                <a href="/forum/{{ $post->id }}"
                                    class="text-lg hover:text-blue-400">{{ $post->title }}</a>
                                <div class="flex gap-2 mr-2">
                                    <a href="/forum/{{ $post-> id }}/edit"
                                        class="w-max focus:outline-none text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-bold rounded-lg text-base px-3 py-2 dark:bg-blue-600 dark:hover:bg-blue-500 dark:focus:ring-blue-900">Edit</a>
                                    <a href="/forum/{{ $post-> id }}"
                                        class="w-max focus:outline-none text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-bold rounded-lg text-base px-3 py-2 dark:bg-red-600 dark:hover:bg-red-500 dark:focus:ring-red-900">Hapus</a>
                                </div>
                            </div>
                            <div class=" text-slate-500 text-xs flex gap-4 my-1">
                                <span>{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
