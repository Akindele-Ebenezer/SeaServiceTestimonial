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
        return new VesselAvailability([
            'Vessel' => $row[24], 
            // 'Status' => $row[25],
            // 'DoneBy' => $row[25], 
            // 'Attachment' => $row[5],
            'StartTime' => \Carbon\Carbon::createFromTimestamp($row[5] * 86400)->format("H:i"),
            'EndTime' => \Carbon\Carbon::createFromTimestamp($row[10] * 86400)->format("H:i"),
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
