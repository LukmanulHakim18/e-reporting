@section('title', 'Laporan')
@section('breadcrumbs')
<!-- breadcrumbs-start -->
<div class="section-header">
    <h1>Laporan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
        <div class="breadcrumb-item"><a href="{{ route('laporan') }}">Laporan</a></div>
        <div class="breadcrumb-item">Table Laporan</div>
    </div>
</div>
<!-- breadcrumbs-end -->
@endsection
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Data Laporan</strong>
        </div>
        <div class="card-body">
            <div class="row py-1">
                <div class="col-10">
                    <select wire:model="paginate" class="border border-black-300 rounded py-1 px-1 w-12 text-black-500 focus:outline-none focus:border-green-700">
                        <option value="10">10</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <select wire:model="filterBulan" class="border border-blue-300 rounded w-30 py-1 px-3 text-blue-500 focus:outline-none focus:border-green-700">
                        @foreach(config('constants.bulan') as $value)
                        <option value="{{$value}}">{{$value}}</option>
                        @endforeach
                    </select>
                    <input wire:model="filterTahun" maxlength="4" type="number" class="border border-blue-300 rounded w-20 py-1 px-3 text-blue-500 focus:outline-none focus:border-green-700" placeholder="2021" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                    <input wire:model="search" type="text" class="border border-blue-300 rounded w-30 py-1 px-3 text-blue-500 focus:outline-none focus:border-green-700" placeholder="Search">
                </div>
                <div class="col-2">
                    <button wire:click="showModal()" class="btn btn-outline-primary rounded float-right">
                        Create
                    </button>
                </div>
            </div>
            @if($isModalFormOpen)
            @include('modals.create-laporan')
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
                        <th scope="col">Nama Ikan</th>
                        <th scope="col">Bulan</th>
                        <th scope="col">Tahun</th>
                        <th scope="col" class="text-center">Jumlah Pendapatan (Kg)</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dataLaporan as $data)<tr>
                        <td class="text-center">
                            {{($dataLaporan->currentPage()-1)*$dataLaporan->perPage()+$loop->iteration}}
                        </td>
                        <td>{{$data->pembudidaya->nama_pembudidaya}}</td>
                        <td>{{$data->ikan->nama_ikan}}</td>
                        <td>{{$data->bulan}}</td>
                        <td>{{$data->tahun}}</td>
                        <td class="text-center">{{$data->jumlah_pendapatan}}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <button wire:click="edit({{$data->laporan_id}})" class="btn btn-outline-warning btn-sm rounded m-1">
                                    Edit
                                </button>
                                <button wire:click="deleteConfirmation({{$data->laporan_id}})" class="btn btn-outline-danger btn-sm rounded m-1">
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
                {{$dataLaporan->links()}}
            </div>
        </div>
    </div>

</div>