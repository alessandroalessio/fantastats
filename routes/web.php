<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelImporter;
use App\Http\Controllers\LeaguesController;
use App\Models\YearsStatsData;
use App\Models\Leagues;

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

Route::resource('leagues', LeaguesController::class); 

/*
 * Navigation
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

Route::get('/user-league', function () {
    $Leagues = New Leagues();
    return view('user-league')->with('FantaLeagues', $Leagues->where('id_user', Auth::user()->id)->get());
})->middleware(['auth'])->name('user-league');

Route::get('/add-new-user-league', function () {
    return view('add-new-user-league');
})->middleware(['auth'])->name('add-new-user-league');

/**
 * Administration Routes
 */

Route::get('/import-year-stats-data', function () {
    return view('admin/import-year-stats-data');
})->middleware(['auth'])->name('import-year-stats-data');
Route::post('/do-import-year-stats-data', [ExcelImporter::class, 'uploadFile'])->name('import-year-stats-data');

Route::get('/import-year-stats-data-euroleghe', function () {
    return view('admin/import-year-stats-data-euroleghe');
})->middleware(['auth'])->name('import-year-stats-data-euroleghe');
Route::post('/do-import-year-stats-data-euroleghe', [ExcelImporter::class, 'uploadFileEuroleghe'])->name('import-year-stats-data-euroleghe');

Route::get('/import-year-players', function () {
    return view('admin/import-year-players');
})->middleware(['auth'])->name('import-year-players');
Route::post('/do-import-year-players', [ExcelImporter::class, 'uploadFilePlayers'])->name('import-year-players');

require __DIR__.'/auth.php';
