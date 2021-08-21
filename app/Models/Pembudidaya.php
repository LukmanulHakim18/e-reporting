<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembudidaya extends Model
{
    use HasFactory;
    protected $table  = 'pembudidaya';
    protected $primaryKey = 'pembudidaya_id';
    protected $fillable = [
        'pembudidaya_id',
        'desa_id',
        'nama_pembudidaya',
        'nik',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'contact',
        'is_deleted',
    ];
    public function desa()
    {
        return $this->belongsTo('App\Models\Desa', 'desa_id', 'desa_id')->where("desa.is_deleted", "=", 0);
    }
    public function laporan()
    {
        return $this->hasMany('App\Models\Laporan', 'pembudidaya_id', 'pembudidaya_id')->where("laporan.is_deleted", "=", 0);
    }
}
