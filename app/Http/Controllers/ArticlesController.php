<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $active = null;
        if(request('category')){
            $active = request('category');
        }

        return view('pages.artikel',[
            'active' => $active,
            'latests' => Articles::where('is_approved', true)->latest()->take(8)->get(),
            'articles' => Articles::where('is_approved', true)->latest()->filter(request(['search','category']))->paginate(12)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artikel.create',[
            'categories' => Categories::all(),
        ]);
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
    public function show(Articles $artikel)
    {
        return view('artikel.show',[
            'article' => $artikel,
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
