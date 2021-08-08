<?php

namespace App\Http\Livewire;

use App\Models\Desa;
use App\Models\Ikan;
use App\Models\kecamatan;
use App\Models\Laporan;
use App\Models\Pembudidaya;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class DashboardIndex extends Component
{

    public $filterTahun, $dataTahun, $mandi;
    public $isModalFormOpen = false;
    public $isModalDeleteOpen = false;
    public $paginate = 10;

    public function updatingfilterTahun()
    {
        $this->resetPage();
    }
    public function mount()
    {
        // $this->dataTahun = DB::table('laporan')->select('tahun')->where('is_deleted', '0')->groupBy('tahun')->orderBy('tahun', 'desc')->get();
        // $this->filterTahun = $this->dataTahun[1]->tahun;
        $this->mandi = "makan";
    }
    public function render()
    {
        return view('livewire.dashboard-index');
    }
}
