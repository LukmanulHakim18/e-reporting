<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

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

    public function desa()
    {
        return $this->hasMany('App\Models\Desa', 'kecamatan_id', 'kecamatan_id')->where('desa.is_deleted', 0);
    }
}
