<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;

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

            Session::flash('message','Upload Successfully.');
            Session::flash('alert-class', 'alert-success');
        }else{
            Session::flash('message','File not uploaded.');
            Session::flash('alert-class', 'alert-danger');
        }

        return redirect('import-year-stats-data');
    }
}
