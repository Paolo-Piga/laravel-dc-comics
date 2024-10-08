<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.comics', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($comic)
    {

    }

    /**
     * Display the specified resource.
     */
    public function showcase($id)
    {
        $comic = Comic::findOrFail($id);
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comic = Comic::findOrFail($id);
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {


        $comic = Comic::findOrFail($id);


        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {


        $comic = Comic::findOrFail($id);
        $comic->delete();


        return redirect()->route('comics.index', $comic->id)->with('success', 'Fumetto eliminato con successo');
    }


}
