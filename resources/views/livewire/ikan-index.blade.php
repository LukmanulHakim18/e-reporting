@section('title', 'Ikan')
@section('breadcrumbs')
<!-- breadcrumbs-start -->
<div class="section-header">
    <h1>Ikan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
        <div class="breadcrumb-item"><a href="{{ route('ikan') }}">Ikan</a></div>
        <div class="breadcrumb-item">Table Ikan</div>
    </div>
</div>
<!-- breadcrumbs-end -->
@endsection
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Data Ikan</strong>
        </div>
        <div class="card-body">
            <div class="row py-1">
                <div class="col-10">
                    <select wire:model="paginate" class="border border-black-300 rounded py-1 px-1 w-12 text-black-500 focus:outline-none focus:border-green-700">
                        <option value="10">10</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <input wire:model="search" type="text" name="ikan_name" class="border border-blue-300 rounded w-30 py-1 px-3 text-blue-500 focus:outline-none focus:border-green-700" placeholder="Search">
                </div>
                <div class="col-2">
                    <button wire:click="showModal()" class="btn btn-outline-primary rounded float-right">
                        Create
                    </button>
                </div>
            </div>
            @if($isModalFormOpen)
            @include('modals.create-ikan')
            @endif
            @if($isModalDeleteOpen)
            @include('modals.delete-confirmation')
            @endif
            @if(session()->has('successInfo'))
            @include('modals.flash-notification-success')
            @endif
            @if(session()->has('deletedInfo'))
            @include('modals.flash-notification-danger')
            @endif
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col">Nama Ikan</th>
                        <th scope="col">Jenis Ikan</th>
                        <th scope="col">Gambar</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dataIkan as $data)<tr>
                        <td class="text-center">
                            {{($dataIkan->currentPage()-1)*$dataIkan->perPage()+$loop->iteration}}
                        </td>
                        <td>
                            {{$data->nama_ikan}}
                        </td>
                        <td>
                            {{$dataJenisIkan[$data->jenis_ikan]}}
                        </td>
                        <td>
                            <img width="100px" class="my-1" src="{{asset('storage/'.$data->path_img)}}" alt="">
                        </td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <button wire:click="edit({{$data->ikan_id}})" class="btn btn-outline-warning btn-sm rounded m-1">
                                    Edit
                                </button>
                                <button wire:click="deleteConfirmation({{$data->ikan_id}})" class="btn btn-outline-danger btn-sm rounded m-1">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="border px-4 py-2 text-center" colspan="10">
                            <i> Data not found</i>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-1">
                {{$dataIkan->links()}}
            </div>
        </div>
    </div>

</div>