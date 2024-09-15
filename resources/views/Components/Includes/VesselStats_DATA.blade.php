@php
    $_NumberOfVessels_DOCKING = \App\Models\VesselAvailability::select('id')->where('Status', 'DOCKING')->where('Vessel', $Vessel->VesselName)->get();
    $_NumberOfVessels_BUNKERY = \App\Models\VesselAvailability::select('id')->where('Status', 'BUNKERY')->where('Vessel', $Vessel->VesselName)->get();
    $_NumberOfVessels_INSPECTION = \App\Models\VesselAvailability::select('id')->where('Status', 'INSPECTION')->where('Vessel', $Vessel->VesselName)->get();
    $_NumberOfVessels_MAINTENANCE = \App\Models\VesselAvailability::select('id')->where('Status', 'MAINTENANCE')->where('Vessel', $Vessel->VesselName)->get();
    $_NumberOfVessels_BREAKDOWN = \App\Models\VesselAvailability::select('id')->where('Status', 'BREAKDOWN')->where('Vessel', $Vessel->VesselName)->get();
    $_NumberOfVessels_IDLE = \App\Models\VesselAvailability::select('id')->where('Status', 'IDLE')->where('Vessel', $Vessel->VesselName)->get();
      
    $MonthlyVessel_DOCKING_STATS = \DB::table('vessel_availabilities')->select(['StartDate', 'StartTime', 'EndDate', 'EndTime'])->where('Vessel', $Vessel->VesselName)->where('Status', 'DOCKING')
                                          ->where(function($query) {
                                            $query->where('StartDate', '>=', '01-01-' . date('Y'))
                                                    ->where('EndDate', '<=', '31-12-' . date('Y'));
                                          })->get();
      $TotalDaysArr_DOCKING = [];
      $TotalHoursArr_DOCKING = [];
      $TotalMinutesArr_DOCKING = [];
      if (count($MonthlyVessel_DOCKING_STATS) == 0) {
          $TotalDaysArr_DOCKING = [0];
      }  
      foreach($MonthlyVessel_DOCKING_STATS as $Period) { 
          $StartDateTime = \Carbon\Carbon::parse(($Period->StartDate ?? date('Y-m-d')) . ' ' . ($Period->StartTime ?? '00:00'));
          $EndDateTime = \Carbon\Carbon::parse(($Period->EndDate ?? date('Y-m-d')) . ' ' . ($Period->EndTime ?? '00:00'));
          $TotalDays = $EndDateTime->diffInDays($StartDateTime);
          $TotalHours = $EndDateTime->diffInHours($StartDateTime);
          $TotalMinutes = $EndDateTime->diffInMinutes($StartDateTime);
          array_push($TotalMinutesArr_DOCKING, $TotalMinutes); 
          array_push($TotalDaysArr_DOCKING, $TotalDays); 
          array_push($TotalHoursArr_DOCKING, $TotalHours); 
      }  
      
    $MonthlyVessel_BUNKERY_STATS = \DB::table('vessel_availabilities')->select(['StartDate', 'StartTime', 'EndDate', 'EndTime'])->where('Vessel', $Vessel->VesselName)->where('Status', 'BUNKERY')
                                          ->where(function($query) {
                                            $query->where('StartDate', '>=', '01-01-' . date('Y'))
                                                    ->where('EndDate', '<=', '31-12-' . date('Y'));
                                          })->get();
      $TotalDaysArr_BUNKERY = [];
      $TotalHoursArr_BUNKERY = [];
      $TotalMinutesArr_BUNKERY = [];
      if (count($MonthlyVessel_BUNKERY_STATS) == 0) {
          $TotalDaysArr_BUNKERY = [0];
      }  
      foreach($MonthlyVessel_BUNKERY_STATS as $Period) { 
          $StartDateTime = \Carbon\Carbon::parse(($Period->StartDate ?? date('Y-m-d')) . ' ' . ($Period->StartTime ?? '00:00'));
          $EndDateTime = \Carbon\Carbon::parse(($Period->EndDate ?? date('Y-m-d')) . ' ' . ($Period->EndTime ?? '00:00'));
          $TotalDays = $EndDateTime->diffInDays($StartDateTime);
          $TotalHours = $EndDateTime->diffInHours($StartDateTime);
          $TotalMinutes = $EndDateTime->diffInMinutes($StartDateTime);
          array_push($TotalMinutesArr_BUNKERY, $TotalMinutes); 
          array_push($TotalDaysArr_BUNKERY, $TotalDays); 
          array_push($TotalHoursArr_BUNKERY, $TotalHours); 
      }  
      
    $MonthlyVessel_INSPECTION_STATS = \DB::table('vessel_availabilities')->select(['StartDate', 'StartTime', 'EndDate', 'EndTime'])->where('Vessel', $Vessel->VesselName)->where('Status', 'INSPECTION')
                                          ->where(function($query) {
                                            $query->where('StartDate', '>=', '01-01-' . date('Y'))
                                                    ->where('EndDate', '<=', '31-12-' . date('Y'));
                                          })->get();
      $TotalDaysArr_INSPECTION = [];
      $TotalHoursArr_INSPECTION = [];
      $TotalMinutesArr_INSPECTION = [];
      if (count($MonthlyVessel_INSPECTION_STATS) == 0) {
          $TotalDaysArr_INSPECTION = [0];
      }  
      foreach($MonthlyVessel_INSPECTION_STATS as $Period) { 
          $StartDateTime = \Carbon\Carbon::parse(($Period->StartDate ?? date('Y-m-d')) . ' ' . ($Period->StartTime ?? '00:00'));
          $EndDateTime = \Carbon\Carbon::parse(($Period->EndDate ?? date('Y-m-d')) . ' ' . ($Period->EndTime ?? '00:00'));
          $TotalDays = $EndDateTime->diffInDays($StartDateTime);
          $TotalHours = $EndDateTime->diffInHours($StartDateTime);
          $TotalMinutes = $EndDateTime->diffInMinutes($StartDateTime);
          array_push($TotalMinutesArr_INSPECTION, $TotalMinutes); 
          array_push($TotalDaysArr_INSPECTION, $TotalDays); 
          array_push($TotalHoursArr_INSPECTION, $TotalHours); 
      }  
      
    $MonthlyVessel_MAINTENANCE_STATS = \DB::table('vessel_availabilities')->select(['StartDate', 'StartTime', 'EndDate', 'EndTime'])->where('Vessel', $Vessel->VesselName)->where('Status', 'MAINTENANCE')
                                          ->where(function($query) {
                                            $query->where('StartDate', '>=', '01-01-' . date('Y'))
                                                    ->where('EndDate', '<=', '31-12-' . date('Y'));
                                          })->get();
      $TotalDaysArr_MAINTENANCE = [];
      $TotalHoursArr_MAINTENANCE = [];
      $TotalMinutesArr_MAINTENANCE = [];
      if (count($MonthlyVessel_MAINTENANCE_STATS) == 0) {
          $TotalDaysArr_MAINTENANCE = [0];
      }  
      foreach($MonthlyVessel_MAINTENANCE_STATS as $Period) { 
          $StartDateTime = \Carbon\Carbon::parse(($Period->StartDate ?? date('Y-m-d')) . ' ' . ($Period->StartTime ?? '00:00'));
          $EndDateTime = \Carbon\Carbon::parse(($Period->EndDate ?? date('Y-m-d')) . ' ' . ($Period->EndTime ?? '00:00'));
          $TotalDays = $EndDateTime->diffInDays($StartDateTime);
          $TotalHours = $EndDateTime->diffInHours($StartDateTime);
          $TotalMinutes = $EndDateTime->diffInMinutes($StartDateTime);
          array_push($TotalMinutesArr_MAINTENANCE, $TotalMinutes); 
          array_push($TotalDaysArr_MAINTENANCE, $TotalDays); 
          array_push($TotalHoursArr_MAINTENANCE, $TotalHours); 
      }  
      
    $MonthlyVessel_BREAKDOWN_STATS = \DB::table('vessel_availabilities')->select(['StartDate', 'StartTime', 'EndDate', 'EndTime'])->where('Vessel', $Vessel->VesselName)->where('Status', 'BREAKDOWN')
                                          ->where(function($query) {
                                            $query->where('StartDate', '>=', '01-01-' . date('Y'))
                                                    ->where('EndDate', '<=', '31-12-' . date('Y'));
                                          })->get();
      $TotalDaysArr_BREAKDOWN = [];
      $TotalHoursArr_BREAKDOWN = [];
      $TotalMinutesArr_BREAKDOWN = [];
      if (count($MonthlyVessel_BREAKDOWN_STATS) == 0) {
          $TotalDaysArr_BREAKDOWN = [0];
      }  
      foreach($MonthlyVessel_BREAKDOWN_STATS as $Period) { 
          $StartDateTime = \Carbon\Carbon::parse(($Period->StartDate ?? date('Y-m-d')) . ' ' . ($Period->StartTime ?? '00:00'));
          $EndDateTime = \Carbon\Carbon::parse(($Period->EndDate ?? date('Y-m-d')) . ' ' . ($Period->EndTime ?? '00:00'));
          $TotalDays = $EndDateTime->diffInDays($StartDateTime);
          $TotalHours = $EndDateTime->diffInHours($StartDateTime);
          $TotalMinutes = $EndDateTime->diffInMinutes($StartDateTime);
          array_push($TotalMinutesArr_BREAKDOWN, $TotalMinutes); 
          array_push($TotalDaysArr_BREAKDOWN, $TotalDays); 
          array_push($TotalHoursArr_BREAKDOWN, $TotalHours); 
      }   
    $MonthlyVessel_IDLE_STATS = \DB::table('vessel_availabilities')->select(['StartDate', 'StartTime', 'EndDate', 'EndTime'])->where('Vessel', $Vessel->VesselName)->where('Status', 'IDLE')
                                          ->where(function($query) {
                                            $query->where('StartDate', '>=', '01-01-' . date('Y'))
                                                    ->where('EndDate', '<=', '31-12-' . date('Y'));
                                          })->get();
      $TotalDaysArr_IDLE = [];
      $TotalHoursArr_IDLE = [];
      $TotalMinutesArr_IDLE = [];
      if (count($MonthlyVessel_IDLE_STATS) == 0) {
          $TotalDaysArr_IDLE = [0];
      }  
      foreach($MonthlyVessel_IDLE_STATS as $Period) { 
          $StartDateTime = \Carbon\Carbon::parse(($Period->StartDate ?? date('Y-m-d')) . ' ' . ($Period->StartTime ?? '00:00'));
          $EndDateTime = \Carbon\Carbon::parse(($Period->EndDate ?? date('Y-m-d')) . ' ' . ($Period->EndTime ?? '00:00'));
          $TotalDays = $EndDateTime->diffInDays($StartDateTime);
          $TotalHours = $EndDateTime->diffInHours($StartDateTime);
          $TotalMinutes = $EndDateTime->diffInMinutes($StartDateTime);
          array_push($TotalMinutesArr_IDLE, $TotalMinutes); 
          array_push($TotalDaysArr_IDLE, $TotalDays); 
          array_push($TotalHoursArr_IDLE, $TotalHours); 
      }  
    $TotalActivities = (count($_NumberOfVessels_DOCKING) + count($_NumberOfVessels_BUNKERY) + count($_NumberOfVessels_INSPECTION) + count($_NumberOfVessels_MAINTENANCE) + count($_NumberOfVessels_BREAKDOWN) + count($_NumberOfVessels_BUNKERY) + count($_NumberOfVessels_IDLE)) == 0 ? 1 : (count($_NumberOfVessels_DOCKING) + count($_NumberOfVessels_BUNKERY) + count($_NumberOfVessels_INSPECTION) + count($_NumberOfVessels_MAINTENANCE) + count($_NumberOfVessels_BREAKDOWN) + count($_NumberOfVessels_IDLE));
    // $TotalActivities_ = round(\Carbon\CarbonInterval::hours(collect($TotalHoursArr_BUNKERY)->sum())->totalDays) + round(\Carbon\CarbonInterval::hours(collect($TotalHoursArr_INSPECTION)->sum())->totalDays) + round(\Carbon\CarbonInterval::hours(collect($TotalHoursArr_MAINTENANCE)->sum())->totalDays) + round(\Carbon\CarbonInterval::hours(collect($TotalHoursArr_BREAKDOWN)->sum())->totalDays) + round(\Carbon\CarbonInterval::hours(collect($TotalHoursArr_IDLE)->sum())->totalDays) + round(\Carbon\CarbonInterval::hours(collect($TotalHoursArr_DOCKING)->sum())->totalDays);
    $TotalActivities_ = collect($TotalMinutesArr_BUNKERY)->sum() + collect($TotalMinutesArr_INSPECTION)->sum() + collect($TotalMinutesArr_MAINTENANCE)->sum() + collect($TotalMinutesArr_BREAKDOWN)->sum() + collect($TotalMinutesArr_IDLE)->sum() + collect($TotalMinutesArr_DOCKING)->sum();
