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
            'npm' => 'required',
            'email' => 'required|email',
            'prodi' => 'required',
            'password' => 'required'
        ]);

        $allowedDomain = 'student.unsika.ac.id';
        $email = request('email');
        $npm = request('npm');
        $npmRegex = '/^([0-9]{13})@student\.unsika\.ac\.id$/i';

        // jika email tidak memiliki domain student.unsika.ac.id.
        if (substr(strrchr($email, "@"), 1) !== $allowedDomain) {
            return redirect()->back()->withInput()->with('error', 'Alamat email harus memiliki domain ' . $allowedDomain);
        }

        // ambil awalan npm dari email (cth: 2010631170075@student.unsika.ac.id -> 2010631170075)
        preg_match($npmRegex, $email, $matches);
        $extractedNpm = $matches[1] ?? null;

        // periksa apakah npm yg diambil sesuai dengan npm yg diinput
        if ($extractedNpm !== $npm) {
            return redirect()->back()->withInput()->with('error', 'Bagian depan email harus sesuai dengan NPM.');
        }

        // Periksa apakah terdapat karakter HTML khusus dalam input
        $containsHtmlSpecialChar = $this->containsHtmlSpecialChar(request()->all());
        if ($containsHtmlSpecialChar) {
            return redirect()->route('regist')->with('error', 'Input tidak valid, harap isi dengan teks biasa.');
        }

        // periksa apakah email telah terdaftar
        $existingUser = User::where('email', $email)->first();
        if ($existingUser) {
            return redirect()->back()->withInput()->with('error', 'Email sudah terdaftar. Gunakan email lain.');
        }

        $userData = [
            'name' => Str::title(request('name')),
            'npm' => $npm,
            'email' => $email,
            'prodi' => request('prodi'),
            'password' => bcrypt(request('password')),
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
