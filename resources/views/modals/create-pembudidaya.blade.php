<div class="fixed inset-0 transition-opacity">
    <div class="absolute inset-0 bg-gray-500 opacity-75">
    </div>
</div>
<div class="absolute top-0 bg-white rounded-lg top text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-top sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
    <div class="rounded">
        <form>
            <div class="card-header">
                <strong>Form Pembudidaya</strong>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label for="nama_pembudidaya" class=" form-control-label">Nama Pembudidaya</label>
                    <input wire:model="nama_pembudidaya" type="text" name="nama_pembudidaya" placeholder="Nama Pembudidaya" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label for="desa_id" class=" form-control-label">Nama Desa</label>
                    <select wire:model="desa_id" class="form-control">
                        <option value="">Pilih desa</option>
                        @forelse($dataDesa as $value)
                        <option value="{{$value->desa_id}}">{{$value->nama_desa}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label for="nik" class=" form-control-label">NIK</label>
                    <input wire:model="nik" type="number" name="nik" placeholder="NIK" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir" class=" form-control-label">Tanggal Lahir</label>
                    <input wire:model="tanggal_lahir" type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin" class=" form-control-label">Jenis Kelamin</label>
                    <div class="row mx-4">
                        <div class="col-2">
                            <input class="form-check-input" wire:model="jenis_kelamin" type="radio" name="jenis_kelamin" value="Pria" checked>
                            <label class="form-check-label" for="jenis_kelamin">
                                Pria
                            </label>
                        </div>
                        <div class="col left-0">
                            <input class="form-check-input" type="radio" wire:model="jenis_kelamin" name="jenis_kelamin" value="Wanita">
                            <label class="form-check-label" for="jenis_kelamin">
                                Wanita
                            </label>
                        </div>

                    </div>
                </div>
                <div class="form-check form-check-inline">

                </div>
                <div class="form-check form-check-inline">

                </div>
                <div class="form-group">
                    <label for="contact" class=" form-control-label">Kontak</label>
                    <input wire:model="contact" type="number" name="contact" placeholder="0852xxxxxxxx" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin" class=" form-control-label">Alamat</label>
                    <textarea class="form-control" wire:model="alamat" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div class="bg-gray-100 px-4 py-3 sm:px-6 sm:flex flex flex-row-reverse space-x-4 ">
                <button wire:click.prevent="store()" type="submit" class="btn btn-success rounded ml-2">
                    Submit
                </button>
                <button wire:click="hideModal()" type="button" class="btn btn-outline-secondary rounded">
                    Cancel
                </button>

            </div>
        </form>
    </div>
</div>