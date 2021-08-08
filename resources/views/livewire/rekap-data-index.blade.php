<div class="card">
    <div class="card-header">
        <strong class="card-title">Rekap Data Sistem</strong>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Kecamatan</h4>
                        </div>
                        <div class="card-body">
                            {{$data['jumlahKecamatan']}} wilayah
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Desa</h4>
                        </div>
                        <div class="card-body">
                            {{$data['jumlahDesa']}} daerah
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-fish"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Ikan</h4>
                        </div>
                        <div class="card-body">
                            {{$data['jumlahIkan']}} jenis
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Pembudidaya</h4>
                        </div>
                        <div class="card-body">
                            {{$data['jumlahPembudidaya']}} orang
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-server"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Data Pendapatan</h4>
                        </div>
                        <div class="card-body">
                            {{$data['jumlahLaporan']}} fild
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>