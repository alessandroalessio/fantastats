<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelImporter;
use App\Models\YearsStatsData;

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

Route::get('/view-player-stats-data', function () {
    $YSD = new YearsStatsData;
    return view('view-player-stats-data')->with('YSD', $YSD);
})->middleware(['auth'])->name('view-player-stats-data');

Route::get('/view-player-stats-data/{id}', function ($id) {
    $YSD = new YearsStatsData;
    return view('view-single-player-stats')->with('player_data', $YSD->getSingleAvailablePlayer($id))->with('player_avg',  $YSD->getAvailableSinglePlayerStatsData($id));
})->middleware(['auth'])->name('view-single-player-stats');

/**
 * Administration Routes
 */

Route::get('/import-year-stats-data', function () {
    return view('admin/import-year-stats-data');
})->middleware(['auth'])->name('import-year-stats-data');
Route::post('/do-import-year-stats-data', [ExcelImporter::class, 'uploadFile'])->name('import-year-stats-data');

Route::get('/import-year-players', function () {
    return view('admin/import-year-players');
})->middleware(['auth'])->name('import-year-players');
Route::post('/do-import-year-players', [ExcelImporter::class, 'uploadFilePlayers'])->name('import-year-players');

require __DIR__.'/auth.php';
