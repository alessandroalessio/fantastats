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

        header('Content-type: application/json');
        echo json_encode($players);
    // }
});

Route::get('/single-player-stats-data/{id}', function (Request $request, $id) {
    // if ($request->ajax()) {
        $YearsStatsData = new YearsStatsData();
        $players = $YearsStatsData->getSingleAvailablePlayerDataStats($id);
        
        header('Content-type: application/json');
        echo json_encode($players);
    // }
});


// Routes 2022

Route::get('/v2/player-stats-data', function (Request $request) {
    $params = [];
    if ( $request->get('role')) $params['role'] = $request->get('role');

    // Default
    $page = 1;
    $offset = 0;
    $limit = 25;

    // Page Set
    if ( $request->get('page') ) {
        $params['page'] = $request->get('page');
        $page = $params['page'];
    }

    if ( $request->get('perPage')){
        $params['limit'] = $request->get('perPage');
        $limit = $params['perPage'];
    }

    if ( $page>1 ) {
        $offset = ($page-1)*$limit;
    }

    if ( $request->get('s')) { 
        $params['search'] = $request->get('s');
        $page = 1;
        $offset = 0;
        $limit = 25;
    }

    $params['page'] = $page;
    $params['offset'] = $offset;
    $params['limit'] = $limit;

    $YearsStatsData = new YearsStatsData();
    
    $content['page'] = $page;
    $content['per_page'] = $limit;
    $content['total'] = $YearsStatsData->getTotalsAvailablePlayersStatsData();
    $content['total_pages'] = round($content['total']/$limit, 0);
    
    $players = $YearsStatsData->getAvailablePlayersStatsData($params);
    $content['data'] = $players;

    return response( json_encode( $content ) )
            ->header('Content-Type', 'application/json');
});

