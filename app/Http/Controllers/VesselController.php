<?php

namespace App\Http\Controllers;

use App\Models\Vessel;
use Illuminate\Http\Request;
use App\Models\Employee;

class VesselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Vessels = \DB::table('vessels_vessel_information')->get();
        $Employees = Employee::orderBy('EmployeeId', 'DESC')->get();
        return view('Pages.Vessels', [
            'Employees' => $Employees,
            'Vessels' => $Vessels,
        ]);
    }

    public function operations()
    {
        $Vessels = \DB::table('vessels_vessel_information')->get();
        return view('Pages.Operations', [
            'Vessels' => $Vessels,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $Request)
    {
        \DB::table('vessels_vessel_information')->insert([
            'DateIn' => date('Y-m-d'),
            'TimeIn' => date('H:i'),
            'ImoNumber' => $Request->ImoNumber,
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
            'DateIn' => date('Y-m-d'),
            'TimeIn' => date('H:i'),
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
            'DateIn' => date('Y-m-d'),
            'TimeIn' => date('H:i'),
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
            'DateIn' => date('Y-m-d'),
            'TimeIn' => date('H:i'),
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
        \DB::table('vessels_vessel_information')->where('ImoNumber', $Request->EditImoNumber)->update([ 
            'VesselName' => $Request->EditVesselName,
            'CallSign' => $Request->EditCallSign,
            'Flag' => $Request->EditFlag,
            'PortOfRegistry' => $Request->EditPortOfRegistry,
            'RegistrationOfficialNumber' => $Request->EditRegistrationNumber,
            'Loa' => $Request->EditLoa,
            'Boa' => $Request->EditBoa,
            'DepthMouled' => $Request->EditDepthMoulded, 
        ]);
        \DB::table('vessels_general_others')->where('ImoNumber', $Request->EditImoNumber)->update([  
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
        \DB::table('vessels_section_3')->where('ImoNumber', $Request->EditImoNumber)->update([   
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
        \DB::table('vessels_section_4')->where('ImoNumber', $Request->EditImoNumber)->update([     
            'GrossTonnage' => $Request->EditGrossTonnage,
            'NetTonnage' => $Request->EditNetTonnage, 
        ]);
        return redirect()->route('Vessels');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vessel $Vessel, $ImoNumber)
    { 
        \DB::table('vessels_vessel_information')->where('ImoNumber', $ImoNumber)->delete();
        \DB::table('vessels_general_others')->where('ImoNumber', $ImoNumber)->delete();
        \DB::table('vessels_section_3')->where('ImoNumber', $ImoNumber)->delete();
        \DB::table('vessels_section_4')->where('ImoNumber', $ImoNumber)->delete();
        return redirect()->route('Vessels');
    }
}
