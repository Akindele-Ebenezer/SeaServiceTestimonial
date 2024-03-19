<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf; 

class SeaServiceTestimonialPdf extends Controller
{
    public function template_1(Fpdf $fpdf) {
        $fpdf->AddPage();    
        $fpdf->SetAutoPageBreak(false);
        $fpdf->SetTitle('Template 1 - SEA SERVICE TESTIMONIAL');                   
        // $fpdf->Image('../public/images/depasa-letter-head.png', 10, 2, 190);    
        $fpdf->Image('../public/images/ltt-letter-head.png', 10, 0, 190);    
        $fpdf->SetDrawColor(200, 200, 200); 

        $fpdf->Ln(30);          
        $fpdf->SetFont('Times', '', 11); 
        $fpdf->Cell(165, -10, 'Date: ' . date("j F, Y"), 0, 1, 'R'); 
        $fpdf->Ln(5);     
        $fpdf->SetFont('Times', 'BU', 17); 
        $fpdf->Cell(190, 25, 'SEA SERVICE TESTIMONIAL', 0, 1, 'C');
        $fpdf->SetFont('Times', '', 14); 
        $fpdf->Cell(190, -3, 'I certify that the following record is truthful statement of a sea service performed by:', 0, 1, 'L');
        $fpdf->SetFont('Times', 'B', 14); 
        $fpdf->Cell(190, 20, 'Name: OMOZUWA CHRISTIAN EKATA', 0, 1, 'L');
        $fpdf->Cell(190, -3, 'Date of Birth: ' . '07th April 1989', 0, 1, 'L');
        $fpdf->Cell(190, 20, 'Discharge Book No: ' . '070453', 0, 1, 'L');
        $fpdf->SetFont('Times', '', 9);         
          
        //// TABLE HEAD 
        $fpdf->SetFont('Times', 'B', 9);         
        $fpdf->Cell(40, 5, 'Period of Service & Date', 'LTR', 0, 'C');
        $fpdf->SetFont('Times', 'B', 12);   
        $fpdf->Cell(35, 8, 'VESSEL', 'LTR', 0, 'C');
        $fpdf->Cell(25, 13, 'IMO NO', 'LTR', 0, 'C');
        $fpdf->Cell(30, 13, 'RANK', 'LTR', 0, 'C'); 
        $fpdf->Cell(30, 8, 'AREA OF', 'LTR', 0, 'C');   
        $fpdf->Cell(25, 8, 'G.R.T', 'LTR', 0, 'C');   
        $fpdf->Ln(5); 
        $fpdf->SetFont('Times', 'B', 9);         
        $fpdf->Cell(20, 8, 'From', 1, 0, 'C');
        $fpdf->Cell(20, 8, 'To', 1, 0, 'C');
        $fpdf->SetFont('Times', 'B', 12);         
        $fpdf->Cell(35, 8, 'NAME', 'LR', 0, 'C'); 
        $fpdf->Cell(25, 8, ' ', 'LR', 0, 'C'); 
        $fpdf->Cell(30, 8, ' ', 'LR', 0, 'C'); 
        $fpdf->Cell(30, 8, 'OPERATION', 'LR', 0, 'C');
        $fpdf->Cell(25, 8, 'SIGN', 'LR', 0, 'C');  
        $fpdf->Ln();
           
        //// TABLE COLUMNS 
        $fpdf->SetFont('Times', '', 9); 
        $fpdf->Cell(20, 13, '02-04-2024', 1, 0, 'C'); 
        $fpdf->Cell(20, 13, '05-05-2024', 1, 0, 'C');  
        $fpdf->Cell(35, 13, 'SD GUMEL', 1, 0, 'C'); 
        $fpdf->Cell(25, 13, '9151735', 1, 0, 'C'); 
        $fpdf->Cell(30, 13, 'Quarter Master', 1, 0, 'C');
        $fpdf->Cell(30, 13, 'Sea Dredging', 1, 0, 'C');  
        $fpdf->Cell(25, 13, '2761', 1, 1, 'C');    

        $fpdf->Ln(5);       
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->MultiCell(190, 6, 'During the whole period stated above, the above-named officer was granted (nil) days leave of absence. My report on the service of the above-name officer, during the period stated is as follows:', 0, 'L', 0);
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

        $fpdf->Ln(15);    
        $fpdf->Cell(50, 25, 'Company stamp and date: ', 0, 0);  
        $fpdf->SetFont('Times', '', 12);
        $fpdf->Cell(60, 25, date("j F, Y"), 0, 1);  
        $fpdf->Output();        
        exit;
    }
    
