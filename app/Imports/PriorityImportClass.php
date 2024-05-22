<?php

namespace App\Imports;
 
use App\Models\VesselAvailability;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PriorityImportClass implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {    
        $StartTime = \Carbon\Carbon::createFromTimestamp($row[5] * 86400);
        $EndTime = \Carbon\Carbon::createFromTimestamp($row[10] * 86400);
        $StartTime = \Carbon\Carbon::parse($StartTime)->subHour()->format("H:i"); 
        $EndTime = \Carbon\Carbon::parse($EndTime)->subHour()->format("H:i"); 
        return new VesselAvailability([
            'Vessel' =>  strtoupper(str_replace('LTT - ', '', $row[24])), 
            // 'Status' => $_GET['Status'],
            'DoneBy' => $row[21],  
            'Source' => 'PRIORITY', 
            'StartTime' => $StartTime,
            'EndTime' => $EndTime,
            'StartDate' => \Carbon\Carbon::createFromTimestamp(($row[4] - 25569) * 86400)->format('Y-m-d'),
            'EndDate' => \Carbon\Carbon::createFromTimestamp(($row[9] - 25569) * 86400)->format('Y-m-d'),
            'DateIn' => date('Y-m-d'),
            'TimeIn' => date('H:i a'),
        ]);
    }
    
    public function startRow(): int
    {
        return 2; // Start from the second row
    }
}
