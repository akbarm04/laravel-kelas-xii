<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Http\Requests\StoreCastRequest;
use App\Http\Requests\UpdateCastRequest;
use Illuminate\Http\Request;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function cast()
    {
        $casts = Cast::select('id', 'name', 'bio', 'age')
        ->orderBy('created_at', 'asc')
        ->paginate(18);

        return view('components.movies', compact('casts')); // Mengirim data casts ke view
    }

    public function index()
    {
        //
        $casts = Cast::all();
        return view('cast.index', compact('casts')); // Mengirim data casts ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $casts = Cast::all();
        return view('cast.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCastRequest $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string',
            'age' => 'required|integer',
        ]);
    
        $cast = new Cast();
        $cast->name = $request->name;
        $cast->bio = $request->bio;
        $cast->age = $request->age;
        $cast->save();
    
        return response()->json(['success' => 'Cast created successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $cast = Cast::findOrFail($id);

        return view('cast.show', compact('cast'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $cast = Cast::findOrFail($id);

        return view('cast.edit', compact('cast'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCastRequest $request, $id)
    {
        //
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
    // Hapus semua data `Peran` yang terkait dengan `Cast` ini
    $cast->perans()->delete();

    // Hapus data `Cast` setelah data terkait dihapus
    $cast->delete();

    return redirect()->route('cast.index')->with('success', 'Berhasil menghapus data CAST');
    }

}
