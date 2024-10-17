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
                    '#03AED2'
                    @break
                @case('BREAKDOWN')
                    '#ed5f7d'
                    @break 
                @case('INSPECTION')
                    '#ff832b'
                    @break 
                @case('IDLE')
                    '#52f781'
                    @break 
                @case('BUNKERY')
                    '#8a3ffc'
                    @break 
                @case('MAINTENANCE')
                    '#ddd'
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
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                "{{ array_sum($TotalDaysArr) }}", 
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
                    '#03AED2'
                    @break
                @case('BREAKDOWN')
                    '#ed5f7d'
                    @break 
                @case('INSPECTION')
                    '#ff832b'
                    @break 
                @case('IDLE')
                    '#52f781'
                    @break 
                @case('BUNKERY')
                    '#8a3ffc'
                    @break 
                @case('MAINTENANCE')
                    '#ddd'
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
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                "{{ array_sum($TotalDaysArr) }}",
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
                    '#03AED2'
                    @break
                @case('BREAKDOWN')
                    '#ed5f7d'
                    @break 
                @case('INSPECTION')
                    '#ff832b'
                    @break 
                @case('IDLE')
                    '#52f781'
                    @break 
                @case('BUNKERY')
                    '#8a3ffc'
                    @break 
                @case('MAINTENANCE')
                    '#ddd'
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
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                "{{ array_sum($TotalDaysArr) }}",
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
    @if (isset($Vessels[0]))
    new Chart('#chart2',  {
        type: '{{ strtolower($ChartType) }}',
        ...options
    }); 
    @endif
    @if (isset($Vessels[1]))
    new Chart('#chart1',  {
        type: '{{ strtolower($ChartType) }}',
        ...options2
    }); 
    @endif
    @if (isset($Vessels[2]))
    new Chart('#chart3',  {
        type: '{{ strtolower($ChartType) }}',
        ...options3
    }); 
    @endif
</script> 