<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\SuratTugas;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SuratTugasController extends Controller
{
    public function create(){
        $navbarView = view('layouts/navbar');
        $sidebarView = view('layouts/sidebar');

        return view('pages.formsurattugas', [$navbarView, $sidebarView]);
    }

    public function store(Request $request){    
        $data = new SuratTugas();
        $data->id = $request->input('id');
        $data->nama_mhs = $request->input('nama_mhs');
        $data->npm = $request->input('npm');
        $data->prodi = $request->input('prodi');
        $data->nama_dospem = $request->input('nama_dospem');
        $data->judul_skripsi = $request->input('judul_skripsi');
        $data->save();

        // Simpan data ke sesi sementara
        session()->put('pdf_data', $data);

        // Redirect pengguna ke halaman "Generate PDF"
        return redirect()->route('surattugas-pdf');
    }

     public function generateSuratTugasPDF(Request $request)
    {
        // Ambil data dari sesi
        $data = session('pdf_data');

        // Buat data untuk PDF
        $nama_mhs = Str::title($data['nama_mhs']);
        $prodi = Str::title($data['prodi']);
        $nama_dospem = Str::title($data['nama_dospem']);
        $judul_skripsi = Str::title($data['judul_skripsi']);

        $fileName = 'Surat Tugas_' . $data['id'] . '_' . $nama_mhs . '_' . $data['npm'] . '.pdf';

        $pdfData = [
            'nama_mhs' => $nama_mhs,
            'npm' => $data['npm'],
            'prodi' => $prodi,
            'nama_dospem' => $nama_dospem,
            'judul_skripsi' => $judul_skripsi,
        ];

        // Buat dan unduh PDF
        $outputPath = public_path($fileName);
        $pdf = PDF::loadView('template_surat.surat_tugas', compact('pdfData'));
        $pdf->save($outputPath);

        return response()->download($outputPath)->deleteFileAfterSend(true);
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
}