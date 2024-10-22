@php
  $StartDate_ = $_GET['StartDate_ChartREPORT'] ?? date('Y') . '-01-01';
  $EndDate_ = $_GET['EndDate_ChartREPORT'] ?? date('Y') . '-12-31';
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
          <canvas id="barChart"></canvas>
          <canvas id="barChart1"></canvas>
          <canvas id="barChart2"></canvas> 
        </div>
    </div>
  </div>