let OpenChartFilterButton = document.querySelector('.OpenChartFilterButton');
let ChartFilterCloseButton = document.querySelector('.ChartReport .cancel-button-chart-report');
let ChartReportCloseButton = document.querySelector('.chart-3 .Close');
let ChartReportGoButton = document.querySelector('.ChartReport .ChartREPORT_GoButton');
let ChartReportModal = document.querySelector('.chart-3');
let ChartReport = document.querySelector('.ChartReport');

OpenChartFilterButton.addEventListener('click', () => {
    ChartReport.style.display = 'flex';
    let Status = document.querySelector('.ChartReportForm select[name=Status_ChartREPORT]'); 
    let ChartType = document.querySelector('.ChartReportForm select[name=ChartType_ChartREPORT]');
    let StartDate = document.querySelector('.ChartReportForm input[name=StartDate_ChartREPORT]');
    let EndDate = document.querySelector('.ChartReportForm input[name=EndDate_ChartREPORT]');
    
    ChartReportGoButton.addEventListener('click', () => {
        ChartReportGoButton.textContent = 'Processing..';
        ChartReportGoButton.style.backgroundColor = '#1fb95e';
        window.location = '/Availability?ChartReportStatus=' + Status.value + '&ChartReportChartType=' + ChartType.value + '&StartDate_ChartREPORT=' + StartDate.value + '&EndDate_ChartREPORT=' + EndDate.value;
    })

    ChartFilterCloseButton.addEventListener('click', () => {
        ChartReport.style.display = 'none';
    })
})
ChartReportCloseButton.addEventListener('click', () => { 
    // ChartReportModal.style.display = 'none'; 
    ChartReportModal.style.visibility = 'hidden'; 
})
 
let DisplayChart3Button = document.querySelector('.DisplayChart3Button');

DisplayChart3Button.addEventListener('click', () => {
    ChartReportModal.style.visibility = 'visible'; 
})