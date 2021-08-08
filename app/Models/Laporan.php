<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table = "laporan";
    protected $primaryKey = "laporan_id";
    protected $fillable = [
        'pembudidaya_id',
        'ikan_id',
        'bulan',
        'tahun',
        'jumlah_pendapatan'
    ];

    public function pembudidaya()
    {
        return $this->belongsTo('App\Models\Pembudidaya', 'pembudidaya_id', 'pembudidaya_id')->where('pembudidaya.is_deleted', 0);
    }
    public function ikan()
    {
        return $this->belongsTo('App\Models\Ikan', 'ikan_id', 'ikan_id')->where('ikan.is_deleted', 0);
    }
    // public function kecamatan()
    // {
    //     return $this->belongsTo('App\Models\kecamatan', 'kecamatan_id', 'kecamatan_id')->where("kecamatan.is_deleted", "=", 0);
    // }
}
