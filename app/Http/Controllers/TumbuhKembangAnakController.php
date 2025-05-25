<?php

namespace App\Http\Controllers;

use App\Models\TumbuhKembangAnak;
use App\Models\Anak;

use Illuminate\Http\Request;

class TumbuhKembangAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('perkembangan.index', [
            'perkembangans' => TumbuhKembangAnak::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('perkembangan.create', [
            'anaks' => Anak::select('kode_anak', 'nama')->latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_anak' => 'required',
            'tanggal' => 'required',
            'berat_badan' => 'required|numeric', 
            'tinggi_badan' => 'required|numeric',
            'lingkar_kepala' => 'required|numeric',
            'lingkar_lengan_atas' => 'required|numeric'
        ]);

        $getMonth = date('m', strtotime($validated['tanggal']));
        $getYear = date('Y', strtotime($validated['tanggal']));

        $check = TumbuhKembangAnak::where('kode_anak', $validated['kode_anak'])->whereMonth('tanggal', $getMonth)->whereYear('tanggal', $getYear)->first();

        if ($check != null) {
            return back()->with('error', 'Data anak sudah di input bulan ini');
        }

        TumbuhKembangAnak::create($validated);

        return redirect('perkembangan-anak')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(TumbuhKembangAnak $tumbuhKembangAnak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TumbuhKembangAnak $perkembanganAnak)
    {
        return view('perkembangan.edit', [
            'perkembangan' => $perkembanganAnak,
            'anaks' => Anak::select('kode_anak', 'nama')->latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TumbuhKembangAnak $perkembanganAnak)
    {
        $validated = $request->validate([
            'kode_anak' => 'required',
            'tanggal' => 'required',
            'berat_badan' => 'required|numeric', 
            'tinggi_badan' => 'required|numeric',
            'lingkar_kepala' => 'required|numeric',
            'lingkar_lengan_atas' => 'required|numeric'
        ]);

        $perkembanganAnak->update($validated);

        return redirect('perkembangan-anak')->with('success', 'Berhasil mengedit data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TumbuhKembangAnak $perkembanganAnak)
    {
        $perkembanganAnak->delete();

        return back()->with('success', 'Berhasil menghapus data');
    }

    public function cetak(Request $request) {
        $data = TumbuhKembangAnak::with('anak')->whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir])->get();        

        return view('perkembangan.cetak', [
            'dataImunisasis' => $data, 
            'tanggal_awal' => $request->tanggal_awal, 
            'tanggal_akhir' => $request->tanggal_akhir
        ]);
    }

    public function dataTKA() {


        $tahunSekarang = date('Y');
        $show = false;
        $message = 'Silahkan masukan kode';
        $dataBerat = [];
        $dataTinggi = [];
        $dataLingkarKepala = [];
        $dataLingkarLenganAtas = [];

        if (request('kode')) {

            $check = Anak::where('kode_anak', request('kode'))->first();




            if ($check != null) {
                $show = true;

                for($i = 1; $i <= 12; $i++) {
                    // $getData = TumbuhKembangAnak::where('kode_anak', request('kode'))->whereMonth('tanggal', $i)->whereYear('tanggal', $tahunSekarang)->first();
                    $getData = TumbuhKembangAnak::where('kode_anak', request('kode'))->whereMonth('tanggal', $i)->whereYear('tanggal', $tahunSekarang)->first();
    
                    
                    if ($getData == null) {
                        $dataBerat[] = 0;
                        $dataTinggi[] = 0;
                        $dataLingkarKepala[] = 0;
                        $dataLingkarLenganAtas[] = 0;
                    } else {
                        $dataBerat[] = $getData['berat_badan'];
                        $dataTinggi[] = $getData['tinggi_badan'];
                        $dataLingkarKepala[] = $getData['lingkar_kepala'];
                        $dataLingkarLenganAtas[] = $getData['lingkar_lengan_atas'];
                    }
                }
                
            }
        }
        
        

        return view('user.tumbuhKembangAnak', [
            // 'tumbuhKembangAnaks' => TumbuhKembangAnak::latest()->get(), 
            'show' => $show, 
            'message' => $message,
            'dataBerat' => $dataBerat,
            'dataTinggi' => $dataTinggi,
            'dataLingkarKepala' => $dataLingkarKepala, 
            'dataLingkarLenganAtas' => $dataLingkarLenganAtas,
            'label' => ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
        ]);
    }
}
