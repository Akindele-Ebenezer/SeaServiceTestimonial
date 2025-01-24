@php
  $StartDate_ = $_GET['StartDate_ChartREPORT'] ?? date('Y') . '-01-01';
  $EndDate_ = $_GET['EndDate_ChartREPORT'] ?? date('Y-m-d');
  $Year = date("Y", strtotime($StartDate_)) ?? date('Y');   
@endphp
<div class="Chart5" style="display: {{ isset($_GET['ChartReportStatus']) ? 'flex' : '' }}">
    <div class="inner">
        <p class="Close">✖</p>
        <img class="OpenChartFilterButton" src="{{ asset('images/bar-chart.png') }}" alt=""> 
        <h2>ORI MARINE AVAILABILITY — {{ $Year }} Report</h2>
        <h3>From {{ \Carbon\Carbon::createFromFormat('Y-m-d', $StartDate_)->format('F j, Y') }} to {{ \Carbon\Carbon::createFromFormat('Y-m-d', $EndDate_)->format('F j, Y') }}.</h3>
        <br>
        <div> 
          <h1>TUG BOATS</h1>
          <canvas id="barChart"></canvas>
          <h1>PILOT BOATS</h1>
          <canvas id="barChart1"></canvas>
          <h1>DREDGERS/ MULTICAT/ PLOUGHING</h1>
          <canvas id="barChart2"></canvas> 
          <h1>SPEED/ MOORING BOATS</h1>
          <canvas id="barChart3"></canvas> 
          <h1>SURVEY/ OTHER BOATS</h1>
          <canvas id="barChart4"></canvas> 
        </div>
    </div>
  </div>