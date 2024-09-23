<?php 
$MonthStartNumber = date('n', strtotime($Period->StartDate));
$MonthEndNumber = date('n', strtotime($Period->EndDate));
if ($MonthStartNumber < $MonthEndNumber) {
  $StartDateTime = \Carbon\Carbon::parse((date('Y-m-01', strtotime($Period->EndDate)) ?? date('Y-m-d')) . ' ' . ($Period->StartTime ?? '00:00'));
  $EndDateTime = \Carbon\Carbon::parse(($Period->EndDate ?? date('Y-m-d')) . ' ' . ($Period->EndTime ?? '00:00'));
} else {
  $StartDateTime = \Carbon\Carbon::parse(($Period->StartDate ?? date('Y-m-d')) . ' ' . ($Period->StartTime ?? '00:00'));
  $EndDateTime = \Carbon\Carbon::parse(($Period->EndDate ?? date('Y-m-d')) . ' ' . ($Period->EndTime ?? '00:00'));
} 
$TotalDays = $EndDateTime->diffInDays($StartDateTime);
$TotalHours = $EndDateTime->diffInHours($StartDateTime);
$TotalMinutes = $EndDateTime->diffInMinutes($StartDateTime);