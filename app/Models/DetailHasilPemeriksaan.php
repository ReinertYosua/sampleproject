<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailHasilPemeriksaan extends Model
{
    use HasFactory;

    protected $table="detail_hasil_pemeriksaan";
    protected $guarded;
}
