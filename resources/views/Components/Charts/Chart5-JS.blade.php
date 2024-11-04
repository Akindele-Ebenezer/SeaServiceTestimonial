<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
@php 
$Status = $_GET['ChartReportStatus'] ?? 'BREAKDOWN';
$ChartType = $_GET['ChartReportChartType'] ?? 'bar';
$StartDate_ = $_GET['StartDate_ChartREPORT'] ?? date('Y') . '-01-01';
$EndDate_ = $_GET['EndDate_ChartREPORT'] ?? date('Y') . '-12-31';
$Year = date("Y", strtotime($StartDate_)) ?? date('Y');    
$Vessels_TUGS = \DB::table('vessels_vessel_information')->select('VesselName')->where('VesselType', 'TUG BOAT')->orderByRaw("FIELD(VesselName, 'MAJIYA', 'UBIMA', 'UROMI', 'ZARANDA', 'ASAGA', 'EMEKUKU', 'GUSAU', 'DAURA')")->get();   
$Vessels_PILOTS = \DB::table('vessels_vessel_information')->select('VesselName')->where('VesselType', 'PILOT CUTTERS')->orderByRaw("FIELD(VesselName, 'P.C KOKO', 'P.C TOMBIA', 'LAGOS 1', 'LAGOS 2')")->get();   
$Vessels_DREDGERS_MULTICAT_PLOUGHING = \DB::table('vessels_vessel_information')->select('VesselName')->whereIn('VesselType', ['DREDGER', 'MULTICAT', 'PLOUGHING'])->orderByRaw("FIELD(VesselName, 'S.D GUMEL', 'RIVER CHALAWA', 'TIGADAM', 'ANTELOPE', 'BLUE LATITUDE')")->get();   
$Vessels_SPEED_MOORING_BOATS = \DB::table('vessels_vessel_information')->select('VesselName')->whereIn('VesselType', ['SPEED BOAT', 'MOORING'])->orderByRaw("FIELD(VesselName, 'SEA FOX', 'SEA TIME', 'DONZI', 'HORIZON II', 'JOY BOAT', 'HADIZA', 'FARIDA', 'KASHERE', 'AMASIRI', 'MOORING 1', 'MOORING 2')")->get();   

