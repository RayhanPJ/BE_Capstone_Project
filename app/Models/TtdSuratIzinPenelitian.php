<?php

namespace App\Models;

use App\Models\SuratIzinPenelitian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TtdSuratIzinPenelitian extends Model
{
    protected $table = 'ttd_surat_izin_penelitian';
    protected $fillable = ['penanda_tangan', 'ttd_image', 'nama_pimpinan', 'prodi_pimpinan', 'nomor_induk'];

     public function suratIzinPenelitian()
    {
        return $this->hasOne(SuratIzinPenelitian::class, 'id_ttd');
    }
}
