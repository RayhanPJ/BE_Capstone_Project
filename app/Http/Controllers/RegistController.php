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
        $validator = $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'npm' => 'required',
            'prodi' => 'required'
        ]);

        $allowedDomain = 'student.unsika.ac.id'; // Ganti dengan domain yang diizinkan

        $email = request('email');
        if (substr(strrchr($email, "@"), 1) !== $allowedDomain) {
            return redirect()->back()->withInput()->with('error', 'Alamat email harus memiliki domain ' . $allowedDomain);
        }

        // Periksa apakah terdapat karakter HTML khusus dalam input
        $containsHtmlSpecialChar = $this->containsHtmlSpecialChar(request()->all());
        if ($containsHtmlSpecialChar) {
            return redirect()->route('regist')->with('error', 'Input tidak valid, harap isi dengan teks biasa.');
        }

        $userData = [
            'name' => Str::title(request('name')),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'npm' => request('npm'),
            'prodi' => request('prodi'),
            'remember_token' => Str::random(60),
        ];

        $user = User::create($userData);

        return redirect()->route('login')->with('success', 'Anda Telah Berhasil Mendaftar!');
    }

    private function containsHtmlSpecialChar($data)
    {
        foreach ($data as $value) {
            if ($value != strip_tags($value)) {
                return true;
            }
        }
        return false;
    }
}