@endphp
<script> 
@if (isset($Vessels_TUGS))  
  let datasets = [{
      label: 'Breakdown',
      backgroundColor: "#F95454",
      borderColor: "rgba(255,99,132,1)",
      data: [ 
        @php $Status = 'BREAKDOWN' @endphp
            @foreach($Vessels_TUGS as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ ceil(array_sum($TotalMinutesArr) / 1000) * 1000 }}, 
            @endforeach  
      ],
		}, {
			label: 'Ready',
      backgroundColor: "#86D293",
      borderColor: "rgba(0, 99, 0, 1)", 
      data: [ 
        @php $Status = 'Idle' @endphp
            @foreach($Vessels_TUGS as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ ceil(array_sum($TotalMinutesArr) / 1000) * 1000 }}, 
            @endforeach  
      ],
		}, {
			label: 'Bunkering',
      backgroundColor: "#9B7EBD",
      borderColor: "rgba(99, 0, 159, 1)", 
      data: [ 
        @php $Status = 'Bunkery' @endphp
            @foreach($Vessels_TUGS as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ ceil(array_sum($TotalMinutesArr) / 1000) * 1000 }}, 
            @endforeach  
      ],
		}, {
			label: 'Docking',
			backgroundColor: "#77CDFF",
      data: [ 
        @php $Status = 'Docking' @endphp
            @foreach($Vessels_TUGS as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ ceil(array_sum($TotalMinutesArr) / 1000) * 1000 }}, 
            @endforeach  
      ],
		}, {
			label: 'Maintenance',
      backgroundColor: "#eee",
      borderColor: "#aaa", 
      data: [ 
        @php $Status = 'Maintenance' @endphp
            @foreach($Vessels_TUGS as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ ceil(array_sum($TotalMinutesArr) / 1000) * 1000 }}, 
            @endforeach  
      ],
		}, {
			label: 'Inspection',
      backgroundColor: "#FFD09B",
      borderColor: "rgba(255, 165, 0, 1)", 
      data: [ 
        @php $Status = 'Inspection' @endphp
            @foreach($Vessels_TUGS as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ ceil(array_sum($TotalMinutesArr) / 1000) * 1000 }}, 
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
            @foreach($Vessels_TUGS as $Vessel)
                "{{ $Vessel->VesselName }}", 
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
        title: function(tooltipItem, data) {
          // console.log(data.datasets[tooltipItem[0].datasetIndex].label)
          return tooltipItem[0].xLabel + ': (' + data.datasets[tooltipItem[0].datasetIndex].label + ')';
        },
        label: function(tooltipItem, data) { 
            const dataset = data.datasets[tooltipItem.datasetIndex];
            const value = dataset.data[tooltipItem.index];
            let Total = sums[tooltipItem.index];  
            if (value < 60) {
              return 'Minute(s): ' + value + ' (' + ((value/Total) * 100).toFixed(2) + '%)';
            } else if ((value > 60) && (value < 1440)) {
              return 'Hour(s): ' + Math.round(value / 60) + ' (' + ((value/Total) * 100).toFixed(2) + '%)';
            } else if (value > 1440) {
              return 'Day(s): ' + Math.round((value / 1440)) + ' (' + Math.round(((value/Total) * 100)) + '%)';
            }
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
          callback: function(value) {
              return Math.round(value / 1440); 
          }
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
@if (isset($Vessels_PILOTS))
  let datasets1 = [{
      label: 'Breakdown',
      backgroundColor: "#F95454",
      borderColor: "rgba(255,99,132,1)",
      data: [ 
        @php $Status = 'BREAKDOWN' @endphp
            @foreach($Vessels_PILOTS as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ ceil(array_sum($TotalMinutesArr) / 1000) * 1000 }}, 
            @endforeach  
      ],
		}, {
			label: 'Ready',
      backgroundColor: "#86D293",
      borderColor: "rgba(0, 99, 0, 1)", 
      data: [ 
        @php $Status = 'Idle' @endphp
            @foreach($Vessels_PILOTS as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ ceil(array_sum($TotalMinutesArr) / 1000) * 1000 }}, 
            @endforeach  
      ],
		}, {
			label: 'Bunkering',
      backgroundColor: "#9B7EBD",
      borderColor: "rgba(99, 0, 159, 1)",
      data: [ 
        @php $Status = 'Bunkery' @endphp
            @foreach($Vessels_PILOTS as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ ceil(array_sum($TotalMinutesArr) / 1000) * 1000 }}, 
            @endforeach  
      ],
		}, {
			label: 'Docking',
			backgroundColor: "#77CDFF",
      data: [ 
        @php $Status = 'Docking' @endphp
            @foreach($Vessels_PILOTS as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ ceil(array_sum($TotalMinutesArr) / 1000) * 1000 }}, 
            @endforeach  
      ],
		}, {
			label: 'Maintenance',
			backgroundColor: "#eee",
      borderColor: "#aaa", 
      data: [ 
        @php $Status = 'Maintenance' @endphp
            @foreach($Vessels_PILOTS as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ ceil(array_sum($TotalMinutesArr) / 1000) * 1000 }}, 
            @endforeach  
      ],
		}, {
			label: 'Inspection',
      backgroundColor: "#FFD09B",
      borderColor: "rgba(255, 165, 0, 1)", 
      data: [ 
        @php $Status = 'Inspection' @endphp
            @foreach($Vessels_PILOTS as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ ceil(array_sum($TotalMinutesArr) / 1000) * 1000 }}, 
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
            @foreach($Vessels_PILOTS as $Vessel)
                "{{ $Vessel->VesselName }}", 
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
        title: function(tooltipItem, data) {
          // console.log(data.datasets[tooltipItem[0].datasetIndex].label)
          return tooltipItem[0].xLabel + ': (' + data.datasets[tooltipItem[0].datasetIndex].label + ')';
        },
        label: function(tooltipItem, data) { 
            const dataset = data.datasets[tooltipItem.datasetIndex];
            const value = dataset.data[tooltipItem.index];
            let Total = sums1[tooltipItem.index]; 
            if (value < 60) {
              return 'Minute(s): ' + value + ' (' + ((value/Total) * 100).toFixed(2) + '%)';
            } else if ((value > 60) && (value < 1440)) {
              return 'Hour(s): ' + Math.round(value / 60) + ' (' + ((value/Total) * 100).toFixed(2) + '%)';
            } else if (value > 1440) {
              return 'Day(s): ' + Math.round((value / 1440)) + ' (' + Math.round(((value/Total) * 100)) + '%)';
            }
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
          callback: function(value) {
              return Math.round(value / 1440); 
          }
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
@if (isset($Vessels_DREDGERS_MULTICAT_PLOUGHING))
  let datasets2 = [{
      label: 'Breakdown',
      backgroundColor: "#F95454",
      borderColor: "rgba(255,99,132,1)",
      data: [ 
        @php $Status = 'BREAKDOWN' @endphp
            @foreach($Vessels_DREDGERS_MULTICAT_PLOUGHING as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ ceil(array_sum($TotalMinutesArr) / 1000) * 1000 }}, 
            @endforeach  
      ],
		}, {
			label: 'Ready',
      backgroundColor: "#86D293",
      borderColor: "rgba(0, 99, 0, 1)", 
      data: [ 
        @php $Status = 'Idle' @endphp
            @foreach($Vessels_DREDGERS_MULTICAT_PLOUGHING as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ ceil(array_sum($TotalMinutesArr) / 1000) * 1000 }}, 
            @endforeach  
      ],
		}, {
			label: 'Bunkering',
      backgroundColor: "#9B7EBD",
      borderColor: "rgba(99, 0, 159, 1)",
      data: [ 
        @php $Status = 'Bunkery' @endphp
            @foreach($Vessels_DREDGERS_MULTICAT_PLOUGHING as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ ceil(array_sum($TotalMinutesArr) / 1000) * 1000 }}, 
            @endforeach  
      ],
		}, {
			label: 'Docking',
			backgroundColor: "#77CDFF",
      data: [ 
        @php $Status = 'Docking' @endphp
            @foreach($Vessels_DREDGERS_MULTICAT_PLOUGHING as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ ceil(array_sum($TotalMinutesArr) / 1000) * 1000 }}, 
            @endforeach  
      ],
		}, {
			label: 'Maintenance',
			backgroundColor: "#eee",
      data: [ 
        @php $Status = 'Maintenance' @endphp
            @foreach($Vessels_DREDGERS_MULTICAT_PLOUGHING as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ ceil(array_sum($TotalMinutesArr) / 1000) * 1000 }}, 
            @endforeach  
      ],
		}, {
			label: 'Inspection',
      backgroundColor: "#FFD09B",
      borderColor: "rgba(255, 165, 0, 1)", 
      data: [ 
        @php $Status = 'Inspection' @endphp
            @foreach($Vessels_DREDGERS_MULTICAT_PLOUGHING as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ ceil(array_sum($TotalMinutesArr) / 1000) * 1000 }}, 
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
            @foreach($Vessels_DREDGERS_MULTICAT_PLOUGHING as $Vessel)
                "{{ $Vessel->VesselName }}", 
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
        title: function(tooltipItem, data) {
          // console.log(data.datasets[tooltipItem[0].datasetIndex].label)
          return tooltipItem[0].xLabel + ': (' + data.datasets[tooltipItem[0].datasetIndex].label + ')';
        },
        label: function(tooltipItem, data) { 
            const dataset = data.datasets[tooltipItem.datasetIndex];
            const value = dataset.data[tooltipItem.index];
            let Total = sums2[tooltipItem.index]; 
            if (value < 60) {
              return 'Minute(s): ' + value + ' (' + ((value/Total) * 100).toFixed(2) + '%)';
            } else if ((value > 60) && (value < 1440)) {
              return 'Hour(s): ' + Math.round(value / 60) + ' (' + ((value/Total) * 100).toFixed(2) + '%)';
            } else if (value > 1440) {
              return 'Day(s): ' + Math.round((value / 1440)) + ' (' + Math.round(((value/Total) * 100)) + '%)';
            }
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
          callback: function(value) {
              return Math.round(value / 1440); 
          }
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
@if (isset($Vessels_SPEED_MOORING_BOATS))
  let datasets3 = [{
      label: 'Breakdown',
      backgroundColor: "#F95454",
      borderColor: "rgba(255,99,132,1)",
      data: [ 
        @php $Status = 'BREAKDOWN' @endphp
            @foreach($Vessels_SPEED_MOORING_BOATS as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ ceil(array_sum($TotalMinutesArr) / 1000) * 1000 }}, 
            @endforeach  
      ],
		}, {
			label: 'Ready',
      backgroundColor: "#86D293",
      borderColor: "rgba(0, 99, 0, 1)", 
      data: [ 
        @php $Status = 'Idle' @endphp
            @foreach($Vessels_SPEED_MOORING_BOATS as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ ceil(array_sum($TotalMinutesArr) / 1000) * 1000 }}, 
            @endforeach  
      ],
		}, {
			label: 'Bunkering',
      backgroundColor: "#9B7EBD",
      borderColor: "rgba(99, 0, 159, 1)",
      data: [ 
        @php $Status = 'Bunkery' @endphp
            @foreach($Vessels_SPEED_MOORING_BOATS as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ ceil(array_sum($TotalMinutesArr) / 1000) * 1000 }}, 
            @endforeach  
      ],
		}, {
			label: 'Docking',
			backgroundColor: "#77CDFF",
      data: [ 
        @php $Status = 'Docking' @endphp
            @foreach($Vessels_SPEED_MOORING_BOATS as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ ceil(array_sum($TotalMinutesArr) / 1000) * 1000 }}, 
            @endforeach  
      ],
		}, {
			label: 'Maintenance',
			backgroundColor: "#eee",
      data: [ 
        @php $Status = 'Maintenance' @endphp
            @foreach($Vessels_SPEED_MOORING_BOATS as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ ceil(array_sum($TotalMinutesArr) / 1000) * 1000 }}, 
            @endforeach  
      ],
		}, {
			label: 'Inspection',
      backgroundColor: "#FFD09B",
      borderColor: "rgba(255, 165, 0, 1)", 
      data: [ 
        @php $Status = 'Inspection' @endphp
            @foreach($Vessels_SPEED_MOORING_BOATS as $Vessel)
                @php include('../resources/views/Components/Includes/PeriodicData_NumberOfDaysWorkedForEachVessel.php'); @endphp
                {{ ceil(array_sum($TotalMinutesArr) / 1000) * 1000 }}, 
            @endforeach  
      ],
		}]
  let sums3 = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
  for (let i = 0; i < sums3.length; i++) {
    for (let dataset3 of datasets3) {
        sums3[i] += dataset3.data[i];
      }
    } 
