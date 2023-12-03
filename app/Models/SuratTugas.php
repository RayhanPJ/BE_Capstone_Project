<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratTugas extends Model
{
    protected $table = 'surat_tugas';
    protected $fillable = ['nama_mhs','npm','prodi','nama_dospem','judul_skirpsi'];
}
