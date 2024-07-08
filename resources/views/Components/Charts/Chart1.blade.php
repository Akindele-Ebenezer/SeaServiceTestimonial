<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/7.8.5/d3.min.js"></script>
<div class="form-1 chart-1">
    @if (!isset($_GET['FromDate_FILTERBYDATE']) AND !isset($_GET['EndDate_FILTERBYDATE']))
    <div class="chart-header">LIVE DATA</div> 
    @endif
    <div id="chart-wrap"></div>
</div>
