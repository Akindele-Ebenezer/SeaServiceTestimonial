<link href="https://unpkg.com/singledivui/dist/singledivui.min.css" rel="stylesheet" />
<script src="https://unpkg.com/singledivui/dist/singledivui.min.js"></script>

<div class="form-1 chart-3">
    <div class="row">
        <p class="Close">✖</p>
        <img class="OpenChartFilterButton" src="{{ asset('images/bar-chart.png') }}" alt=""> 
        <h1><span class="chart-report-title"></span> <span class="chart-report-year">2024</span></h1> &nbsp; - &nbsp; <span class="chart-report-period">1ST QUARTER</span> 
        <div class="cell">
            @foreach ($Vessels as $Vessel)
            <span>{{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', 'BREAKDOWN')->get()) / count(\DB::table('vessel_availabilities')->where('Status', 'BREAKDOWN')->get())) * 100) }} %</span>
            @endforeach
            <div id="chart2"></div>
        </div>
        <div class="cell Hide">
            <h2>Line Chart</h2>
            <div id="chart1"></div>
        </div>
        <div class="cell Hide">
            <h2>Area Chart</h2>
            <div id="chart3"></div>
        </div>
    </div>
</div>