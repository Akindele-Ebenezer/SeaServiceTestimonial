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
        $fpdf->SetAutoPageBreak(false);
        $fpdf->SetTitle('Vessel Availabilty Report - June 2024');
        $fpdf->SetFont('Arial', '', 10);  

        $fpdf->Image('../public/images/ltt-letter-head.png', 10, 7, 190);    
        $fpdf->Ln(35);     
        $fpdf->Cell(162, -7, 'Date: ' . date("j F, Y"), 0, 1, 'R'); 
        $fpdf->Ln(9);     
        
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
        $fpdf->Cell(20, 0, 'Month: ');
        $fpdf->SetFont('Arial', '', 7); 
        $fpdf->Cell(20, 0, strtoupper(\Carbon\Carbon::parse($Request->DateFrom)->monthName) . ' ' . date('Y'));
        $fpdf->Ln(6);     

        $fpdf->SetFont('Arial', 'B', 7); 
        $fpdf->Cell(20, 0, 'Date of report: ');
        $fpdf->SetFont('Arial', '', 7); 
        $fpdf->Cell(108.5, 0, date('Y-m-d'));
        $fpdf->SetFont('Arial', 'B', 7); 
        $fpdf->Cell(20, 0, 'Week starting: ');
        $fpdf->SetFont('Arial', '', 7); 
        $fpdf->Cell(20, 0, $DateFrom);

        $fpdf->SetDrawColor(200, 200, 200);
        $fpdf->SetTextColor(50, 50, 50);

        $fpdf->Ln(10);    
        $fpdf->SetFont('Arial', 'B', 14);  
        $fpdf->Cell(190, 10, 'SUMMARY', 0, 1, 1, 'L');

        $fpdf->SetFont('Arial', 'B', 7); 
        $fpdf->Cell(10, 10, 'S/N ', 1);
        $fpdf->SetFont('Arial', 'B', 10); 
        $fpdf->Cell(50, 10, 'NAMES OF VESSELS', 1);
        $fpdf->SetFont('Arial', 'B', 7); 
        $fpdf->Cell(20, 10, 'STATUS', 1);
        $fpdf->Cell(60, 5, 'CATEGORY 2', 1, 0, 'C');
        $fpdf->Cell(50, 5, 'CATEGORY 1', 1, 1, 'C');
        $fpdf->Cell(60, 5, ''); 
        $fpdf->SetFont('Arial', 'B', 7); 
        $fpdf->Cell(20, 5, '', 'B', 0, 1);
        $fpdf->Cell(15, 5, 'Bunkery', 1);
        $fpdf->Cell(15, 5, 'Inspection', 1);
        $fpdf->Cell(15, 5, 'Operation', 1);
        $fpdf->Cell(15, 5, 'Idle', 1);
        $fpdf->Cell(16.7, 5, 'Maintenance', 1);
        $fpdf->Cell(16.7, 5, 'Docking', 1);
        $fpdf->Cell(16.7, 5, 'Breakdown', 1); 
        
        $fpdf->Ln();

        // VESSEL DATA
        $fpdf->SetFont('Arial', '', 7); 
        $Index = 1;
        $TotalBunkery = [];
        $TotalInspection = [];
        $TotalOperation = [];
        $TotalIdle = [];
        $TotalMaintenance = [];
        $TotalDocking = [];
        $TotalBreakdown = [];
        foreach ($Vessels as $Vessel) {
            $VesselStatus = VesselAvailability::select('Status')->where('Vessel', $Vessel->Vessel)->orderBy('id', 'DESC')->first();
            $VesselStatus = $VesselStatus->Status == 'IDLE' ? 'READY' : $VesselStatus->Status;
            $BunkeryStatus = VesselAvailability::select('id')
            ->where('Vessel', $Vessel->Vessel)
            ->where('Status', 'BUNKERY')
            ->whereBetween('StartDate', [$DateFrom, $DateTo])
            ->get();
            $InspectionStatus = VesselAvailability::select('id')
            ->where('Vessel', $Vessel->Vessel)
            ->where('Status', 'INSPECTION')
            ->whereBetween('StartDate', [$DateFrom, $DateTo])
            ->get();
            $OperationStatus = VesselAvailability::select('id')
            ->where('Vessel', $Vessel->Vessel)
            ->where('Status', 'OPERATION')
            ->whereBetween('StartDate', [$DateFrom, $DateTo])
            ->get();
            $IdleStatus = VesselAvailability::select('id')
            ->where('Vessel', $Vessel->Vessel)
            ->where('Status', 'IDLE')
            ->whereBetween('StartDate', [$DateFrom, $DateTo])
            ->get();
            $MaintenanceStatus = VesselAvailability::select('id')
            ->where('Vessel', $Vessel->Vessel)
            ->where('Status', 'MAINTENANCE')
            ->whereBetween('StartDate', [$DateFrom, $DateTo])
            ->get();
            $DockingStatus = VesselAvailability::select('id')
            ->where('Vessel', $Vessel->Vessel)
            ->where('Status', 'DOCKING')
            ->whereBetween('StartDate', [$DateFrom, $DateTo])
            ->get();
            $BreakdownStatus = VesselAvailability::select('id')
            ->where('Vessel', $Vessel->Vessel)
            ->where('Status', 'BREAKDOWN')
            ->whereBetween('StartDate', [$DateFrom, $DateTo])
            ->get();

            $fpdf->Cell(10, 6.5, $Index, 1); 
            $fpdf->Cell(50, 6.5, $Vessel->Vessel, 'B', 0, 1); 
            $fpdf->Cell(20, 6.5, $VesselStatus, 'LB', 0, 1);
            $fpdf->Cell(15, 6.5, count($BunkeryStatus), 1);
            $fpdf->Cell(15, 6.5, count($InspectionStatus), 1);
            $fpdf->Cell(15, 6.5, count($OperationStatus), 1);
            $fpdf->Cell(15, 6.5, count($IdleStatus), 1);
            $fpdf->Cell(16.7, 6.5, count($MaintenanceStatus), 1);
            $fpdf->Cell(16.7, 6.5, count($DockingStatus), 1);
            $fpdf->Cell(16.7, 6.5, count($BreakdownStatus), 1); 
    
            $fpdf->Ln();
            $Index++;
            array_push($TotalBunkery, count($BunkeryStatus));
            array_push($TotalInspection, count($InspectionStatus));
            array_push($TotalOperation, count($OperationStatus));
            array_push($TotalIdle, count($IdleStatus));
            array_push($TotalMaintenance, count($MaintenanceStatus));
            array_push($TotalDocking, count($DockingStatus));
            array_push($TotalBreakdown, count($BreakdownStatus));
        }
        $fpdf->SetFont('Arial', 'B', 7); 
 
