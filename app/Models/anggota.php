<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anggota extends Model
{
    use HasFactory;
    protected $table = 'anggota';
    protected $fillable = ['nama_anggota','no_ktp','no_telp','password','alamat','email','kategori_id','kecamatan_id','nama_usaha',
    'alamat_usaha','email_usaha','foto_anggota'];

    public function kecamatan() {
        return $this->belongsTo(kecamatan::class);
    }

    public function kategori() {
        return $this->belongsTo(kategori::class);
    }

    public function galery() {
        return $this->hasMany(galery::class);
    }
}
