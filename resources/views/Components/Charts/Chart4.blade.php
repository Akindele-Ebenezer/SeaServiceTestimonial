<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/7.8.5/d3.min.js"></script>
<div class="form-1 chart-4 {{ (isset($_GET['FilterValue']) || isset($_GET['page']) || isset($_GET['Vessel_FILTER'])) ? 'Hide' : '' }}">
  <div class="chart-4-wrapper">
    <h2></h2>
    <p class="Close">✖</p>
    <div class="pieID pie"></div>
    <ul class="pieID legend">
      <li>
        <em>Docking</em>
        <span class="DockingCount">600</span>
      </li>
      <li>
        <em>Bunkering</em>
        <span class="BunkeringCount">531</span>
      </li>
      <li>
        <em>Inspection</em>
        <span class="InspectionCount">868</span>
      </li>
      <li>
        <em>Maintenance</em>
        <span class="MaintenanceCount">344</span>
      </li>
      <li>
        <em>Breakdown</em>
        <span class="BreakdownCount">1145</span>
      </li>
    </ul>
  </div>
</div>