@endphp 
<span class="Hide">{{ $Vessel->VesselName }}</span> 
<span class="Hide">{{ round(\Carbon\CarbonInterval::hours(collect($TotalHoursArr_DOCKING)->sum())->totalDays) }}</span> 
<span class="Hide">{{ round(\Carbon\CarbonInterval::hours(collect($TotalHoursArr_BUNKERY)->sum())->totalDays) }}</span> 
<span class="Hide">{{ round(\Carbon\CarbonInterval::hours(collect($TotalHoursArr_INSPECTION)->sum())->totalDays) }}</span> 
<span class="Hide">{{ round(\Carbon\CarbonInterval::hours(collect($TotalHoursArr_MAINTENANCE)->sum())->totalDays) }}</span> 
<span class="Hide">{{ round(\Carbon\CarbonInterval::hours(collect($TotalHoursArr_BREAKDOWN)->sum())->totalDays) }}</span> 
<span class="Hide">{{ ($TotalActivities_ == 0) ? round((collect($TotalMinutesArr_DOCKING)->sum() / 1) * 100, 2) : round((collect($TotalMinutesArr_DOCKING)->sum() / $TotalActivities_) * 100, 2) }}</span>
<span class="Hide">{{ ($TotalActivities_ == 0) ? round((collect($TotalMinutesArr_BUNKERY)->sum() / 1) * 100, 2) : round((collect($TotalMinutesArr_BUNKERY)->sum() / $TotalActivities_) * 100, 2) }}</span>
<span class="Hide">{{ ($TotalActivities_ == 0) ? round((collect($TotalMinutesArr_INSPECTION)->sum() / 1) * 100, 2) : round((collect($TotalMinutesArr_INSPECTION)->sum() / $TotalActivities_) * 100, 2) }}</span>
<span class="Hide">{{ ($TotalActivities_ == 0) ? round((collect($TotalMinutesArr_MAINTENANCE)->sum() / 1) * 100, 2) : round((collect($TotalMinutesArr_MAINTENANCE)->sum() / $TotalActivities_) * 100, 2) }}</span>
<span class="Hide">{{ ($TotalActivities_ == 0) ? round((collect($TotalMinutesArr_BREAKDOWN)->sum() / 1) * 100, 2) : round((collect($TotalMinutesArr_BREAKDOWN)->sum() / $TotalActivities_) * 100, 2) }}</span> 
@php
    $VesselComment = \App\Models\VesselAvailability::select('Comment')->where('Vessel', $Vessel->VesselName)->orderBy('StartDate', 'DESC')->orderBy('StartTime', 'DESC')->first();
