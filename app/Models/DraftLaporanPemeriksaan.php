<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DraftLaporanPemeriksaan extends Model
{
    use HasFactory;
    protected $table = 'draft_laporan_pemeriksaan';
    protected $guarded =[];
}
