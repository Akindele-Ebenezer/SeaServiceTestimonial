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
            $FileName_Report = '';
            $FileName_Picture = '';
            if ($Request->hasFile('Report')) {
                $ReportFile = $Request->file('Report'); 
                $ReportFileName = $ReportFile->getClientOriginalName(); 
                $FileName_Report = $ReportFileName; 
                $ReportFile->move(public_path('Documents/Reports/Vessels/' . $Request->Vessel), $ReportFileName);  
            } 
            if ($Request->hasFile('Picture')) { 
                $PictureFile = $Request->file('Picture'); 
                $PictureFileName = $PictureFile->getClientOriginalName();    
                $FileName_Picture = $PictureFileName; 
                $PictureFile->move(public_path('Documents/Pictures/Vessels/' . $Request->Vessel), $PictureFileName);  
            } 
            $CurrentRow = VesselAvailability::create([    
                'Vessel' => $Request->Vessel,
                'Status' => $Request->Status,
                'DoneBy' => $Request->DoneBy, 
                'Report' => $FileName_Report, 
                'Picture' => $FileName_Picture, 
                'Comment' => $Request->Comment,  
                'Location' => $Request->Location, 
                'Source' => 'SEA_SERVICE', 
                'StartTime' => substr($Request->StartTime, 0, 5),
                'EndTime' => substr($Request->EndTime, 0, 5),
                'StartDate' => $Request->StartDate,
                'EndDate' => $Request->EndDate,
                'TillNow' => $Request->TillNow,
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
                'Notification' =>  $Request->DoneBy . ' created availability for ' . $Request->Vessel . "'s tracking list. The Vessel is on " . $Request->Status . ' from ' . date('H:i A', strtotime(substr($Request->StartTime, 0, 5))) . ' to ' . date('H:i A', strtotime(substr($Request->EndTime, 0, 5))) . ' (' . $Request->StartDate . ' - ' . $Request->EndDate . ').',
            ]);   
            $PreviousRow = VesselAvailability::select('id')->where('id', '<', $CurrentRow->id)
                                                ->where('Vessel', $Request->Vessel) 
                                                ->latest()
                                                ->first(); 
                                                
            VesselAvailability::where('id', '<', $CurrentRow->id)
            ->where('Vessel', $Request->Vessel)->update([ 
                'TillNow' => 'NO',
            ]); 
            if ($CurrentRow->StartDate < date('Y-m-d')) {
                \DB::table('notifications')->insert([
                    'DateIn' => date('Y-m-d'),
                    'TimeIn' => date('H:i A'), 
                    'Vessel' => $Request->Vessel, 
                    'Action' => 'Delete',
                    'Subject' => 'User Creation Alert!',
                    'Notification' =>  session()->get('FullName') . ' created availability that is not today! Vessel Availability ID: ' . $CurrentRow->id . ', Start Date: ' . $Request->StartDate . ', Start Time: ' . $Request->StartTime . ', End Date: ' . $Request->EndDate . ', End Time: ' . $Request->EndTime,
                ]); 
                VesselAvailability::where('id', $PreviousRow->id)->update([
                    'EndTime' => substr($Request->StartTime, 0, 5), 
                    'EndDate' => $Request->StartDate, 
                    'TillNow' => 'NO',
                ]);  
            }
            if (!(($CurrentRow->StartDate < date('Y-m-d')) AND
                ($CurrentRow->DateIn == date('Y-m-d')))
            ) {  
                VesselAvailability::where('id', $PreviousRow->id ?? 0)
                ->where('Vessel', $Request->Vessel)->update([ 
                    'EndTime' => substr($Request->StartTime, 0, 5), 
                    'EndDate' => $Request->StartDate, 
                ]); 
                if ($Request->Status == 'IDLE') {
                    VesselAvailability::where('id', $PreviousRow->id)->update([
                        'EndDate' => date('Y-m-d'),
                        'EndTime' => substr($Request->StartTime, 0, 5), 
                        'TillNow' => 'NO',
                    ]);  
                }
            }
            return redirect()->route('Availability');
        } else {
            VesselAvailability::where('Source', 'PRIORITY')->whereNull('Status')->delete();
            Excel::import(new PriorityImportClass, 
            $Request->file('Attachment')->store('files'));
            \DB::table('notifications')->insert([
                'DateIn' => date('Y-m-d'),
                'TimeIn' => date('H:i A'), 
                'Vessel' => 'Vessels', 
                'Action' => 'Create',
                'Subject' => 'New Availability Alert!',
                'Notification' =>  session()->get('FullName') . ' uploaded data from PRIORITY.',
            ]); 
            return redirect()->back();
        }
    }
}
