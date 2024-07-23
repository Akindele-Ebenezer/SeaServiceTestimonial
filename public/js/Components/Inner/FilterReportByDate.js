let FilterReportByDatePdfButtons = document.querySelectorAll('.ReportPdfButton');
let FilterReportByDateModal = document.querySelector('.FilterReportByDate');
let CancelButtonFilterReportByDate = document.querySelectorAll('.cancel-button-filter-report-by-date');
let FilterReportForVesselByDatePdfButtons = document.querySelectorAll('.ReportPdfButtonForVessels');
let FilterReportForVesselByDateModal = document.querySelector('.FilterReportForVesselByDate');
let CancelButtonFilterReportForVesselByDate = document.querySelectorAll('.cancel-button-filter-report-for-vessel-by-date');
let FilterReportForVesselByMonth_GoButton = document.querySelector('.FilterReportForVesselByMonth_GoButton');
let FilterReportForAllVesselsByMonth_GoButton = document.querySelector('.FilterReportForAllVesselsByMonth_GoButton');
let VesselName_REPORT = document.querySelector('select[name=VesselName_REPORT]');
let Month_REPORT = document.querySelector('select[name=Month_REPORT]');
let Year_REPORT = document.querySelector('select[name=Year_REPORT]');
let Month_REPORT_AllVessels = document.querySelector('select[name=Month_REPORT_AllVessels]');
let Year_REPORT_AllVessels = document.querySelector('select[name=Year_REPORT_AllVessels]');

FilterReportByDatePdfButtons.forEach(Button => {
    Button.addEventListener('click', () => {
        Month_REPORT_AllVessels.value = new Date().getMonth() + 1;
        Year_REPORT_AllVessels.value = new Date().getFullYear();
        FilterReportByDateModal.style.display = 'flex';
    })
});
FilterReportForVesselByDatePdfButtons.forEach(Button => {
    Button.addEventListener('click', () => {
        FilterReportForVesselByMonth_GoButton.nextElementSibling.textContent = Button.nextElementSibling.textContent;
        VesselName_REPORT.value = Button.nextElementSibling.textContent;
        Month_REPORT.value = new Date().getMonth() + 1;
        Year_REPORT.value = new Date().getFullYear();
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
 
FilterReportForAllVesselsByMonth_GoButton.addEventListener('click', () => { 
    FilterReportForAllVesselsByMonth_GoButton.style.backgroundColor = '#1fb95e';
    FilterReportForAllVesselsByMonth_GoButton.textContent = '+ Processing..';
    window.open('/Availability/Report/?Month=' + Month_REPORT_AllVessels.value + '&Year=' + Year_REPORT_AllVessels.value);
})
  
FilterReportForVesselByMonth_GoButton.addEventListener('click', () => { 
        FilterReportForVesselByMonth_GoButton.style.backgroundColor = '#1fb95e';
        FilterReportForVesselByMonth_GoButton.textContent = '+ Processing..';
        window.open('/Availability/Report/?Month=' + Month_REPORT.value + '&Year=' + Year_REPORT.value + '&Vessel=' + VesselName_REPORT.value);
});
