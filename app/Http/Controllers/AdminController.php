<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\SuratTugas;
use Illuminate\Http\Request;
use App\Events\UserDataInput;
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
}
