@section('title', 'Pembudidaya')
@section('breadcrumbs')
<!-- breadcrumbs-start -->
<div class="section-header">
    <h1>Pembudidaya</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
        <div class="breadcrumb-item"><a href="{{ route('pembudidaya') }}">Pembudidaya</a></div>
        <div class="breadcrumb-item">Table Pembudidaya</div>
    </div>
</div>
<!-- breadcrumbs-end -->
@endsection
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Data Pembudidaya</strong>
        </div>
        <div class="card-body">
            <div class="row py-1">
                <div class="col-10">
                    <select wire:model="paginate" class="border border-black-300 rounded py-1 px-1 w-12 text-black-500 focus:outline-none focus:border-green-700">
                        <option value="10">10</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <input wire:model="search" type="text" class="border border-blue-300 rounded w-30 py-1 px-3 text-blue-500 focus:outline-none focus:border-green-700" placeholder="Search">
                </div>
                <div class="col-2">
                    <button wire:click="showModal()" class="btn btn-outline-primary rounded float-right">
                        Create
                    </button>
                </div>
            </div>
            @if($isModalFormOpen)
            @include('modals.create-pembudidaya')
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
                        <th scope="col">Nama Pembudidaya</th>
                        <th scope="col">Desa</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dataPembudidaya as $data)<tr>
                        <td class="text-center">
                            {{($dataPembudidaya->currentPage()-1)*$dataPembudidaya->perPage()+$loop->iteration}}
                        </td>
                        <td>{{$data->nama_pembudidaya}}</td>
                        <td>{{$data->desa->nama_desa}}</td>
                        <td>{{$data->contact}}</td>
                        <td>{{$data->jenis_kelamin}}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('laporanIndividu', ['pembudidaya_id' => $data->pembudidaya_id]) }}" class="btn btn-outline-info btn-sm rounded m-1">
                                    laporan
                                </a>
                                <button wire:click="edit({{$data->pembudidaya_id}})" class="btn btn-outline-warning btn-sm rounded m-1">
                                    Edit
                                </button>
                                <button wire:click="deleteConfirmation({{$data->pembudidaya_id}})" class="btn btn-outline-danger btn-sm rounded m-1">
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
                {{$dataPembudidaya->links()}}
            </div>
        </div>
    </div>

</div>