<x-app-layout>
    <div class="w-9/12 mx-auto">
        <x-back href="/artikel" />
        <div class="border-b border-slate-300 pb-2">
            <h3 class="text-3xl font-semibold">{{ $article->title }}</h3>
            <div class=" text-slate-500 flex gap-4 my-1">
                Dipost oleh
                <img src="{{ $article->user->image }}" alt="avatar" class="w-7 h-7 rounded-full">
                {{ $article->user->name }}
                <span
                    class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ $article->categories->name }}</span>
                <span>{{ $article->created_at->diffForHumans() }}</span>
            </div>
            <img src="{{ $article->image }}" alt="" class="w-1/2 my-2 rounded-md">
            <div class="my-3">{!! $article->body !!}</div>
        </div>

    </div>
</x-app-layout>
