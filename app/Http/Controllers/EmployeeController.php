<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Employees = Employee::orderBy('EmployeeId', 'DESC')->paginate(14);
        $Ranks = \DB::table('ranks')->orderBy('id', 'DESC')->get();
        $Vessels = \DB::table('vessels_vessel_information')->select('VesselName')->get();
        return view('Pages.Employees', [
            'Employees' => $Employees,
            'Vessels' => $Vessels,  
            'Ranks' => $Ranks,  
        ]);
    }

    public function deck_rating()
    {
        $Vessels = \DB::table('vessels_vessel_information')->select('VesselName')->get();
        $Employees = Employee::where('Rank', 'Deck')->orderBy('EmployeeId', 'DESC')->paginate(14);
        return view('Pages.DeckRating', [
            'Vessels' => $Vessels,
            'Employees' => $Employees,
        ]);
    }

    public function engineers()
    {
        $Vessels = \DB::table('vessels_vessel_information')->select('VesselName')->get();
        $Employees = Employee::where('Rank', 'Engineer')->orderBy('EmployeeId', 'DESC')->paginate(14);
        return view('Pages.Engineers', [
             'Vessels' => $Vessels,
            'Employees' => $Employees,
        ]);
    }

    public function captains()
    {
        $Vessels = \DB::table('vessels_vessel_information')->select('VesselName')->get();
        $Employees = Employee::where('Rank', 'Captain')->orderBy('EmployeeId', 'DESC')->paginate(14);
        return view('Pages.Captains', [
            'Vessels' => $Vessels,
            'Employees' => $Employees,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $Request)
    {
        Employee::insert([
            'EmployeeId' => $Request->StaffNumber,
            'FullName' => $Request->FullName,
            'DateOfBirth' => $Request->DateOfBirth,
            'DischargeBook' => $Request->DischargeBook,
            'Location' => $Request->Location,
            'Rank' => $Request->Rank,
            'Company' => $Request->Company,
        ]);
        return redirect()->route('Employees');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $Request, Employee $employee)
    {
        Employee::where('EmployeeId', $Request->EditStaffNumber)->update([
            'EmployeeId' => $Request->EditStaffNumber,
            'FullName' => $Request->EditFullName,
            'DateOfBirth' => $Request->EditDateOfBirth,
            'DischargeBook' => $Request->EditDischargeBook,
            'Location' => $Request->EditLocation,
            'Rank' => $Request->EditRank,
            'Company' => $Request->EditCompany,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee, $EmployeeId)
    { 
        Employee::where('EmployeeId', $EmployeeId)->delete();
        return back(); 
    }
}
