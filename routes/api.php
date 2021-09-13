<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\YearsStatsData;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/player-stats-data', function (Request $request) {
    // if ($request->ajax()) {
        $params = [];
        if ( $request->get('role')) $params['role'] = $request->get('role');
        if ( $request->get('limit')) $params['limit'] = $request->get('limit');

        $YearsStatsData = new YearsStatsData();
        $players = $YearsStatsData->getAvailablePlayersStatsData($params);

        echo json_encode($players);
    // }
});

Route::get('/single-player-stats-data/{id}', function (Request $request, $id) {
    // if ($request->ajax()) {
        $YearsStatsData = new YearsStatsData();
        $players = $YearsStatsData->getSingleAvailablePlayerDataStats($id);
        echo json_encode($players);
    // }
});


