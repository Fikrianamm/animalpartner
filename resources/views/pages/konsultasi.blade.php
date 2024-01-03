<x-app-layout>
    <div class="text-center flex flex-col items-center my-4">
        <h3 class="text-4xl font-semibold mb-2">Konsultasi</h3>
        <p class="text-xl font-light w-10/12 text-slate-700">Konsultasikan masalah kesehatan hewan Anda dengan dokter
            hewan berpengalaman dan peduli.</p>
    </div>
    <div class="w-9/12 mx-auto">
        <x-search name="dokter" href="konsultasi" />
        <div class="grid grid-cols-3 gap-4 mt-8">
            @foreach ($doctors as $doctor)
                <x-doctor-card :doctor="$doctor"/>

                <!-- Doctor modal -->
                <x-doctor-modal :doctor="$doctor"/>
            @endforeach
            {{ $doctors->links() }}
        </div>
    </div>
</x-app-layout>
