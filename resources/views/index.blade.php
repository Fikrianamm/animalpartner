<x-app-layout>
    <div class=" flex relative justify-end w-11/12 mx-auto">
        <div class="w-4/5 sm:w-2/3 absolute top-20 left-0">
            <h3 class="text-pink-500 text-2xl font-bold">DOKTERPET</h3>
            <h1 class="font-serif text-5xl font-bold text-blue-950 mt-2">Selamat Datang di Website Animal Partner
            </h1>
            <p class="font-light mt-2 text-lg">Konsultasikan Masalah Peliharaan Anda pada Ahlinya</p>
        </div>
        <img class="w-[750px]" src="/assets/animals.png" alt="animals" />
    </div>
    <div class="flex flex-col gap-4 items-center">
        <p class="w-2/3 font-medium text-4xl text-blue-950 text-center">Temukan Jawaban: Tanyakan pertanyaan Anda,
            dan
            temukan jawaban dari ahli dan sesama pengguna yang berpengalaman.</p>
        <x-pink-button href="/forum">Jelajahi Forum</x-pink-button>
    </div>
    <div class="w-11/12 mx-auto my-12 flex flex-col gap-4 items-center">
        <div class="w-full  flex items-center justify-between">
            <h2 class="text-4xl font-bold">Artikel Terbaru</h2>
            <a class="hover:underline text-xl font-light" href="/artikel">Lihat Semua</a>
        </div>
        <div class="grid grid-cols-4 gap-4 items-start justify-center">
            @foreach ($articles as $article)
                <x-artikel-item :article="$article" />
            @endforeach
        </div>
    </div>
</x-app-layout>
