<x-app-layout>
    <div class="w-9/12 mx-auto">
        <x-back href="/forum" />
        <h2 class="text-4xl font-semibold mb-6">Buat Diskusi</h2>
        <form method="post" action="/forum" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
            <div class="mb-4">
                <label for="judul" class="block mb-2 text-xl font-medium text-gray-700 dark:text-white">
                    Judul <span class="text-red-600">*</span></label>
                <input type="text" id="judul" name="judul" placeholder="Judul diskusi"
                    value="{{ $post->title }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
            </div>
            <div class="mb-4">
                <label for="kategori" class="block mb-2 text-xl font-medium text-gray-700 dark:text-white">Kategori
                    <span class="text-red-600">*</span></label>
                <select id="kategori" name="kategori"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                    @foreach ($categories as $category)
                        @if ($category == $post->categories->name)
                            <option value="{{ $category }}" selected>{{ $category }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="block mb-2 text-xl font-medium text-gray-700 dark:text-white">
                    Deskripsi <span class="text-red-600">*</span></label>
                <textarea id="deskripsi" name="deskripsi" rows="4" value="{{ $post->body }}"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Deskripsi artikel" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="foto_diskusi">Upload
                    gambar</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="foto_diskusi" name="foto_diskusi" accept=".jpg, .jpeg, .png" type="file" required>
            </div>
            <div class="flex gap-4 items-center">
                <button type="submit"
                    class="w-max focus:outline-none text-white bg-pink-500 hover:bg-pink-600 focus:ring-4 focus:ring-pink-300 font-bold rounded-lg text-base px-5 py-2 dark:bg-pink-600 dark:hover:bg-pink-500 dark:focus:ring-pink-900">Buat</button>
                <a href="/forum"
                    class="w-max focus:outline-none text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 font-bold rounded-lg text-base px-5 py-2 dark:bg-gray-600 dark:hover:bg-gray-500 dark:focus:ring-gray-900">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
