<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $table ='kategori';
    protected $fillable = ['nama_kategori'];
    public function subkategori()
    {
        return $this->hasMany(subkategori::class);
    }
    public function anggota() {
        return $this->hasMany(anggota::class);
    }
}
