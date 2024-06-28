<?php

namespace App\Http\Controllers;

use App\Models\Vessel;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Employee;

class VesselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $Request)
    {
        $Vessels = \DB::table('vessels_vessel_information')->get();
        $Ranks = \DB::table('ranks')->get();
        $Companies = \DB::table('companies')->orderBy('id', 'DESC')->get();
        $Employees = Employee::orderBy('EmployeeId', 'DESC')->get();

        if(isset($Request->FilterValue)) {  
            $Vessels = \DB::table('vessels_vessel_information')->where('VesselName', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('ImoNumber', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('CallSign', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('Flag', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('PortOfRegistry', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('RegistrationOfficialNumber', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->paginate(14);
                                        
            return view('Pages.Vessels', [
                'Employees' => $Employees,
                'Vessels' => $Vessels,
                'Ranks' => $Ranks,
                'Companies' => $Companies,
            ]);
        }
        return view('Pages.Vessels', [
            'Employees' => $Employees,
            'Vessels' => $Vessels,
            'Ranks' => $Ranks,
            'Companies' => $Companies,
        ]);
    } 

    public function operations(Request $Request)
    {
        $Vessels = \DB::table('vessels_vessel_information')->get();
        $Employees = Employee::orderBy('EmployeeId', 'DESC')->get();
        $Ranks = \DB::table('ranks')->get();
        $Companies = \DB::table('companies')->orderBy('id', 'DESC')->get();
        $Operations = Testimonial::orderBy('DateIn', 'DESC')->orderBy('TimeIn', 'DESC')->paginate(14);
        
        if(isset($Request->FilterValue)) { 
            $Operations = Testimonial::where('Date', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('EmployeeName', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('EmployeeId', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('AreaOfOperation', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('DischargeBook', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('CurrentVessel', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('Rank', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('Company', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('Template', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orderBy('DateIn', 'DESC')->orderBy('TimeIn', 'DESC')
                            ->paginate(14);
                                        
            return view('Pages.Operations', [
                'Vessels' => $Vessels,
                'Employees' => $Employees,
                'Operations' => $Operations,
                'Ranks' => $Ranks,
                'Companies' => $Companies,
            ]);
        }

        return view('Pages.Operations', [
            'Vessels' => $Vessels,
            'Employees' => $Employees,
            'Operations' => $Operations,
            'Ranks' => $Ranks,
            'Companies' => $Companies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $Request)
    {
        \DB::table('vessels_vessel_information')->insert([
            'UserId' => session()->get('USER_ID'),
            'DateIn' => date('Y-m-d'),
            'TimeIn' => date('H:i a'),
            'ImoNumber' => $Request->ImoNumber,
            'VesselType' => $Request->VesselType,
            'Company' => $Request->Company,
            'VesselName' => $Request->VesselName,
            'CallSign' => $Request->CallSign,
            'Flag' => $Request->Flag,
            'PortOfRegistry' => $Request->PortOfRegistry,
            'RegistrationOfficialNumber' => $Request->RegistrationNumber,
            'Loa' => $Request->Loa,
            'Boa' => $Request->Boa,
            'DepthMouled' => $Request->DepthMoulded, 
        ]);
        \DB::table('vessels_general_others')->insert([
            'UserId' => session()->get('USER_ID'), 
            'UserId' => session()->get('USER_ID'),
            'DateIn' => date('Y-m-d'),
            'TimeIn' => date('H:i a'),
            'VesselName' => $Request->VesselName,
            'ImoNumber' => $Request->ImoNumber,
            'SummerLoadDraught' => $Request->SummerLoadDraught,
            'Lpp' => $Request->Lpp,
            'Owner' => $Request->Owner,
            'Builder' => $Request->Builder,
            'DateKeelLaid' => $Request->DateKeelLaid,
            'DateOfBuild' => $Request->DateOfBuild,
            'PlaceOfBuild' => $Request->PlaceOfBuild,
            'Material' => $Request->Material,
            'YardNumber' => $Request->YardNumber, 
        ]);
        \DB::table('vessels_section_3')->insert([
            'UserId' => session()->get('USER_ID'),  
            'DateIn' => date('Y-m-d'),
            'TimeIn' => date('H:i a'),
            'VesselName' => $Request->VesselName,
            'ImoNumber' => $Request->ImoNumber,
            'TypesOfEngines' => $Request->TypesOfEngines,
            'NumberOfEngines' => $Request->NumberOfEngines,
            'NumberOfCylinder' => $Request->NumberOfCyliners,
            'EngineOutputKw' => $Request->EngineOutput,
            'EngineMakers' => $Request->EngineMakers,
            'YearOfEngineBuilt' => $Request->YearOfEngineBuilt,
            'PlaceEnginesBuilt' => $Request->PlaceEnginesBuilt,
            'Diametermm' => $Request->Diametermm,
            'LengthOfStrokemm' => $Request->LengthOfStrokemm, 
        ]);
        \DB::table('vessels_section_4')->insert([  
            'UserId' => session()->get('USER_ID'),  
            'DateIn' => date('Y-m-d'),
            'TimeIn' => date('H:i a'),
            'VesselName' => $Request->VesselName,
            'ImoNumber' => $Request->ImoNumber,
            'GrossTonnage' => $Request->GrossTonnage,
            'NetTonnage' => $Request->NetTonnage, 
        ]);
        return redirect()->route('Vessels');
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
    public function show(Vessel $vessel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vessel $vessel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $Request, Vessel $vessel)
    { 
        \DB::table('vessels_vessel_information')->where('ImoNumber', $Request->EditImoNumber)->orWhere('VesselName', $Request->EditVesselName)->update([ 
            'UserId' => session()->get('USER_ID'),
            'VesselName' => $Request->EditVesselName,
            'VesselType' => $Request->EditVesselType,
            'Company' => $Request->EditCompany,
            'CallSign' => $Request->EditCallSign,
            'Flag' => $Request->EditFlag,
            'PortOfRegistry' => $Request->EditPortOfRegistry,
            'RegistrationOfficialNumber' => $Request->EditRegistrationNumber,
            'Loa' => $Request->EditLoa,
            'Boa' => $Request->EditBoa,
            'DepthMouled' => $Request->EditDepthMoulded, 
        ]);
        \DB::table('vessels_general_others')->where('ImoNumber', $Request->EditImoNumber)->orWhere('VesselName', $Request->EditVesselName)->update([  
            'UserId' => session()->get('USER_ID'),
            'VesselName' => $Request->EditVesselName,
            'SummerLoadDraught' => $Request->EditSummerLoadDraught,
            'Lpp' => $Request->EditLpp,
            'Owner' => $Request->EditOwner,
            'Builder' => $Request->EditBuilder,
            'DateKeelLaid' => $Request->EditDateKeelLaid,
            'DateOfBuild' => $Request->EditDateOfBuild,
            'PlaceOfBuild' => $Request->EditPlaceOfBuild,
            'Material' => $Request->EditMaterial,
            'YardNumber' => $Request->EditYardNumber, 
        ]);
        \DB::table('vessels_section_3')->where('ImoNumber', $Request->EditImoNumber)->orWhere('VesselName', $Request->EditVesselName)->update([ 
            'UserId' => session()->get('USER_ID'),  
            'VesselName' => $Request->EditVesselName,
            'TypesOfEngines' => $Request->EditTypesOfEngines,
            'NumberOfEngines' => $Request->EditNumberOfEngines,
            'NumberOfCylinder' => $Request->EditNumberOfCyliners,
            'EngineOutputKw' => $Request->EditEngineOutput,
            'EngineMakers' => $Request->EditEngineMakers,
            'YearOfEngineBuilt' => $Request->EditYearOfEngineBuilt,
            'PlaceEnginesBuilt' => $Request->EditPlaceEnginesBuilt,
            'Diametermm' => $Request->EditDiametermm,
            'LengthOfStrokemm' => $Request->EditLengthOfStrokemm, 
        ]);
        \DB::table('vessels_section_4')->where('ImoNumber', $Request->EditImoNumber)->orWhere('VesselName', $Request->EditVesselName)->update([  
            'UserId' => session()->get('USER_ID'),   
            'VesselName' => $Request->EditVesselName,
            'GrossTonnage' => $Request->EditGrossTonnage,
            'NetTonnage' => $Request->EditNetTonnage, 
        ]);
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vessel $Vessel, $VesselName)
    {  
        dd($VesselName);
        \DB::table('vessels_vessel_information')->where('VesselName', $VesselName)->delete();
        \DB::table('vessels_general_others')->where('VesselName', $VesselName)->delete();
        \DB::table('vessels_section_3')->where('VesselName', $VesselName)->delete();
        \DB::table('vessels_section_4')->where('VesselName', $VesselName)->delete();
        return back(); 
    }
}
