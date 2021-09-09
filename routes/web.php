<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelImporter;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/import-year-stats-data', function () {
    return view('admin/import-year-stats-data');
})->middleware(['auth'])->name('import-year-stats-data');

Route::post('/do-import-year-stats-data', [ExcelImporter::class, 'uploadFile'])->name('import-year-stats-data');

require __DIR__.'/auth.php';
