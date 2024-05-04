<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf; 
use App\Models\Testimonial;

class SeaServiceTestimonialPdf extends Controller
{
    public function template_1(Fpdf $fpdf, Request $Request) { 
        $Employee = Testimonial::select('EmployeeName')->where('id', $Request->Testimonial_Id)->first();
        $StaffNumber = Testimonial::select('EmployeeId')->where('id', $Request->Testimonial_Id)->first();
        $DateOfBirth = Testimonial::select('DateOfBirth')->where('id', $Request->Testimonial_Id)->first();
        $AreaOfOperation = Testimonial::select('AreaOfOperation')->where('id', $Request->Testimonial_Id)->first();
        $DischargeBook = Testimonial::select('DischargeBook')->where('id', $Request->Testimonial_Id)->first();
        $Rank = Testimonial::select('Rank')->where('id', $Request->Testimonial_Id)->first();
        $Company = Testimonial::select('Company')->where('id', $Request->Testimonial_Id)->first();
        $TemplateFormat = Testimonial::select('Template')->where('id', $Request->Testimonial_Id)->first();
        $CurrentVessel = Testimonial::select('CurrentVessel')->where('id', $Request->Testimonial_Id)->first();
        $ImoNumber = \DB::table('vessels_vessel_information')->select('ImoNumber')->where('VesselName', $CurrentVessel->CurrentVessel ?? '-')->first();
        $DateIn = Testimonial::select('DateIn')->where('id', $Request->Testimonial_Id)->first();
        $TimeIn = Testimonial::select('TimeIn')->where('id', $Request->Testimonial_Id)->first(); 
        $GRTSign = \DB::table('vessels_section_4')->select('GrossTonnage')->where('ImoNumber', $ImoNumber->ImoNumber)->first();
        $StartDate_1 = \DB::table('working_periods')
                            ->select('StartDate_1')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();
        $StartDate_2 = \DB::table('working_periods')
                            ->select('StartDate_2')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();
        $StartDate_3 = \DB::table('working_periods')
                            ->select('StartDate_3')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();
        $StartDate_4 = \DB::table('working_periods')
                            ->select('StartDate_4')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();
        $StartDate_5 = \DB::table('working_periods')
                            ->select('StartDate_5')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();
        $EndDate_1 = \DB::table('working_periods')
                            ->select('EndDate_1')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();
        $EndDate_2 = \DB::table('working_periods')
                            ->select('EndDate_2')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();
        $EndDate_3 = \DB::table('working_periods')
                            ->select('EndDate_3')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();
        $EndDate_4 = \DB::table('working_periods')
                            ->select('EndDate_4')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();
        $EndDate_5 = \DB::table('working_periods')
                            ->select('EndDate_5')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();

        $fpdf->AddPage();    
        $fpdf->SetAutoPageBreak(false);
        $fpdf->SetTitle('Template 1 - SEA SERVICE TESTIMONIAL');         

        if(empty($Company)) {
            $fpdf->Image('../public/images/ltt-letter-head.png', 10, 0, 190);    
            $fpdf->Ln(30);     
            $fpdf->SetFont('Times', '', 11); 
            $fpdf->Cell(162.7, -10, 'Date: ' . date("j F, Y"), 0, 1, 'R'); 
        } else { 
            if($Company->Company === 'L.T.T') {
                $fpdf->Image('../public/images/ltt-letter-head.png', 10, 0, 190);    
                $fpdf->Ln(30);     
                $fpdf->SetFont('Times', '', 11); 
                if(date("j") < 9) {
                    $fpdf->Cell(159.5, -10, 'Date: ' . date("j F, Y"), 0, 1, 'R'); 
                } else {
                    $fpdf->Cell(162.7, -10, 'Date: ' . date("j F, Y"), 0, 1, 'R'); 
                }
            }  
            if($Company->Company === 'DEPASA') {   
                $fpdf->Image('../public/images/depasa-letter-head.png', 10, 5, 190);  
                $fpdf->Ln(30);     
                $fpdf->SetFont('Times', '', 11); 
                if(date("j") < 9) {
                    $fpdf->Cell(170, -10, 'Date: ' . date("j F, Y"), 0, 1, 'R'); 
                } else {
                    $fpdf->Cell(173.2, -8, 'Date: ' . date("j F, Y"), 0, 1, 'R'); 
                }
            }  
        }
   
        $fpdf->SetDrawColor(200, 200, 200); 
      
        $fpdf->Ln(5);     
        $fpdf->SetFont('Times', 'BU', 17); 
        $fpdf->Cell(190, 25, 'SEA SERVICE TESTIMONIAL', 0, 1, 'C');
        $fpdf->SetFont('Times', '', 14); 
        $fpdf->Cell(190, -3, 'I certify that the following record is truthful statement of a sea service performed by:', 0, 1, 'L');
        $fpdf->SetFont('Times', 'B', 14); 
        $fpdf->Cell(190, 20, 'Name: ' . (empty($Employee->EmployeeName) ? '-' : $Employee->EmployeeName), 0, 1, 'L');
        $fpdf->Cell(190, -3, 'Date of Birth: ' . (empty($DateOfBirth->DateOfBirth) ? '-' : $DateOfBirth->DateOfBirth), 0, 1, 'L');
        $fpdf->Cell(190, 20, 'Discharge Book No: ' . (empty($DischargeBook->DischargeBook) ? '-' : $DischargeBook->DischargeBook), 0, 1, 'L');
        $fpdf->SetFont('Times', '', 9);         
          
        //// TABLE HEAD 
        $fpdf->SetFont('Times', 'B', 9);         
        $fpdf->Cell(40, 5, 'Period of Service & Date', 'LTR', 0, 'L');
        $fpdf->SetFont('Times', 'B', 12);   
        $fpdf->Cell(35, 8, 'VESSEL', 'LTR', 0, 'L');
        $fpdf->Cell(25, 13, 'IMO NO', 'LTR', 0, 'L');
        $fpdf->Cell(32, 13, 'RANK', 'LTR', 0, 'L'); 
        $fpdf->Cell(30, 8, 'AREA OF', 'LTR', 0, 'L');   
        $fpdf->Cell(25, 8, 'G.R.T', 'LTR', 0, 'L');   
        $fpdf->Ln(5); 
        $fpdf->SetFont('Times', 'B', 9);         
        $fpdf->Cell(20, 8, 'From', 1, 0, 'L');
        $fpdf->Cell(20, 8, 'To', 1, 0, 'L');
        $fpdf->SetFont('Times', 'B', 12);         
        $fpdf->Cell(35, 8, 'NAME', 'LR', 0, 'L'); 
        $fpdf->Cell(25, 8, ' ', 'LR', 0, 'L'); 
        $fpdf->Cell(32, 8, ' ', 'LR', 0, 'L'); 
        $fpdf->Cell(30, 8, 'OPERATION', 'LR', 0, 'L');
        $fpdf->Cell(25, 8, 'SIGN', 'LR', 0, 'L');  
        $fpdf->Ln();
           
        //// TABLE COLUMNS 
        $fpdf->SetFont('Times', '', 11);  
      
        $cellWidth=80;//wrapped cell width
        $cellHeight=5;//normal one-line cell height
        
        if($fpdf->GetStringWidth($CurrentVessel->CurrentVessel) < $cellWidth){
            $line=1;
        }else{
            $textLength=strlen($CurrentVessel->CurrentVessel);	 
            $errMargin=10;		 
            $startChar=0;		 
            $maxChar=0;			 
            $textArray=array();	 
            $tmpString="";		 
            
            while($startChar < $textLength){  
                while( 
                $fpdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) &&
                ($startChar+$maxChar) < $textLength ) {
                    $maxChar++;
                    $tmpString=substr($CurrentVessel->CurrentVessel,$startChar,$maxChar);
                }
                $startChar=$startChar+$maxChar;
                array_push($textArray,$tmpString);
                    
                $maxChar=0;
                $tmpString='';
                
            }
        
            $line=count($textArray);
        }

        $fpdf->Cell(20,10,(empty($StartDate_1->StartDate_1) ? '-' : $StartDate_1->StartDate_1),1,0);  
        $fpdf->Cell(20,10,(empty($EndDate_1->EndDate_1) ? '-' : $EndDate_1->EndDate_1),1,0);  
        $yPos=$fpdf->GetY(); 
        $xPos=$fpdf->GetX(); 
 
        if(strlen($CurrentVessel->CurrentVessel) < 14) {
            $fpdf->Cell(35,10,(empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel),1,0);  
            $fpdf->SetXY($xPos - 45 + $cellWidth , $yPos);
        }
        if(strlen($CurrentVessel->CurrentVessel) >= 14) {
            $fpdf->MultiCell(35,$cellHeight, (strlen($CurrentVessel->CurrentVessel) < 14 ? strtoupper(str_replace(' ', '-', $CurrentVessel->CurrentVessel)) . '                             ' : str_replace(' ', '-', $CurrentVessel->CurrentVessel)),1);
            $fpdf->SetXY($xPos - 45 + $cellWidth , $yPos);
        }
        
        $fpdf->Cell(25,10,(empty($ImoNumber->ImoNumber) ? '-' : $ImoNumber->ImoNumber),1,0); 
        $yPos=$fpdf->GetY(); 
        if(strlen($Rank->Rank) < 13) {
            $fpdf->Cell(32,10,(empty($Rank->Rank) ? '-' : $Rank->Rank),1,0);  
            $fpdf->SetXY($xPos + 12 + $cellWidth , $yPos);
        } 
        if(strlen($Rank->Rank) >= 13) {
            $fpdf->MultiCell(32, $cellHeight,(strlen($Rank->Rank) < 13 ? strtoupper(str_replace(' ', '-', $Rank->Rank)) . '                       ' : strtoupper(str_replace(' ', '-', $Rank->Rank))),1); //adapt height to number of lines
            $fpdf->SetXY($xPos + 12 + $cellWidth , $yPos);
        } 
        $fpdf->MultiCell(30,10,(empty($AreaOfOperation->AreaOfOperation) ? '-' : str_replace(' ', '-', $AreaOfOperation->AreaOfOperation)),1);
        $fpdf->SetXY(92 + $cellWidth , $yPos);
        $yPos=$fpdf->GetY();
        $fpdf->Cell(25,10, $GRTSign->GrossTonnage ?? '-',1,0); 
        $fpdf->ln();
        
