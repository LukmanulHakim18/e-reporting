<?php

namespace App\Http\Livewire;

use App\Models\Desa;
use App\Models\kecamatan;
use Facade\FlareClient\Http\Client;
use GuzzleHttp\Client as GuzzleHttpClient;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class KecamatanIndex extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $kecamatan_id, $nama_kecamatan, $photo;
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

    public function render()
    {
        $dataKecamatan = kecamatan::where("is_deleted", 0)->orderby("nama_kecamatan")->paginate($this->paginate);

        return view('livewire.kecamatan-index', ['dataKecamatan' => $dataKecamatan]);
    }

    public function showModal()
    {
        $this->isModalFormOpen = true;
    }

    public function hideModal()
    {
        $this->kecamatan_id = null;
        $this->nama_kecamatan = "";
        $this->photo = null;
        $this->isModalFormOpen = false;
        $this->isModalDeleteOpen = false;
    }

    public function store()
    {
        $this->validate(
            [
                'nama_kecamatan' => 'required'
            ]
        );
        if ($this->photo != null) {
            $pathLogo = $this->photo->store('images/logo-kecamatan', 'public');
            kecamatan::updateOrCreate(
                [
                    'kecamatan_id' => $this->kecamatan_id
                ],
                [
                    'nama_kecamatan' => $this->nama_kecamatan,
                    'path_logo' => $pathLogo
                ]
            );
            $this->hideModal();
        } else {
            kecamatan::updateOrCreate(
                [
                    'kecamatan_id' => $this->kecamatan_id
                ],
                [
                    'nama_kecamatan' => $this->nama_kecamatan
                ]
            );
            $this->hideModal();
        }
        session()->flash('successInfo', is_null($this->kecamatan_id) ? "Kecamatan update successfully !" : "Kecamatan create successfully !");
    }

    public function edit($id)
    {
        $data = kecamatan::findOrFail($id);
        // dd($data);
        $this->kecamatan_id = $data->kecamatan_id;
        $this->nama_kecamatan = $data->nama_kecamatan;
        $this->showModal();
    }

    public function deleteConfirmation($id)
    {

        $data = kecamatan::findOrFail($id);
        $this->kecamatan_id = $id;
        $this->nama_kecamatan = $data->nama_kecamatan;
        $this->message = "Are you sure you want to delete '" . $this->nama_kecamatan . "' data?";


        $this->isModalDeleteOpen = true;
    }

    public function delete()
    {
        kecamatan::updateOrCreate(
            [
                'kecamatan_id' => $this->kecamatan_id
            ],
            [
                'is_deleted' => 1
            ]
        );
        $this->isModalDeleteOpen = false;
        session()->flash('deletedInfo', "Data deleted successfully !");
    }
}
