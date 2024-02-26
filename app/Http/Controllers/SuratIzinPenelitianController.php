<?php

namespace App\Http\Controllers;

use PDF;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\SuratIzinPenelitian;
use App\Notifications\UserNotifcation;
use App\Notifications\AdminNotification;

class SuratIzinPenelitianController extends Controller
{
    public function create($id)
    {
        $navbarView = view('layouts/navbar');
        $sidebarView = view('layouts/sidebar');

        $data = User::where('id', $id)->first();

        return view('pages.formsuratizinpenelitian', [$navbarView, $sidebarView, 'data' => $data]);
    }

    public function store(Request $request)
    {
        $data = new SuratIzinPenelitian();
        $data->nama_mhs = Str::title($request->input('nama_mhs'));
        $data->npm = $request->input('npm');
        $data->prodi = $request->input('prodi');
        $data->lingkup = $request->input('lingkup');
        $data->semester = $request->input('semester');
        $data->tujuan_surat = Str::title($request->input('tujuan_surat'));
        $data->tujuan_instansi = Str::title($request->input('tujuan_instansi'));
        $data->domisili_instansi = Str::title($request->input('domisili_instansi'));
        $data->judul_penelitian = Str::title($request->input('judul_penelitian'));

        $timestamp = now()->timestamp;
        $fileExtension = $data->lingkup === 'Internal' ? 'docx' : 'pdf';
        $fileName =  $timestamp . '_' . 'Surat Izin Penelitian' . '_' . Str::title($data['nama_mhs']) . '_' . $data['npm'] . '.' . $fileExtension;
        $filePath =  $fileName;

        $data->file_path = $filePath;
        $data->jenis_surat = 'Surat Izin Penelitian';
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

        $outputPath = storage_path('app\\public\\surat-izin-penelitian\\' . $filePath);

        if ($data->lingkup === 'Internal') {
            // pembuatan docx
            $templateProcessor = new TemplateProcessor(public_path('Surat-Izin-Penelitian.docx'));
            $templateProcessor->setValue('nama_mhs', $data->nama_mhs);
            $templateProcessor->setValue('npm', $data->npm);
            $templateProcessor->setValue('prodi', $data->prodi);
            $templateProcessor->setValue('judul_penelitian', $data->judul_penelitian);

            $templateProcessor->saveAs($outputPath);
        } elseif ($data->lingkup === 'Eksternal') {
            // pembuatan pdf
            if ($data->prodi === 'Informatika') {
                $pdf = PDF::loadView('template_surat.surat_izin_penelitian_if', compact('data'));
            } else if ($data->prodi === 'Sistem Informasi') {
                $pdf = PDF::loadView('template_surat.surat_izin_penelitian_si', compact('data'));
            }

            $pdf->save($outputPath);
        }

        return redirect()->back()->with('success', 'Surat Izin Penelitian telah dibuat. Periksa menu Riwayat Surat untuk melihat file surat!');
    }


    public function setujuiSuratIzinPenelitian($id)
    {
        $SuratIzinPenelitian = SuratIzinPenelitian::findOrFail($id);
        $SuratIzinPenelitian->status = 'disetujui';
        $SuratIzinPenelitian->updated_at = Carbon::now()->locale('id_ID');
        $SuratIzinPenelitian->save();

        // ambil nama_mhs saja dalam 1 data objek
        $nama_mhs = SuratIzinPenelitian::where('nama_mhs', $SuratIzinPenelitian->nama_mhs)
            ->pluck('nama_mhs');

        $users = User::where('role', 'user')
            ->whereIn('name', $nama_mhs)
            ->get();

        foreach ($users as $user) {
            $user->notify(new UserNotifcation([
                'user_id' => auth()->user()->id,
                'name' => auth()->user()->name,
                'jenis_surat' => 'Surat Izin Penelitian'
            ]));
        }

        return redirect()->back()->with('success', 'Surat Izin Penelitian telah disetujui!');
    }

    public function tidaksetujuSuratIzinPenelitian(Request $request, $id)
    {
        $SuratIzinPenelitian = SuratIzinPenelitian::findOrFail($id);
        $SuratIzinPenelitian->status = 'ditolak';
        $SuratIzinPenelitian->keterangan = $request->input('text_input');
        $SuratIzinPenelitian->save();

        return redirect()->back()->with('success', 'Surat Izin Penelitian telah ditolak!');
    }

    public function cancelsuratIzinPenelitian($id)
    {
        $SuratIzinPenelitian = SuratIzinPenelitian::find($id);
        $SuratIzinPenelitian->status = null;
        $SuratIzinPenelitian->keterangan = null;
        $SuratIzinPenelitian->save();
        session()->forget('data_approved_notifications');
        return redirect()->back();
    }

    public function riwayatSuratIzinPenelitian()
    {
        $navbarView = view('layouts/navbar');
        $sidebarView = view('layouts/sidebar');

        $data = SuratIzinPenelitian::orderBy('created_at', 'desc')->where('nama_mhs', auth()->user()->name)->get();

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

    public function downloadSuratIzinPenelitian($file_path)
    {
        $file = storage_path('app/public/surat-izin-penelitian/' . $file_path);

        if (file_exists($file)) {
            return response()->download($file);
        } else {
            abort(404, 'File not found');
        }
    }
}
