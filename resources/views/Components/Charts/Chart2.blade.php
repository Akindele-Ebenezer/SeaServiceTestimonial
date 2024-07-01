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
        ['L.T.T',  1000,      400,  1000,      400,  1000,      400],
        ['DEPASA',  1170,      460,  1000,      400,  1000,      400], 
    ]);

    var options = {
        title: 'Vessel data',
        hAxis: {title: 'Companies', titleTextStyle: {color: 'red'}}
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
    chart.draw(data, options);
    }
</script>