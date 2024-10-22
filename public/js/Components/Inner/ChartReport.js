let OpenChartFilterButton = document.querySelector('.OpenChartFilterButton');
let ChartFilterCloseButton = document.querySelector('.ChartReport .cancel-button-chart-report');
let ChartReportCloseButton = document.querySelector('.Chart5 .Close');
let ChartReportGoButton = document.querySelector('.ChartReport .ChartREPORT_GoButton');
let ChartReportModal = document.querySelector('.Chart5');
let ChartReport = document.querySelector('.ChartReport');
let ErrorChartReport = document.querySelector('.error-chart-report');

OpenChartFilterButton.addEventListener('click', () => {
    ChartReport.style.display = 'flex';
    let Status = document.querySelector('.ChartReportForm select[name=Status_ChartREPORT]'); 
    let ChartType = document.querySelector('.ChartReportForm select[name=ChartType_ChartREPORT]');
    let StartDate = document.querySelector('.ChartReportForm input[name=StartDate_ChartREPORT]');
    let EndDate = document.querySelector('.ChartReportForm input[name=EndDate_ChartREPORT]');
    
    ChartReportGoButton.addEventListener('click', () => {
        if ((StartDate.value == '') || (EndDate.value == '')) {
            ErrorChartReport.textContent = 'Enter Start/End Date..';
        } else if ((StartDate.value > EndDate.value)) {
            ErrorAvailability.textContent =  'Value of Start Date is greater than Start Date.. Check!!';
        } else {
            ChartReportGoButton.textContent = 'Processing..';
            ChartReportGoButton.style.backgroundColor = '#1fb95e';
            window.location = '/Availability?ChartReportStatus=' + Status.value + '&ChartReportChartType=' + ChartType.value + '&StartDate_ChartREPORT=' + StartDate.value + '&EndDate_ChartREPORT=' + EndDate.value;
        }
    })

    ChartFilterCloseButton.addEventListener('click', () => {
        ChartReport.style.display = 'none';
    })
})
ChartReportCloseButton.addEventListener('click', () => { 
    ChartReportModal.style.display = 'none'; 
})
 
let DisplayChart5Button = document.querySelector('.DisplayChart5Button');

DisplayChart5Button.addEventListener('click', () => {
    ChartReportModal.style.display = 'flex'; 
})