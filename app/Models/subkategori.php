<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subkategori extends Model
{
    use HasFactory;
    protected $table = 'subkategori';
    protected $fillable = ['kategori_id','nama_subkategori'];

    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }
}