    public function template_2(Fpdf $fpdf) {
        $fpdf->AddPage();    
        $fpdf->SetAutoPageBreak(false);
        $fpdf->SetTitle('Template 2 - SEA SERVICE TESTIMONIAL');   
        $fpdf->SetDrawColor(200, 200, 200); 
        // $fpdf->Image('../public/images/depasa-letter-head.png', 10, 2, 190);    
        $fpdf->Image('../public/images/ltt-letter-head.png', 10, 0, 190);    
        
        $fpdf->Ln(30);          
        $fpdf->SetFont('Times', '', 11); 
        $fpdf->Cell(165, -10, 'Date: ' . date("j F, Y"), 0, 1, 'R'); 
        $fpdf->Ln(7);     
        $fpdf->SetFont('Times', 'BU', 17); 
        $fpdf->Cell(190, 25, 'SEA SERVICE TESTIMONIAL', 0, 1, 'C');
        $fpdf->SetFont('Times', '', 14); 
        $fpdf->Cell(190, -3, 'I certify that the following record is truthful statement of a sea service performed by:', 0, 1, 'L');
        $fpdf->SetFont('Times', 'B', 14); 
        $fpdf->Cell(190, 20, 'Name: Monehin Joseph Kayode', 0, 1, 'L');
        $fpdf->Cell(190, -3, 'Date of Birth: ' . '07th April 1989', 0, 1, 'L');
        $fpdf->Cell(190, 20, 'Discharge Book No: ' . '070453', 0, 1, 'L');
        $fpdf->SetFont('Times', '', 11);  

        $fpdf->Ln(5);          
        
        //// TABLE HEAD 
        $fpdf->SetFont('Times', 'B', 10); 
        $fpdf->Cell(20, 8, 'START', 'LTR', 0, 'C'); 
        $fpdf->Cell(20, 8, 'END', 'LTR', 0, 'C');
        $fpdf->Cell(30, 9, 'VESSEL', 'LTR', 0, 'C'); 
        $fpdf->Cell(15, 8, 'IMO', 'LTR', 0, 'C');
        $fpdf->Cell(30, 8, 'AREA OF', 'LTR', 0, 'C');  
        $fpdf->Cell(25, 8, 'ENG', 'LTR', 0, 'C');   
        $fpdf->Cell(20, 13, 'GRT', 'LTR', 0, 'C'); 
        $fpdf->Cell(30, 13, 'RATING', 'LTR', 0, 'C');
        $fpdf->Ln(5);
        $fpdf->Cell(20, 8, 'DATE', 'LR', 0, 'C');  
        $fpdf->Cell(20, 8, 'DATE', 'LR', 0, 'C'); 
        $fpdf->Cell(30, 10, 'NAME', 'LR', 0, 'C'); 
        $fpdf->Cell(15, 8, 'NO', 'LR', 0, 'C'); 
        $fpdf->Cell(30, 8, 'OPERATION', 'LR', 0, 'C'); 
        $fpdf->Cell(25, 8, '(kw)', 'LR', 0, 'C');
        $fpdf->Cell(20, 8, ' ', 'LR', 0, 'C');  
        $fpdf->Cell(30, 8, ' ', 'LR', 0, 'C'); 
        $fpdf->Ln();
           
        //// TABLE COLUMNS
        $fpdf->SetFont('Times', '', 9); 
        $fpdf->Cell(20, 13, '02-04-2024', 1, 0, 'C'); 
        $fpdf->Cell(20, 13, '02-04-2024', 1, 0, 'C'); 
        $fpdf->Cell(30, 13, 'MT Zaranda', 1, 0, 'C'); 
        $fpdf->Cell(15, 13, '268325', 1, 0, 'C');
        $fpdf->Cell(30, 13, 'N.C.V', 1, 0, 'C');  
        $fpdf->Cell(25, 13, '1380 kw (x2)', 1, 0, 'C');   
        $fpdf->SetFont('Times', '', 9); 
        $fpdf->Cell(20, 13, '389', 1, 0, 'C'); 
        $fpdf->Cell(30, 13, '2nd Engr.', 1, 0, 'C'); 

        $fpdf->Ln(15);   
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->MultiCell(190, 6, 'During the whole period stated above, the above-named officer was granted 112 days leave of absence.', 0, 'L', 0);
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

        $fpdf->Ln(15);    
        $fpdf->Cell(50, 25, 'Company stamp and date: ', 0, 0);  
        $fpdf->SetFont('Times', '', 12);
        $fpdf->Cell(60, 25, date("j F, Y"), 0, 1);  
        $fpdf->Output();        
        exit;
    }
    
