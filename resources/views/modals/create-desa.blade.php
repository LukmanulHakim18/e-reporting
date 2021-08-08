<div class="fixed inset-0 transition-opacity">
    <div class="absolute inset-0 bg-gray-500 opacity-75">
    </div>
</div>
<div class="absolute top-0 bg-white rounded-lg top text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-top sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
    <div class="rounded">
        <form>
            <div class="card-header">
                <strong>Form Desa</strong>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label for="kecamatan_id" class=" form-control-label">Nama Kecamatan</label>
                    <select wire:model="kecamatan_id" class="form-control">
                        <option value="">Pilih kecamatan</option>
                        @forelse($dataKecamatan as $value)
                        <option value="{{$value->kecamatan_id}}">{{$value->nama_kecamatan}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_desa" class=" form-control-label">Nama Desa</label>
                    <input wire:model="nama_desa" type="text" name="nama_desa" placeholder="Nama Kecamatan" class="form-control"></input>
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