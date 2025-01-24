@extends('Layouts.Layout-2')
@section('Title', 'Availability - ' . session()->get('APP_NAME'))

@include('Components.Maps.Map1') 

@section('Content')
@include('Components.Forms.Add.Checklists.Checklist1')
@include('Components.Forms.Edit.Checklists.Checklist1')
@include('Components.Forms.Delete.Checklists.Checklist1')
@include('Components.Forms.Add.Checklists.Checklist2')
@include('Components.Forms.Edit.Checklists.Checklist2')
{{-- @include('Components.Forms.Delete.Checklists.Checklist2') --}}
@include('Components.Forms.Add.Availability')
@include('Components.Forms.Edit.Availability')
@include('Components.Forms.Delete.Availability')
@include('Components.Inner.FilterByDate')
@include('Components.Inner.FilterReportByDate')  
@include('Components.Inner.FilterReportForVesselByDate')  
@include('Components.Inner.FilterChart4ForVesselData')  
@include('Components.Inner.ChartReport')  
@include('Components.Charts.Chart1') 
{{-- @include('Components.Charts.Chart3')  --}}
@include('Components.Charts.Chart4') 
@include('Components.Charts.Chart5') 
@include('Components.Charts.Diagrams.SmallBoats') 
<button class="DisplayMap1Button" title="View Vessel Location">
    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M480-80q-106 0-173-33.5T240-200q0-24 14.5-44.5T295-280l63 59q-9 4-19.5 9T322-200q13 16 60 28t98 12q51 0 98.5-12t60.5-28q-7-8-18-13t-21-9l62-60q28 16 43 36.5t15 45.5q0 53-67 86.5T480-80Zm1-220q99-73 149-146.5T680-594q0-102-65-154t-135-52q-70 0-135 52t-65 154q0 67 49 139.5T481-300Zm-1 100Q339-304 269.5-402T200-594q0-71 25.5-124.5T291-808q40-36 90-54t99-18q49 0 99 18t90 54q40 36 65.5 89.5T760-594q0 94-69.5 192T480-200Zm0-320q33 0 56.5-23.5T560-600q0-33-23.5-56.5T480-680q-33 0-56.5 23.5T400-600q0 33 23.5 56.5T480-520Zm0-80Z"/></svg>
</button>
<button class="DisplayAddChecklist1Button" title="Add new handover statement for small boats">
    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M479-418ZM158-200 82-468q-3-12 2.5-28t23.5-22l52-18v-184q0-33 23.5-56.5T240-800h120v-120h240v120h120q33 0 56.5 23.5T800-720v184l52 18q21 8 25 23.5t1 26.5l-76 268q-50 0-91-23.5T640-280q-30 33-71 56.5T480-200q-48 0-89-23.5T320-280q-30 33-71 56.5T158-200ZM80-40v-80h80q42 0 83-13t77-39q36 26 77 38t83 12q42 0 83-12t77-38q36 26 77 39t83 13h80v80h-80q-42 0-82-10t-78-30q-38 20-78.5 30T480-40q-41 0-81.5-10T320-80q-38 20-78 30t-82 10H80Zm160-522 240-78 240 78v-158H240v158Zm240 282q47 0 79.5-33t80.5-89q48 54 65 74t41 34l44-160-310-102-312 102 46 158q24-14 41-32t65-74q50 57 81.5 89.5T480-280Z"/></svg>
</button>
<button class="DisplayChart5Button" title="Display Graphical Data">
    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M640-160v-280h160v280H640Zm-240 0v-640h160v640H400Zm-240 0v-440h160v440H160Z"/></svg>
