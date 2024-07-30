<link href="https://unpkg.com/singledivui/dist/singledivui.min.css" rel="stylesheet" />
<script src="https://unpkg.com/singledivui/dist/singledivui.min.js"></script>

<div class="form-1 chart-3">
    <h1>SingleDivUI</h1>
    <div class="row">
        <div class="cell">
            @foreach ($Vessels as $Vessel)
            <span>{{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', 'BREAKDOWN')->get()) / count(\DB::table('vessel_availabilities')->where('Status', 'BREAKDOWN')->get())) * 100) }} %</span>
            @endforeach
            <div id="chart2"></div>
        </div>
        <div class="cell">
            <h2>Line Chart</h2>
            <div id="chart1"></div>
        </div>
        <div class="cell">
            <h2>Area Chart</h2>
            <div id="chart3"></div>
        </div>
    </div>
</div>