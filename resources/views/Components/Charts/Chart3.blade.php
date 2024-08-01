<link href="https://unpkg.com/singledivui/dist/singledivui.min.css" rel="stylesheet" />
<script src="https://unpkg.com/singledivui/dist/singledivui.min.js"></script>
@php 
    $FirstQuarterStart = date('Y-m-d', strtotime('first day of January'));
    $FirstQuarterEnd = date('Y-m-d', strtotime('last day of March'));
    $SecondQuarterStart = date('Y-m-d', strtotime('first day of April'));
    $SecondQuarterEnd = date('Y-m-d', strtotime('last day of June'));
    $ThirdQuarterStart = date('Y-m-d', strtotime('first day of July'));
    $ThirdQuarterEnd = date('Y-m-d', strtotime('last day of September'));
    $FourthQuarterStart = date('Y-m-d', strtotime('first day of October'));
    $FourthQuarterEnd = date('Y-m-d', strtotime('last day of December'));
    $Period = $_GET['ChartReportPeriod'] ?? '(*) ALL';
    $Status = $_GET['ChartReportStatus'] ?? 'BREAKDOWN';
    $Year = $_GET['ChartReportYear'] ?? date('Y');
@endphp
<div class="form-1 chart-3">
    <div class="row">
        <p class="Close">✖</p>
        <img class="OpenChartFilterButton" src="{{ asset('images/bar-chart.png') }}" alt=""> 
        <h1><span class="chart-report-title"></span> <span class="chart-report-year"></span></h1> &nbsp; - &nbsp; <span class="chart-report-period"></span> &nbsp; :: &nbsp; <span class="chart-report-percentage"></span> 
        <div class="cell">
            @php $Vessels = collect($Vessels)->chunk(12); @endphp
            @foreach ($Vessels[0] as $Vessel)
            <span class="percents">
                @switch($Period)
                    @case('1ST QUARTER')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$FirstQuarterStart, $FirstQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break 
                    @case('2ND QUARTER')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$SecondQuarterStart, $SecondQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break  
                    @case('3RD QUARTER')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$ThirdQuarterStart, $ThirdQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break  
                    @case('4TH QUARTER')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$FourthQuarterStart, $FourthQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break 
                    @case('1/2')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$FirstQuarterStart, $FirstQuarterEnd])->whereBetween('EndDate', [$SecondQuarterStart, $SecondQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break
                    @case('1/3')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$FirstQuarterStart, $FirstQuarterEnd])->whereBetween('EndDate', [$ThirdQuarterStart, $ThirdQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break   
                    @case('1/4')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$FirstQuarterStart, $FirstQuarterEnd])->whereBetween('EndDate', [$FourthQuarterStart, $FourthQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break   
                    @case('2/3')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$SecondQuarterStart, $SecondQuarterEnd])->whereBetween('EndDate', [$ThirdQuarterStart, $ThirdQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break   
                    @case('2/4')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$SecondQuarterStart, $SecondQuarterEnd])->whereBetween('EndDate', [$FourthQuarterStart, $FourthQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break   
                    @case('3/4')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$ThirdQuarterStart, $ThirdQuarterEnd])->whereBetween('EndDate', [$FourthQuarterStart, $FourthQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break      
                    @default
                    {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $Status)->whereYear('EndDate', $Year)->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $Status)->whereYear('EndDate', $Year)->get())))) * 100, 1) }} 
                @endswitch 
            %</span>
            @endforeach
            <div id="chart2"></div>
        </div>
        @if (isset($Vessels[1]))
        <div class="cell">
            @foreach ($Vessels[1] as $Vessel)
            <span class="percents">
                @switch($Period)
                    @case('1ST QUARTER')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$FirstQuarterStart, $FirstQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break 
                    @case('2ND QUARTER')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$SecondQuarterStart, $SecondQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break  
                    @case('3RD QUARTER')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$ThirdQuarterStart, $ThirdQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break  
                    @case('4TH QUARTER')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$FourthQuarterStart, $FourthQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break 
                    @case('1/2')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$FirstQuarterStart, $FirstQuarterEnd])->whereBetween('EndDate', [$SecondQuarterStart, $SecondQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break
                    @case('1/3')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$FirstQuarterStart, $FirstQuarterEnd])->whereBetween('EndDate', [$ThirdQuarterStart, $ThirdQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break   
                    @case('1/4')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$FirstQuarterStart, $FirstQuarterEnd])->whereBetween('EndDate', [$FourthQuarterStart, $FourthQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break   
                    @case('2/3')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$SecondQuarterStart, $SecondQuarterEnd])->whereBetween('EndDate', [$ThirdQuarterStart, $ThirdQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break   
                    @case('2/4')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$SecondQuarterStart, $SecondQuarterEnd])->whereBetween('EndDate', [$FourthQuarterStart, $FourthQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break   
                    @case('3/4')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$ThirdQuarterStart, $ThirdQuarterEnd])->whereBetween('EndDate', [$FourthQuarterStart, $FourthQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break      
                    @default
                    {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $Status)->whereYear('EndDate', $Year)->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $Status)->whereYear('EndDate', $Year)->get())))) * 100, 1) }} 
                @endswitch 
            %</span>
            @endforeach
            <div id="chart1"></div>
        </div>
        @endif
        @if (isset($Vessels[2]))
        <div class="cell"> 
            @foreach ($Vessels[2] ?? $Vessels[0] as $Vessel)
            <span class="percents"> 
                @switch($Period)
                    @case('1ST QUARTER')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$FirstQuarterStart, $FirstQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break 
                    @case('2ND QUARTER')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$SecondQuarterStart, $SecondQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break  
                    @case('3RD QUARTER')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$ThirdQuarterStart, $ThirdQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break  
                    @case('4TH QUARTER')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$FourthQuarterStart, $FourthQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break 
                    @case('1/2')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$FirstQuarterStart, $FirstQuarterEnd])->whereBetween('EndDate', [$SecondQuarterStart, $SecondQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break
                    @case('1/3')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$FirstQuarterStart, $FirstQuarterEnd])->whereBetween('EndDate', [$ThirdQuarterStart, $ThirdQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break   
                    @case('1/4')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$FirstQuarterStart, $FirstQuarterEnd])->whereBetween('EndDate', [$FourthQuarterStart, $FourthQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break   
                    @case('2/3')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$SecondQuarterStart, $SecondQuarterEnd])->whereBetween('EndDate', [$ThirdQuarterStart, $ThirdQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break   
                    @case('2/4')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$SecondQuarterStart, $SecondQuarterEnd])->whereBetween('EndDate', [$FourthQuarterStart, $FourthQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break   
                    @case('3/4')
                        {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->whereBetween('EndDate', [$ThirdQuarterStart, $ThirdQuarterEnd])->whereBetween('EndDate', [$FourthQuarterStart, $FourthQuarterEnd])->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $_GET['ChartReportStatus'] ?? 'BREAKDOWN')->whereYear('EndDate', $_GET['ChartReportYear'])->get())))) * 100) }}
                        @break      
                    @default
                    {{ round((count(\DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->where('Status', $Status)->whereYear('EndDate', $Year)->get()) / (count(\DB::table('vessel_availabilities')->where('Status', $Status)->whereYear('EndDate', $Year)->get()) == 0 ? 1 : (count(\DB::table('vessel_availabilities')->where('Status', $Status)->whereYear('EndDate', $Year)->get())))) * 100, 1) }} 
                @endswitch 
            %</span>
            @endforeach
            <div id="chart3"></div>
        </div>
        @endif
    </div>
</div>