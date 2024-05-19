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
    public function index()
    {
        $Employees = Employee::orderBy('EmployeeId', 'DESC')->get();
        $Vessels = \DB::table('vessels_vessel_information')->get();
        $Ranks = \DB::table('ranks')->get();
        $Companies = \DB::table('companies')->orderBy('id', 'DESC')->get();
        $VesselAvailability = VesselAvailability::orderBy('StartDate', 'DESC')->orderBy('EndDate', 'DESC')->orderBy('EndTime', 'DESC')->paginate(20); 
        $Vessels = \DB::table('vessels_vessel_information')->select('VesselName')->whereNotNull('ImoNumber')->get();
        $STARTDATE = date('Y-m-d');
        $NumberOfVessels = \DB::table('vessels_vessel_information')->whereNotNull('ImoNumber')->count();
        $NumberOfVessels_IDLE = VesselAvailability::select('Vessel')->where('Status', 'IDLE')->where('StartDate', $STARTDATE)->groupBy('Vessel')->get();
        $NumberOfVessels_BUNKERY = VesselAvailability::select('Vessel')->where('Status', 'BUNKERY')->where('StartDate', $STARTDATE)->groupBy('Vessel')->get();
        $NumberOfVessels_INSPECTION = VesselAvailability::select('Vessel')->where('Status', 'INSPECTION')->where('StartDate', $STARTDATE)->groupBy('Vessel')->get();
        $NumberOfVessels_MAINTENANCE = VesselAvailability::select('Vessel')->where('Status', 'MAINTENANCE')->where('StartDate', $STARTDATE)->groupBy('Vessel')->get();
        $NumberOfVessels_OPERATION = VesselAvailability::select('Vessel')->where('Status', 'OPERATION')->where('StartDate', $STARTDATE)->groupBy('Vessel')->get();
        $NumberOfVessels_BREAKDOWN = VesselAvailability::select('Vessel')->where('Status', 'BREAKDOWN')->where('StartDate', $STARTDATE)->groupBy('Vessel')->get();
        $NumberOfVessels_DOCKING = VesselAvailability::select('Vessel')->where('Status', 'DOCKING')->where('StartDate', $STARTDATE)->groupBy('Vessel')->get();
        
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
            'NumberOfVessels_DOCKING' => count($NumberOfVessels_DOCKING,) 
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
        VesselAvailability::insert([
            'Vessel' => $Request->Vessel,
            'Status' => $Request->Status,
            'DoneBy' => $Request->DoneBy,
            'Attachment' => $Request->Attachment,
            'StartTime' => $Request->StartTime,
            'EndTime' => $Request->EndTime,
            'StartDate' => $Request->StartDate,
            'EndDate' => $Request->EndDate,
            'DateIn' => date('Y-m-d'),
            'TimeIn' => date('H:i a'),
        ]);
        return redirect()->route('Availability');
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
            'StartTime' => $Request->EditStartTime,
            'EndTime' => $Request->EditEndTime,
            'StartDate' => $Request->EditStartDate,
            'EndDate' => $Request->EditEndDate,
            'DateIn' => date('Y-m-d'),
            'TimeIn' => date('H:i a'),
        ]);
        return redirect()->route('Availability');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VesselAvailability $VesselAvailability, $Id)
    { 
        VesselAvailability::where('id', $Id)->delete();
        return redirect()->route('Availability');
    }
}
