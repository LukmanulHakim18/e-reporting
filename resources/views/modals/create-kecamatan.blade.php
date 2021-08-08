<div class="fixed inset-0 transition-opacity">
    <div class="absolute inset-0 bg-gray-500 opacity-75">
    </div>
</div>
<div class="absolute top-0 bg-white rounded-lg top text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-top sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
    <div class="rounded">
        <div class="card-header">
            <strong>Form Kecamatan</strong>
        </div>
        <div class="card-body card-block">
            <div class="form-group">
                <label for="nama_kecamatan" class=" form-control-label">Nama Kecamatan</label>
                <input wire:model="nama_kecamatan" type="text" name="nama_kecamatan" placeholder="Nama Kecamatan" class="form-control">
            </div>
            <div class="form-group">
                <label for="photo">Logo:</label>
                <input type="file" class="form-control" id="exampleInputName" wire:model="photo">
                <div wire:loading wire:target="photo">
                    <i wire:loading.class="fa fa-spinner fa-spin"></i> Uploading...
                </div>

                @if ($photo)
                <div class="form-group">
                    <label for="photo">Logo Preview:</label>
                    <img width="150px" src="{{ $photo->temporaryUrl() }}">
                </div>
                @endif

                @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
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
    </div>
</div>