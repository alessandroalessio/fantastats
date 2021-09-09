<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\YearsStatsData;

class ExcelImporter extends Controller
{
    public function uploadFile(Request $request){
        
        // Validation
        $request->validate([
            'excel_file' => 'required|mimes:csv,xls,xlsx|max:2048'
        ]); 

        if($request->file('excel_file')) {
            $file = $request->file('excel_file');
            $filename = $file->getClientOriginalName();

            // File upload location
            $location = Storage::disk('local');

            // Upload file
            $location->putFileAs('import/Statistiche_Fantacalcio', $request->file('excel_file'), $filename);

            // ReadExcel
            $this->readExcel( storage_path('app/import/Statistiche_Fantacalcio/').$filename );

            Session::flash('message','Upload Successfully.');
            Session::flash('alert-class', 'alert-success');
        }else{
            Session::flash('message','File not uploaded.');
            Session::flash('alert-class', 'alert-danger');
        }

        return redirect('import-year-stats-data');
    }

    public function readExcel($srcExcel){
        
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
        $spreadsheet = $reader->load($srcExcel);
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();

        foreach( $rows AS $i => $item ) :
            if ( $i>=2 ) :
                // YearsStatsData::doImport($rows);
                // dd(YearsStatsData::all());
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
                $YearStasData->year = '2020-21';
                $YearStasData->save();
            endif;
        endforeach;

        dd($rows);
    }
}
