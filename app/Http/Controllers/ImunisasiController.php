<?php

namespace App\Http\Controllers;

use App\Models\Imunisasi;
use App\Models\Anak;

use App\Models\TumbuhKembangAnak;
use Illuminate\Http\Request;

class ImunisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('imunisasi.index', [
            'imunisasis' => Imunisasi::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $dataAnak = Anak::select('nama', 'kode_anak')->get();

        $jenisImunisasi = [
            'BC 6 POLI I',
            'DPT 1 POLI II',
            'DPT 2 POLI III',
            'DPT 3 POLI VI',
            'DPT 4',
            'CMPK 1',
            'CMPK 2',
            'IPP',
            'PCV 1',
            'PCV 2',
            'VIT A'  

        ];

        return view('imunisasi.create', [
            'anaks' => $dataAnak,
            'jenisImunisasi' => $jenisImunisasi
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_imunisasi' => 'required',
            'kode_anak' => 'required',
            'catatan' => 'required|max:1000',
            'tanggal' => 'required',
        ]);

        Imunisasi::create($validated);

        return redirect('imunisasi')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Imunisasi $imunisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Imunisasi $imunisasi)
    {

        $dataAnak = Anak::select('nama', 'kode_anak')->get();

        $jenisImunisasi = [
            'BC 6 POLI I',
            'DPT 1 POLI II',
            'DPT 2 POLI III',
            'DPT 3 POLI VI',
            'DPT 4',
            'CMPK 1',
            'CMPK 2',
            'IPP',
            'PCV 1',
            'PCV 2',
            'VIT A'  

        ];

        return view('imunisasi.edit', [
            'imunisasi' => $imunisasi,
            'anaks' => $dataAnak,
            'jenisImunisasi' => $jenisImunisasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Imunisasi $imunisasi)
    {
        $validated = $request->validate([
            'jenis_imunisasi' => 'required',
            'kode_anak' => 'required',
            'catatan' => 'required|max:1000',
            'tanggal' => 'required'
        ]);

        $imunisasi->update($validated);

        return redirect('imunisasi')->with('success', 'Berhasil mengedit data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Imunisasi $imunisasi)
    {
        $imunisasi->delete();

        return back()->with('success', 'Berhasil menghapus data');
    }

    public function cetak(Request $request) {
       
        $data = Imunisasi::with('anak')->whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir])->get();        

        return view('imunisasi.cetak', [
            'dataImunisasis' => $data, 
            'tanggal_awal' => $request->tanggal_awal, 
            'tanggal_akhir' => $request->tanggal_akhir
        ]);
    }

    public function dataImunisasi() {
        // $x = Imunisasi::where('kode_anak', '=', request('kode'))->first();

        $data = [];

        if (request('kode')) {
            $data = Imunisasi::Filter(request('kode'))->latest()->get();
        }
        
        return view('user.imunisasi', [
            'imunisasis' => $data
        ]);
    }
}
