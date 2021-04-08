<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailgalery extends Model
{
    use HasFactory;
    protected $table = 'detailgalery';

    public function galery()
    {
        return $this->belongsTo(galery::class);
    }
}
