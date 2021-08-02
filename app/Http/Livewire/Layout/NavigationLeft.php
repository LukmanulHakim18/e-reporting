<?php

namespace App\Http\Livewire\Layout;

use Illuminate\Support\Arr;
use Livewire\Component;

class NavigationLeft extends Component
{
    public $dataMasterMenu = [
        "kecamatan" => "Kecamatan"

    ];

    public function render()
    {
        $fullPath = explode('/', request()->path());
        $isActive['menu'] = Arr::has($fullPath, '0') ? $fullPath[0] : "";
        $isActive['submenu'] = Arr::has($fullPath, '1') ? $fullPath[1] : "";
        asort($this->dataMasterMenu);
        return view('livewire.layout.navigation-left', [
            'isActive' => $isActive
        ]);
    }
}
