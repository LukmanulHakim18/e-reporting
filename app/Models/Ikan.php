<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ikan extends Model
{
    use HasFactory;
    protected $table = "ikan";
    protected $primaryKey = "ikan_id";
    protected $fillable = [
        'nama_ikan',
        'jenis_ikan',
        'path_img',
        'is_deleted',
    ];
}
