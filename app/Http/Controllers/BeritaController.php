<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('berita.index', [
            'beritas' => Berita::orderBy('tanggal', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|max:200|unique:beritas',
            'tanggal' => 'required',
            'isi' => 'required', 
            'gambar' => 'required|max:2000|mimes:jpeg,jpg,png'
        ]);

        $file = $request->file('gambar');

        $rename = uniqid() . '_' . $file->getClientOriginalName();

        $location = 'img';

        $validated['gambar'] = $rename;

        $file->move($location, $rename);

        Berita::create($validated);

        return redirect('berita')->with('success', 'Berhasil menambahkan berita');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $beritum)
    {
        return view('user.show', [
            'berita' => $beritum
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $beritum)
    {
        return view('berita.edit', [
            'berita' => $beritum
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $beritum)
    {
        $rules = [
            'tanggal' => 'required',
            'isi' => 'required', 
            'gambar' => 'max:2000|mimes:jpeg,jpg,png'
        ];

        if ($request->judul != $beritum->judul) {
            $rules['judul'] = 'required|max:200|unique:beritas'; 
        }

        $validated = $request->validate($rules);

        $file = $request->file('gambar');

        if ($file) {
            $rename = uniqid() . '_' . $file->getClientOriginalName();

            $location = 'img';

            $validated['gambar'] = $rename;

            $file->move($location, $rename);

            File::delete('img/' . $beritum->gambar);
        }

        $beritum->update($validated);

        

        return redirect('berita')->with('success', 'Berhasil menghapus data');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $beritum)
    {
        File::delete('img/' . $beritum->gambar);

        $beritum->delete();

        return back()->with('success', 'Berhasil menghapus data');
    }

    public function allBerita() {
        return view('user.berita', [
            'beritas' => Berita::latest()->get()
        ]);
    }
}