@endphp
<span class="Hide">{{ $VesselComment->Comment ?? 'Vessel is on ' . (strtolower($Availability_STATUS->Status ?? 'operation') == 'idle' ? 'operation' : strtolower($Availability_STATUS->Status ?? 'operation')) }}</span> 
<span class="Hide">{{ strtolower($Availability_STATUS->Status ?? 'idle') }}</span>
<span class="Hide">{{ (collect($TotalHoursArr_DOCKING)->sum() == 0) ? round(collect($TotalMinutesArr_DOCKING)->sum() / 60, 2) . ' min(s)' : collect($TotalHoursArr_DOCKING)->sum() . ' hour(s)' }}</span>
<span class="Hide">{{ (collect($TotalHoursArr_BUNKERY)->sum() == 0) ? round(collect($TotalMinutesArr_BUNKERY)->sum() / 60, 2) . ' min(s)' : collect($TotalHoursArr_BUNKERY)->sum() . ' hour(s)' }}</span>
<span class="Hide">{{ (collect($TotalHoursArr_INSPECTION)->sum() == 0) ? round(collect($TotalMinutesArr_INSPECTION)->sum() / 60, 2) . ' min(s)' : collect($TotalHoursArr_INSPECTION)->sum() . ' hour(s)' }}</span>
<span class="Hide">{{ (collect($TotalHoursArr_MAINTENANCE)->sum() == 0) ? round(collect($TotalMinutesArr_MAINTENANCE)->sum() / 60, 2) . ' min(s)' : collect($TotalHoursArr_MAINTENANCE)->sum() . ' hour(s)' }}</span>
<span class="Hide">{{ (collect($TotalHoursArr_BREAKDOWN)->sum() == 0) ? round(collect($TotalMinutesArr_BREAKDOWN)->sum() / 60, 2) . ' min(s)' : collect($TotalHoursArr_BREAKDOWN)->sum() . ' hour(s)' }}</span>
<span class="Hide">{{ round(\Carbon\CarbonInterval::hours(collect($TotalHoursArr_IDLE)->sum())->totalDays) }}</span> 
<span class="Hide">{{ ($TotalActivities_ == 0) ? round((collect($TotalMinutesArr_IDLE)->sum() / 1) * 100, 2) : round((collect($TotalMinutesArr_IDLE)->sum() / $TotalActivities_) * 100, 2) }}</span> 
<span class="Hide">{{ (collect($TotalHoursArr_IDLE)->sum() == 0) ? round(collect($TotalMinutesArr_IDLE)->sum() / 60, 2) . ' min(s)' : collect($TotalHoursArr_IDLE)->sum() . ' hour(s)' }}</span>

