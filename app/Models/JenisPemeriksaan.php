<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPemeriksaan extends Model
{
    use HasFactory;
    protected $table = "jenis_pemeriksaan";
    protected $guarded = [];
}
