<div class="Chart5">
    <div class="inner">
        {{-- <p class="Close">✖</p>
        <img class="OpenChartFilterButton" src="{{ asset('images/bar-chart.png') }}" alt="">  --}}
        <h2>Vessel Availability — Bar Chart</h2>
        <div>
          @if (isset($Vessels[0]))
          <canvas id="barChart"></canvas>
          @endif
          @if (isset($Vessels[1]))
          <canvas id="barChart1"></canvas>
          @endif
          @if (isset($Vessels[2]))
          <canvas id="barChart2"></canvas> 
          @endif
        </div>
    </div>
  </div>