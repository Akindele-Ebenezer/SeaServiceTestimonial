<script> 
    @php
        $FirstQuarterStart = date('Y-m-d', strtotime('first day of January'));
        $FirstQuarterEnd = date('Y-m-d', strtotime('last day of March'));
        $SecondQuarterStart = date('Y-m-d', strtotime('first day of April'));
        $SecondQuarterEnd = date('Y-m-d', strtotime('last day of June'));
        $ThirdQuarterStart = date('Y-m-d', strtotime('first day of July'));
        $ThirdQuarterEnd = date('Y-m-d', strtotime('last day of September'));
        $FourthQuarterStart = date('Y-m-d', strtotime('first day of October'));
        $FourthQuarterEnd = date('Y-m-d', strtotime('last day of December'));

        $Status = $_GET['ChartReportStatus'] ?? 'BREAKDOWN';
        $Year = $_GET['ChartReportYear'] ?? date('Y');
        $Period = $_GET['ChartReportPeriod'] ?? '(*) ALL';
        $Month = $_GET['ChartReportMonth'] ?? 'NULL';
        $ChartType = $_GET['ChartReportChartType'] ?? 'BAR';
    @endphp
    document.querySelector('.chart-report-title').textContent = "{{ $Status == 'IDLE' ? 'READY' : $Status }}";
    document.querySelector('.chart-report-year').textContent = "{{ $Year }}";
    document.querySelector('.chart-report-period').textContent = "{{ $Period }}"; 
    let ChartReportPercentages = document.querySelectorAll('.chart-3 .row .cell .percents');
    let PercentagesArr = [];
    ChartReportPercentages.forEach(Percentage => {
        PercentagesArr.push((parseFloat(Percentage.textContent.replace("%", "").trim())));
    });  
    document.querySelector('.chart-report-percentage').textContent = Math.ceil(PercentagesArr.reduce((total, current) => total + current, 0)) > 100 ? 100 + ' %' : Math.ceil(PercentagesArr.reduce((total, current) => total + current, 0)) + ' %'; 
    const { Chart } = SingleDivUI;

    @php $Vessels = collect($Vessels)->chunk(12); @endphp
    const options = {
    data: { 
        labels: [
            @foreach($Vessels[0] as $Vessel)
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
            @foreach($Vessels->first() as $Vessel)
                @switch($Period)
                    @case('1ST QUARTER')
                        "{{ count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$FirstQuarterStart, $FirstQuarterEnd])->get()) }}",
                        @break 
                    @case('2ND QUARTER')
                        "{{ count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$SecondQuarterStart, $SecondQuarterEnd])->get()) }}",
                        @break  
                    @case('3RD QUARTER')
                        "{{ count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$ThirdQuarterStart, $ThirdQuarterEnd])->get()) }}",
                        @break  
                    @case('4TH QUARTER')
                        "{{ count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$FourthQuarterStart, $FourthQuarterEnd])->get()) }}",
                        @break 
                    @case('1/2')
                        "{{ count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$FirstQuarterStart, $FirstQuarterEnd])->whereBetween('EndDate', [$SecondQuarterStart, $SecondQuarterEnd])->get()) }}",
                        @break
                    @case('1/3')
                        "{{ count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$FirstQuarterStart, $FirstQuarterEnd])->whereBetween('EndDate', [$ThirdQuarterStart, $ThirdQuarterEnd])->get()) }}",
                        @break   
                    @case('1/4')
                        "{{ count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$FirstQuarterStart, $FirstQuarterEnd])->whereBetween('EndDate', [$FourthQuarterStart, $FourthQuarterEnd])->get()) }}",
                        @break   
                    @case('2/3')
                        "{{ count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$SecondQuarterStart, $SecondQuarterEnd])->whereBetween('EndDate', [$ThirdQuarterStart, $ThirdQuarterEnd])->get()) }}",
                        @break   
                    @case('2/4')
                        "{{ count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$SecondQuarterStart, $SecondQuarterEnd])->whereBetween('EndDate', [$FourthQuarterStart, $FourthQuarterEnd])->get()) }}",
                        @break   
                    @case('3/4')
                        "{{ count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$ThirdQuarterStart, $ThirdQuarterEnd])->whereBetween('EndDate', [$FourthQuarterStart, $FourthQuarterEnd])->get()) }}",
                        @break      
                    @default
                        "{{ count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->get()) }}", 
                @endswitch
            @endforeach 
        ],
        responsive: true,
        width: '100%'
        }
    },
    height: 300,
    width: 1000
    };  
    @if (isset($Vessels[2]))
    const options2 = {
        data: {
            ...options.data,
            labels: [
                @foreach($Vessels[1] as $Vessel)
                    "{{ substr($Vessel->VesselName, 0, 3) }}", 
                @endforeach 
            ], 
        }
    }
    @endif
    @if (isset($Vessels[2]))
    const options3 = {
        data: {
            ...options.data,
            labels: [
                @foreach($Vessels[2] as $Vessel)
                    "{{ substr($Vessel->VesselName, 0, 3) }}", 
                @endforeach 
            ], 
        }
    }
    @endif
    new Chart('#chart2',  {
        type: '{{ strtolower($ChartType) }}',
        ...options
    }); 
    new Chart('#chart1',  {
        type: '{{ strtolower($ChartType) }}',
        ...options2
    }); 
    new Chart('#chart3',  {
        type: '{{ strtolower($ChartType) }}',
        ...options3
    }); 
</script> 