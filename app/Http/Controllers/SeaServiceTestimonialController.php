<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Employee;

class SeaServiceTestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Testimonials = Testimonial::orderBy('DateIn', 'DESC')->orderBy('TimeIn', 'DESC')->paginate(14);
        $Vessels = \DB::table('vessels_vessel_information')->select('VesselName')->get();
        $Employees = Employee::orderBy('EmployeeId', 'DESC')->get();

        return view('Pages.Testimonials', [
            'Testimonials' => $Testimonials,
            'Employees' => $Employees,
            'Vessels' => $Vessels,  
        ]);
    }

    public function notifications()
    {
        return view('Pages.Notifications');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $Request)
    {  
        Testimonial::insert([
            'UserId' => $Request->UserId,
            'DateIn' => date('Y-m-d'),
            'TimeIn' => date('H:i'),
            'EmployeeName' => $Request->Employee,
            'EmployeeId' => $Request->StaffNumber,
            'DateOfBirth' => $Request->DateOfBirth,
            'AreaOfOperation' => $Request->AreaOfOperation,
            'DischargeBook' => $Request->DischargeBook,
            'Rank' => $Request->Rank,
            'Company' => $Request->Company,
            'Template' => $Request->TemplateFormat,
            'CurrentVessel' => $Request->CurrentVessel,
        ]);

        \DB::table('working_periods')->insert([
            'UserId' => $Request->UserId,
            'DateIn' => date('Y-m-d'),
            'TimeIn' => date('H:i'),
            'Vessel' => $Request->CurrentVessel,
            'StartDate_1' => $Request->StartDate_1,
            'StartDate_2' => $Request->StartDate_2,
            'StartDate_3' => $Request->StartDate_3,
            'StartDate_4' => $Request->StartDate_4,
            'StartDate_5' => $Request->StartDate_5, 
            'EndDate_1' => $Request->EndDate_1,
            'EndDate_2' => $Request->EndDate_2,
            'EndDate_3' => $Request->EndDate_3,
            'EndDate_4' => $Request->EndDate_4,
            'EndDate_5' => $Request->EndDate_5, 
        ]);      
 
        return redirect()->route('Testimonials');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $Request, string $Id)
    { 
        Testimonial::where('id', $Id)->update([
            'UserId' => $Request->EditUserId, 
            'EmployeeName' => $Request->EditEmployee,
            'EmployeeId' => $Request->EditStaffNumber,
            'DateOfBirth' => $Request->EditDateOfBirth,
            'AreaOfOperation' => $Request->EditAreaOfOperation,
            'DischargeBook' => $Request->EditDischargeBook,
            'Rank' => $Request->EditRank,
            'Company' => $Request->EditCompany,
            'Template' => $Request->EditTemplateFormat,
            'CurrentVessel' => $Request->EditCurrentVessel,
        ]);

        $DateIn = Testimonial::select('DateIn')->where('id', $Id)->first();
        $TimeIn = Testimonial::select('TimeIn')->where('id', $Id)->first();
        $CurrentVessel = Testimonial::select('CurrentVessel')->where('id', $Id)->first();
 
        \DB::table('working_periods')
            ->where('DateIn', $DateIn->DateIn)
            ->where('TimeIn', $TimeIn->TimeIn)
            ->where('Vessel', $CurrentVessel->CurrentVessel)
            ->update([
            // 'UserId' =>  , 
            'StartDate_1' => $Request->EditStartDate_1,
            'StartDate_2' => $Request->EditStartDate_2,
            'StartDate_3' => $Request->EditStartDate_3,
            'StartDate_4' => $Request->EditStartDate_4,
            'StartDate_5' => $Request->EditStartDate_5, 
            'EndDate_1' => $Request->EditEndDate_1,
            'EndDate_2' => $Request->EditEndDate_2,
            'EndDate_3' => $Request->EditEndDate_3,
            'EndDate_4' => $Request->EditEndDate_4,
            'EndDate_5' => $Request->EditEndDate_5, 
        ]);      
 
        return redirect()->route('Testimonials');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $Id)
    {
        Testimonial::find($Id)->delete();
        return redirect()->route('Testimonials');
    }
}
