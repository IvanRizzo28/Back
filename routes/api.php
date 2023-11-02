<?php

use App\Http\Controllers\Conctact;
use App\Http\Controllers\Register;
use App\Http\Controllers\Rubric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//anagrafica
Route::resource('/anagrafica', Register::class);
Route::get('anagrafica/ordinamento/{tipo}', [Register::class, 'ordinamento']);
Route::get('anagrafica/filtra/{tipo}', [Register::class, 'filtra']);

//rubrics
Route::resource('/rubrica', Rubric::class);

//conctact
Route::get('/contatti/get/{rubric_id}', [Conctact::class, 'get']);
Route::resource('/contatti', Conctact::class);
