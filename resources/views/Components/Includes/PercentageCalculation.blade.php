@php 
    $Period_Start = \DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->where('StartDate', '>=', $StartDate_)->where('StartDate', '<=', $EndDate_)->orderBy('StartDate')->first();  
    if ((empty($Period_Start)) || ($StartDate_ > ($Period_Start->StartDate ?? 'null'))) {
        $Period_Start = \DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->where('StartDate', '<=', $StartDate_)->where('EndDate', '>=', $StartDate_)->orderBy('StartDate')->first(); 
    }
    $Period_End = \DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->where('EndDate', '>=', $StartDate_)->where('EndDate', '<=', $EndDate_)->orderBy('EndDate', 'DESC')->first(); 
    $StartDateTime = \Carbon\Carbon::parse(($Period_Start->StartDate ?? date('Y-m-d')) . ' ' . ($Period_Start->StartTime ?? '00:00'));
    $EndDateTime = \Carbon\Carbon::parse(($Period_End->EndDate ?? date('Y-m-d')) . ' ' . ($Period_End->EndTime ?? '00:00'));
    if (empty($Period_Start) || empty($Period_End)) {
        $TotalDays = 0;
    } else if($Period_Start->StartDate == $Period_End->EndDate) {
        $TotalDays = 1;
    } else {
        $TotalDays = $EndDateTime->diffInDays($StartDateTime); 
    } 
@endphp  
{{ $TotalDays }}