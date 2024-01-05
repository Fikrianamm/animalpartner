<?php

namespace App\Http\Controllers;

use App\Models\Animals;
use Illuminate\Http\Request;
use App\Models\Health_records;
use Illuminate\Support\Facades\Storage;

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
        $validateData = $request->validate([
            'user_id' => 'required',
            'nama' => 'required',
            'spesies' => 'required',
            'umur' => 'required',
            'foto_hewan' => 'required|image|file|max:10024',
        ]);

        if ($request->file('foto_hewan')) {
            $validateData['foto_hewan'] = $request->file('foto_hewan')->store('animals');
        }

        Animals::create([
            'user_id' => $validateData['user_id'],
            'name' => $validateData['nama'],
            'species' => $validateData['spesies'],
            'age' => $validateData['umur'],
            'image' => $validateData['foto_hewan'],
        ]);

        return redirect('/dashboard')->with('success', 'Add Animal Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Animals $animal)
    {
        $species = ['Anjing', 'Kucing', 'Burung', 'Kelinci', 'Ayam', 'Sapi', 'Kuda'];

        $types = ['Perawatan Umum', 'Vaksin', 'Pemeriksaan Rutin', 'Mandi', 'Obat', 'Grooming'];

        $id = $animal->id;
        return view('animal.show', [
            'animal' => $animal,
            'health_records' => Health_records::where('animal_id', $id)->get(),
            'species' => $species,
            'types' => $types,
            'user' => auth()->user(),
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
    public function update(Request $request, Animals $animal)
    {
        $validateData = $request->validate([
            'user_id' => 'required',
            'nama' => 'required',
            'spesies' => 'required',
            'umur' => 'required',
            'foto_hewan' => 'image|file|max:10024',
        ]);

        if ($request->file('foto_hewan')) {
            if ($animal->image && file_exists(storage_path('app/public/' . $animal->image))) {
                Storage::disk('local')->delete(['public/' . $animal->image]);
                $validateData['foto_hewan'] = $request->file('foto_hewan')->store('animals');
            }
        }

        if ($request->file('foto_hewan')) {
            $animal->update([
                'user_id' => $validateData['user_id'],
                'name' => $validateData['nama'],
                'species' => $validateData['spesies'],
                'age' => $validateData['umur'],
                'image' => $validateData['foto_hewan'],
            ]);
        } else {
            $animal->update([
                'user_id' => $validateData['user_id'],
                'name' => $validateData['nama'],
                'species' => $validateData['spesies'],
                'age' => $validateData['umur'],
            ]);
        }

        return redirect('/dashboard')->with('success', 'Animal Updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animals $animal)
    {
        Animals::destroy($animal->id);
        Storage::disk('local')->delete(['public/' . $animal->image]);
        return redirect('/dashboard')->with('success', 'Animal has been deleted!');
    }
}
