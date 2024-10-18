<?php

$Periods = \DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereBetween('StartDate', [$StartDate_, $EndDate_])->whereBetween('EndDate', [$StartDate_, $EndDate_])->orderBy('EndDate', 'DESC')->get();
if (count($Periods) == 0) {
    $Periods = \DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->where('StartDate', '<=', $EndDate_)->where('EndDate', '>=', $EndDate_)->orderBy('EndDate', 'DESC')->get();
}  
$TotalDaysArr = [];
foreach($Periods as $Period) { 
    $StartDateTime = \Carbon\Carbon::parse(($Period->StartDate ?? date('Y-m-d')) . ' ' . ($Period->StartTime ?? '00:00'));
    $EndDateTime = \Carbon\Carbon::parse(($Period->EndDate ?? date('Y-m-d')) . ' ' . ($Period->EndTime ?? '00:00')); 
    if (
        ($Period->EndDate <= $EndDate_)) {
        $StartDateTime = \Carbon\Carbon::parse(($StartDate_ ?? date('Y-m-d')) . ' ' . ($Period->StartTime ?? '00:00'));
        $EndDateTime = \Carbon\Carbon::parse(($Period->EndDate ?? date('Y-m-d')) . ' ' . ($Period->EndTime ?? '00:00'));
        // print_r($EndDateTime);
    } 
    if (($Period->StartDate <= $EndDate_) AND 
        ($Period->EndDate >= $StartDate_)) {
        $StartDateTime = \Carbon\Carbon::parse(($StartDate_ ?? date('Y-m-d')) . ' ' . ($Period->StartTime ?? '00:00'));
        $EndDateTime = \Carbon\Carbon::parse(($Period->EndDate ?? date('Y-m-d')) . ' ' . ($Period->EndTime ?? '00:00'));
    }
    $TotalDays = $EndDateTime->diffInDays($StartDateTime) + 1;
    array_push($TotalDaysArr, $TotalDays); 
}    
$NumberOfTotalStatusForCurrentVessel = count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->whereBetween('StartDate', [$StartDate_, $EndDate_])->whereBetween('EndDate', [$StartDate_, $EndDate_])->get());
if ($NumberOfTotalStatusForCurrentVessel == 0) {
    $NumberOfTotalStatusForCurrentVessel = 1;
}
$TotalDaysArr = [23];
$PeriodicPercentageOfVesselAvailability = (round(count($Periods) / $NumberOfTotalStatusForCurrentVessel * 100, 0));
