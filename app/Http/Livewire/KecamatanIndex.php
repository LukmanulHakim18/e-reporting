<?php

namespace App\Http\Livewire;

use App\Models\kecamatan;
use Livewire\Component;
use Livewire\WithPagination;

class KecamatanIndex extends Component
{

    use WithPagination;
    public $branch_id, $branch_name, $branch_regencies, $contact, $address, $selected_province;
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
        $dataKecamatan = kecamatan::where("is_deleted", 0)->orderby("nama_kecamatan")->paginate();

        return view('livewire.kecamatan-index', ['dataKecamatan' => $dataKecamatan]);
    }

    public function showModal()
    {
        $this->isModalFormOpen = true;
    }

    public function hideModal()
    {
        $this->branch_id = null;
        $this->nama_kecamatan = "";
        $this->branch_regencies = "";
        $this->contact = "";
        $this->address = "";
        $this->selected_province = "";
        $this->isModalFormOpen = false;
        $this->isModalDeleteOpen = false;
    }

    public function store()
    {
        $validasi = $this->validate(
            [
                'branch_name' => 'required',
                'branch_regencies' => 'required',
                'contact' => 'required',
                'address' => 'required'
            ]
        );
        Branch::updateOrCreate(
            [
                'branch_id' => $this->branch_id
            ],
            [
                'branch_name' => $this->branch_name,
                'branch_regencies' => $this->branch_regencies,
                'contact' => $this->contact,
                'address' => $this->address
            ]
        );
        $this->hideModal();
        session()->flash('successInfo', is_null($this->branch_id) ? "Branch update successfully !" : "Branch create successfully !");
    }

    public function edit($id)
    {
        $data = Branch::with(['regency', 'regency.province'])->findOrFail($id);
        // dd($data);
        $this->branch_id = $id;
        $this->branch_name = $data->branch_name;
        $this->branch_regencies = $data->regency->regency_id;
        $this->contact = $data->contact;
        $this->address = $data->address;
        $this->selected_province = $data->regency->province->province_id;

        $this->showModal();
    }

    public function deleteConfirmation($id)
    {

        $data = Branch::findOrFail($id);
        $this->branch_id = $id;
        $this->branch_name = $data->branch_name;
        $this->message = "Are you sure you want to delete '" . $this->branch_name . "' data?";


        $this->isModalDeleteOpen = true;
    }

    public function delete()
    {
        Branch::updateOrCreate(
            [
                'branch_id' => $this->branch_id
            ],
            [
                'isDeleted' => 1
            ]
        );
        $this->isModalDeleteOpen = false;
        session()->flash('deletedInfo', "Data deleted successfully !");
    }
}
