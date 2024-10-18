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

$Periods_ = \DB::table('vessel_availabilities')
->where('Vessel', $Vessel->VesselName) 
->where(function($query) use ($StartDate_, $EndDate_, $Vessel, $Status) {
    $query->where('StartDate', $StartDate_)
            ->where('EndDate', $EndDate_)
            ->where('Vessel', $Vessel->VesselName);
})->orWhere(function($query) use ($StartDate_, $EndDate_, $Vessel, $Status) {
    $query->where('StartDate', '<=', $EndDate_)
            ->where('EndDate', '>=', $StartDate_)
            ->where('Vessel', $Vessel->VesselName);
})->orWhere(function($query) use ($StartDate_, $EndDate_, $Vessel, $Status) {
    $query->where('StartDate', '<=', $StartDate_)
            ->where('EndDate', '>=', $EndDate_)
            ->where('Vessel', $Vessel->VesselName);
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
}  
if (count($TotalDays_PeriodArr) == 0) {
    $TotalDays_PeriodArr = [1];
}

foreach($Periods_ as $Period) {  
    // $StartDateTime_Period = \Carbon\Carbon::parse(($Period->StartDate ?? $StartDate_) . ' ' . ($Period->StartTime ?? '00:00'));
    // $EndDateTime_Period = \Carbon\Carbon::parse(($Period->EndDate ?? $EndDate_) . ' ' . ($Period->EndTime ?? '00:00')); 
 
    if (($Period->StartDate <= $StartDate_)) {
        $StartDateTime_Period = \Carbon\Carbon::parse(($StartDate_ ?? date('Y-m-d')) . ' ' . ($Period->StartTime ?? '00:00'));
    }
    if (($Period->StartDate >= $StartDate_)) {
        $StartDateTime_Period = \Carbon\Carbon::parse(($Period->StartDate ?? date('Y-m-d')) . ' ' . ($Period->EndTime ?? '00:00'));
    } 
    if (($Period->EndDate <= $EndDate_)) {
        $EndDateTime_Period = \Carbon\Carbon::parse(($Period->EndDate ?? date('Y-m-d')) . ' ' . ($Period->StartTime ?? '00:00'));
    }
    if (($Period->EndDate >= $EndDate_)) {
        $EndDateTime_Period = \Carbon\Carbon::parse(($EndDate_ ?? date('Y-m-d')) . ' ' . ($Period->EndTime ?? '00:00'));
    }  
    $TotalDays_Period = $StartDateTime_Period->diffInDays($EndDateTime_Period);
    array_push($TotalDays_PeriodArr, $TotalDays_Period);  
}  
$PeriodicPercentageOfVesselAvailability = (round((array_sum($TotalDaysArr) / array_sum($TotalDays_PeriodArr)) * 100, 0));
