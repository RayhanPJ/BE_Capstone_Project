<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratTugas extends Model
{
    use Notifiable;
    protected $table = 'surat_tugas';
    protected $fillable = ['nama_mhs','npm','prodi','nama_dospem','judul_skirpsi'];
}
