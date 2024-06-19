<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf; 
// use App\Models\Testimonial;

class VesselAvailabilityPdf extends Controller
{
   
    public function vessel_availability_report(Fpdf $fpdf, Request $Request) {
        dd($fpdf);
        $fpdf->AddPage();    
        // $fpdf->SetAutoPageBreak(false);
        // $fpdf->SetTitle('Vessel Availabilty Report - June 2024');
        // $fpdf->SetFont('Times', '', 11); 

        // $fpdf->Cell(10, 10, 'false');        
    }
}
