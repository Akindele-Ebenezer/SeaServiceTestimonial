<script> 
    @php
        $Status = $_GET['ChartReportStatus'] ?? 'BREAKDOWN';
        $Year = $_GET['ChartReportYear'] ?? date('Y');
        $Period = $_GET['ChartReportPeriod'] ?? '(*) ALL';
        $Month = $_GET['ChartReportMonth'] ?? 'NULL';
        $ChartType = $_GET['ChartReportChartType'] ?? 'BAR';
    @endphp
    document.querySelector('.chart-report-title').textContent = "{{ $Status == 'IDLE' ? 'READY' : $Status }}";
    const { Chart } = SingleDivUI;

    const options = {
    data: { 
        labels: [
            @foreach($Vessels as $Vessel)
                "{{ substr($Vessel->VesselName, 0, 3) }}", 
            @endforeach 
        ], 
        series: {
        barSize: "80%",
        barColor: [
            @switch($Status)
                @case('DOCKING')
                    '#03AED2, blue'
                    @break
                @case('BREAKDOWN')
                    '#ed5f7d, red'
                    @break 
                @case('INSPECTION')
                    '#ff832b, orange'
                    @break 
                @case('IDLE')
                    '#52f781, lightgreen'
                    @break 
                @case('BUNKERY')
                    '#8a3ffc, purple'
                    @break 
                @case('MAINTENANCE')
                    '#ddd, white'
                    @break  
            @endswitch
        ],
        points: [
                @foreach($Vessels as $Vessel)
                    "{{ count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->get()) }}", 
                @endforeach 
            ],
        responsive: true,
        width: '100%'
        }
    },
    height: 300,
    width: 1000
    };  
    new Chart('#chart2',  {
        type: '{{ strtolower($ChartType) }}',
        ...options
    }); 
</script> 