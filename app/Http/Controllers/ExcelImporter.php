<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\YearsStatsData;
use App\Models\YearsPlayersAvailable;

ini_set('max_execution_time', 180); //3 minutes

class ExcelImporter extends Controller
{
    public function uploadFile(Request $request, $subFolder='Statistiche_Fantacalcio'){
        
        // Validation
        $request->validate([
            'excel_file' => 'required|mimes:csv,xls,xlsx|max:2048'
        ]); 

        $message = '';
        $alert_class = '';
        if($request->file('excel_file')) {
            $file = $request->file('excel_file');
            $filename = $file->getClientOriginalName();

            // File upload location
            $location = Storage::disk('local');

            // Upload file
            $location->putFileAs('import/'.$subFolder, $request->file('excel_file'), $filename);

            // ReadExcel
            $this->readExcel( storage_path('app/import/'.$subFolder.'/').$filename, $request->input('year') );

            $message = 'Upload Successfully.';
            $alert_class = 'alert-success';
        }else{
            $message = 'File not uploaded.';
            $alert_class = 'alert-danger';
        }

        return redirect('import-year-stats-data')->with(['message' => $message, 'alert_class' => $alert_class]);
    }

    public function uploadFileEuroleghe(Request $request, $subFolder='Statistiche_Euroleghe'){
        
        // Validation
        $request->validate([
            'excel_file' => 'required|mimes:csv,xls,xlsx|max:2048'
        ]); 

        $message = '';
        $alert_class = '';
        if($request->file('excel_file')) {
            $file = $request->file('excel_file');
            $filename = $file->getClientOriginalName();

            // File upload location
            $location = Storage::disk('local');

            // Upload file
            $location->putFileAs('import/'.$subFolder, $request->file('excel_file'), $filename);


            // ReadExcel
            $this->readExcelEuroleghe( storage_path('app/import/'.$subFolder.'/').$filename, $request->input('year') );

            $message = 'Upload Successfully.';
            $alert_class = 'alert-success';
        }else{
            $message = 'File not uploaded.';
            $alert_class = 'alert-danger';
        }

        return redirect('import-year-stats-data-euroleghe')->with(['message' => $message, 'alert_class' => $alert_class]);
    }

    public function readExcel($srcExcel, $year='2020-21'){
        
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
        $spreadsheet = $reader->load($srcExcel);
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();

        foreach( $rows AS $i => $item ) :
            if ( $i>=2 ) :
                $YearStasData = new YearsStatsData;
                $YearStasData->fid = $item[0];
                $YearStasData->role = $item[1];
                $YearStasData->name = $item[2];
                $YearStasData->team = $item[3];
                $YearStasData->pg = $item[4];
                $YearStasData->mv = $item[5];
                $YearStasData->mf = $item[6];
                $YearStasData->gf = $item[7];
                $YearStasData->gs = $item[8];
                $YearStasData->rp = $item[9];
                $YearStasData->rc = $item[10];
                $YearStasData->rf = $item[11];
                $YearStasData->rs = $item[12];
                $YearStasData->ass = $item[13];
                $YearStasData->amm = $item[14];
                $YearStasData->esp = $item[15];
                $YearStasData->au = $item[16];
                $YearStasData->year = $year;
                $YearStasData->save();
            endif;
        endforeach;
    }
    
    public function readExcelEuroleghe($srcExcel, $year='2020-21'){
        
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
        $spreadsheet = $reader->load($srcExcel);
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();

        foreach( $rows AS $i => $item ) :
            if ( $i>=2 && $item[3]!='Serie A' ) :
                $YearStasData = new YearsStatsData;
                $YearStasData->fid = $item[0];
                $YearStasData->role = $item[1];
                $YearStasData->name = $item[2];
                $YearStasData->team = $item[4];
                $YearStasData->pg = $item[5];
                $YearStasData->mv = $item[6];
                $YearStasData->mf = $item[7];
                $YearStasData->gf = $item[8];
                $YearStasData->gs = $item[9];
                $YearStasData->rp = $item[10];
                $YearStasData->rc = $item[11];
                $YearStasData->rf = $item[12];
                $YearStasData->rs = $item[13];
                $YearStasData->ass = $item[14];
                $YearStasData->amm = $item[15];
                $YearStasData->esp = $item[16];
                $YearStasData->au = $item[17];
                $YearStasData->year = $year;
                $YearStasData->save();
            endif;
        endforeach;
    }

    public function uploadFilePlayers(Request $request, $subFolder='Quotazioni'){
        
        // Validation
        $request->validate([
            'excel_file' => 'required|mimes:csv,xls,xlsx|max:2048'
        ]); 

        $message = '';
        $alert_class = '';
        if($request->file('excel_file')) {
            $file = $request->file('excel_file');
            $filename = $file->getClientOriginalName();

            // File upload location
            $location = Storage::disk('local');

            // Upload file
            $location->putFileAs('import/'.$subFolder, $request->file('excel_file'), $filename);

            // ReadExcel
            $this->readExcelPlayers( storage_path('app/import/'.$subFolder.'/').$filename );

            $message = 'Upload Successfully.';
            $alert_class = 'alert-success';
        }else{
            $message = 'File not uploaded.';
            $alert_class = 'alert-danger';
        }

        return redirect('import-year-players')->with(['message' => $message, 'alert_class' => $alert_class]);
    }

    
    public function readExcelPlayers($srcExcel){
        
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
        $spreadsheet = $reader->load($srcExcel);
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();
        
        foreach( $rows AS $i => $item ) :
            $YearStasData = new YearsPlayersAvailable;
            if ( $i==0 )  $YearStasData::truncate();
            if ( $i>=2 ) :
                // $YearStasData = new YearsPlayersAvailable;
                $YearStasData->fid = $item[0];
                $YearStasData->role = $item[1];
                $YearStasData->name = $item[3];
                $YearStasData->team = $item[4];
                $YearStasData->save();
            endif;
        endforeach;
    }
}
