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
     * Get Totals of Available Players with Stats Data
     */
    public function getTotalsAvailablePlayersStatsData($params=[]){

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
    
        return $players->count();
    }

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
        if ( isset($params['fid']) ) $players->where('ypa.fid', $params['fid']);

        // Offset
        $offset = 0;
        if ( isset($params['offset']) ) $offset = $params['offset'];
        $players->offset($offset);

        // Limit
        $limit = 25;
        $players->limit($params['limit']);

        // Search
        if ( isset($params['search']) ) {
            $players->where('ypa.name', 'LIKE', $params['search'].'%');
            $players->offset(0);
            // $players->limit(25);
        }
    
        $data = $players->get();

        // Pushing data into array
        $results = [];
        if ($data) {
            foreach ( $data AS $k => $item ){
                $itemData = (array) $item;
                $itemData['pg'] = floatval($item->pg);
                $itemData['mv'] = floatval($item->mv);
                $itemData['mf'] = floatval($item->mf);
                $itemData['gf'] = floatval($item->gf);
                $itemData['gs'] = floatval($item->gs);
                $itemData['rp'] = floatval($item->rp);
                $itemData['rc'] = floatval($item->rc);
                $itemData['rf'] = floatval($item->rf);
                $itemData['rs'] = floatval($item->rs);
                $itemData['ass'] = floatval($item->ass);
                $itemData['amm'] = floatval($item->amm);
                $itemData['esp'] = floatval($item->esp);
                $itemData['au'] = floatval($item->au);
                $itemData['gt'] = floatval($item->gt);
                // $itemData['url'] = '/view-player-stats-data/'.$item->fid;
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
            ->orderBy('year', 'desc')
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