</button>
<div class="vessel-content notifications availability">  
    <h3 class="company-logo"><img src="{{ asset('Images/LTT -DEPASA Logo.png') }}" alt=""></h3>
    {{-- <h3>LIVE</h3> :: {{ count($Vessels) }} --}} 
    @unless (count($Vessels) > 0)
        <p class="empty-data">There's no vessel in the system..</p>
    @endunless
    @foreach (\DB::table('companies_')->get() as $Comapny)
        <h3 class="company-heading">
            <span>
                {{ $Comapny->Organization }}        
            </span>
        </h3>
        <h3 class="report-summary">Report summary <img class="report-summary ReportPdfButton" src="{{ asset('images/pdf.png') }}" alt=""></h3>
        @php
            $Dredgers = \DB::table('vessels_vessel_information')->select(['VesselName', 'VesselType', 'Company', 'ImoNumber', 'CallSign'])->where('Company', $Comapny->Alias)->where('VesselType', 'DREDGER')->get();
        @endphp
        <h3 class="vessel-type-heading">DREDGERS :: {{ count($Dredgers) }}
        </h3> 
        @unless (count($Dredgers) > 0)
            <span>
                No data available..
            </span>
        @endunless
        @foreach ($Dredgers as $Vessel)
        @php 
            if (isset($_GET['FromDate_FILTERBYDATE']) AND isset($_GET['EndDate_FILTERBYDATE']) AND empty($_GET['SpecificDay'])) {
                $Availability_STATUS = \DB::table('vessel_availabilities')->select(['Vessel', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName)
                                        ->whereBetween('StartDate', [$_GET['FromDate_FILTERBYDATE'], $_GET['EndDate_FILTERBYDATE']])
                                        ->whereNotNull('Status') 
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first(); 
                $Availability_STATUS_2 = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName) 
                                        ->whereBetween('StartDate', [$_GET['FromDate_FILTERBYDATE'], $_GET['EndDate_FILTERBYDATE']])
                                        ->whereNotNull('Status') 
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first();
            } elseif (!(empty($_GET['SpecificDay']))) {
                $Availability_STATUS = \DB::table('vessel_availabilities')->select(['Vessel', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName)
                                        ->where('StartDate', $_GET['SpecificDay'])
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first(); 
                $Availability_STATUS_2 = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName) 
                                        ->where('StartDate', $_GET['SpecificDay'])
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first();
            } else {
            $Availability_STATUS = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime', 'TillNow'])
                                    ->where('Vessel', $Vessel->VesselName) 
                                    ->where('EndDate', '>=', $STARTDATE) 
                                    ->orWhere(function($query) use ($Vessel) {
                                        $query->where('Vessel', $Vessel->VesselName) 
                                                ->where('TillNow', 'YES');
                                    })
                                    ->orderBy('StartDate', 'DESC') 
                                    ->orderBy('StartTime', 'DESC') 
                                    ->orderBy('EndTime', 'DESC')
                                    ->first(); 
            $Availability_STATUS_2 = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime', 'TillNow'])
                                    ->where('Vessel', $Vessel->VesselName)  
                                    ->where('EndDate', '>=', $STARTDATE) 
                                    ->orWhere(function($query) use ($Vessel) {
                                        $query->where('Vessel', $Vessel->VesselName) 
                                                ->where('TillNow', 'YES');
                                    })
                                    ->orderBy('StartDate', 'DESC') 
                                    ->orderBy('StartTime', 'DESC') 
                                    ->orderBy('EndTime', 'DESC')
                                    ->first();
            }
            $StartDate = $Availability_STATUS->StartDate ?? '00:00';
            $EndDate = $Availability_STATUS->EndDate ?? '00:00';
            if (!empty($Availability_STATUS->TillNow)) {
                if ($Availability_STATUS->TillNow == 'YES') {
                    $EndDate = date('Y-m-d');
                }   
            }
            $StartDate_2 = $Availability_STATUS_2->StartDate ?? '00:00';
            $EndDate_2 = $Availability_STATUS_2->EndDate ?? '00:00'; 
            $StartTime = \Carbon\Carbon::parse($Availability_STATUS->StartTime ?? '00:00')->format('H:i').' HRS'; 
            $EndTime = \Carbon\Carbon::parse($Availability_STATUS->EndTime ?? '00:00')->format('H:i').' HRS'; 
            $StartTime_2 = \Carbon\Carbon::parse($Availability_STATUS_2->StartTime ?? '00:00')->format('H:i').' HRS'; 
            $EndTime_2 = \Carbon\Carbon::parse($Availability_STATUS_2->EndTime ?? '00:00')->format('H:i').' HRS'; 
            if (!empty($Availability_STATUS_2->TillNow)) {
                if ($Availability_STATUS_2->TillNow == 'YES') {
                    $EndDate_2 = date('Y-m-d');
                    $EndTime_2 = \Carbon\Carbon::parse(date('H:i') ?? '00:00')->format('H:i').' HRS'; 
                }
            }
        @endphp
        <div class="list tooltip-x">
            @if ($EndDate === $StartDate)  
                <span class="Hide tooltip-x-span"><div class="{{ strtolower($Availability_STATUS_2->Status ?? 'READY TO GO') }} tooltip-x-div"></div> On {{ $Availability_STATUS_2->Status ?? 'READY TO GO' }} <br> {{ $StartTime_2 }} - {{ $EndTime_2 }}</span>
            @else
                <span class="Hide tooltip-x-span"><div class="{{ strtolower($Availability_STATUS->Status ?? '') }} tooltip-x-div"></div> On {{ $Availability_STATUS->Status ?? 'READY TO GO' }} <br> {{ $StartTime }} - {{ $EndTime_2 }}</span>
            @endif
            <div class="inner -x">  
                <img class="OpenMaintenanceInfoIcon" src="{{ asset('images/ship (2).png') }}" alt="">
                <div class="Hide">{{ strtolower($Availability_STATUS->Status ?? 'READY TO GO') }}</div>
                <div class="Hide"> {{ $Vessel->VesselName }}</div>
                <strong class="notification-wrapper"> 
                    @include('Components.Includes.VesselStats_DATA')
                    <span class="status-x {{ strtolower($Availability_STATUS->Status ?? 'READY TO GO') }}  
                    "></span>
                    <span class="vessel-name--">{{ $Vessel->VesselName }}</span> 
                    <span class="imo availability-status {{ strtolower($Availability_STATUS->Status ?? 'READY TO GO') }} status-1">
                        @if (!empty($Availability_STATUS->TillNow) == 'YES')
                            {{ (($Availability_STATUS->Status ?? 'READY') == 'IDLE' ? 'READY' : (($Availability_STATUS->Status ?? 'READY') == 'BUNKERY' ? 'BUNKERING' : $Availability_STATUS->Status ?? 'READY')) }}
                        @else
                            {{ (($Availability_STATUS->Status ?? 'READY TO GO') == 'IDLE' ? 'READY' : $Availability_STATUS->Status ?? 'READY') ?? 'READY TO GO' }}
                        @endif
                    </span>
                </strong>  
                <img class="ReportPdfButtonForVessels" src="{{ asset('images/pdf.png') }}">
                <span class="Hide">{{ $Vessel->VesselName }}</span>
            </div>
        </div> 
        @endforeach 
        @php
            $TugBoats = \DB::table('vessels_vessel_information')->select(['VesselName', 'VesselType', 'Company', 'ImoNumber', 'CallSign'])->where('Company', $Comapny->Alias)->where('VesselType', 'TUG BOAT')->orderByRaw("FIELD(VesselName, 'MAJIYA', 'UBIMA', 'UROMI', 'DAURA', 'ZARANDA', 'ASAGA', 'EMEKUKU', 'GUSAU')")->get();
        @endphp
        <h3 class="vessel-type-heading">TUG BOATS :: {{ count($TugBoats) }}</h3> 
        @unless (count($TugBoats) > 0)
            <span>
                No data available..
            </span>
        @endunless
        @foreach ($TugBoats as $Vessel)
        @php 
            if (isset($_GET['FromDate_FILTERBYDATE']) AND isset($_GET['EndDate_FILTERBYDATE']) AND empty($_GET['SpecificDay'])) {
                $Availability_STATUS = \DB::table('vessel_availabilities')->select(['Vessel', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName)
                                        ->whereBetween('StartDate', [$_GET['FromDate_FILTERBYDATE'], $_GET['EndDate_FILTERBYDATE']])
                                        ->whereNotNull('Status') 
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first(); 
                $Availability_STATUS_2 = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName) 
                                        ->whereBetween('StartDate', [$_GET['FromDate_FILTERBYDATE'], $_GET['EndDate_FILTERBYDATE']])
                                        ->whereNotNull('Status') 
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first();
            } elseif (!(empty($_GET['SpecificDay']))) {
                $Availability_STATUS = \DB::table('vessel_availabilities')->select(['Vessel', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName)
                                        ->where('StartDate', $_GET['SpecificDay'])
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first(); 
                $Availability_STATUS_2 = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName) 
                                        ->where('StartDate', $_GET['SpecificDay'])
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first();
            } else {
            $Availability_STATUS = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime', 'TillNow'])
                                    ->where('Vessel', $Vessel->VesselName) 
                                    ->where('EndDate', '>=', $STARTDATE) 
                                    ->orWhere(function($query) use ($Vessel) {
                                        $query->where('Vessel', $Vessel->VesselName) 
                                                ->where('TillNow', 'YES');
                                    })
                                    ->orderBy('StartDate', 'DESC') 
                                    ->orderBy('StartTime', 'DESC') 
                                    ->orderBy('EndTime', 'DESC') 
                                    ->first(); 
            $Availability_STATUS_2 = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime', 'TillNow'])
                                    ->where('Vessel', $Vessel->VesselName) 
                                    ->where('EndDate', '>=', $STARTDATE)  
                                    ->orWhere(function($query) use ($Vessel) {
                                        $query->where('Vessel', $Vessel->VesselName) 
                                                ->where('TillNow', 'YES');
                                    })
                                    ->orderBy('StartDate', 'DESC') 
                                    ->orderBy('StartTime', 'DESC') 
                                    ->orderBy('EndTime', 'DESC') 
                                    ->first();
            }
            $StartDate = $Availability_STATUS->StartDate ?? '00:00';
            $EndDate = $Availability_STATUS->EndDate ?? '00:00'; 
            if (!empty($Availability_STATUS->TillNow)) {
                if ($Availability_STATUS->TillNow == 'YES') {
                    $EndDate = date('Y-m-d');
                }
            } 
            $StartDate_2 = $Availability_STATUS_2->StartDate ?? '00:00';
            $EndDate_2 = $Availability_STATUS_2->EndDate ?? '00:00'; 
            $StartTime = \Carbon\Carbon::parse($Availability_STATUS->StartTime ?? '00:00')->format('H:i').' HRS'; 
            $EndTime = \Carbon\Carbon::parse($Availability_STATUS->EndTime ?? '00:00')->format('H:i').' HRS'; 
            $StartTime_2 = \Carbon\Carbon::parse($Availability_STATUS_2->StartTime ?? '00:00')->format('H:i').' HRS'; 
            $EndTime_2 = \Carbon\Carbon::parse($Availability_STATUS_2->EndTime ?? '00:00')->format('H:i').' HRS'; 
            if (!empty($Availability_STATUS_2->TillNow)) {
                if ($Availability_STATUS_2->TillNow == 'YES') {
                    $EndDate_2 = date('Y-m-d');
                    $EndTime_2 = \Carbon\Carbon::parse(date('H:i') ?? '00:00')->format('H:i').' HRS'; 
                }
            }
        @endphp
        <div class="list tooltip-x"> 
            @if ($EndDate === $StartDate)  
                <span class="Hide tooltip-x-span"><div class="{{ strtolower($Availability_STATUS_2->Status ?? 'READY TO GO') }} tooltip-x-div"></div> On {{ $Availability_STATUS_2->Status ?? 'READY TO GO' }} <br> {{ $StartTime_2 }} - {{ $EndTime_2 }}</span>
            @else
                <span class="Hide tooltip-x-span"><div class="{{ strtolower($Availability_STATUS->Status ?? '') }} tooltip-x-div"></div> On {{ $Availability_STATUS->Status ?? 'READY TO GO' }} <br> {{ $StartTime }} - {{ $EndTime_2 }}</span>
            @endif
            <div class="inner -x">  
                <img class="OpenMaintenanceInfoIcon" src="{{ asset('images/ship (2).png') }}" alt="">
                <div class="Hide">{{ strtolower($Availability_STATUS->Status ?? 'READY TO GO') }}</div>
                <div class="Hide"> {{ $Vessel->VesselName }}</div>
                <strong class="notification-wrapper">
                    @include('Components.Includes.VesselStats_DATA')
                    <span class="status-x {{ strtolower($Availability_STATUS->Status ?? 'READY TO GO') }}
                    "></span>
                    <span class="vessel-name--">{{ $Vessel->VesselName }}</span>  
                    <span class="imo availability-status {{ strtolower($Availability_STATUS->Status ?? 'READY TO GO') }} {{ $Availability_STATUS->Status ?? 'ready' == 'IDLE' ? 'ready' : $Availability_STATUS->Status ?? 'ready' }}
                        status-1">   
                        @if (!empty($Availability_STATUS->TillNow) == 'YES')
                            {{ (($Availability_STATUS->Status ?? 'READY') == 'IDLE' ? 'READY' : (($Availability_STATUS->Status ?? 'READY') == 'BUNKERY' ? 'BUNKERING' : $Availability_STATUS->Status ?? 'READY')) }}
                        @else
                            {{ (($Availability_STATUS->Status ?? 'READY TO GO') == 'IDLE' ? 'READY' : $Availability_STATUS->Status ?? 'READY') ?? 'READY TO GO' }}
                        @endif 
                    </span>
                </strong>  
                <img class="ReportPdfButtonForVessels" src="{{ asset('images/pdf.png') }}">
                <span class="Hide">{{ $Vessel->VesselName }}</span>
            </div>
        </div> 
        @endforeach
        @php
            $PilotCutters = \DB::table('vessels_vessel_information')->select(['VesselName', 'VesselType', 'Company', 'ImoNumber', 'CallSign'])->where('Company', $Comapny->Alias)->where('VesselType', 'PILOT CUTTERS')->get();
        @endphp
        <h3 class="vessel-type-heading">PILOT CUTTERS :: {{ count($PilotCutters) }}</h3> 
        @unless (count($PilotCutters) > 0)
            <span>
                No data available..
            </span>
        @endunless
        @foreach ($PilotCutters as $Vessel)
        @php 
            if (isset($_GET['FromDate_FILTERBYDATE']) AND isset($_GET['EndDate_FILTERBYDATE']) AND empty($_GET['SpecificDay'])) {
                $Availability_STATUS = \DB::table('vessel_availabilities')->select(['Vessel', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName) 
                                        ->whereBetween('StartDate', [$_GET['FromDate_FILTERBYDATE'], $_GET['EndDate_FILTERBYDATE']])
                                        ->whereNotNull('Status') 
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first(); 
                $Availability_STATUS_2 = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName) 
                                        ->whereBetween('StartDate', [$_GET['FromDate_FILTERBYDATE'], $_GET['EndDate_FILTERBYDATE']])
                                        ->whereNotNull('Status') 
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first();
            } elseif (!(empty($_GET['SpecificDay']))) {
                $Availability_STATUS = \DB::table('vessel_availabilities')->select(['Vessel', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName)
                                        ->where('StartDate', $_GET['SpecificDay'])
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first(); 
                $Availability_STATUS_2 = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName) 
                                        ->where('StartDate', $_GET['SpecificDay'])
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first();
            } else {
            $Availability_STATUS = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime', 'TillNow'])
                                    ->where('Vessel', $Vessel->VesselName) 
                                    ->where('EndDate', '>=', $STARTDATE) 
                                    ->orWhere(function($query) use ($Vessel) {
                                        $query->where('Vessel', $Vessel->VesselName) 
                                                ->where('TillNow', 'YES');
                                    })
                                    ->orderBy('StartDate', 'DESC') 
                                    ->orderBy('StartTime', 'DESC') 
                                    ->orderBy('EndTime', 'DESC')
                                    ->first(); 
            $Availability_STATUS_2 = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime', 'TillNow'])
                                    ->where('Vessel', $Vessel->VesselName) 
                                    ->where('StartDate', $STARTDATE)
                                    ->orWhere(function($query) use ($Vessel) {
                                        $query->where('Vessel', $Vessel->VesselName) 
                                                ->where('TillNow', 'YES');
                                    })
                                    ->orderBy('StartDate', 'DESC') 
                                    ->orderBy('StartTime', 'DESC') 
                                    ->orderBy('EndTime', 'DESC') 
                                    ->first();
            }
            $StartDate = $Availability_STATUS->StartDate ?? '00:00';
            $EndDate = $Availability_STATUS->EndDate ?? '00:00';
            if (!empty($Availability_STATUS->TillNow)) {
                if ($Availability_STATUS->TillNow == 'YES') {
                    $EndDate = date('Y-m-d');
                }
            } 
            $StartDate_2 = $Availability_STATUS_2->StartDate ?? '00:00';
            $EndDate_2 = $Availability_STATUS_2->EndDate ?? '00:00'; 
            $StartTime = \Carbon\Carbon::parse($Availability_STATUS->StartTime ?? '00:00')->format('H:i').' HRS'; 
            $EndTime = \Carbon\Carbon::parse($Availability_STATUS->EndTime ?? '00:00')->format('H:i').' HRS'; 
            $StartTime_2 = \Carbon\Carbon::parse($Availability_STATUS_2->StartTime ?? '00:00')->format('H:i').' HRS'; 
            $EndTime_2 = \Carbon\Carbon::parse($Availability_STATUS_2->EndTime ?? '00:00')->format('H:i').' HRS';
            if (!empty($Availability_STATUS_2->TillNow)) {
                if ($Availability_STATUS_2->TillNow == 'YES') {
                    $EndDate_2 = date('Y-m-d');
                    $EndTime_2 = \Carbon\Carbon::parse(date('H:i') ?? '00:00')->format('H:i').' HRS'; 
                }
            }
        @endphp
        <div class="list tooltip-x"> 
            @if ($EndDate === $StartDate)  
                <span class="Hide tooltip-x-span"><div class="{{ strtolower($Availability_STATUS_2->Status ?? 'READY TO GO') }} tooltip-x-div"></div> On {{ $Availability_STATUS_2->Status ?? 'READY TO GO' }} <br> {{ $StartTime_2 }} - {{ $EndTime_2 }}</span>
            @else
                <span class="Hide tooltip-x-span"><div class="{{ strtolower($Availability_STATUS->Status ?? '') }} tooltip-x-div"></div> On {{ $Availability_STATUS->Status ?? 'READY TO GO' }} <br> {{ $StartTime }} - {{ $EndTime_2 }}</span>
            @endif
            <div class="inner -x">  
                <img class="OpenMaintenanceInfoIcon" src="{{ asset('images/ship (2).png') }}" alt="">
                <div class="Hide">{{ strtolower($Availability_STATUS->Status ?? 'READY TO GO') }}</div>
                <div class="Hide">{{ $Vessel->VesselName }}</div>
                @php
                    $Checklist1a = \DB::table('checklist_1a')->where('Boat', $Vessel->VesselName)->orderBy('Date', 'DESC')->orderBy('TimeIn')->first();
                    $Checklist1b = \DB::table('checklist_1b')->where('Boat', $Vessel->VesselName)->orderBy('Date', 'DESC')->orderBy('TimeIn')->first();
                    $Checklist1c = \DB::table('checklist_1c')->where('Boat', $Vessel->VesselName)->orderBy('Date', 'DESC')->orderBy('TimeIn')->first();
                    $Checklist1d = \DB::table('checklist_1d')->where('Boat', $Vessel->VesselName)->orderBy('Date', 'DESC')->orderBy('TimeIn')->first();
                    $Checklist1e = \DB::table('checklist_1e')->where('Boat', $Vessel->VesselName)->orderBy('Date', 'DESC')->orderBy('TimeIn')->first();
                @endphp
                @include('Components.Includes.Checklists.Checklist1_DATA')
                <strong class="notification-wrapper">
                    @include('Components.Includes.VesselStats_DATA')
                    <span class="status-x  {{ strtolower($Availability_STATUS->Status ?? 'READY TO GO') }}
                    "></span>
                    <span class="vessel-name--">{{ $Vessel->VesselName }}</span>  
                    <span class="imo availability-status {{ strtolower($Availability_STATUS->Status ?? 'READY TO GO') }} {{ $Availability_STATUS->Status ?? 'ready' == 'IDLE' ? 'ready' : $Availability_STATUS->Status ?? 'ready' }}
                        status-1">
                        @if (!empty($Availability_STATUS->TillNow) == 'YES')
                            {{ (($Availability_STATUS->Status ?? 'READY') == 'IDLE' ? 'READY' : (($Availability_STATUS->Status ?? 'READY') == 'BUNKERY' ? 'BUNKERING' : $Availability_STATUS->Status ?? 'READY')) }}
                        @else
                            {{ (($Availability_STATUS->Status ?? 'READY TO GO') == 'IDLE' ? 'READY' : $Availability_STATUS->Status ?? 'READY') ?? 'READY TO GO' }}
                        @endif
                    </span>
                </strong>  
                <img class="ReportPdfButtonForVessels" src="{{ asset('images/pdf.png') }}">
                <span class="Hide">{{ $Vessel->VesselName }}</span>
            </div>
        </div> 
        @endforeach
        @php
            $Mooring = \DB::table('vessels_vessel_information')->select(['VesselName', 'VesselType', 'Company', 'ImoNumber', 'CallSign'])->where('Company', $Comapny->Alias)->where('VesselType', 'MOORING')->get();
        @endphp
        <h3 class="vessel-type-heading">MOORINGS :: {{ count($Mooring) }}</h3> 
        @unless (count($Mooring) > 0)
            <span>
                No data available..
            </span>
        @endunless
        @foreach ($Mooring as $Vessel)
        @php 
            if (isset($_GET['FromDate_FILTERBYDATE']) AND isset($_GET['EndDate_FILTERBYDATE']) AND empty($_GET['SpecificDay'])) {
                $Availability_STATUS = \DB::table('vessel_availabilities')->select(['Vessel', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName)
                                        ->whereBetween('StartDate', [$_GET['FromDate_FILTERBYDATE'], $_GET['EndDate_FILTERBYDATE']])
                                        ->whereNotNull('Status') 
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first(); 
                $Availability_STATUS_2 = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName) 
                                        ->whereBetween('StartDate', [$_GET['FromDate_FILTERBYDATE'], $_GET['EndDate_FILTERBYDATE']])
                                        ->whereNotNull('Status') 
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first();
            } elseif (!(empty($_GET['SpecificDay']))) {
                $Availability_STATUS = \DB::table('vessel_availabilities')->select(['Vessel', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName)
                                        ->where('StartDate', $_GET['SpecificDay'])
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first(); 
                $Availability_STATUS_2 = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName) 
                                        ->where('StartDate', $_GET['SpecificDay'])
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first();
            } else {
            $Availability_STATUS = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime', 'TillNow'])
                                    ->where('Vessel', $Vessel->VesselName) 
                                    ->where('EndDate', '>=', $STARTDATE) 
                                    ->orWhere(function($query) use ($Vessel) {
                                        $query->where('Vessel', $Vessel->VesselName) 
                                                ->where('TillNow', 'YES');
                                    })
                                    ->orderBy('StartDate', 'DESC') 
                                    ->orderBy('StartTime', 'DESC') 
                                    ->orderBy('EndTime', 'DESC')
                                    ->first(); 
            $Availability_STATUS_2 = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime', 'TillNow'])
                                    ->where('Vessel', $Vessel->VesselName)  
                                    ->where('EndDate', '>=', $STARTDATE) 
                                    ->orWhere(function($query) use ($Vessel) {
                                        $query->where('Vessel', $Vessel->VesselName) 
                                                ->where('TillNow', 'YES');
                                    })
                                    ->orderBy('StartDate', 'DESC') 
                                    ->orderBy('StartTime', 'DESC') 
                                    ->orderBy('EndTime', 'DESC')
                                    ->first();
            }
            $StartDate = $Availability_STATUS->StartDate ?? '00:00';
            $EndDate = $Availability_STATUS->EndDate ?? '00:00';
            if (!empty($Availability_STATUS->TillNow)) {
                if ($Availability_STATUS->TillNow == 'YES') {
                    $EndDate = date('Y-m-d');
                }
            } 
            $StartDate_2 = $Availability_STATUS_2->StartDate ?? '00:00';
            $EndDate_2 = $Availability_STATUS_2->EndDate ?? '00:00';  
            $StartTime = \Carbon\Carbon::parse($Availability_STATUS->StartTime ?? '00:00')->format('H:i').' HRS'; 
            $EndTime = \Carbon\Carbon::parse($Availability_STATUS->EndTime ?? '00:00')->format('H:i').' HRS'; 
            $StartTime_2 = \Carbon\Carbon::parse($Availability_STATUS_2->StartTime ?? '00:00')->format('H:i').' HRS'; 
            $EndTime_2 = \Carbon\Carbon::parse($Availability_STATUS_2->EndTime ?? '00:00')->format('H:i').' HRS'; 
            if (!empty($Availability_STATUS_2->TillNow)) {
                if ($Availability_STATUS_2->TillNow == 'YES') {
                    $EndDate_2 = date('Y-m-d');
                    $EndTime_2 = \Carbon\Carbon::parse(date('H:i') ?? '00:00')->format('H:i').' HRS'; 
                }
            }
        @endphp
        <div class="list tooltip-x"> 
            @if ($EndDate === $StartDate)  
                <span class="Hide tooltip-x-span"><div class="{{ strtolower($Availability_STATUS_2->Status ?? 'READY TO GO') }} tooltip-x-div"></div> On {{ $Availability_STATUS_2->Status ?? 'READY TO GO' }} <br> {{ $StartTime_2 }} - {{ $EndTime_2 }}</span>
            @else
                <span class="Hide tooltip-x-span"><div class="{{ strtolower($Availability_STATUS->Status ?? '') }} tooltip-x-div"></div> On {{ $Availability_STATUS->Status ?? 'READY TO GO' }} <br> {{ $StartTime }} - {{ $EndTime_2 }}</span>
            @endif
            <div class="inner -x">  
                <img class="OpenMaintenanceInfoIcon" src="{{ asset('images/ship (2).png') }}" alt="">
                <div class="Hide">{{ strtolower($Availability_STATUS->Status ?? 'READY TO GO') }}</div>
                <div class="Hide"> {{ $Vessel->VesselName }}</div>
                <strong class="notification-wrapper">
                    @include('Components.Includes.VesselStats_DATA')
                    <span class="status-x  {{ strtolower($Availability_STATUS->Status ?? 'READY TO GO') }}
                    "></span>
                    <span class="vessel-name--">{{ $Vessel->VesselName }}</span>  
                    <span class="imo availability-status {{ strtolower($Availability_STATUS->Status ?? 'READY TO GO') }} {{ $Availability_STATUS->Status ?? 'ready' == 'IDLE' ? 'ready' : $Availability_STATUS->Status ?? 'ready' }}
                        status-1">
                        @if (!empty($Availability_STATUS->TillNow) == 'YES')
                            {{ (($Availability_STATUS->Status ?? 'READY') == 'IDLE' ? 'READY' : (($Availability_STATUS->Status ?? 'READY') == 'BUNKERY' ? 'BUNKERING' : $Availability_STATUS->Status ?? 'READY')) }}
                        @else
                            {{ (($Availability_STATUS->Status ?? 'READY TO GO') == 'IDLE' ? 'READY' : $Availability_STATUS->Status ?? 'READY') ?? 'READY TO GO' }}
                        @endif
                    </span>
                </strong>  
                <img class="ReportPdfButtonForVessels" src="{{ asset('images/pdf.png') }}">
                <span class="Hide">{{ $Vessel->VesselName }}</span>
            </div>
        </div> 
        @endforeach
        @php
            $Multicat = \DB::table('vessels_vessel_information')->select(['VesselName', 'VesselType', 'Company', 'ImoNumber', 'CallSign'])->where('Company', $Comapny->Alias)->where('VesselType', 'MULTICAT')->get();
        @endphp
        <h3 class="vessel-type-heading">MULTICATS :: {{ count($Multicat) }}</h3> 
        @unless (count($Multicat) > 0)
            <span>
                No data available..
            </span>
        @endunless
        @foreach ($Multicat as $Vessel)
        @php 
            if (isset($_GET['FromDate_FILTERBYDATE']) AND isset($_GET['EndDate_FILTERBYDATE']) AND empty($_GET['SpecificDay'])) {
                $Availability_STATUS = \DB::table('vessel_availabilities')->select(['Vessel', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName)
                                        ->whereBetween('StartDate', [$_GET['FromDate_FILTERBYDATE'], $_GET['EndDate_FILTERBYDATE']])
                                        ->whereNotNull('Status') 
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first(); 
                $Availability_STATUS_2 = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName) 
                                        ->whereBetween('StartDate', [$_GET['FromDate_FILTERBYDATE'], $_GET['EndDate_FILTERBYDATE']])
                                        ->whereNotNull('Status') 
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first();
            } elseif (!(empty($_GET['SpecificDay']))) {
                $Availability_STATUS = \DB::table('vessel_availabilities')->select(['Vessel', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName)
                                        ->where('StartDate', $_GET['SpecificDay'])
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first(); 
                $Availability_STATUS_2 = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName) 
                                        ->where('StartDate', $_GET['SpecificDay'])
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first();
            } else {
            $Availability_STATUS = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime', 'TillNow'])
                                    ->where('Vessel', $Vessel->VesselName) 
                                    ->where('EndDate', '>=', $STARTDATE) 
                                    ->orWhere(function($query) use ($Vessel) {
                                        $query->where('Vessel', $Vessel->VesselName) 
                                                ->where('TillNow', 'YES');
                                    })
                                    ->orderBy('StartDate', 'DESC') 
                                    ->orderBy('StartTime', 'DESC') 
                                    ->orderBy('EndTime', 'DESC')
                                    ->first(); 
            $Availability_STATUS_2 = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime', 'TillNow'])
                                    ->where('Vessel', $Vessel->VesselName) 
                                    ->where('EndDate', '>=', $STARTDATE) 
                                    ->orWhere(function($query) use ($Vessel) {
                                        $query->where('Vessel', $Vessel->VesselName) 
                                                ->where('TillNow', 'YES');
                                    })
                                    ->orderBy('StartDate', 'DESC') 
                                    ->orderBy('StartTime', 'DESC') 
                                    ->orderBy('EndTime', 'DESC')
                                    ->first();
            }
            $StartDate = $Availability_STATUS->StartDate ?? '00:00';
            $EndDate = $Availability_STATUS->EndDate ?? '00:00';
            if (!empty($Availability_STATUS->TillNow)) {
                if ($Availability_STATUS->TillNow == 'YES') {
                    $EndDate = date('Y-m-d');
                }
            } 
            $StartDate_2 = $Availability_STATUS_2->StartDate ?? '00:00';
            $EndDate_2 = $Availability_STATUS_2->EndDate ?? '00:00';  
            $StartTime = \Carbon\Carbon::parse($Availability_STATUS->StartTime ?? '00:00')->format('H:i').' HRS'; 
            $EndTime = \Carbon\Carbon::parse($Availability_STATUS->EndTime ?? '00:00')->format('H:i').' HRS'; 
            $StartTime_2 = \Carbon\Carbon::parse($Availability_STATUS_2->StartTime ?? '00:00')->format('H:i').' HRS'; 
            $EndTime_2 = \Carbon\Carbon::parse($Availability_STATUS_2->EndTime ?? '00:00')->format('H:i').' HRS'; 
            if (!empty($Availability_STATUS_2->TillNow)) {
                if ($Availability_STATUS_2->TillNow == 'YES') {
                    $EndDate_2 = date('Y-m-d');
                    $EndTime_2 = \Carbon\Carbon::parse(date('H:i') ?? '00:00')->format('H:i').' HRS'; 
                }
            }
        @endphp
        <div class="list tooltip-x"> 
            @if ($EndDate === $StartDate)  
                <span class="Hide tooltip-x-span"><div class="{{ strtolower($Availability_STATUS_2->Status ?? 'READY TO GO') }} tooltip-x-div"></div> On {{ $Availability_STATUS_2->Status ?? 'READY TO GO' }} <br> {{ $StartTime_2 }} - {{ $EndTime_2 }}</span>
            @else
                <span class="Hide tooltip-x-span"><div class="{{ strtolower($Availability_STATUS->Status ?? '') }} tooltip-x-div"></div> On {{ $Availability_STATUS->Status ?? 'READY TO GO' }} <br> {{ $StartTime }} - {{ $EndTime_2 }}</span>
            @endif
            <div class="inner -x">  
                <img class="OpenMaintenanceInfoIcon" src="{{ asset('images/ship (2).png') }}" alt="">
                <div class="Hide">{{ strtolower($Availability_STATUS->Status ?? 'READY TO GO') }}</div>
                <div class="Hide"> {{ $Vessel->VesselName }}</div>
                <strong class="notification-wrapper">
                    @include('Components.Includes.VesselStats_DATA')
                    <span class="status-x  {{ strtolower($Availability_STATUS->Status ?? 'READY TO GO') }}
                    "></span>
                    <span class="vessel-name--">{{ $Vessel->VesselName }}</span>  
                    <span class="imo availability-status {{ strtolower($Availability_STATUS->Status ?? 'READY TO GO') }} {{ $Availability_STATUS->Status ?? 'ready' == 'IDLE' ? 'ready' : $Availability_STATUS->Status ?? 'ready' }}
                        status-1">
                        @if (!empty($Availability_STATUS->TillNow) == 'YES')
                            {{ (($Availability_STATUS->Status ?? 'READY') == 'IDLE' ? 'READY' : (($Availability_STATUS->Status ?? 'READY') == 'BUNKERY' ? 'BUNKERING' : $Availability_STATUS->Status ?? 'READY')) }}
                        @else
                            {{ (($Availability_STATUS->Status ?? 'READY TO GO') == 'IDLE' ? 'READY' : $Availability_STATUS->Status ?? 'READY') ?? 'READY TO GO' }}
                        @endif
                    </span>
                </strong>  
                <img class="ReportPdfButtonForVessels" src="{{ asset('images/pdf.png') }}">
                <span class="Hide">{{ $Vessel->VesselName }}</span>
            </div>
        </div> 
        @endforeach
        @php
            $Survey = \DB::table('vessels_vessel_information')->select(['VesselName', 'VesselType', 'Company', 'ImoNumber', 'CallSign'])->where('Company', $Comapny->Alias)->where('VesselType', 'SURVEY')->get();
        @endphp
        <h3 class="vessel-type-heading">SURVEY :: {{ count($Survey) }}</h3> 
        @unless (count($Survey) > 0)
            <span>
                No data available..
            </span>
        @endunless
        @foreach ($Survey as $Vessel)
        @php 
            if (isset($_GET['FromDate_FILTERBYDATE']) AND isset($_GET['EndDate_FILTERBYDATE']) AND empty($_GET['SpecificDay'])) {
                $Availability_STATUS = \DB::table('vessel_availabilities')->select(['Vessel', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName)
                                        ->whereBetween('StartDate', [$_GET['FromDate_FILTERBYDATE'], $_GET['EndDate_FILTERBYDATE']])
                                        ->whereNotNull('Status') 
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first(); 
                $Availability_STATUS_2 = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName) 
                                        ->whereBetween('StartDate', [$_GET['FromDate_FILTERBYDATE'], $_GET['EndDate_FILTERBYDATE']])
                                        ->whereNotNull('Status') 
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first();
            } elseif (!(empty($_GET['SpecificDay']))) {
                $Availability_STATUS = \DB::table('vessel_availabilities')->select(['Vessel', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName)
                                        ->where('StartDate', $_GET['SpecificDay'])
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first(); 
                $Availability_STATUS_2 = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName) 
                                        ->where('StartDate', $_GET['SpecificDay'])
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first();
            } else {
            $Availability_STATUS = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime', 'TillNow'])
                                    ->where('Vessel', $Vessel->VesselName) 
                                    ->where('EndDate', '>=', $STARTDATE) 
                                    ->orWhere(function($query) use ($Vessel) {
                                        $query->where('Vessel', $Vessel->VesselName) 
                                                ->where('TillNow', 'YES');
                                    })
                                    ->orderBy('StartDate', 'DESC') 
                                    ->orderBy('StartTime', 'DESC') 
                                    ->orderBy('EndTime', 'DESC')
                                    ->first(); 
            $Availability_STATUS_2 = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime', 'TillNow'])
                                    ->where('Vessel', $Vessel->VesselName)  
                                    ->where('EndDate', '>=', $STARTDATE)
                                    ->orWhere(function($query) use ($Vessel) {
                                        $query->where('Vessel', $Vessel->VesselName) 
                                                ->where('TillNow', 'YES');
                                    })
                                    ->orderBy('StartDate', 'DESC') 
                                    ->orderBy('StartTime', 'DESC') 
                                    ->orderBy('EndTime', 'DESC')
                                    ->first();
            }
            $StartDate = $Availability_STATUS->StartDate ?? '00:00';
            $EndDate = $Availability_STATUS->EndDate ?? '00:00';
            if (!empty($Availability_STATUS->TillNow)) {
                if ($Availability_STATUS->TillNow == 'YES') {
                    $EndDate = date('Y-m-d');
                }
            } 
            $StartDate_2 = $Availability_STATUS_2->StartDate ?? '00:00';
            $EndDate_2 = $Availability_STATUS_2->EndDate ?? '00:00';  
            $StartTime = \Carbon\Carbon::parse($Availability_STATUS->StartTime ?? '00:00')->format('H:i').' HRS'; 
            $EndTime = \Carbon\Carbon::parse($Availability_STATUS->EndTime ?? '00:00')->format('H:i').' HRS'; 
            $StartTime_2 = \Carbon\Carbon::parse($Availability_STATUS_2->StartTime ?? '00:00')->format('H:i').' HRS'; 
            $EndTime_2 = \Carbon\Carbon::parse($Availability_STATUS_2->EndTime ?? '00:00')->format('H:i').' HRS'; 
            if (!empty($Availability_STATUS_2->TillNow)) {
                if ($Availability_STATUS_2->TillNow == 'YES') {
                    $EndDate_2 = date('Y-m-d');
                    $EndTime_2 = \Carbon\Carbon::parse(date('H:i') ?? '00:00')->format('H:i').' HRS'; 
                }
            }
        @endphp
        <div class="list tooltip-x"> 
            @if ($EndDate === $StartDate)  
                <span class="Hide tooltip-x-span"><div class="{{ strtolower($Availability_STATUS_2->Status ?? 'READY TO GO') }} tooltip-x-div"></div> On {{ $Availability_STATUS_2->Status ?? 'READY TO GO' }} <br> {{ $StartTime_2 }} - {{ $EndTime_2 }}</span>
            @else
                <span class="Hide tooltip-x-span"><div class="{{ strtolower($Availability_STATUS->Status ?? '') }} tooltip-x-div"></div> On {{ $Availability_STATUS->Status ?? 'READY TO GO' }} <br> {{ $StartTime }} - {{ $EndTime_2 }}</span>
            @endif
            <div class="inner -x">  
                <img class="OpenMaintenanceInfoIcon" src="{{ asset('images/ship (2).png') }}" alt="">
                <div class="Hide">{{ strtolower($Availability_STATUS->Status ?? 'READY TO GO') }}</div>
                <div class="Hide"> {{ $Vessel->VesselName }}</div>
                <strong class="notification-wrapper">
                    @include('Components.Includes.VesselStats_DATA')
                    <span class="status-x  {{ strtolower($Availability_STATUS->Status ?? 'READY TO GO') }}
                    "></span>
                    <span class="vessel-name--">{{ $Vessel->VesselName }}</span>  
                    <span class="imo availability-status {{ strtolower($Availability_STATUS->Status ?? 'READY TO GO') }} {{ $Availability_STATUS->Status ?? 'ready' == 'IDLE' ? 'ready' : $Availability_STATUS->Status ?? 'ready' }}
                        status-1">
                        @if (!empty($Availability_STATUS->TillNow) == 'YES')
                            {{ (($Availability_STATUS->Status ?? 'READY') == 'IDLE' ? 'READY' : (($Availability_STATUS->Status ?? 'READY') == 'BUNKERY' ? 'BUNKERING' : $Availability_STATUS->Status ?? 'READY')) }}
                        @else
                            {{ (($Availability_STATUS->Status ?? 'READY TO GO') == 'IDLE' ? 'READY' : $Availability_STATUS->Status ?? 'READY') ?? 'READY TO GO' }}
                        @endif
                    </span>
                </strong>  
                <img class="ReportPdfButtonForVessels" src="{{ asset('images/pdf.png') }}">
                <span class="Hide">{{ $Vessel->VesselName }}</span>
            </div>
        </div> 
        @endforeach 
        @php
            $SpeedBoats = \DB::table('vessels_vessel_information')->select(['VesselName', 'VesselType', 'Company', 'ImoNumber', 'CallSign'])->where('Company', $Comapny->Alias)->where('VesselType', 'SPEED BOAT')->get();
        @endphp
        <h3 class="vessel-type-heading">SPEED BOATS :: {{ count($SpeedBoats) }}</h3> 
        @unless (count($SpeedBoats) > 0)
            <span>
                No data available..
            </span>
        @endunless
        @foreach ($SpeedBoats as $Vessel)
        @php 
            if (isset($_GET['FromDate_FILTERBYDATE']) AND isset($_GET['EndDate_FILTERBYDATE']) AND empty($_GET['SpecificDay'])) {
                $Availability_STATUS = \DB::table('vessel_availabilities')->select(['Vessel', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName)
                                        ->whereBetween('StartDate', [$_GET['FromDate_FILTERBYDATE'], $_GET['EndDate_FILTERBYDATE']])
                                        ->whereNotNull('Status') 
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first(); 
                $Availability_STATUS_2 = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName) 
                                        ->whereBetween('StartDate', [$_GET['FromDate_FILTERBYDATE'], $_GET['EndDate_FILTERBYDATE']])
                                        ->whereNotNull('Status') 
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first();
            } elseif (!(empty($_GET['SpecificDay']))) {
                $Availability_STATUS = \DB::table('vessel_availabilities')->select(['Vessel', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName)
                                        ->where('StartDate', $_GET['SpecificDay'])
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first(); 
                $Availability_STATUS_2 = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName) 
                                        ->where('StartDate', $_GET['SpecificDay'])
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first();
            } else {
            $Availability_STATUS = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime', 'TillNow'])
                                    ->where('Vessel', $Vessel->VesselName) 
                                    ->where('EndDate', '>=', $STARTDATE) 
                                    ->orWhere(function($query) use ($Vessel) {
                                        $query->where('Vessel', $Vessel->VesselName) 
                                                ->where('TillNow', 'YES');
                                    })
                                    ->orderBy('StartDate', 'DESC') 
                                    ->orderBy('StartTime', 'DESC') 
                                    ->orderBy('EndTime', 'DESC')
                                    ->first(); 
            $Availability_STATUS_2 = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime', 'TillNow'])
                                    ->where('Vessel', $Vessel->VesselName) 
                                    ->where('EndDate', '>=', $STARTDATE) 
                                    ->orWhere(function($query) use ($Vessel) {
                                        $query->where('Vessel', $Vessel->VesselName) 
                                                ->where('TillNow', 'YES');
                                    })
                                    ->orderBy('StartDate', 'DESC') 
                                    ->orderBy('StartTime', 'DESC') 
                                    ->orderBy('EndTime', 'DESC')
                                    ->first();
            }
            $StartDate = $Availability_STATUS->StartDate ?? '00:00';
            $EndDate = $Availability_STATUS->EndDate ?? '00:00';
            if (!empty($Availability_STATUS->TillNow)) {
                if ($Availability_STATUS->TillNow == 'YES') {
                    $EndDate = date('Y-m-d');
                }
            } 
            $StartDate_2 = $Availability_STATUS_2->StartDate ?? '00:00';
            $EndDate_2 = $Availability_STATUS_2->EndDate ?? '00:00';  
            $StartTime = \Carbon\Carbon::parse($Availability_STATUS->StartTime ?? '00:00')->format('H:i').' HRS'; 
            $EndTime = \Carbon\Carbon::parse($Availability_STATUS->EndTime ?? '00:00')->format('H:i').' HRS'; 
            $StartTime_2 = \Carbon\Carbon::parse($Availability_STATUS_2->StartTime ?? '00:00')->format('H:i').' HRS'; 
            $EndTime_2 = \Carbon\Carbon::parse($Availability_STATUS_2->EndTime ?? '00:00')->format('H:i').' HRS'; 
            if (!empty($Availability_STATUS_2->TillNow)) {
                if ($Availability_STATUS_2->TillNow == 'YES') {
                    $EndDate_2 = date('Y-m-d');
                    $EndTime_2 = \Carbon\Carbon::parse(date('H:i') ?? '00:00')->format('H:i').' HRS'; 
                }
            }
        @endphp
        <div class="list tooltip-x"> 
            @if ($EndDate === $StartDate)  
                <span class="Hide tooltip-x-span"><div class="{{ strtolower($Availability_STATUS_2->Status ?? 'READY TO GO') }} tooltip-x-div"></div> On {{ $Availability_STATUS_2->Status ?? 'READY TO GO' }} <br> {{ $StartTime_2 }} - {{ $EndTime_2 }}</span>
            @else
                <span class="Hide tooltip-x-span"><div class="{{ strtolower($Availability_STATUS->Status ?? '') }} tooltip-x-div"></div> On {{ $Availability_STATUS->Status ?? 'READY TO GO' }} <br> {{ $StartTime }} - {{ $EndTime_2 }}</span>
            @endif
            <div class="inner -x">  
                <img class="OpenMaintenanceInfoIcon" src="{{ asset('images/ship (2).png') }}" alt="">
                <div class="Hide">{{ strtolower($Availability_STATUS->Status ?? 'READY TO GO') }}</div>
                <div class="Hide"> {{ $Vessel->VesselName }}</div>
                <strong class="notification-wrapper">
                    @include('Components.Includes.VesselStats_DATA')
                    <span class="status-x  {{ strtolower($Availability_STATUS->Status ?? 'READY TO GO') }}
                    "></span>
                    <span class="vessel-name--">{{ $Vessel->VesselName }}</span>  
                    <span class="imo availability-status {{ strtolower($Availability_STATUS->Status ?? 'READY TO GO') }} {{ $Availability_STATUS->Status ?? 'ready' == 'IDLE' ? 'ready' : $Availability_STATUS->Status ?? 'ready' }}
                        status-1">
                        @if (!empty($Availability_STATUS->TillNow) == 'YES')
                            {{ (($Availability_STATUS->Status ?? 'READY') == 'IDLE' ? 'READY' : (($Availability_STATUS->Status ?? 'READY') == 'BUNKERY' ? 'BUNKERING' : $Availability_STATUS->Status ?? 'READY')) }}
                        @else
                            {{ (($Availability_STATUS->Status ?? 'READY TO GO') == 'IDLE' ? 'READY' : $Availability_STATUS->Status ?? 'READY') ?? 'READY TO GO' }}
                        @endif
                    </span>
                </strong>  
                <img class="ReportPdfButtonForVessels" src="{{ asset('images/pdf.png') }}">
                <span class="Hide">{{ $Vessel->VesselName }}</span>
            </div>
        </div> 
        @endforeach
        @php
            $Ploughing = \DB::table('vessels_vessel_information')->select(['VesselName', 'VesselType', 'Company', 'ImoNumber', 'CallSign'])->where('Company', $Comapny->Alias)->where('VesselType', 'PLOUGHING')->get();
        @endphp
        <h3 class="vessel-type-heading">PLOUGHING :: {{ count($Ploughing) }}</h3> 
        @unless (count($Ploughing) > 0)
            <span>
                No data available..
            </span>
        @endunless
        @foreach ($Ploughing as $Vessel)
        @php 
            if (isset($_GET['FromDate_FILTERBYDATE']) AND isset($_GET['EndDate_FILTERBYDATE']) AND empty($_GET['SpecificDay'])) {
                $Availability_STATUS = \DB::table('vessel_availabilities')->select(['Vessel', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName)
                                        ->whereBetween('StartDate', [$_GET['FromDate_FILTERBYDATE'], $_GET['EndDate_FILTERBYDATE']])
                                        ->whereNotNull('Status') 
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first(); 
                $Availability_STATUS_2 = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName) 
                                        ->whereBetween('StartDate', [$_GET['FromDate_FILTERBYDATE'], $_GET['EndDate_FILTERBYDATE']])
                                        ->whereNotNull('Status') 
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first();
            } elseif (!(empty($_GET['SpecificDay']))) {
                $Availability_STATUS = \DB::table('vessel_availabilities')->select(['Vessel', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName)
                                        ->where('StartDate', $_GET['SpecificDay'])
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first(); 
                $Availability_STATUS_2 = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName) 
                                        ->where('StartDate', $_GET['SpecificDay'])
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first();
            } else {
            $Availability_STATUS = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime', 'TillNow'])
                                    ->where('Vessel', $Vessel->VesselName) 
                                    ->where('EndDate', '>=', $STARTDATE) 
                                    ->orWhere(function($query) use ($Vessel) {
                                        $query->where('Vessel', $Vessel->VesselName) 
                                                ->where('TillNow', 'YES');
                                    })
                                    ->orderBy('StartDate', 'DESC') 
                                    ->orderBy('StartTime', 'DESC') 
                                    ->orderBy('EndTime', 'DESC')
                                    ->first(); 
            $Availability_STATUS_2 = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime', 'TillNow'])
                                    ->where('Vessel', $Vessel->VesselName)  
                                    ->where('EndDate', '>=', $STARTDATE) 
                                    ->orWhere(function($query) use ($Vessel) {
                                        $query->where('Vessel', $Vessel->VesselName) 
                                                ->where('TillNow', 'YES');
                                    })
                                    ->orderBy('StartDate', 'DESC') 
                                    ->orderBy('StartTime', 'DESC') 
                                    ->orderBy('EndTime', 'DESC')
                                    ->first();
            }
            $StartDate = $Availability_STATUS->StartDate ?? '00:00';
            $EndDate = $Availability_STATUS->EndDate ?? '00:00';
            if (!empty($Availability_STATUS->TillNow)) {
                if ($Availability_STATUS->TillNow == 'YES') {
                    $EndDate = date('Y-m-d');
                }
            } 
            $StartDate_2 = $Availability_STATUS_2->StartDate ?? '00:00';
            $EndDate_2 = $Availability_STATUS_2->EndDate ?? '00:00'; 
            $StartTime = \Carbon\Carbon::parse($Availability_STATUS->StartTime ?? '00:00')->format('H:i').' HRS'; 
            $EndTime = \Carbon\Carbon::parse($Availability_STATUS->EndTime ?? '00:00')->format('H:i').' HRS'; 
            $StartTime_2 = \Carbon\Carbon::parse($Availability_STATUS_2->StartTime ?? '00:00')->format('H:i').' HRS'; 
            $EndTime_2 = \Carbon\Carbon::parse($Availability_STATUS_2->EndTime ?? '00:00')->format('H:i').' HRS'; 
            if (!empty($Availability_STATUS_2->TillNow)) {
                if ($Availability_STATUS_2->TillNow == 'YES') {
                    $EndDate_2 = date('Y-m-d');
                    $EndTime_2 = \Carbon\Carbon::parse(date('H:i') ?? '00:00')->format('H:i').' HRS'; 
                }
            }
        @endphp
        <div class="list tooltip-x"> 
            @if ($EndDate === $StartDate)  
                <span class="Hide tooltip-x-span"><div class="{{ strtolower($Availability_STATUS_2->Status ?? 'READY TO GO') }} tooltip-x-div"></div> On {{ $Availability_STATUS_2->Status ?? 'READY TO GO' }} <br> {{ $StartTime_2 }} - {{ $EndTime_2 }}</span>
            @else
                <span class="Hide tooltip-x-span"><div class="{{ strtolower($Availability_STATUS->Status ?? '') }} tooltip-x-div"></div> On {{ $Availability_STATUS->Status ?? 'READY TO GO' }} <br> {{ $StartTime }} - {{ $EndTime_2 }}</span>
            @endif
            <div class="inner -x">  
                <img class="OpenMaintenanceInfoIcon" src="{{ asset('images/ship (2).png') }}" alt="">
                <div class="Hide">{{ strtolower($Availability_STATUS->Status ?? 'READY TO GO') }}</div>
                <div class="Hide"> {{ $Vessel->VesselName }}</div>
                <strong class="notification-wrapper">
                    @include('Components.Includes.VesselStats_DATA')
                    <span class="status-x  {{ strtolower($Availability_STATUS->Status ?? 'READY TO GO') }}
                    "></span>
                    <span class="vessel-name--">{{ $Vessel->VesselName }}</span>  
                    <span class="imo availability-status {{ strtolower($Availability_STATUS->Status ?? 'READY TO GO') }} {{ $Availability_STATUS->Status ?? 'ready' == 'IDLE' ? 'ready' : $Availability_STATUS->Status ?? 'ready' }}
                        status-1">
                        @if (!empty($Availability_STATUS->TillNow) == 'YES')
                            {{ (($Availability_STATUS->Status ?? 'READY') == 'IDLE' ? 'READY' : (($Availability_STATUS->Status ?? 'READY') == 'BUNKERY' ? 'BUNKERING' : $Availability_STATUS->Status ?? 'READY')) }}
                        @else
                            {{ (($Availability_STATUS->Status ?? 'READY TO GO') == 'IDLE' ? 'READY' : $Availability_STATUS->Status ?? 'READY') ?? 'READY TO GO' }}
                        @endif
                    </span>
                </strong>  
                <img class="ReportPdfButtonForVessels" src="{{ asset('images/pdf.png') }}">
                <span class="Hide">{{ $Vessel->VesselName }}</span>
            </div>
        </div> 
        @endforeach  
        @php
            $Others = \DB::table('vessels_vessel_information')->select(['VesselName', 'VesselType', 'Company', 'ImoNumber', 'CallSign'])->where('Company', $Comapny->Alias)->where('VesselType', 'OTHERS')->get();
        @endphp
        <h3 class="vessel-type-heading">OTHERS :: {{ count($Others) }}</h3> 
        @unless (count($Others) > 0)
            <span>
                No data available..
            </span>
        @endunless
        @foreach ($Others as $Vessel)
        @php 
            if (isset($_GET['FromDate_FILTERBYDATE']) AND isset($_GET['EndDate_FILTERBYDATE']) AND empty($_GET['SpecificDay'])) {
                $Availability_STATUS = \DB::table('vessel_availabilities')->select(['Vessel', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName)
                                        ->whereBetween('StartDate', [$_GET['FromDate_FILTERBYDATE'], $_GET['EndDate_FILTERBYDATE']])
                                        ->whereNotNull('Status') 
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first(); 
                $Availability_STATUS_2 = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName) 
                                        ->whereBetween('StartDate', [$_GET['FromDate_FILTERBYDATE'], $_GET['EndDate_FILTERBYDATE']])
                                        ->whereNotNull('Status') 
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first();
            } elseif (!(empty($_GET['SpecificDay']))) {
                $Availability_STATUS = \DB::table('vessel_availabilities')->select(['Vessel', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName)
                                        ->where('StartDate', $_GET['SpecificDay'])
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first(); 
                $Availability_STATUS_2 = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime'])
                                        ->where('Vessel', $Vessel->VesselName) 
                                        ->where('StartDate', $_GET['SpecificDay'])
                                        ->orderBy('EndTime', 'DESC') 
                                        ->first();
            } else {
            $Availability_STATUS = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime', 'TillNow'])
                                    ->where('Vessel', $Vessel->VesselName) 
                                    ->where('EndDate', '>=', $STARTDATE) 
                                    ->orWhere(function($query) use ($Vessel) {
                                        $query->where('Vessel', $Vessel->VesselName) 
                                                ->where('TillNow', 'YES');
                                    })
                                    ->orderBy('StartDate', 'DESC') 
                                    ->orderBy('StartTime', 'DESC') 
                                    ->orderBy('EndTime', 'DESC')
                                    ->first(); 
            $Availability_STATUS_2 = \DB::table('vessel_availabilities')->select(['Vessel', 'Comment', 'StartDate', 'EndDate', 'Status', 'StartTime', 'EndTime', 'TillNow'])
                                    ->where('Vessel', $Vessel->VesselName)  
                                    ->where('EndDate', '>=', $STARTDATE) 
                                    ->orWhere(function($query) use ($Vessel) {
                                        $query->where('Vessel', $Vessel->VesselName) 
                                                ->where('TillNow', 'YES');
                                    })
                                    ->orderBy('StartDate', 'DESC') 
                                    ->orderBy('StartTime', 'DESC') 
                                    ->orderBy('EndTime', 'DESC')
                                    ->first();
            }
            $StartDate = $Availability_STATUS->StartDate ?? '00:00';
            $EndDate = $Availability_STATUS->EndDate ?? '00:00';
            if (!empty($Availability_STATUS->TillNow)) {
                if ($Availability_STATUS->TillNow == 'YES') {
                    $EndDate = date('Y-m-d');
                }
            } 
            $StartDate_2 = $Availability_STATUS_2->StartDate ?? '00:00';
            $EndDate_2 = $Availability_STATUS_2->EndDate ?? '00:00';  
            $StartTime = \Carbon\Carbon::parse($Availability_STATUS->StartTime ?? '00:00')->format('H:i').' HRS'; 
            $EndTime = \Carbon\Carbon::parse($Availability_STATUS->EndTime ?? '00:00')->format('H:i').' HRS'; 
            $StartTime_2 = \Carbon\Carbon::parse($Availability_STATUS_2->StartTime ?? '00:00')->format('H:i').' HRS'; 
            $EndTime_2 = \Carbon\Carbon::parse($Availability_STATUS_2->EndTime ?? '00:00')->format('H:i').' HRS'; 
            if (!empty($Availability_STATUS_2->TillNow)) {
                if ($Availability_STATUS_2->TillNow == 'YES') {
                    $EndDate_2 = date('Y-m-d');
                    $EndTime_2 = \Carbon\Carbon::parse(date('H:i') ?? '00:00')->format('H:i').' HRS'; 
                }
            }
        @endphp
        <div class="list tooltip-x"> 
            @if ($EndDate === $StartDate)  
                <span class="Hide tooltip-x-span"><div class="{{ strtolower($Availability_STATUS_2->Status ?? 'READY TO GO') }} tooltip-x-div"></div> On {{ $Availability_STATUS_2->Status ?? 'READY TO GO' }} <br> {{ $StartTime_2 }} - {{ $EndTime_2 }}</span>
            @else
                <span class="Hide tooltip-x-span"><div class="{{ strtolower($Availability_STATUS->Status ?? '') }} tooltip-x-div"></div> On {{ $Availability_STATUS->Status ?? 'READY TO GO' }} <br> {{ $StartTime }} - {{ $EndTime_2 }}</span>
            @endif
            <div class="inner -x">  
                <img class="OpenMaintenanceInfoIcon" src="{{ asset('images/ship (2).png') }}" alt="">
                <div class="Hide">{{ strtolower($Availability_STATUS->Status ?? 'READY TO GO') }}</div>
                <div class="Hide"> {{ $Vessel->VesselName }}</div>
                <strong class="notification-wrapper">
                    @include('Components.Includes.VesselStats_DATA')
                    <span class="status-x  {{ strtolower($Availability_STATUS->Status ?? 'READY TO GO') }}
                    "></span>
                    <span class="vessel-name--">{{ $Vessel->VesselName }}</span>  
                    <span class="imo availability-status {{ strtolower($Availability_STATUS->Status ?? 'READY TO GO') }} {{ $Availability_STATUS->Status ?? 'ready' == 'IDLE' ? 'ready' : $Availability_STATUS->Status ?? 'ready' }}
                        status-1">
                        @if (!empty($Availability_STATUS->TillNow) == 'YES')
                            {{ (($Availability_STATUS->Status ?? 'READY') == 'IDLE' ? 'READY' : (($Availability_STATUS->Status ?? 'READY') == 'BUNKERY' ? 'BUNKERING' : $Availability_STATUS->Status ?? 'READY')) }}
                        @else
                            {{ (($Availability_STATUS->Status ?? 'READY TO GO') == 'IDLE' ? 'READY' : $Availability_STATUS->Status ?? 'READY') ?? 'READY TO GO' }}
                        @endif
                    </span>
                </strong>  
                <img class="ReportPdfButtonForVessels" src="{{ asset('images/pdf.png') }}">
                <span class="Hide">{{ $Vessel->VesselName }}</span>
            </div>
        </div> 
        @endforeach  
    @endforeach
</div>
<div class="content-data availability dashboard"> 
    <div class="dashboard-inner"> 
        <h1 class="dashboard-heading"><svg class="-x" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m136-240-56-56 296-298 160 160 208-206H640v-80h240v240h-80v-104L536-320 376-480 136-240Z"/></svg>Availability Dashboard</h1>
        <button class="RecordAvailabilityButton">+ Record/Schedule Availability</button>
        <button class="FilterByDateButton">+ Filter</button>
        <div class="board-1">
            <div class="div">
                <h1>
                    Vessels <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M192 32c0-17.7 14.3-32 32-32H352c17.7 0 32 14.3 32 32V64h48c26.5 0 48 21.5 48 48V240l44.4 14.8c23.1 7.7 29.5 37.5 11.5 53.9l-101 92.6c-16.2 9.4-34.7 15.1-50.9 15.1c-19.6 0-40.8-7.7-59.2-20.3c-22.1-15.5-51.6-15.5-73.7 0c-17.1 11.8-38 20.3-59.2 20.3c-16.2 0-34.7-5.7-50.9-15.1l-101-92.6c-18-16.5-11.6-46.2 11.5-53.9L96 240V112c0-26.5 21.5-48 48-48h48V32zM160 218.7l107.8-35.9c13.1-4.4 27.3-4.4 40.5 0L416 218.7V128H160v90.7zM306.5 421.9C329 437.4 356.5 448 384 448c26.9 0 55.4-10.8 77.4-26.1l0 0c11.9-8.5 28.1-7.8 39.2 1.7c14.4 11.9 32.5 21 50.6 25.2c17.2 4 27.9 21.2 23.9 38.4s-21.2 27.9-38.4 23.9c-24.5-5.7-44.9-16.5-58.2-25C449.5 501.7 417 512 384 512c-31.9 0-60.6-9.9-80.4-18.9c-5.8-2.7-11.1-5.3-15.6-7.7c-4.5 2.4-9.7 5.1-15.6 7.7c-19.8 9-48.5 18.9-80.4 18.9c-33 0-65.5-10.3-94.5-25.8c-13.4 8.4-33.7 19.3-58.2 25c-17.2 4-34.4-6.7-38.4-23.9s6.7-34.4 23.9-38.4c18.1-4.2 36.2-13.3 50.6-25.2c11.1-9.4 27.3-10.1 39.2-1.7l0 0C136.7 437.2 165.1 448 192 448c27.5 0 55-10.6 77.5-26.1c11.1-7.9 25.9-7.9 37 0z"></path></svg>
                </h1>
                <h2 class="sub-heading">
                    @php
                        $Companies = \DB::table('companies_')->get();
                    @endphp
                    @foreach ($Companies as $Company)
                        {{ $Company->Organization }}/
                    @endforeach
                    FLEET
                </h2>
                <strong class="total">{{ $NumberOfVessels }}</strong> 
                <table>
                    <tr>
                        <th>Ready</th>
                        <th>Bunkering</th>
                        <th>Inspection</th>
                    </tr>
                    <tr>
                        <td class="ready-x"></td>
                        <td class="bunkery-x"></td>
                        <td class="inspection-x"></td> 
                    </tr>
                </table>
                <br>
                <h2>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m136-240-56-56 296-298 160 160 208-206H640v-80h240v240h-80v-104L536-320 376-480 136-240Z"/></svg> BIG DATA 
                    </span> 
                    <span>ANALYTICS</span>
                </h2>
            </div> 
            <div class="div">
                <h1>
                    Other  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M192 32c0-17.7 14.3-32 32-32H352c17.7 0 32 14.3 32 32V64h48c26.5 0 48 21.5 48 48V240l44.4 14.8c23.1 7.7 29.5 37.5 11.5 53.9l-101 92.6c-16.2 9.4-34.7 15.1-50.9 15.1c-19.6 0-40.8-7.7-59.2-20.3c-22.1-15.5-51.6-15.5-73.7 0c-17.1 11.8-38 20.3-59.2 20.3c-16.2 0-34.7-5.7-50.9-15.1l-101-92.6c-18-16.5-11.6-46.2 11.5-53.9L96 240V112c0-26.5 21.5-48 48-48h48V32zM160 218.7l107.8-35.9c13.1-4.4 27.3-4.4 40.5 0L416 218.7V128H160v90.7zM306.5 421.9C329 437.4 356.5 448 384 448c26.9 0 55.4-10.8 77.4-26.1l0 0c11.9-8.5 28.1-7.8 39.2 1.7c14.4 11.9 32.5 21 50.6 25.2c17.2 4 27.9 21.2 23.9 38.4s-21.2 27.9-38.4 23.9c-24.5-5.7-44.9-16.5-58.2-25C449.5 501.7 417 512 384 512c-31.9 0-60.6-9.9-80.4-18.9c-5.8-2.7-11.1-5.3-15.6-7.7c-4.5 2.4-9.7 5.1-15.6 7.7c-19.8 9-48.5 18.9-80.4 18.9c-33 0-65.5-10.3-94.5-25.8c-13.4 8.4-33.7 19.3-58.2 25c-17.2 4-34.4-6.7-38.4-23.9s6.7-34.4 23.9-38.4c18.1-4.2 36.2-13.3 50.6-25.2c11.1-9.4 27.3-10.1 39.2-1.7l0 0C136.7 437.2 165.1 448 192 448c27.5 0 55-10.6 77.5-26.1c11.1-7.9 25.9-7.9 37 0z"></path></svg>
                </h1>
                <h2 class="sub-heading">STATUS</h2>
                <strong style="visibility: hidden;">0</strong>
                <table>
                    <tr>
                        <th class="operation-responsive Hide">Operation</th>
                        <th>Maintenance</th>
                        <th>Docking</th>
                        <th>Breakdown</th> 
                    </tr>
                    <tr> 
                        <td class="operation-responsive Hide">{{ $NumberOfVessels_OPERATION }}</td>
                        <td class="maintenance-x"></td>
                        <td class="docking-x"></td>
                        <td class="breakdown-x"></td>
                    </tr>
                </table> <br>
                <h2>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m136-240-56-56 296-298 160 160 208-206H640v-80h240v240h-80v-104L536-320 376-480 136-240Z"/></svg> LIVE
                    </span> 
                    <span>
                        @if ($STARTDATE == date('Y-m-d'))
                        TODAY
                        @elseif ($STARTDATE == date('Y-m-d', strtotime('yesterday')))
                        YESTERDAY 
                        @elseif (isset($_GET['SpecificDay']) AND !(empty($_GET['SpecificDay'])))
                        {{ $_GET['SpecificDay'] }} 
                        @elseif (isset($_GET['FromDate_FILTERBYDATE']) AND isset($_GET['EndDate_FILTERBYDATE']) AND empty($_GET['SpecificDay']))
                        {{ $_GET['FromDate_FILTERBYDATE'] }} to {{ $_GET['EndDate_FILTERBYDATE'] }}
                        @endif 
                    </span>
                </h2>
            </div> 
            @include('Components.Charts.Chart2') 
            {{-- <div class="div"> --}}
                {{-- <h1>
                    Operation <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M352 124.5l-51.9-13c-6.5-1.6-11.3-7.1-12-13.8s2.8-13.1 8.7-16.1l40.8-20.4L294.4 28.8c-5.5-4.1-7.8-11.3-5.6-17.9S297.1 0 304 0H416h32 16c30.2 0 58.7 14.2 76.8 38.4l57.6 76.8c6.2 8.3 9.6 18.4 9.6 28.8c0 26.5-21.5 48-48 48H538.5c-17 0-33.3-6.7-45.3-18.7L480 160H448v21.5c0 24.8 12.8 47.9 33.8 61.1l106.6 66.6c32.1 20.1 51.6 55.2 51.6 93.1C640 462.9 590.9 512 530.2 512H496 432 32.3c-3.3 0-6.6-.4-9.6-1.4C13.5 507.8 6 501 2.4 492.1C1 488.7 .2 485.2 0 481.4c-.2-3.7 .3-7.3 1.3-10.7c2.8-9.2 9.6-16.7 18.6-20.4c3-1.2 6.2-2 9.5-2.2L433.3 412c8.3-.7 14.7-7.7 14.7-16.1c0-4.3-1.7-8.4-4.7-11.4l-44.4-44.4c-30-30-46.9-70.7-46.9-113.1V181.5v-57zM512 72.3c0-.1 0-.2 0-.3s0-.2 0-.3v.6zm-1.3 7.4L464.3 68.1c-.2 1.3-.3 2.6-.3 3.9c0 13.3 10.7 24 24 24c10.6 0 19.5-6.8 22.7-16.3zM130.9 116.5c16.3-14.5 40.4-16.2 58.5-4.1l130.6 87V227c0 32.8 8.4 64.8 24 93H112c-6.7 0-12.7-4.2-15-10.4s-.5-13.3 4.6-17.7L171 232.3 18.4 255.8c-7 1.1-13.9-2.6-16.9-9s-1.5-14.1 3.8-18.8L130.9 116.5z"></path></svg>
                </h1>
                <h2 class="sub-heading">Activities</h2>
                <strong>{{ $NumberOfVessels_OPERATION }}</strong> <br>
                <h2>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m136-240-56-56 296-298 160 160 208-206H640v-80h240v240h-80v-104L536-320 376-480 136-240Z"/></svg> N.C.V 
                    </span> 
                    <span>Since 12:00AM</span>
                </h2> --}}
            {{-- </div>   --}}
        </div>  
        <div class="board-1 board-x">
            <div class="div indicators">
                <h1>
                    Indicators <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M352 124.5l-51.9-13c-6.5-1.6-11.3-7.1-12-13.8s2.8-13.1 8.7-16.1l40.8-20.4L294.4 28.8c-5.5-4.1-7.8-11.3-5.6-17.9S297.1 0 304 0H416h32 16c30.2 0 58.7 14.2 76.8 38.4l57.6 76.8c6.2 8.3 9.6 18.4 9.6 28.8c0 26.5-21.5 48-48 48H538.5c-17 0-33.3-6.7-45.3-18.7L480 160H448v21.5c0 24.8 12.8 47.9 33.8 61.1l106.6 66.6c32.1 20.1 51.6 55.2 51.6 93.1C640 462.9 590.9 512 530.2 512H496 432 32.3c-3.3 0-6.6-.4-9.6-1.4C13.5 507.8 6 501 2.4 492.1C1 488.7 .2 485.2 0 481.4c-.2-3.7 .3-7.3 1.3-10.7c2.8-9.2 9.6-16.7 18.6-20.4c3-1.2 6.2-2 9.5-2.2L433.3 412c8.3-.7 14.7-7.7 14.7-16.1c0-4.3-1.7-8.4-4.7-11.4l-44.4-44.4c-30-30-46.9-70.7-46.9-113.1V181.5v-57zM512 72.3c0-.1 0-.2 0-.3s0-.2 0-.3v.6zm-1.3 7.4L464.3 68.1c-.2 1.3-.3 2.6-.3 3.9c0 13.3 10.7 24 24 24c10.6 0 19.5-6.8 22.7-16.3zM130.9 116.5c16.3-14.5 40.4-16.2 58.5-4.1l130.6 87V227c0 32.8 8.4 64.8 24 93H112c-6.7 0-12.7-4.2-15-10.4s-.5-13.3 4.6-17.7L171 232.3 18.4 255.8c-7 1.1-13.9-2.6-16.9-9s-1.5-14.1 3.8-18.8L130.9 116.5z"></path></svg>
                </h1> 
                <div class="indicators-wrapper">
                    <div class="indicators-inner">
                        <div class="indicators-inner-x">
                            <span class="docking"></span> 
                            <span class="FilterDocking">DOCKING</span>
                        </div>
                        <div class="indicators-inner-x">
                            <span class="inspection"></span> 
                            <span class="FilterInspection">INSPECTION</span>
                        </div>
                        <div class="indicators-inner-x">
                            <span class="bunkery"></span> 
                            <span class="FilterBunkering">BUNKERING</span>
                        </div>
                    </div>
                    <div class="indicators-inner">
                        <div class="indicators-inner-x">
                            <span class="breakdown"></span> 
                            <span class="FilterBreakdown">BREAKDOWN</span>
                        </div>
                        <div class="indicators-inner-x">
                            <span class="idle"></span> 
                            <span class="FilterReady">READY TO GO</span>
                        </div> 
                        <div class="indicators-inner-x">
                            <span class="maintenance"></span> 
                            <span class="FilterMaintenance">MAINTENANCE</span>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="div tracking">
                <h1>
                    Tracking (Status)  
                </h1>  
                <table>
                    <tr>
                        <th>VESSEL</th>
                        <th>00:00 - 02:59</th>`
                        <th>03:00 - 05:59</th>
                        <th>06:00 - 08:59</th>
                        <th>09:00 - 11:59</th>
                        <th>12:00 - 14:59</th>
                        <th>15:00 - 17:59</th>
                        <th>18:00 - 20:59</th>
                        <th>21:00 - 23:59</th>
                    </tr>
                    @foreach ($Vessels as $Vessel)
                    @php 
                        $Vessel_ = \DB::table('vessel_availabilities')->where('Vessel', $Vessel->VesselName)->first();
                        if (isset($_GET['FromDate_FILTERBYDATE']) AND isset($_GET['EndDate_FILTERBYDATE']) AND empty($_GET['SpecificDay'])) {
                            $Vessel_STARTIME = \DB::table('vessel_availabilities') 
                                                ->where('Vessel', $Vessel->VesselName)
                                                // ->whereBetween('StartDate', [$_GET['FromDate_FILTERBYDATE'], $_GET['EndDate_FILTERBYDATE']])
                                                ->whereBetween('EndDate', [$_GET['FromDate_FILTERBYDATE'], $_GET['EndDate_FILTERBYDATE']])
                                                ->orderBy('DateIn', 'DESC')
                                                ->orderBy('TimeIn', 'DESC')
                                                ->get();
                        } elseif (!(empty($_GET['SpecificDay']))) {
                            $Vessel_STARTIME = \DB::table('vessel_availabilities') 
                                                ->where('Vessel', $Vessel->VesselName)
                                                ->where('StartDate', '<=', $_GET['SpecificDay'])
                                                ->where('EndDate', '>=', $_GET['SpecificDay']) 
                                                ->orderBy('DateIn', 'DESC')
                                                ->orderBy('TimeIn', 'DESC')
                                                ->get();
                        } else {
                            $Vessel_STARTIME = \DB::table('vessel_availabilities') 
                                            ->where('Vessel', $Vessel->VesselName)
                                            ->where('StartDate', '<=', date('Y-m-d'))
                                            ->where('EndDate', '>=', date('Y-m-d')) 
                                            ->orWhere(function($query) use ($Vessel) {
                                                $query->where('Vessel', $Vessel->VesselName)
                                                        ->where('TillNow', 'YES');
                                            })
                                            ->orderBy('DateIn', 'DESC')
                                            ->orderBy('TimeIn', 'DESC')
                                            ->paginate(30);
                        }
                    @endphp
                    <tr>
                        <td>{{ $Vessel_->Vessel ?? '-' }}</td>
                        <td> 
                            <div class="flex">  
                                @foreach ($Vessel_STARTIME as $Vessel)    
                                    @php 
                                        $StartTime = \Carbon\Carbon::parse($Vessel->StartDate . ' ' . $Vessel->StartTime);
                                        $EndTime = \Carbon\Carbon::parse($Vessel->EndDate . ' ' . $Vessel->EndTime);
                                        $Status = strtolower($Vessel->Status); 
                                        if (!empty($Vessel->TillNow)) {
                                            if ($Vessel->TillNow == 'YES') {
                                                $EndTime = (($Vessel->EndDate == $Vessel->StartDate) AND ($EndTime <= date('H:i'))) ? $EndTime : \Carbon\Carbon::parse(date('Y-m-d') . ' ' . date('H:i'));
                                            }   
                                        }
                                    @endphp 
                                    @if (
                                        ($StartTime >= \Carbon\Carbon::parse($STARTDATE . ' 00:00') AND 
                                        $StartTime < \Carbon\Carbon::parse($STARTDATE . ' 03:00')) ||
                                        ($EndTime >= \Carbon\Carbon::parse($STARTDATE . ' 00:00') AND 
                                        $EndTime < \Carbon\Carbon::parse($STARTDATE . ' 03:00')) ||
                                        ($StartTime < \Carbon\Carbon::parse($STARTDATE . ' 00:00') AND 
                                        $EndTime >= \Carbon\Carbon::parse($STARTDATE . ' 03:00'))
                                    )
                                        <div class="{{ $Status }} status tooltip-x">
                                            <span class="Hide tooltip-x-span"><div class="{{ $Status }} tooltip-x-div"></div> On {{ $Status }} <br> {{ $StartTime->format('H:i').' HRS' }} - {{ $EndTime->format('H:i').' HRS' }}
                                            @if (isset($_GET['FromDate_FILTERBYDATE']))
                                                <br>
                                                @ {{ $Vessel->StartDate }} 
                                                @if ($Vessel->EndDate > $Vessel->StartDate)
                                                    <br> &nbsp;&nbsp;&nbsp; {{ $Vessel->EndDate }}
                                                @endif
                                            @endif
                                         </span>
                                        </div>
                                    @endif  
                                @endforeach
                            </div>
                        </td>
                        <td>  
                            <div class="flex">
                                @foreach ($Vessel_STARTIME as $Vessel) 
                                    @php 
                                        $StartTime = \Carbon\Carbon::parse($Vessel->StartDate . ' ' . $Vessel->StartTime);
                                        $EndTime = \Carbon\Carbon::parse($Vessel->EndDate . ' ' . $Vessel->EndTime);
                                        $Status = strtolower($Vessel->Status);
                                        if (!empty($Vessel->TillNow)) {
                                            if ($Vessel->TillNow == 'YES') {
                                                $EndTime = (($Vessel->EndDate == $Vessel->StartDate) AND ($EndTime <= date('H:i'))) ? $EndTime : \Carbon\Carbon::parse(date('Y-m-d') . ' ' . date('H:i'));
                                            }   
                                        }
                                    @endphp  
                                    @if (
                                        ($StartTime >= \Carbon\Carbon::parse($STARTDATE . ' 03:00') AND 
                                        $StartTime < \Carbon\Carbon::parse($STARTDATE . ' 06:00')) ||
                                        ($EndTime >= \Carbon\Carbon::parse($STARTDATE . ' 03:00') AND 
                                        $EndTime < \Carbon\Carbon::parse($STARTDATE . ' 06:00')) ||
                                        ($StartTime < \Carbon\Carbon::parse($STARTDATE . ' 03:00') AND 
                                        $EndTime >= \Carbon\Carbon::parse($STARTDATE . ' 06:00'))
                                    )
                                        <div class="{{ $Status }} status tooltip-x">
                                            <span class="Hide tooltip-x-span"><div class="{{ $Status }} tooltip-x-div"></div> On {{ $Status }} <br> {{ $StartTime->format('H:i').' HRS' }} - {{ $EndTime->format('H:i').' HRS' }}
                                            @if (isset($_GET['FromDate_FILTERBYDATE']))
                                                <br>
                                                @ {{ $Vessel->StartDate }} 
                                                @if ($Vessel->EndDate > $Vessel->StartDate)
                                                    <br> &nbsp;&nbsp;&nbsp; {{ $Vessel->EndDate }}
                                                @endif
                                            @endif
                                         </span>
                                        </div>
                                    @endif  
                                @endforeach 
                            </div>
                        </td> 
                        <td>
                            <div class="flex">
                                @foreach ($Vessel_STARTIME as $Vessel) 
                                    @php 
                                        $StartTime = \Carbon\Carbon::parse($Vessel->StartDate . ' ' . $Vessel->StartTime);
                                        $EndTime = \Carbon\Carbon::parse($Vessel->EndDate . ' ' . $Vessel->EndTime);
                                        $Status = strtolower($Vessel->Status);
                                        if (!empty($Vessel->TillNow)) {
                                            if ($Vessel->TillNow == 'YES') {
                                                $EndTime = (($Vessel->EndDate == $Vessel->StartDate) AND ($EndTime <= date('H:i'))) ? $EndTime : \Carbon\Carbon::parse(date('Y-m-d') . ' ' . date('H:i'));
                                            }   
                                        }
                                    @endphp  
                                    @if (
                                        ($StartTime >= \Carbon\Carbon::parse($STARTDATE . ' 06:00') AND 
                                        $StartTime < \Carbon\Carbon::parse($STARTDATE . ' 09:00')) ||
                                        ($EndTime >= \Carbon\Carbon::parse($STARTDATE . ' 06:00') AND 
                                        $EndTime < \Carbon\Carbon::parse($STARTDATE . ' 09:00')) ||
                                        ($StartTime < \Carbon\Carbon::parse($STARTDATE . ' 06:00') AND 
                                        $EndTime >= \Carbon\Carbon::parse($STARTDATE . ' 09:00'))
                                    )
                                        <div class="{{ $Status }} status tooltip-x">
                                            <span class="Hide tooltip-x-span"><div class="{{ $Status }} tooltip-x-div"></div> On {{ $Status }} <br> {{ $StartTime->format('H:i').' HRS' }} - {{ $EndTime->format('H:i').' HRS' }}
                                            @if (isset($_GET['FromDate_FILTERBYDATE']))
                                                <br>
                                                @ {{ $Vessel->StartDate }} 
                                                @if ($Vessel->EndDate > $Vessel->StartDate)
                                                    <br> &nbsp;&nbsp;&nbsp; {{ $Vessel->EndDate }}
                                                @endif
                                            @endif
                                         </span>
                                        </div>
                                    @endif  
                                @endforeach
                            </div> 
                        </td>
                        <td>
                            <div class="flex">
                                @foreach ($Vessel_STARTIME as $Vessel) 
                                    @php 
                                        $StartTime = \Carbon\Carbon::parse($Vessel->StartDate . ' ' . $Vessel->StartTime);
                                        $EndTime = \Carbon\Carbon::parse($Vessel->EndDate . ' ' . $Vessel->EndTime);
                                        $Status = strtolower($Vessel->Status);
                                        if (!empty($Vessel->TillNow)) {
                                            if ($Vessel->TillNow == 'YES') {
                                                $EndTime = (($Vessel->EndDate == $Vessel->StartDate) AND ($EndTime <= date('H:i'))) ? $EndTime : \Carbon\Carbon::parse(date('Y-m-d') . ' ' . date('H:i'));
                                            }   
                                        }
                                    @endphp
                                    @if (
                                        ($StartTime >= \Carbon\Carbon::parse($STARTDATE . ' 09:00') AND 
                                        $StartTime < \Carbon\Carbon::parse($STARTDATE . ' 12:00')) ||
                                        ($EndTime >= \Carbon\Carbon::parse($STARTDATE . ' 09:00') AND 
                                        $EndTime < \Carbon\Carbon::parse($STARTDATE . ' 12:00')) ||
                                        ($StartTime < \Carbon\Carbon::parse($STARTDATE . ' 09:00') AND 
                                        $EndTime >= \Carbon\Carbon::parse($STARTDATE . ' 12:00'))
                                    )
                                        <div class="{{ $Status }} status tooltip-x">
                                            <span class="Hide tooltip-x-span"><div class="{{ $Status }} tooltip-x-div"></div> On {{ $Status }} <br> {{ $StartTime->format('H:i').' HRS' }} - {{ $EndTime->format('H:i').' HRS' }}
                                            @if (isset($_GET['FromDate_FILTERBYDATE']))
                                                <br>
                                                @ {{ $Vessel->StartDate }} 
                                                @if ($Vessel->EndDate > $Vessel->StartDate)
                                                    <br> &nbsp;&nbsp;&nbsp; {{ $Vessel->EndDate }}
                                                @endif
                                            @endif
                                         </span>
                                        </div>
                                    @endif  
                                @endforeach
                            </div>  
                        </td>
                        <td>
                            <div class="flex">
                                @foreach ($Vessel_STARTIME as $Vessel) 
                                    @php 
                                        $StartTime = \Carbon\Carbon::parse($Vessel->StartDate . ' ' . $Vessel->StartTime);
                                        $EndTime = \Carbon\Carbon::parse($Vessel->EndDate . ' ' . $Vessel->EndTime);
                                        $Status = strtolower($Vessel->Status);
                                        if (!empty($Vessel->TillNow)) {
                                            if ($Vessel->TillNow == 'YES') {
                                                $EndTime = (($Vessel->EndDate == $Vessel->StartDate) AND ($EndTime <= date('H:i'))) ? $EndTime : \Carbon\Carbon::parse(date('Y-m-d') . ' ' . date('H:i'));
                                            }   
                                        }
                                    @endphp   
                                    @if (
                                        ($StartTime >= \Carbon\Carbon::parse($STARTDATE . ' 12:00') AND 
                                        $StartTime < \Carbon\Carbon::parse($STARTDATE . ' 15:00')) ||
                                        ($EndTime >= \Carbon\Carbon::parse($STARTDATE . ' 12:00') AND 
                                        $EndTime < \Carbon\Carbon::parse($STARTDATE . ' 15:00')) ||
                                        ($StartTime < \Carbon\Carbon::parse($STARTDATE . ' 12:00') AND 
                                        $EndTime >= \Carbon\Carbon::parse($STARTDATE . ' 15:00'))
                                    )
                                        <div class="{{ $Status }} status tooltip-x">
                                            <span class="Hide tooltip-x-span"><div class="{{ $Status }} tooltip-x-div"></div> On {{ $Status }} <br> {{ $StartTime->format('H:i').' HRS' }} - {{ $EndTime->format('H:i').' HRS' }}
                                            @if (isset($_GET['FromDate_FILTERBYDATE']))
                                                <br>
                                                @ {{ $Vessel->StartDate }} 
                                                @if ($Vessel->EndDate > $Vessel->StartDate)
                                                    <br> &nbsp;&nbsp;&nbsp; {{ $Vessel->EndDate }}
                                                @endif
                                            @endif
                                         </span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>   
                        </td>
                        <td>
                            <div class="flex">
                                @foreach ($Vessel_STARTIME as $Vessel) 
                                    @php 
                                        $StartTime = \Carbon\Carbon::parse($Vessel->StartDate . ' ' . $Vessel->StartTime);
                                        $EndTime = \Carbon\Carbon::parse($Vessel->EndDate . ' ' . $Vessel->EndTime);
                                        $Status = strtolower($Vessel->Status);
                                        if (!empty($Vessel->TillNow)) {
                                            if ($Vessel->TillNow == 'YES') {
                                                $EndTime = (($Vessel->EndDate == $Vessel->StartDate) AND ($EndTime <= date('H:i'))) ? $EndTime : \Carbon\Carbon::parse(date('Y-m-d') . ' ' . date('H:i'));
                                            }   
                                        }
                                    @endphp  
                                    @if (
                                        ($StartTime >= \Carbon\Carbon::parse($STARTDATE . ' 15:00') AND 
                                        $StartTime < \Carbon\Carbon::parse($STARTDATE . ' 18:00')) ||
                                        ($EndTime >= \Carbon\Carbon::parse($STARTDATE . ' 15:00') AND 
                                        $EndTime < \Carbon\Carbon::parse($STARTDATE . ' 18:00')) ||
                                        ($StartTime < \Carbon\Carbon::parse($STARTDATE . ' 15:00') AND 
                                        $EndTime >= \Carbon\Carbon::parse($STARTDATE . ' 18:00'))
                                    )
                                        <div class="{{ $Status }} status tooltip-x">
                                            <span class="Hide tooltip-x-span"><div class="{{ $Status }} tooltip-x-div"></div> On {{ $Status }} <br> {{ $StartTime->format('H:i').' HRS' }} - {{ $EndTime->format('H:i').' HRS' }}
                                            @if (isset($_GET['FromDate_FILTERBYDATE']))
                                                <br>
                                                @ {{ $Vessel->StartDate }} 
                                                @if ($Vessel->EndDate > $Vessel->StartDate)
                                                    <br> &nbsp;&nbsp;&nbsp; {{ $Vessel->EndDate }}
                                                @endif
                                            @endif
                                         </span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>    
                        </td>
                        <td>
                            <div class="flex">
                                @foreach ($Vessel_STARTIME as $Vessel) 
                                    @php 
                                        $StartTime = \Carbon\Carbon::parse($Vessel->StartDate . ' ' . $Vessel->StartTime);
                                        $EndTime = \Carbon\Carbon::parse($Vessel->EndDate . ' ' . $Vessel->EndTime);
                                        $Status = strtolower($Vessel->Status);
                                        if (!empty($Vessel->TillNow)) {
                                            if ($Vessel->TillNow == 'YES') {
                                                $EndTime = (($Vessel->EndDate == $Vessel->StartDate) AND ($EndTime <= date('H:i'))) ? $EndTime : \Carbon\Carbon::parse(date('Y-m-d') . ' ' . date('H:i'));
                                            }   
                                        }
                                    @endphp   
                                    @if (
                                        ($StartTime >= \Carbon\Carbon::parse($STARTDATE . ' 18:00') AND 
                                        $StartTime < \Carbon\Carbon::parse($STARTDATE . ' 21:00')) ||
                                        ($EndTime >= \Carbon\Carbon::parse($STARTDATE . ' 18:00') AND 
                                        $EndTime < \Carbon\Carbon::parse($STARTDATE . ' 21:00')) ||
                                        ($StartTime < \Carbon\Carbon::parse($STARTDATE . ' 18:00') AND 
                                        $EndTime >= \Carbon\Carbon::parse($STARTDATE . ' 21:00'))
                                    )
                                        <div class="{{ $Status }} status tooltip-x">
                                            <span class="Hide tooltip-x-span"><div class="{{ $Status }} tooltip-x-div"></div> On {{ $Status }} <br> {{ $StartTime->format('H:i').' HRS' }} - {{ $EndTime->format('H:i').' HRS' }}
                                            @if (isset($_GET['FromDate_FILTERBYDATE']))
                                                <br>
                                                @ {{ $Vessel->StartDate }} 
                                                @if ($Vessel->EndDate > $Vessel->StartDate)
                                                    <br> &nbsp;&nbsp;&nbsp; {{ $Vessel->EndDate }}
                                                @endif
                                            @endif
                                         </span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>     
                        </td>
                        <td>
                            <div class="flex">
                                @foreach ($Vessel_STARTIME as $Vessel) 
                                    @php 
                                        $StartTime = \Carbon\Carbon::parse($Vessel->StartDate . ' ' . $Vessel->StartTime);
                                        $EndTime = \Carbon\Carbon::parse($Vessel->EndDate . ' ' . $Vessel->EndTime);
                                        $Status = strtolower($Vessel->Status);
                                        if (!empty($Vessel->TillNow)) {
                                            if ($Vessel->TillNow == 'YES') {
                                                $EndTime = (($Vessel->EndDate == $Vessel->StartDate) AND ($EndTime <= date('H:i'))) ? $EndTime : \Carbon\Carbon::parse(date('Y-m-d') . ' ' . date('H:i'));
                                            }   
                                        }
                                    @endphp   
                                    @if (
                                        ($StartTime >= \Carbon\Carbon::parse($STARTDATE . ' 21:00') AND 
                                        $StartTime < \Carbon\Carbon::parse($STARTDATE . ' 23:59')) ||
                                        ($EndTime >= \Carbon\Carbon::parse($STARTDATE . ' 21:00') AND 
                                        $EndTime < \Carbon\Carbon::parse($STARTDATE . ' 23:59')) ||
                                        ($StartTime < \Carbon\Carbon::parse($STARTDATE . ' 21:00') AND 
                                        $EndTime >= \Carbon\Carbon::parse($STARTDATE . ' 23:59'))
                                    )
                                        <div class="{{ $Status }} status tooltip-x">
                                            <span class="Hide tooltip-x-span"><div class="{{ $Status }} tooltip-x-div"></div> On {{ $Status }} <br> {{ $StartTime->format('H:i').' HRS' }} - {{ $EndTime->format('H:i').' HRS' }}
                                            @if (isset($_GET['FromDate_FILTERBYDATE']))
                                                <br>
                                                @ {{ $Vessel->StartDate }} 
                                                @if ($Vessel->EndDate > $Vessel->StartDate)
                                                    <br> &nbsp;&nbsp;&nbsp; {{ $Vessel->EndDate }}
                                                @endif
                                            @endif
                                         </span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>      
                        </td>
                    </tr>
                    @endforeach 
                </table>
            </div>  
        </div>  
        <div class="board-3">
            <div class="div">
                <h1>Availability logs</h1>
                <table>
                    <tr>
                        <th>Vessel</th>
                        <th>Status</th>
                        <th>Done by</th>
                        {{-- <th>Attachment</th> --}}
                        <th>Start date</th>
                        <th>Start time</th>
                        <th>End date</th>
                        <th>End time</th>
                        <th>Source</th>
                        <th>#</th>
                     :: {{ count($VesselAvailability) }}</tr> 
                    @unless (count($VesselAvailability) > 0)
                    <tr>
                        <td class="action">System don't have any records yet..</td>
                    </tr>
                    @endunless
                    @foreach ($VesselAvailability as $Availabilty)
                    @php
                       $StartTime = $Availabilty->StartTime;
                       $EndDate = $Availabilty->EndDate;
                       $Date = $Availabilty->StartDate;
                       $Scheduled_COUNT = \App\Models\VesselAvailability::where('StartDate', '>', date('Y-m-d'))
                                                                            ->orWhere(function($query) {
                                                                                $query->where('StartDate', date('Y-m-d'))
                                                                                        ->where('StartTime', '>', \Carbon\Carbon::now());
                                                                            })->get();
                       $Today_COUNT = \App\Models\VesselAvailability::where('StartDate', date('Y-m-d'))->get();
                       $ThisWeek_COUNT = \App\Models\VesselAvailability::where('StartDate', '>=', date('Y-m-d', strtotime('last Sunday')))->get();
                       $LastWeek_COUNT = \App\Models\VesselAvailability::where('StartDate', '>=', date('Y-m-d', strtotime('last week Monday')))->where('StartDate', '<', date('Y-m-d', strtotime('last Sunday')))->get();
                       $Older_COUNT = \App\Models\VesselAvailability::where('StartDate', '<', date('Y-m-d', strtotime('last week Monday')))->get();
                    @endphp
                    @if (
                            $StartTime > \Carbon\Carbon::now() ||
                            $StartDate > date('Y-m-d') ||
                            $EndDate > date('Y-m-d')
                        )
                    <tr class="scheduled history Hide">
                        <td>Scheduled :: {{ count($Scheduled_COUNT) }}</td> 
                    </tr>
                    @endif
                    @include('Components.History.History') 
                    <tr> 
                        <td class="Hide">{{ $Availabilty->id }}</td> 
                        <td class="Hide"> {{ $Availabilty->Vessel }}</td> 
                        <td class="Hide">{{ $Availabilty->Status }}</td> 
                        <td class="Hide">{{ $Availabilty->DoneBy }}</td> 
                        <td class="Hide">{{ $Availabilty->Attachment }}</td> 
                        <td class="Hide">{{ $Availabilty->StartTime }}</td> 
                        <td class="Hide">{{ $Availabilty->EndTime }}</td> 
                        <td class="Hide">{{ $Availabilty->StartDate }}</td> 
                        <td class="Hide">{{ $Availabilty->EndDate }}</td> 
                        <td class="Hide">{{ $Availabilty->TillNow }}</td>
                        <td class="Hide">{{ $Availabilty->Comment }}</td> 
                        <td class="Hide">{{ $Availabilty->Report }}</td> 
                        <td class="Hide">{{ $Availabilty->Picture }}</td> 
                        <td class="Hide">{{ $Availabilty->Location }}</td>  
                        <td>{{ $Availabilty->Vessel }}</td> 
                        @php
                            $_StartDateTime = \Carbon\Carbon::parse(($Availabilty->StartDate ?? date('Y-m-d')) . ' ' . ($Availabilty->StartTime ?? '00:00'));
                            $_EndDateTime = \Carbon\Carbon::parse(($Availabilty->EndDate ?? date('Y-m-d')) . ' ' . ($Availabilty->EndTime ?? '00:00'));
                            $_HoursBetween = $_EndDateTime->diffInHours($_StartDateTime);
                            $_MinutesBetween = $_StartDateTime->diffInMinutes($_EndDateTime); 
                            $_TotalDays = $_EndDateTime->diffInDays($_StartDateTime); 
                        @endphp
                        <td>
                            {{ $Availabilty->Status == 'IDLE' ? 'READY' : ($Availabilty->Status == 'BUNKERY' ? 'BUNKERING' : $Availabilty->Status) }} 
                            <small>
                                @if ($_MinutesBetween < 60)
                                    {{ $_EndDateTime->diffInMinutes($_StartDateTime) }} minutes
                                @elseif($_HoursBetween < 24)
                                    {{ $_EndDateTime->diffInHours($_StartDateTime) }} hour(s)
                                @elseif($_TotalDays > 1)
                                    {{ $_EndDateTime->diffInDays($_StartDateTime) }} day(s)
                                @endif
                            </small>
                        </td>
                        <td>{{ strtoupper($Availabilty->DoneBy) }}</td>
                        {{-- <td>{{ $Availabilty->Attachment }}</td> --}}
                        <td>{{ $Availabilty->StartDate }}</td>
                        <td>{{ date('H:i', strtotime($Availabilty->StartTime)).' HRS' }}</td>
                        <td>{{ $Availabilty->EndDate }}</td> 
                        <td>{{ date('H:i', strtotime($Availabilty->EndTime)).' HRS' }}</td> 
                        <td>{{ $Availabilty->Source }}</td>
                        <td class="action"> 
                            @if ($Availabilty->TillNow == 'YES')
                                <img class="EditAvailabilityButton" src="{{ asset('images/write.png') }}" alt=""> 
                                <img class="DeleteAvailabilityButton" src="{{ asset('images/delete.png') }}" alt="">
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </table>
                {{ $VesselAvailability->appends(request()->query())->links() }}
            </div> 
        </div>
        @php
            if (isset($_GET['Vessel_FILTER'])) { 
                $Checklist1 = \DB::table('checklist_1a')->select(['id', 'Boat', 'Date'])->where('Boat', $_GET['Vessel_FILTER'])->whereBetween('Date', [$_GET['FromDate_FILTERBYDATE'], $_GET['EndDate_FILTERBYDATE']])->orderBy('Date', 'DESC')->orderBy('TimeIn', 'DESC')->paginate(20);
            } else if (isset($_GET['SpecificDay'])) { 
                $Checklist1 = \DB::table('checklist_1a')->select(['id', 'Boat', 'Date'])->where('Boat', $_GET['Vessel_FILTER'])->where('Date', $_GET['SpecificDay'])->orderBy('Date', 'DESC')->orderBy('TimeIn', 'DESC')->paginate(20);
            } else {
                $Checklist1 = \DB::table('checklist_1a')->select(['id', 'Boat', 'Date'])->orderBy('Date', 'DESC')->orderBy('TimeIn', 'DESC')->paginate(20);
            }
        @endphp
        <div class="board-3">
            <div class="div">
                <h1>Handover statements, inspections and maintenance logs</h1>
                <table>
                    <tr>
                        <th>Vessel</th>
                        <th>Date</th> 
                        <th>#</th>
                     :: {{ count($Checklist1) }}</tr> 
                    @unless (count($Checklist1) > 0)
                    <tr>
                        <td class="action">System don't have any records yet..</td>
                    </tr>
                    @endunless
                    @foreach ($Checklist1 as $Checklist) 
                    <tr class="scheduled history Hide">
                        {{-- <td>Scheduled :: {{ 2 }}</td>  --}}
                    </tr> 
                    {{-- @include('Components.History.History')  --}}
                    <tr> 
                        <td>{{ $Checklist->Boat }}</td> 
                        <td>{{ $Checklist->Date }}</td>
                        @php
                            $Checklist1a = \DB::table('checklist_1a')->where('id', $Checklist->id)->first();
                            $Checklist1b = \DB::table('checklist_1b')->where('id', $Checklist->id)->first();
                            $Checklist1c = \DB::table('checklist_1c')->where('id', $Checklist->id)->first();
                            $Checklist1d = \DB::table('checklist_1d')->where('id', $Checklist->id)->first();
                            $Checklist1e = \DB::table('checklist_1e')->where('id', $Checklist->id)->first();
                        @endphp
                        <td class="action"> 
                            <span class="Hide">{{ $Checklist->id }}</span> 
                            <span class="Hide">{{ $Checklist->Boat }}</span> 
                            <img class="EditChecklist1_Icon" src="{{ asset('images/write.png') }}" alt=""> 
                            <div class="Hide"></div>
                            <div class="Hide"></div>
                            @include('Components.Includes.Checklists.Checklist1_DATA')
                            <img class="DeleteChecklist1Button" src="{{ asset('images/delete.png') }}" alt="">
                            <img class="Checklist1_PdfIcon" src="{{ asset('images/pdf.png') }}" alt="">
                        </td>
                    </tr>
                    @endforeach
                </table>
                {{ $Checklist1->appends(request()->query())->links() }}
            </div> 
        </div>
        <div class="board-2">
            @php 
                $NumberOfVessels_IDLE_LASTMONTH = App\Models\VesselAvailability::select('Vessel')
                                                    ->where('Status', 'IDLE')
                                                    ->where(function($query) {
                                                        $query->whereBetween('StartDate', [date('Y-m-01', strtotime('last month')), date('Y-m-t', strtotime('last month'))])
                                                                ->orWhereBetween('EndDate', [date('Y-m-01', strtotime('last month')), date('Y-m-t', strtotime('last month'))]);
                                                    })->groupBy('Vessel')->get();
                $NumberOfVessels_BUNKERY_LASTMONTH = App\Models\VesselAvailability::select('Vessel')
                                                    ->where('Status', 'BUNKERY')
                                                    ->where(function($query) {
                                                        $query->whereBetween('StartDate', [date('Y-m-01', strtotime('last month')), date('Y-m-t', strtotime('last month'))])
                                                                ->orWhereBetween('EndDate', [date('Y-m-01', strtotime('last month')), date('Y-m-t', strtotime('last month'))]);
                                                    })->groupBy('Vessel')->get();
                $NumberOfVessels_INSPECTION_LASTMONTH = App\Models\VesselAvailability::select('Vessel')  
                                                    ->where('Status', 'INSPECTION')
                                                    ->where(function($query) {
                                                        $query->whereBetween('StartDate', [date('Y-m-01', strtotime('last month')), date('Y-m-t', strtotime('last month'))])
                                                                ->orWhereBetween('EndDate', [date('Y-m-01', strtotime('last month')), date('Y-m-t', strtotime('last month'))]);
                                                    })->groupBy('Vessel')->get(); 
                $NumberOfVessels_MAINTENANCE_LASTMONTH = App\Models\VesselAvailability::select('Vessel')   
                                                    ->where('Status', 'MAINTENANCE')
                                                    ->where(function($query) {
                                                        $query->whereBetween('StartDate', [date('Y-m-01', strtotime('last month')), date('Y-m-t', strtotime('last month'))])
                                                                ->orWhereBetween('EndDate', [date('Y-m-01', strtotime('last month')), date('Y-m-t', strtotime('last month'))]);
                                                    })->groupBy('Vessel')->get(); 
                $NumberOfVessels_OPERATION_LASTMONTH = App\Models\VesselAvailability::select('Vessel') 
                                                    ->where('Status', 'OPERATION')
                                                    ->where(function($query) {
                                                        $query->whereBetween('StartDate', [date('Y-m-01', strtotime('last month')), date('Y-m-t', strtotime('last month'))])
                                                                ->orWhereBetween('EndDate', [date('Y-m-01', strtotime('last month')), date('Y-m-t', strtotime('last month'))]);
                                                    })->groupBy('Vessel')->get(); 
                $NumberOfVessels_BREAKDOWN_LASTMONTH = App\Models\VesselAvailability::select('Vessel') 
                                                    ->where('Status', 'BREAKDOWN')
                                                    ->where(function($query) {
                                                        $query->whereBetween('StartDate', [date('Y-m-01', strtotime('last month')), date('Y-m-t', strtotime('last month'))])
                                                                ->orWhereBetween('EndDate', [date('Y-m-01', strtotime('last month')), date('Y-m-t', strtotime('last month'))]);
                                                    })->groupBy('Vessel')->get();  
                $NumberOfVessels_DOCKING_LASTMONTH = App\Models\VesselAvailability::select('Vessel')  
                                                    ->where('Status', 'DOCKING')
                                                    ->where(function($query) {
                                                        $query->whereBetween('StartDate', [date('Y-m-01', strtotime('last month')), date('Y-m-t', strtotime('last month'))])
                                                                ->orWhereBetween('EndDate', [date('Y-m-01', strtotime('last month')), date('Y-m-t', strtotime('last month'))]);
                                                    })->groupBy('Vessel')->get(); 
      
                for ($i=2; $i <= 4; $i++) { 
                    ${'NumberOfVessels_IDLE_LAST' . $i . 'MONTHS'} = App\Models\VesselAvailability::select('Vessel')  
                                                                    ->where('Status', 'IDLE')
                                                                    ->where(function($query) use ($i) {
                                                                        $query->whereBetween('StartDate', [date('Y-m-01', strtotime('-' . $i . ' months')), date('Y-m-t', strtotime('-' . $i . ' months'))])
                                                                                ->orWhereBetween('EndDate', [date('Y-m-01', strtotime('-' . $i . ' months')), date('Y-m-t', strtotime('-' . $i . ' months'))]);
                                                                    })->groupBy('Vessel')->get();
                    ${'NumberOfVessels_BUNKERY_LAST' . $i . 'MONTHS'} = App\Models\VesselAvailability::select('Vessel')  
                                                                    ->where('Status', 'BUNKERY')
                                                                    ->where(function($query) use ($i) {
                                                                        $query->whereBetween('StartDate', [date('Y-m-01', strtotime('-' . $i . ' months')), date('Y-m-t', strtotime('-' . $i . ' months'))])
                                                                                ->orWhereBetween('EndDate', [date('Y-m-01', strtotime('-' . $i . ' months')), date('Y-m-t', strtotime('-' . $i . ' months'))]);
                                                                    })->groupBy('Vessel')->get();
                    ${'NumberOfVessels_INSPECTION_LAST' . $i . 'MONTHS'} = App\Models\VesselAvailability::select('Vessel')  
                                                                    ->where('Status', 'INSPECTION')
                                                                    ->where(function($query) use ($i) {
                                                                        $query->whereBetween('StartDate', [date('Y-m-01', strtotime('-' . $i . ' months')), date('Y-m-t', strtotime('-' . $i . ' months'))])
                                                                                ->orWhereBetween('EndDate', [date('Y-m-01', strtotime('-' . $i . ' months')), date('Y-m-t', strtotime('-' . $i . ' months'))]);
                                                                    })->groupBy('Vessel')->get();
                    ${'NumberOfVessels_MAINTENANCE_LAST' . $i . 'MONTHS'} = App\Models\VesselAvailability::select('Vessel')  
                                                                    ->where('Status', 'MAINTENANCE')
                                                                    ->where(function($query) use ($i) {
                                                                        $query->whereBetween('StartDate', [date('Y-m-01', strtotime('-' . $i . ' months')), date('Y-m-t', strtotime('-' . $i . ' months'))])
                                                                                ->orWhereBetween('EndDate', [date('Y-m-01', strtotime('-' . $i . ' months')), date('Y-m-t', strtotime('-' . $i . ' months'))]);
                                                                    })->groupBy('Vessel')->get();
                    ${'NumberOfVessels_OPERATION_LAST' . $i . 'MONTHS'} = App\Models\VesselAvailability::select('Vessel')  
                                                                    ->where('Status', 'OPERATION')
                                                                    ->where(function($query) use ($i) {
                                                                        $query->whereBetween('StartDate', [date('Y-m-01', strtotime('-' . $i . ' months')), date('Y-m-t', strtotime('-' . $i . ' months'))])
                                                                                ->orWhereBetween('EndDate', [date('Y-m-01', strtotime('-' . $i . ' months')), date('Y-m-t', strtotime('-' . $i . ' months'))]);
                                                                    })->groupBy('Vessel')->get();
                    ${'NumberOfVessels_BREAKDOWN_LAST' . $i . 'MONTHS'} = App\Models\VesselAvailability::select('Vessel')  
                                                                    ->where('Status', 'BREAKDOWN')
                                                                    ->where(function($query) use ($i) {
                                                                        $query->whereBetween('StartDate', [date('Y-m-01', strtotime('-' . $i . ' months')), date('Y-m-t', strtotime('-' . $i . ' months'))])
                                                                                ->orWhereBetween('EndDate', [date('Y-m-01', strtotime('-' . $i . ' months')), date('Y-m-t', strtotime('-' . $i . ' months'))]);
                                                                    })->groupBy('Vessel')->get();
                    ${'NumberOfVessels_DOCKING_LAST' . $i . 'MONTHS'} = App\Models\VesselAvailability::select(['Vessel'])  
                                                                    ->where('Status', 'DOCKING')
                                                                    ->where(function($query) use ($i) {
                                                                        $query->whereBetween('StartDate', [date('Y-m-01', strtotime('-' . $i . ' months')), date('Y-m-t', strtotime('-' . $i . ' months'))])
                                                                                ->orWhereBetween('EndDate', [date('Y-m-01', strtotime('-' . $i . ' months')), date('Y-m-t', strtotime('-' . $i . ' months'))]);
                                                                    })->groupBy('Vessel')->get();
                } 
            @endphp
            <div class="div recent-workflow" style="width: 100%">
                <h1>Recent Workflow</h1>  
                <div class="canvas"> 
                    <div class="inner-x">
                        <span>Last month </span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_DOCKING_LASTMONTH) * 10 }}%; background: #03AED2" class="tooltip-x"><span class="Hide tooltip-x-span"><div class="docking tooltip-x-div"></div> On docking ({{ count($NumberOfVessels_DOCKING_LASTMONTH) }})</span></span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_OPERATION_LASTMONTH) * 10 }}%; background: #A87676" class="tooltip-x"><span class="Hide tooltip-x-span"><div class="operation tooltip-x-div"></div> On operation ({{ count($NumberOfVessels_OPERATION_LASTMONTH) }})</span></span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_BREAKDOWN_LASTMONTH) * 10 }}%; background: #da1e28" class="tooltip-x"><span class="Hide tooltip-x-span"><div class="breakdown tooltip-x-div"></div> On breakdown ({{ count($NumberOfVessels_BREAKDOWN_LASTMONTH) }})</span></span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_MAINTENANCE_LASTMONTH) * 10 }}%; background: #52f781" class="tooltip-x"><span class="Hide tooltip-x-span"><div class="maintenance tooltip-x-div"></div> On maintenance ({{ count($NumberOfVessels_MAINTENANCE_LASTMONTH) }})</span></span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_INSPECTION_LASTMONTH) * 10 }}%; background: #ff832b" class="tooltip-x"><span class="Hide tooltip-x-span"><div class="inspection tooltip-x-div"></div> On inspection ({{ count($NumberOfVessels_INSPECTION_LASTMONTH) }})</span></span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_BUNKERY_LASTMONTH) * 10 }}%; background: #8a3ffc" class="tooltip-x"><span class="Hide tooltip-x-span"><div class="bunkery tooltip-x-div"></div> On bunkering ({{ count($NumberOfVessels_BUNKERY_LASTMONTH) }})</span></span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_IDLE_LASTMONTH) * 10 }}%; background: #fff" class="tooltip-x"><span class="Hide tooltip-x-span"><div class="idle tooltip-x-div"></div> On ready to go ({{ count($NumberOfVessels_IDLE_LASTMONTH) }})</span></span>
                    </div>
                    <div class="inner-x">
                        <span>- 2 months </span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_DOCKING_LAST2MONTHS) * 10 }}%; background: #03AED2"  class="tooltip-x"><span class="Hide tooltip-x-span"><div class="docking tooltip-x-div"></div> On docking ({{ count($NumberOfVessels_DOCKING_LAST2MONTHS) }})</span></span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_OPERATION_LAST2MONTHS) * 10 }}%; background: #A87676"  class="tooltip-x"><span class="Hide tooltip-x-span"><div class="operation tooltip-x-div"></div> On operation ({{ count($NumberOfVessels_OPERATION_LAST2MONTHS) }})</span></span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_BREAKDOWN_LAST2MONTHS) * 10 }}%; background: #da1e28"  class="tooltip-x"><span class="Hide tooltip-x-span"><div class="breakdown tooltip-x-div"></div> On breakdown ({{ count($NumberOfVessels_BREAKDOWN_LAST2MONTHS) }})</span></span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_MAINTENANCE_LAST2MONTHS) * 10 }}%; background: #52f781"  class="tooltip-x"><span class="Hide tooltip-x-span"><div class="maintenance tooltip-x-div"></div> On maintenance ({{ count($NumberOfVessels_MAINTENANCE_LAST2MONTHS) }})</span></span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_INSPECTION_LAST2MONTHS) * 10 }}%; background: #ff832b"  class="tooltip-x"><span class="Hide tooltip-x-span"><div class="inspection tooltip-x-div"></div> On inspection ({{ count($NumberOfVessels_INSPECTION_LAST2MONTHS) }})</span></span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_BUNKERY_LAST2MONTHS) * 10 }}%; background: #8a3ffc"  class="tooltip-x"><span class="Hide tooltip-x-span"><div class="bunkery tooltip-x-div"></div> On bunkering ({{ count($NumberOfVessels_BUNKERY_LAST2MONTHS) }})</span></span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_IDLE_LAST2MONTHS) * 10 }}%; background: #fff"  class="tooltip-x"><span class="Hide tooltip-x-span"><div class="idle tooltip-x-div"></div> On ready to go ({{ count($NumberOfVessels_IDLE_LAST2MONTHS) }})</span></span>
                    </div>
                    <div class="inner-x">
                        <span>- 3 months </span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_DOCKING_LAST3MONTHS) * 10 }}%; background: #03AED2"  class="tooltip-x"><span class="Hide tooltip-x-span"><div class="docking tooltip-x-div"></div> On docking ({{ count($NumberOfVessels_DOCKING_LAST3MONTHS) }})</span></span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_OPERATION_LAST3MONTHS) * 10 }}%; background: #A87676"  class="tooltip-x"><span class="Hide tooltip-x-span"><div class="operation tooltip-x-div"></div> On operation ({{ count($NumberOfVessels_OPERATION_LAST3MONTHS) }})</span></span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_BREAKDOWN_LAST3MONTHS) * 10 }}%; background: #da1e28"  class="tooltip-x"><span class="Hide tooltip-x-span"><div class="breakdown tooltip-x-div"></div> On breakdown ({{ count($NumberOfVessels_BREAKDOWN_LAST3MONTHS) }})</span></span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_MAINTENANCE_LAST3MONTHS) * 10 }}%; background: #52f781"  class="tooltip-x"><span class="Hide tooltip-x-span"><div class="maintenance tooltip-x-div"></div> On maintenance ({{ count($NumberOfVessels_MAINTENANCE_LAST3MONTHS) }})</span></span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_INSPECTION_LAST3MONTHS) * 10 }}%; background: #ff832b"  class="tooltip-x"><span class="Hide tooltip-x-span"><div class="inspection tooltip-x-div"></div> On inspection ({{ count($NumberOfVessels_INSPECTION_LAST3MONTHS) }})</span></span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_BUNKERY_LAST3MONTHS) * 10 }}%; background: #8a3ffc"  class="tooltip-x"><span class="Hide tooltip-x-span"><div class="bunkery tooltip-x-div"></div> On bunkering ({{ count($NumberOfVessels_BUNKERY_LAST3MONTHS) }})</span></span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_IDLE_LAST3MONTHS) * 10 }}%; background: #fff"  class="tooltip-x"><span class="Hide tooltip-x-span"><div class="idle tooltip-x-div"></div> On ready to go ({{ count($NumberOfVessels_IDLE_LAST3MONTHS) }})</span></span>
                    </div>
                    <div class="inner-x">
                        <span>- 4 months </span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_DOCKING_LAST4MONTHS) * 10 }}%; background: #03AED2" class="tooltip-x"><span class="Hide tooltip-x-span"><div class="docking tooltip-x-div"></div> On docking ({{ count($NumberOfVessels_DOCKING_LAST4MONTHS) }})</span></span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_OPERATION_LAST4MONTHS) * 10 }}%; background: #A87676" class="tooltip-x"><span class="Hide tooltip-x-span"><div class="operation tooltip-x-div"></div> On operation ({{ count($NumberOfVessels_OPERATION_LAST4MONTHS) }})</span></span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_BREAKDOWN_LAST4MONTHS) * 10 }}%; background: #da1e28" class="tooltip-x"><span class="Hide tooltip-x-span"><div class="breakdown tooltip-x-div"></div> On breakdown ({{ count($NumberOfVessels_BREAKDOWN_LAST4MONTHS) }})</span></span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_MAINTENANCE_LAST4MONTHS) * 10 }}%; background: #52f781" class="tooltip-x"><span class="Hide tooltip-x-span"><div class="maintenance tooltip-x-div"></div> On maintenance ({{ count($NumberOfVessels_MAINTENANCE_LAST4MONTHS) }})</span></span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_INSPECTION_LAST4MONTHS) * 10 }}%; background: #ff832b" class="tooltip-x"><span class="Hide tooltip-x-span"><div class="inspection tooltip-x-div"></div> On inspection ({{ count($NumberOfVessels_INSPECTION_LAST4MONTHS) }})</span></span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_BUNKERY_LAST4MONTHS) * 10 }}%; background: #8a3ffc" class="tooltip-x"><span class="Hide tooltip-x-span"><div class="bunkery tooltip-x-div"></div> On bunkering ({{ count($NumberOfVessels_BUNKERY_LAST4MONTHS) }})</span></span>
                        <span style="height: 1.5em; width: {{ count($NumberOfVessels_IDLE_LAST4MONTHS) * 10 }}%; background: #fff" class="tooltip-x"><span class="Hide tooltip-x-span"><div class="idle tooltip-x-div"></div> On ready to go ({{ count($NumberOfVessels_IDLE_LAST4MONTHS) }})</span></span>
                    </div>
                </div>
            </div> 
        </div> 
    </div>
</div>   
<script src="{{ asset('js/Components/Add/Checklist1.js') }}"></script>
<script src="{{ asset('js/Components/Edit/Checklist1.js') }}"></script>
<script src="{{ asset('js/Components/Delete/Checklist1.js') }}"></script>
<script src="{{ asset('js/Components/Add/Availability.js') }}"></script>
<script src="{{ asset('js/Components/Edit/Availability.js') }}"></script>
<script src="{{ asset('js/Components/Delete/Availability.js') }}"></script>
<script src="{{ asset('js/Components/Inner/FilterByDate.js') }}"></script>
<script src="{{ asset('js/Components/Inner/FilterReportByDate.js') }}"></script>
<script src="{{ asset('js/Components/Inner/FilterChart4ForVesselData.js') }}"></script>
<script src="{{ asset('js/Components/Inner/ChartReport.js') }}"></script>
<script> 
    let DisplayChartButton = document.querySelector('.availability .dashboard-inner .dashboard-heading svg.-x');
    DisplayChartButton.addEventListener('click', () => { 
        Chart1.style.display = 'flex !important'; 
    });
</script> 
@include('Components.Charts.Chart1-JS') 
{{-- @include('Components.Charts.Chart3-JS')  --}}
@include('Components.Charts.Chart4-JS') 
@include('Components.Charts.Chart5-JS') 
@include('Components.Charts.Chart6-JS') 
@include('Components.Maps.Map1-JS') 
@endsection