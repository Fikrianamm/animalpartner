<x-app-layout>
    <div class="w-9/12 mx-auto">
        <div class="flex gap-2">
            <div class=" w-8/12">
                <h2 class="text-2xl font-semibold mb-2">Artikel Terbaru</h2>
                <div class="relative">
                    <img src="/assets/desktop.jpg" alt="" class="w-full h-[412px] rounded-md">
                    <a href="/artikel/{{ $latest[0]->id }}"
                        class="absolute bottom-0 rounded-b-md left-0 px-4 py-8 w-full bg-gradient-to-t from-gray-950 hover:from-gray-700 to-transparent text-white">
                        <h3 class="text-3xl font-semibold line-clamp-2">{{ $latest[0]->title }}</h3>
                        <p class="text-slate-400">{{ $latest[0]->created_at->diffForHumans() }}</p>
                    </a>
                </div>
            </div>
            <div class="overflow-y-scroll h-[452px] rounded-md w-4/12">
                <div class="flex p-2 gap-2">
                    <img src="/assets/desktop.jpg" alt="" class="w-24 h-16  rounded-md">
                    <div class="flex flex-col justify-between">
                        <a href="/artikel{{$latest[1]->id}}" class="text-sm line-clamp-2 font-semibold">{{ $latest[1]->title }}</a>
                        <div class="flex gap-2">
                        <span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{$latest[1]->categories->name}}</span>
                        <small class="text-slate-500 text-sm">{{$latest[1]->created_at->diffForHumans()}}</small>
                        </div>
                    </div>
                </div>
                <div class="flex p-2 gap-2">
                    <img src="/assets/desktop.jpg" alt="" class="w-24 h-16  rounded-md">
                    <div class="flex flex-col justify-between">
                        <a href="/artikel{{$latest[2]->id}}" class="text-sm line-clamp-2 font-semibold">{{ $latest[2]->title }}</a>
                        <div class="flex gap-2">
                        <span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{$latest[2]->categories->name}}</span>
                        <small class="text-slate-500 text-sm">{{$latest[2]->created_at->diffForHumans()}}</small>
                        </div>
                    </div>
                </div>
                <div class="flex p-2 gap-2">
                    <img src="/assets/desktop.jpg" alt="" class="w-24 h-16  rounded-md">
                    <div class="flex flex-col justify-between">
                        <a href="/artikel{{$latest[3]->id}}" class="text-sm line-clamp-2 font-semibold">{{ $latest[3]->title }}</a>
                        <div class="flex gap-2">
                        <span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{$latest[3]->categories->name}}</span>
                        <small class="text-slate-500 text-sm">{{$latest[3]->created_at->diffForHumans()}}</small>
                        </div>
                    </div>
                </div>
                <div class="flex p-2 gap-2">
                    <img src="/assets/desktop.jpg" alt="" class="w-24 h-16  rounded-md">
                    <div class="flex flex-col justify-between">
                        <a href="/artikel{{$latest[4]->id}}" class="text-sm line-clamp-2 font-semibold">{{ $latest[4]->title }}</a>
                        <div class="flex gap-2">
                        <span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{$latest[4]->categories->name}}</span>
                        <small class="text-slate-500 text-sm">{{$latest[4]->created_at->diffForHumans()}}</small>
                        </div>
                    </div>
                </div>
                <div class="flex p-2 gap-2">
                    <img src="/assets/desktop.jpg" alt="" class="w-24 h-16  rounded-md">
                    <div class="flex flex-col justify-between">
                        <a href="/artikel{{$latest[5]->id}}" class="text-sm line-clamp-2 font-semibold">{{ $latest[5]->title }}</a>
                        <div class="flex gap-2">
                        <span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{$latest[5]->categories->name}}</span>
                        <small class="text-slate-500 text-sm">{{$latest[5]->created_at->diffForHumans()}}</small>
                        </div>
                    </div>
                </div>
                <div class="flex p-2 gap-2">
                    <img src="/assets/desktop.jpg" alt="" class="w-24 h-16  rounded-md">
                    <div class="flex flex-col justify-between">
                        <a href="/artikel{{$latest[6]->id}}" class="text-sm line-clamp-2 font-semibold">{{ $latest[6]->title }}</a>
                        <div class="flex gap-2">
                        <span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{$latest[6]->categories->name}}</span>
                        <small class="text-slate-500 text-sm">{{$latest[6]->created_at->diffForHumans()}}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-16" >
            <x-search name="artikel"/>
            <x-categories name="artikel" active="{{$active}}"/>
        </div>
        <div class="grid grid-cols-4 gap-4 items-start justify-center">
        @foreach ($articles as $article)
            <x-artikel-item :article="$article"/>
        @endforeach
        </div>
    </div>
</x-app-layout>
