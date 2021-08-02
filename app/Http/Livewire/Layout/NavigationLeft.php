<?php

namespace App\Http\Livewire\Layout;

use Illuminate\Support\Arr;
use Livewire\Component;

class NavigationLeft extends Component
{
    public $dataMasterMenu = [
        "kecamatan" => "Kecamatan",
        // "branch" => "Branchs",
        // // "role" => "Admin",
        // "province" => "Provinces",
        // "regency" => "Regencies",
        // "insurance" => "Insurances",
        // "vendor" => "Vendors",
        // "shippingratesunit" => "Shipping Rates Unit",
        // "shippingratescargo" => "Shipping Rates Cargo",
        // "masterRoute" => "Master Route",
        // "capitalunit" => "Capital Unit",
        // "capitalcargo" => "Capital Cargo",
        // "payload" => "Payloads",
        // "transport" => "Transports",
        // "transportFleet" => "Transport Fleet",
        // "shipSchedule" => "Ship Schedule"

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
