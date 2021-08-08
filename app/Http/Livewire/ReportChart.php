<?php

namespace App\Http\Livewire;

use App\Models\Laporan;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ReportChart extends Component
{
    use WithPagination;

    public $filterTahun, $dataTahun;

    public function mount($tahun)
    {
        $this->filterTahun = $tahun;
    }
    public function render()
    {

        $dataRekap = '
        {
            "labels": [' . $this->filterTahun . ', "Blue", "Yellow", "Green", "Purple", "Orange"],
            "datasets": [{
                "label": "# of Votes",
                "data": [' . $this->filterTahun / 100 . ', 15, 3, 5, 2, 3],
                "backgroundColor": [
                    "rgba(255, 99, 132, 0.2)",
                    "rgba(54, 162, 235, 0.2)",
                    "rgba(255, 206, 86, 0.2)",
                    "rgba(75, 192, 192, 0.2)",
                    "rgba(153, 102, 255, 0.2)",
                    "rgba(255, 159, 64, 0.2)"
                ],
                "borderColor": [
                    "rgba(255, 99, 132, 1)",
                    "rgba(54, 162, 235, 1)",
                    "rgba(255, 206, 86, 1)",
                    "rgba(75, 192, 192, 1)",
                    "rgba(153, 102, 255, 1)",
                    "rgba(255, 159, 64, 1)"
                ],
                "borderWidth": 1
            }]
        }
        ';

        return view('livewire.report-chart', ["dataRekap" => $dataRekap]);
    }
}
