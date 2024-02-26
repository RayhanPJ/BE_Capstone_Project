<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratIzinPenelitian extends Model
{
    use HasFactory;
    protected $table = 'surat_izin_penelitian';
    protected $fillable = ['nama_mhs', 'npm', 'prodi', 'lingkup', 'semester', 'tujuan_surat', 'tujuan_instansi', 'domisili_instansi', 'judul_penelitian', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
