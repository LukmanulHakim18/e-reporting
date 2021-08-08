<div class="fixed inset-0 transition-opacity">
    <div class="absolute inset-0 bg-gray-500 opacity-75">
    </div>
</div>
<div class="absolute top-0 bg-white rounded-lg top text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-top sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
    <div class="rounded">
        <form>
            <div class="card-header">
                <strong>Form Laporan</strong>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label for="pembudidaya_id" class=" form-control-label">Nama Pembudidaya</label>
                    <select wire:model="pembudidaya_id" class="form-control">
                        <option value="">Pilih pembudidaya</option>
                        @forelse($dataPembudidaya as $value)
                        <option value="{{$value->pembudidaya_id}}">{{$value->nama_pembudidaya}}</option>
                        @empty

                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label for="ikan_id" class=" form-control-label">Nama Ikan</label>
                    <select wire:model="ikan_id" class="form-control">
                        <option value="">Pilih Ikan</option>
                        @forelse($dataIkan as $value)
                        <option value="{{$value->ikan_id}}">{{$value->nama_ikan}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="row">
                    <div class="col-7">
                        <div class="form-group">
                            <label for="bulan" class=" form-control-label">Bulan</label>
                            <select wire:model="bulan" class="form-control">
                                <option value="">Pilih Bulan</option>
                                @forelse(config('constants.bulan') as $value)
                                <option value="{{$value}}">{{$value}}</option>
                                @empty

                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="tahun" class=" form-control-label">Tahun</label>
                            <select wire:model="tahun" class="form-control">
                                <option value="">Pilih Tahun</option>
                                @php
                                $year = date("Y");
                                $target = $year -5;
                                while ($year >= $target) {
                                echo'<option value="'.$target.'">'.$target.'</option>';
                                $target++;
                                } @endphp
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="jumlah_pendapatan" class=" form-control-label">Jumlah Pendapatan (Kg)</label>
                    <input wire:model="jumlah_pendapatan" type="number" name="jumlah_pendapatan" placeholder="0" class="form-control"></input>
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