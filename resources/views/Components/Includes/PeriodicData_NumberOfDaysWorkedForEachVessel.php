<?php
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
$TotalDaysArr = [];
foreach($Periods as $Period) {  
        $StartDateTime = \Carbon\Carbon::parse(($Period->StartDate ?? $StartDate_) . ' ' . ($Period->StartTime ?? '00:00'));
        $EndDateTime = \Carbon\Carbon::parse(($Period->EndDate ?? $EndDate_) . ' ' . ($Period->EndTime ?? '00:00')); 
    if (($Period->StartDate <= $StartDate_)) {
        $StartDateTime = \Carbon\Carbon::parse(($StartDate_ ?? date('Y-m-d')) . ' ' . ($Period->StartTime ?? '00:00'));
    }
    if (($Period->StartDate >= $StartDate_)) {
        $StartDateTime = \Carbon\Carbon::parse(($Period->StartDate ?? date('Y-m-d')) . ' ' . ($Period->EndTime ?? '00:00'));
    } 
    if (($Period->EndDate <= $EndDate_)) {
        $EndDateTime = \Carbon\Carbon::parse(($Period->EndDate ?? date('Y-m-d')) . ' ' . ($Period->StartTime ?? '00:00'));
    }
    if (($Period->EndDate >= $EndDate_)) {
        $EndDateTime = \Carbon\Carbon::parse(($EndDate_ ?? date('Y-m-d')) . ' ' . ($Period->EndTime ?? '00:00'));
    }  
    $TotalDays = $StartDateTime->diffInDays($EndDateTime) + 1;
    array_push($TotalDaysArr, $TotalDays); 
}    
$NumberOfTotalStatusForCurrentVessel = count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)
->get());
// $NumberOfTotalStatusForCurrentVessel = count($Periods);
if ($NumberOfTotalStatusForCurrentVessel == 0) {
    $NumberOfTotalStatusForCurrentVessel = 1;
} 
$PeriodicPercentageOfVesselAvailability = (round((count($Periods) / $NumberOfTotalStatusForCurrentVessel) * 100, 0));
