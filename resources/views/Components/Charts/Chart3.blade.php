<link href="https://unpkg.com/singledivui/dist/singledivui.min.css" rel="stylesheet" />
<script src="https://unpkg.com/singledivui/dist/singledivui.min.js"></script>
@php   
    $Status = $_GET['ChartReportStatus'] ?? 'BREAKDOWN';
    $Year = $_GET['ChartReportYear'] ?? date('Y');
    $StartDate_ = $_GET['StartDate_ChartREPORT'] ?? date('Y') . '-01-01';
    $EndDate_ = $_GET['EndDate_ChartREPORT'] ?? date('Y') . '-12-31';
@endphp
<div class="form-1 chart-3" style="visibility: {{ isset($_GET['ChartReportStatus']) ? 'visible' : 'hidden' }}">
    <div class="row">
        <p class="Close">✖</p>
        <img class="OpenChartFilterButton" src="{{ asset('images/bar-chart.png') }}" alt=""> 
        <h1><span class="chart-report-title"></span> <span class="chart-report-year"></span></h1> &nbsp; - &nbsp; <span class="chart-report-period"></span> &nbsp; :: &nbsp; <span class="chart-report-percentage"></span> 
        @php 
            $Vessels = collect($Vessels)->chunk(12); 
        @endphp
        @if (isset($Vessels[0]))
        <div class="cell">
            <span class="days">Days</span>
            @foreach ($Vessels[0] as $Vessel)
            @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
            <span class="percents"> 
                {{ array_sum($TotalDaysArr) }}
            %</span>  
            <span class="status-percentage Hide">{{ $PeriodicPercentageOfVesselAvailability }} %</span>
            <span class="Hide">{{ array_sum($TotalDaysArr) }}</span>
            <span class="Hide">{{ array_sum($TotalDays_PeriodArr) }}</span>
            @endforeach  
            <div id="chart2"></div>
        </div>
        @endif  
        @if (isset($Vessels[1]))
        <div class="cell">
            <span class="days">Days</span>
            @foreach ($Vessels[1] as $Vessel)
            @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
            <span class="percents"> 
                {{ array_sum($TotalDaysArr); }}
            %</span>  
            <span class="status-percentage Hide">{{ $PeriodicPercentageOfVesselAvailability }} %</span>
            <span class="Hide">{{ array_sum($TotalDaysArr); }}</span>
            @endforeach
            <div id="chart1"></div>
        </div>
        @endif
        @if (isset($Vessels[2]))
        <div class="cell"> 
            <span class="days">Days</span>
            @foreach ($Vessels[2] ?? $Vessels[0] as $Vessel)
            @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
            <span class="percents"> 
                {{ array_sum($TotalDaysArr); }}
            %</span>  
            <span class="status-percentage Hide">{{ $PeriodicPercentageOfVesselAvailability }} %</span>
            <span class="Hide">{{ array_sum($TotalDaysArr); }}</span>
            @endforeach
            <div id="chart3"></div>
        </div>
        @endif
    </div>
</div>