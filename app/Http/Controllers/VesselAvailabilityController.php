<?php

namespace App\Http\Controllers;

use App\Models\VesselAvailability;
use Illuminate\Http\Request;
use App\Models\Employee; 

class VesselAvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $Request)
    { 
        VesselAvailability::where('TillNow', 'YES')->update([
            'EndTime' => date('H:i'),
            'EndDate' => date('Y-m-d'),
        ]);

        $Employees = Employee::orderBy('EmployeeId', 'DESC')->get();
        $Vessels = \DB::table('vessels_vessel_information')->get();
        $Ranks = \DB::table('ranks')->get();
        $Companies = \DB::table('companies')->orderBy('id', 'DESC')->get();
        $VesselAvailability = VesselAvailability::orderBy('StartDate', 'DESC')->orderBy('StartTime', 'DESC')->orderBy('EndTime', 'DESC')->paginate(20); 
        $Vessels = \DB::table('vessels_vessel_information')->select(['VesselName', 'ImoNumber', 'CallSign'])->get();
        $STARTDATE = date('Y-m-d'); 
        $NumberOfVessels = \DB::table('vessels_vessel_information')->get();
        $NumberOfVessels_IDLE = VesselAvailability::select('Vessel')->where('Status', 'IDLE')
                                ->where(function($query) {
                                    $query->where('StartDate', '>=', date('Y-m-d'))
                                            ->orWhere('EndDate', '>=', date('Y-m-d'));
                                }) 
                                ->groupBy('Vessel')->get(); 
        // $NumberOfVessels_IDLE = VesselAvailability::select('Vessel')->join('vessels_vessel_information', 'vessels_vessel_information.VesselName', '=', 'vessel_availabilities.Vessel')->where('EndDate', '<', date('Y-m-d'))->orWhere('Status', 'IDLE')->groupBy('Vessel')->get();

        $NumberOfVessels_BUNKERY = VesselAvailability::select('Vessel')->where('Status', 'BUNKERY')->where('EndDate', '>=', date('Y-m-d')) 
                                ->orWhere(function($query) {
                                    $query->where('Status', 'BUNKERY') 
                                            ->where('TillNow', 'YES');
                                })->groupBy('Vessel')->get();
        $NumberOfVessels_INSPECTION = VesselAvailability::select('Vessel')->where('Status', 'INSPECTION')->where('EndDate', '>=', date('Y-m-d')) 
                                ->orWhere(function($query) {
                                    $query->where('Status', 'INSPECTION') 
                                            ->where('TillNow', 'YES');
                                })->groupBy('Vessel')->get();
        $NumberOfVessels_MAINTENANCE = VesselAvailability::select('Vessel')->where('Status', 'MAINTENANCE')->where('EndDate', '>=', date('Y-m-d')) 
                                ->orWhere(function($query) {
                                    $query->where('Status', 'MAINTENANCE') 
                                            ->where('TillNow', 'YES');
                                })->groupBy('Vessel')->get();
        $NumberOfVessels_OPERATION = VesselAvailability::select('Vessel')->where('Status', 'OPERATION')->where('EndDate', '>=', date('Y-m-d')) 
                                ->orWhere(function($query) {
                                    $query->where('Status', 'OPERATION') 
                                            ->where('TillNow', 'YES');
                                })->groupBy('Vessel')->get();
        $NumberOfVessels_BREAKDOWN = VesselAvailability::select('Vessel')->where('Status', 'BREAKDOWN')->where('EndDate', '>=', date('Y-m-d')) 
                                ->orWhere(function($query) {
                                    $query->where('Status', 'BREAKDOWN') 
                                            ->where('TillNow', 'YES');
                                })->groupBy('Vessel')->get();
        $NumberOfVessels_DOCKING = VesselAvailability::select('Vessel')->where('Status', 'DOCKING')->where('EndDate', '>=', date('Y-m-d')) 
                                ->orWhere(function($query) {
                                    $query->where('Status', 'DOCKING') 
                                            ->where('TillNow', 'YES');
                                })->groupBy('Vessel')->get(); 
         
        
        if (isset($Request->SpecificDay)) {
            $VesselAvailability = VesselAvailability::where('Vessel', $Request->Vessel_FILTER)->where('StartDate', $Request->SpecificDay)->orderBy('StartDate', 'DESC')->orderBy('EndDate', 'DESC')->orderBy('EndTime', 'DESC')->paginate(20); 
        }

        if (isset($Request->FromDate_FILTERBYDATE) AND isset($Request->EndDate_FILTERBYDATE)) {
            $STARTDATE = $Request->FromDate_FILTERBYDATE;
            $ENDDATE = $Request->EndDate_FILTERBYDATE;

            $NumberOfVessels_IDLE = VesselAvailability::select('Vessel')->where('Status', 'IDLE')->whereBetween('StartDate', [$STARTDATE, $ENDDATE])->groupBy('Vessel')->get();
            $NumberOfVessels_BUNKERY = VesselAvailability::select('Vessel')->where('Status', 'BUNKERY')->whereBetween('StartDate', [$STARTDATE, $ENDDATE])->groupBy('Vessel')->get();
            $NumberOfVessels_INSPECTION = VesselAvailability::select('Vessel')->where('Status', 'INSPECTION')->whereBetween('StartDate', [$STARTDATE, $ENDDATE])->groupBy('Vessel')->get();
            $NumberOfVessels_MAINTENANCE = VesselAvailability::select('Vessel')->where('Status', 'MAINTENANCE')->whereBetween('StartDate', [$STARTDATE, $ENDDATE])->groupBy('Vessel')->get();
            $NumberOfVessels_OPERATION = VesselAvailability::select('Vessel')->where('Status', 'OPERATION')->whereBetween('StartDate', [$STARTDATE, $ENDDATE])->groupBy('Vessel')->get();
            $NumberOfVessels_BREAKDOWN = VesselAvailability::select('Vessel')->where('Status', 'BREAKDOWN')->whereBetween('StartDate', [$STARTDATE, $ENDDATE])->groupBy('Vessel')->get();
            $NumberOfVessels_DOCKING = VesselAvailability::select('Vessel')->where('Status', 'DOCKING')->whereBetween('StartDate', [$STARTDATE, $ENDDATE])->groupBy('Vessel')->get();
            $VesselAvailability = VesselAvailability::whereBetween('EndDate', [$STARTDATE, $ENDDATE])->orderBy('StartDate', 'DESC')->orderBy('EndDate', 'DESC')->orderBy('EndTime', 'DESC')->paginate(20); 
            
            if (isset($Request->Vessel_FILTER)) { 
                $NumberOfVessels_IDLE = VesselAvailability::select('Vessel')->where('Vessel', $Request->Vessel_FILTER)->where('Status', 'IDLE')->whereBetween('StartDate', [$STARTDATE, $ENDDATE])->groupBy('Vessel')->get();
                $NumberOfVessels_BUNKERY = VesselAvailability::select('Vessel')->where('Vessel', $Request->Vessel_FILTER)->where('Status', 'BUNKERY')->whereBetween('StartDate', [$STARTDATE, $ENDDATE])->groupBy('Vessel')->get();
                $NumberOfVessels_INSPECTION = VesselAvailability::select('Vessel')->where('Vessel', $Request->Vessel_FILTER)->where('Status', 'INSPECTION')->whereBetween('StartDate', [$STARTDATE, $ENDDATE])->groupBy('Vessel')->get();
                $NumberOfVessels_MAINTENANCE = VesselAvailability::select('Vessel')->where('Vessel', $Request->Vessel_FILTER)->where('Status', 'MAINTENANCE')->whereBetween('StartDate', [$STARTDATE, $ENDDATE])->groupBy('Vessel')->get();
                $NumberOfVessels_OPERATION = VesselAvailability::select('Vessel')->where('Vessel', $Request->Vessel_FILTER)->where('Status', 'OPERATION')->whereBetween('StartDate', [$STARTDATE, $ENDDATE])->groupBy('Vessel')->get();
                $NumberOfVessels_BREAKDOWN = VesselAvailability::select('Vessel')->where('Vessel', $Request->Vessel_FILTER)->where('Status', 'BREAKDOWN')->whereBetween('StartDate', [$STARTDATE, $ENDDATE])->groupBy('Vessel')->get();
                $NumberOfVessels_DOCKING = VesselAvailability::select('Vessel')->where('Vessel', $Request->Vessel_FILTER)->where('Status', 'DOCKING')->whereBetween('StartDate', [$STARTDATE, $ENDDATE])->groupBy('Vessel')->get();
                $VesselAvailability = VesselAvailability::where('Vessel', $Request->Vessel_FILTER)->whereBetween('EndDate', [$STARTDATE, $ENDDATE])->orderBy('StartDate', 'DESC')->orderBy('EndDate', 'DESC')->orderBy('EndTime', 'DESC')->paginate(20); 
            }
            
            return view('Pages.Availability', [ 
                'Employees' => $Employees,
                'Vessels' => $Vessels,
                'Ranks' => $Ranks,
                'Companies' => $Companies,
                'VesselAvailability' => $VesselAvailability,
                'Vessels' => $Vessels,
                'NumberOfVessels' => count($NumberOfVessels),
                'STARTDATE' => $STARTDATE,
                'NumberOfVessels_IDLE' => count($NumberOfVessels_IDLE),
                'NumberOfVessels_BUNKERY' => count($NumberOfVessels_BUNKERY),
                'NumberOfVessels_INSPECTION' => count($NumberOfVessels_INSPECTION),
                'NumberOfVessels_MAINTENANCE' => count($NumberOfVessels_MAINTENANCE),
                'NumberOfVessels_OPERATION' => count($NumberOfVessels_OPERATION),
                'NumberOfVessels_BREAKDOWN' => count($NumberOfVessels_BREAKDOWN),
                'NumberOfVessels_DOCKING' => count($NumberOfVessels_DOCKING),
            ]);
        } 

        if(isset($Request->FilterValue)) {
            $VesselAvailability = VesselAvailability::where('Vessel', 'LIKE', '%' . $Request->FilterValue . '%')
                                    ->orWhere('Status', 'LIKE', '%' . $Request->FilterValue . '%')
                                    ->orWhere('DoneBy', 'LIKE', '%' . $Request->FilterValue . '%')
                                    ->orWhere('Comment', 'LIKE', '%' . $Request->FilterValue . '%')
                                    ->orWhere('Location', 'LIKE', '%' . $Request->FilterValue . '%')
                                    ->orWhere('StartTime', 'LIKE', '%' . $Request->FilterValue . '%')
                                    ->orWhere('EndTime', 'LIKE', '%' . $Request->FilterValue . '%')
                                    ->orWhere('StartDate', 'LIKE', '%' . $Request->FilterValue . '%')
                                    ->orWhere('EndDate', 'LIKE', '%' . $Request->FilterValue . '%')
                                    ->orWhere('TillNow', 'LIKE', '%' . $Request->FilterValue . '%')
                                    ->orderBy('StartDate', 'DESC')->orderBy('EndDate', 'DESC')->orderBy('EndTime', 'DESC') 
                                    ->paginate(14);
            $Vessels = \DB::table('vessels_vessel_information')
                                    ->select(['VesselName', 'ImoNumber', 'CallSign'])
                                    ->where('VesselName', 'LIKE', '%' . $Request->FilterValue . '%')
                                    ->orWhere('ImoNumber', 'LIKE', '%' . $Request->FilterValue . '%')
                                    ->orWhere('CallSign', 'LIKE', '%' . $Request->FilterValue . '%')
                                    ->get(); 
                                    
                if ($Request->FilterValue == 'Ready') {
                    $VesselAvailability = VesselAvailability::where('Status', 'IDLE')->orderBy('StartDate', 'DESC')->orderBy('EndDate', 'DESC')->orderBy('EndTime', 'DESC')->paginate(20);  
                }
            return view('Pages.Availability', [ 
                'Employees' => $Employees,
                'Vessels' => $Vessels,
                'Ranks' => $Ranks,
                'Companies' => $Companies,
                'VesselAvailability' => $VesselAvailability,
                'Vessels' => $Vessels,
                'NumberOfVessels' => count($NumberOfVessels),
                'STARTDATE' => $STARTDATE,
                'StartDate' => $STARTDATE,
                'NumberOfVessels_IDLE' => count($NumberOfVessels_IDLE),
                'NumberOfVessels_BUNKERY' => count($NumberOfVessels_BUNKERY),
                'NumberOfVessels_INSPECTION' => count($NumberOfVessels_INSPECTION),
                'NumberOfVessels_MAINTENANCE' => count($NumberOfVessels_MAINTENANCE),
                'NumberOfVessels_OPERATION' => count($NumberOfVessels_OPERATION),
                'NumberOfVessels_BREAKDOWN' => count($NumberOfVessels_BREAKDOWN),
                'NumberOfVessels_DOCKING' => count($NumberOfVessels_DOCKING),
            ]);
        }

        return view('Pages.Availability', [
            'Employees' => $Employees,
            'Vessels' => $Vessels,
            'Ranks' => $Ranks,
            'Companies' => $Companies,
            'VesselAvailability' => $VesselAvailability,
            'Vessels' => $Vessels,
            'NumberOfVessels' => count($NumberOfVessels),
            'STARTDATE' => $STARTDATE,
            'NumberOfVessels_IDLE' => count($NumberOfVessels_IDLE),
            'NumberOfVessels_BUNKERY' => count($NumberOfVessels_BUNKERY),
            'NumberOfVessels_INSPECTION' => count($NumberOfVessels_INSPECTION),
            'NumberOfVessels_MAINTENANCE' => count($NumberOfVessels_MAINTENANCE),
            'NumberOfVessels_OPERATION' => count($NumberOfVessels_OPERATION),
            'NumberOfVessels_BREAKDOWN' => count($NumberOfVessels_BREAKDOWN),
            'NumberOfVessels_DOCKING' => count($NumberOfVessels_DOCKING),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $Request)
    { 

    }

    /**
     * Display the specified resource.
     */
    public function show(VesselAvailability $VesselAvailability)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VesselAvailability $VesselAvailability)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $Request, $Id)
    { 
        VesselAvailability::where('id', $Id)->update([
            'Vessel' => $Request->EditVessel,
            'Status' => $Request->EditStatus,
            'DoneBy' => $Request->EditDoneBy,
            'Attachment' => $Request->EditAttachment,
            'Comment' => $Request->EditComment,
            'Report' => $Request->EditReport,
            'Picture' => $Request->EditPicture,
            'Attachment' => $Request->EditAttachment,
            'StartTime' => substr($Request->EditStartTime, 0, 5),
            'EndTime' => substr($Request->EditEndTime, 0, 5),
            'StartDate' => $Request->EditStartDate,
            'EndDate' => $Request->EditEndDate,
            'TillNow' => $Request->EditTillNow,
            'DateIn' => date('Y-m-d'),
            'TimeIn' => date('H:i a'),
        ]);
        \DB::table('notifications')->insert([
            'DateIn' => date('Y-m-d'),
            'TimeIn' => date('H:i A'),
            'UserId' => session()->get('USER_ID'),
            'Vessel' => $Request->EditVessel, 
            'Action' => 'Update',
            'Subject' => 'Availability Update!',
            'Notification' => $Request->EditDoneBy . ' has updated availability for ' . $Request->EditVessel . '! The Vessel is currently on ' . $Request->EditStatus . ' from ' . date('H:i A', strtotime($Request->EditStartTime)) . ' till ' . date('H:i A', strtotime($Request->EditEndTime)) . ' (' . $Request->EditStartDate .' - ' . $Request->EditEndDate . ').',
        ]); 
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VesselAvailability $VesselAvailability, $Id)
    { 
        $Availability = VesselAvailability::where('id', $Id)->first();
        \DB::table('notifications')->insert([
        'DateIn' => date('Y-m-d'),
        'TimeIn' => date('H:i A'),
        'UserId' => session()->get('USER_ID'),
        'Vessel' => $Availability->Vessel, 
        'Action' => 'Delete',
        'Subject' => 'Availability Removed!',
        'Notification' => $Availability->DoneBy . ' has deleted the availability for ' . $Availability->Vessel . ' which was on ' . $Availability->Status . ' from ' . date('H:i A', strtotime($Availability->StartTime)) . ' - ' . date('H:i A', strtotime($Availability->EndTime)) . ' (' . $Availability->StartDate . ' - ' . $Availability->EndDate . ') . The tracking status is no longer available.',
    ]);
        VesselAvailability::where('id', $Id)->delete();
        return redirect()->route('Availability');
    }
}