        if(!empty($StartDate_2->StartDate_2)) {
            $fpdf->Cell(20,10,(empty($StartDate_2->StartDate_2) ? '-' : $StartDate_2->StartDate_2),1,0); //adapt height to number of lines
            $fpdf->Cell(20,10,(empty($EndDate_2->EndDate_2) ? '-' : $EndDate_2->EndDate_2),1,0); //adapt height to number of lines
            $yPos=$fpdf->GetY();
            $xPos=$fpdf->GetX(); 
 
            if(strlen($CurrentVessel->CurrentVessel) < 14) {
                $fpdf->Cell(35,10,(empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel),1,0);  
                $fpdf->SetXY($xPos - 45 + $cellWidth , $yPos);
            }
            if(strlen($CurrentVessel->CurrentVessel) >= 14) {
                $fpdf->MultiCell(35,$cellHeight, (strlen($CurrentVessel->CurrentVessel) < 14 ? strtoupper(str_replace(' ', '-', $CurrentVessel->CurrentVessel)) . '                             ' : str_replace(' ', '-', $CurrentVessel->CurrentVessel)),1);
                $fpdf->SetXY($xPos - 45 + $cellWidth , $yPos);
            }
            
            $fpdf->Cell(25,10,(empty($ImoNumber->ImoNumber) ? '-' : $ImoNumber->ImoNumber),1,0); 
            $yPos=$fpdf->GetY(); 
        
            if(strlen($Rank->Rank) < 13) {
                $fpdf->Cell(32,10,(empty($Rank->Rank) ? '-' : $Rank->Rank),1,0);  
                $fpdf->SetXY(62 + $cellWidth , $yPos);
            } 
            if(strlen($Rank->Rank) >= 13) {
                $fpdf->MultiCell(32, $cellHeight,(strlen($Rank->Rank) < 13 ? strtoupper(str_replace(' ', '-', $Rank->Rank)) . '                       ' : strtoupper(str_replace(' ', '-', $Rank->Rank))),1); //adapt height to number of lines
                $fpdf->SetXY(62 + $cellWidth , $yPos);
            }  
            $fpdf->MultiCell(30,10,(empty($AreaOfOperation->AreaOfOperation) ? '-' : str_replace(' ', '-', $AreaOfOperation->AreaOfOperation)),1);
            $fpdf->SetXY(92 + $cellWidth , $yPos);
            $yPos=$fpdf->GetY();
            $fpdf->Cell(25,10, $GRTSign->GrossTonnage ?? '-',1,0); 
            $fpdf->ln(); 
        }
        if(!empty($StartDate_3->StartDate_3)) {
            $fpdf->Cell(20,10,(empty($StartDate_3->StartDate_3) ? '-' : $StartDate_3->StartDate_3),1,0); //adapt height to number of lines
            $fpdf->Cell(20,10,(empty($EndDate_3->EndDate_3) ? '-' : $EndDate_3->EndDate_3),1,0); //adapt height to number of lines
            $yPos=$fpdf->GetY();
 
            if(strlen($CurrentVessel->CurrentVessel) < 14) {
                $fpdf->Cell(35,10,(empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel),1,0);  
                $fpdf->SetXY($xPos - 45 + $cellWidth , $yPos);
            }
            if(strlen($CurrentVessel->CurrentVessel) >= 14) {
                $fpdf->MultiCell(35,$cellHeight, (strlen($CurrentVessel->CurrentVessel) < 14 ? strtoupper(str_replace(' ', '-', $CurrentVessel->CurrentVessel)) . '                             ' : str_replace(' ', '-', $CurrentVessel->CurrentVessel)),1);
                $fpdf->SetXY($xPos - 45 + $cellWidth , $yPos);
            }
            
            $fpdf->Cell(25,10,(empty($ImoNumber->ImoNumber) ? '-' : $ImoNumber->ImoNumber),1,0); 
            $yPos=$fpdf->GetY(); 
        
            if(strlen($Rank->Rank) < 13) {
                $fpdf->Cell(32,10,(empty($Rank->Rank) ? '-' : $Rank->Rank),1,0);  
                $fpdf->SetXY(62 + $cellWidth , $yPos);
            } 
            if(strlen($Rank->Rank) >= 13) {
                $fpdf->MultiCell(32, $cellHeight,(strlen($Rank->Rank) < 13 ? strtoupper(str_replace(' ', '-', $Rank->Rank)) . '                       ' : strtoupper(str_replace(' ', '-', $Rank->Rank))),1); //adapt height to number of lines
                $fpdf->SetXY(62 + $cellWidth , $yPos);
            }  
            $fpdf->MultiCell(30,10,(empty($AreaOfOperation->AreaOfOperation) ? '-' : str_replace(' ', '-', $AreaOfOperation->AreaOfOperation)),1);
            $fpdf->SetXY(92 + $cellWidth , $yPos);
            $yPos=$fpdf->GetY();
            $fpdf->Cell(25,10, $GRTSign->GrossTonnage ?? '-',1,0); 
            $fpdf->ln();
        }
        if(!empty($StartDate_4->StartDate_4)) {
            $fpdf->Cell(20,10,(empty($StartDate_4->StartDate_4) ? '-' : $StartDate_4->StartDate_4),1,0); //adapt height to number of lines
            $fpdf->Cell(20,10,(empty($EndDate_4->EndDate_4) ? '-' : $EndDate_4->EndDate_4),1,0); //adapt height to number of lines
            $yPos=$fpdf->GetY();
 
            if(strlen($CurrentVessel->CurrentVessel) < 14) {
                $fpdf->Cell(35,10,(empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel),1,0);  
                $fpdf->SetXY($xPos - 45 + $cellWidth , $yPos);
            }
            if(strlen($CurrentVessel->CurrentVessel) >= 14) {
                $fpdf->MultiCell(35,$cellHeight, (strlen($CurrentVessel->CurrentVessel) < 14 ? strtoupper(str_replace(' ', '-', $CurrentVessel->CurrentVessel)) . '                             ' : str_replace(' ', '-', $CurrentVessel->CurrentVessel)),1);
                $fpdf->SetXY($xPos - 45 + $cellWidth , $yPos);
            }
            
            $fpdf->Cell(25,10,(empty($ImoNumber->ImoNumber) ? '-' : $ImoNumber->ImoNumber),1,0); 
            $yPos=$fpdf->GetY(); 
        
            if(strlen($Rank->Rank) < 13) {
                $fpdf->Cell(32,10,(empty($Rank->Rank) ? '-' : $Rank->Rank),1,0);  
                $fpdf->SetXY(62 + $cellWidth , $yPos);
            } 
            if(strlen($Rank->Rank) >= 13) {
                $fpdf->MultiCell(32, $cellHeight,(strlen($Rank->Rank) < 13 ? strtoupper(str_replace(' ', '-', $Rank->Rank)) . '                       ' : strtoupper(str_replace(' ', '-', $Rank->Rank))),1); //adapt height to number of lines
                $fpdf->SetXY(62 + $cellWidth , $yPos);
            }  
            $fpdf->MultiCell(30,10,(empty($AreaOfOperation->AreaOfOperation) ? '-' : str_replace(' ', '-', $AreaOfOperation->AreaOfOperation)),1);
            $fpdf->SetXY(92 + $cellWidth , $yPos);
            $yPos=$fpdf->GetY();
            $fpdf->Cell(25,10, $GRTSign->GrossTonnage ?? '-',1,0); 
            $fpdf->ln();
        }
        if(!empty($StartDate_5->StartDate_5)) {
            $fpdf->Cell(20,10,(empty($StartDate_5->StartDate_5) ? '-' : $StartDate_5->StartDate_5),1,0); //adapt height to number of lines
            $fpdf->Cell(20,10,(empty($EndDate_5->EndDate_5) ? '-' : $EndDate_5->EndDate_5),1,0); //adapt height to number of lines
            $yPos=$fpdf->GetY();
 
            if(strlen($CurrentVessel->CurrentVessel) < 14) {
                $fpdf->Cell(35,10,(empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel),1,0);  
                $fpdf->SetXY($xPos - 45 + $cellWidth , $yPos);
            }
            if(strlen($CurrentVessel->CurrentVessel) >= 14) {
                $fpdf->MultiCell(35,$cellHeight, (strlen($CurrentVessel->CurrentVessel) < 14 ? strtoupper(str_replace(' ', '-', $CurrentVessel->CurrentVessel)) . '                             ' : str_replace(' ', '-', $CurrentVessel->CurrentVessel)),1);
                $fpdf->SetXY($xPos - 45 + $cellWidth , $yPos);
            }
            
            $fpdf->Cell(25,10,(empty($ImoNumber->ImoNumber) ? '-' : $ImoNumber->ImoNumber),1,0); 
            $yPos=$fpdf->GetY(); 
        
            if(strlen($Rank->Rank) < 13) {
                $fpdf->Cell(32,10,(empty($Rank->Rank) ? '-' : $Rank->Rank),1,0);  
                $fpdf->SetXY(62 + $cellWidth , $yPos);
            } 
            if(strlen($Rank->Rank) >= 13) {
                $fpdf->MultiCell(32, $cellHeight,(strlen($Rank->Rank) < 13 ? strtoupper(str_replace(' ', '-', $Rank->Rank)) . '                       ' : strtoupper(str_replace(' ', '-', $Rank->Rank))),1); //adapt height to number of lines
                $fpdf->SetXY(62 + $cellWidth , $yPos);
            }  
            $fpdf->MultiCell(30,10,(empty($AreaOfOperation->AreaOfOperation) ? '-' : str_replace(' ', '-', $AreaOfOperation->AreaOfOperation)),1);
            $fpdf->SetXY(92 + $cellWidth , $yPos);
            $yPos=$fpdf->GetY();
            $fpdf->Cell(25,10, $GRTSign->GrossTonnage ?? '-',1,0); 
            $fpdf->ln();
        }
 
        $fpdf->ln(13);      
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->MultiCell(190, 6, 'During the whole period stated above, the above-named officer was granted ' . $Request->LeaveDays . ' days leave of absence. My report on the service of the above-name officer, during the period stated is as follows:', 0, 'L', 0);
        $fpdf->Ln(5);       
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(70, 5, 'NATURE OF DUTIES PERFORMED; ', 0, 0, 'L'); 
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->Cell(70, 5, '   Navigational watch for not less than 12 hours out of every 24 hours ', 0, 1, 'L'); 
        $fpdf->MultiCell(190, 6, 'whilst the vessel was engaged on operation. General maintenance of vessel.', 0, 'L', 0);
        $fpdf->Ln(5);       
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(45, 8, 'Conduct:', 0);
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->Cell(60, 8, 'Satisfactory', 0, 1);
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(45, 8, 'Experience/Ability:', 0);
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->Cell(60, 8, 'Satisfactory', 0, 1);
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(45, 8, 'Behaviour/Soberiety:', 0);
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->Cell(60, 8, 'Satisfactory', 0, 1);
  
        $fpdf->SetFont('Times', 'B', 12);    
        $fpdf->Cell(60, 10, 'OFFICIAL ENDORSEMENT.', 0, 1);

        $fpdf->Ln(15);    
        $fpdf->SetFont('Times', '', 12);
        $fpdf->Cell(60, 10, '..............................................', 0, 1);
        $fpdf->Cell(190, -10, '................................................', 0, 1, 'R');
        $fpdf->SetFont('Times', 'B', 12);
        $fpdf->Cell(60, 25, 'Signature of Supretendent', 0, 1);  
        $fpdf->Cell(190, -25, 'Signature of Crew Manager',  0, 1, 'R');

