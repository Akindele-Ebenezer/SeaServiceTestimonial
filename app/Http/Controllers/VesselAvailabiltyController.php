<?php

namespace App\Http\Controllers;

use App\Models\VesselAvailabilty;
use Illuminate\Http\Request;
use App\Models\Employee; 

class VesselAvailabiltyController extends Controller
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
        $VesselAvailabilty = VesselAvailabilty::paginate(20); 
        $Vessels = \DB::table('vessels_vessel_information')->select('VesselName')->whereNotNull('ImoNumber')->get();
        $NumberOfVessels = \DB::table('vessels_vessel_information')->whereNotNull('ImoNumber')->count();

        return view('Pages.Availability', [
            'Employees' => $Employees,
            'Vessels' => $Vessels,
            'Ranks' => $Ranks,
            'Companies' => $Companies,
            'VesselAvailabilty' => $VesselAvailabilty,
            'Vessels' => $Vessels,
            'NumberOfVessels' => $NumberOfVessels,
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
        VesselAvailabilty::insert([
            'Vessel' => $Request->Vessel,
            'Status' => $Request->Status,
            'DoneBy' => $Request->DoneBy,
            'Attachment' => $Request->Attachment,
            'StartTime' => $Request->StartTime,
            'EndTime' => $Request->EndTime,
            'DateIn' => date('Y-m-d'),
            'TimeIn' => date('H:i a'),
        ]);
        return redirect()->route('Availability');
    }

    /**
     * Display the specified resource.
     */
    public function show(VesselAvailabilty $vesselAvailabilty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VesselAvailabilty $vesselAvailabilty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $Request, $Id)
    { 
        VesselAvailabilty::where('id', $Id)->update([
            'Vessel' => $Request->EditVessel,
            'Status' => $Request->EditStatus,
            'DoneBy' => $Request->EditDoneBy,
            'Attachment' => $Request->EditAttachment,
            'StartTime' => $Request->EditStartTime,
            'EndTime' => $Request->EditEndTime,
            'DateIn' => date('Y-m-d'),
            'TimeIn' => date('H:i a'),
        ]);
        return redirect()->route('Availability');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VesselAvailabilty $VesselAvailabilty, $Id)
    { 
        VesselAvailabilty::where('id', $Id)->delete();
        return redirect()->route('Availability');
    }
}
