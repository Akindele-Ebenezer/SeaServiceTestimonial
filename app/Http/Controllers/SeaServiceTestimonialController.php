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
    public function index(Request $Request)
    {
        $Testimonials = Testimonial::orderBy('DateIn', 'DESC')->orderBy('TimeIn', 'DESC')->paginate(14);
        $Vessels = \DB::table('vessels_vessel_information')->select('VesselName')->get();
        $Employees = Employee::orderBy('EmployeeId', 'DESC')->get();
        $Ranks = \DB::table('ranks')->get();
        $Companies = \DB::table('companies')->orderBy('id', 'DESC')->get();

        if(isset($Request->FilterValue)) {
            $Testimonials = Testimonial::where('Date', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('EmployeeName', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('EmployeeId', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('DateOfBirth', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('AreaOfOperation', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('DischargeBook', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('CurrentVessel', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('Rank', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('Company', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('Template', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orderBy('DateIn', 'DESC')->orderBy('TimeIn', 'DESC')
                            ->paginate(14);
                                        
            return view('Pages.Testimonials', [
                'Testimonials' => $Testimonials,
                'Employees' => $Employees,
                'Vessels' => $Vessels,  
                'Ranks' => $Ranks,
                'Companies' => $Companies,
            ]);
        }

        return view('Pages.Testimonials', [
            'Testimonials' => $Testimonials,
            'Employees' => $Employees,
            'Vessels' => $Vessels,  
            'Ranks' => $Ranks,
            'Companies' => $Companies,
        ]);
    }
    
    public function notifications()
    {
        $Employees = Employee::orderBy('EmployeeId', 'DESC')->paginate(14);
        $NumberOfVessels = \DB::table('vessels_vessel_information')->count();
        $NumberOfOperations = \DB::table('testimonials')->whereNotNull('AreaOfOperation')->count();
        $NumberOfWorkingPeriods = \DB::table('working_periods')->count();
        $FirstDayOfLastMonth = \Carbon\Carbon::now()->subMonth(1)->startOfMonth()->format('Y-m-d');  
        $FirstDayOfLast2Months = \Carbon\Carbon::now()->subMonth(2)->startOfMonth()->format('Y-m-d');  
        $FirstDayOfLast3Months = \Carbon\Carbon::now()->subMonth(3)->startOfMonth()->format('Y-m-d');  
        $FirstDayOfLast4Months = \Carbon\Carbon::now()->subMonth(4)->startOfMonth()->format('Y-m-d');  
        $NumberOfTestimonials_SINCE_LAST_MONTH = \DB::table('working_periods')
                                                ->whereNotNull('StartDate_1')
                                                ->whereNotNull('StartDate_2')
                                                ->whereNotNull('StartDate_3')
                                                ->whereNotNull('StartDate_4')
                                                ->whereNotNull('StartDate_5')
                                                ->whereBetween('StartDate_1', [$FirstDayOfLastMonth, date('Y-m-d')])
                                                ->orWhereBetween('StartDate_2', [$FirstDayOfLastMonth, date('Y-m-d')])
                                                ->orWhereBetween('StartDate_3', [$FirstDayOfLastMonth, date('Y-m-d')])
                                                ->orWhereBetween('StartDate_4', [$FirstDayOfLastMonth, date('Y-m-d')])
                                                ->orWhereBetween('StartDate_5', [$FirstDayOfLastMonth, date('Y-m-d')])
                                                ->count();
        $NumberOfTestimonials_SINCE_LAST_2_MONTHS = \DB::table('working_periods') 
                                                ->whereBetween('StartDate_1', [$FirstDayOfLast2Months, date('Y-m-d')])
                                                ->orWhereBetween('StartDate_2', [$FirstDayOfLast2Months, date('Y-m-d')])
                                                ->orWhereBetween('StartDate_3', [$FirstDayOfLast2Months, date('Y-m-d')])
                                                ->orWhereBetween('StartDate_4', [$FirstDayOfLast2Months, date('Y-m-d')])
                                                ->orWhereBetween('StartDate_5', [$FirstDayOfLast2Months, date('Y-m-d')])
                                                ->count(); 
        $NumberOfTestimonials_SINCE_LAST_3_MONTHS = \DB::table('working_periods') 
                                                ->whereBetween('StartDate_1', [$FirstDayOfLast3Months, date('Y-m-d')])
                                                ->orWhereBetween('StartDate_2', [$FirstDayOfLast3Months, date('Y-m-d')])
                                                ->orWhereBetween('StartDate_3', [$FirstDayOfLast3Months, date('Y-m-d')])
                                                ->orWhereBetween('StartDate_4', [$FirstDayOfLast3Months, date('Y-m-d')])
                                                ->orWhereBetween('StartDate_5', [$FirstDayOfLast3Months, date('Y-m-d')])
                                                ->count();
        $NumberOfTestimonials_SINCE_LAST_4_MONTHS = \DB::table('working_periods') 
                                                ->whereBetween('StartDate_1', [$FirstDayOfLast4Months, date('Y-m-d')])
                                                ->orWhereBetween('StartDate_2', [$FirstDayOfLast4Months, date('Y-m-d')])
                                                ->orWhereBetween('StartDate_3', [$FirstDayOfLast4Months, date('Y-m-d')])
                                                ->orWhereBetween('StartDate_4', [$FirstDayOfLast4Months, date('Y-m-d')])
                                                ->orWhereBetween('StartDate_5', [$FirstDayOfLast4Months, date('Y-m-d')])
                                                ->count();
  
        $PercentageOfTestimonials_SINCE_LAST_MONTH = $NumberOfWorkingPeriods == 0 ? 0 : $NumberOfTestimonials_SINCE_LAST_MONTH / $NumberOfWorkingPeriods * 100;
        $PercentageOfTestimonials_SINCE_LAST_2_MONTH = $NumberOfWorkingPeriods == 0 ? 0 : $NumberOfTestimonials_SINCE_LAST_2_MONTHS / $NumberOfWorkingPeriods * 100;
        $PercentageOfTestimonials_SINCE_LAST_3_MONTH = $NumberOfWorkingPeriods == 0 ? 0 : $NumberOfTestimonials_SINCE_LAST_3_MONTHS / $NumberOfWorkingPeriods * 100;
        $PercentageOfTestimonials_SINCE_LAST_4_MONTH = $NumberOfWorkingPeriods == 0 ? 0 : $NumberOfTestimonials_SINCE_LAST_4_MONTHS / $NumberOfWorkingPeriods * 100;
        $Testimonials = Testimonial::orderBy('DateIn', 'DESC')->orderBy('TimeIn')->limit(10)->get();

        $LeaveDaysArr = [];
        $LeaveDays_SINCE_LAST_MONTHS = \DB::table('working_periods') 
                                                ->select([
                                                    'StartDate_1',
                                                    'EndDate_1',
                                                    'StartDate_2',
                                                    'EndDate_2',
                                                    'StartDate_3',
                                                    'EndDate_3',
                                                    'StartDate_4',
                                                    'EndDate_4',
                                                    'StartDate_5',
                                                    'EndDate_5'
                                                ])->get(); 

        foreach ($LeaveDays_SINCE_LAST_MONTHS as $Day) { 
            array_push($LeaveDaysArr, $Day->StartDate_1);
            array_push($LeaveDaysArr, $Day->EndDate_1);
            array_push($LeaveDaysArr, $Day->StartDate_2);
            array_push($LeaveDaysArr, $Day->EndDate_2);
            array_push($LeaveDaysArr, $Day->StartDate_3);
            array_push($LeaveDaysArr, $Day->EndDate_3);
            array_push($LeaveDaysArr, $Day->StartDate_4);
            array_push($LeaveDaysArr, $Day->EndDate_4);
            array_push($LeaveDaysArr, $Day->StartDate_5);
            array_push($LeaveDaysArr, $Day->EndDate_5);
        }
        //LEAVE DAYS = Total number of days - Total number of days worked
        for ($i = 0; $i < count($LeaveDaysArr) - 1; $i++) {
            $StartDate = \Carbon\Carbon::parse($LeaveDaysArr[$i]);
            $EndDate = \Carbon\Carbon::parse($LeaveDaysArr[$i + 1]);

            $daysDifference = $StartDate->diffInDays($EndDate);
            $daysDifferences[] = $daysDifference;
        }
        // $LeaveDays = 
        return view('Pages.Notifications', [
            'Employees' => $Employees,
            'NumberOfOperations' => $NumberOfOperations,
            'NumberOfWorkingPeriods' => $NumberOfWorkingPeriods,
            'NumberOfVessels' => $NumberOfVessels,
            'Testimonials' => $Testimonials,
            'PercentageOfTestimonials_SINCE_LAST_MONTH' => $PercentageOfTestimonials_SINCE_LAST_MONTH,
            'PercentageOfTestimonials_SINCE_LAST_2_MONTH' => $PercentageOfTestimonials_SINCE_LAST_2_MONTH,
            'PercentageOfTestimonials_SINCE_LAST_3_MONTH' => $PercentageOfTestimonials_SINCE_LAST_3_MONTH,
            'PercentageOfTestimonials_SINCE_LAST_4_MONTH' => $PercentageOfTestimonials_SINCE_LAST_4_MONTH,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $Request)
    {  
        Testimonial::insert([
            'UserId' => session()->get('USER_ID'),
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
            'PreviousVessel' => $Request->PreviousVessel,
            'CurrentVessel' => $Request->CurrentVessel,
        ]);

        \DB::table('working_periods')->insert([
            'UserId' => session()->get('USER_ID'),
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
            'EmployeeId' => $Request->StaffNumber, 
        ]);      

        \DB::table('notifications')->insert([
            'DateIn' => date('Y-m-d'),
            'TimeIn' => date('H:i A'),
            'UserId' => session()->get('USER_ID'),
            'Vessel' => $Request->CurrentVessel,
            'Company' => $Request->Company,
            'Action' => 'Create',
            'Subject' => 'New Testimonial Alert!',
            'Notification' => 'A new testimonial has been added to ' . $Request->CurrentVessel . "'s testimonial list. The " . $Request->Rank . ' on board (' . $Request->Employee . ') worked previosuly on ' . $Request->PreviousVessel . '.',
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
            'UserId' => session()->get('USER_ID'), 
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
            'UserId' => session()->get('USER_ID'),
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
            'EmployeeId' => $Request->EditStaffNumber, 
        ]);      

        \DB::table('notifications')->insert([
            'DateIn' => date('Y-m-d'),
            'TimeIn' => date('H:i A'),
            'UserId' => session()->get('USER_ID'),
            'Vessel' => $Request->EditCurrentVessel,
            'Company' => $Request->Company,
            'Action' => 'Update',
            'Subject' => 'Testimonial Update!',
            'Notification' => $Request->EditCurrentVessel . ' has updated their testimonial! The ' . $Request->EditRank . ' on board is ' . $Request->EditEmployee . '.',
        ]);
 
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $Id)
    { 
        $Testimonial = Testimonial::select(['DateIn', 'TimeIn', 'CurrentVessel', 'DischargeBook', 'Company'])->where('id', $Id)->first();
        $TestimonialDateIn = $Testimonial->DateIn;
        $TestimonialTimeIn = $Testimonial->TimeIn;
        $WorkingPeriods = \DB::table('working_periods')->select(['DateIn', 'TimeIn'])->where('DateIn', $TestimonialDateIn)->where('TimeIn', $TestimonialTimeIn)->delete();
        $UserName = \DB::table('users')->select('FullName')->where('id', session()->get('USER_ID'))->first();
        \DB::table('notifications')->insert([
            'DateIn' => date('Y-m-d'),
            'TimeIn' => date('H:i A'),
            'UserId' => session()->get('USER_ID'),
            'Vessel' => $Testimonial->CurrentVessel,
            'Company' => $Testimonial->Company,
            'Action' => 'Delete',
            'Subject' => 'Testimonial Removed!',
            'Notification' => $UserName->FullName . ' has deleted the testimonial for ' . $Testimonial->CurrentVessel . '. The testimonial that previously has discharge book displayed as ' . $Testimonial->DischargeBook . ' is no longer available.',
        ]);
        Testimonial::find($Id)->delete();
        return back(); 
    }
}
