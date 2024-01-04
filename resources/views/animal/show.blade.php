<x-app-layout>
    <div class="flex items-start justify-between w-11/12 mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 w-full gap-4">
            <div class="col-span-2">
                <div class="flex gap-4">
                    <h2 class="text-3xl font-bold">Hewan Anda</h2>
                </div>
                <div class="mt-4 grid grid-cols-3 gap-4">
                        <x-card-animal-show :animal="$animal" :species="$species"/>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex gap-4">
                    <h2 class="text-3xl font-bold">Riwayat Kesehatan</h2>

                    <!-- addnote Modal toggle -->
                    <x-modal-toggle name="addnote"/>

                    <!-- addnote Main modal -->
                    <x-note-modal :types="$types" :animal="$animal"/>

                </div>
                <div
                    class="w-full p-4 mt-4 bg-white border border-gray-200 rounded-lg shadow-md md:max-w-xl grid grid-cols-1">

                    <ol class="relative border-s border-gray-200 dark:border-gray-700">
                        @foreach ($health_records as $health_record)
                            <x-health-record :health_record="$health_record"/>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>