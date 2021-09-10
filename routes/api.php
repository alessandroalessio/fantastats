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
        /*$players = YearsStatsData::all()
                    ->select('name, AVG(pv) pgavg')
                    ->groupBy('fid');*/

        $players = DB::table('year_stats_data')
            ->selectRaw('MAX(role) AS role')
            ->selectRaw('MAX(name) AS name')
            ->selectRaw('AVG(pg) pg_avg')
            ->groupBy('fid');

        if ( $request->get('role')) $players = $players->where('role', $request->get('role'));
        if ( $request->get('limit')) $players = $players->limit(10);
        
        // ->where('year', getenv('LATEST_STATS_YEAR'))->toJson();
        // return datatables()->of($customers)
        //     ->addColumn('action', function ($row) {
        //         $html = '<a href="#" class="btn btn-xs btn-secondary btn-edit">Edit</a> ';
        //         $html .= '<button data-rowid="' . $row->id . '" class="btn btn-xs btn-danger btn-delete">Del</button>';
        //         return $html;
        //     })->toJson();
    // }
    echo $players->get()->toJson();
    // dd('player');
    // return $request->user();
});