        $fpdf->SetFont('Times', '', 12);
        $fpdf->Output();        
        exit;
    }
    
    public function template_2(Fpdf $fpdf, Request $Request) {
        $Employee = Testimonial::select('EmployeeName')->where('id', $Request->Testimonial_Id)->first();
        $StaffNumber = Testimonial::select('EmployeeId')->where('id', $Request->Testimonial_Id)->first();
        $DateOfBirth = Testimonial::select('DateOfBirth')->where('id', $Request->Testimonial_Id)->first();
        $AreaOfOperation = Testimonial::select('AreaOfOperation')->where('id', $Request->Testimonial_Id)->first();
        $DischargeBook = Testimonial::select('DischargeBook')->where('id', $Request->Testimonial_Id)->first();
        $Rank = Testimonial::select('Rank')->where('id', $Request->Testimonial_Id)->first();
        $Company = Testimonial::select('Company')->where('id', $Request->Testimonial_Id)->first();
        $TemplateFormat = Testimonial::select('Template')->where('id', $Request->Testimonial_Id)->first();
        $CurrentVessel = Testimonial::select('CurrentVessel')->where('id', $Request->Testimonial_Id)->first();
        $ImoNumber = \DB::table('vessels_vessel_information')->select('ImoNumber')->where('VesselName', $CurrentVessel->CurrentVessel ?? '-')->first();
        $DateIn = Testimonial::select('DateIn')->where('id', $Request->Testimonial_Id)->first();
        $TimeIn = Testimonial::select('TimeIn')->where('id', $Request->Testimonial_Id)->first();
        $GRTSign = \DB::table('vessels_section_4')->select('GrossTonnage')->where('ImoNumber', $ImoNumber->ImoNumber)->first();
        $ENGkw = \DB::table('vessels_section_3')->select('EngineOutputKw')->where('ImoNumber', $ImoNumber->ImoNumber)->first();
        $Enginekw = $ENGkw->EngineOutputKw ?? '-';
        $StartDate_1 = \DB::table('working_periods')
                            ->select('StartDate_1')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();
        $StartDate_2 = \DB::table('working_periods')
                            ->select('StartDate_2')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();
        $StartDate_3 = \DB::table('working_periods')
                            ->select('StartDate_3')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();
        $StartDate_4 = \DB::table('working_periods')
                            ->select('StartDate_4')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();
        $StartDate_5 = \DB::table('working_periods')
                            ->select('StartDate_5')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();  
        $EndDate_1 = \DB::table('working_periods')
                            ->select('EndDate_1')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();
        $EndDate_2 = \DB::table('working_periods')
                            ->select('EndDate_2')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();
        $EndDate_3 = \DB::table('working_periods')
                            ->select('EndDate_3')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();
        $EndDate_4 = \DB::table('working_periods')
                            ->select('EndDate_4')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();
        $EndDate_5 = \DB::table('working_periods')
                            ->select('EndDate_5')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();

        $fpdf->AddPage();    
        $fpdf->SetAutoPageBreak(false);
        $fpdf->SetTitle('Template 2 - SEA SERVICE TESTIMONIAL');             
 
        if(empty($Company)) {
            $fpdf->Image('../public/images/ltt-letter-head.png', 10, 0, 190);    
            $fpdf->Ln(30);     
            $fpdf->SetFont('Times', '', 11); 
            $fpdf->Cell(162.7, -10, 'Date: ' . date("j F, Y"), 0, 1, 'R'); 
        } else { 
            if($Company->Company === 'L.T.T') {
                $fpdf->Image('../public/images/ltt-letter-head.png', 10, 0, 190);    
                $fpdf->Ln(30);     
                $fpdf->SetFont('Times', '', 11); 
                if(date("j") < 9) {
                    $fpdf->Cell(159.5, -10, 'Date: ' . date("j F, Y"), 0, 1, 'R'); 
                } else {
                    $fpdf->Cell(162.7, -10, 'Date: ' . date("j F, Y"), 0, 1, 'R'); 
                }
            }  
            if($Company->Company === 'DEPASA') {
                $fpdf->Image('../public/images/depasa-letter-head.png', 10, 5, 190);  
                $fpdf->Ln(30);     
                $fpdf->SetFont('Times', '', 11); 
                if(date("j") < 9) {
                    $fpdf->Cell(170, -10, 'Date: ' . date("j F, Y"), 0, 1, 'R'); 
                } else {
                    $fpdf->Cell(173.2, -8, 'Date: ' . date("j F, Y"), 0, 1, 'R'); 
                }
            }  
        }
   
        $fpdf->SetDrawColor(200, 200, 200);  
         
        $fpdf->Ln(7);     
        $fpdf->SetFont('Times', 'BU', 17); 
        $fpdf->Cell(190, 25, 'SEA SERVICE TESTIMONIAL', 0, 1, 'C');
        $fpdf->SetFont('Times', '', 14); 
        $fpdf->Cell(190, -3, 'I certify that the following record is truthful statement of a sea service performed by:', 0, 1, 'L');
        $fpdf->SetFont('Times', 'B', 14); 
        $fpdf->Cell(190, 20, 'Name: ' . (empty($Employee->EmployeeName) ? '-' : $Employee->EmployeeName), 0, 1, 'L');
        $fpdf->Cell(190, -3, 'Date of Birth: ' . (empty($DateOfBirth->DateOfBirth) ? '-' : $DateOfBirth->DateOfBirth), 0, 1, 'L');
        $fpdf->Cell(190, 20, 'Discharge Book No: ' . (empty($DischargeBook->DischargeBook) ? '-' : $DischargeBook->DischargeBook), 0, 1, 'L');
        $fpdf->SetFont('Times', '', 11);  

        $fpdf->Ln(5);          
        
        //// TABLE HEAD 
        $fpdf->SetFont('Times', 'B', 10); 
        $fpdf->Cell(20, 8, 'START', 'LTR', 0, 'L'); 
        $fpdf->Cell(20, 8, 'END', 'LTR', 0, 'L');
        $fpdf->Cell(30, 9, 'VESSEL', 'LTR', 0, 'L'); 
        $fpdf->Cell(20, 8, 'IMO', 'LTR', 0, 'L');
        $fpdf->Cell(25, 8, 'AREA OF', 'LTR', 0, 'L');  
        $fpdf->Cell(30, 8, 'ENG', 'LTR', 0, 'L');   
        $fpdf->Cell(15, 13, 'GRT', 'LTR', 0, 'L'); 
        $fpdf->Cell(32, 13, 'RATING', 'LTR', 0, 'L');
        $fpdf->Ln(5);
        $fpdf->Cell(20, 8, 'DATE', 'LR', 0, 'L');  
        $fpdf->Cell(20, 8, 'DATE', 'LR', 0, 'L'); 
        $fpdf->Cell(30, 10, 'NAME', 'LR', 0, 'L'); 
        $fpdf->Cell(20, 8, 'NO', 'LR', 0, 'L'); 
        $fpdf->Cell(25, 8, 'OPERATION', 'LR', 0, 'L'); 
        $fpdf->Cell(30, 8, '(kw)', 'LR', 0, 'L');
        $fpdf->Cell(15, 8, ' ', 'LR', 0, 'L');  
        $fpdf->Cell(32, 8, ' ', 'LR', 0, 'L'); 
        $fpdf->Ln();
           
        //// TABLE COLUMNS
        $fpdf->SetFont('Times', '', 10); 
              
        $cellWidth=80;//wrapped cell width
        $cellHeight=5;//normal one-line cell height
        
        if($fpdf->GetStringWidth($CurrentVessel->CurrentVessel) < $cellWidth){
            $line=1;
        }else{
            $textLength=strlen($CurrentVessel->CurrentVessel);	 
            $errMargin=10;		 
            $startChar=0;		 
            $maxChar=0;			 
            $textArray=array();	 
            $tmpString="";		 
            
            while($startChar < $textLength){  
                while( 
                $fpdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) &&
                ($startChar+$maxChar) < $textLength ) {
                    $maxChar++;
                    $tmpString=substr($CurrentVessel->CurrentVessel,$startChar,$maxChar);
                }
                $startChar=$startChar+$maxChar;
                array_push($textArray,$tmpString);
                    
                $maxChar=0;
                $tmpString='';
                
            }
        
            $line=count($textArray);
        }
        $fpdf->SetXY($fpdf->GetX(), $fpdf->GetY());
        $fpdf->Cell(20, 10, (empty($StartDate_1->StartDate_1) ? '-' : $StartDate_1->StartDate_1), 1, 0, 'L'); 
        $fpdf->Cell(20, 10, (empty($EndDate_1->EndDate_1) ? '-' : $EndDate_1->EndDate_1), 1, 0, 'L');   
        $yPos=$fpdf->GetY();
        // TEST MULTI CELLS DATA 

        $CurrentVessel->CurrentVessel = 'ANTELOPE ANT DRG';
        $CurrentVessel->CurrentVessel = 'ASAGA AS';
        $CurrentVessel->CurrentVessel = 'DAURA';
        $CurrentVessel->CurrentVessel = 'EMEKUKU EM';
        $CurrentVessel->CurrentVessel = 'GUSAU GS';
        $CurrentVessel->CurrentVessel = 'MAJIYA';
        $CurrentVessel->CurrentVessel = 'UBIMA';
        $CurrentVessel->CurrentVessel = 'UROMI URO';
        $CurrentVessel->CurrentVessel = 'ZARANDA ZR';
        $CurrentVessel->CurrentVessel = 'WATER BARGE WB';
        $CurrentVessel->CurrentVessel = 'TOMBIA';
        $CurrentVessel->CurrentVessel = 'TIGADAM TG DRG';
        $CurrentVessel->CurrentVessel = 'SURVEY SRV';
        $CurrentVessel->CurrentVessel = 'PCM MAIN SITE';
        $CurrentVessel->CurrentVessel = 'PC KOKO';
        $CurrentVessel->CurrentVessel = 'OREN OR DRG';
        // $CurrentVessel->CurrentVessel = 'MOORING 2';
        // $CurrentVessel->CurrentVessel = 'MOORING 1';
        // $CurrentVessel->CurrentVessel = 'LTT GENERAL';
        // $CurrentVessel->CurrentVessel = 'LOCAL ASHORE CREWLAC';
        // $CurrentVessel->CurrentVessel = 'LCM DONZI';
        // $CurrentVessel->CurrentVessel = 'LAGOS 2 LG2';
        // $CurrentVessel->CurrentVessel = 'LAGOS 1 LG1';
        // $CurrentVessel->CurrentVessel = 'HORIZON 2 HRZ';
        // $CurrentVessel->CurrentVessel = 'GUMEL GL DRG';
        // $CurrentVessel->CurrentVessel = 'DIVERS BOAT JOY';
        // $CurrentVessel->CurrentVessel = 'CHALAWA CL DRG';
        // $CurrentVessel->CurrentVessel = 'BLUE LATITUDE DRG';
        // $CurrentVessel->CurrentVessel = 'BULL BL';
        // $CurrentVessel->CurrentVessel = 'ASHORE';
        // $CurrentVessel->CurrentVessel = 'PC KOKO';

        // RANK
        
        $Rank->Rank = 'BOAT DRIVER';
        $Rank->Rank = 'CAPTAIN';
        $Rank->Rank = 'SHORE ENGINEER';
        $Rank->Rank = 'ABLE SEA MAN';
        $Rank->Rank = 'PC MASTER';
        $Rank->Rank = 'DIVER';
        $Rank->Rank = 'ML MASTER';
        $Rank->Rank = 'CHIEF ENGINEER';
        $Rank->Rank = 'TUG MASTER';
        $Rank->Rank = '3RD ENGINEER';
        $Rank->Rank = 'PC ENGINEER';
        $Rank->Rank = 'MECHANIC';
        $Rank->Rank = 'COOK';
        $Rank->Rank = 'CHIEF OFFICER';
        $Rank->Rank = '3RD ENGINEER ASSIST.';
        $Rank->Rank = 'RADIO OPERATOR';
        // $Rank->Rank = 'ELECTRICIAN';
        // $Rank->Rank = 'OPERATION MANAGER';
        // $Rank->Rank = 'DECK HAND';
        // $Rank->Rank = 'CCTV / SECURITY OP.';
        // $Rank->Rank = 'MATE';
        // $Rank->Rank = 'Engineer';
        // $Rank->Rank = 'River Master';
        // $Rank->Rank = 'Bouy Maintenance';
        // $Rank->Rank = 'Engine Room Engineer';
        // $Rank->Rank = 'Master';
        // $Rank->Rank = 'Able seaman';
        // $Rank->Rank = 'Deck Rating';
        // $Rank->Rank = 'Welder';
        // $Rank->Rank = 'Welder/Crane Operator';
        // $Rank->Rank = 'Engine Room Asst.';
        // $Rank->Rank = 'BOSUN';
        // $Rank->Rank = 'Watchkeeper/Security';
        // $Rank->Rank = 'DREDGE MASTER';
        // $Rank->Rank = 'PIPE OPERATOR';
        // $Rank->Rank = 'Crane Operator';
        // $Rank->Rank = 'STEWARD';
        // $Rank->Rank = 'Able Seaman/Bosun';

        // TEST MULTI CELLS DATA   
        $xPos=$fpdf->GetX(); 
 
        if(strlen($CurrentVessel->CurrentVessel) < 14) {
            $fpdf->Cell(30,10,(empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel),1,0);  
            $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
        }
        if(strlen($CurrentVessel->CurrentVessel) >= 14) {
            $fpdf->MultiCell(30,$cellHeight, (strlen($CurrentVessel->CurrentVessel) < 14 ? strtoupper(str_replace(' ', '-', $CurrentVessel->CurrentVessel)) . '                             ' : str_replace(' ', '-', $CurrentVessel->CurrentVessel)),1);
            $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
        } 
        $fpdf->Cell(20, 10, (empty($ImoNumber->ImoNumber) ? '-' : $ImoNumber->ImoNumber), 1, 0, 'L');
        $yPos=$fpdf->GetY();
        $fpdf->MultiCell(25,10,(empty($AreaOfOperation->AreaOfOperation) ? '-' : str_replace(' ', '-', $AreaOfOperation->AreaOfOperation)),1);
        $fpdf->SetXY(45 + $cellWidth , $yPos);
        $yPos=$fpdf->GetY(); 
        if(strlen($Enginekw) < 14) {
            $fpdf->Cell(30,10, (strlen($Enginekw) < 15 ? str_replace(' ', '-', strtoupper($Enginekw)) . '                                  ' : str_replace(' ', '-', strtoupper($Enginekw))),1);
            $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
        }
        if(strlen($Enginekw) >= 14) {
            $fpdf->MultiCell(30,$cellHeight, (strlen($Enginekw) < 15 ? str_replace(' ', '-', strtoupper($Enginekw)) . '                                  ' : str_replace(' ', '-', strtoupper($Enginekw))),1);
            $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
        }
        
        $fpdf->SetXY(75 + $cellWidth , $yPos);
        $yPos=$fpdf->GetY();
        $fpdf->Cell(15, 10,  $GRTSign->GrossTonnage ?? '-', 1, 0, 'L'); 

        if(strlen($Rank->Rank) < 15) {
            $fpdf->Cell(32,10, (strlen($Rank->Rank) < 15 ? str_replace(' ', '-', strtoupper($Rank->Rank)) . '                                  ' : str_replace(' ', '-', strtoupper($Rank->Rank))),1);
            $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            $fpdf->ln();
        }
        if(strlen($Rank->Rank) >= 15) {
            $fpdf->MultiCell(32,$cellHeight, (strlen($Rank->Rank) < 15 ? str_replace(' ', '-', strtoupper($Rank->Rank)) . '                                  ' : str_replace(' ', '-', strtoupper($Rank->Rank))),1);
        }
        
        if(!empty($StartDate_2->StartDate_2)) {
            $fpdf->Cell(20, 10, (empty($StartDate_2->StartDate_2) ? '-' : $StartDate_2->StartDate_2), 1, 0, 'L'); 
            $fpdf->Cell(20, 10, (empty($EndDate_2->EndDate_2) ? '-' : $EndDate_2->EndDate_2), 1, 0, 'L');   
            $yPos=$fpdf->GetY();
            $xPos=$fpdf->GetX();  
 
            if(strlen($CurrentVessel->CurrentVessel) < 14) {
                $fpdf->Cell(30,10,(empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel),1,0);  
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            }
            if(strlen($CurrentVessel->CurrentVessel) >= 14) {
                $fpdf->MultiCell(30,$cellHeight, (strlen($CurrentVessel->CurrentVessel) < 14 ? strtoupper(str_replace(' ', '-', $CurrentVessel->CurrentVessel)) . '                             ' : str_replace(' ', '-', $CurrentVessel->CurrentVessel)),1);
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            }
            
            $fpdf->Cell(20, 10, (empty($ImoNumber->ImoNumber) ? '-' : $ImoNumber->ImoNumber), 1, 0, 'L');
            $yPos=$fpdf->GetY();
            $fpdf->MultiCell(25,10,(empty($AreaOfOperation->AreaOfOperation) ? '-' : str_replace(' ', '-', $AreaOfOperation->AreaOfOperation)),1);
            $fpdf->SetXY(45 + $cellWidth , $yPos);
            $yPos=$fpdf->GetY();
            if(strlen($Enginekw) < 14) {
                $fpdf->Cell(30,10, (strlen($Enginekw) < 15 ? str_replace(' ', '-', strtoupper($Enginekw)) . '                                  ' : str_replace(' ', '-', strtoupper($Enginekw))),1);
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            }
            if(strlen($Enginekw) >= 14) {
                $fpdf->MultiCell(30,$cellHeight, (strlen($Enginekw) < 15 ? str_replace(' ', '-', strtoupper($Enginekw)) . '                                  ' : str_replace(' ', '-', strtoupper($Enginekw))),1);
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            }
            
            $fpdf->SetXY(75 + $cellWidth , $yPos);
            $yPos=$fpdf->GetY();
            $fpdf->Cell(15, 10,  $GRTSign->GrossTonnage ?? '-', 1, 0, 'L'); 

            if(strlen($Rank->Rank) < 15) {
                $fpdf->Cell(32,10, (strlen($Rank->Rank) < 15 ? str_replace(' ', '-', strtoupper($Rank->Rank)) . '                                  ' : str_replace(' ', '-', strtoupper($Rank->Rank))),1);
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
                $fpdf->ln();
            }
            if(strlen($Rank->Rank) >= 15) {
                $fpdf->MultiCell(32,$cellHeight, (strlen($Rank->Rank) < 15 ? str_replace(' ', '-', strtoupper($Rank->Rank)) . '                                  ' : str_replace(' ', '-', strtoupper($Rank->Rank))),1);
            }
        }
        if(!empty($StartDate_3->StartDate_3)) {
            $fpdf->Cell(20, 10, (empty($StartDate_3->StartDate_3) ? '-' : $StartDate_3->StartDate_3), 1, 0, 'L'); 
            $fpdf->Cell(20, 10, (empty($EndDate_3->EndDate_3) ? '-' : $EndDate_3->EndDate_3), 1, 0, 'L');   
            $yPos=$fpdf->GetY();
            $xPos=$fpdf->GetX();  
            if(strlen($CurrentVessel->CurrentVessel) < 14) {
                $fpdf->Cell(30,10,(empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel),1,0);  
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            }
            if(strlen($CurrentVessel->CurrentVessel) >= 14) {
                $fpdf->MultiCell(30,$cellHeight, (strlen($CurrentVessel->CurrentVessel) < 14 ? strtoupper(str_replace(' ', '-', $CurrentVessel->CurrentVessel)) . '                             ' : str_replace(' ', '-', $CurrentVessel->CurrentVessel)),1);
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            }
            
            $fpdf->Cell(20, 10, (empty($ImoNumber->ImoNumber) ? '-' : $ImoNumber->ImoNumber), 1, 0, 'L');
            $yPos=$fpdf->GetY();
            $fpdf->MultiCell(25,10,(empty($AreaOfOperation->AreaOfOperation) ? '-' : str_replace(' ', '-', $AreaOfOperation->AreaOfOperation)),1);
            $fpdf->SetXY(45 + $cellWidth , $yPos);
            $yPos=$fpdf->GetY();
            if(strlen($Enginekw) < 14) {
                $fpdf->Cell(30,10, (strlen($Enginekw) < 15 ? str_replace(' ', '-', strtoupper($Enginekw)) . '                                  ' : str_replace(' ', '-', strtoupper($Enginekw))),1);
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            }
            if(strlen($Enginekw) >= 14) {
                $fpdf->MultiCell(30,$cellHeight, (strlen($Enginekw) < 15 ? str_replace(' ', '-', strtoupper($Enginekw)) . '                                  ' : str_replace(' ', '-', strtoupper($Enginekw))),1);
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            }
            $fpdf->SetXY(75 + $cellWidth , $yPos);
            $yPos=$fpdf->GetY();
            $fpdf->Cell(15, 10,  $GRTSign->GrossTonnage ?? '-', 1, 0, 'L'); 

            if(strlen($Rank->Rank) < 15) {
                $fpdf->Cell(32,10, (strlen($Rank->Rank) < 15 ? str_replace(' ', '-', strtoupper($Rank->Rank)) . '                                  ' : str_replace(' ', '-', strtoupper($Rank->Rank))),1);
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
                $fpdf->ln();
            }
            if(strlen($Rank->Rank) >= 15) {
                $fpdf->MultiCell(32,$cellHeight, (strlen($Rank->Rank) < 15 ? str_replace(' ', '-', strtoupper($Rank->Rank)) . '                                  ' : str_replace(' ', '-', strtoupper($Rank->Rank))),1);
            }
        }
        if(!empty($StartDate_4->StartDate_4)) {
            $fpdf->Cell(20, 10, (empty($StartDate_4->StartDate_4) ? '-' : $StartDate_4->StartDate_4), 1, 0, 'L'); 
            $fpdf->Cell(20, 10, (empty($EndDate_4->EndDate_4) ? '-' : $EndDate_4->EndDate_4), 1, 0, 'L');   
            $yPos=$fpdf->GetY();
            $xPos=$fpdf->GetX();  
            if(strlen($CurrentVessel->CurrentVessel) < 14) {
                $fpdf->Cell(30,10,(empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel),1,0);  
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            }
            if(strlen($CurrentVessel->CurrentVessel) >= 14) {
                $fpdf->MultiCell(30,$cellHeight, (strlen($CurrentVessel->CurrentVessel) < 14 ? strtoupper(str_replace(' ', '-', $CurrentVessel->CurrentVessel)) . '                             ' : str_replace(' ', '-', $CurrentVessel->CurrentVessel)),1);
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            }
            
            $fpdf->Cell(20, 10, (empty($ImoNumber->ImoNumber) ? '-' : $ImoNumber->ImoNumber), 1, 0, 'L');
            $yPos=$fpdf->GetY();
            $fpdf->MultiCell(25,10,(empty($AreaOfOperation->AreaOfOperation) ? '-' : str_replace(' ', '-', $AreaOfOperation->AreaOfOperation)),1);
            $fpdf->SetXY(45 + $cellWidth , $yPos);
            $yPos=$fpdf->GetY();
            if(strlen($Enginekw) < 14) {
                $fpdf->Cell(30,10, (strlen($Enginekw) < 15 ? str_replace(' ', '-', strtoupper($Enginekw)) . '                                  ' : str_replace(' ', '-', strtoupper($Enginekw))),1);
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            }
            if(strlen($Enginekw) >= 14) {
                $fpdf->MultiCell(30,$cellHeight, (strlen($Enginekw) < 15 ? str_replace(' ', '-', strtoupper($Enginekw)) . '                                  ' : str_replace(' ', '-', strtoupper($Enginekw))),1);
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            }
            
            $fpdf->Cell(20, 10, (empty($ImoNumber->ImoNumber) ? '-' : $ImoNumber->ImoNumber), 1, 0, 'L');
            $yPos=$fpdf->GetY(); 
            $fpdf->SetXY(75 + $cellWidth , $yPos);
            $yPos=$fpdf->GetY();
            $fpdf->Cell(15, 10,  $GRTSign->GrossTonnage ?? '-', 1, 0, 'L'); 

            if(strlen($Rank->Rank) < 15) {
                $fpdf->Cell(32,10, (strlen($Rank->Rank) < 15 ? str_replace(' ', '-', strtoupper($Rank->Rank)) . '                                  ' : str_replace(' ', '-', strtoupper($Rank->Rank))),1);
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
                $fpdf->ln();
            }
            if(strlen($Rank->Rank) >= 15) {
                $fpdf->MultiCell(32,$cellHeight, (strlen($Rank->Rank) < 15 ? str_replace(' ', '-', strtoupper($Rank->Rank)) . '                                  ' : str_replace(' ', '-', strtoupper($Rank->Rank))),1);
            }
        }
        if(!empty($StartDate_5->StartDate_5)) {
            $fpdf->Cell(20, 10, (empty($StartDate_5->StartDate_5) ? '-' : $StartDate_5->StartDate_5), 1, 0, 'L'); 
            $fpdf->Cell(20, 10, (empty($EndDate_5->EndDate_5) ? '-' : $EndDate_5->EndDate_5), 1, 0, 'L');   
            $xPos=$fpdf->GetX();  
            $yPos=$fpdf->GetY();
            if(strlen($CurrentVessel->CurrentVessel) < 14) {
                $fpdf->Cell(30,10,(empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel),1,0);  
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            }
            if(strlen($CurrentVessel->CurrentVessel) >= 14) {
                $fpdf->MultiCell(30,$cellHeight, (strlen($CurrentVessel->CurrentVessel) < 14 ? strtoupper(str_replace(' ', '-', $CurrentVessel->CurrentVessel)) . '                             ' : str_replace(' ', '-', $CurrentVessel->CurrentVessel)),1);
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            }
            
            $fpdf->Cell(20, 10, (empty($ImoNumber->ImoNumber) ? '-' : $ImoNumber->ImoNumber), 1, 0, 'L');
            $yPos=$fpdf->GetY();
            $fpdf->MultiCell(25,10,(empty($AreaOfOperation->AreaOfOperation) ? '-' : str_replace(' ', '-', $AreaOfOperation->AreaOfOperation)),1);
            $fpdf->SetXY(45 + $cellWidth , $yPos);
            $yPos=$fpdf->GetY();
            if(strlen($Enginekw) < 14) {
                $fpdf->Cell(30,10, (strlen($Enginekw) < 15 ? str_replace(' ', '-', strtoupper($Enginekw)) . '                                  ' : str_replace(' ', '-', strtoupper($Enginekw))),1);
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            }
            if(strlen($Enginekw) >= 14) {
                $fpdf->MultiCell(30,$cellHeight, (strlen($Enginekw) < 15 ? str_replace(' ', '-', strtoupper($Enginekw)) . '                                  ' : str_replace(' ', '-', strtoupper($Enginekw))),1);
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            }
            $fpdf->SetXY(75 + $cellWidth , $yPos);
            $yPos=$fpdf->GetY();
            $fpdf->Cell(15, 10,  $GRTSign->GrossTonnage ?? '-', 1, 0, 'L'); 

            if(strlen($Rank->Rank) < 15) {
                $fpdf->Cell(32,10, (strlen($Rank->Rank) < 15 ? str_replace(' ', '-', strtoupper($Rank->Rank)) . '                                  ' : str_replace(' ', '-', strtoupper($Rank->Rank))),1);
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
                $fpdf->ln();
            }
            if(strlen($Rank->Rank) >= 15) {
                $fpdf->MultiCell(32,$cellHeight, (strlen($Rank->Rank) < 15 ? str_replace(' ', '-', strtoupper($Rank->Rank)) . '                                  ' : str_replace(' ', '-', strtoupper($Rank->Rank))),1);
            }
        }

        $fpdf->Ln(9);   
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->MultiCell(190, 6, 'During the whole period stated above, the above-named officer was granted ' . $Request->LeaveDays . ' days leave of absence.', 0, 'L', 0);
        $fpdf->Ln(2);       
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(70, 5, 'NATURE OF DUTIES PERFORMED; ', 0, 0, 'L'); 
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->Cell(70, 5, '   Regular watch on auxiliary machinery. Regular watch on main ', 0, 1, 'L'); 
        $fpdf->MultiCell(190, 6, 'propulsion machinery. Regular work in Ships processing centralized control room, full or partial Automation facilty to operate machinery in the unmanned mode for a significant proportion of each 24 hour period.', 0, 'L', 0);
        $fpdf->Ln(5);       
        $fpdf->MultiCell(190, 6, 'My report on the service of the above-name officer, during the period stated is as follows:', 0, 'L', 0);
        $fpdf->Ln(1);       
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(45, 8, 'Conduct:', 0);
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->Cell(60, 8, 'Very Good', 0, 1);
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(45, 8, 'Experience/Ability:', 0);
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->Cell(60, 8, 'Very Good', 0, 1);
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(45, 8, 'Behaviour:', 0);
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->Cell(60, 8, 'Satisfactory', 0, 1);
  
        $fpdf->SetFont('Times', 'B', 12);    
        $fpdf->Cell(60, 10, 'OFFICIAL ENDORSEMENT.', 0, 1);

        $fpdf->Ln(15);    
        $fpdf->SetFont('Times', '', 12);
        $fpdf->Cell(60, 10, '..............................................', 0, 1);
        $fpdf->Cell(190, -10, '................................................', 0, 1, 'R');
        $fpdf->SetFont('Times', 'B', 12);
        $fpdf->Cell(60, 25, 'Signature of Supretendent', 0, 1);  
        $fpdf->Cell(190, -25, 'Signature of Crew Manager',  0, 1, 'R');

        $fpdf->SetFont('Times', '', 12);
        $fpdf->Output();        
        exit;
    }
    
    public function template_3(Fpdf $fpdf, Request $Request) {
        $Employee = Testimonial::select('EmployeeName')->where('id', $Request->Testimonial_Id)->first();
        $StaffNumber = Testimonial::select('EmployeeId')->where('id', $Request->Testimonial_Id)->first();
        $DateOfBirth = Testimonial::select('DateOfBirth')->where('id', $Request->Testimonial_Id)->first();
        $AreaOfOperation = Testimonial::select('AreaOfOperation')->where('id', $Request->Testimonial_Id)->first();
        $DischargeBook = Testimonial::select('DischargeBook')->where('id', $Request->Testimonial_Id)->first();
        $Rank = Testimonial::select('Rank')->where('id', $Request->Testimonial_Id)->first();
        $Company = Testimonial::select('Company')->where('id', $Request->Testimonial_Id)->first();
        $TemplateFormat = Testimonial::select('Template')->where('id', $Request->Testimonial_Id)->first();
        $CurrentVessel = Testimonial::select('CurrentVessel')->where('id', $Request->Testimonial_Id)->first();
        $ImoNumber = \DB::table('vessels_vessel_information')->select('ImoNumber')->where('VesselName', $CurrentVessel->CurrentVessel ?? '-')->first();
        $DateIn = Testimonial::select('DateIn')->where('id', $Request->Testimonial_Id)->first();
        $TimeIn = Testimonial::select('TimeIn')->where('id', $Request->Testimonial_Id)->first();
        $GRTSign = \DB::table('vessels_section_4')->select('GrossTonnage')->where('ImoNumber', $ImoNumber->ImoNumber)->first();
        $ENGkw = \DB::table('vessels_section_3')->select('EngineOutputKw')->where('ImoNumber', $ImoNumber->ImoNumber)->first();
        $Enginekw = $ENGkw->EngineOutputKw ?? '-';
        $StartDate_1 = \DB::table('working_periods')
                            ->select('StartDate_1')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();
        $StartDate_2 = \DB::table('working_periods')
                            ->select('StartDate_2')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();
        $StartDate_3 = \DB::table('working_periods')
                            ->select('StartDate_3')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();
        $StartDate_4 = \DB::table('working_periods')
                            ->select('StartDate_4')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();
        $StartDate_5 = \DB::table('working_periods')
                            ->select('StartDate_5')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();  
        $EndDate_1 = \DB::table('working_periods')
                            ->select('EndDate_1')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();
        $EndDate_2 = \DB::table('working_periods')
                            ->select('EndDate_2')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();
        $EndDate_3 = \DB::table('working_periods')
                            ->select('EndDate_3')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();
        $EndDate_4 = \DB::table('working_periods')
                            ->select('EndDate_4')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first();
        $EndDate_5 = \DB::table('working_periods')
                            ->select('EndDate_5')
                            ->where('DateIn', (empty($DateIn->DateIn) ? '-' : $DateIn->DateIn))
                            ->where('TimeIn', (empty($TimeIn->TimeIn) ? '-' : $TimeIn->TimeIn))
                            ->where('Vessel', (empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel))
                            ->first(); 

        $fpdf->AddPage();    
        $fpdf->SetAutoPageBreak(false);
        $fpdf->SetTitle('Template 2 - SEA SERVICE TESTIMONIAL');             
 
        if(empty($Company)) {
            $fpdf->Image('../public/images/ltt-letter-head.png', 10, 0, 190);    
            $fpdf->Ln(30);     
            $fpdf->SetFont('Times', '', 11); 
            $fpdf->Cell(162.7, -10, 'Date: ' . date("j F, Y"), 0, 1, 'R'); 
        } else { 
            if($Company->Company === 'L.T.T') {
                $fpdf->Image('../public/images/ltt-letter-head.png', 10, 0, 190);    
                $fpdf->Ln(30);     
                $fpdf->SetFont('Times', '', 11); 
                if(date("j") < 9) {
                    $fpdf->Cell(159.5, -10, 'Date: ' . date("j F, Y"), 0, 1, 'R'); 
                } else {
                    $fpdf->Cell(162.7, -10, 'Date: ' . date("j F, Y"), 0, 1, 'R'); 
                }
            }  
            if($Company->Company === 'DEPASA') {
                $fpdf->Image('../public/images/depasa-letter-head.png', 10, 5, 190);  
                $fpdf->Ln(30);     
                $fpdf->SetFont('Times', '', 11);  
                if(date("j") < 9) {
                    $fpdf->Cell(170, -10, 'Date: ' . date("j F, Y"), 0, 1, 'R'); 
                } else {
                    $fpdf->Cell(173.2, -8, 'Date: ' . date("j F, Y"), 0, 1, 'R'); 
                }
            }  
        }
   
        $fpdf->SetDrawColor(200, 200, 200);  
         
        $fpdf->Ln(7);     
        $fpdf->SetFont('Times', 'BU', 17); 
        $fpdf->Cell(190, 25, 'SEA SERVICE TESTIMONIAL', 0, 1, 'C');
        $fpdf->SetFont('Times', '', 14); 
        $fpdf->Cell(190, -3, 'I certify that the following record is truthful statement of a sea service performed by:', 0, 1, 'L');
        $fpdf->SetFont('Times', 'B', 14); 
        $fpdf->Cell(190, 20, 'Name: ' . (empty($Employee->EmployeeName) ? '-' : $Employee->EmployeeName), 0, 1, 'L');
        $fpdf->Cell(190, -3, 'Date of Birth: ' . (empty($DateOfBirth->DateOfBirth) ? '-' : $DateOfBirth->DateOfBirth), 0, 1, 'L');
        $fpdf->Cell(190, 20, 'Discharge Book No: ' . (empty($DischargeBook->DischargeBook) ? '-' : $DischargeBook->DischargeBook), 0, 1, 'L');
        $fpdf->SetFont('Times', '', 11);  

        $fpdf->Ln(5);          
        
        //// TABLE HEAD 
        $fpdf->SetFont('Times', 'B', 10); 
        $fpdf->Cell(30, 8, 'START', 'LTR', 0, 'L'); 
        $fpdf->Cell(30, 8, 'END', 'LTR', 0, 'L');
        $fpdf->Cell(30, 9, 'VESSEL', 'LTR', 0, 'L'); 
        $fpdf->Cell(20, 8, 'IMO', 'LTR', 0, 'L');
        $fpdf->Cell(25, 8, 'AREA OF', 'LTR', 0, 'L');    
        $fpdf->Cell(15, 13, 'GRT', 'LTR', 0, 'L'); 
        $fpdf->Cell(32, 13, 'RATING', 'LTR', 0, 'L');
        $fpdf->Ln(5);
        $fpdf->Cell(30, 8, 'DATE', 'LR', 0, 'L');  
        $fpdf->Cell(30, 8, 'DATE', 'LR', 0, 'L'); 
        $fpdf->Cell(30, 10, 'NAME', 'LR', 0, 'L'); 
        $fpdf->Cell(20, 8, 'NO', 'LR', 0, 'L'); 
        $fpdf->Cell(25, 8, 'OPERATION', 'LR', 0, 'L');  
        $fpdf->Cell(15, 8, ' ', 'LR', 0, 'L');  
        $fpdf->Cell(32, 8, ' ', 'LR', 0, 'L'); 
        $fpdf->Ln();
           
        //// TABLE COLUMNS
        $fpdf->SetFont('Times', '', 10); 
              
        $cellWidth=80;//wrapped cell width
        $cellHeight=5;//normal one-line cell height
        
        if($fpdf->GetStringWidth($CurrentVessel->CurrentVessel) < $cellWidth){
            $line=1;
        }else{
            $textLength=strlen($CurrentVessel->CurrentVessel);	 
            $errMargin=10;		 
            $startChar=0;		 
            $maxChar=0;			 
            $textArray=array();	 
            $tmpString="";		 
            
            while($startChar < $textLength){  
                while( 
                $fpdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) &&
                ($startChar+$maxChar) < $textLength ) {
                    $maxChar++;
                    $tmpString=substr($CurrentVessel->CurrentVessel,$startChar,$maxChar);
                }
                $startChar=$startChar+$maxChar;
                array_push($textArray,$tmpString);
                    
                $maxChar=0;
                $tmpString='';
                
            }
        
            $line=count($textArray);
        }
        $fpdf->SetXY($fpdf->GetX(), $fpdf->GetY());
        $fpdf->Cell(30, 10, (empty($StartDate_1->StartDate_1) ? '-' : $StartDate_1->StartDate_1), 1, 0, 'L'); 
        $fpdf->Cell(30, 10, (empty($EndDate_1->EndDate_1) ? '-' : $EndDate_1->EndDate_1), 1, 0, 'L');   
        $yPos=$fpdf->GetY();
        // TEST MULTI CELLS DATA 

        // $CurrentVessel->CurrentVessel = 'ANTELOPE ANT DRG';
        // $CurrentVessel->CurrentVessel = 'ASAGA AS';
        // $CurrentVessel->CurrentVessel = 'DAURA';
        // $CurrentVessel->CurrentVessel = 'EMEKUKU EM';
        // $CurrentVessel->CurrentVessel = 'GUSAU GS';
        // $CurrentVessel->CurrentVessel = 'MAJIYA';
        // $CurrentVessel->CurrentVessel = 'UBIMA';
        // $CurrentVessel->CurrentVessel = 'UROMI URO';
        // $CurrentVessel->CurrentVessel = 'ZARANDA ZR';
        // $CurrentVessel->CurrentVessel = 'WATER BARGE WB';
        // $CurrentVessel->CurrentVessel = 'TOMBIA';
        // $CurrentVessel->CurrentVessel = 'TIGADAM TG DRG';
        // $CurrentVessel->CurrentVessel = 'SURVEY SRV';
        // $CurrentVessel->CurrentVessel = 'PCM Main Site';
        // $CurrentVessel->CurrentVessel = 'PC KOKO';
        // $CurrentVessel->CurrentVessel = 'OREN OR DRG';
        // $CurrentVessel->CurrentVessel = 'MOORING 2';
        // $CurrentVessel->CurrentVessel = 'MOORING 1';
        // $CurrentVessel->CurrentVessel = 'LTT GENERAL';
        // $CurrentVessel->CurrentVessel = 'LOCAL ASHORE CREWLAC';
        // $CurrentVessel->CurrentVessel = 'LCM DONZI';
        // $CurrentVessel->CurrentVessel = 'LAGOS 2 LG2';
        // $CurrentVessel->CurrentVessel = 'LAGOS 1 LG1';
        // $CurrentVessel->CurrentVessel = 'HORIZON 2 HRZ';
        // $CurrentVessel->CurrentVessel = 'GUMEL GL DRG';
        // $CurrentVessel->CurrentVessel = 'DIVERS BOAT JOY';
        // $CurrentVessel->CurrentVessel = 'CHALAWA CL DRG';
        // $CurrentVessel->CurrentVessel = 'BLUE LATITUDE DRG';
        // $CurrentVessel->CurrentVessel = 'BULL BL';
        // $CurrentVessel->CurrentVessel = 'ASHORE';
        // $CurrentVessel->CurrentVessel = 'PC KOKO';

        // RANK
        
        // $Rank->Rank = 'BOAT DRIVER';
        // $Rank->Rank = 'CAPTAIN';
        // $Rank->Rank = 'SHORE ENGINEER';
        // $Rank->Rank = 'ABLE SEA MAN';
        // $Rank->Rank = 'PC MASTER';
        // $Rank->Rank = 'DIVER';
        // $Rank->Rank = 'ML MASTER';
        // $Rank->Rank = 'CHIEF ENGINEER';
        // $Rank->Rank = 'TUG MASTER';
        // $Rank->Rank = '3RD ENGINEER';
        // $Rank->Rank = 'PC ENGINEER';
        // $Rank->Rank = 'MECHANIC';
        // $Rank->Rank = 'COOK';
        // $Rank->Rank = 'CHIEF OFFICER';
        // $Rank->Rank = '3RD ENGINEER ASSIST.';
        // $Rank->Rank = 'RADIO OPERATOR';
        // $Rank->Rank = 'ELECTRICIAN';
        // $Rank->Rank = 'OPERATION MANAGER';
        // $Rank->Rank = 'DECK HAND';
        // $Rank->Rank = 'CCTV / SECURITY OP.';
        // $Rank->Rank = 'MATE';
        // $Rank->Rank = 'Engineer';
        // $Rank->Rank = 'River Master';
        // $Rank->Rank = 'Bouy Maintenance';
        // $Rank->Rank = 'Engine Room Engineer';
        // $Rank->Rank = 'Master';
        // $Rank->Rank = 'Able seaman';
        // $Rank->Rank = 'Deck Rating';
        // $Rank->Rank = 'Welder';
        // $Rank->Rank = 'Welder/Crane Operator';
        // $Rank->Rank = 'Engine Room Asst.';
        // $Rank->Rank = 'BOSUN';
        // $Rank->Rank = 'Watchkeeper/Security';
        // $Rank->Rank = 'DREDGE MASTER';
        // $Rank->Rank = 'PIPE OPERATOR';
        // $Rank->Rank = 'Crane Operator';
        // $Rank->Rank = 'STEWARD';
        // $Rank->Rank = 'Able Seaman/Bosun';

        // TEST MULTI CELLS DATA  
        
        $xPos=$fpdf->GetX(); 
        if(strlen($CurrentVessel->CurrentVessel) < 15) {
            $fpdf->Cell(30,10,(empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel),1,0);  
            $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
        }
        if(strlen($CurrentVessel->CurrentVessel) >= 15) {
            $fpdf->MultiCell(30,$cellHeight, (strlen($CurrentVessel->CurrentVessel) < 15 ? strtoupper(str_replace(' ', '-', $CurrentVessel->CurrentVessel)) . '                             ' : str_replace(' ', '-', $CurrentVessel->CurrentVessel)),1);
            $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
        } 
        $fpdf->Cell(20, 10, (empty($ImoNumber->ImoNumber) ? '-' : $ImoNumber->ImoNumber), 1, 0, 'L');
        $yPos=$fpdf->GetY();
        $fpdf->MultiCell(25,10,(empty($AreaOfOperation->AreaOfOperation) ? '-' : str_replace(' ', '-', $AreaOfOperation->AreaOfOperation)),1);
        $fpdf->SetXY(65 + $cellWidth , $yPos);
        $yPos=$fpdf->GetY();  
        $fpdf->Cell(15, 10,  $GRTSign->GrossTonnage ?? '-', 1, 0, 'L'); 
        if(strlen($Rank->Rank) < 15) {
            $fpdf->Cell(32,10,(empty($Rank->Rank) ? '-' : $Rank->Rank),1,0);  
            $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            $fpdf->Ln();   
        }
        if(strlen($Rank->Rank) >= 15) {
            $fpdf->MultiCell(32,$cellHeight, (strlen($Rank->Rank) < 15 ? strtoupper(str_replace(' ', '-', $Rank->Rank)) . '                             ' : str_replace(' ', '-', $Rank->Rank)),1);
        } 
        if(!empty($StartDate_2->StartDate_2)) {
            $fpdf->Cell(30, 10, (empty($StartDate_2->StartDate_2) ? '-' : $StartDate_2->StartDate_2), 1, 0, 'L'); 
            $fpdf->Cell(30, 10, (empty($EndDate_2->EndDate_2) ? '-' : $EndDate_2->EndDate_2), 1, 0, 'L');   
            $yPos=$fpdf->GetY();
            $xPos=$fpdf->GetX(); 
            if(strlen($CurrentVessel->CurrentVessel) < 15) {
                $fpdf->Cell(30,10,(empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel),1,0);  
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            }
            if(strlen($CurrentVessel->CurrentVessel) >= 15) {
                $fpdf->MultiCell(30,$cellHeight, (strlen($CurrentVessel->CurrentVessel) < 15 ? strtoupper(str_replace(' ', '-', $CurrentVessel->CurrentVessel)) . '                             ' : str_replace(' ', '-', $CurrentVessel->CurrentVessel)),1);
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            } 
            $fpdf->Cell(20, 10, (empty($ImoNumber->ImoNumber) ? '-' : $ImoNumber->ImoNumber), 1, 0, 'L');
            $yPos=$fpdf->GetY();
            $fpdf->MultiCell(25,10,(empty($AreaOfOperation->AreaOfOperation) ? '-' : str_replace(' ', '-', $AreaOfOperation->AreaOfOperation)),1);
            $fpdf->SetXY(65 + $cellWidth , $yPos);
            $yPos=$fpdf->GetY();
            $fpdf->Cell(15, 10,  $GRTSign->GrossTonnage ?? '-', 1, 0, 'L'); 
        if(strlen($Rank->Rank) < 15) {
            $fpdf->Cell(32,10,(empty($Rank->Rank) ? '-' : $Rank->Rank),1,0);  
            $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            $fpdf->Ln();   
        }
        if(strlen($Rank->Rank) >= 15) {
            $fpdf->MultiCell(32,$cellHeight, (strlen($Rank->Rank) < 15 ? strtoupper(str_replace(' ', '-', $Rank->Rank)) . '                             ' : str_replace(' ', '-', $Rank->Rank)),1);
        } 
        }
        if(!empty($StartDate_3->StartDate_3)) {
            $fpdf->Cell(30, 10, (empty($StartDate_3->StartDate_3) ? '-' : $StartDate_3->StartDate_3), 1, 0, 'L'); 
            $fpdf->Cell(30, 10, (empty($EndDate_3->EndDate_3) ? '-' : $EndDate_3->EndDate_3), 1, 0, 'L');   
            $yPos=$fpdf->GetY();
            $xPos=$fpdf->GetX(); 
            if(strlen($CurrentVessel->CurrentVessel) < 15) {
                $fpdf->Cell(30,10,(empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel),1,0);  
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            }
            if(strlen($CurrentVessel->CurrentVessel) >= 15) {
                $fpdf->MultiCell(30,$cellHeight, (strlen($CurrentVessel->CurrentVessel) < 15 ? strtoupper(str_replace(' ', '-', $CurrentVessel->CurrentVessel)) . '                             ' : str_replace(' ', '-', $CurrentVessel->CurrentVessel)),1);
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            }  
            $fpdf->Cell(20, 10, (empty($ImoNumber->ImoNumber) ? '-' : $ImoNumber->ImoNumber), 1, 0, 'L');
            $yPos=$fpdf->GetY();
            $fpdf->MultiCell(25,10,(empty($AreaOfOperation->AreaOfOperation) ? '-' : str_replace(' ', '-', $AreaOfOperation->AreaOfOperation)),1);
            $fpdf->SetXY(65 + $cellWidth , $yPos);
            $yPos=$fpdf->GetY();
            $fpdf->Cell(15, 10,  $GRTSign->GrossTonnage ?? '-', 1, 0, 'L'); 
        if(strlen($Rank->Rank) < 15) {
            $fpdf->Cell(32,10,(empty($Rank->Rank) ? '-' : $Rank->Rank),1,0);  
            $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            $fpdf->Ln();   
        }
        if(strlen($Rank->Rank) >= 15) {
            $fpdf->MultiCell(32,$cellHeight, (strlen($Rank->Rank) < 15 ? strtoupper(str_replace(' ', '-', $Rank->Rank)) . '                             ' : str_replace(' ', '-', $Rank->Rank)),1);
        } 
        }
        if(!empty($StartDate_4->StartDate_4)) {
            $fpdf->Cell(30, 10, (empty($StartDate_4->StartDate_4) ? '-' : $StartDate_4->StartDate_4), 1, 0, 'L'); 
            $fpdf->Cell(30, 10, (empty($EndDate_4->EndDate_4) ? '-' : $EndDate_4->EndDate_4), 1, 0, 'L');   
            $yPos=$fpdf->GetY();
            if(strlen($CurrentVessel->CurrentVessel) < 15) {
                $fpdf->Cell(30,10,(empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel),1,0);  
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            }
            if(strlen($CurrentVessel->CurrentVessel) >= 15) {
                $fpdf->MultiCell(30,$cellHeight, (strlen($CurrentVessel->CurrentVessel) < 15 ? strtoupper(str_replace(' ', '-', $CurrentVessel->CurrentVessel)) . '                             ' : str_replace(' ', '-', $CurrentVessel->CurrentVessel)),1);
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            }  
            $fpdf->Cell(20, 10, (empty($ImoNumber->ImoNumber) ? '-' : $ImoNumber->ImoNumber), 1, 0, 'L');
            $yPos=$fpdf->GetY();
            $fpdf->MultiCell(25,10,(empty($AreaOfOperation->AreaOfOperation) ? '-' : str_replace(' ', '-', $AreaOfOperation->AreaOfOperation)),1);
            $fpdf->SetXY(65 + $cellWidth , $yPos);
            $yPos=$fpdf->GetY();
            $fpdf->Cell(15, 10,  $GRTSign->GrossTonnage ?? '-', 1, 0, 'L'); 
        if(strlen($Rank->Rank) < 15) {
            $fpdf->Cell(32,10,(empty($Rank->Rank) ? '-' : $Rank->Rank),1,0);  
            $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            $fpdf->Ln();   
        }
        if(strlen($Rank->Rank) >= 15) {
            $fpdf->MultiCell(32,$cellHeight, (strlen($Rank->Rank) < 15 ? strtoupper(str_replace(' ', '-', $Rank->Rank)) . '                             ' : str_replace(' ', '-', $Rank->Rank)),1);
        } 
        }
        if(!empty($StartDate_5->StartDate_5)) {
            $fpdf->Cell(30, 10, (empty($StartDate_5->StartDate_5) ? '-' : $StartDate_5->StartDate_5), 1, 0, 'L'); 
            $fpdf->Cell(30, 10, (empty($EndDate_5->EndDate_5) ? '-' : $EndDate_5->EndDate_5), 1, 0, 'L');   
            $yPos=$fpdf->GetY();
            $xPos=$fpdf->GetX(); 
            if(strlen($CurrentVessel->CurrentVessel) < 15) {
                $fpdf->Cell(30,10,(empty($CurrentVessel->CurrentVessel) ? '-' : $CurrentVessel->CurrentVessel),1,0);  
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            }
            if(strlen($CurrentVessel->CurrentVessel) >= 15) {
                $fpdf->MultiCell(30,$cellHeight, (strlen($CurrentVessel->CurrentVessel) < 15 ? strtoupper(str_replace(' ', '-', $CurrentVessel->CurrentVessel)) . '                             ' : str_replace(' ', '-', $CurrentVessel->CurrentVessel)),1);
                $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            }  
            $fpdf->Cell(20, 10, (empty($ImoNumber->ImoNumber) ? '-' : $ImoNumber->ImoNumber), 1, 0, 'L');
            $yPos=$fpdf->GetY();
            $fpdf->MultiCell(25,10,(empty($AreaOfOperation->AreaOfOperation) ? '-' : str_replace(' ', '-', $AreaOfOperation->AreaOfOperation)),1);
            $fpdf->SetXY(65 + $cellWidth , $yPos);
            $yPos=$fpdf->GetY();
            $fpdf->Cell(15, 10,  $GRTSign->GrossTonnage ?? '-', 1, 0, 'L'); 
        if(strlen($Rank->Rank) < 15) {
            $fpdf->Cell(32,10,(empty($Rank->Rank) ? '-' : $Rank->Rank),1,0);  
            $fpdf->SetXY($xPos - 50 + $cellWidth , $yPos);
            $fpdf->Ln();   
        }
        if(strlen($Rank->Rank) >= 15) {
            $fpdf->MultiCell(32,$cellHeight, (strlen($Rank->Rank) < 15 ? strtoupper(str_replace(' ', '-', $Rank->Rank)) . '                             ' : str_replace(' ', '-', $Rank->Rank)),1);
        } 
        }

        $fpdf->Ln(9);   
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->MultiCell(190, 6, 'During the whole period stated, the above-named crew was granted ' . $Request->LeaveDays . ' days leave of absence.', 0, 'L', 0);
        $fpdf->Ln(2);       
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(70, 5, 'NATURE OF DUTIES PERFORMED; ', 0, 0, 'L'); 
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->Cell(70, 5, '   Maintain high level of hygienic standards in the galley and ', 0, 1, 'L'); 
        $fpdf->MultiCell(190, 6, 'provision stores, ensure clean working areas. Prepare food requisition to ensure sufficient groceries are on board. Preparing healthy and nutritious meals, Early Resumption to vessel.', 0, 'L', 0);
        $fpdf->Ln(5);       
        $fpdf->MultiCell(190, 6, 'My report on the service of the above-name officer, during the period stated is as follows:', 0, 'L', 0);
        $fpdf->Ln(1);       
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(45, 8, 'Conduct:', 0);
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->Cell(60, 8, 'Very Good', 0, 1);
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(45, 8, 'Experience/Ability:', 0);
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->Cell(60, 8, 'Very Good', 0, 1);
        $fpdf->SetFont('Times', 'B', 12);  
  
        $fpdf->SetFont('Times', 'B', 12);    
        $fpdf->Cell(60, 10, 'OFFICIAL ENDORSEMENT.', 0, 1);

        $fpdf->Ln(15);    
        $fpdf->SetFont('Times', '', 12);
        $fpdf->Cell(60, 10, '..............................................', 0, 1);
        $fpdf->Cell(190, -10, '................................................', 0, 1, 'R');
        $fpdf->SetFont('Times', 'B', 12);
        $fpdf->Cell(60, 25, 'Signature of Supretendent', 0, 1);  
        $fpdf->Cell(190, -25, 'Signature of Crew Manager',  0, 1, 'R');

        $fpdf->SetFont('Times', '', 12);
        $fpdf->Output();        
        exit;
    }
    
    public function template_1_(Fpdf $fpdf, Request $Request) {  
        $fpdf->AddPage();    
        $fpdf->SetAutoPageBreak(false);
        $fpdf->SetTitle('Template 1 - SEA SERVICE TESTIMONIAL');   
        
        $fpdf->Image('../public/images/ltt-letter-head.png', 10, 0, 190);    
        $fpdf->Ln(30);     
        $fpdf->SetFont('Times', '', 11); 
        $fpdf->Cell(162.7, -10, 'Date: ' . date("j F, Y"), 0, 1, 'R');  
        $fpdf->SetDrawColor(200, 200, 200); 
      
        $fpdf->Ln(5);     
        $fpdf->SetFont('Times', 'BU', 17); 
        $fpdf->Cell(190, 25, 'SEA SERVICE TESTIMONIAL', 0, 1, 'C');
        $fpdf->SetFont('Times', '', 14); 
        $fpdf->Cell(190, -3, 'I certify that the following record is truthful statement of a sea service performed by:', 0, 1, 'L');
        $fpdf->SetFont('Times', 'B', 14); 
        $fpdf->Cell(190, 20, 'Name: -', 0, 1, 'L');
        $fpdf->Cell(190, -3, 'Date of Birth: -', 0, 1, 'L');
        $fpdf->Cell(190, 20, 'Discharge Book No: -', 0, 1, 'L');
        $fpdf->SetFont('Times', '', 9);         
          
        //// TABLE HEAD 
        $fpdf->SetFont('Times', 'B', 9);         
        $fpdf->Cell(40, 5, 'Period of Service & Date', 'LTR', 0, 'L');
        $fpdf->SetFont('Times', 'B', 12);   
        $fpdf->Cell(35, 8, 'VESSEL', 'LTR', 0, 'L');
        $fpdf->Cell(25, 13, 'IMO NO', 'LTR', 0, 'L');
        $fpdf->Cell(30, 13, 'RANK', 'LTR', 0, 'L'); 
        $fpdf->Cell(30, 8, 'AREA OF', 'LTR', 0, 'L');   
        $fpdf->Cell(25, 8, 'G.R.T', 'LTR', 0, 'L');   
        $fpdf->Ln(5); 
        $fpdf->SetFont('Times', 'B', 9);         
        $fpdf->Cell(20, 8, 'From', 1, 0, 'L');
        $fpdf->Cell(20, 8, 'To', 1, 0, 'L');
        $fpdf->SetFont('Times', 'B', 12);         
        $fpdf->Cell(35, 8, 'NAME', 'LR', 0, 'L'); 
        $fpdf->Cell(25, 8, ' ', 'LR', 0, 'L'); 
        $fpdf->Cell(30, 8, ' ', 'LR', 0, 'L'); 
        $fpdf->Cell(30, 8, 'OPERATION', 'LR', 0, 'L');
        $fpdf->Cell(25, 8, 'SIGN', 'LR', 0, 'L');  
        $fpdf->Ln();
           
        //// TABLE COLUMNS 
        $fpdf->SetFont('Times', '', 11);  
       
        $fpdf->Cell(20,10, '-',1,0);  
        $fpdf->Cell(20,10, '-',1,0);   
        $fpdf->Cell(35,10, '-',1); 
         
        $fpdf->Cell(25,10, '-',1,0); 
        $yPos=$fpdf->GetY(); 
        $fpdf->Cell(30, 10, '-',1);   
        $fpdf->Cell(30,10, '-',1); 
        $yPos=$fpdf->GetY();
        $fpdf->Cell(25,10,'-',1,0); 
        $fpdf->ln();
        
        $fpdf->Cell(20,10, '-',1,0);  
        $fpdf->Cell(20,10, '-',1,0);   
        $fpdf->Cell(35,10, '-',1); 
         
        $fpdf->Cell(25,10, '-',1,0); 
        $yPos=$fpdf->GetY(); 
        $fpdf->Cell(30, 10, '-',1);   
        $fpdf->Cell(30,10, '-',1); 
        $yPos=$fpdf->GetY();
        $fpdf->Cell(25,10,'-',1,0); 
        $fpdf->ln();
         
        $fpdf->ln(13);      
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->MultiCell(190, 6, 'During the whole period stated above, the above-named officer was granted ' . $Request->LeaveDays . ' days leave of absence. My report on the service of the above-name officer, during the period stated is as follows:', 0, 'L', 0);
        $fpdf->Ln(5);       
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(70, 5, 'NATURE OF DUTIES PERFORMED; ', 0, 0, 'L'); 
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->Cell(70, 5, '   Navigational watch for not less than 12 hours out of every 24 hours ', 0, 1, 'L'); 
        $fpdf->MultiCell(190, 6, 'whilst the vessel was engaged on operation. General maintenance of vessel.', 0, 'L', 0);
        $fpdf->Ln(5);       
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(45, 8, 'Conduct:', 0);
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->Cell(60, 8, 'Satisfactory', 0, 1);
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(45, 8, 'Experience/Ability:', 0);
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->Cell(60, 8, 'Satisfactory', 0, 1);
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(45, 8, 'Behaviour/Soberiety:', 0);
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->Cell(60, 8, 'Satisfactory', 0, 1);
  
        $fpdf->SetFont('Times', 'B', 12);    
        $fpdf->Cell(60, 10, 'OFFICIAL ENDORSEMENT.', 0, 1);

        $fpdf->Ln(15);    
        $fpdf->SetFont('Times', '', 12);
        $fpdf->Cell(60, 10, '..............................................', 0, 1);
        $fpdf->Cell(190, -10, '................................................', 0, 1, 'R');
        $fpdf->SetFont('Times', 'B', 12);
        $fpdf->Cell(60, 25, 'Signature of Supretendent', 0, 1);  
        $fpdf->Cell(190, -25, 'Signature of Crew Manager',  0, 1, 'R');

        $fpdf->SetFont('Times', '', 12);
        $fpdf->Output();        
        exit;
    }
        
    public function template_2_(Fpdf $fpdf, Request $Request) { 
        $fpdf->AddPage();    
        $fpdf->SetAutoPageBreak(false);
        $fpdf->SetTitle('Template 2 - SEA SERVICE TESTIMONIAL');             
  
        $fpdf->Image('../public/images/ltt-letter-head.png', 10, 0, 190);    
        $fpdf->Ln(30);     
        $fpdf->SetFont('Times', '', 11); 
        $fpdf->Cell(162.7, -10, 'Date: ' . date("j F, Y"), 0, 1, 'R');  
        $fpdf->SetDrawColor(200, 200, 200);  
         
        $fpdf->Ln(7);     
        $fpdf->SetFont('Times', 'BU', 17); 
        $fpdf->Cell(190, 25, 'SEA SERVICE TESTIMONIAL', 0, 1, 'C');
        $fpdf->SetFont('Times', '', 14); 
        $fpdf->Cell(190, -3, 'I certify that the following record is truthful statement of a sea service performed by:', 0, 1, 'L');
        $fpdf->SetFont('Times', 'B', 14); 
        $fpdf->Cell(190, 20, 'Name:  -', 0, 1, 'L');
        $fpdf->Cell(190, -3, 'Date of Birth: -', 0, 1, 'L');
        $fpdf->Cell(190, 20, 'Discharge Book No: -', 0, 1, 'L');
        $fpdf->SetFont('Times', '', 11);  

        $fpdf->Ln(5);          
        
        //// TABLE HEAD 
        $fpdf->SetFont('Times', 'B', 10); 
        $fpdf->Cell(20, 8, 'START', 'LTR', 0, 'L'); 
        $fpdf->Cell(20, 8, 'END', 'LTR', 0, 'L');
        $fpdf->Cell(30, 9, 'VESSEL', 'LTR', 0, 'L'); 
        $fpdf->Cell(20, 8, 'IMO', 'LTR', 0, 'L');
        $fpdf->Cell(25, 8, 'AREA OF', 'LTR', 0, 'L');  
        $fpdf->Cell(30, 8, 'ENG', 'LTR', 0, 'L');   
        $fpdf->Cell(15, 13, 'GRT', 'LTR', 0, 'L'); 
        $fpdf->Cell(30, 13, 'RATING', 'LTR', 0, 'L');
        $fpdf->Ln(5);
        $fpdf->Cell(20, 8, 'DATE', 'LR', 0, 'L');  
        $fpdf->Cell(20, 8, 'DATE', 'LR', 0, 'L'); 
        $fpdf->Cell(30, 10, 'NAME', 'LR', 0, 'L'); 
        $fpdf->Cell(20, 8, 'NO', 'LR', 0, 'L'); 
        $fpdf->Cell(25, 8, 'OPERATION', 'LR', 0, 'L'); 
        $fpdf->Cell(30, 8, '(kw)', 'LR', 0, 'L');
        $fpdf->Cell(15, 8, ' ', 'LR', 0, 'L');  
        $fpdf->Cell(30, 8, ' ', 'LR', 0, 'L'); 
        $fpdf->Ln();
           
        //// TABLE COLUMNS
        $fpdf->SetFont('Times', '', 10); 
               
        $fpdf->Cell(20, 10, '-', 1, 0, 'L'); 
        $fpdf->Cell(20, 10, '-', 1, 0, 'L');    
        $fpdf->Cell(30,10, '-',1);  
        $fpdf->Cell(20, 10, '-', 1, 0, 'L');
        $fpdf->Cell(25,10, '-',1);
        $fpdf->Cell(30,10, '-',1);
        $fpdf->Cell(15, 10, '389', 1, 0, 'L'); 
        $fpdf->Cell(30,10, '-',1);               
        $fpdf->Ln();   
        $fpdf->Cell(20, 10, '-', 1, 0, 'L'); 
        $fpdf->Cell(20, 10, '-', 1, 0, 'L');    
        $fpdf->Cell(30,10, '-',1);  
        $fpdf->Cell(20, 10, '-', 1, 0, 'L');
        $fpdf->Cell(25,10, '-',1);
        $fpdf->Cell(30,10, '-',1);
        $fpdf->Cell(15, 10, '389', 1, 0, 'L'); 
        $fpdf->Cell(30,10, '-',1); 
        $fpdf->Ln(18);   

        $fpdf->SetFont('Times', '', 12); 
        $fpdf->MultiCell(190, 6, 'During the whole period stated above, the above-named officer was granted ' . $Request->LeaveDays . ' days leave of absence.', 0, 'L', 0);
        $fpdf->Ln(2);       
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(70, 5, 'NATURE OF DUTIES PERFORMED; ', 0, 0, 'L'); 
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->Cell(70, 5, '   Regular watch on auxiliary machinery. Regular watch on main ', 0, 1, 'L'); 
        $fpdf->MultiCell(190, 6, 'propulsion machinery. Regular work in Ships processing centralized control room, full or partial Automation facilty to operate machinery in the unmanned mode for a significant proportion of each 24 hour period.', 0, 'L', 0);
        $fpdf->Ln(5);       
        $fpdf->MultiCell(190, 6, 'My report on the service of the above-name officer, during the period stated is as follows:', 0, 'L', 0);
        $fpdf->Ln(1);       
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(45, 8, 'Conduct:', 0);
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->Cell(60, 8, 'Very Good', 0, 1);
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(45, 8, 'Experience/Ability:', 0);
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->Cell(60, 8, 'Very Good', 0, 1);
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(45, 8, 'Behaviour:', 0);
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->Cell(60, 8, 'Satisfactory', 0, 1);
  
        $fpdf->SetFont('Times', 'B', 12);    
        $fpdf->Cell(60, 10, 'OFFICIAL ENDORSEMENT.', 0, 1);

        $fpdf->Ln(15);    
        $fpdf->SetFont('Times', '', 12);
        $fpdf->Cell(60, 10, '..............................................', 0, 1);
        $fpdf->Cell(190, -10, '................................................', 0, 1, 'R');
        $fpdf->SetFont('Times', 'B', 12);
        $fpdf->Cell(60, 25, 'Signature of Supretendent', 0, 1);  
        $fpdf->Cell(190, -25, 'Signature of Crew Manager',  0, 1, 'R');

        $fpdf->SetFont('Times', '', 12);
        $fpdf->Output();        
        exit;
    }
        
    public function template_3_(Fpdf $fpdf, Request $Request) { 
        $fpdf->AddPage();    
        $fpdf->SetAutoPageBreak(false);
        $fpdf->SetTitle('Template 3 - SEA SERVICE TESTIMONIAL');             
  
        $fpdf->Image('../public/images/ltt-letter-head.png', 10, 0, 190);    
        $fpdf->Ln(30);     
        $fpdf->SetFont('Times', '', 11); 
        $fpdf->Cell(162.7, -10, 'Date: ' . date("j F, Y"), 0, 1, 'R');  
        $fpdf->SetDrawColor(200, 200, 200);  
         
        $fpdf->Ln(7);     
        $fpdf->SetFont('Times', 'BU', 17); 
        $fpdf->Cell(190, 25, 'SEA SERVICE TESTIMONIAL', 0, 1, 'C');
        $fpdf->SetFont('Times', '', 14); 
        $fpdf->Cell(190, -3, 'I certify that the following record is truthful statement of a sea service performed by:', 0, 1, 'L');
        $fpdf->SetFont('Times', 'B', 14); 
        $fpdf->Cell(190, 20, 'Name:  -', 0, 1, 'L');
        $fpdf->Cell(190, -3, 'Date of Birth: -', 0, 1, 'L');
        $fpdf->Cell(190, 20, 'Discharge Book No: -', 0, 1, 'L');
        $fpdf->SetFont('Times', '', 11);  

        $fpdf->Ln(5);          
        
        //// TABLE HEAD 
        $fpdf->SetFont('Times', 'B', 10); 
        $fpdf->Cell(20, 8, 'START', 'LTR', 0, 'L'); 
        $fpdf->Cell(20, 8, 'END', 'LTR', 0, 'L');
        $fpdf->Cell(30, 9, 'VESSEL', 'LTR', 0, 'L'); 
        $fpdf->Cell(20, 8, 'IMO', 'LTR', 0, 'L');
        $fpdf->Cell(25, 8, 'AREA OF', 'LTR', 0, 'L');   
        $fpdf->Cell(15, 13, 'GRT', 'LTR', 0, 'L'); 
        $fpdf->Cell(30, 13, 'RATING', 'LTR', 0, 'L');
        $fpdf->Ln(5);
        $fpdf->Cell(20, 8, 'DATE', 'LR', 0, 'L');  
        $fpdf->Cell(20, 8, 'DATE', 'LR', 0, 'L'); 
        $fpdf->Cell(30, 10, 'NAME', 'LR', 0, 'L'); 
        $fpdf->Cell(20, 8, 'NO', 'LR', 0, 'L'); 
        $fpdf->Cell(25, 8, 'OPERATION', 'LR', 0, 'L');  
        $fpdf->Cell(15, 8, ' ', 'LR', 0, 'L');  
        $fpdf->Cell(30, 8, ' ', 'LR', 0, 'L'); 
        $fpdf->Ln();
           
        //// TABLE COLUMNS
        $fpdf->SetFont('Times', '', 10); 
               
        $fpdf->Cell(20, 10, '-', 1, 0, 'L'); 
        $fpdf->Cell(20, 10, '-', 1, 0, 'L');    
        $fpdf->Cell(30,10, '-',1);  
        $fpdf->Cell(20, 10, '-', 1, 0, 'L');
        $fpdf->Cell(25,10, '-',1); 
        $fpdf->Cell(15, 10, '389', 1, 0, 'L'); 
        $fpdf->Cell(30,10, '-',1);               
        $fpdf->Ln();   
        $fpdf->Cell(20, 10, '-', 1, 0, 'L'); 
        $fpdf->Cell(20, 10, '-', 1, 0, 'L');    
        $fpdf->Cell(30,10, '-',1);  
        $fpdf->Cell(20, 10, '-', 1, 0, 'L');
        $fpdf->Cell(25,10, '-',1); 
        $fpdf->Cell(15, 10, '389', 1, 0, 'L'); 
        $fpdf->Cell(30,10, '-',1); 
        $fpdf->Ln(18);   

        $fpdf->SetFont('Times', '', 12); 
        $fpdf->MultiCell(190, 6, 'During the whole period stated above, the above-named officer was granted ' . $Request->LeaveDays . ' days leave of absence.', 0, 'L', 0);
        $fpdf->Ln(2);       
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(70, 5, 'NATURE OF DUTIES PERFORMED; ', 0, 0, 'L'); 
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->Cell(70, 5, '   Regular watch on auxiliary machinery. Regular watch on main ', 0, 1, 'L'); 
        $fpdf->MultiCell(190, 6, 'propulsion machinery. Regular work in Ships processing centralized control room, full or partial Automation facilty to operate machinery in the unmanned mode for a significant proportion of each 24 hour period.', 0, 'L', 0);
        $fpdf->Ln(5);       
        $fpdf->MultiCell(190, 6, 'My report on the service of the above-name officer, during the period stated is as follows:', 0, 'L', 0);
        $fpdf->Ln(1);       
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(45, 8, 'Conduct:', 0);
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->Cell(60, 8, 'Very Good', 0, 1);
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(45, 8, 'Experience/Ability:', 0);
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->Cell(60, 8, 'Very Good', 0, 1);
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(45, 8, 'Behaviour:', 0);
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->Cell(60, 8, 'Satisfactory', 0, 1);
  
        $fpdf->SetFont('Times', 'B', 12);    
        $fpdf->Cell(60, 10, 'OFFICIAL ENDORSEMENT.', 0, 1);

        $fpdf->Ln(15);    
        $fpdf->SetFont('Times', '', 12);
        $fpdf->Cell(60, 10, '..............................................', 0, 1);
        $fpdf->Cell(190, -10, '................................................', 0, 1, 'R');
        $fpdf->SetFont('Times', 'B', 12);
        $fpdf->Cell(60, 25, 'Signature of Supretendent', 0, 1);  
        $fpdf->Cell(190, -25, 'Signature of Crew Manager',  0, 1, 'R');

        $fpdf->SetFont('Times', '', 12);
        $fpdf->Output();        
        exit;
    }
}
