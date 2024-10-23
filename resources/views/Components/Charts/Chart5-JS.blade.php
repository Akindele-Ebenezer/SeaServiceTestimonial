<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
@php 
$Status = $_GET['ChartReportStatus'] ?? 'BREAKDOWN';
$ChartType = $_GET['ChartReportChartType'] ?? 'bar';
$StartDate_ = $_GET['StartDate_ChartREPORT'] ?? date('Y') . '-01-01';
$EndDate_ = $_GET['EndDate_ChartREPORT'] ?? date('Y') . '-12-31';
$Year = date("Y", strtotime($StartDate_)) ?? date('Y');   
$Vessels = \DB::table('vessels_vessel_information')->select('VesselName')->orderBy('VesselType', 'DESC')->get();
$Vessels = collect($Vessels)->chunk(12);    
@endphp
<script> 
@if (isset($Vessels[0]))
  let datasets = [{
      label: 'Breakdown',
      backgroundColor: "#F95454",
      borderColor: "rgba(255,99,132,1)",
      data: [ 
        @php $Status = 'BREAKDOWN' @endphp
            @foreach($Vessels[0] as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ array_sum($TotalDaysArr) }}, 
            @endforeach  
      ],
		}, {
			label: 'Ready',
      backgroundColor: "#86D293",
      borderColor: "rgba(0, 99, 0, 1)", 
      data: [ 
        @php $Status = 'Idle' @endphp
            @foreach($Vessels[0] as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ array_sum($TotalDaysArr) }}, 
            @endforeach  
      ],
		}, {
			label: 'Bunkering',
      backgroundColor: "#9B7EBD",
      borderColor: "rgba(99, 0, 159, 1)", 
      data: [ 
        @php $Status = 'Bunkery' @endphp
            @foreach($Vessels[0] as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ array_sum($TotalDaysArr) }}, 
            @endforeach  
      ],
		}, {
			label: 'Docking',
			backgroundColor: "#77CDFF",
      data: [ 
        @php $Status = 'Docking' @endphp
            @foreach($Vessels[0] as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ array_sum($TotalDaysArr) }}, 
            @endforeach  
      ],
		}, {
			label: 'Maintenance',
      backgroundColor: "#eee",
      borderColor: "#aaa", 
      data: [ 
        @php $Status = 'Maintenance' @endphp
            @foreach($Vessels[0] as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ array_sum($TotalDaysArr) }}, 
            @endforeach  
      ],
		}, {
			label: 'Inspection',
      backgroundColor: "#FFD09B",
      borderColor: "rgba(255, 165, 0, 1)", 
      data: [ 
        @php $Status = 'Inspection' @endphp
            @foreach($Vessels[0] as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ array_sum($TotalDaysArr) }}, 
            @endforeach  
      ],
		}]
  let sums = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
  for (let i = 0; i < sums.length; i++) {
    for (let dataset of datasets) {
        sums[i] += dataset.data[i]; 
      }
    } 
var ctx = document.getElementById("barChart").getContext('2d');
var barChart = new Chart(ctx, {
  type: '{{ $ChartType }}', 
	data: {
        labels: [
            @foreach($Vessels[0] as $Vessel)
                "{{ substr($Vessel->VesselName, 0, 3) }}", 
            @endforeach 
        ],
		datasets: datasets,
	},
options: {
    plugins: {
      datalabels: {
        color: '#000',
        display: function(context) {
          return context.dataset.data[context.dataIndex];
        }
      }
    },  
    tooltips: {
      displayColors: true,
      callbacks:{
        mode: 'x',
        label: function(tooltipItem, data) { 
            const dataset = data.datasets[tooltipItem.datasetIndex];
            const value = dataset.data[tooltipItem.index];
            let Total = sums[tooltipItem.index]; 
            return 'Days: ' + value + ' (' + Math.round(((value/Total) * 100)) + '%)';
        }
      },
    },
    scales: {
      x2: {
        position: 'top',
        labels: sums    
      },
      xAxes: [{
        stacked: true,
        gridLines: {
          display: false,
        }
      }],
      yAxes: [{
        stacked: true,
        ticks: {
          beginAtZero: true,
        },
        type: 'linear',
      }]
    },
		responsive: true,
		// maintainAspectRatio: false,
		// legend: { position: 'bottom' },
	}
}); 
@endif
@if (isset($Vessels[1]))
  let datasets1 = [{
      label: 'Breakdown',
      backgroundColor: "#F95454",
      borderColor: "rgba(255,99,132,1)",
      data: [ 
        @php $Status = 'BREAKDOWN' @endphp
            @foreach($Vessels[1] as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ array_sum($TotalDaysArr) }}, 
            @endforeach  
      ],
		}, {
			label: 'Ready',
      backgroundColor: "#86D293",
      borderColor: "rgba(0, 99, 0, 1)", 
      data: [ 
        @php $Status = 'Idle' @endphp
            @foreach($Vessels[1] as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ array_sum($TotalDaysArr) }}, 
            @endforeach  
      ],
		}, {
			label: 'Bunkering',
      backgroundColor: "#9B7EBD",
      borderColor: "rgba(99, 0, 159, 1)",
      data: [ 
        @php $Status = 'Bunkery' @endphp
            @foreach($Vessels[1] as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ array_sum($TotalDaysArr) }}, 
            @endforeach  
      ],
		}, {
			label: 'Docking',
			backgroundColor: "#77CDFF",
      data: [ 
        @php $Status = 'Docking' @endphp
            @foreach($Vessels[1] as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ array_sum($TotalDaysArr) }}, 
            @endforeach  
      ],
		}, {
			label: 'Maintenance',
			backgroundColor: "#eee",
      borderColor: "#aaa", 
      data: [ 
        @php $Status = 'Maintenance' @endphp
            @foreach($Vessels[1] as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ array_sum($TotalDaysArr) }}, 
            @endforeach  
      ],
		}, {
			label: 'Inspection',
      backgroundColor: "#FFD09B",
      borderColor: "rgba(255, 165, 0, 1)", 
      data: [ 
        @php $Status = 'Inspection' @endphp
            @foreach($Vessels[1] as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ array_sum($TotalDaysArr) }}, 
            @endforeach  
      ],
		}]
  let sums1 = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
  for (let i = 0; i < sums1.length; i++) {
    for (let dataset1 of datasets1) {
        sums1[i] += dataset1.data[i]; 
      }
    } 
