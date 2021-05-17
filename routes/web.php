<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PismoController;
use App\Http\Controllers\PovezController;
use App\Http\Controllers\FormatController;
use App\Http\Controllers\IzdavacController;
use App\Http\Controllers\KategorijaController;
use App\Http\Controllers\UcenikController;
use App\Http\Controllers\KorsnikController;
use App\Http\Controllers\TipkorsnikaController;
use App\Http\Controllers\ZanrController;
use App\Http\Controllers\PolisaController;

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
// Route za dashboard
Route::get("/",function(){
    return view('dashboard.index');
})->name('dashboard');
//Route::get('/settings',[PismoController::class,'index')->name('settings');
Route::get('/settings',function(){
    return view('settings.index');
})->name('settings');
Route::resource('pismo', PismoController::class);



Route::resource('izdavac',IzdavacController::class);
Route::resource('format',FormatController::class);
Route::resource('povez',PovezController::class);

Route::get('/settingsKategorije', [KategorijaController::class,'index'])->name("kategorije");

Route::get('/createKategorije', [KategorijaController::class,'create'])->name("kategorije.create");

Route::post('/storeKategorije',[KategorijaController::class,'store'] )->name("kategorije.store");

Route::get('/deleteKategorije/{id}', [KategorijaController::class,'delete'] )->name("kategorije.delete");

Route::get('/editKategorije/{id}', [KategorijaController::class,'edit'])->name("kategorije.edit");

Route::post('/updateKategorije/{id}', [KategorijaController::class,'update'])->name("kategorije.update");
Route::resource('ucenik',UcenikController::class);
Route::resource('zanr',ZanrController::class);
Route::get('polisa',function(){
    return view('polisa.index');
});
