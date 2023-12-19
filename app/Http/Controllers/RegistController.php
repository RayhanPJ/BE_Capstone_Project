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
        $allowedDomain = 'student.unsika.ac.id'; // Ganti dengan domain yang diizinkan

        $email = request('email');
        if (substr(strrchr($email, "@"), 1) !== $allowedDomain) {
            return redirect()->back()->withInput()->with('error', 'Alamat email harus memiliki domain ' . $allowedDomain);
        }

        // $user = User::create(request(['name', 'email', 'password', 'prodi', 'semester']));

        $userData = request(['name', 'email', 'password', 'prodi', 'semester']);
        $userData['remember_token'] = Str::random(60); // Add remember_token with a random value

        $user = User::create($userData);
        // auth()->login($user);

        return redirect()->route('login')->with('success', 'Anda Telah Berhasil Mendaftar!');;
    }
}
