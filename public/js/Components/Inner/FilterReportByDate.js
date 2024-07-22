let FilterReportByDatePdfButtons = document.querySelectorAll('.ReportPdfButton');
let FilterReportByDateModal = document.querySelector('.FilterReportByDate');
let CancelButtonFilterReportByDate = document.querySelectorAll('.cancel-button-filter-report-by-date');
let FilterReportForVesselByDatePdfButtons = document.querySelectorAll('.ReportPdfButtonForVessels');
let FilterReportForVesselByDateModal = document.querySelector('.FilterReportForVesselByDate');
let CancelButtonFilterReportForVesselByDate = document.querySelectorAll('.cancel-button-filter-report-for-vessel-by-date');
let FilterReportForVesselByMonth_GoButton = document.querySelector('.FilterReportForVesselByMonth_GoButton');
let VesselName_REPORT = document.querySelector('select[name=VesselName_REPORT]');
let Month_REPORT = document.querySelector('select[name=Month_REPORT]');

FilterReportByDatePdfButtons.forEach(Button => {
    Button.addEventListener('click', () => {
        FilterReportByDateModal.style.display = 'flex';
    })
});
FilterReportForVesselByDatePdfButtons.forEach(Button => {
    Button.addEventListener('click', () => {
        FilterReportForVesselByMonth_GoButton.nextElementSibling.textContent = Button.nextElementSibling.textContent;
        VesselName_REPORT.value = Button.nextElementSibling.textContent;
        Month_REPORT.value = new Date().getMonth() + 1;
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

FilterReportForVesselByMonth_GoButton.addEventListener('click', () => { 
        FilterReportForVesselByMonth_GoButton.style.backgroundColor = '#1fb95e';
        FilterReportForVesselByMonth_GoButton.textContent = '+ Processing..';
        window.open('/Availability/Report/?Month=' + Month_REPORT.value + '&Vessel=' + VesselName_REPORT.value);
});
