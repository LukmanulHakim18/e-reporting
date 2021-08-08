<?php

namespace App\Http\Livewire;

use App\Models\Ikan;
use App\Models\Laporan;
use App\Models\Pembudidaya;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class LaporanIndex extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $laporan_id,
        $pembudidaya_id,
        $ikan_id,
        $bulan,
        $tahun,
        $jumlah_pendapatan;
    public $search, $message, $dataPembudidaya, $dataIkan, $filterBulan, $filterTahun;
    public $isModalFormOpen = false;
    public $isModalDeleteOpen = false;
    public $paginate = 10;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPaginate()
    {
        $this->resetPage();
    }
    public function updatingFilterBulan()
    {
        // dd($this->filterBulan);
        $this->resetPage();
    }
    public function updatingFilterTahun()
    {
        $this->resetPage();
    }
    public function mount()
    {
        $this->dataPembudidaya = Pembudidaya::where('is_deleted', 0)->orderby('pembudidaya_id')->get();
        $this->dataIkan = Ikan::where('is_deleted', 0)->orderby('nama_ikan')->get();
    }

    public function render()
    {
        $dataLaporan = Laporan::with(['pembudidaya', 'ikan']);;
        if (!empty($this->search)) {
            $dataLaporan = $dataLaporan->whereHas('pembudidaya', function ($q) {
                $q->where('nama_pembudidaya', 'like', "%" . $this->search . "%");
            });
        }
        if (!empty($this->filterBulan)) {
            $dataLaporan = $dataLaporan->where('bulan', '=', $this->filterBulan);
        }
        if (!empty($this->filterTahun)) {
            $dataLaporan = $dataLaporan->where('tahun', '=', $this->filterTahun);
        }
        $dataLaporan = $dataLaporan->where("is_deleted", 0)->orderby("laporan_id")->paginate($this->paginate);
        return view('livewire.laporan-index', ['dataLaporan' => $dataLaporan]);
    }

    public function showModal()
    {
        $this->isModalFormOpen = true;
    }

    public function hideModal()
    {
        $this->laporan_id = null;
        $this->pembudidaya_id = "";
        $this->ikan_id = "";
        $this->bulan = "";
        $this->tahun = "";
        $this->jumlah_pendapatan = "";
        $this->isModalFormOpen = false;
        $this->isModalDeleteOpen = false;
    }

    public function store()
    {
        $this->validate(
            [
                'pembudidaya_id' => 'required',
                'ikan_id' => 'required',
                'bulan' => 'required',
                'tahun' => 'required',
                'jumlah_pendapatan' => 'required',

            ]
        );

        Laporan::updateOrCreate(
            [
                'laporan_id' => $this->laporan_id
            ],
            [
                'pembudidaya_id' => $this->pembudidaya_id,
                'ikan_id' => $this->ikan_id,
                'bulan' => $this->bulan,
                'tahun' => $this->tahun,
                'jumlah_pendapatan' => $this->jumlah_pendapatan,
            ]
        );
        session()->flash('successInfo', !is_null($this->laporan_id) ? "Laporan update successfully !" : "Laporan create successfully !");
        $this->hideModal();
    }

    public function edit($id)
    {
        $data = Laporan::findOrFail($id);
        $this->laporan_id = $data->laporan_id;
        $this->pembudidaya_id = $data->pembudidaya_id;
        $this->ikan_id = $data->ikan_id;
        $this->bulan = $data->bulan;
        $this->tahun = $data->tahun;
        $this->jumlah_pendapatan = $data->jumlah_pendapatan;
        $this->showModal();
    }

    public function deleteConfirmation($id)
    {

        $data = Laporan::findOrFail($id);
        $this->laporan_id = $id;
        $this->pembudidaya_id = $data->pembudidaya_id;
        $this->jenis_ikan = $data->jenis_ikan;
        $this->message = "Are you sure you want to delete 'Laporan :" . $this->pembudidaya_id . "' data?";


        $this->isModalDeleteOpen = true;
    }

    public function delete()
    {
        Laporan::updateOrCreate(
            [
                'laporan_id' => $this->laporan_id
            ],
            [
                'is_deleted' => 1
            ]
        );
        $this->isModalDeleteOpen = false;
        session()->flash('deletedInfo', "Data deleted successfully !");
    }
}
