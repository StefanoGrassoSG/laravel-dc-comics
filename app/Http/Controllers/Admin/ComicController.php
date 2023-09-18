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
        //$formData = $request->all();

        $request->validate([
            'title' => 'required|max:70',
            'description' => 'required|string',
            'thumb' => 'nullable|max:1024',
            'price' => 'required|numeric|min:0.1|max:100',
            'series' => 'nullable|max:64',
            'sale_date' => 'nullable|date',
            'type' => 'required|max:32'
        ],
        [
            'title.max' => 'il titolo non può essere più lungo di 70 caratteri'
        ]);

        $comic = new Comic();
        $comic->title = $request->input('title');
        $comic->description = $request->input('description');
        $comic->thumb = $request->input('thumb');
        $comic->price = $request->input('price');
        $comic->sale_date = $request->input('sale_date');
        $comic->series = $request->input('series');
        $comic->type = $request->input('type');
        $comic->artists = $request->input('artists');
        $comic->writers = $request->input('writers');
        $comic->save();

        return redirect()->route('comics.show', ['comic' => $comic->id]);
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
        $comic->series = $formData['series'];
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
        $comic = Comic::findOrFail($id);

        $comic->delete();

        return redirect()->route('comics.index');
    }
}
