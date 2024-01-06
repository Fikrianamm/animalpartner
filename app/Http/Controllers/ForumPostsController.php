<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Forum_posts;
use Illuminate\Http\Request;

class ForumPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $active = 'Semua';
        if(request('category')){
            $active = request('category');
        }

        return view('pages.forum',[
            'active' => $active,
            'posts' => Forum_posts::latest()->filter(request(['search','category']))->paginate(5)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        return view('forum.create',[
            'categories' => Categories::all(),
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'user_id' => 'required',
            'judul' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'foto_diskusi' => 'image|file|max:10024',
        ]);

        if ($request->file('foto_diskusi')) {
            $validateData['foto_diskusi'] = $request->file('foto_diskusi')->store('diskusi');
        }

        Forum_posts::create([
            'user_id' => $validateData['user_id'],
            'categories_id' => $validateData['kategori'],
            'title' => $validateData['judul'],
            'body' => $validateData['deskripsi'],
            'image' => $validateData['foto_diskusi'],
        ]);

        return redirect('/forum')->with('success', 'Add Disscusses Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Forum_posts $forum)
    {
        return view('forum.show',[
            'post' => $forum,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Forum_posts $forum)
    {
        return view('forum.edit',[
            'post' => $forum,
            'user' => auth()->user(),
            'categories' => Categories::all(),

        ]);
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
