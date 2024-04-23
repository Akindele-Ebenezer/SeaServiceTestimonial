<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $Request)
    {
        $Employees = Employee::orderBy('EmployeeId', 'DESC')->paginate(40);
        $Companies = \DB::table('companies')->orderBy('id', 'DESC')->get();
        $Ranks = \DB::table('ranks')->orderBy('id', 'DESC')->get();
        $Vessels = \DB::table('vessels_vessel_information')->select('VesselName')->get();
        
        if(isset($Request->FilterValue)) {  
            $Employees = Employee::where('Company', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('Location', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('EmployeeId', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('FullName', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('DateOfBirth', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('DischargeBook', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('Rank', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orderBy('id', 'DESC')
                            ->paginate(14);
                       
            return view('Pages.Employees', [
                'Employees' => $Employees,
                'Vessels' => $Vessels,  
                'Ranks' => $Ranks,  
                'Companies' => $Companies,  
            ]);
        }

        return view('Pages.Employees', [
            'Employees' => $Employees,
            'Vessels' => $Vessels,  
            'Ranks' => $Ranks,  
            'Companies' => $Companies,  
        ]);
    }

    public function deck_rating(Request $Request)
    {
        $Vessels = \DB::table('vessels_vessel_information')->select('VesselName')->get();
        $Employees = Employee::where('Rank', 'Deck')->orderBy('EmployeeId', 'DESC')->paginate(14);
        $Ranks = \DB::table('ranks')->get();
        $Companies = \DB::table('companies')->orderBy('id', 'DESC')->get();
                
        if(isset($Request->FilterValue)) {  
            $Employees = Employee::where('Rank', 'Deck')
                            ->where('Company', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('Location', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('EmployeeId', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('FullName', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('DateOfBirth', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('DischargeBook', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('Rank', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orderBy('EmployeeId', 'DESC')
                            ->paginate(14);
                           
            return view('Pages.DeckRating', [
                'Vessels' => $Vessels,
                'Employees' => $Employees,
                'Ranks' => $Ranks,
                'Companies' => $Companies,
            ]);
        }

        return view('Pages.DeckRating', [
            'Vessels' => $Vessels,
            'Employees' => $Employees,
            'Ranks' => $Ranks,
            'Companies' => $Companies,
        ]);
    }

    public function engineers(Request $Request)
    {
        $Vessels = \DB::table('vessels_vessel_information')->select('VesselName')->get();
        $Employees = Employee::where('Rank', 'Engineer')->orderBy('EmployeeId', 'DESC')->paginate(14);
        $Ranks = \DB::table('ranks')->get();
        $Companies = \DB::table('companies')->orderBy('id', 'DESC')->get();
        
        if(isset($Request->FilterValue)) {  
            $Employees = Employee::where('Rank', 'Engineer')
                            ->where('Company', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('Location', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('EmployeeId', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('FullName', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('DateOfBirth', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('DischargeBook', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('Rank', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orderBy('id', 'DESC')
                            ->paginate(14);
                           
            return view('Pages.Engineers', [
                'Vessels' => $Vessels,
                'Employees' => $Employees,
                'Ranks' => $Ranks,
                'Companies' => $Companies,
            ]);
        }

        return view('Pages.Engineers', [
             'Vessels' => $Vessels,
            'Employees' => $Employees,
            'Ranks' => $Ranks,
            'Companies' => $Companies,
        ]);
    }

    public function captains(Request $Request)
    {
        $Vessels = \DB::table('vessels_vessel_information')->select('VesselName')->get();
        $Employees = Employee::where('Rank', 'Captain')->orderBy('EmployeeId', 'DESC')->paginate(14);
        $Ranks = \DB::table('ranks')->get();
        $Companies = \DB::table('companies')->orderBy('id', 'DESC')->get();
        
        if(isset($Request->FilterValue)) {  
            $Employees = Employee::where('Rank', 'Captain')
                            ->where('Company', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('Location', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('EmployeeId', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('FullName', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('DateOfBirth', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('DischargeBook', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('Rank', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orderBy('id', 'DESC')
                            ->paginate(14);
                       
            return view('Pages.Captains', [
                'Vessels' => $Vessels,
                'Employees' => $Employees,
                'Ranks' => $Ranks,
                'Companies' => $Companies,
            ]);
        }

        return view('Pages.Captains', [
            'Vessels' => $Vessels,
            'Employees' => $Employees,
            'Ranks' => $Ranks,
            'Companies' => $Companies,
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
