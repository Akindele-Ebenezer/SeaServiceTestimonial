let OpenChartFilterButton = document.querySelector('.OpenChartFilterButton');
let ChartFilterCloseButton = document.querySelector('.ChartReport .cancel-button-chart-report');
let ChartReportCloseButton = document.querySelector('.chart-3 .Close');
let ChartReportModal = document.querySelector('.chart-3');
let ChartReport = document.querySelector('.ChartReport');

OpenChartFilterButton.addEventListener('click', () => {
    ChartReport.style.display = 'flex';

    ChartFilterCloseButton.addEventListener('click', () => {
        ChartReport.style.display = 'none';
    })
})
ChartReportCloseButton.addEventListener('click', () => { 
    ChartReportModal.style.display = 'none'; 
})
 