var ctx3 = document.getElementById("barChart3").getContext('2d');
var barChart3 = new Chart(ctx3, {
  type: '{{ $ChartType }}', 
	data: {
        labels: [
            @foreach($Vessels_SPEED_MOORING_BOATS as $Vessel)
                "{{ $Vessel->VesselName }}", 
            @endforeach 
        ],
		datasets: datasets3,
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
        title: function(tooltipItem, data) {
          // console.log(data.datasets[tooltipItem[0].datasetIndex].label)
          return tooltipItem[0].xLabel + ': (' + data.datasets[tooltipItem[0].datasetIndex].label + ')';
        },
        label: function(tooltipItem, data) { 
            const dataset = data.datasets[tooltipItem.datasetIndex];
            const value = dataset.data[tooltipItem.index];
            let Total = sums3[tooltipItem.index]; 
            if (value < 60) {
              return 'Minute(s): ' + value + ' (' + ((value/Total) * 100).toFixed(2) + '%)';
            } else if ((value > 60) && (value < 1440)) {
              return 'Hour(s): ' + Math.round(value / 60) + ' (' + ((value/Total) * 100).toFixed(2) + '%)';
            } else if (value > 1440) {
              return 'Day(s): ' + Math.round((value / 1440)) + ' (' + Math.round(((value/Total) * 100)) + '%)';
            }
        }
      },
    },
    scales: {
      x2: {
        position: 'top',
        labels: sums3    
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
          callback: function(value) {
              return Math.round(value / 1440); 
          }
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