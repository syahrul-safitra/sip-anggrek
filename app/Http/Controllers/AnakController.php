<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use Illuminate\Http\Request;

class AnakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('anak.index', [
            'anaks' => Anak::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anak.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_anak' => 'required|max:5|unique:anaks',
            'nama' => 'required|max:200',
            'tempat_lahir' => 'required|max:200',
            'jenis_kelamin' => 'required',
            'berat_lahir' => 'required|numeric|max:100',
            'tinggi_lahir' => 'required|numeric|max:100',
            'proses_melahirkan' => 'required',
            'nama_ibu' => 'required|max:200',
            'tanggal_lahir' => 'required'
        ]);

        Anak::create($validated);

        return redirect('anak')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Anak $anak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anak $anak)
    {
        return view('anak.edit', [
            'anak' => $anak
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anak $anak)
    {
        $rules = [
            'nama' => 'required|max:200',
            'tempat_lahir' => 'required|max:200',
            'jenis_kelamin' => 'required',
            'berat_lahir' => 'required|numeric|max:100',
            'tinggi_lahir' => 'required|numeric|max:100',
            'proses_melahirkan' => 'required',
            'nama_ibu' => 'required|max:200',
            'tanggal_lahir' => 'required'     
        ];

        if ($request->kode_anak != $anak->kode_anak) {
            $rules['kode_anak'] =  'required|max:5|unique:anaks';
        }

        $validated = $request->validate($rules);

        $anak->update($validated);

        return redirect('anak')->with('success', 'Berhasil mengedit data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anak $anak)
    {
        $anak->delete();

        return back()->with('success', 'Berhasil menghapus data');
    }
}
