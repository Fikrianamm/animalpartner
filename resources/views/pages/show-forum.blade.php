<x-app-layout>
    <h1>show forum</h1>
    <div class="border-b border-slate-300 pb-2">
        <a href="/forum/{{ $post->title }}" class="text-3xl">{{ $post->title }}</a>
        <p class=" text-slate-500 flex gap-4 my-1">Dipost oleh {{ $post->user->name }}
            <span>{{ $post->created_at->diffForHumans() }}</span> <span>{{ $post->comments->count() }} Balasan</span>
        </p>
        <div class="line-clamp-1 ">{!! $post->body !!}</div>
    </div>
</x-app-layout>
