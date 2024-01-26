<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class UserController extends Controller
{
    public function profile($id)
    {

        $navbarView = view('layouts/navbar');
        $sidebarView = view('layouts/sidebar');

        $user = User::with('mahasiswa')->where('name', auth()->user()->name)->find($id);
        $createdAt = $user->created_at;

        return view('pages.profile', [
            $navbarView, $sidebarView,  'user' => $user, 'createdAt' => $createdAt,
        ]);
    }

    public function lengkapiProfile(Request $request, $id)
    {
        $request->validate([
            'semester' => 'required|numeric',
            'domisili' => 'required',
            'no_hp' => 'required|numeric'
        ], [
            'semester.required' => 'Semester harus diisi',
            'domisili.required' => 'Domisili harus diisi',
            'no_hp.required' => 'Nomor HP harus diisi',
        ]);

        // Memeriksa apakah ada kolom yang belum diisi
        $columnsToCheck = ['semester', 'domisili', 'no_hp'];
        foreach ($columnsToCheck as $column) {
            if (!$request->filled($column)) {
                return redirect()->route('user.profile', ['id' => $id])->with('error', ucfirst($column) . ' harus diisi.');
            }
        }

        $data = [
            'user_id' => $id,
            'semester' => $request->input('semester'),
            'prodi' => $request->input('prodi'),
            'domisili' => $request->input('domisili'),
            'no_hp' => $request->input('no_hp'),
            'status' => $request->input('status'),
        ];

        Mahasiswa::updateOrCreate(['user_id' => $id], $data);

        return redirect()->route('user.profile',  ['id' => $id])->with('success', 'Data diri telah berhasil diubah!');
    }
}
