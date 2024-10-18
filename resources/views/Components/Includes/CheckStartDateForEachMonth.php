<?php 
$MonthStartNumber = date('n', strtotime($Period->StartDate));
$MonthEndNumber = date('n', strtotime($Period->EndDate));
if (($MonthStartNumber == $_GET['Month']) AND
    ($MonthEndNumber > $MonthStartNumber)) {
        $StartDateTime = \Carbon\Carbon::parse(($Period->StartDate ?? date('Y-m-d')) . ' ' . ($Period->StartTime ?? '00:00'));
        $EndDateTime = \Carbon\Carbon::parse((date('Y-m-t', strtotime($Period->StartDate))) . ' ' . $Period->EndTime); 
} else if (($MonthStartNumber < $_GET['Month']) AND
    ($MonthEndNumber > $_GET['Month'])) {
        $StartDateTime = \Carbon\Carbon::parse((date('Y-m-d', strtotime($_GET['Year'] . '-' . $_GET['Month'] .'-01'))) . ' 00:00');
        $EndDateTime = \Carbon\Carbon::parse((date('Y-m-t', strtotime($_GET['Year'] . '-' . $_GET['Month'] .'-01'))) . ' 23:59');  
} else if (($MonthEndNumber == $_GET['Month']) AND
    ($MonthStartNumber < $MonthEndNumber)) {
        $StartDateTime = \Carbon\Carbon::parse((date('Y-m-01', strtotime($Period->EndDate))) . ' ' . $Period->StartTime);
        $EndDateTime = \Carbon\Carbon::parse($Period->EndDate . ' ' . $Period->EndTime);  
} else if ($MonthStartNumber < $MonthEndNumber) {
    $StartDateTime = \Carbon\Carbon::parse((date('Y-m-01', strtotime($Period->EndDate))) . ' ' . $Period->StartTime);
    $EndDateTime = \Carbon\Carbon::parse($Period->EndDate . ' ' . $Period->EndTime); 
} else if ($MonthEndNumber > $MonthStartNumber) {
    $StartDateTime = \Carbon\Carbon::parse($Period->StartDate . ' ' . $Period->StartTime);
    $EndDateTime = \Carbon\Carbon::parse((date('Y-m-t', strtotime($Period->StartDate))) . ' ' . $Period->EndTime);  
} else if ($_GET['Month'] == 0) {
    $StartDateTime = \Carbon\Carbon::parse($_GET['StartDate'] . ' 00:00');
    $EndDateTime = \Carbon\Carbon::parse($_GET['EndDate'] . ' 23:59');  
} else {
  $StartDateTime = \Carbon\Carbon::parse(($Period->StartDate ?? date('Y-m-d')) . ' ' . ($Period->StartTime ?? '00:00'));
  $EndDateTime = \Carbon\Carbon::parse(($Period->EndDate ?? date('Y-m-d')) . ' ' . ($Period->EndTime ?? '00:00')); 
}  
$TotalDays = $EndDateTime->diffInDays($StartDateTime);
$TotalHours = $EndDateTime->diffInHours($StartDateTime);
$TotalMinutes = $EndDateTime->diffInMinutes($StartDateTime);