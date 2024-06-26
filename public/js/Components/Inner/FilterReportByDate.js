let FilterReportByDatePdfButtons = document.querySelectorAll('.ReportPdfButton');
let FilterReportByDateModal = document.querySelector('.FilterReportByDate');
let CancelButtonFilterReportByDate = document.querySelectorAll('.cancel-button-filter-report-by-date');

FilterReportByDatePdfButtons.forEach(Button => {
    Button.addEventListener('click', () => {
        FilterReportByDateModal.style.display = 'flex';
    })
});

CancelButtonFilterReportByDate.forEach(CancelButtonFilterReportByDate => {
    CancelButtonFilterReportByDate.addEventListener('click', () => { 
        FilterReportByDateModal.style.display = 'none';
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
        FilterReportByDateForm.submit();
    } else if (REPORT_FromDate.value == '') { 
        ErrorFilterReportByDate.textContent =  'From Date can\'t be empty';
    } else if (REPORT_EndDate.value == '') {  
        ErrorFilterReportByDate.textContent =  'End Date is required';
    } else if (REPORT_FromDate.value > REPORT_EndDate.value) {  
        ErrorFilterReportByDate.textContent =  'From Date cannot be greater than End date';
    } else { 
        FilterReportByDate_GoButton.style.backgroundColor = '#1fb95e';
        FilterReportByDate_GoButton.textContent = '+ Processing..';
        FilterReportByDateForm.submit();
        window.open('/Availability/Report/?DateFrom=' + REPORT_FromDate.value  + '&DateTo=' + REPORT_EndDate.value);
    }
})