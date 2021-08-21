<?php

namespace App\Http\Livewire;

use App\Models\kecamatan;
use App\Models\Laporan;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ReportChart extends Component
{
    use WithPagination;
    // protected $listeners = ['postAdded' => 'render'];


    public $filterTahun, $dataTahun, $chartTypeSelected, $data, $labels;
    public $chartType = [
        "bar" => "Bar",
        "line" => "Line",
        "radar" => "Radar",
        "doughnut" => "Doughnut",
        "polarArea" => "Polar",
        "bubble" => "Bubble",
    ];
    protected $listeners = ['filterrrrrr' => '$refresh'];

    public function filterrrrrr($arg)
    {
        $this->filterTahun = $arg;
        $this->emit('postAdded');
    }

    public function updatedChartTypeSelected()
    {
        $this->resetPage();
        $this->data = [4, 34, 23, 56, 20, 12, 4, 34, 23, 56, 20, 12, 4, 34, 23];
        $this->emit('postAdded');
    }
    public function mount($tahun)
    {
        $this->emit('postAdded');
        $this->filterTahun = $tahun;
        $this->chartTypeSelected = "bar";
    }

    public function render(): View
    {
        $dataKecamatans = kecamatan::with(['desa', 'desa.pembudidaya', 'desa.pembudidaya.laporan'])
            ->whereHas('desa.pembudidaya.laporan', function ($q) {
                return $q->where('tahun', $this->filterTahun);
            })
            ->where("is_deleted", 0)
            ->orderBy('nama_kecamatan', 'asc')
            ->get();
        foreach ($dataKecamatans as $kecamatan) {
            $dataChart[$kecamatan->nama_kecamatan] = 0;
            foreach ($kecamatan->desa as $desa) {
                foreach ($desa->pembudidaya as $pembudidaya) {
                    $dataChart[$kecamatan->nama_kecamatan] = $dataChart[$kecamatan->nama_kecamatan] + $pembudidaya->laporan->sum("jumlah_pendapatan");
                }
            }
        }
        foreach ($dataChart as $key => $data) {
            $this->data[] = $data;
            $this->labels[] = $key;
        }



        $nama_kecamatan = $dataKecamatans->pluck('nama_kecamatan');

        $newRekap['labels'] = $this->labels;
        $newRekap['datasets'][] = [
            "label" => "Hasil Pendapatan Tahunan " . $this->filterTahun,
            "data" => $this->data,
            "backgroundColor" => [
                "rgba(255, 99, 132, 0.2)",
                "rgba(54, 162, 235, 0.2)",
                "rgba(255, 206, 86, 0.2)",
                "rgba(75, 192, 192, 0.2)",
                "rgba(153, 102, 255, 0.2)",
                "rgba(255, 159, 64, 0.2)",
                "rgba(255, 99, 132, 0.2)",
                "rgba(54, 162, 235, 0.2)",
                "rgba(255, 206, 86, 0.2)",
                "rgba(75, 192, 192, 0.2)",
                "rgba(153, 102, 255, 0.2)",
                "rgba(255, 159, 64, 0.2)",
                "rgba(255, 99, 132, 0.2)",
                "rgba(54, 162, 235, 0.2)",
                "rgba(255, 206, 86, 0.2)",
            ],
            "borderColor" => [
                "rgba(255, 99, 132, 1)",
                "rgba(54, 162, 235, 1)",
                "rgba(255, 206, 86, 1)",
                "rgba(75, 192, 192, 1)",
                "rgba(153, 102, 255, 1)",
                "rgba(255, 159, 64, 1)",
                "rgba(255, 99, 132, 1)",
                "rgba(54, 162, 235, 1)",
                "rgba(255, 206, 86, 1)",
                "rgba(75, 192, 192, 1)",
                "rgba(153, 102, 255, 1)",
                "rgba(255, 159, 64, 1)",
                "rgba(255, 99, 132, 1)",
                "rgba(54, 162, 235, 1)",
                "rgba(255, 206, 86, 1)"
            ],
            "borderWidth" => 1
        ];
        $newRekap = json_encode($newRekap);
        return view('livewire.report-chart', ["dataRekap" => $newRekap, "typeChart" => $this->chartTypeSelected]);
    }
}
