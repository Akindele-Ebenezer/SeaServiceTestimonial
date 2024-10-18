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
$TotalDays_PeriodArr = [];
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

    $StartDateTime_Period = \Carbon\Carbon::parse($Period->StartDate . ' ' . ($Period->EndTime ?? '00:00'));
    $EndDateTime_Period = \Carbon\Carbon::parse($Period->EndDate . ' ' . ($Period->EndTime ?? '00:00'));
    $TotalDays_Period = $StartDateTime_Period->diffInDays($EndDateTime_Period) + 1;
    array_push($TotalDays_PeriodArr, $TotalDays_Period);  
}  
if (count($TotalDays_PeriodArr) == 0) {
    $TotalDays_PeriodArr = [1];
}
// $TotalDays_Period = $EndDateTime_Period->diffInDays($StartDateTime_Period) + 1;
// $TotalDays_Period = $StartDateTime_Period->diffInDays($EndDateTime_Period) + 1; 
$PeriodicPercentageOfVesselAvailability = (round((array_sum($TotalDaysArr) / array_sum($TotalDays_PeriodArr)) * 100, 0));
