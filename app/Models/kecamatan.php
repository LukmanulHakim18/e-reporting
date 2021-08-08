<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    use HasFactory;
    protected $table = "kecamatan";
    protected $primaryKey = "kecamatan_id";
    protected $fillable  = [
        "nama_kecamatan",
        "payload_group",
        "path_logo",
        "is_deleted",
    ];
}
