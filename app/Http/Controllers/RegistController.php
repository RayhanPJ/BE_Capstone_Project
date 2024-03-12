<?php

namespace App\Http\Controllers;

use App\Models\User;
<<<<<<< HEAD
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
=======
use App\Models\Mahasiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
>>>>>>> surat-bebas-pustaka

class RegistController extends Controller
{
    public function index()
    {
        return view('auth/register');
    }

    public function create()
    {
<<<<<<< HEAD

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'prodi' => 'required',
            'semester' => 'required'

        ]);
        $allowedDomain = 'student.unsika.ac.id'; // Ganti dengan domain yang diizinkan

        $email = request('email');
=======
        $validator = $this->validate(request(), [
            'name' => 'required',
            'npm' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $allowedDomain = 'student.unsika.ac.id';
        $email = request('email');
        $npm = request('npm');
        $npmRegex = '/^([0-9]{13})@student\.unsika\.ac\.id$/i';

        // Jika email tidak memiliki domain student.unsika.ac.id.
>>>>>>> surat-bebas-pustaka
        if (substr(strrchr($email, "@"), 1) !== $allowedDomain) {
            return redirect()->back()->withInput()->with('error', 'Alamat email harus memiliki domain ' . $allowedDomain);
        }

<<<<<<< HEAD
        // $user = User::create(request(['name', 'email', 'password', 'prodi', 'semester']));

        $userData = request(['name', 'email', 'password', 'prodi', 'semester']);
        $userData['remember_token'] = Str::random(60); // Add remember_token with a random value

        $user = User::create($userData);
        // auth()->login($user);

        return redirect()->route('login')->with('success', 'Anda Telah Berhasil Mendaftar!');;
=======
        // Ambil awalan npm dari email (contoh: 2010631170075@student.unsika.ac.id -> 2010631170075)
        preg_match($npmRegex, $email, $matches);
        $extractedNpm = $matches[1] ?? null;

        // Periksa apakah npm yang diambil sesuai dengan npm yang diinput
        // if ($extractedNpm !== $npm) {
        //     return redirect()->back()->withInput()->with('error', 'Bagian depan email harus sesuai dengan NPM.');
        // }

        // Periksa apakah terdapat karakter HTML khusus dalam input
        $containsHtmlSpecialChar = $this->containsHtmlSpecialChar(request()->all());
        if ($containsHtmlSpecialChar) {
            return redirect()->route('regist')->with('error', 'Input tidak valid, harap isi dengan teks biasa.');
        }

        // Periksa apakah email telah terdaftar
        $existingUser = User::where('email', $email)->first();
        if ($existingUser) {
            return redirect()->back()->withInput()->with('error', 'Email sudah terdaftar. Gunakan email lain.');
        }

        // Buat pengguna dan mahasiswa
        $user = User::create([
            'name' => Str::title(request('name')),
            'npm' => $npm,
            'email' => $email,
            'password' => bcrypt(request('password')),
            'remember_token' => Str::random(60),
        ]);

        // Hubungkan pengguna dengan mahasiswa
        $mahasiswa = Mahasiswa::create([
            'user_id' => $user->id,
            'foto' => 'user_profile.png',
        ]);

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
>>>>>>> surat-bebas-pustaka
    }
}
