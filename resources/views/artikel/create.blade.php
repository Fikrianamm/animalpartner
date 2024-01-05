<x-app-layout>
    <div class="w-9/12 mx-auto">
        <x-back href="/dashboard" />
        <h2 class="text-4xl font-semibold mb-6">Tulis Artikel</h2>
        <form method="post" action="/artikel">
            @csrf
            <div class="mb-4">
                <label for="judul" class="block mb-2 text-xl font-medium text-gray-700 dark:text-white">
                    Judul <span class="text-red-600">*</span></label>
                <input type="text" id="judul" name="judul" placeholder="Judul Artikel"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="kategori" class="block mb-2 text-xl font-medium text-gray-700 dark:text-white">Kategori
                    <span class="text-red-600">*</span></label>
                <select id="kategori" name="kategori"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled>Pilih kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="block mb-2 text-xl font-medium text-gray-700 dark:text-white">
                    Deskripsi <span class="text-red-600">*</span></label>
                <textarea id="deskripsi" name="deskripsi" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Deskripsi artikel"></textarea>
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-xl font-medium text-gray-700 dark:text-white">Upload gambar</label>

                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                    to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)
                            </p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" />
                    </label>
                </div>
            </div>
            <div class="flex gap-4 items-center">
                <button type="submit"
                    class="w-max focus:outline-none text-white bg-pink-500 hover:bg-pink-600 focus:ring-4 focus:ring-pink-300 font-bold rounded-lg text-base px-5 py-2 dark:bg-pink-600 dark:hover:bg-pink-500 dark:focus:ring-pink-900">Buat</button>
                <a href="/dashboard"
                    class="w-max focus:outline-none text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 font-bold rounded-lg text-base px-5 py-2 dark:bg-gray-600 dark:hover:bg-gray-500 dark:focus:ring-gray-900">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
