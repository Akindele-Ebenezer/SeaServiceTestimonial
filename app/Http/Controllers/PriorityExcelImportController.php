<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VesselAvailability;
use App\Imports\PriorityImportClass; 
use Maatwebsite\Excel\Writer; 
use Maatwebsite\Excel\Facades\Excel;

class PriorityExcelImportController extends Controller
{
    public function import(Request $Request)
    {
        if (empty($_GET['Attachment'])) {
            VesselAvailability::insert([
                'Vessel' => $Request->Vessel,
                'Status' => $Request->Status,
                'DoneBy' => $Request->DoneBy, 
                'Source' => 'SEA_SERVICE', 
                'StartTime' => $Request->StartTime,
                'EndTime' => $Request->EndTime,
                'StartDate' => $Request->StartDate,
                'EndDate' => $Request->EndDate,
                'DateIn' => date('Y-m-d'),
                'TimeIn' => date('H:i a'),
            ]);
            \DB::table('notifications')->insert([
                'DateIn' => date('Y-m-d'),
                'TimeIn' => date('H:i A'),
                'UserId' => session()->get('USER_ID'),
                'Vessel' => $Request->Vessel, 
                'Action' => 'Create',
                'Subject' => 'New Availability Alert!',
                'Notification' =>  $Request->DoneBy . ' created availability for ' . $Request->Vessel . "'s tracking list. The Vessel is on " . $Request->Status . ' from ' . $Request->StartTime . ' to ' . $Request->EndTime . ' (' . $Request->StartDate . ' - ' . $Request->EndDate . ').',
            ]);
            return redirect()->route('Availability');
        } else {
            VesselAvailability::where('Source', 'PRIORITY')->delete();
            Excel::import(new PriorityImportClass, 
            $Request->file('Attachment')->store('files'));
            return redirect()->back();
        }
    }
}
