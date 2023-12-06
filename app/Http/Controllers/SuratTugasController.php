<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\SuratTugas;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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
        $data->nama_mhs = $request->input('nama_mhs');
        $data->npm = $request->input('npm');
        $data->prodi = $request->input('prodi');
        $data->nama_dospem = $request->input('nama_dospem');
        $data->judul_skripsi = $request->input('judul_skripsi');

        // Simpan file path ke dalam database
        $hash = md5('Surat Tugas TU Fasilkom');
        $fileName = 'Surat Tugas' . '_' . Str::title($data['nama_mhs']) . '_' . $data['npm'] .'_'. $hash .'.pdf';
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

    // function ini dipakai ketika akan download pdf
    public function generateSuratTugasPDF(Request $request)
    {
        // Ambil data dari sesi
        $data = session('pdf_data');

        // Buat data untuk PDF
        $nama_mhs = Str::title($data->nama_mhs);
        $prodi = Str::title($data->prodi);
        $nama_dospem = Str::title($data->nama_dospem);
        $judul_skripsi = Str::title($data->judul_skripsi);

        
        $filePath =  'surat-tugas\\' . $fileName; 

        $pdfData = [
            'nama_mhs' => $nama_mhs,
            'npm' => $data->npm,
            'prodi' => $prodi,
            'nama_dospem' => $nama_dospem,
            'judul_skripsi' => $judul_skripsi,
            'file_path' => $filePath,
        ];

        // Buat dan unduh PDF
        $outputPath = storage_path('app\\' . $filePath);
        $pdf = PDF::loadView('template_surat.surat_tugas', compact('pdfData'));
        $pdf->save($outputPath);

        return response()->download($outputPath);
    }
<<<<<<< HEAD
}
=======

    public function setujuiSurat($id)
    {
        $SuratTugas = SuratTugas::findOrFail($id);
        $SuratTugas->status = 'disetujui';
        $SuratTugas->save();
        
        return redirect()->back();
    }
    
    public function tidaksetujuSurat(Request $request, $id)
    {
        $SuratTugas = SuratTugas::findOrFail($id);
        $SuratTugas->status = 'ditolak';
        $SuratTugas->keterangan = $request->input('text_input');
        $SuratTugas->save();

        return redirect()->back();
    }
}
>>>>>>> 3a4502415e3d48f8d1f8bb65660a10c11a4588b1
