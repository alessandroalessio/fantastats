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
        
        /*
        SELECT 
            ypa.fid, ypa.role, ypa.name, ypa.team, 
            (SELECT AVG(pg) FROM year_stats_data WHERE fid=ypa.fid) AS pg,
            (SELECT AVG(mv) FROM year_stats_data WHERE fid=ypa.fid) AS mv,
            (SELECT AVG(mf) FROM year_stats_data WHERE fid=ypa.fid) AS mf,
            (SELECT AVG(gf) FROM year_stats_data WHERE fid=ypa.fid) AS gf,
            (SELECT AVG(gs) FROM year_stats_data WHERE fid=ypa.fid) AS gs,
            (SELECT AVG(rp) FROM year_stats_data WHERE fid=ypa.fid) AS rp,
            (SELECT AVG(rc) FROM year_stats_data WHERE fid=ypa.fid) AS rc,
            (SELECT AVG(rf) FROM year_stats_data WHERE fid=ypa.fid) AS rf,
            (SELECT AVG(rs) FROM year_stats_data WHERE fid=ypa.fid) AS rs,
            (SELECT AVG(ass) FROM year_stats_data WHERE fid=ypa.fid) AS ass,
            (SELECT AVG(amm) FROM year_stats_data WHERE fid=ypa.fid) AS amm,
            (SELECT AVG(esp) FROM year_stats_data WHERE fid=ypa.fid) AS esp,
            (SELECT AVG(au) FROM year_stats_data WHERE fid=ypa.fid) AS au
        FROM years_players_availables AS ypa
        */
        
        $players = DB::table('years_players_availables AS ypa')
            ->selectRaw('ypa.fid')
            ->selectRaw('ypa.role')
            ->selectRaw('ypa.name')
            ->selectRaw('ypa.team')
            ->selectRaw('(SELECT AVG(pg) FROM year_stats_data WHERE fid=ypa.fid) AS pg')
            ->selectRaw('(SELECT AVG(mv) FROM year_stats_data WHERE fid=ypa.fid) AS mv')
            ->selectRaw('(SELECT AVG(mf) FROM year_stats_data WHERE fid=ypa.fid) AS mf')
            ->selectRaw('(SELECT AVG(gf) FROM year_stats_data WHERE fid=ypa.fid) AS gf')
            ->selectRaw('(SELECT AVG(gs) FROM year_stats_data WHERE fid=ypa.fid) AS gs')
            ->selectRaw('(SELECT AVG(rp) FROM year_stats_data WHERE fid=ypa.fid) AS rp')
            ->selectRaw('(SELECT AVG(rc) FROM year_stats_data WHERE fid=ypa.fid) AS rc')
            ->selectRaw('(SELECT AVG(rf) FROM year_stats_data WHERE fid=ypa.fid) AS rf')
            ->selectRaw('(SELECT AVG(rs) FROM year_stats_data WHERE fid=ypa.fid) AS rs')
            ->selectRaw('(SELECT AVG(ass) FROM year_stats_data WHERE fid=ypa.fid) AS ass')
            ->selectRaw('(SELECT AVG(esp) FROM year_stats_data WHERE fid=ypa.fid) AS esp')
            ->selectRaw('(SELECT AVG(au) FROM year_stats_data WHERE fid=ypa.fid) AS au')
            ->selectRaw('(SELECT AVG(gf)+AVG(rf) FROM year_stats_data WHERE fid=ypa.fid) AS gt')
            ;

        if ( $request->get('role')) $players = $players->where('role', $request->get('role'));
        if ( $request->get('limit')) $players = $players->limit(10);
        
    // }
    echo $players->get()->toJson();
});

