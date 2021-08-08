@section('title', 'Desa')
@section('breadcrumbs')
<!-- breadcrumbs-start -->
<div class="section-header">
    <h1>Desa</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
        <div class="breadcrumb-item"><a href="{{ route('desa') }}">Desa</a></div>
        <div class="breadcrumb-item">Desa table</div>
    </div>
</div>
<!-- breadcrumbs-end -->
@endsection
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Data Desa</strong>
        </div>
        <div class="card-body">
            <div class="row py-1">
                <div class="col-10">
                    <select wire:model="paginate" class="border border-black-300 rounded py-1 px-1 w-12 text-black-500 focus:outline-none focus:border-green-700">
                        <option value="10">10</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <input wire:model="search" type="text" name="desa_name" class="border border-blue-300 rounded w-30 py-1 px-3 text-blue-500 focus:outline-none focus:border-green-700" placeholder="Search">
                </div>
                <div class="col-2">
                    <button wire:click="showModal()" class="btn btn-outline-primary rounded float-right">
                        Create
                    </button>
                </div>
            </div>
            @if($isModalFormOpen)
            @include('modals.create-desa')
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
                        <th scope="col">Nama Desa</th>
                        <th scope="col">Nama Kecamatan</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dataDesa as $data)<tr>
                        <td class="text-center">
                            {{($dataDesa->currentPage()-1)*$dataDesa->perPage()+$loop->iteration}}
                        </td>
                        <td>
                            {{$data->nama_desa}}
                        </td>
                        <td>
                            {{$data->kecamatan->nama_kecamatan}}
                        </td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <button wire:click="edit({{$data->desa_id}})" class="btn btn-outline-warning btn-sm rounded m-1">
                                    Edit
                                </button>
                                <button wire:click="deleteConfirmation({{$data->desa_id}})" class="btn btn-outline-danger btn-sm rounded m-1">
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
                {{$dataDesa->links()}}
            </div>
        </div>
    </div>

</div>