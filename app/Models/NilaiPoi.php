<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiPoi extends Model
{
    use HasFactory;

    protected $table = 'nilai_poi';

    protected $fillable = [
        'kode_siswa',
        'semester',
        'nilai_principled',
        'nilai_balanced',
        'nilai_skill',
        'nilai_product',
        'comment_indonesian',
        'comment_english',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'kode_siswa');
    }
}
