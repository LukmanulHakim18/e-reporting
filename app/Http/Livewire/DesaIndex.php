<?php

namespace App\Http\Livewire;

use App\Models\Desa;
use App\Models\kecamatan;
use Livewire\Component;
use Livewire\WithPagination;

class DesaIndex extends Component
{
    use WithPagination;
    public $desa_id, $kecamatan_id, $nama_desa;
    public $dataKecamatan;
    public $search, $message;
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

    public function mount()
    {
        $this->dataKecamatan = kecamatan::where('is_deleted', 0)->orderBy('nama_kecamatan')->get();
    }
    public function render()
    {
        $dataDesa = Desa::with(['kecamatan'])->where("is_deleted", 0)->where('nama_desa', 'like', '%' . $this->search . '%')->orderby("nama_desa")->paginate($this->paginate);
        return view('livewire.desa-index', ['dataDesa' => $dataDesa]);
    }

    public function showModal()
    {
        $this->isModalFormOpen = true;
    }

    public function hideModal()
    {
        $this->desa_id = null;
        $this->nama_desa = "";
        $this->photo = null;
        $this->isModalFormOpen = false;
        $this->isModalDeleteOpen = false;
    }

    public function store()
    {
        $this->validate(
            [
                'nama_desa' => 'required'
            ]
        );
        Desa::updateOrCreate(
            [
                'desa_id' => $this->desa_id
            ],
            [
                'kecamatan_id' => $this->kecamatan_id,
                'nama_desa' => $this->nama_desa,
            ]
        );
        session()->flash('successInfo', !is_null($this->desa_id) ? "Kecamatan update successfully !" : "Kecamatan create successfully !");
        $this->hideModal();
    }

    public function edit($id)
    {
        $data = Desa::findOrFail($id);
        $this->desa_id = $data->desa_id;
        $this->kecamatan_id = $data->kecamatan_id;
        $this->nama_desa = $data->nama_desa;
        $this->showModal();
    }

    public function deleteConfirmation($id)
    {

        $data = Desa::findOrFail($id);
        $this->desa_id = $id;
        $this->nama_desa = $data->nama_desa;
        $this->message = "Are you sure you want to delete '" . $this->nama_desa . "' data?";


        $this->isModalDeleteOpen = true;
    }

    public function delete()
    {
        Desa::updateOrCreate(
            [
                'desa_id' => $this->desa_id
            ],
            [
                'is_deleted' => 1
            ]
        );
        $this->isModalDeleteOpen = false;
        session()->flash('deletedInfo', "Data deleted successfully !");
    }
}
