<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;
    protected $table = "desa";
    protected $primaryKey = 'desa_id';
    protected $fillable  = [
        'kecamatan_id',
        'nama_desa',
        'is_deleted',
    ];

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\kecamatan', 'kecamatan_id', 'kecamatan_id')->where("kecamatan.is_deleted", "=", 0);
    }
    public function pembudidaya()
    {
        return $this->hasMany('App\Models\Pembudidaya', 'desa_id', 'desa_id')->where("pembudidaya.is_deleted", "=", 0);
    }
}
