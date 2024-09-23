<?php
$MonthStartNumber = date('n', strtotime($Vessel->StartDate));
$MonthEndNumber = date('n', strtotime($Vessel->EndDate));
if (($MonthStartNumber == $_GET['Month']) AND
    ($MonthEndNumber > $MonthStartNumber)) {
        $StartDateTime = \Carbon\Carbon::parse(($Vessel->StartDate ?? date('Y-m-d')) . ' ' . ($Vessel->StartTime ?? '00:00'));
        $EndDateTime = \Carbon\Carbon::parse((date('Y-m-t', strtotime($Vessel->StartDate))) . ' ' . $Vessel->EndTime);
        $StartDate = $Vessel->StartDate; 
        $StartTime = $Vessel->StartTime; 
        $EndDate = date('Y-m-t', strtotime($Vessel->StartDate)); 
        $EndTime = '23:59';  
} else if (($MonthStartNumber < $_GET['Month']) AND
    ($MonthEndNumber > $_GET['Month'])) {
        $StartDateTime = \Carbon\Carbon::parse((date('Y-m-d', strtotime($_GET['Year'] . '-' . $_GET['Month'] .'-01'))) . ' 00:00');
        $EndDateTime = \Carbon\Carbon::parse((date('Y-m-t', strtotime($_GET['Year'] . '-' . $_GET['Month'] .'-01'))) . ' 23:59');
        $StartDate = date('Y-m-d', strtotime($_GET['Year'] . '-' . $_GET['Month'] .'-01')); 
        $StartTime = '00:00'; 
        $EndDate = date('Y-m-t', strtotime($_GET['Year'] . '-' . $_GET['Month'] .'-01')); 
        $EndTime = '23:59';   
} else if (($MonthEndNumber == $_GET['Month']) AND
    ($MonthStartNumber < $MonthEndNumber)) {
        $StartDateTime = \Carbon\Carbon::parse((date('Y-m-01', strtotime($Vessel->EndDate))) . ' ' . $Vessel->StartTime);
        $EndDateTime = \Carbon\Carbon::parse($Vessel->EndDate . ' ' . $Vessel->EndTime);
        $StartDate = date('Y-m-01', strtotime($Vessel->EndDate)); 
        $StartTime = '00:00'; 
        $EndDate = $Vessel->EndDate; 
        $EndTime = $Vessel->EndTime; 
} else if ($MonthStartNumber < $MonthEndNumber) {
    $StartDateTime = \Carbon\Carbon::parse((date('Y-m-01', strtotime($Vessel->EndDate))) . ' ' . $Vessel->StartTime);
    $EndDateTime = \Carbon\Carbon::parse($Vessel->EndDate . ' ' . $Vessel->EndTime);
    $StartDate = date('Y-m-01', strtotime($Vessel->EndDate)); 
    $StartTime = '00:00'; 
    $EndDate = $Vessel->EndDate; 
    $EndTime = $Vessel->EndTime; 
} else if ($MonthEndNumber > $MonthStartNumber) {
    $StartDateTime = \Carbon\Carbon::parse($Vessel->StartDate . ' ' . $Vessel->StartTime);
    $EndDateTime = \Carbon\Carbon::parse((date('Y-m-t', strtotime($Vessel->StartDate))) . ' ' . $Vessel->EndTime);
    $StartDate = $Vessel->StartDate; 
    $StartTime = $Vessel->StartTime; 
    $EndDate = date('Y-m-t', strtotime($Vessel->StartDate)); 
    $EndTime = '23:59';  
} else {
  $StartDateTime = \Carbon\Carbon::parse(($Vessel->StartDate ?? date('Y-m-d')) . ' ' . ($Vessel->StartTime ?? '00:00'));
  $EndDateTime = \Carbon\Carbon::parse(($Vessel->EndDate ?? date('Y-m-d')) . ' ' . ($Vessel->EndTime ?? '00:00'));
  $StartDate = $Vessel->StartDate; 
  $StartTime = $Vessel->StartTime; 
  $EndDate = $Vessel->EndDate; 
  $EndTime = $Vessel->EndTime; 
} 
$HoursBetween = $EndDateTime->diffInHours($StartDateTime);
$MinutesBetween = $StartDateTime->diffInMinutes($EndDateTime) % 60; 
$TotalDays = $EndDateTime->diffInDays($StartDateTime); 
if ($Vessel->Status == 'IDLE') {
    $Status = 'READY';
} else if ($Vessel->Status == 'BUNKERY') {
    $Status = 'BUNKERING';
} else {
    $Status = $Vessel->Status;
}