<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Comic;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();

        return view('admin.comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $formData = $request->all();

        $comic = new Comic();
        $comic->title = $formData['title'];
        $comic->description = $formData['description'];
        $comic->thumb = $formData['thumb'];
        $comic->price = $formData['price'];
        $comic->sale_date = $formData['sale_date'];
        $comic->type = $formData['type'];
        $comic->artists = json_encode($formData['artists']);
        $comic->writers = json_encode($formData['writers']);
        $comic->save();

        return redirect()->route('comics.show', ['comics' => $comic->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        $comic = Comic::findOrFail($id);

        return view('admin.comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comic = Comic::findOrFail($id);

        return view('admin.comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comic = Comic::findOrFail($id);
        // dd($request->all());

        $formData = $request->all();

        // $pasta->update($formData);      // Mass assignment

        // OPPURE

        $comic->title = $formData['title'];
        $comic->description = $formData['description'];
        $comic->thumb = $formData['thumb'];
        $comic->price = $formData['price'];
        $comic->sale_date = $formData['sale_date'];
        $comic->type = $formData['type'];
        $comic->artists = $formData['artists'];
        $comic->writers = $formData['writers'];
        $comic->save();

        return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
