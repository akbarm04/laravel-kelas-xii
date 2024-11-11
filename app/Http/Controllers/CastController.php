<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Http\Requests\StoreCastRequest;
use App\Http\Requests\UpdateCastRequest;

class CastController extends Controller
{   

    public function cast()
    {
        //
        $casts = Cast::select('id', 'name', 'bio', 'age')
        ->orderBy('created_at', 'asc')
        ->paginate(18);

        return view('components.movies', compact('casts'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $casts = Cast::select('id', 'name', 'bio', 'age')
            ->orderBy('created_at', 'asc')
            ->paginate(18);

        return view('cast.index', compact('casts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $casts = Cast::all();
        return view('cast.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCastRequest $request)
    {
        $cast = Cast::create($request->validated());

        return redirect()->route('cast.index')->with('success', 'Cast created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cast $cast)
    {
        // Ambil semua film yang diperankan oleh cast, termasuk data film dan nama peran (role_name)
        $films = $cast->perans()->with(['film', 'cast'])->get();
        
        return view('cast.show', compact('cast', 'films'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cast $cast)
    {
        return view('cast.edit', compact('cast'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCastRequest $request, $id )
    {
        $cast = Cast::findOrFail($id); 
        // Update the cast details
        $cast->name = $request->name;
        $cast->bio = $request->bio;
        $cast->age = $request->age;
        $cast->save();

        return response()->json(['success' => 'Cast updated successfully.']);        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cast $cast)
    {
        // Hapus data peran yang terkait
        $cast->perans()->delete();

        $cast->delete();

        return redirect()->route('cast.index')->with('success', 'Berhasil menghapus data CAST');
    }
}
