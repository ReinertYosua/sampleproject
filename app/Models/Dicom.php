<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dicom extends Model
{
    use HasFactory;

    protected $table = "dicom";
    protected $guarded = [];
}
