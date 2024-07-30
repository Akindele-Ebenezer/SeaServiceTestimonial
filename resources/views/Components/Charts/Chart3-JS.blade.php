<script> 
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
        barColor: ['#ed5f7d, red'],
        points: [
                @foreach($Vessels as $Vessel)
                    "{{ count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', 'BREAKDOWN')->get()) }}", 
                @endforeach 
            ],
        responsive: true,
        width: '100%'
        }
    },
    height: 300,
    width: 1000
    }; 
    new Chart('#chart1',  {
        type: 'line',
        ...options  
    });

    new Chart('#chart2',  {
        type: 'bar',
        ...options
    });

    new Chart('#chart3',  {
        type: 'area',
        ...options
    });
</script> 