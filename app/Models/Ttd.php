<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ttd extends Model
{
    use HasFactory;

    protected $table = 'ttd';
    protected $fillable = ['penanda_tangan', 'ttd_image', 'nama_pimpinan'];

    public function suratTugas()
    {
        return $this->hasOne(SuratTugas::class, 'id_ttd');
    }
}
