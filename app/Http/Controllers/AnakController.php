<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Parentt;

use Illuminate\Http\Request;

class AnakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('anak.index', [
            'anaks' => Anak::with('parent')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return Parentt::select(['nama_ayah', 'nik_ayah'])->orderBy('nama_ayah', 'ASC')->get();

        return view('anak.create', [
            'parents' => Parentt::select(['nama_ayah', 'nik_ayah'])->orderBy('nama_ayah', 'ASC')->get()
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nik_anak' => 'required|max:16|min:16|unique:anaks',
            'nama' => 'required|max:200',
            'tempat_lahir' => 'required|max:200',
            'jenis_kelamin' => 'required',
            'berat_lahir' => 'required|numeric|max:100',
            'tinggi_lahir' => 'required|numeric|max:100',
            'proses_melahirkan' => 'required',
            'tanggal_lahir' => 'required', 
            'nik_ayah' => 'required'
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
            'anak' => $anak, 
            'parents' => Parentt::select(['nama_ayah', 'nik_ayah'])->orderBy('nama_ayah', 'ASC')->get(), 
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
            'tanggal_lahir' => 'required', 
            'nik_ayah' => 'required', 
        ];

        if ($request->nik_anak != $anak->nik_anak) {
            $rules['nik_anak'] =  'required|max:16|min:16|unique:anaks';
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
