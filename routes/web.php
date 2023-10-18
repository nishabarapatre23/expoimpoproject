<?php

use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/file-import',[ImportController::class,'import'])->name('file-import');
Route::post('/import',[ImportController::class,'import_exel'])->name('import');

Route::get('table',[ImportController::class,'table'])->name('table');

Route::get('fetch',[ImportController::class,'fetch'])->name('fetch');

Route::get('export',[ImportController::class,'export_data'])->name('export');

Route::post('edit/{id}',[ImportController::class,'edit'])->name('edit');

Route::post('update',[ImportController::class,'update'])->name('update');

Route::get('delete/{id}',[ImportController::class,'delete'])->name('delete');
