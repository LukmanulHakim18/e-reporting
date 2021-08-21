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
    use WithPagination;

    public $filterTahun, $dataTahun, $mandi;
    public $isModalFormOpen = false;
    public $isModalDeleteOpen = false;
    public $paginate = 10;

    public function updatedfilterTahun()
    {
        $this->resetPage();
        $this->emit('filterrrrrr', $this->filterTahun);
    }
    public function mount()
    {
        $this->dataTahun = DB::table('laporan')->select('tahun')->where('is_deleted', '0')->groupBy('tahun')->orderBy('tahun', 'desc')->get();
        // dd($this->dataTahun[0]->tahun);
        $this->filterTahun = $this->dataTahun[1]->tahun;
    }
    public function render()
    {
        return view('livewire.dashboard-index');
    }
}
