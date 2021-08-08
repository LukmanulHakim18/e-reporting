<?php

namespace App\Http\Livewire;

use App\Models\Ikan;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class IkanIndex extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $ikan_id, $nama_ikan, $jenis_ikan, $photo;
    public $search, $message;
    public $dataJenisIkan;
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
        $this->dataJenisIkan = config('constants.jenisIkan');
    }

    public function render()
    {
        $dataIkan = Ikan::where('nama_ikan', 'like', '%' . $this->search . '%')->where("is_deleted", 0)->orderby("nama_ikan")->paginate();
        // dd($dataIkan);
        return view('livewire.ikan-index', ['dataIkan' => $dataIkan]);
    }

    public function showModal()
    {
        $this->isModalFormOpen = true;
    }

    public function hideModal()
    {
        $this->ikan_id = null;
        $this->nama_ikan = "";
        $this->jenis_ikan = "";
        $this->photo = null;
        $this->isModalFormOpen = false;
        $this->isModalDeleteOpen = false;
    }

    public function store()
    {
        $this->validate(
            [
                'nama_ikan' => 'required',
                'jenis_ikan' => 'required',

            ]
        );
        if ($this->photo != null) {
            $pathPhoto = $this->photo->store('images/photo-ikan', 'public');
            Ikan::updateOrCreate(
                [
                    'ikan_id' => $this->ikan_id
                ],
                [
                    'nama_ikan' => $this->nama_ikan,
                    'jenis_ikan' => $this->jenis_ikan,
                    'path_img' => $pathPhoto
                ]
            );
        } else {
            Ikan::updateOrCreate(
                [
                    'ikan_id' => $this->ikan_id
                ],
                [
                    'nama_ikan' => $this->nama_ikan
                ]
            );
        }
        session()->flash('successInfo', !is_null($this->ikan_id) ? "Ikan update successfully !" : "Ikan create successfully !");
        $this->hideModal();
    }

    public function edit($id)
    {
        $data = Ikan::findOrFail($id);
        // dd($data);
        $this->ikan_id = $data->ikan_id;
        $this->nama_ikan = $data->nama_ikan;
        $this->jenis_ikan = $data->jenis_ikan;
        $this->showModal();
    }

    public function deleteConfirmation($id)
    {

        $data = Ikan::findOrFail($id);
        $this->ikan_id = $id;
        $this->nama_ikan = $data->nama_ikan;
        $this->jenis_ikan = $data->jenis_ikan;
        $this->message = "Are you sure you want to delete '" . $this->nama_ikan . "' data?";


        $this->isModalDeleteOpen = true;
    }

    public function delete()
    {
        Ikan::updateOrCreate(
            [
                'ikan_id' => $this->ikan_id
            ],
            [
                'is_deleted' => 1
            ]
        );
        $this->isModalDeleteOpen = false;
        session()->flash('deletedInfo', "Data deleted successfully !");
    }
}
