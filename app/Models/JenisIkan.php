<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisIkan extends Model
{
    use HasFactory;
    protected $table = "jenis_ikan";
    protected $primaryKey = "jenis_ikan_id";
    protected $fillable = [
        'nama_ikan',
        'jenis_ikan',
        'path_img',
        'is_deleted',
    ];
}
