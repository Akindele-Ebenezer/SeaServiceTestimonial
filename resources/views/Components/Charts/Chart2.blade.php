<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://www.google.com/jsapi"></script>
<div class="col-md-6">
    <div id="chart_div1" class="chart-2"></div>
</div>    
<script>
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart1);
    function drawChart1() {
    var data = google.visualization.arrayToDataTable([
        ['Company', 'DOCKING', 'BREAKDOWN', 'INSPECTION', 'READY ', 'BUNKERY', 'MAINTENANCE'],
        @php $Companies = \DB::table('companies_')->get(); @endphp
        @foreach($Companies as $Company)
            @php
                $Company_NumberOfVessels_DOCKING = \App\Models\VesselAvailability::select('Vessel')->join('vessels_vessel_information', 'vessels_vessel_information.VesselName', '=', 'vessel_availabilities.Vessel')->where('Status', 'DOCKING')->where('vessels_vessel_information.Company', $Company->Alias)->get(); 
                $Company_NumberOfVessels_READY = \App\Models\VesselAvailability::select('Vessel')->join('vessels_vessel_information', 'vessels_vessel_information.VesselName', '=', 'vessel_availabilities.Vessel')->where('Status', 'IDLE')->where('vessels_vessel_information.Company', $Company->Alias)->get();
                $Company_NumberOfVessels_INSPECTION = \App\Models\VesselAvailability::select('Vessel')->join('vessels_vessel_information', 'vessels_vessel_information.VesselName', '=', 'vessel_availabilities.Vessel')->where('Status', 'INSPECTION')->where('vessels_vessel_information.Company', $Company->Alias)->get();
                $Company_NumberOfVessels_BREAKDOWN = \App\Models\VesselAvailability::select('Vessel')->join('vessels_vessel_information', 'vessels_vessel_information.VesselName', '=', 'vessel_availabilities.Vessel')->where('Status', 'BREAKDOWN')->where('vessels_vessel_information.Company', $Company->Alias)->get(); 
                $Company_NumberOfVessels_BUNKERY = \App\Models\VesselAvailability::select('Vessel')->join('vessels_vessel_information', 'vessels_vessel_information.VesselName', '=', 'vessel_availabilities.Vessel')->where('Status', 'BUNKERY')->where('vessels_vessel_information.Company', $Company->Alias)->get();
                $Company_NumberOfVessels_MAINTENANCE = \App\Models\VesselAvailability::select('Vessel')->join('vessels_vessel_information', 'vessels_vessel_information.VesselName', '=', 'vessel_availabilities.Vessel')->where('Status', 'MAINTENANCE')->where('vessels_vessel_information.Company', $Company->Alias)->get();
            @endphp
            ['{{ $Company->Alias }}',  {{ count($Company_NumberOfVessels_DOCKING) }}, {{ count($Company_NumberOfVessels_BREAKDOWN) }}, {{ count($Company_NumberOfVessels_INSPECTION) }}, {{ count($Company_NumberOfVessels_READY) }}, {{ count($Company_NumberOfVessels_BUNKERY) }}, {{ count($Company_NumberOfVessels_MAINTENANCE) }}],
        @endforeach
    ]);

    var options = {
        title: 'Vessel data',
        hAxis: {title: 'Companies', titleTextStyle: {color: 'red'}}
    };

    var chart = new google.visualization.BarChart(document.getElementById('chart_div1'));
    chart.draw(data, options);
    }
</script>