<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegistController extends Controller
{
    public function index()
    {
        return view('auth/register');
    }

    public function create()
    {

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'prodi' => 'required',
            'semester' => 'required'

        ]);

        $user = User::create(request(['name', 'email', 'password', 'prodi', 'semester']));

        // auth()->login($user);

        return redirect()->route('login')->with('success', 'Anda Telah Berhasil Mendaftar!');;
    }
}