    public function template_3(Fpdf $fpdf) {
        $fpdf->AddPage();    
        $fpdf->SetAutoPageBreak(false);
        $fpdf->SetTitle('Template 3 - SEA SERVICE TESTIMONIAL');                 
        // $fpdf->Image('../public/images/depasa-letter-head.png', 10, 2, 190);    
        $fpdf->Image('../public/images/ltt-letter-head.png', 10, 0, 190);    
        $fpdf->SetDrawColor(200, 200, 200); 

        $fpdf->Ln(30);          
        $fpdf->SetFont('Times', '', 14); 
        $fpdf->Cell(190, -3, 'I certify that the following record is truthful statement of a sea service performed by:', 0, 1, 'L');
        $fpdf->Ln(6);          
        $fpdf->SetFont('Times', 'B', 14); 
        $fpdf->Cell(190, 7, 'FULL NAME OF EMPLOYEE:    OMOZUWA CHRISTIAN EKATA', 0, 1, 'L');
        $fpdf->Cell(190, 7, 'DATE OF BIRTH:                           ' . '07th April 1989', 0, 1, 'L');
        $fpdf->Cell(190, 7, 'PLACE OF BIRTH:                        ' . '070453', 0, 1, 'L');
        $fpdf->Cell(190, 7, 'DISCHARGE BOOK NO:              ' . '070453', 0, 1, 'L');
        $fpdf->SetFont('Times', 'B', 8); 

        $fpdf->Ln(5);          
        
        //// TABLE HEAD 
        $fpdf->Cell(30, 8, 'VESSEL', 'LTR', 0, 'C');
        $fpdf->Cell(30, 5, 'PERIOD', 'LTR', 0, 'C');
        $fpdf->Cell(20, 8, 'VESSEL', 'LTR', 0, 'C');
        $fpdf->Cell(15, 13, 'G.R.T', 'LTR', 0, 'C'); 
        $fpdf->Cell(15, 8, 'IMO', 'LTR', 0, 'C');
        $fpdf->Cell(15, 8, 'CALL', 'LTR', 0, 'C');  
        $fpdf->Cell(20, 8, 'AREA OF', 'LTR', 0, 'C');   
        $fpdf->Cell(20, 13, 'RANK', 'LTR', 0, 'C'); 
        $fpdf->Cell(20, 8, 'HOLLARD', 'LTR', 0, 'C');
        $fpdf->Ln(5);
        $fpdf->Cell(30, 8, 'NAME', 'LR', 0, 'C'); 
        $fpdf->Cell(15, 8, 'FROM', 1, 0, 'C');
        $fpdf->Cell(15, 8, 'TO', 1, 0, 'C');
        $fpdf->Cell(20, 8, 'TYPE', 'LR', 0, 'C'); 
        $fpdf->Cell(15, 8, ' ', 'LR', 0, 'C'); 
        $fpdf->Cell(15, 8, 'NO', 'LR', 0, 'C'); 
        $fpdf->Cell(15, 8, 'SIGN', 'LR', 0, 'C'); 
        $fpdf->Cell(20, 8, 'OPERATION', 'LR', 0, 'C');
        $fpdf->Cell(20, 8, ' ', 'LR', 0, 'C');  
        $fpdf->Cell(20, 8, 'PULL', 'LR', 0, 'C'); 
        $fpdf->Ln();
           
        //// TABLE COLUMNS
        $fpdf->SetFont('Times', '', 9); 
        $fpdf->Cell(30, 13, 'UBIMA', 1, 0, 'C'); 
        $fpdf->SetFont('Times', '', 7); 
        $fpdf->Cell(15, 13, '02-04-2024', 1, 0, 'C'); 
        $fpdf->Cell(15, 13, '05-05-2024', 1, 0, 'C'); 
        $fpdf->SetFont('Times', '', 9); 
        $fpdf->Cell(20, 13, 'ASD TUG', 1, 0, 'C'); 
        $fpdf->Cell(15, 13, '369', 1, 0, 'C'); 
        $fpdf->Cell(15, 13, '268325', 1, 0, 'C');
        $fpdf->Cell(15, 13, 'SOBU', 1, 0, 'C');  
        $fpdf->Cell(20, 13, 'N.C.V', 1, 0, 'C');   
        $fpdf->SetFont('Times', '', 7); 
        $fpdf->Cell(20, 13, 'TUG MATE', 1, 0, 'C'); 
        $fpdf->Cell(20, 13, '60 T', 1, 0, 'C'); 

        $fpdf->Ln(10);       
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->Ln(6);       
        $fpdf->MultiCell(190, 6, 'During the whole period stated above, the above-named officer was granted (nil) days leave of absence.', 0, 'L', 0);
        $fpdf->Ln(3);       
        $fpdf->MultiCell(190, 6, 'My report on the service of the above-name officer, during the period stated is as follows:', 0, 'L', 0);
        $fpdf->Ln(5);    
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(70, 5, 'NATURE OF DUTIES PERFORMED; ', 0, 0, 'L'); 
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->Cell(70, 5, '   Navigational watch for not less than 12 hours out of every 24 hours ', 0, 1, 'L'); 
        $fpdf->MultiCell(190, 6, 'whilst the vessel was engaged in harbour towage activities and limited coastal voyages. As - TIM, he has shown to be very experienced in ASD tug handling giving the highest guarantee & quality of tug assistance to the Lagos Pilotage District.', 0, 'L', 0);
        $fpdf->MultiCell(190, 6, 'He showed to have a high level of leadership skills & work ethics making him a role model for his crew.', 0, 'L', 0);
        $fpdf->Ln(5);          
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(45, 8, 'Conduct:', 0);
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->Cell(60, 8, 'Very Good', 0, 1);
        $fpdf->SetFont('Times', 'B', 12); 
        $fpdf->Cell(45, 8, 'Experience/Ability:', 0);
        $fpdf->SetFont('Times', '', 12); 
        $fpdf->Cell(60, 8, 'Very Good', 0, 1);
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

        $fpdf->Ln(15);    
        $fpdf->Cell(50, 25, 'Company stamp and date: ', 0, 0);  
        $fpdf->SetFont('Times', '', 12);
        $fpdf->Cell(60, 25, date("j F, Y"), 0, 1);  
        $fpdf->Output();        
        exit;
    }
    
    public function test(Fpdf $fpdf) {
        $fpdf->AddPage();    
        $fpdf->SetAutoPageBreak(false);
        $fpdf->SetTitle('Template 3 - SEA SERVICE TESTIMONIAL');   
        $fpdf->SetFont('Times', 'B', 12);  
        $fpdf->SetDrawColor(200, 200, 200); 
  
        $fpdf->Cell(40, 10, 'Name', 1);
        $fpdf->Cell(60, 10, 'Email', 1);
        $fpdf->Cell(30, 10, 'Address', 1);
        $fpdf->Cell(40, 10, 'Date of Birth', 1);
        $fpdf->Ln();

        $fpdf->Cell(40, 10, '$data[0]', 1);
        $fpdf->Cell(60, 10, '$data[1]', 1);
        $fpdf->MultiCell(30, 10, '$data[2]$data[2]$data[2]$data[2]$data[2]$data[2]', 1);
        $fpdf->Cell(40, 10, '$data[3]', 1);
        $fpdf->Ln();

        $fpdf->Output();        
        exit;
    }
}
