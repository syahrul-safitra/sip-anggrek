<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|max:30|', 
            'password' => 'required|max:20'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->with('loginError', 'Login Failed');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

    }

    public function showAdmin() {
        return view('editAdmin', [
            'admin' => user::first()
        ]);
    }

    public function updateAdmin(Request $request, User $user) {
        $validated = $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|max:20', 
            'password' => 'required|max:15'
        ]);

        $user->update($validated);

        return back()->with('success', 'Berhasil mengupdate data');
    }

}
