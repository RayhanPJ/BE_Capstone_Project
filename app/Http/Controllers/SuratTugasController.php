<?php

namespace App\Http\Controllers;

use PDF;
// use Mpdf\Mpdf;
use Carbon\Carbon;
use Dompdf\Dompdf;
use App\Models\Ttd;
use Dompdf\Options;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\SuratTugas;
use Illuminate\Support\Str;
use App\Events\DataApproved;
use Illuminate\Http\Request;
use App\Events\UserDataInput;
use Illuminate\Support\Facades\Log;
use App\Notifications\UserNotifcation;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Notifications\AdminNotification;
// use Barryvdh\Snappy\Facades\SnappyPdf as PDF;


class SuratTugasController extends Controller
{
    public function create($id)
    {
        $navbarView = view('layouts/navbar');
        $sidebarView = view('layouts/sidebar');

        $data = User::where('id', $id)->first();

        return view('pages.formsurattugas', [$navbarView, $sidebarView, 'data' => $data]);
    }

    public function store(Request $request)
    {
        // untuk testing tanggal, matikan jika tidak diperlukan lagi
        // Carbon::setTestNow(Carbon::create(2024, 2, 27));

        $data = new SuratTugas();
        $data->nama_mhs = Str::title($request->input('nama_mhs'));
        $data->npm = $request->input('npm');
        $data->prodi = $request->input('prodi');
        $data->nama_dospem = Str::title($request->input('nama_dospem'));
        $data->judul_skripsi = Str::title($request->input('judul_skripsi'));

        // Ambil nomor surat berikutnya untuk tahun ini
        $currentYear = Carbon::now()->year;
        $lastSurat = SuratTugas::whereYear('created_at', $currentYear)->latest('nomor_surat')->first();

        // Inisialisasi nilai awal untuk nomor surat
        $nextSuratNumber = 1;

        // Jika ada surat sebelumnya
        if ($lastSurat) {
            // Jika hari sama, tambahkan 1, jika tidak, lanjutkan dari perhitungan sebelumnya ditambah 11
            if (now()->isSameDay($lastSurat->created_at)) {
                $nextSuratNumber = (int)explode('/', $lastSurat->nomor_surat)[0] + 1;
            } else {
                $nextSuratNumber = (int)explode('/', $lastSurat->nomor_surat)[0] + 11;
            }
        }

        $nomorSurat = str_pad($nextSuratNumber, 4, '0', STR_PAD_LEFT) . '/UN64.7/KM/' . $currentYear;
        $data->nomor_surat = $nomorSurat;

        $timestamp = now()->timestamp;
        $fileName = $timestamp . '_' . 'Surat Tugas' . '_' . Str::title($data['nama_mhs']) . '_' . $data['npm'] . '.pdf';
        $filePath = $fileName;

        $data->file_path = $filePath;
        $data->jenis_surat = 'Surat Tugas';

        $ttdPimpinanData = Ttd::latest('id')->first();
        $data->id_ttd = $ttdPimpinanData ? $ttdPimpinanData->id : 1;

        $data->save();

        // Notify admins
        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            $admin->notify(new AdminNotification([
                'user_id' => auth()->user()->id,
                'name' => auth()->user()->name,
                'jenis_surat' => $data->jenis_surat
            ]));
        }

        $outputPath = storage_path('app\\public\\surat-tugas\\' . $filePath);
        $pdf = PDF::loadView('template_surat.surat_tugas', compact('data', 'ttdPimpinanData'));
        $pdf->save($outputPath);
       
        // Carbon::setTestNow();

        return redirect()->back()->with('success', 'Surat Tugas telah dibuat. Periksa menu Riwayat Surat untuk melihat file surat!');
    }

    public function setujuiSurat($id)
    {
        $SuratTugas = SuratTugas::findOrFail($id);
        $SuratTugas->status = 'disetujui';
        $SuratTugas->updated_at = Carbon::now()->locale('id_ID');
        $SuratTugas->save();

        // ambil nama_mhs saja dalam 1 data objek
        $nama_mhs = SuratTugas::where('nama_mhs', $SuratTugas->nama_mhs)
            ->pluck('nama_mhs');

        $users = User::where('role', 'user')
            ->whereIn('name', $nama_mhs)
            ->get();

        foreach ($users as $user) {
            $user->notify(new UserNotifcation([
                'user_id' => auth()->user()->id,
                'name' => auth()->user()->name,
                'jenis_surat' => 'Surat Tugas'
            ]));
        }

        return redirect()->back()->with('success', 'Surat Tugas telah disetujui!');
    }

    public function tidaksetujuSurat(Request $request, $id)
    {
        $SuratTugas = SuratTugas::findOrFail($id);
        $SuratTugas->status = 'ditolak';
        $SuratTugas->keterangan = $request->input('text_input');
        $SuratTugas->save();

        return redirect()->back()->with('success', 'Surat Tugas telah ditolak!');
    }

    public function cancelsurattugas($id)
    {
        $suratTugas = SuratTugas::find($id);
        $suratTugas->status = null;
        $suratTugas->keterangan = null;
        $suratTugas->save();
        session()->forget('data_approved_notifications');
        return redirect()->back();
    }

    public function riwayatSuratTugas()
    {
        $navbarView = view('layouts/navbar');
        $sidebarView = view('layouts/sidebar');

        $data = SuratTugas::orderBy('created_at', 'desc')->where('nama_mhs', auth()->user()->name)->get();

        // Menggunakan ucfirst untuk mengubah huruf pertama menjadi besar
        $formattedData = $data->map(function ($item) {
            $item->nama_mhs = ucfirst($item->nama_mhs);
            $item->judul_skripsi = ucfirst($item->judul_skripsi);
            return $item;
        });

        return view('pages.riwayatsurat', [
            'data' => $formattedData,
            $navbarView,
            $sidebarView
        ]);
    }

    public function downloadSurat($file_path)
    {
        $file = storage_path('app/public/surat-tugas/' . $file_path);

        if (file_exists($file)) {
            return response()->download($file);
        } else {
            abort(404, 'File not found');
        }
    }

    public function markAsReadApprove($id)
    {
        if ($id) {
            auth()->user()->notifications->where('id', $id)->markAsRead();
        }

        return redirect()->back();
    }
}
