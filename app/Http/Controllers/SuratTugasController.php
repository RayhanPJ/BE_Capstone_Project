<?php

namespace App\Http\Controllers;

use PDF;
use Mpdf\Mpdf;
use App\Models\SuratTugas;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratTugasController extends Controller
{
    public function create()
    {
        $navbarView = view('layouts/navbar');
        $sidebarView = view('layouts/sidebar');

        return view('pages.formsurattugas', [$navbarView, $sidebarView]);
    }

    public function store(Request $request)
    {
        $data = new SuratTugas();
        $data->nama_mhs = Str::title($request->input('nama_mhs'));
        $data->npm = $request->input('npm');
        $data->prodi = $request->input('prodi');
        $data->nama_dospem = Str::title($request->input('nama_dospem'));
        $data->judul_skripsi = Str::title($request->input('judul_skripsi'));

        // Simpan file path ke dalam database
        $hash = md5('Surat Tugas TU Fasilkom');
        $fileName = 'Surat Tugas' . '_' . Str::title($data['nama_mhs']) . '_' . $data['npm'] . '_' . $hash . '.pdf';
        $filePath =  $fileName;

        $data->file_path = $filePath;
        $data->save();

        $outputPath = storage_path('app\\public\\surat-tugas\\' . $filePath);
        $pdf = PDF::loadView('template_surat.surat_tugas', compact('data'));
        $pdf->save($outputPath);

        // Simpan data ke sesi sementara
        // session()->put('pdf_data', $data);

        // Redirect pengguna ke halaman "Generate PDF"
        // return redirect()->route('surattugas-pdf');

        // Redirect pengguna ke halaman utama
        return redirect('/');
    }

    public function setujuiSurat($id)
    {
        $SuratTugas = SuratTugas::findOrFail($id);
        $SuratTugas->status = 'disetujui';
        $SuratTugas->save();

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
        return redirect()->back();
    }

    // public function generateSuratTugasPDF(Request $request)
    // {
    //     // Ambil data dari sesi
    //     $data = session('pdf_data');

    //     // Buat data untuk PDF
    //     $nama_mhs = Str::title($data['nama_mhs']);
    //     $prodi = Str::title($data['prodi']);
    //     $nama_dospem = Str::title($data['nama_dospem']);
    //     $judul_skripsi = Str::title($data['judul_skripsi']);

    //     $fileName = 'Surat Tugas_' . $data['id'] . '_' . $nama_mhs . '_' . $data['npm'] . '.pdf';

    //     $pdfData = [
    //         'nama_mhs' => $nama_mhs,
    //         'npm' => $data['npm'],
    //         'prodi' => $prodi,
    //         'nama_dospem' => $nama_dospem,
    //         'judul_skripsi' => $judul_skripsi,
    //     ];

    //     // Buat dan unduh PDF
    //     $outputPath = public_path($fileName);
    //     $pdf = PDF::loadView('template_surat.surat_tugas', compact('pdfData'));
    //     $pdf->save($outputPath);

    //     return response()->download($outputPath)->deleteFileAfterSend(true);
    // }

    public function riwayatSurat()
    {
        $navbarView = view('layouts/navbar');
        $sidebarView = view('layouts/sidebar');

        $data = SuratTugas::orderBy('created_at', 'desc')->get();

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

    public function downloadSurat($file_path){
        $file = storage_path('app/public/surat-tugas/' . $file_path);

        if (file_exists($file)) {
            return response()->download($file);
        } else {
            abort(404, 'File not found');
        }
    }
}
