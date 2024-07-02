let FilterReportByDatePdfButtons = document.querySelectorAll('.ReportPdfButton');
let FilterReportByDateModal = document.querySelector('.FilterReportByDate');
let CancelButtonFilterReportByDate = document.querySelectorAll('.cancel-button-filter-report-by-date');
let FilterReportForVesselByDatePdfButtons = document.querySelectorAll('.ReportPdfButtonForVessels');
let FilterReportForVesselByDateModal = document.querySelector('.FilterReportForVesselByDate');
let CancelButtonFilterReportForVesselByDate = document.querySelectorAll('.cancel-button-filter-report-for-vessel-by-date');
let FilterReportForVesselByDate_GoButton = document.querySelector('.FilterReportForVesselByDate_GoButton');

FilterReportByDatePdfButtons.forEach(Button => {
    Button.addEventListener('click', () => {
        FilterReportByDateModal.style.display = 'flex';
    })
});
FilterReportForVesselByDatePdfButtons.forEach(Button => {
    Button.addEventListener('click', () => {
        FilterReportForVesselByDate_GoButton.nextElementSibling.textContent = Button.nextElementSibling.textContent;
        FilterReportForVesselByDateModal.style.display = 'flex';
    })
});

CancelButtonFilterReportByDate.forEach(CancelButtonFilterReportByDate => {
    CancelButtonFilterReportByDate.addEventListener('click', () => { 
        FilterReportByDateModal.style.display = 'none';
    })
});
CancelButtonFilterReportForVesselByDate.forEach(CancelButtonFilterReportForVesselByDate => {
    CancelButtonFilterReportForVesselByDate.addEventListener('click', () => {  
        FilterReportForVesselByDateModal.style.display = 'none';
    })
});

let FilterReportByDate_GoButton = document.querySelector('.FilterReportByDate_GoButton');
let FilterReportByDateForm = document.querySelector('.FilterReportByDateForm');
let ErrorFilterReportByDate = document.querySelector('.error-filter-report-by-date');
let REPORT_FromDate = document.querySelector('input[name=FromDate_FILTERREPORTBYDATE]');
let REPORT_EndDate = document.querySelector('input[name=EndDate_FILTERREPORTBYDATE]');
let REPORT_SpecificDay = document.querySelector('input[name=REPORT_SpecificDay]');

FilterReportByDate_GoButton.addEventListener('click', () => {
    if (REPORT_SpecificDay.value) {  
        FilterReportByDate_GoButton.style.backgroundColor = '#1fb95e';
        FilterReportByDate_GoButton.textContent = '+ Processing..';
        window.open('/Availability/Report/?DateFrom=' + REPORT_SpecificDay.value  + '&DateTo=' + REPORT_SpecificDay.value + '&REPORT_SpecificDay=');
    }else if (REPORT_FromDate.value == '') { 
        ErrorFilterReportByDate.textContent =  'From Date can\'t be empty';
    } else if (REPORT_EndDate.value == '') {  
        ErrorFilterReportByDate.textContent =  'End Date is required';
    } else if (REPORT_FromDate.value > REPORT_EndDate.value) {  
        ErrorFilterReportByDate.textContent =  'From Date cannot be greater than End date';
    } else {
        FilterReportByDate_GoButton.style.backgroundColor = '#1fb95e';
        FilterReportByDate_GoButton.textContent = '+ Processing..';
        window.open('/Availability/Report/?DateFrom=' + REPORT_FromDate.value  + '&DateTo=' + REPORT_EndDate.value);
    }
})

let ReportPdfButtonForVessels = document.querySelectorAll('.ReportPdfButtonForVessel');
var urlParams = new URLSearchParams(window.location.search);
 
let FilterReportForVesselByDateForm = document.querySelector('.FilterReportForVesselByDateForm');
let ErrorFilterReportForVesselByDate = document.querySelector('.error-filter-report-for-vessel-by-date');
let VESSELREPORT_FromDate = document.querySelector('input[name=FromDate_FILTERREPORTFORVESSELBYDATE]');
let VESSELREPORT_EndDate = document.querySelector('input[name=EndDate_FILTERREPORTFORVESSELBYDATE]');
let VESSELREPORT_SpecificDay = document.querySelector('input[name=VESSELREPORT_SpecificDay]');

FilterReportForVesselByDate_GoButton.addEventListener('click', () => {
    if (VESSELREPORT_SpecificDay.value) {  
        FilterReportForVesselByDate_GoButton.style.backgroundColor = '#1fb95e';
        FilterReportForVesselByDate_GoButton.textContent = '+ Processing..';
        window.open('/Availability/Report/?DateFrom=' + VESSELREPORT_FromDate.value  + '&DateTo=' + VESSELREPORT_EndDate.value + '&REPORT_SpecificDay=' + '&VesselReportFor=' + FilterReportForVesselByDate_GoButton.nextElementSibling.textContent);
    }else if (VESSELREPORT_FromDate.value == '') { 
        ErrorFilterReportForVesselByDate.textContent =  'From Date can\'t be empty';
    } else if (VESSELREPORT_EndDate.value == '') {  
        ErrorFilterReportForVesselByDate.textContent =  'End Date is required';
    } else if (VESSELREPORT_FromDate.value > VESSELREPORT_EndDate.value) {  
        ErrorFilterReportForVesselByDate.textContent =  'From Date cannot be greater than End date';
    } else {
        FilterReportForVesselByDate_GoButton.style.backgroundColor = '#1fb95e';
        FilterReportForVesselByDate_GoButton.textContent = '+ Processing..';
        window.open('/Availability/Report/?DateFrom=' + VESSELREPORT_FromDate.value  + '&DateTo=' + VESSELREPORT_EndDate.value + '&REPORT_SpecificDay=' + '&VesselReportFor=' + FilterReportForVesselByDate_GoButton.nextElementSibling.textContent);
    } 
});
