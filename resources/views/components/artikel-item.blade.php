@props(['article'])

<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="rounded-t-lg" src="{{ $article->image }}" alt="" />
    </a>
    <div class="p-5">
        <a href="#">
            <a href="/artikel/{{ $article->id }}"
                class="mb-2 line-clamp-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $article->title }}</a>
        </a>
        <div class="mb-3 font-normal text-gray-700 dark:text-gray-400 line-clamp-3">{!! $article->body !!}</div>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $article->created_at->diffForHumans() }}</p>
    </div>
</div>