// VESSEL DATA
        
        $fpdf->Cell(10, 6.5, ''); 
        $fpdf->Cell(50, 6.5, ''); 
        $fpdf->SetFillColor(217, 242, 255); 
        $fpdf->Cell(20, 6.5, 'TOTAL', '', 0, 1, 1);
        $fpdf->Cell(15, 6.5, collect($TotalBunkery)->sum(), 1);
        $fpdf->Cell(15, 6.5, collect($TotalInspection)->sum(), 1);
        $fpdf->Cell(15, 6.5, collect($TotalOperation)->sum(), 1);
        $fpdf->Cell(15, 6.5, collect($TotalIdle)->sum(), 1);
        $fpdf->Cell(16.7, 6.5, collect($TotalMaintenance)->sum(), 1);
        $fpdf->Cell(16.7, 6.5, collect($TotalDocking)->sum(), 1);
        $fpdf->Cell(16.7, 6.5, collect($TotalBreakdown)->sum(), 1); 
        $fpdf->Ln(20);     
        
        $fpdf->SetFont('Arial', 'B', 14); 
        $fpdf->Cell(190, 10, 'VESSEL DETAILS', 0, 1, 1, 'L');
        $fpdf->SetFont('Arial', 'B', 7); 
        $fpdf->Cell(10, 10, 'S/N ', 1);
        $fpdf->SetFont('Arial', 'B', 10); 
        $fpdf->Cell(50, 10, 'IMO NUMBER', 'TR');
        $fpdf->SetFont('Arial', 'B', 7);  
        $fpdf->Cell(130, 5, 'CATEGORY 3', 1, 1, 'C'); 
        $fpdf->Cell(60, 5, '');
        $fpdf->SetFont('Arial', 'B', 10); 
        // $fpdf->Cell(50, 5, 'NUMBER', 'B', 0, 1);
        $fpdf->SetFont('Arial', 'B', 7);  
        $fpdf->Cell(26, 5, 'Gross Tonnage', 1);
        $fpdf->Cell(26, 5, 'Net Tonnage', 1);
        $fpdf->Cell(26, 5, 'Hours Worked', 1);
        $fpdf->Cell(26, 5, 'Days', 1);
        $fpdf->Cell(26, 5, 'Remarks', 1); 

        $fpdf->Ln();
        $fpdf->SetFont('Arial', '', 7);  
        
        // VESSEL DATA
        $Index = 1;
        $TOTALHoursWorked = [];
        $TOTALDaysWorked = [];
        foreach ($Vessels as $Vessel) {
            $VesselImoNumber = \DB::table('vessels_vessel_information')->select('ImoNumber')->where('VesselName', $Vessel->Vessel)->orderBy('id', 'DESC')->first();
            $VesselGRT_NET = \DB::table('vessels_section_4')->select(['GrossTonnage', 'NetTonnage'])->where('ImoNumber', $VesselImoNumber->ImoNumber ?? 0)->orderBy('id', 'DESC')->first();
            $HoursWorked = \DB::table('vessel_availabilities')->select(['StartTime', 'EndTime'])->where('Vessel', $Vessel->Vessel)->whereBetween('StartDate', [$Request->DateFrom, $Request->DateTo])->whereBetween('EndDate', [$Request->DateFrom, $Request->DateTo])->get(); 
            foreach ($HoursWorked as $Hour) { 
                $StartTimeHour_ = substr($Hour->StartTime, 0, 1) == 0 ? substr($Hour->StartTime, 1, 1) : substr($Hour->StartTime, 0, 2);
                $StartTimeMinute_ = substr($Hour->StartTime, 3, 4) == 0 ? substr($Hour->StartTime, 3, 3) : substr($Hour->StartTime, 3, 4);
                $EndTimeHour_ = substr($Hour->EndTime, 0, 1) == 0 ? substr($Hour->EndTime, 1, 1) : substr($Hour->EndTime, 0, 2);
                $EndTimeMinute_ = substr($Hour->EndTime, 3, 4) == 0 ? substr($Hour->EndTime, 3, 3) : substr($Hour->EndTime, 3, 4);
                $HoursBetween = \Carbon\Carbon::createFromTime($EndTimeHour_, $EndTimeMinute_)->diffInHours(\Carbon\Carbon::createFromTime($StartTimeHour_, $StartTimeMinute_));
            }  
            if ($HoursWorked->isEmpty()) {
                $HoursBetween = '0'; 
            }
            $DaysWorked = \DB::table('vessel_availabilities')->select(['StartDate', 'EndDate'])->where('Vessel', $Vessel->Vessel)->whereBetween('StartDate', [$Request->DateFrom, $Request->DateTo])->whereBetween('EndDate', [$Request->DateFrom, $Request->DateTo])->get(); 
            array_push($TOTALHoursWorked, $HoursBetween);
            array_push($TOTALDaysWorked, count($DaysWorked));
            $fpdf->Cell(10, 6.5, $Index, 1); 
            $fpdf->Cell(50, 6.5, $VesselImoNumber->ImoNumber ?? '-', 1); 
            $fpdf->Cell(26, 6.5, $VesselGRT_NET->GrossTonnage ?? '-', 1);   
            $fpdf->Cell(26, 6.5, $VesselGRT_NET->NetTonnage ?? '-', 1); 
            $fpdf->Cell(26, 6.5, $HoursBetween . ($HoursBetween < 2 ? ' HOUR' : ' HOURS'), 1);
            $fpdf->Cell(26, 6.5, count($DaysWorked), 1); 
            $fpdf->Cell(26, 6.5, '6', 1); 

            $fpdf->Ln(); 
            $Index++;
        } 
        // VESSEL DATA

        $fpdf->SetFont('Arial', 'B', 7);  
        
        $fpdf->Cell(10, 6.5, ''); 
        $fpdf->Cell(50, 6.5, ''); 
        $fpdf->Cell(26, 6.5, '');  
        $fpdf->SetFillColor(217, 242, 255); 
        $fpdf->Cell(26, 6.5, 'TOTAL', '', 0, 1, 1);
        $fpdf->SetFillColor(255, 255, 255); 
        $fpdf->Cell(26, 6.5, collect($TOTALHoursWorked)->sum(), 1);
        $fpdf->Cell(26, 6.5, collect($TOTALDaysWorked)->sum(), 1); 
        $fpdf->Ln(20);    
        

        $fpdf->Output();        
        exit; 
    }
}
