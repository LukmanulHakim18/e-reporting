<?php

namespace App\Http\Livewire;

use App\Models\Desa;
use App\Models\Ikan;
use App\Models\kecamatan;
use App\Models\Laporan;
use App\Models\Pembudidaya;
use Livewire\Component;

class RekapDataIndex extends Component
{
    public function render()
    {
        $data['jumlahKecamatan'] = kecamatan::count();
        $data['jumlahDesa'] = Desa::count();
        $data['jumlahIkan'] = Ikan::count();
        $data['jumlahPembudidaya'] = Pembudidaya::count();
        $data['jumlahLaporan'] = Laporan::count();
        return view('livewire.rekap-data-index', ["data" => $data]);
    }
}
