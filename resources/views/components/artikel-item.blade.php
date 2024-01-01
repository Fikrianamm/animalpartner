@props(['article'])

<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="/artikel/{{ $article->id }}">
        <img class="rounded-t-lg" src="/assets/desktop.jpg" alt="" />
    </a>
    <div class="px-3 py-2">
            <a href="/artikel/{{ $article->id }}"
                class="mb-1 line-clamp-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $article->title }}</a>
                <p class="mb-2 w-max bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{$article->categories->name}}</p>
        <div class="mb-2 font-normal text-sm text-gray-700 dark:text-gray-400 line-clamp-3">{!! $article->body !!}</div>
        <p class="mb-1 font-normal text-sm text-gray-700 dark:text-gray-400">{{ $article->created_at->diffForHumans() }}</p>
    </div>
</div>
