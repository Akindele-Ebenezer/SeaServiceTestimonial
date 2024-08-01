let OpenChartFilterButton = document.querySelector('.OpenChartFilterButton');
let ChartFilterCloseButton = document.querySelector('.ChartReport .cancel-button-chart-report');
let ChartReportCloseButton = document.querySelector('.chart-3 .Close');
let ChartReportGoButton = document.querySelector('.ChartReport .ChartREPORT_GoButton');
let ChartReportModal = document.querySelector('.chart-3');
let ChartReport = document.querySelector('.ChartReport');

OpenChartFilterButton.addEventListener('click', () => {
    ChartReport.style.display = 'flex';
    let Status = document.querySelector('.ChartReportForm select[name=Status_ChartREPORT]');
    let Year = document.querySelector('.ChartReportForm select[name=Year_ChartREPORT]');
    let Period = document.querySelector('.ChartReportForm select[name=Period_ChartREPORT]');
    let Month = document.querySelector('.ChartReportForm select[name=Month_ChartREPORT]');
    let ChartType = document.querySelector('.ChartReportForm select[name=ChartType_ChartREPORT]');
    
    ChartReportGoButton.addEventListener('click', () => {
        ChartReportGoButton.textContent = 'Processing..';
        ChartReportGoButton.style.backgroundColor = '#1fb95e';
        window.location = '/Availability?ChartReportStatus=' + Status.value + '&ChartReportYear=' + Year.value + '&ChartReportPeriod=' + Period.value + '&ChartReportMonth=' + Month.value + '&ChartReportChartType=' + ChartType.value;
    })

    ChartFilterCloseButton.addEventListener('click', () => {
        ChartReport.style.display = 'none';
    })
})
ChartReportCloseButton.addEventListener('click', () => { 
    ChartReportModal.style.display = 'none'; 
})
 