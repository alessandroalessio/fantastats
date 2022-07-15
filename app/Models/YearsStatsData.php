<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class YearsStatsData extends Model
{
    use HasFactory;

    protected $table = 'year_stats_data';
    protected $primaryKey = 'id';
    public $incrementing = true;

    /**
     * Get List of Available Players with Stats data
     */
    public function getAvailablePlayersStatsData($params=[]){

        $players = DB::table('years_players_availables AS ypa')
            ->selectRaw('ypa.fid')
            ->selectRaw('ypa.role')
            ->selectRaw('ypa.name')
            ->selectRaw('ypa.team')
            ->selectRaw('(SELECT ROUND(AVG(pg),2) FROM year_stats_data WHERE fid=ypa.fid) AS pg')
            ->selectRaw('(SELECT ROUND(AVG(mv),2) FROM year_stats_data WHERE fid=ypa.fid) AS mv')
            ->selectRaw('(SELECT ROUND(AVG(mf),2) FROM year_stats_data WHERE fid=ypa.fid) AS mf')
            ->selectRaw('(SELECT ROUND(AVG(gf),2) FROM year_stats_data WHERE fid=ypa.fid) AS gf')
            ->selectRaw('(SELECT ROUND(AVG(gs),2) FROM year_stats_data WHERE fid=ypa.fid) AS gs')
            ->selectRaw('(SELECT ROUND(AVG(rp),2) FROM year_stats_data WHERE fid=ypa.fid) AS rp')
            ->selectRaw('(SELECT ROUND(AVG(rc),2) FROM year_stats_data WHERE fid=ypa.fid) AS rc')
            ->selectRaw('(SELECT ROUND(AVG(rf),2) FROM year_stats_data WHERE fid=ypa.fid) AS rf')
            ->selectRaw('(SELECT ROUND(AVG(rs),2) FROM year_stats_data WHERE fid=ypa.fid) AS rs')
            ->selectRaw('(SELECT ROUND(AVG(ass),1) FROM year_stats_data WHERE fid=ypa.fid) AS ass')
            ->selectRaw('(SELECT ROUND(AVG(amm),1) FROM year_stats_data WHERE fid=ypa.fid) AS amm')
            ->selectRaw('(SELECT ROUND(AVG(esp),1) FROM year_stats_data WHERE fid=ypa.fid) AS esp')
            ->selectRaw('(SELECT ROUND(AVG(au),1) FROM year_stats_data WHERE fid=ypa.fid) AS au')
            ->selectRaw('(SELECT ROUND(AVG(gf)+AVG(rf),2) FROM year_stats_data WHERE fid=ypa.fid) AS gt');

        if ( isset($params['role']) ) $players->where('role', $params['role']);

        // Limit get
        $limit = 25;
        if ( isset($params['limit']) ) $limit = $params['limit'];
        $players->limit($limit);
    
        $data = $players->get();

        // Pushing data into array
        $results = [];
        if ($data) {
            foreach ( $data AS $k => $item ){
                $itemData = (array) $item;
                $itemData['url'] = '/view-player-stats-data/'.$item->fid;
                array_push($results, $itemData);
            }
        }
        
        return $results;
    }

    /**
     * Get Basic infor about Available Player
     */
    public function getSingleAvailablePlayer($id){
        $players = DB::table('years_players_availables AS ypa')
            ->selectRaw('ypa.fid')
            ->selectRaw('ypa.role')
            ->selectRaw('ypa.name')
            ->selectRaw('ypa.team')
            ->where('fid', $id);    
        $data = $players->get();

        // Pushing data into array
        $results = [];
        if ($data) {
            foreach ( $data AS $k => $item ){
                $itemData = (array) $item;
                // $itemData['url'] = '/view-player-stats-data/'.$item->fid;
                $results = $itemData;
                $results['color'] = $this->getColorByRole($item->role);
            }
        }

        // Pushing Year Stats
        $year_stats_data = DB::table('year_stats_data')
            ->where('fid', $id)
            ->get();
        $results['year_stats'] = $year_stats_data;
        
        return $results;
    }

    /**
     * Retrieve Data Stats for a single Player
     */
    public function getAvailableSinglePlayerStatsData($id){
        $players = DB::table('year_stats_data')
            ->selectRaw('ROUND(AVG(pg),2) AS pg')
            ->selectRaw('ROUND(AVG(mv),2) AS mv')
            ->selectRaw('ROUND(AVG(mf),2) AS mf')
            ->selectRaw('ROUND(AVG(gf),2) AS gf')
            ->selectRaw('ROUND(AVG(gs),2) AS gs')
            ->selectRaw('ROUND(AVG(rp),2) AS rp')
            ->selectRaw('ROUND(AVG(rc),2) AS rc')
            ->selectRaw('ROUND(AVG(rf),2) AS rf')
            ->selectRaw('ROUND(AVG(rs),2) AS rs')
            ->selectRaw('ROUND(AVG(ass),1) AS ass')
            ->selectRaw('ROUND(AVG(amm),1) AS amm')
            ->selectRaw('ROUND(AVG(esp),1) AS esp')
            ->selectRaw('ROUND(AVG(au),1) AS au')
            ->selectRaw('ROUND(AVG(gf)+AVG(rf),2) AS gt')
            ->selectRaw('SUM(gf+rf) AS sum_gt')
            ->selectRaw('SUM(pg) AS sum_pg')
            ->where('fid', $id)
            ->get();
        
        $results = [];
        foreach( $players AS $k => $item ):
            $results = (array) $item;
        endforeach;

        return $results;
    }

    /**
     * Get Yearly Data by Player
     */
    public function getSingleAvailablePlayerDataStats($id){

        $year_stats_data = DB::table('year_stats_data')
            ->selectRaw('fid, role, name, team, pg, mv, ROUND(mf,2) AS mf, gf, gs, rp, rc, rf, rs, ass, amm, esp, au, year')
            ->selectRaw('ROUND(gf+rf,0) AS gt')
            ->where('fid', $id)
            ->get();
        
        return $year_stats_data;
    }

    /**
     * Get Color by Role
     */
    public function getColorByRole($role){
        if ( $role=='A' ) return 'red';
        if ( $role=='C' ) return 'yellow';
        if ( $role=='D' ) return 'green';
        if ( $role=='P' ) return 'blue';
    }
}
