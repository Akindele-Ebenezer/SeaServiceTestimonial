<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf; 
use App\Models\VesselAvailability;
// use App\Models\Testimonial;

class VesselAvailabilityPdf extends Controller
{ 
    public function vessel_availability_report(Fpdf $fpdf, Request $Request) {
        $Vessels = VesselAvailability::select(['Vessel'])->groupBy('Vessel')->get();
        $DateFrom = $Request->DateFrom;
        $DateTo = $Request->DateTo; 

        $fpdf->AddPage();    
        // $fpdf->SetAutoPageBreak(false);
        $fpdf->SetTitle('Vessel Availabilty Report - June 2024');
        $fpdf->SetFont('Arial', '', 10);  
 
        $Company = \DB::table('vessels_vessel_information')->select('Company')->where('VesselName', $Request->VesselReportFor)->first(); 
        $Month = strtoupper(\Carbon\Carbon::create()->month($Request->Month)->format('F'));
        $Year = $Request->Year;

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
        $fpdf->Cell(190, 10, 'VESSEL AVAILABILITY REPORT', 0, 1, 1, 'L');
        $fpdf->SetFont('Arial', '', 10);   

        $fpdf->Ln(6);     

        $fpdf->SetFont('Arial', 'B', 7); 
        $fpdf->Cell(20, 0, 'Generated by: ');
        $fpdf->SetFont('Arial', '', 7); 
        $fpdf->Cell(108.5, 0, session()->get('FullName'));
        $fpdf->SetFont('Arial', 'B', 7); 
        $fpdf->Cell(10, 0, 'Month: ');
        $fpdf->SetFont('Arial', '', 7); 
        $fpdf->Cell(20, 0, $Month . ' ' . $Year);
        $fpdf->Ln(6);     

        $fpdf->SetFont('Arial', 'B', 7); 
        $fpdf->Cell(20, 0, 'Date of report: ');
        $fpdf->SetFont('Arial', '', 7); 
        $fpdf->Cell(108.5, 0, date('Y-m-d'));
        $fpdf->SetFont('Arial', 'B', 7); 
        $fpdf->Cell(10, 0, 'Vessel: ');
        $fpdf->SetFont('Arial', '', 7); 
        $fpdf->Cell(20, 0, $Request->Vessel);

        $fpdf->SetDrawColor(200, 200, 200);
        $fpdf->SetTextColor(50, 50, 50);

        $fpdf->Ln(10);    
        $fpdf->SetFont('Arial', 'B', 14);  
        $fpdf->Cell(190, 10, 'SUMMARY', 0, 1, 1, 'L');

        $fpdf->SetFont('Arial', 'B', 7);   
        $Vessels = \DB::table('vessel_availabilities')->where('Vessel', $Request->VesselReportFor)->first();
        if (!empty($Vessels->TillNow)) {
            if ($Vessels->TillNow == 'YES') {
                $DateTo = date('Y-m-d');  
            }
        }

        if (isset($Request->Month) AND isset($Request->Vessel)) { 
            $VesselAvailability = \DB::table('vessel_availabilities')->where('Vessel', $Request->Vessel)->whereYear('StartDate', $Year)->whereMonth('StartDate', $Request->Month)
                                        ->orWhere(function($query) use ($Request, $Year) {
                                            $query->where('Vessel', $Request->Vessel)
                                            ->whereYear('EndDate', $Year)
                                            ->whereMonth('EndDate', $Request->Month);
                                        })->orderBy('StartDate')->get();                           
            $TotalDocking = \DB::table('vessel_availabilities')->select(['id', 'Vessel', 'Status'])->where('Vessel', $Request->Vessel)->whereYear('StartDate', $Year)->whereMonth('StartDate', $Request->Month)
                                        ->where('Status', 'DOCKING')
                                        ->orWhere(function($query) use ($Request, $Year) {
                                            $query->where('Vessel', $Request->Vessel)
                                            ->whereYear('EndDate', $Year)
                                            ->where('Status', 'DOCKING')
                                            ->whereMonth('EndDate', $Request->Month);
                                        })->get(); 
            $TotalBreakdown = \DB::table('vessel_availabilities')->select('id')->where('Vessel', $Request->Vessel)->whereYear('StartDate', $Year)->whereMonth('StartDate', $Request->Month)
                                        ->where('Status', 'BREAKDOWN')
                                        ->orWhere(function($query) use ($Request, $Year) {
                                            $query->where('Vessel', $Request->Vessel)
                                            ->whereYear('EndDate', $Year)
                                            ->where('Status', 'BREAKDOWN')
                                            ->whereMonth('EndDate', $Request->Month);
                                        })->get();
            $TotalInspection = \DB::table('vessel_availabilities')->select('id')->where('Vessel', $Request->Vessel)->whereYear('StartDate', $Year)->whereMonth('StartDate', $Request->Month)
                                        ->where('Status', 'INSPECTION')
                                        ->orWhere(function($query) use ($Request, $Year) {
                                            $query->where('Vessel', $Request->Vessel)
                                            ->whereYear('EndDate', $Year)
                                            ->where('Status', 'INSPECTION')
                                            ->whereMonth('EndDate', $Request->Month);
                                        })->get();
            $TotalBunkery = \DB::table('vessel_availabilities')->select('id')->where('Vessel', $Request->Vessel)->whereYear('StartDate', $Year)->whereMonth('StartDate', $Request->Month)
                                        ->where('Status', 'BUNKERY')
                                        ->orWhere(function($query) use ($Request, $Year) {
                                            $query->where('Vessel', $Request->Vessel)
                                            ->whereYear('EndDate', $Year)
                                            ->where('Status', 'BUNKERY')
                                            ->whereMonth('EndDate', $Request->Month);
                                        })->get();
            $TotalMaintenance = \DB::table('vessel_availabilities')->select('id')->where('Vessel', $Request->Vessel)->whereYear('StartDate', $Year)->whereMonth('StartDate', $Request->Month)
                                        ->where('Status', 'MAINTENANCE')
                                        ->orWhere(function($query) use ($Request, $Year) {
                                            $query->where('Vessel', $Request->Vessel)
                                            ->whereYear('EndDate', $Year)
                                            ->where('Status', 'MAINTENANCE')
                                            ->whereMonth('EndDate', $Request->Month);
                                        })->get();
            $TotalReady = \DB::table('vessel_availabilities')->select('id')->where('Vessel', $Request->Vessel)->whereYear('StartDate', $Year)->whereMonth('StartDate', $Request->Month)
                                        ->where('Status', 'IDLE')
                                        ->orWhere(function($query) use ($Request, $Year) {
                                            $query->where('Vessel', $Request->Vessel)
                                            ->whereYear('EndDate', $Year)
                                            ->where('Status', 'IDLE')
                                            ->whereMonth('EndDate', $Request->Month);
                                        })->get();
            $fpdf->SetFont('Arial', '', 9);  
            $fpdf->Ln(3);
            $fpdf->MultiCell(190, 5, 'This report summarizes vessel availability for each month, detailing vessel usage, downtime, and availability for efficient fleet management and planning. The analysis provides a comprehensive overview of vessel availability, including operational status, utilization rates, and downtime analysis, crucial for effective maritime operations planning and optimization.');
            $fpdf->Ln(3);
            $fpdf->SetFont('Arial', 'B', 14);  
            $fpdf->Cell(190.4, 10, 'IN ' . strtoupper(\Carbon\Carbon::create()->month($Request->Month)->format('F')) . ' ' . $Request->Year, 0, 1, 1, 'L');
            $fpdf->SetFont('Arial', 'B', 9);  
            $fpdf->Cell(31.7, 5, 'Status ', 1);
            $fpdf->Cell(31.7, 5, 'Start Date ', 1);
            $fpdf->Cell(31.7, 5, 'Start Time ', 1);
            $fpdf->Cell(31.7, 5, 'End Date', 1);
            $fpdf->Cell(31.7, 5, 'End Time ', 1);
            $fpdf->Cell(31.7, 5, 'Duration ', 1);

            $fpdf->Ln();
            $fpdf->SetFont('Arial', '', 7);  
            $fpdf->Ln(0.1);
            foreach ($VesselAvailability as $Vessel) {
                $StartDateTime = \Carbon\Carbon::parse($Vessel->StartDate . ' ' . $Vessel->StartTime);
                $EndDateTime = \Carbon\Carbon::parse($Vessel->EndDate . ' ' . $Vessel->EndTime);
                $HoursBetween = $EndDateTime->diffInHours($StartDateTime);
                $MinutesBetween = $StartDateTime->diffInMinutes($EndDateTime); 
                $TotalDays = $EndDateTime->diffInDays($StartDateTime);

                $fpdf->Cell(31.7, 5, $Vessel->Status == 'IDLE' ? 'READY' : $Vessel->Status, 1);
                $fpdf->Cell(31.7, 5, $Vessel->StartDate, 1);
                $fpdf->Cell(31.7, 5, $Vessel->StartTime . ' HRS', 1);
                $fpdf->Cell(31.7, 5, $Vessel->EndDate, 1);
                $fpdf->Cell(31.7, 5, $Vessel->EndTime . ' HRS', 1);
                $fpdf->Cell(31.7, 5, $HoursBetween == 0 ? $MinutesBetween . ' mins' : $HoursBetween . ' hours : ' . $TotalDays . ' day(s)', 1);
                $fpdf->Ln();
            } 
            $fpdf->Ln();
            $fpdf->SetFont('Arial', 'B', 14);  
            $fpdf->Cell(190.4, 10, 'OVERVIEW', 0, 1, 1, 'L');
            $fpdf->SetFont('Arial', '', 9); 
            $fpdf->Ln(3);
            $fpdf->MultiCell(190, 5, 'Comprehensive evaluation of the vessel\'s status, including maintenance, inspection, breakdown, bunkering, docking, and readiness. This report ensures a thorough overview of the vessel\'s operational efficiency and highlights any issues that may impact its availability for service..');
            $fpdf->Ln(3);
            $fpdf->SetFont('Arial', '', 9);  
            $fpdf->Cell(33.7, 5, 'MAINTENANCE = ' . count($TotalMaintenance) . ',', 0);
            $fpdf->Cell(29.7, 5, 'INSPECTION = ' . count($TotalInspection) . ',', 0);
            $fpdf->Cell(30.7, 5, 'BREAKDOWN = ' . count($TotalBreakdown) . ',', 0);
            $fpdf->Cell(28.7, 5, 'BUNKERING = ' . count($TotalBunkery) . ',', 0);
            $fpdf->Cell(25.7, 5, 'DOCKING = ' . count($TotalDocking) . ',', 0);
            $fpdf->Cell(25.7, 5, 'READY = ' . count($TotalReady) . ',', 0);
            $fpdf->Ln(5);
            $fpdf->Cell(25.7, 5, 'TOTAL ACTIVITIES = ' . count($TotalMaintenance)+count($TotalInspection)+count($TotalBreakdown)+count($TotalBunkery)+count($TotalDocking)+count($TotalReady), 0);
        } else {
            // $VesselAvailability = \DB::table('vessel_availabilities')->where('Vessel', $Request->VesselReportFor)->whereYear('StartDate', $Year)->whereMonth('StartDate', 7)->orWhereMonth('EndDate', 7)->get();
            // $fpdf->SetFont('Arial', '', 9);  
            // $fpdf->Ln(3);
            // $fpdf->MultiCell(190, 5, 'This report summarizes vessel availability for each month, detailing vessel usage, downtime, and availability for efficient fleet management and planning. The analysis provides a comprehensive overview of vessel availability, including operational status, utilization rates, and downtime analysis, crucial for effective maritime operations planning and optimization.');
            // $fpdf->Ln(3);
            // $fpdf->SetFont('Arial', 'B', 14);  
            // $fpdf->Cell(190.4, 10, 'JULY', 0, 1, 1, 'L');
            // $fpdf->SetFont('Arial', 'B', 9);  
            // $fpdf->Cell(31.7, 5, 'Status ', 1);
            // $fpdf->Cell(31.7, 5, 'Start Date ', 1);
            // $fpdf->Cell(31.7, 5, 'Start Time ', 1);
            // $fpdf->Cell(31.7, 5, 'End Date', 1);
            // $fpdf->Cell(31.7, 5, 'End Time ', 1);
            // $fpdf->Cell(31.7, 5, 'Duration ', 1);

            // $fpdf->Ln();
            // $fpdf->SetFont('Arial', '', 9);  
            // $fpdf->Ln(0.1);
            // foreach ($VesselAvailability as $Vessel) {
            //     $StartDateTime = \Carbon\Carbon::parse($Vessel->StartDate . ' ' . $Vessel->StartTime);
            //     $EndDateTime = \Carbon\Carbon::parse($Vessel->EndDate . ' ' . $Vessel->EndTime);
            //     $HoursBetween = $EndDateTime->diffInHours($StartDateTime);
            //     $TotalDays = $EndDateTime->diffInDays($StartDateTime);

            //     $fpdf->Cell(31.7, 5, $Vessel->Status, 1);
            //     $fpdf->Cell(31.7, 5, $Vessel->StartDate, 1);
            //     $fpdf->Cell(31.7, 5, $Vessel->StartTime . ' HRS', 1);
            //     $fpdf->Cell(31.7, 5, $Vessel->EndDate, 1);
            //     $fpdf->Cell(31.7, 5, $Vessel->EndTime . ' HRS', 1);
            //     $fpdf->Cell(31.7, 5, $HoursBetween . ' hours : ' . $TotalDays . ' day(s)', 1);
            //     $fpdf->Ln();
            // } 
        }
        $fpdf->SetFont('Arial', 'B', 7); 
  
        $fpdf->Ln(5);     
          
        $fpdf->Output();        
        exit; 
    }
}
