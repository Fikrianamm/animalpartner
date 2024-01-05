<x-app-layout>
    <div class="flex items-start w-11/12 mx-auto">
        <x-success-toast />
        <div class="grid grid-cols-3 gap-4">
            <h3 class="text-2xl col-span-3 mb-2 font-semibold">Selamat datang kembali {{ $user->name }}</h3>
            <div class="flex gap-4 col-span-2 border border-slate-300 p-2 rounded-md">
                <div class="w-max">
                    <img src="/storage/users-avatar/avatar.png" alt="" class="w-40 h-40 rounded-md object-cover">
                    <x-changeimage-toggle name="changeimage" />
                    <x-changeimage-modal />
                </div>
                <div class="flex-1">
                    <div
                        class="font-normal text-gray-500 dark:text-gray-400 text-left mt-2 flex items-start justify-between ">
                        <div class="flex flex-col gap-2">
                            <span>Spesialis
                                @if ($user->doctor_profil->specialist)
                                    {{ $user->doctor_profil->specialist }}
                                @else
                                    Tambahkan spesialis
                                @endif
                            </span>
                            <span>Bio</span>
                        </div>
                        <x-changeprofil-toggle name="changeprofil" />
                        <x-changeprofil-modal :categories="$categories" />
                    </div>
                    <div class="font-normal text-gray-500 dark:text-gray-400 text-left">
                        @if ($user->doctor_profil->bio)
                            {!! $user->doctor_profil->bio !!}
                        @else
                            Tambahkan bio
                        @endif
                    </div>
                </div>
            </div>
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

            <div class="col-span-2 mt-4">
                <h3 class="text-2xl col-span-3 mb-2 font-semibold">Artikel anda</h3>
                <div class="flex gap-2 items-center">
                    <x-search name="artikel" href="dashboard" />
                    <x-pink-button href="/artikel/create">Tulis Artikel</x-pink-button>
                </div>
                <div class="grid grid-cols-3 gap-4 items-start justify-center mb-4 mt-4">
                    @foreach ($articles as $article)
                        <x-artikel-item :article="$article" />
                    @endforeach
                </div>
                {{ $articles->links() }}
            </div>
            <div class="flex flex-col mt-4">
                <h3 class="text-2xl mb-2 font-semibold">Diskusi Terbaru</h3>
                <div class="h-80 overflow-y-scroll">
                    @foreach ($posts as $post)
                        <div class="border-b border-slate-300 pb-2">
                            <a href="/forum/{{ $post->id }}"
                                class="text-lg hover:text-blue-400">{{ $post->title }}</a>
                            <div class=" text-slate-500 text-xs flex gap-4 my-1">
                                <span>{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    @endforeach
                    <a class="hover:underline text-md font-light" href="/forum">Lihat Semua</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
