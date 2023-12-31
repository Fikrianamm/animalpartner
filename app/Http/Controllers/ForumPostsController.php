<?php

namespace App\Http\Controllers;

use App\Models\Forum_posts;
use Illuminate\Http\Request;

class ForumPostsController extends Controller
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

        return view('pages.forum',[
            'active' => $active,
            'posts' => Forum_posts::latest()->filter(request(['search','category']))->get()
        ]);
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
    public function show(Forum_posts $forum)
    {
        return view('forum.show',[
            'post' => $forum,
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
