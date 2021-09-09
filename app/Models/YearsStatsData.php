<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearsStatsData extends Model
{
    use HasFactory;

    protected $table = 'year_stats_data';
    protected $primaryKey = 'id';
    public $incrementing = true;

    public function doImport($data){
        echo 'Import';
        dd($data);
    }
}
