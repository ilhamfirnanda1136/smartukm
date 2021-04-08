<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class galery extends Model
{
    use HasFactory;
    protected $table = 'galery';
    protected $fillable = ['nama_galery','anggota_id','keterangan'];

    public function anggota()
    {
        return $this->belongsTo(anggota::class);
    }

    public function detailgalery()
    {
        return $this->hasMany(detailgalery::class);
    }
}
