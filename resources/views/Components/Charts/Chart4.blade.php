<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/7.8.5/d3.min.js"></script>
<div class="form-1 chart-4 {{ (isset($_GET['FilterValue']) || isset($_GET['page']) || isset($_GET['Vessel_FILTER'])) ? 'Hide' : '' }}" style="display: {{ isset($_GET['Chart4']) ? 'flex !important' : '' }}">
  <div class="chart-4-wrapper">
    <h1 class="indicator">
      <span class="status-x {{ isset($_GET['Chart4']) ? $_GET['Status'] : '' }}"></span>
    </h1>
    <h2>{{ isset($_GET['Chart4']) ? $_GET['Vessel'] : '' }}</h2>
    <p class="Close">✖</p>
    <div class="pieID pie"></div> 
    @if (isset($_GET['Chart4']))
    @php 
      $MonthlyVessel_DOCKING_STATS = \DB::table('vessel_availabilities')->select(['StartDate', 'StartTime', 'EndDate', 'EndTime'])->where('Vessel', $_GET['Vessel'])->where('Status', 'DOCKING')->whereYear('EndDate', $_GET['Year'])
                                    ->where(function($query) {
                                      $query->whereMonth('EndDate', $_GET['Month'])
                                            ->orWhere(function($query) {
                                                $query->whereMonth('StartDate', $_GET['Month']);
                                            })
                                            ->orWhere(function($query) {
                                                $query->whereMonth('StartDate', '<', $_GET['Month'])
                                                      ->whereMonth('EndDate', '>', $_GET['Month']);
                                            })
                                            ->orWhere(function ($query) {
                                              if($_GET['Month'] == '0') {
                                                $query->whereBetween('StartDate', [$_GET['StartDate'], $_GET['EndDate']])
                                                      ->whereBetween('EndDate', [$_GET['StartDate'], $_GET['EndDate']]);
                                              }
                                            });
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
      $MonthlyVessel_BUNKERY_STATS = \DB::table('vessel_availabilities')->select(['StartDate', 'StartTime', 'EndDate', 'EndTime'])->where('Vessel', $_GET['Vessel'])->where('Status', 'BUNKERY')->whereYear('EndDate', $_GET['Year'])
                                          ->where(function($query) {
                                      $query->whereMonth('EndDate', $_GET['Month'])
                                            ->orWhere(function($query) {
                                                $query->whereMonth('StartDate', $_GET['Month']);
                                            })
                                            ->orWhere(function($query) {
                                                $query->whereMonth('StartDate', '<', $_GET['Month'])
                                                      ->whereMonth('EndDate', '>', $_GET['Month']);
                                            })
                                            ->orWhere(function ($query) {
                                              if($_GET['Month'] == '0') {
                                                $query->whereBetween('StartDate', [$_GET['StartDate'], $_GET['EndDate']])
                                                      ->whereBetween('EndDate', [$_GET['StartDate'], $_GET['EndDate']]);
                                              }
                                            });
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
      $MonthlyVessel_INSPECTION_STATS = \DB::table('vessel_availabilities')->select(['StartDate', 'StartTime', 'EndDate', 'EndTime'])->where('Vessel', $_GET['Vessel'])->where('Status', 'INSPECTION')->whereYear('EndDate', $_GET['Year'])
                                          ->where(function($query) {
                                      $query->whereMonth('EndDate', $_GET['Month'])
                                            ->orWhere(function($query) {
                                                $query->whereMonth('StartDate', $_GET['Month']);
                                            })
                                            ->orWhere(function($query) {
                                                $query->whereMonth('StartDate', '<', $_GET['Month'])
                                                      ->whereMonth('EndDate', '>', $_GET['Month']);
                                            })
                                            ->orWhere(function ($query) {
                                              if($_GET['Month'] == '0') {
                                                $query->whereBetween('StartDate', [$_GET['StartDate'], $_GET['EndDate']])
                                                      ->whereBetween('EndDate', [$_GET['StartDate'], $_GET['EndDate']]);
                                              }
                                            });
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
      $MonthlyVessel_MAINTENANCE_STATS = \DB::table('vessel_availabilities')->select(['StartDate', 'StartTime', 'EndDate', 'EndTime'])->where('Vessel', $_GET['Vessel'])->where('Status', 'MAINTENANCE')->whereYear('EndDate', $_GET['Year'])
                                          ->where(function($query) {
                                      $query->whereMonth('EndDate', $_GET['Month'])
                                            ->orWhere(function($query) {
                                                $query->whereMonth('StartDate', $_GET['Month']);
                                            })
                                            ->orWhere(function($query) {
                                                $query->whereMonth('StartDate', '<', $_GET['Month'])
                                                      ->whereMonth('EndDate', '>', $_GET['Month']);
                                            })
                                            ->orWhere(function ($query) {
                                              if($_GET['Month'] == '0') {
                                                $query->whereBetween('StartDate', [$_GET['StartDate'], $_GET['EndDate']])
                                                      ->whereBetween('EndDate', [$_GET['StartDate'], $_GET['EndDate']]);
                                              }
                                            });
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
      $MonthlyVessel_BREAKDOWN_STATS = \DB::table('vessel_availabilities')->select(['StartDate', 'StartTime', 'EndDate', 'EndTime'])->where('Vessel', $_GET['Vessel'])->where('Status', 'BREAKDOWN')->whereYear('EndDate', $_GET['Year'])
                                          ->where(function($query) {
                                      $query->whereMonth('EndDate', $_GET['Month'])
                                            ->orWhere(function($query) {
                                                $query->whereMonth('StartDate', $_GET['Month']);
                                            })
                                            ->orWhere(function($query) {
                                                $query->whereMonth('StartDate', '<', $_GET['Month'])
                                                      ->whereMonth('EndDate', '>', $_GET['Month']);
                                            })
                                            ->orWhere(function ($query) {
                                              if($_GET['Month'] == '0') {
                                                $query->whereBetween('StartDate', [$_GET['StartDate'], $_GET['EndDate']])
                                                      ->whereBetween('EndDate', [$_GET['StartDate'], $_GET['EndDate']]);
                                              }
                                            });
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
      $MonthlyVessel_IDLE_STATS = \DB::table('vessel_availabilities')->select(['StartDate', 'StartTime', 'EndDate', 'EndTime'])->where('Vessel', $_GET['Vessel'])->where('Status', 'IDLE')->whereYear('EndDate', $_GET['Year'])
                                          ->where(function($query) {
                                      $query->whereMonth('EndDate', $_GET['Month'])
                                            ->orWhere(function($query) {
                                                $query->whereMonth('StartDate', $_GET['Month']);
                                            })
                                            ->orWhere(function($query) {
                                                $query->whereMonth('StartDate', '<', $_GET['Month'])
                                                      ->whereMonth('EndDate', '>', $_GET['Month']);
                                            })
                                            ->orWhere(function ($query) {
                                              if($_GET['Month'] == '0') {
                                                $query->whereBetween('StartDate', [$_GET['StartDate'], $_GET['EndDate']])
                                                      ->whereBetween('EndDate', [$_GET['StartDate'], $_GET['EndDate']]);
                                              }
                                            });
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
    @endphp 
    @endif
    <ul class="pieID legend">
      <li>
        <em>Docking</em>
        @if (isset($_GET['Chart4']))
        <span class="DockingCount"><small>{{ round(\Carbon\CarbonInterval::hours(collect($TotalHoursArr_DOCKING)->sum())->totalDays) . ' day(s)' }} <p class="Hide">{{ (collect($TotalHoursArr_DOCKING)->sum() == 0) ? round(collect($TotalMinutesArr_DOCKING)->sum() / 60, 2) : collect($TotalHoursArr_DOCKING)->sum() }}</p> : {{ ((collect($TotalHoursArr_DOCKING)->sum() == 0) ? collect($TotalMinutesArr_DOCKING)->sum() . ' min(s)' : collect($TotalHoursArr_DOCKING)->sum() . ' hour(s)') }}</small></span>
        @else
        <span class="DockingCount"><small></small></span>
        @endif
      </li>
      <li>
        <em>Bunkering</em>
        @if (isset($_GET['Chart4']))
        <span class="BunkeringCount"><small>{{ round(\Carbon\CarbonInterval::hours(collect($TotalHoursArr_BUNKERY)->sum())->totalDays) . ' day(s)' }} <p class="Hide">{{ (collect($TotalHoursArr_BUNKERY)->sum() == 0) ? round(collect($TotalMinutesArr_BUNKERY)->sum() / 60, 2) : collect($TotalHoursArr_BUNKERY)->sum() }}</p> : {{ ((collect($TotalHoursArr_BUNKERY)->sum() == 0) ? collect($TotalMinutesArr_BUNKERY)->sum() . ' min(s)' : collect($TotalHoursArr_BUNKERY)->sum() . ' hour(s)') }}</small></span>
        @else
        <span class="BunkeringCount"><small></small></span>
        @endif
      </li>
      <li>
        <em>Inspection</em>
        @if (isset($_GET['Chart4']))
        <span class="InspectionCount"><small>{{ round(\Carbon\CarbonInterval::hours(collect($TotalHoursArr_INSPECTION)->sum())->totalDays) . ' day(s)' }} <p class="Hide">{{ (collect($TotalHoursArr_INSPECTION)->sum() == 0) ? round(collect($TotalMinutesArr_INSPECTION)->sum() / 60, 2) : collect($TotalHoursArr_INSPECTION)->sum() }}</p> : {{ ((collect($TotalHoursArr_INSPECTION)->sum() == 0) ? collect($TotalMinutesArr_INSPECTION)->sum() . ' min(s)' : collect($TotalHoursArr_INSPECTION)->sum() . ' hour(s)') }}</small></span>
        @else
        <span class="InspectionCount"><small></small></span>
        @endif
      </li>
      <li>
        <em>Maintenance</em>
        @if (isset($_GET['Chart4']))
        <span class="MaintenanceCount"><small>{{ round(\Carbon\CarbonInterval::hours(collect($TotalHoursArr_MAINTENANCE)->sum())->totalDays) . ' day(s)' }} <p class="Hide">{{ (collect($TotalHoursArr_MAINTENANCE)->sum() == 0) ? round(collect($TotalMinutesArr_MAINTENANCE)->sum() / 60, 2) : collect($TotalHoursArr_MAINTENANCE)->sum() }}</p> : {{ ((collect($TotalHoursArr_MAINTENANCE)->sum() == 0) ? collect($TotalMinutesArr_MAINTENANCE)->sum() . ' min(s)' : collect($TotalHoursArr_MAINTENANCE)->sum() . ' hour(s)') }}</small></span>
        @else
        <span class="MaintenanceCount"><small></small></span>
        @endif
      </li>
      <li>
        <em>Breakdown</em>
        @if (isset($_GET['Chart4']))
        <span class="BreakdownCount"><small>{{ round(\Carbon\CarbonInterval::hours(collect($TotalHoursArr_BREAKDOWN)->sum())->totalDays) . ' day(s)' }} <p class="Hide">{{ (collect($TotalHoursArr_BREAKDOWN)->sum() == 0) ? round(collect($TotalMinutesArr_BREAKDOWN)->sum() / 60, 2) : collect($TotalHoursArr_BREAKDOWN)->sum() }}</p> : {{ ((collect($TotalHoursArr_BREAKDOWN)->sum() == 0) ? collect($TotalMinutesArr_BREAKDOWN)->sum() . ' min(s)' : collect($TotalHoursArr_BREAKDOWN)->sum() . ' hour(s)') }}</small></span>
        @else
        <span class="BreakdownCount"><small></small></span>
        @endif
      </li>
      <li>
        <em>Ready</em>
        @if (isset($_GET['Chart4']))
        <span class="ReadyCount"><small>{{ round(\Carbon\CarbonInterval::hours(collect($TotalHoursArr_IDLE)->sum())->totalDays) . ' day(s)' }} <p class="Hide">{{ (collect($TotalHoursArr_IDLE)->sum() == 0) ? round(collect($TotalMinutesArr_IDLE)->sum() / 60, 2) : collect($TotalHoursArr_IDLE)->sum() }}</p> : {{ ((collect($TotalHoursArr_IDLE)->sum() == 0) ? collect($TotalMinutesArr_IDLE)->sum() . ' min(s)' : collect($TotalHoursArr_IDLE)->sum() . ' hour(s)') }}</small></span>
        @else
        <span class="ReadyCount"><small></small></span>
        @endif
      </li>
    </ul>
    @if (isset($_GET['Chart4']))
    <div class="Comment">In {{  \Carbon\Carbon::create(null, $_GET['Month'], 1)->format('F') . ' ' . $_GET['Year'] }}</div>
    @endif
    <div class="Comment"></div>
    <img class="OpenChart4Filter" src="{{ asset('Images/data-analytics.png') }}" alt="">
    <span class="Hide">{{ isset($_GET['Chart4']) ? $_GET['Vessel'] : '' }}</span>
    <span class="Hide"></span> 
  </div>
</div>