<?php

namespace App\Http\Controllers;

use App\Models\Parentt;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ParenttController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('parent.index', [
            'parents' => Parentt::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('parent.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik_ayah' => 'required|max:16|min:16|unique:parentts', 
            'nama_ayah' => 'required|max:240|unique:parentts', 
            'no_kk' => 'required|max:16|min:16|unique:parentts' , 
            'no_telepon' => 'required|max:15|unique:parentts',
            'password' => 'required|max:10', 
        ]);

        $validated['password'] = bcrypt($validated['password']);

        Parentt::create($validated);

        return redirect('/parent')->with('success', 'Berhasil menambahkan data orang tua');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $getAuth = Auth::guard('parent')->user();

        $parent = Parentt::find($getAuth->id);

        return view('user.profile', [
            'parent' => $parent
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parentt $parent)
    {
        return view('parent.edit', [
            'parent' => $parent
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parentt $parent)
    {

        $rules = [ 
            'nama_ayah' => 'required|max:240', 
            'password' => 'required|max:10'
        ];
        
        if ($parent->nik_ayah != $request->nik_ayah) {
            $rules['nik_ayah'] = 'required|max:16|min:16';
        }

        if ($parent->no_kk != $request->no_kk) {
            $rules['no_kk'] = 'required|max:16|min:16';
        }

        if ($parent->no_telepon != $request->no_telepon) {
            $rules['no_telepon'] = 'required|max:16|min:16';
        }

        $validated = $request->validate($rules);

        $validated['password'] = bcrypt($validated['password']);

        $parent->update($validated);

        return redirect('/parent')->with('success', 'Berhasil mengupdate data');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parentt $parent)
    {
        $parent->delete();

        return back()->with('success', 'Berhasil menghapus data');
    }
}
