<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;


class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('anggota.index', [
            'anggotas' => Anggota::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|max:5|unique:anggotas',
            'nama' => 'required|max:200',
            'alamat' => 'required|max:200',
            'no_telpon' => 'required|max:15',
            'foto' => 'required|max:2000|mimes:jpeg,jpg,png'
        ]);


        $file = $request->file('foto');

        $rename = uniqid(). '_' . $file->getClientOriginalName();

        $location = 'img';

        $file->move($location, $rename);

        $validated['foto'] = $rename;

        Anggota::create($validated);

        return redirect('anggota')->with('success', 'Berhasil menambahkan anggota');

    }

    /**
     * Display the specified resource.
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $anggotum)
    {
        return view('anggota.edit', [
            'anggota' => $anggotum
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anggota $anggotum)
    {
        $rules = [
            'nama' => 'required|max:200',
            'alamat' => 'required|max:200',
            'no_telpon' => 'required|max:15',
            'foto' => 'max:2000|mimes:jpeg,jpg,png'
        ];

        if ($request->kode != $anggotum->kode) {
            $rules['kode'] = 'required|max:5|unique:anggotas';
        }

        $validated = $request->validate($rules);

        $file = $request->file('foto');

        if ($file) {
            $rename = uniqid() . '_' . $file->getClientOriginalName();

            $validated['foto'] = $rename;

            File::delete('img/' . $anggotum->foto);

            $file->move('img', $rename);
        }

        $anggotum->update($validated);

        return redirect('anggota')->with('success', 'Berhasil mengedit gambar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggota $anggotum)
    {
        File::delete('img/' . $anggotum->foto);

        $anggotum->delete();

        return back()->with('success', 'Berhasil menghapus data');
    }
}
