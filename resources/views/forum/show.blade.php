<x-app-layout>
    <div class="w-9/12 mx-auto">
        <x-back href="/forum" />
        <div class="border-b border-slate-300 pb-2">
            <h3 class="text-3xl font-semibold">{{ $post->title }}</h3>
            <div class=" text-slate-500 flex gap-4 my-1">
                Dipost oleh
                <img src="{{ $post->user->image }}" alt="avatar" class="w-7 h-7 rounded-full">
                {{ $post->user->name }}
                <span
                    class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ $post->categories->name }}</span>
                <span>{{ $post->created_at->diffForHumans() }}</span>
            </div>
            <img src="{{ $post->image }}" alt="" class="w-1/2 my-2 rounded-md">
            <div class="my-3">{!! $post->body !!}</div>
            <p class="text-slate-500">{{ $post->comments->count() }} Balasan</p>
        </div>

        @auth
            <form class="flex items-center my-2">
                @csrf

                <div class="relative w-full">
                    <input type="text" id="comment" name="comment"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Balas" required>
                </div>
                <button type="submit"
                    class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <img src="/assets/icons/send.svg" alt="" class="w-4 h-4">
                </button>
            </form>
            @else
            <a href="/login" class="flex items-center my-2">
                <div class="relative w-full">
                    <input type="text" id="comment" name="comment"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Balas" required>
                </div>
                <button type="submit"
                    class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <img src="/assets/icons/send.svg" alt="" class="w-4 h-4">
                </button>
            </a>
        @endauth

        @if ($post->comments->count())
            @foreach ($post->comments as $comment)
                <div class="border-b border-slate-300 py-2">
                    <div class="flex gap-4 justify-start items-center">
                        <div class="flex gap-4 items-center">
                            <img src="{{ $post->user->image }}" alt="avatar" class="w-7 h-7 rounded-full">
                            <h3 class="text-xl font-semibold">{{ $comment->user->name }}</h3>
                            @if ($comment->user->role == 'dokter')
                                <span
                                    class="bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Dokter
                                    Hewan</span>
                            @endif
                            @if ($comment->user->role == 'admin')
                                <span
                                    class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">Admin</span>
                            @endif
                        </div>

                        <span class="text-slate-500">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="my-3">{!! $comment->body !!}</div>
                </div>
            @endforeach

        @endif
    </div>
</x-app-layout>
