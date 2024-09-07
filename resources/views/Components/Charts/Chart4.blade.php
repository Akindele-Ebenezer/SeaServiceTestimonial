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
      $MonthlyVessel_DOCKING_STATS = \DB::table('vessel_availabilities')->select(['StartDate', 'StartTime', 'EndDate', 'EndTime'])->where('Vessel', $_GET['Vessel'])->where('Status', 'DOCKING')
                                    ->where(function($query) {
                                      $query->whereMonth('EndDate', $_GET['Month'])
                                            ->orWhere(function($query) {
                                                $query->whereMonth('StartDate', $_GET['Month']);
                                            });
                                          })->get(); 
      $TotalDaysArr_DOCKING = [];
      $TotalHoursArr_DOCKING = [];
      if (count($MonthlyVessel_DOCKING_STATS) == 0) {
          $TotalDaysArr_DOCKING = [0];
      }  
      foreach($MonthlyVessel_DOCKING_STATS as $Period) { 
          $StartDateTime = \Carbon\Carbon::parse(($Period->StartDate ?? date('Y-m-d')) . ' ' . ($Period->StartTime ?? '00:00'));
          $EndDateTime = \Carbon\Carbon::parse(($Period->EndDate ?? date('Y-m-d')) . ' ' . ($Period->EndTime ?? '00:00'));
          $TotalDays = $EndDateTime->diffInDays($StartDateTime);
          $TotalHours = $EndDateTime->diffInHours($StartDateTime);
          array_push($TotalDaysArr_DOCKING, $TotalDays); 
          array_push($TotalHoursArr_DOCKING, $TotalHours); 
      }  
      $MonthlyVessel_BUNKERY_STATS = \DB::table('vessel_availabilities')->select(['StartDate', 'StartTime', 'EndDate', 'EndTime'])->where('Vessel', $_GET['Vessel'])->where('Status', 'BUNKERY')
                                          ->where(function($query) {
                                      $query->whereMonth('EndDate', $_GET['Month'])
                                            ->orWhere(function($query) {
                                                $query->whereMonth('StartDate', $_GET['Month']);
                                            });
                                          })->get();
      $TotalDaysArr_BUNKERY = [];
      $TotalHoursArr_BUNKERY = [];
      if (count($MonthlyVessel_BUNKERY_STATS) == 0) {
          $TotalDaysArr_BUNKERY = [0];
      }  
      foreach($MonthlyVessel_BUNKERY_STATS as $Period) { 
          $StartDateTime = \Carbon\Carbon::parse(($Period->StartDate ?? date('Y-m-d')) . ' ' . ($Period->StartTime ?? '00:00'));
          $EndDateTime = \Carbon\Carbon::parse(($Period->EndDate ?? date('Y-m-d')) . ' ' . ($Period->EndTime ?? '00:00'));
          $TotalDays = $EndDateTime->diffInDays($StartDateTime);
          $TotalHours = $EndDateTime->diffInHours($StartDateTime);
          array_push($TotalDaysArr_BUNKERY, $TotalDays); 
          array_push($TotalHoursArr_BUNKERY, $TotalHours); 
      }  
      $MonthlyVessel_INSPECTION_STATS = \DB::table('vessel_availabilities')->select(['StartDate', 'StartTime', 'EndDate', 'EndTime'])->where('Vessel', $_GET['Vessel'])->where('Status', 'INSPECTION')
                                          ->where(function($query) {
                                      $query->whereMonth('EndDate', $_GET['Month'])
                                            ->orWhere(function($query) {
                                                $query->whereMonth('StartDate', $_GET['Month']);
                                            });
                                          })->get();
      $TotalDaysArr_INSPECTION = [];
      $TotalHoursArr_INSPECTION = [];
      if (count($MonthlyVessel_INSPECTION_STATS) == 0) {
          $TotalDaysArr_INSPECTION = [0];
      }  
      foreach($MonthlyVessel_INSPECTION_STATS as $Period) { 
          $StartDateTime = \Carbon\Carbon::parse(($Period->StartDate ?? date('Y-m-d')) . ' ' . ($Period->StartTime ?? '00:00'));
          $EndDateTime = \Carbon\Carbon::parse(($Period->EndDate ?? date('Y-m-d')) . ' ' . ($Period->EndTime ?? '00:00'));
          $TotalDays = $EndDateTime->diffInDays($StartDateTime);
          $TotalHours = $EndDateTime->diffInHours($StartDateTime);
          array_push($TotalDaysArr_INSPECTION, $TotalDays); 
          array_push($TotalHoursArr_INSPECTION, $TotalHours); 
      }  
      $MonthlyVessel_MAINTENANCE_STATS = \DB::table('vessel_availabilities')->select(['StartDate', 'StartTime', 'EndDate', 'EndTime'])->where('Vessel', $_GET['Vessel'])->where('Status', 'MAINTENANCE')
                                          ->where(function($query) {
                                      $query->whereMonth('EndDate', $_GET['Month'])
                                            ->orWhere(function($query) {
                                                $query->whereMonth('StartDate', $_GET['Month']);
                                            });
                                          })->get();
      $TotalDaysArr_MAINTENANCE = [];
      $TotalHoursArr_MAINTENANCE = [];
      if (count($MonthlyVessel_MAINTENANCE_STATS) == 0) {
          $TotalDaysArr_MAINTENANCE = [0];
      }  
      foreach($MonthlyVessel_MAINTENANCE_STATS as $Period) { 
          $StartDateTime = \Carbon\Carbon::parse(($Period->StartDate ?? date('Y-m-d')) . ' ' . ($Period->StartTime ?? '00:00'));
          $EndDateTime = \Carbon\Carbon::parse(($Period->EndDate ?? date('Y-m-d')) . ' ' . ($Period->EndTime ?? '00:00'));
          $TotalDays = $EndDateTime->diffInDays($StartDateTime);
          $TotalHours = $EndDateTime->diffInHours($StartDateTime);
          array_push($TotalDaysArr_MAINTENANCE, $TotalDays); 
          array_push($TotalHoursArr_MAINTENANCE, $TotalHours); 
      }  
      $MonthlyVessel_BREAKDOWN_STATS = \DB::table('vessel_availabilities')->select(['StartDate', 'StartTime', 'EndDate', 'EndTime'])->where('Vessel', $_GET['Vessel'])->where('Status', 'BREAKDOWN')
                                          ->where(function($query) {
                                      $query->whereMonth('EndDate', $_GET['Month'])
                                            ->orWhere(function($query) {
                                                $query->whereMonth('StartDate', $_GET['Month']);
                                            });
                                          })->get();
      $TotalDaysArr_BREAKDOWN = [];
      $TotalHoursArr_BREAKDOWN = [];
      if (count($MonthlyVessel_BREAKDOWN_STATS) == 0) {
          $TotalDaysArr_BREAKDOWN = [0];
      }  
      foreach($MonthlyVessel_BREAKDOWN_STATS as $Period) { 
          $StartDateTime = \Carbon\Carbon::parse(($Period->StartDate ?? date('Y-m-d')) . ' ' . ($Period->StartTime ?? '00:00'));
          $EndDateTime = \Carbon\Carbon::parse(($Period->EndDate ?? date('Y-m-d')) . ' ' . ($Period->EndTime ?? '00:00'));
          $TotalDays = $EndDateTime->diffInDays($StartDateTime);
          $TotalHours = $EndDateTime->diffInHours($StartDateTime);
          array_push($TotalDaysArr_BREAKDOWN, $TotalDays); 
          array_push($TotalHoursArr_BREAKDOWN, $TotalHours); 
      }  
    @endphp 
    @endif
    <ul class="pieID legend">
      <li>
        <em>Docking</em>
        @if (isset($_GET['Chart4']))
        {{-- <span class="DockingCount">{{ isset($_GET['Chart4']) ? count($MonthlyVessel_DOCKING_STATS) : '1000' }}</span> --}}
        <span class="DockingCount"><small>{{ round(\Carbon\CarbonInterval::hours(collect($TotalHoursArr_DOCKING)->sum())->totalDays) }} day(s) : {{ collect($TotalHoursArr_DOCKING)->sum() }} hour(s)</small></span>
        @else
        <span class="DockingCount"></span>
        @endif
      </li>
      <li>
        <em>Bunkering</em>
        @if (isset($_GET['Chart4']))
        {{-- <span class="BunkeringCount">{{ isset($_GET['Chart4']) ? count($MonthlyVessel_BUNKERY_STATS) : '1000' }}</span> --}}
        <span class="BunkeringCount"><small>{{ round(\Carbon\CarbonInterval::hours(collect($TotalHoursArr_BUNKERY)->sum())->totalDays) }} day(s) : {{ collect($TotalHoursArr_BUNKERY)->sum() }} hour(s)</small></span>
        @else
        <span class="BunkeringCount"></span>
        @endif
      </li>
      <li>
        <em>Inspection</em>
        @if (isset($_GET['Chart4']))
        {{-- <span class="InspectionCount">{{ isset($_GET['Chart4']) ? count($MonthlyVessel_INSPECTION_STATS) : '1000' }}</span> --}}
        <span class="InspectionCount"><small>{{ round(\Carbon\CarbonInterval::hours(collect($TotalHoursArr_INSPECTION)->sum())->totalDays) }} day(s) : {{ collect($TotalHoursArr_INSPECTION)->sum() }} hour(s)</small></span>
        @else
        <span class="InspectionCount"></span>
        @endif
      </li>
      <li>
        <em>Maintenance</em>
        @if (isset($_GET['Chart4']))
        {{-- <span class="MaintenanceCount">{{ isset($_GET['Chart4']) ? count($MonthlyVessel_MAINTENANCE_STATS) : '1000' }}</span> --}}
        <span class="MaintenanceCount"><small>{{ round(\Carbon\CarbonInterval::hours(collect($TotalHoursArr_MAINTENANCE)->sum())->totalDays) }} day(s) : {{ collect($TotalHoursArr_MAINTENANCE)->sum() }} hour(s)</small></span>
        @else
        <span class="MaintenanceCount"></span>
        @endif
      </li>
      <li>
        <em>Breakdown</em>
        @if (isset($_GET['Chart4']))
        {{-- <span class="BreakdownCount">{{ isset($_GET['Chart4']) ? count($MonthlyVessel_BREAKDOWN_STATS) : '1000' }}</span> --}}
        <span class="BreakdownCount"><small>{{ round(\Carbon\CarbonInterval::hours(collect($TotalHoursArr_BREAKDOWN)->sum())->totalDays) }} day(s) : {{ collect($TotalHoursArr_BREAKDOWN)->sum() }} hour(s)</small></span>
        @else
        <span class="BreakdownCount"></span>
        @endif
      </li>
    </ul>
    @if (isset($_GET['Chart4']))
    <div class="Comment">In {{  \Carbon\Carbon::create(null, $_GET['Month'], 1)->format('F') }}</div>
    @endif
    <div class="Comment"></div>
    <img class="OpenChart4Filter" src="{{ asset('Images/data-analytics.png') }}" alt="">
    <span class="Hide">{{ isset($_GET['Chart4']) ? $_GET['Vessel'] : '' }}</span>
    <span class="Hide"></span> 
  </div>
</div>