var ctx1 = document.getElementById("barChart1").getContext('2d');
var barChart1 = new Chart(ctx1, {
  type: '{{ $ChartType }}', 
	data: {
        labels: [
            @foreach($Vessels[1] as $Vessel)
                "{{ substr($Vessel->VesselName, 0, 3) }}", 
            @endforeach 
        ],
		datasets: datasets1,
	},
options: {
    plugins: {
      datalabels: {
        color: '#000',
        display: function(context) {
          return context.dataset.data[context.dataIndex];
        }
      }
    },  
    tooltips: {
      displayColors: true,
      callbacks:{
        mode: 'x',
        label: function(tooltipItem, data) { 
            const dataset = data.datasets[tooltipItem.datasetIndex];
            const value = dataset.data[tooltipItem.index];
            let Total = sums1[tooltipItem.index]; 
            return 'Days: ' + value + ' (' + Math.round(((value/Total) * 100)) + '%)';
        }
      },
    },
    scales: {
      x2: {
        position: 'top',
        labels: sums1    
      },
      xAxes: [{
        stacked: true,
        gridLines: {
          display: false,
        }
      }],
      yAxes: [{
        stacked: true,
        ticks: {
          beginAtZero: true,
        },
        type: 'linear',
      }]
    },
		responsive: true,
		// maintainAspectRatio: false,
		// legend: { position: 'bottom' },
	}
}); 
@endif
@if (isset($Vessels[2]))
  let datasets2 = [{
      label: 'Breakdown',
      backgroundColor: "#F95454",
      borderColor: "rgba(255,99,132,1)",
      data: [ 
        @php $Status = 'BREAKDOWN' @endphp
            @foreach($Vessels[2] as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ array_sum($TotalDaysArr) }}, 
            @endforeach  
      ],
		}, {
			label: 'Ready',
      backgroundColor: "#86D293",
      borderColor: "rgba(0, 99, 0, 1)", 
      data: [ 
        @php $Status = 'Idle' @endphp
            @foreach($Vessels[2] as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ array_sum($TotalDaysArr) }}, 
            @endforeach  
      ],
		}, {
			label: 'Bunkering',
      backgroundColor: "#9B7EBD",
      borderColor: "rgba(99, 0, 159, 1)",
      data: [ 
        @php $Status = 'Bunkery' @endphp
            @foreach($Vessels[2] as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ array_sum($TotalDaysArr) }}, 
            @endforeach  
      ],
		}, {
			label: 'Docking',
			backgroundColor: "#77CDFF",
      data: [ 
        @php $Status = 'Docking' @endphp
            @foreach($Vessels[2] as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ array_sum($TotalDaysArr) }}, 
            @endforeach  
      ],
		}, {
			label: 'Maintenance',
			backgroundColor: "#eee",
      data: [ 
        @php $Status = 'Maintenance' @endphp
            @foreach($Vessels[2] as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ array_sum($TotalDaysArr) }}, 
            @endforeach  
      ],
		}, {
			label: 'Inspection',
      backgroundColor: "#FFD09B",
      borderColor: "rgba(255, 165, 0, 1)", 
      data: [ 
        @php $Status = 'Inspection' @endphp
            @foreach($Vessels[2] as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ array_sum($TotalDaysArr) }}, 
            @endforeach  
      ],
		}]
  let sums2 = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
  for (let i = 0; i < sums2.length; i++) {
    for (let dataset2 of datasets2) {
        sums2[i] += dataset2.data[i];
      }
    } 
var ctx2 = document.getElementById("barChart2").getContext('2d');
var barChart2 = new Chart(ctx2, {
  type: '{{ $ChartType }}', 
	data: {
        labels: [
            @foreach($Vessels[2] as $Vessel)
                "{{ substr($Vessel->VesselName, 0, 3) }}", 
            @endforeach 
        ],
		datasets: datasets2,
	},
options: {
    plugins: {
      datalabels: {
        color: '#000',
        display: function(context) {
          return context.dataset.data[context.dataIndex];
        }
      }
    },  
    tooltips: {
      displayColors: true,
      callbacks:{
        mode: 'x',
        label: function(tooltipItem, data) { 
            const dataset = data.datasets[tooltipItem.datasetIndex];
            const value = dataset.data[tooltipItem.index];
            let Total = sums2[tooltipItem.index]; 
            return 'Days: ' + value + ' (' + Math.round(((value/Total) * 100)) + '%)';
        }
      },
    },
    scales: {
      x2: {
        position: 'top',
        labels: sums2    
      },
      xAxes: [{
        stacked: true,
        gridLines: {
          display: false,
        }
      }],
      yAxes: [{
        stacked: true,
        ticks: {
          beginAtZero: true,
        },
        type: 'linear',
      }]
    },
		responsive: true,
		// maintainAspectRatio: false,
		// legend: { position: 'bottom' },
	}
}); 
@endif
</script>