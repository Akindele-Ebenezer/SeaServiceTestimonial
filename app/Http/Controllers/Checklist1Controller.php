<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Checklist1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $Request)
    {
        \DB::table('checklist_1a')->insert([
            'Boat' => $Request->Boat, 
            'Date' => $Request->Date, 
            'Port_PlaceOfHandover' => $Request->Port_PlaceOfHandover, 
            'OutgoingCapt_EngName' => $Request->OutgoingCapt_EngName, 
            'IncomingCapt_EngName' => $Request->IncomingCapt_EngName, 
            'Clean_Tidy' => $Request->Clean_Tidy, 
            'Clean_Tidy_Comment' => $Request->Clean_Tidy_Comment, 
            'VHF_1' => $Request->VHF_1, 
            'VHF_1_Comment' => $Request->VHF_1_Comment, 
            'VHF_2' => $Request->VHF_2, 
            'VHF_2_Comment' => $Request->VHF_2_Comment, 
            'Handheld' => $Request->Handheld, 
            'Handheld_Comment' => $Request->Handheld_Comment, 
            'AIS' => $Request->AIS, 
            'AIS_Comment' => $Request->AIS_Comment, 
            'TimeIn' => date('H:i'),
            'DateIn' => date('Y-m-d'),
        ]);
        \DB::table('checklist_1b')->insert([
            'Boat' => $Request->Boat, 
            'Date' => $Request->Date, 
            'SOPToDate' => $Request->SOPToDate, 
            'SOPToDate_Comment' => $Request->SOPToDate_Comment, 
            'CompanyOrdersToDate' => $Request->CompanyOrdersToDate, 
            'CompanyOrdersToDate_Comment' => $Request->CompanyOrdersToDate_Comment, 
            'LogbooksToDate' => $Request->LogbooksToDate, 
            'LogbooksToDate_Comment' => $Request->LogbooksToDate_Comment, 
            'RequisitionBookToDate' => $Request->RequisitionBookToDate, 
            'RequisitionBookToDate_Comment' => $Request->RequisitionBookToDate_Comment, 
            'PendingRequisutions_Name' => $Request->PendingRequisutions_Name, 
            'PendingRequisutions_Name_Comment' => $Request->PendingRequisutions_Name_Comment, 
            'SteeringSytem' => $Request->SteeringSytem, 
            'SteeringSytem_Comment' => $Request->SteeringSytem_Comment, 
            'EmergencySteering' => $Request->EmergencySteering, 
            'EmergencySteering_Comment' => $Request->EmergencySteering_Comment, 
            'NavigationalLights' => $Request->NavigationalLights, 
            'NavigationalLights_Comment' => $Request->NavigationalLights_Comment, 
            'SearchLight' => $Request->SearchLight, 
            'SearchLight_Comment' => $Request->SearchLight_Comment, 
            'A_B_Flags' => $Request->A_B_Flags, 
            'A_B_Flags_Comment' => $Request->A_B_Flags_Comment, 
            'TimeIn' => date('H:i'),
            'DateIn' => date('Y-m-d'),
        ]);
        \DB::table('checklist_1c')->insert([
            'Boat' => $Request->Boat, 
            'Date' => $Request->Date, 
            'Siren_Horn' => $Request->Siren_Horn, 
            'Siren_Horn_Comment' => $Request->Siren_Horn_Comment, 
            'MagneticCompass' => $Request->MagneticCompass, 
            'MagneticCompass_Comment' => $Request->MagneticCompass_Comment, 
            'Radar' => $Request->Radar, 
            'Radar_Comment' => $Request->Radar_Comment, 
            'EchoSounder' => $Request->EchoSounder, 
            'EchoSounder_Comment' => $Request->EchoSounder_Comment, 
            'GPS' => $Request->GPS, 
            'GPS_Comment' => $Request->GPS_Comment, 
            'BitsAndBollards' => $Request->BitsAndBollards, 
            'BitsAndBollards_Comment' => $Request->BitsAndBollards_Comment, 
            'ConditionOfRopes' => $Request->ConditionOfRopes, 
            'ConditionOfRopes_Comment' => $Request->ConditionOfRopes_Comment, 
            'ConditionOfWindows' => $Request->ConditionOfWindows, 
            'ConditionOfWindows_Comment' => $Request->ConditionOfWindows_Comment, 
            'LifeRaftsAndCradles' => $Request->LifeRaftsAndCradles, 
            'LifeRaftsAndCradles_Comment' => $Request->LifeRaftsAndCradles_Comment, 
            'LifeRings' => $Request->LifeRings, 
            'LifeRings_Comment' => $Request->LifeRings_Comment, 
            'TimeIn' => date('H:i'),
            'DateIn' => date('Y-m-d'),
        ]);
        \DB::table('checklist_1d')->insert([
            'Boat' => $Request->Boat, 
            'Date' => $Request->Date, 
            'LifeJacketsAndWorkVest' => $Request->LifeJacketsAndWorkVest, 
            'LifeJacketsAndWorkVest_Comment' => $Request->LifeJacketsAndWorkVest_Comment, 
            'AllCrewOnBoard' => $Request->AllCrewOnBoard, 
            'AllCrewOnBoard_Comment' => $Request->AllCrewOnBoard_Comment, 
            'FuelOil' => $Request->FuelOil, 
            'FuelOil_Comment' => $Request->FuelOil_Comment, 
            'LubeOil' => $Request->LubeOil, 
            'LubeOil_Comment' => $Request->LubeOil_Comment, 
            'FreshWater' => $Request->FreshWater, 
            'FreshWater_Comment' => $Request->FreshWater_Comment, 
            'ConditionOfMainEngine' => $Request->ConditionOfMainEngine, 
            'ConditionOfMainEngine_Comment' => $Request->ConditionOfMainEngine_Comment, 
            'LubeOil_Cons_hour_Engine' => $Request->LubeOil_Cons_hour_Engine, 
            'LubeOil_Cons_hour_Engine_Comment' => $Request->LubeOil_Cons_hour_Engine_Comment, 
            'ConditionOfGearBox' => $Request->ConditionOfGearBox, 
            'ConditionOfGearBox_Comment' => $Request->ConditionOfGearBox_Comment, 
            'ConditionOfGenSet' => $Request->ConditionOfGenSet, 
            'ConditionOfGenSet_Comment' => $Request->ConditionOfGenSet_Comment, 
            'ConditionOfBilgePump' => $Request->ConditionOfBilgePump, 
            'ConditionOfBilgePump_Comment' => $Request->ConditionOfBilgePump_Comment,
            'TimeIn' => date('H:i'),
            'DateIn' => date('Y-m-d'), 
        ]);
        \DB::table('checklist_1e')->insert([
            'Boat' => $Request->Boat,  
            'Date' => $Request->Date, 
            'ConditionOfBilgeSystem' => $Request->ConditionOfBilgeSystem, 
            'ConditionOfBilgeSystem_Comment' => $Request->ConditionOfBilgeSystem_Comment, 
            'ConditionOfBattery' => $Request->ConditionOfBattery, 
            'ConditionOfBattery_Comment' => $Request->ConditionOfBattery_Comment, 
            'ShoreConnectionCables' => $Request->ShoreConnectionCables, 
            'ShoreConnectionCables_Comment' => $Request->ShoreConnectionCables_Comment, 
            'Outgoing_Captain_Engineer' => $Request->Outgoing_Captain_Engineer, 
            'Incoming_Captain_Engineer' => $Request->Incoming_Captain_Engineer, 
            'DeckMaintenanceCondition' => $Request->DeckMaintenanceCondition, 
            'AccommodationMaintenanceCondition' => $Request->AccommodationMaintenanceCondition, 
            'PilotHandrailsCondition' => $Request->PilotHandrailsCondition, 
            'TyreFenderCondition' => $Request->TyreFenderCondition, 
            'HullFendersCondition' => $Request->HullFendersCondition, 
            'GarbageCollecting' => $Request->GarbageCollecting, 
            'GarbageDepositing' => $Request->GarbageDepositing, 
            'EngineSmoking' => $Request->EngineSmoking, 
            'Extinguishers_Exp_Date' => $Request->Extinguishers_Exp_Date,
            'FireHosesCondition' => $Request->FireHosesCondition,
            'Nozzles_NoCondition' => $Request->Nozzles_NoCondition,
            'TimeIn' => date('H:i'),
            'DateIn' => date('Y-m-d'),
        ]);
        return redirect()->route('Availability');
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
        \DB::table('checklist_1a')->where('id', $Id)->update([
            'Boat' => $Request->Boat, 
            'Date' => $Request->Date, 
            'Port_PlaceOfHandover' => $Request->Port_PlaceOfHandover, 
            'OutgoingCapt_EngName' => $Request->OutgoingCapt_EngName, 
            'IncomingCapt_EngName' => $Request->IncomingCapt_EngName, 
            'Clean_Tidy' => $Request->Clean_Tidy, 
            'Clean_Tidy_Comment' => $Request->Clean_Tidy_Comment, 
            'VHF_1' => $Request->VHF_1, 
            'VHF_1_Comment' => $Request->VHF_1_Comment, 
            'VHF_2' => $Request->VHF_2, 
            'VHF_2_Comment' => $Request->VHF_2_Comment, 
            'Handheld' => $Request->Handheld, 
            'Handheld_Comment' => $Request->Handheld_Comment, 
            'AIS' => $Request->AIS, 
            'AIS_Comment' => $Request->AIS_Comment, 
            'TimeIn' => date('H:i'),
            'DateIn' => date('Y-m-d'),
        ]);
        \DB::table('checklist_1b')->where('id', $Id)->update([
            'Boat' => $Request->Boat, 
            'Date' => $Request->Date, 
            'SOPToDate' => $Request->SOPToDate, 
            'SOPToDate_Comment' => $Request->SOPToDate_Comment, 
            'CompanyOrdersToDate' => $Request->CompanyOrdersToDate, 
            'CompanyOrdersToDate_Comment' => $Request->CompanyOrdersToDate_Comment, 
            'LogbooksToDate' => $Request->LogbooksToDate, 
            'LogbooksToDate_Comment' => $Request->LogbooksToDate_Comment, 
            'RequisitionBookToDate' => $Request->RequisitionBookToDate, 
            'RequisitionBookToDate_Comment' => $Request->RequisitionBookToDate_Comment, 
            'PendingRequisutions_Name' => $Request->PendingRequisutions_Name, 
            'PendingRequisutions_Name_Comment' => $Request->PendingRequisutions_Name_Comment, 
            'SteeringSytem' => $Request->SteeringSytem, 
            'SteeringSytem_Comment' => $Request->SteeringSytem_Comment, 
            'EmergencySteering' => $Request->EmergencySteering, 
            'EmergencySteering_Comment' => $Request->EmergencySteering_Comment, 
            'NavigationalLights' => $Request->NavigationalLights, 
            'NavigationalLights_Comment' => $Request->NavigationalLights_Comment, 
            'SearchLight' => $Request->SearchLight, 
            'SearchLight_Comment' => $Request->SearchLight_Comment, 
            'A_B_Flags' => $Request->A_B_Flags, 
            'A_B_Flags_Comment' => $Request->A_B_Flags_Comment, 
            'TimeIn' => date('H:i'),
            'DateIn' => date('Y-m-d'),
        ]);
        \DB::table('checklist_1c')->where('id', $Id)->update([
            'Boat' => $Request->Boat, 
            'Date' => $Request->Date, 
            'Siren_Horn' => $Request->Siren_Horn, 
            'Siren_Horn_Comment' => $Request->Siren_Horn_Comment, 
            'MagneticCompass' => $Request->MagneticCompass, 
            'MagneticCompass_Comment' => $Request->MagneticCompass_Comment, 
            'Radar' => $Request->Radar, 
            'Radar_Comment' => $Request->Radar_Comment, 
            'EchoSounder' => $Request->EchoSounder, 
            'EchoSounder_Comment' => $Request->EchoSounder_Comment, 
            'GPS' => $Request->GPS, 
            'GPS_Comment' => $Request->GPS_Comment, 
            'BitsAndBollards' => $Request->BitsAndBollards, 
            'BitsAndBollards_Comment' => $Request->BitsAndBollards_Comment, 
            'ConditionOfRopes' => $Request->ConditionOfRopes, 
            'ConditionOfRopes_Comment' => $Request->ConditionOfRopes_Comment, 
            'ConditionOfWindows' => $Request->ConditionOfWindows, 
            'ConditionOfWindows_Comment' => $Request->ConditionOfWindows_Comment, 
            'LifeRaftsAndCradles' => $Request->LifeRaftsAndCradles, 
            'LifeRaftsAndCradles_Comment' => $Request->LifeRaftsAndCradles_Comment, 
            'LifeRings' => $Request->LifeRings, 
            'LifeRings_Comment' => $Request->LifeRings_Comment, 
            'TimeIn' => date('H:i'),
            'DateIn' => date('Y-m-d'),
        ]);
        \DB::table('checklist_1d')->where('id', $Id)->update([
            'Boat' => $Request->Boat, 
            'Date' => $Request->Date, 
            'LifeJacketsAndWorkVest' => $Request->LifeJacketsAndWorkVest, 
            'LifeJacketsAndWorkVest_Comment' => $Request->LifeJacketsAndWorkVest_Comment, 
            'AllCrewOnBoard' => $Request->AllCrewOnBoard, 
            'AllCrewOnBoard_Comment' => $Request->AllCrewOnBoard_Comment, 
            'FuelOil' => $Request->FuelOil, 
            'FuelOil_Comment' => $Request->FuelOil_Comment, 
            'LubeOil' => $Request->LubeOil, 
            'LubeOil_Comment' => $Request->LubeOil_Comment, 
            'FreshWater' => $Request->FreshWater, 
            'FreshWater_Comment' => $Request->FreshWater_Comment, 
            'ConditionOfMainEngine' => $Request->ConditionOfMainEngine, 
            'ConditionOfMainEngine_Comment' => $Request->ConditionOfMainEngine_Comment, 
            'LubeOil_Cons_hour_Engine' => $Request->LubeOil_Cons_hour_Engine, 
            'LubeOil_Cons_hour_Engine_Comment' => $Request->LubeOil_Cons_hour_Engine_Comment, 
            'ConditionOfGearBox' => $Request->ConditionOfGearBox, 
            'ConditionOfGearBox_Comment' => $Request->ConditionOfGearBox_Comment, 
            'ConditionOfGenSet' => $Request->ConditionOfGenSet, 
            'ConditionOfGenSet_Comment' => $Request->ConditionOfGenSet_Comment, 
            'ConditionOfBilgePump' => $Request->ConditionOfBilgePump, 
            'ConditionOfBilgePump_Comment' => $Request->ConditionOfBilgePump_Comment,
            'TimeIn' => date('H:i'),
            'DateIn' => date('Y-m-d'), 
        ]);
        \DB::table('checklist_1e')->where('id', $Id)->update([
            'Boat' => $Request->Boat,  
            'Date' => $Request->Date, 
            'ConditionOfBilgeSystem' => $Request->ConditionOfBilgeSystem, 
            'ConditionOfBilgeSystem_Comment' => $Request->ConditionOfBilgeSystem_Comment, 
            'ConditionOfBattery' => $Request->ConditionOfBattery, 
            'ConditionOfBattery_Comment' => $Request->ConditionOfBattery_Comment, 
            'ShoreConnectionCables' => $Request->ShoreConnectionCables, 
            'ShoreConnectionCables_Comment' => $Request->ShoreConnectionCables_Comment, 
            'Outgoing_Captain_Engineer' => $Request->Outgoing_Captain_Engineer, 
            'Incoming_Captain_Engineer' => $Request->Incoming_Captain_Engineer, 
            'DeckMaintenanceCondition' => $Request->DeckMaintenanceCondition, 
            'AccommodationMaintenanceCondition' => $Request->AccommodationMaintenanceCondition, 
            'PilotHandrailsCondition' => $Request->PilotHandrailsCondition, 
            'TyreFenderCondition' => $Request->TyreFenderCondition, 
            'HullFendersCondition' => $Request->HullFendersCondition, 
            'GarbageCollecting' => $Request->GarbageCollecting, 
            'GarbageDepositing' => $Request->GarbageDepositing, 
            'EngineSmoking' => $Request->EngineSmoking, 
            'Extinguishers_Exp_Date' => $Request->Extinguishers_Exp_Date,
            'FireHosesCondition' => $Request->FireHosesCondition,
            'Nozzles_NoCondition' => $Request->Nozzles_NoCondition,
            'TimeIn' => date('H:i'),
            'DateIn' => date('Y-m-d'),
        ]);
        return redirect()->route('Availability');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}