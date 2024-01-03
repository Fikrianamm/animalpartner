<x-app-layout>
    <div class="flex items-start justify-between w-11/12 mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 w-full gap-4">
            <div class="col-span-2">
                <div class="flex gap-4">
                    <h2 class="text-3xl font-bold">Hewan Anda</h2>

                    <!-- addpet Modal toggle -->
                    <x-modal-toggle name="addpet"/>

                    <!-- addpet Main modal -->
                    <x-pet-modal />

                </div>
                <div class="mt-4 grid grid-cols-3 gap-4">
                    @foreach ($animals as $animal)
                        <x-card-animal :animal="$animal" />
                    @endforeach
                </div>
            </div>
            <div class="mt-4">
                <div class="flex gap-4">
                    <h2 class="text-3xl font-bold">Jadwal Mendatang</h2>

                    <!-- addschedule Modal toggle -->
                    <x-modal-toggle name="addschedule"/>

                    <!-- addschedule Main modal -->
                    <x-schedule-modal />

                </div>
                <div
                    class="w-full p-4 mt-4 bg-white border border-gray-200 rounded-lg shadow-md md:max-w-xl grid grid-cols-1">

                    <ol class="relative border-s border-gray-200 dark:border-gray-700">
                        @foreach ($reminders as $reminder)
                            <x-reminder-item :reminder="$reminder"/>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
