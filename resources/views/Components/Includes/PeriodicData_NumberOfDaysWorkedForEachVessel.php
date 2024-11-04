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
})->orWhere(function($query) use ($StartDate_, $EndDate_, $Vessel, $Status) {
    $query->whereBetween('StartDate', [$StartDate_, $EndDate_])
          ->whereBetween('EndDate', [$StartDate_, $EndDate_])
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
})->orWhere(function($query) use ($StartDate_, $EndDate_, $Vessel, $Status) {
    $query->whereBetween('StartDate', [$StartDate_, $EndDate_])
            ->whereBetween('EndDate', [$StartDate_, $EndDate_])
            ->where('Vessel', $Vessel->VesselName)
            ->where('Status', $Status);
})->orderBy('EndDate', 'DESC')->get();  
// echo '------------------------';
// print_r($Periods);
$TotalDaysArr = [];
$TotalDays_PeriodArr = [];
$TotalHoursArr = [];
$TotalHours_PeriodArr = [];
$TotalMinutesArr = [];
$TotalMinutes_PeriodArr = [];
foreach($Periods as $Period) {  
    // $StartDateTime = \Carbon\Carbon::parse(($StartDate_ ?? $StartDate_) . ' ' . ($Period->StartTime ?? '00:00'));
    // $EndDateTime = \Carbon\Carbon::parse(($EndDate_ ?? $EndDate_) . ' ' . ($Period->EndTime ?? '00:00')); 
    
    $StartDateTime = \Carbon\Carbon::parse(($StartDate_ ?? $StartDate_) . ' ' . ('00:00' ?? '00:00'));
    $EndDateTime = \Carbon\Carbon::parse(($EndDate_ ?? $EndDate_) . ' ' . ($Period->EndTime ?? '00:00')); 
    
    // if (($Period->StartDate <= $StartDate_)) {
    //     $StartDateTime = \Carbon\Carbon::parse(($StartDate_ ?? date('Y-m-d')) . ' ' . ('00:00' ?? '00:00'));
    // } else if (($Period->StartDate >= $StartDate_)) {
    //     $StartDateTime = \Carbon\Carbon::parse(($Period->StartDate ?? date('Y-m-d')) . ' ' . ('00:00' ?? '00:00'));
    // } 
    // if (($Period->EndDate <= $EndDate_)) {
    //     $EndDateTime = \Carbon\Carbon::parse(($Period->EndDate ?? date('Y-m-d')) . ' ' . ($Period->EndTime ?? '00:00'));
    // } else if (($Period->EndDate >= $EndDate_)) {
    //     $EndDateTime = \Carbon\Carbon::parse(($EndDate_ ?? date('Y-m-d')) . ' ' . ('23:59' ?? '00:00'));
    // }  
    // if (($Period->StartDate <= $StartDate_) AND
    //     ($Period->EndDate >= $EndDate_)) {
    //     $StartDateTime = \Carbon\Carbon::parse(($StartDate_ ?? $StartDate_) . ' ' . ('00:00' ?? '00:00'));
    //     $EndDateTime = \Carbon\Carbon::parse(($EndDate_ ?? $EndDate_) . ' ' . ('23:59' ?? '00:00')); 
    // }
    // if ($StartDate_ == $EndDate_) { 
    //     $StartDateTime = \Carbon\Carbon::parse(($StartDate_ ?? $StartDate_) . ' ' . ('00:00' ?? '00:00'));
    //     $EndDateTime = \Carbon\Carbon::parse(($EndDate_ ?? $EndDate_) . ' ' . ('23:59' ?? '00:00')); 
    // }
    $TotalDays = $StartDateTime->diffInDays($EndDateTime) + 1; 
    $TotalHours = $StartDateTime->diffInHours($EndDateTime); 
    $TotalMinutes = $StartDateTime->diffInMinutes($EndDateTime); 
    array_push($TotalDaysArr, $TotalDays);   
    array_push($TotalHoursArr, $TotalHours);   
    array_push($TotalMinutesArr, $TotalMinutes);   
    echo 'StartDateTime: ' . $StartDateTime . ' - EndDateTime: ' . $EndDateTime;
    print_r(' === ' . $TotalDays . ' days.        ');
    echo '------------------------';
}  
if (count($TotalDays_PeriodArr) == 0) {
    $TotalDays_PeriodArr = [1];
}

foreach($Periods_ as $Period) {   
    $StartDateTime_Period = \Carbon\Carbon::parse(($StartDate_ ?? $StartDate_) . ' ' . ('00:00' ?? '00:00'));
    $EndDateTime_Period = \Carbon\Carbon::parse(($EndDate_ ?? $EndDate_) . ' ' . ($Period->EndTime ?? '00:00')); 

    // if (($Period->StartDate <= $StartDate_)) {
    //     $StartDateTime_Period = \Carbon\Carbon::parse(($StartDate_ ?? date('Y-m-d')) . ' ' . ($Period->StartTime ?? '00:00'));
    // } else if (($Period->StartDate >= $StartDate_)) {
    //     $StartDateTime_Period = \Carbon\Carbon::parse(($Period->StartDate ?? date('Y-m-d')) . ' ' . ($Period->EndTime ?? '00:00'));
    // } 
    // if (($Period->EndDate <= $EndDate_)) {
    //     $EndDateTime_Period = \Carbon\Carbon::parse(($Period->EndDate ?? date('Y-m-d')) . ' ' . ($Period->StartTime ?? '00:00'));
    // } else if (($Period->EndDate >= $EndDate_)) {
    //     $EndDateTime_Period = \Carbon\Carbon::parse(($EndDate_ ?? date('Y-m-d')) . ' ' . ($Period->EndTime ?? '00:00'));
    // }  
    // if (($Period->StartDate <= $StartDate_) AND
    //     ($Period->EndDate >= $EndDate_)) {
    //     $StartDateTime_Period = \Carbon\Carbon::parse(($StartDate_ ?? $StartDate_) . ' ' . ($Period->StartTime ?? '00:00'));
    //     $EndDateTime_Period = \Carbon\Carbon::parse(($EndDate_ ?? $EndDate_) . ' ' . ($Period->EndTime ?? '00:00')); 
    // }
    // if ($StartDate_ == $EndDate_) { 
    //     $StartDateTime_Period = \Carbon\Carbon::parse(($StartDate_ ?? $StartDate_) . ' ' . ('00:00' ?? '00:00'));
    //     $EndDateTime_Period = \Carbon\Carbon::parse(($EndDate_ ?? $EndDate_) . ' ' . ($Period->EndTime ?? '00:00')); 
    // }
    $TotalDays_Period = $StartDateTime_Period->diffInDays($EndDateTime_Period);
    $TotalHours_Period = $StartDateTime_Period->diffInHours($EndDateTime_Period); 
    $TotalMinutes_Period = $StartDateTime_Period->diffInMinutes($EndDateTime_Period); 
    array_push($TotalDays_PeriodArr, $TotalDays_Period);  
    array_push($TotalHours_PeriodArr, $TotalHours_Period);   
    array_push($TotalMinutes_PeriodArr, $TotalMinutes_Period);    
}  
$PeriodicPercentageOfVesselAvailability = (round((array_sum($TotalDaysArr) / array_sum($TotalDays_PeriodArr)) * 100, 0));
if ($PeriodicPercentageOfVesselAvailability > 100) {
    $PeriodicPercentageOfVesselAvailability = 100;
} 
