<x-app-layout>
    <div class="text-center flex flex-col items-center my-4">
        <h3 class="text-4xl font-semibold mb-2">Forum Diskusi</h3>
        <p class="text-xl font-light w-10/12 text-slate-700">Temukan Jawaban: Tanyakan pertanyaan Anda, dan temukan
            jawaban dari ahli dan sesama pengguna yang berpengalaman.</p>
    </div>

    <div class="w-9/12 mx-auto">
        <div class="flex gap-2 items-center">
            <x-search name="diskusi" href="forum"/>
            @auth
            <x-pink-button href="/forum/create">Buat diskusi</x-pink-button>
            @else
            <x-pink-button href="/login">Buat diskusi</x-pink-button>
            @endauth
        </div>
        <x-categories name="forum" active="{{ $active }}" />
        <div class="flex flex-col gap-4 mb-4">
            @foreach ($posts as $post)
                <x-forum-post :post="$post"/>
            @endforeach
        </div>
        {{ $posts->links() }}

    </div>

</x-app-layout>
