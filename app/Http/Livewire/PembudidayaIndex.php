<?php

namespace App\Http\Livewire;

use App\Models\Desa;
use App\Models\Pembudidaya;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class PembudidayaIndex extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $pembudidaya_id,
        $nama_pembudidaya,
        $nik,
        $tanggal_lahir,
        $jenis_kelamin,
        $alamat,
        $contact,
        $desa_id,
        $is_deleted;
    public $search, $message, $dataDesa;
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
        $this->dataDesa = Desa::where('is_deleted', 0)->orderby('nama_desa')->get();
    }

    public function render()
    {
        $dataPembudidaya = Pembudidaya::with(['desa'])->where('nama_pembudidaya', 'like', '%' . $this->search . '%')->where("is_deleted", 0)->orderby("nama_pembudidaya")->paginate($this->paginate);
        return view('livewire.pembudidaya-index', ['dataPembudidaya' => $dataPembudidaya]);
    }

    public function showModal()
    {
        $this->isModalFormOpen = true;
    }

    public function hideModal()
    {
        $this->pembudidaya_id = null;
        $this->nama_pembudidaya = "";
        $this->nik = "";
        $this->tanggal_lahir = "";
        $this->jenis_kelamin = "";
        $this->alamat = "";
        $this->contact = "";
        $this->desa_id = "";
        $this->isModalFormOpen = false;
        $this->isModalDeleteOpen = false;
    }

    public function store()
    {

        $this->validate(
            [
                'nama_pembudidaya' => 'required',
                'nik' => 'required',
                'tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'contact' => 'required',
                'desa_id' => 'required',

            ]
        );

        Pembudidaya::updateOrCreate(
            [
                'pembudidaya_id' => $this->pembudidaya_id
            ],
            [
                'pembudidaya_id' => $this->pembudidaya_id,
                'nama_pembudidaya' => $this->nama_pembudidaya,
                'nik' => $this->nik,
                'tanggal_lahir' => $this->tanggal_lahir,
                'jenis_kelamin' => $this->jenis_kelamin,
                'alamat' => $this->alamat,
                'contact' => $this->contact,
                'desa_id' => $this->desa_id
            ]
        );
        session()->flash('successInfo', !is_null($this->pembudidaya_id) ? "Pembudidaya update successfully !" : "Pembudidaya create successfully !");
        $this->hideModal();
    }

    public function edit($id)
    {
        $data = Pembudidaya::findOrFail($id);
        $this->pembudidaya_id = $data->pembudidaya_id;
        $this->nama_pembudidaya = $data->nama_pembudidaya;
        $this->nik = $data->nik;
        $this->tanggal_lahir = $data->tanggal_lahir;
        $this->jenis_kelamin = $data->jenis_kelamin;
        $this->alamat = $data->alamat;
        $this->contact = $data->contact;
        $this->desa_id = $data->desa_id;
        $this->showModal();
    }

    public function deleteConfirmation($id)
    {

        $data = Pembudidaya::findOrFail($id);
        $this->pembudidaya_id = $id;
        $this->nama_pembudidaya = $data->nama_pembudidaya;
        $this->jenis_ikan = $data->jenis_ikan;
        $this->message = "Are you sure you want to delete '" . $this->nama_pembudidaya . "' data?";


        $this->isModalDeleteOpen = true;
    }

    public function delete()
    {
        Pembudidaya::updateOrCreate(
            [
                'pembudidaya_id' => $this->pembudidaya_id
            ],
            [
                'is_deleted' => 1
            ]
        );
        $this->isModalDeleteOpen = false;
        session()->flash('deletedInfo', "Data deleted successfully !");
    }
}
