<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VesselAvailability extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'Vessel',
        'Status',
        'DoneBy',
        'Attachment',
        'StartTime',
        'EndTime',
        'StartDate',
        'EndDate',
        'DateIn',
        'TimeIn',
    ];   
}
