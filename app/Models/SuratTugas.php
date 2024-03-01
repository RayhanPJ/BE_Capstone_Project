<?php

namespace App\Models;

use App\Models\Ttd;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratTugas extends Model
{
    use Notifiable;
    protected $table = 'surat_tugas';
    protected $fillable = ['id_ttd','nomor_surat', 'nama_mhs', 'npm', 'prodi', 'nama_dospem', 'judul_skirpsi', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ttd()
    {
        return $this->belongsTo(Ttd::class, 'id_ttd');
    }
}
