<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;   

class SmallBoatsPdf extends Controller
{ 
    public function small_boat_report(Fpdf $fpdf, Request $Request) {  
        $fpdf->AddPage();    
        // $fpdf->SetAutoPageBreak(false);
        $fpdf->SetFont('Arial', '', 10);  
 
        $Company = \DB::table('vessels_vessel_information')->select('Company')->where('VesselName', 'ASAGA')->first();  
        $fpdf->SetTitle('Vessel Availabilty Report - ');

        if($Company == null) {
            $fpdf->Image('../public/images/ltt-letter-head.png', 10, 7, 190);   
        } else if ($Company->Company == 'L.T.T') {
            $fpdf->Image('../public/images/ltt-letter-head.png', 10, 7, 190);    
        } else if ($Company->Company == 'DEPASA') {  
            $fpdf->Image('../public/images/depasa-letter-head.png', 10, 7, 190);    
        } 

        $fpdf->Ln(35);      
        
        $fpdf->SetFont('Arial', 'B', 15); 
        $fpdf->SetFillColor(217, 242, 255);  
        $fpdf->Cell(190, 10, 'SMALL BOATS, CAPTAINS & ENGINEERS HANDOVER STATEMENT', 0, 1, 1, 'L');
        $fpdf->Output();        
        exit; 
    }
}
