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
        $Employees = Employee::orderBy('EmployeeId', 'DESC')->get();
        $Vessels = \DB::table('vessels_vessel_information')->get();
        $Ranks = \DB::table('ranks')->get();
        $Companies = \DB::table('companies')->orderBy('id', 'DESC')->get();
        $VesselAvailability = VesselAvailability::orderBy('StartDate', 'DESC')->orderBy('EndDate', 'DESC')->orderBy('EndTime', 'DESC')->paginate(20); 
        $Vessels = \DB::table('vessels_vessel_information')->select(['VesselName', 'ImoNumber', 'CallSign'])->get();
        $STARTDATE = date('Y-m-d'); 
        $NumberOfVessels = \DB::table('vessels_vessel_information')->count();
        $NumberOfVessels_IDLE = VesselAvailability::select('Vessel')->where('Status', 'IDLE')->where('EndDate', '>=', date('Y-m-d'))->groupBy('Vessel')->get();
        $NumberOfVessels_BUNKERY = VesselAvailability::select('Vessel')->where('Status', 'BUNKERY')->where('EndDate', '>=', date('Y-m-d'))->groupBy('Vessel')->get();
        $NumberOfVessels_INSPECTION = VesselAvailability::select('Vessel')->where('Status', 'INSPECTION')->where('EndDate', '>=', date('Y-m-d'))->groupBy('Vessel')->get();
        $NumberOfVessels_MAINTENANCE = VesselAvailability::select('Vessel')->where('Status', 'MAINTENANCE')->where('EndDate', '>=', date('Y-m-d'))->groupBy('Vessel')->get();
        $NumberOfVessels_OPERATION = VesselAvailability::select('Vessel')->where('Status', 'OPERATION')->where('EndDate', '>=', date('Y-m-d'))->groupBy('Vessel')->get();
        $NumberOfVessels_BREAKDOWN = VesselAvailability::select('Vessel')->where('Status', 'BREAKDOWN')->where('EndDate', '>=', date('Y-m-d'))->groupBy('Vessel')->get();
        $NumberOfVessels_DOCKING = VesselAvailability::select('Vessel')->where('Status', 'DOCKING')->where('EndDate', '>=', date('Y-m-d'))->groupBy('Vessel')->get(); 
        //  dd($NumberOfVessels_BREAKDOWN);
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
            $VesselAvailability = VesselAvailability::whereBetween('StartDate', [$STARTDATE, $ENDDATE])->orWhereBetween('EndDate', [$STARTDATE, $ENDDATE])->orderBy('StartDate', 'DESC')->orderBy('EndDate', 'DESC')->orderBy('EndTime', 'DESC')->paginate(20); 
            return view('Pages.Availability', [ 
                'Employees' => $Employees,
                'Vessels' => $Vessels,
                'Ranks' => $Ranks,
                'Companies' => $Companies,
                'VesselAvailability' => $VesselAvailability,
                'Vessels' => $Vessels,
                'NumberOfVessels' => $NumberOfVessels,
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

        if (isset($Request->SpecificDay)) {
            $STARTDATE = $Request->SpecificDay;
            $NumberOfVessels_IDLE = VesselAvailability::select('Vessel')->where('Status', 'IDLE')->where('StartDate', $STARTDATE)->groupBy('Vessel')->get();
            $NumberOfVessels_BUNKERY = VesselAvailability::select('Vessel')->where('Status', 'BUNKERY')->where('StartDate', $STARTDATE)->groupBy('Vessel')->get();
            $NumberOfVessels_INSPECTION = VesselAvailability::select('Vessel')->where('Status', 'INSPECTION')->where('StartDate', $STARTDATE)->groupBy('Vessel')->get();
            $NumberOfVessels_MAINTENANCE = VesselAvailability::select('Vessel')->where('Status', 'MAINTENANCE')->where('StartDate', $STARTDATE)->groupBy('Vessel')->get();
            $NumberOfVessels_OPERATION = VesselAvailability::select('Vessel')->where('Status', 'OPERATION')->where('StartDate', $STARTDATE)->groupBy('Vessel')->get();
            $NumberOfVessels_BREAKDOWN = VesselAvailability::select('Vessel')->where('Status', 'BREAKDOWN')->where('StartDate', $STARTDATE)->groupBy('Vessel')->get();
            $NumberOfVessels_DOCKING = VesselAvailability::select('Vessel')->where('Status', 'DOCKING')->where('StartDate', $STARTDATE)->groupBy('Vessel')->get();
            $VesselAvailability = VesselAvailability::where('StartDate', $STARTDATE)->orderBy('StartDate', 'DESC')->orderBy('EndDate', 'DESC')->orderBy('EndTime', 'DESC')->paginate(20); 
            return view('Pages.Availability', [ 
                'Employees' => $Employees,
                'Vessels' => $Vessels,
                'Ranks' => $Ranks,
                'Companies' => $Companies,
                'VesselAvailability' => $VesselAvailability,
                'Vessels' => $Vessels,
                'NumberOfVessels' => $NumberOfVessels,
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
                                    ->paginate(14);
            $Vessels = \DB::table('vessels_vessel_information')
                                    ->select(['VesselName', 'ImoNumber', 'CallSign'])
                                    ->where('VesselName', 'LIKE', '%' . $Request->FilterValue . '%')
                                    ->orWhere('ImoNumber', 'LIKE', '%' . $Request->FilterValue . '%')
                                    ->orWhere('CallSign', 'LIKE', '%' . $Request->FilterValue . '%')
                                    ->get(); 
            return view('Pages.Availability', [ 
                'Employees' => $Employees,
                'Vessels' => $Vessels,
                'Ranks' => $Ranks,
                'Companies' => $Companies,
                'VesselAvailability' => $VesselAvailability,
                'Vessels' => $Vessels,
                'NumberOfVessels' => $NumberOfVessels,
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
            'NumberOfVessels' => $NumberOfVessels,
            'STARTDATE' => $STARTDATE,
            'NumberOfVessels_IDLE' => count($NumberOfVessels_BUNKERY),
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
            'StartTime' => substr($Request->EditStartTime, 0, 5),
            'EndTime' => substr($Request->EditEndTime, 0, 5),
            'StartDate' => $Request->EditStartDate,
            'EndDate' => $Request->EditEndDate,
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
        return redirect()->route('Availability');
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
