<?php

use App\Http\Livewire\DashboardIndex;
use App\Http\Livewire\DesaIndex;
use App\Http\Livewire\IkanIndex;
use App\Http\Livewire\KecamatanIndex;
use App\Http\Livewire\LaporanIndex;
use App\Http\Livewire\LaporanIndividuIndex;
use App\Http\Livewire\PembudidayaIndex;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->prefix('/data-master')->group(function () {
    Route::get('/kecamatan', KecamatanIndex::class)->name('kecamatan');
    Route::get('/desa', DesaIndex::class)->name('desa');
    Route::get('/ikan', IkanIndex::class)->name('ikan');
    Route::get('/pembudidaya', PembudidayaIndex::class)->name('pembudidaya');
    Route::get('/laporan-individu/{pembudidaya_id}', LaporanIndividuIndex::class)->name('laporanIndividu');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/laporan', LaporanIndex::class)->name('laporan');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', DashboardIndex::class)->name('dashboard');
