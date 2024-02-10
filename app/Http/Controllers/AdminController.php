<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\SuratTugas;
use Illuminate\Http\Request;
use App\Events\UserDataInput;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{

    public function home()
    {
        $navbarView = view('admin/layouts/navbar');
        $sidebarView = view('admin/layouts/sidebar');
        return view('admin.pages.home', [
            $navbarView,
            $sidebarView
        ]);
    }

    public function listdata()
    {
        $navbarView = view('admin/layouts/navbar');
        $sidebarView = view('admin/layouts/sidebar');

        $data = SuratTugas::orderBy('created_at', 'desc')->get();

        // Menggunakan ucfirst untuk mengubah huruf pertama menjadi besar
        $formattedData = $data->map(function ($item) {
            $item->nama_mhs = ucfirst($item->nama_mhs);
            $item->judul_skripsi = ucfirst($item->judul_skripsi);
            return $item;
        });

        return view('admin.pages.listdata', [
            'data' => $formattedData,
            $navbarView,
            $sidebarView
        ]);
    }

    public function surattugasPreview($file_path)
    {
        $path = Storage::url('surat-tugas/' . $file_path);
        $iframe = asset($path);
        return $iframe;
    }

    public function markAsRead($id)
    {
        if ($id) {
            auth()->user()->notifications->where('id', $id)->markAsRead();
        }

        return redirect()->back();
    }

    public function profile($id)
    {
        $navbarView = view('admin/layouts/navbar');
        $sidebarView = view('admin/layouts/sidebar');

        $user = User::with('mahasiswa')->where('name', auth()->user()->name)->find($id);
        $createdAt = $user->created_at;

        return view('admin.pages.profile', [
            $navbarView, $sidebarView,  'user' => $user, 'createdAt' => $createdAt,
        ]);
    }

    public function changePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ], [
            'current_password.required' => 'Password saat ini harus diisi.',
            'password.required' => 'Password baru harus diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi Password baru tidak cocok.',
        ]);

        $user = User::find($id);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withInput()->with('error', 'Password saat ini tidak sesuai.');
        }

        $user->update(['password' => bcrypt($request->password)]);

        return redirect()->back()->with('success', 'Password berhasil diubah.');
    }
}
