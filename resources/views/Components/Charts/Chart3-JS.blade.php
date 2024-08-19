<script> 
    @php  
        $Status = $_GET['ChartReportStatus'] ?? 'BREAKDOWN';
        $ChartType = $_GET['ChartReportChartType'] ?? 'BAR';
        $StartDate_ = $_GET['StartDate_ChartREPORT'] ?? date('Y') . '-01-01';
        $EndDate_ = $_GET['EndDate_ChartREPORT'] ?? date('Y') . '-12-31';
        $Year = date("Y", strtotime($StartDate_)) ?? date('Y');   
    @endphp
    document.querySelector('.chart-report-title').textContent = "{{ $Status == 'IDLE' ? 'READY' : $Status }}";
    document.querySelector('.chart-report-year').textContent = "{{ $Year }}";
    document.querySelector('.chart-report-period').textContent = "({{ $StartDate_ }}) to ({{ $EndDate_ }})"; 
    let ChartReportPercentages = document.querySelectorAll('.chart-3 .row .cell .percents');
    let PercentagesArr = [];
    let PercentagesArr2 = [];
    ChartReportPercentages.forEach(Percentage => {
        PercentagesArr.push((parseFloat(Percentage.textContent.replace("%", "").trim())));
        PercentagesArr2.push((parseFloat(Percentage.textContent.replace("%", "").trim())));
    });  
    let OverallDays = Math.ceil(PercentagesArr2.reduce((total, current) => total + current, 0));
    ChartReportPercentages.forEach(Percentage => {  
        Percentage.textContent = parseFloat(Percentage.textContent.replace("%", "").trim()) + ' (' + Percentage.nextElementSibling.textContent  + ')';
    });  
    document.querySelector('.chart-report-percentage').textContent = Math.ceil(PercentagesArr.reduce((total, current) => total + current, 0)) > 100 ? 100 + ' %' : Math.ceil(PercentagesArr.reduce((total, current) => total + current, 0)) + ' %'; 
    const { Chart } = SingleDivUI;

    @php 
        $Vessels = collect($Vessels)->chunk(12);   
    @endphp
    @if (isset($Vessels[0]))
    @php  
        $Vessel_ = $Vessels[0];  
    @endphp
    const options = {
    data: { 
        labels: [
            @foreach($Vessel_ as $Vessel)
                "{{ $Vessel->VesselName }}", 
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
            lineSize: 1,
            lineColor: "#00a899",
            pointColor: "inherit",
            pointRadius: 10,
            pointStyle: "circle-dot",
            pointInnerColor: "white",
        points: [ 
            @foreach($Vessel_ as $Vessel)
                @php  
                    $Period_Start = \DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->where('StartDate', '>=', $StartDate_)->where('StartDate', '<=', $EndDate_)->orderBy('StartDate', 'ASC')->first();  
                    if ((empty($Period_Start)) || ($StartDate_ > ($Period_Start->StartDate ?? 'null'))) {
                        $Period_Start = \DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->where('StartDate', '<=', $StartDate_)->where('EndDate', '>=', $StartDate_)->orderBy('StartDate', 'DESC')->first(); 
                    }
                    $Period_End = \DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->where('EndDate', '>=', $StartDate_)->where('EndDate', '<=', $EndDate_)->orderBy('EndDate', 'DESC')->first(); 
                    $StartDateTime = \Carbon\Carbon::parse(($Period_Start->StartDate ?? date('Y-m-d')) . ' ' . ($Period_Start->StartTime ?? '00:00'));
                    $EndDateTime = \Carbon\Carbon::parse(($Period_End->EndDate ?? date('Y-m-d')) . ' ' . ($Period_End->EndTime ?? '00:00'));
                    if (empty($Period_Start) || empty($Period_End)) {
                        $TotalDays = 0;
                    } else if($Period_Start->StartDate == $Period_End->EndDate) {
                        $TotalDays = 1;
                    } else {
                        $TotalDays = $EndDateTime->diffInDays($StartDateTime); 
                    } 
                @endphp
                "{{ $TotalDays }}", 
            @endforeach  
        ],
        responsive: true,
        width: '100%'
        }
    },
    graphSettings: {
        labelDistance: 15,
        xAxis: {
            labelFontSize: 8,
            labelFormatter: function(e) {
                return e.toUpperCase()
            }
        },
        yAxis: {
            startFromZero: true,
            // gridLineSize: 0,
            axisLineSize: 0,
            labelFormatter: function(e) {
                return Math.ceil(e * 10) / 10
            }
        }
    },
    height: 300,
    width: 1000,
    };   
    @endif 
    @if (isset($Vessels[1]))
    @php $Vessel_ = $Vessels[1];  @endphp
    
    const options2 = {
    data: { 
        labels: [
            @foreach($Vessels[1] as $Vessel)
                "{{ $Vessel->VesselName }}", 
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
            lineSize: 1,
            lineColor: "#00a899",
            pointColor: "inherit",
            pointRadius: 10,
            pointStyle: "circle-dot",
            pointInnerColor: "white",
        points: [
            @foreach($Vessels[1] as $Vessel)
                @php  
                    $Period_Start = \DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->where('StartDate', '>=', $StartDate_)->where('StartDate', '<=', $EndDate_)->orderBy('StartDate', 'DESC')->first();  
                    if ((empty($Period_Start)) || ($StartDate_ > ($Period_Start->StartDate ?? 'null'))) {
                        $Period_Start = \DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->where('StartDate', '<=', $StartDate_)->where('EndDate', '>=', $StartDate_)->orderBy('StartDate', 'DESC')->first(); 
                    }
                    $Period_End = \DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->where('EndDate', '>=', $StartDate_)->where('EndDate', '<=', $EndDate_)->orderBy('EndDate', 'DESC')->first(); 
                    $StartDateTime = \Carbon\Carbon::parse(($Period_Start->StartDate ?? date('Y-m-d')) . ' ' . ($Period_Start->StartTime ?? '00:00'));
                    $EndDateTime = \Carbon\Carbon::parse(($Period_End->EndDate ?? date('Y-m-d')) . ' ' . ($Period_End->EndTime ?? '00:00'));
                    if (empty($Period_Start) || empty($Period_End)) {
                        $TotalDays = 0;
                    } else if($Period_Start->StartDate == $Period_End->EndDate) {
                        $TotalDays = 1;
                    } else {
                        $TotalDays = $EndDateTime->diffInDays($StartDateTime); 
                    } 
                @endphp
                "{{ $TotalDays }}", 
            @endforeach 
        ],
        responsive: true,
        width: '100%'
        }
    },
    graphSettings: {
        labelDistance: 15,
        xAxis: {
            labelFontSize: 8,
            labelFormatter: function(e) {
                return e.toUpperCase()
            }
        },
        yAxis: {
            startFromZero: true,
            // gridLineSize: 0,
            axisLineSize: 0,
            labelFormatter: function(e) {
                return Math.ceil(e * 10) / 10
            }
        }
    },
    height: 300,
    width: 1000
    };  
    @endif
    @if (isset($Vessels[2]))
    @php $Vessel_ = $Vessels[2];  @endphp
    const options3 = {
    data: { 
        labels: [
            @foreach($Vessels[2] as $Vessel)
                "{{ $Vessel->VesselName }}", 
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
            lineSize: 1,
            lineColor: "#00a899",
            pointColor: "inherit",
            pointRadius: 10,
            pointStyle: "circle-dot",
            pointInnerColor: "white",
        points: [
            @foreach($Vessels[2] as $Vessel)
                @php  
                    $Period_Start = \DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->where('StartDate', '>=', $StartDate_)->where('StartDate', '<=', $EndDate_)->orderBy('StartDate', 'DESC')->first();  
                    if ((empty($Period_Start)) || ($StartDate_ > ($Period_Start->StartDate ?? 'null'))) {
                        $Period_Start = \DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->where('StartDate', '<=', $StartDate_)->where('EndDate', '>=', $StartDate_)->orderBy('StartDate', 'DESC')->first(); 
                    }
                    $Period_End = \DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->where('EndDate', '>=', $StartDate_)->where('EndDate', '<=', $EndDate_)->orderBy('EndDate', 'DESC')->first(); 
                    $StartDateTime = \Carbon\Carbon::parse(($Period_Start->StartDate ?? date('Y-m-d')) . ' ' . ($Period_Start->StartTime ?? '00:00'));
                    $EndDateTime = \Carbon\Carbon::parse(($Period_End->EndDate ?? date('Y-m-d')) . ' ' . ($Period_End->EndTime ?? '00:00'));
                    if (empty($Period_Start) || empty($Period_End)) {
                        $TotalDays = 0;
                    } else if($Period_Start->StartDate == $Period_End->EndDate) {
                        $TotalDays = 1;
                    } else {
                        $TotalDays = $EndDateTime->diffInDays($StartDateTime); 
                    } 
                @endphp
                "{{ $TotalDays }}", 
            @endforeach 
        ],
        responsive: true,
        width: '100%'
        }
    },
    graphSettings: {
        labelDistance: 15,
        xAxis: {
            labelFontSize: 8,
            labelFormatter: function(e) {
                return e.toUpperCase()
            }
        },
        yAxis: {
            startFromZero: true,
            // gridLineSize: 0,
            axisLineSize: 0,
            labelFormatter: function(e) {
                return Math.ceil(e * 10) / 10
            }
        }
    },
    height: 300,
    width: 1000
    };  
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