<x-app-layout>
    <div class="text-center flex flex-col items-center my-4">
        <h3 class="text-4xl font-semibold mb-2">Forum Diskusi</h3>
        <p class="text-xl font-light w-10/12 text-slate-700">Temukan Jawaban: Tanyakan pertanyaan Anda, dan temukan jawaban dari ahli dan sesama pengguna yang berpengalaman.</p>
    </div>
    
    <div class="w-9/12 mx-auto">
        <div class="flex gap-2 items-center">
            <x-search name="diskusi" />
            <x-pink-button href="/forum/create">Buat diskusi</x-pink-button>
        </div>
        <x-categories name="forum" active="{{$active}}"/>
        <div class="flex flex-col gap-4">
            @foreach ($posts as $post)
            <div class="border-b border-slate-300 pb-2">
                <a href="/forum/{{$post->id}}" class="text-3xl">{{$post->title}}</a>
                <p class=" text-slate-500 flex gap-4 my-1">Dipost oleh {{$post->user->name}} <span>{{$post->created_at->diffForHumans()}}</span> <span>{{ $post->comments->count() }} Balasan</span></p>
                <div class="line-clamp-1 ">{!!$post->body!!}</div>
            </div>
            @endforeach
        </div>
    </div>

</x-app-layout>