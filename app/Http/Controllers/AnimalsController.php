<?php

namespace App\Http\Controllers;

use App\Models\Animals;
use App\Models\Health_records;
use Illuminate\Http\Request;

class AnimalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Animals $animal)
    {
        $species = [
            'Anjing',
            'Kucing',
            'Burung',
            'Kelinci',
            'Ayam',
            'Sapi',
            'Kuda',
        ];

        $types = [
            'Perawatan Umum',
            'Vaksin',
            'Pemeriksaan Rutin',
            'Mandi',
            'Obat',
            'Grooming',
        ];

        $id = $animal->id;
        return view('animal.show',[
            'animal' => $animal,
            'health_records' => Health_records::where('animal_id', $id)->get(),
            'species' => $species,
            'types' => $types,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
