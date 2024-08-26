@php 
    $Periods = \DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereBetween('StartDate', [$StartDate_, $EndDate_])->whereBetween('EndDate', [$StartDate_, $EndDate_])->orderBy('EndDate', 'DESC')->get();
    $TotalDaysArr = [];
    foreach($Periods as $Period) { 
        $StartDateTime = \Carbon\Carbon::parse(($Period->StartDate ?? date('Y-m-d')) . ' ' . ($Period->StartTime ?? '00:00'));
        $EndDateTime = \Carbon\Carbon::parse(($Period->EndDate ?? date('Y-m-d')) . ' ' . ($Period->EndTime ?? '00:00'));
        $TotalDays = $EndDateTime->diffInDays($StartDateTime);
        array_push($TotalDaysArr, $TotalDays); 
    } 
@endphp  
{{ array_sum($TotalDaysArr) }}