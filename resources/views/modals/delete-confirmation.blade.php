<div class="fixed inset-0 transition-opacity">
    <div class="absolute inset-0 bg-gray-500 opacity-75">
    </div>
</div>
<div class="absolute top-0 bg-white rounded-lg top text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-top sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
    <div class="rounded">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <h1 class="font-bold">Delete Confirmation</h1>
            <div>
                <span class="block sm:inline">{{$message}}</span>
            </div>
        </div>
        <div class="bg-gray-100 px-4 py-3 sm:px-6 sm:flex flex flex-row-reverse space-x-4 ">
            <button wire:click.prevent="delete()" type="submit" class="btn btn-danger rounded ml-2">
                Delete
            </button>
            <button wire:click="hideModal()" type="button" class="btn btn-outline-secondary rounded">
                Cancel
            </button>

        </div>
    </div>
</div>