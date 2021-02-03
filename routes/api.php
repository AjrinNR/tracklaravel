<?php

use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Rw;
use App\Models\Kasus2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProvinsiController;
use App\Http\Controllers\Api\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('provinsi',[ProvinsiController::class,'index']);
// Route::post('provinsi',[ProvinsiController::class,'store']);
// Route::get('provinsi/{id}',[ProvinsiController::class,'show']);
// Route::delete('provinsi/{id}',[ProvinsiController::class,'destroy']);
Route::get('all',[ApiController::class,'index']);
Route::get('prov/{id}',[ApiController::class,'provinsiId']);
Route::get('prov',[ApiController::class,'provinsi']);