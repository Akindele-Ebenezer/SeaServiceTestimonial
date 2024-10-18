<?php

// $Periods = \DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereBetween('StartDate', [$StartDate_, $EndDate_])->whereBetween('EndDate', [$StartDate_, $EndDate_])->orderBy('EndDate', 'DESC')->get();
$Periods = \DB::table('vessel_availabilities')
->where('Vessel', $Vessel->VesselName)
->where('Status', $Status)
->where(function($query) use ($StartDate_, $EndDate_, $Vessel, $Status) {
    $query->where('StartDate', $StartDate_)
            ->where('EndDate', $EndDate_)
            ->where('Vessel', $Vessel->VesselName)
            ->where('Status', $Status);
})->orWhere(function($query) use ($StartDate_, $EndDate_, $Vessel, $Status) {
    $query->where('StartDate', '<=', $EndDate_)
            ->where('EndDate', '>=', $StartDate_)
            ->where('Vessel', $Vessel->VesselName)
            ->where('Status', $Status);
})->orWhere(function($query) use ($StartDate_, $EndDate_, $Vessel, $Status) {
    $query->where('StartDate', '<=', $StartDate_)
            ->where('EndDate', '>=', $EndDate_)
            ->where('Vessel', $Vessel->VesselName)
            ->where('Status', $Status);
})->orderBy('EndDate', 'DESC')->get();
// if (count($Periods) == 0) {
//     $Periods = \DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->where('StartDate', '<=', $EndDate_)->where('EndDate', '>=', $EndDate_)->orderBy('EndDate', 'DESC')->get();
// }  
$TotalDaysArr = [];
foreach($Periods as $Period) { 
    $StartDateTime = \Carbon\Carbon::parse(($Period->StartDate ?? $StartDate_) . ' ' . ($Period->StartTime ?? '00:00'));
    $EndDateTime = \Carbon\Carbon::parse(($Period->EndDate ?? $EndDate_) . ' ' . ($Period->EndTime ?? '00:00')); 
    // if (
    //     ($Period->StartDate <= $StartDate_)) {
    //     $StartDateTime = \Carbon\Carbon::parse(($StartDate_ ?? date('Y-m-d')) . ' ' . ($Period->StartTime ?? '00:00'));
    //     $EndDateTime = \Carbon\Carbon::parse(($Period->EndDate ?? date('Y-m-d')) . ' ' . ($Period->EndTime ?? '00:00'));
    //     // print_r($EndDateTime);
    // } 
    if (($Period->StartDate <= $EndDate_) AND 
        ($Period->EndDate >= $StartDate_)) {
        $StartDateTime = \Carbon\Carbon::parse(($StartDate_ ?? date('Y-m-d')) . ' ' . ($Period->StartTime ?? '00:00'));
        $EndDateTime = \Carbon\Carbon::parse(($Period->EndDate ?? date('Y-m-d')) . ' ' . ($Period->EndTime ?? '00:00'));
    }
    $TotalDays = $EndDateTime->diffInDays($StartDateTime) + 1;
    array_push($TotalDaysArr, $TotalDays); 
}    
$NumberOfTotalStatusForCurrentVessel = count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)
->where(function($query) use ($StartDate_, $EndDate_) {
    $query->where('StartDate', $StartDate_)
            ->where('EndDate', $EndDate_);
})->orWhere(function($query) use ($StartDate_, $EndDate_) {
    $query->where('StartDate', '<=', $EndDate_)
            ->where('EndDate', '>=', $StartDate_);
})->orWhere(function($query) use ($StartDate_, $EndDate_) {
    $query->where('StartDate', '<=', $StartDate_)
            ->where('EndDate', '>=', $EndDate_);
})->orderBy('EndDate', 'DESC')->get());
$NumberOfTotalStatusForCurrentVessel = count($Periods);
if ($NumberOfTotalStatusForCurrentVessel == 0) {
    $NumberOfTotalStatusForCurrentVessel = 1;
} 
$PeriodicPercentageOfVesselAvailability = (round(count($Periods) / $NumberOfTotalStatusForCurrentVessel * 100, 0));
