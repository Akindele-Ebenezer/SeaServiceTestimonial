@php
    $_NumberOfVessels_DOCKING = \App\Models\VesselAvailability::select('id')->where('Status', 'DOCKING')->where('Vessel', $Vessel->VesselName)->get();
    $_NumberOfVessels_BUNKERY = \App\Models\VesselAvailability::select('id')->where('Status', 'BUNKERY')->where('Vessel', $Vessel->VesselName)->get();
    $_NumberOfVessels_INSPECTION = \App\Models\VesselAvailability::select('id')->where('Status', 'INSPECTION')->where('Vessel', $Vessel->VesselName)->get();
    $_NumberOfVessels_MAINTENANCE = \App\Models\VesselAvailability::select('id')->where('Status', 'MAINTENANCE')->where('Vessel', $Vessel->VesselName)->get();
    $_NumberOfVessels_BREAKDOWN = \App\Models\VesselAvailability::select('id')->where('Status', 'BREAKDOWN')->where('Vessel', $Vessel->VesselName)->get();
    $TotalActivities = (count($_NumberOfVessels_DOCKING) + count($_NumberOfVessels_BUNKERY) + count($_NumberOfVessels_INSPECTION) + count($_NumberOfVessels_MAINTENANCE) + count($_NumberOfVessels_BREAKDOWN)) == 0 ? 1 : (count($_NumberOfVessels_DOCKING) + count($_NumberOfVessels_BUNKERY) + count($_NumberOfVessels_INSPECTION) + count($_NumberOfVessels_MAINTENANCE) + count($_NumberOfVessels_BREAKDOWN));
@endphp
<span class="Hide">{{ $Vessel->VesselName }}</span>
<span class="Hide">{{ count($_NumberOfVessels_DOCKING) }}</span>
<span class="Hide">{{ count($_NumberOfVessels_BUNKERY) }}</span>
<span class="Hide">{{ count($_NumberOfVessels_INSPECTION) }}</span>
<span class="Hide">{{ count($_NumberOfVessels_MAINTENANCE) }}</span>
<span class="Hide">{{ count($_NumberOfVessels_BREAKDOWN) }}</span> 
<span class="Hide">{{ round((count($_NumberOfVessels_DOCKING) / $TotalActivities) * 100) }}</span>
<span class="Hide">{{ round((count($_NumberOfVessels_BUNKERY) / $TotalActivities) * 100) }}</span>
<span class="Hide">{{ round((count($_NumberOfVessels_INSPECTION) / $TotalActivities) * 100) }}</span>
<span class="Hide">{{ round((count($_NumberOfVessels_MAINTENANCE) / $TotalActivities) * 100) }}</span>
<span class="Hide">{{ round((count($_NumberOfVessels_BREAKDOWN) / $TotalActivities) * 100) }}</span> 
@php
    $VesselComment = \App\Models\VesselAvailability::select('Comment')->where('Vessel', $Vessel->VesselName)->orderBy('StartDate', 'DESC')->orderBy('StartTime', 'DESC')->first();
@endphp
<span class="Hide">{{ $VesselComment->Comment ?? 'Vessel is on ' . (strtolower($Availability_STATUS->Status ?? 'operation') == 'idle' ? 'operation' : strtolower($Availability_STATUS->Status ?? 'operation')) }}</span> 
<span class="Hide">{{ strtolower($Availability_STATUS->Status ?? 'idle') }}</span>