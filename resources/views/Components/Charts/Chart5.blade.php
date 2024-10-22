<div class="Chart5">
    <div class="inner">
        {{-- <p class="Close">✖</p>
        <img class="OpenChartFilterButton" src="{{ asset('images/bar-chart.png') }}" alt="">  --}}
        <h2>Vessel Availability — Bar Chart</h2>
        <div>
          @if (isset($Vessels[0]))
          <canvas style="width: 1135px; height: 567px;" width="1135" height="567" id="barChart"></canvas>
          {{-- <canvas id="barChart"></canvas> --}}
          @endif
          @if (isset($Vessels[1]))
          <canvas style="width: 1135px; height: 567px;" width="1135" height="567" id="barChart1"></canvas>
          {{-- <canvas id="barChart1"></canvas> --}}
          @endif
          @if (isset($Vessels[2]))
          <canvas style="width: 1135px; height: 567px;" width="1135" height="567" id="barChart2"></canvas>
          {{-- <canvas id="barChart2"></canvas>  --}}
          @endif
        </div>
    </div>
  </div>