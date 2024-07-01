<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://www.google.com/jsapi"></script>
<div class="col-md-6">
    <div id="chart_div1" class="chart-2"></div>
</div>   
@php
    $LTT_NumberOfVessels_DOCKING = \App\Models\VesselAvailability::select('Vessel')->join('vessels_vessel_information', 'vessels_vessel_information.VesselName', '=', 'vessel_availabilities.Vessel')->where('Status', 'DOCKING')->where('vessels_vessel_information.Company', 'L.T.T')->get(); 
    $LTT_NumberOfVessels_READY = \App\Models\VesselAvailability::select('Vessel')->join('vessels_vessel_information', 'vessels_vessel_information.VesselName', '=', 'vessel_availabilities.Vessel')->where('Status', 'IDLE')->where('vessels_vessel_information.Company', 'L.T.T')->get();
    $LTT_NumberOfVessels_INSPECTION = \App\Models\VesselAvailability::select('Vessel')->join('vessels_vessel_information', 'vessels_vessel_information.VesselName', '=', 'vessel_availabilities.Vessel')->where('Status', 'INSPECTION')->where('vessels_vessel_information.Company', 'L.T.T')->get();
    $LTT_NumberOfVessels_BREAKDOWN = \App\Models\VesselAvailability::select('Vessel')->join('vessels_vessel_information', 'vessels_vessel_information.VesselName', '=', 'vessel_availabilities.Vessel')->where('Status', 'BREAKDOWN')->where('vessels_vessel_information.Company', 'L.T.T')->get(); 
    $LTT_NumberOfVessels_BUNKERY = \App\Models\VesselAvailability::select('Vessel')->join('vessels_vessel_information', 'vessels_vessel_information.VesselName', '=', 'vessel_availabilities.Vessel')->where('Status', 'BUNKERY')->where('vessels_vessel_information.Company', 'L.T.T')->get();
    $LTT_NumberOfVessels_MAINTENANCE = \App\Models\VesselAvailability::select('Vessel')->join('vessels_vessel_information', 'vessels_vessel_information.VesselName', '=', 'vessel_availabilities.Vessel')->where('Status', 'MAINTENANCE')->where('vessels_vessel_information.Company', 'L.T.T')->get();

    $DEPASA_NumberOfVessels_DOCKING = \App\Models\VesselAvailability::select('Vessel')->join('vessels_vessel_information', 'vessels_vessel_information.VesselName', '=', 'vessel_availabilities.Vessel')->where('Status', 'DOCKING')->where('vessels_vessel_information.Company', 'DEPASA')->get(); 
    $DEPASA_NumberOfVessels_READY = \App\Models\VesselAvailability::select('Vessel')->join('vessels_vessel_information', 'vessels_vessel_information.VesselName', '=', 'vessel_availabilities.Vessel')->where('Status', 'IDLE')->where('vessels_vessel_information.Company', 'DEPASA')->get();
    $DEPASA_NumberOfVessels_INSPECTION = \App\Models\VesselAvailability::select('Vessel')->join('vessels_vessel_information', 'vessels_vessel_information.VesselName', '=', 'vessel_availabilities.Vessel')->where('Status', 'INSPECTION')->where('vessels_vessel_information.Company', 'DEPASA')->get();
    $DEPASA_NumberOfVessels_BREAKDOWN = \App\Models\VesselAvailability::select('Vessel')->join('vessels_vessel_information', 'vessels_vessel_information.VesselName', '=', 'vessel_availabilities.Vessel')->where('Status', 'BREAKDOWN')->where('vessels_vessel_information.Company', 'DEPASA')->get(); 
    $DEPASA_NumberOfVessels_BUNKERY = \App\Models\VesselAvailability::select('Vessel')->join('vessels_vessel_information', 'vessels_vessel_information.VesselName', '=', 'vessel_availabilities.Vessel')->where('Status', 'BUNKERY')->where('vessels_vessel_information.Company', 'DEPASA')->get();
    $DEPASA_NumberOfVessels_MAINTENANCE = \App\Models\VesselAvailability::select('Vessel')->join('vessels_vessel_information', 'vessels_vessel_information.VesselName', '=', 'vessel_availabilities.Vessel')->where('Status', 'MAINTENANCE')->where('vessels_vessel_information.Company', 'DEPASA')->get();

@endphp
<script>
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart1);
    function drawChart1() {
    var data = google.visualization.arrayToDataTable([
        ['Company', 'DOCKING', 'BREAKDOWN', 'INSPECTION', 'READY ', 'BUNKERY', 'MAINTENANCE'],
        ['L.T.T',  {{ count($LTT_NumberOfVessels_DOCKING) }}, {{ count($LTT_NumberOfVessels_BREAKDOWN) }}, {{ count($LTT_NumberOfVessels_INSPECTION) }}, {{ count($LTT_NumberOfVessels_READY) }}, {{ count($LTT_NumberOfVessels_BUNKERY) }}, {{ count($LTT_NumberOfVessels_MAINTENANCE) }}],
        ['DEPASA',  {{ count($DEPASA_NumberOfVessels_DOCKING) }}, {{ count($DEPASA_NumberOfVessels_BREAKDOWN) }}, {{ count($DEPASA_NumberOfVessels_INSPECTION) }}, {{ count($DEPASA_NumberOfVessels_READY) }}, {{ count($DEPASA_NumberOfVessels_BUNKERY) }}, {{ count($DEPASA_NumberOfVessels_MAINTENANCE) }}],
    ]);

    var options = {
        title: 'Vessel data',
        hAxis: {title: 'Companies', titleTextStyle: {color: 'red'}}
    };

    var chart = new google.visualization.BarChart(document.getElementById('chart_div1'));
    chart.draw(data, options);
    }
</script>