<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/7.8.5/d3.min.js"></script>
<div class="form-1 chart-4 {{ (isset($_GET['FilterValue']) || isset($_GET['page']) || isset($_GET['Vessel_FILTER'])) ? 'Hide' : '' }}" style="display: {{ isset($_GET['Chart4']) ? 'flex !important' : '' }}">
  <div class="chart-4-wrapper">
    <h1 class="indicator">
      <span class="status-x"></span>
    </h1>
    <h2>{{ isset($_GET['Chart4']) ? $_GET['Vessel'] : '' }}</h2>
    <p class="Close">✖</p>
    <div class="pieID pie"></div>
    @if (isset($_GET['Chart4']))
      @php
          $MonthlyVessel_DOCKING_STATS = \DB::table('vessel_availabilities')->select('id')->where('Vessel', $_GET['Vessel'])->where('Status', 'DOCKING')->whereMonth('StartDate', $_GET['Month'])->get();
          $MonthlyVessel_BUNKERY_STATS = \DB::table('vessel_availabilities')->select('id')->where('Vessel', $_GET['Vessel'])->where('Status', 'BUNKERY')->whereMonth('StartDate', $_GET['Month'])->get();
          $MonthlyVessel_INSPECTION_STATS = \DB::table('vessel_availabilities')->select('id')->where('Vessel', $_GET['Vessel'])->where('Status', 'INSPECTION')->whereMonth('StartDate', $_GET['Month'])->get();
          $MonthlyVessel_MAINTENANCE_STATS = \DB::table('vessel_availabilities')->select('id')->where('Vessel', $_GET['Vessel'])->where('Status', 'MAINTENANCE')->whereMonth('StartDate', $_GET['Month'])->get();
          $MonthlyVessel_BREAKDOWN_STATS = \DB::table('vessel_availabilities')->select('id')->where('Vessel', $_GET['Vessel'])->where('Status', 'BREAKDOWN')->whereMonth('StartDate', $_GET['Month'])->get();
      @endphp
    @endif
    <ul class="pieID legend">
      <li>
        <em>Docking</em>
        <span class="DockingCount">{{ isset($_GET['Chart4']) ? count($MonthlyVessel_DOCKING_STATS) : 0 }}</span>
      </li>
      <li>
        <em>Bunkering</em>
        <span class="BunkeringCount">{{ isset($_GET['Chart4']) ? count($MonthlyVessel_BUNKERY_STATS) : 0 }}</span>
      </li>
      <li>
        <em>Inspection</em>
        <span class="InspectionCount">{{ isset($_GET['Chart4']) ? count($MonthlyVessel_INSPECTION_STATS) : 0 }}</span>
      </li>
      <li>
        <em>Maintenance</em>
        <span class="MaintenanceCount">{{ isset($_GET['Chart4']) ? count($MonthlyVessel_MAINTENANCE_STATS) : 0 }}</span>
      </li>
      <li>
        <em>Breakdown</em>
        <span class="BreakdownCount">{{ isset($_GET['Chart4']) ? count($MonthlyVessel_BREAKDOWN_STATS) : 0 }}</span>
      </li>
    </ul>
    <div class="Comment"></div>
    <img class="OpenChart4Filter" src="{{ asset('Images/data-analytics.png') }}" alt="">
    <span class="Hide">{{ isset($_GET['Chart4']) ? $_GET['Vessel'] : '' }}</span> 
  </div>
</div>