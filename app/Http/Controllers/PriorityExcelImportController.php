<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\PriorityImportClass; 
use Maatwebsite\Excel\Writer; 
use Maatwebsite\Excel\Facades\Excel;

class PriorityExcelImportController extends Controller
{
    public function import(Request $request)
    {
        Excel::import(new PriorityImportClass, 
        $request->file('Attachment')->store('files'));
        return redirect()->back();
    }
}
