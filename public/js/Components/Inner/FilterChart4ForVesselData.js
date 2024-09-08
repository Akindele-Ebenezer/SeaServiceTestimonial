let OpenChart4Filter = document.querySelector('.OpenChart4Filter');
let CancelButtonFilterChart4ForVesselData = document.querySelector('.cancel-button-filter-chart-4-for-vessel-data');
let FilterChart4ForVesselDataByDateModal = document.querySelector('.FilterChart4ForVesselData');
let FilterChart4ForVesselData_GoButton = document.querySelector('.FilterChart4ForVesselData_GoButton');
let VesselName_CHART4 = document.querySelector('select[name=VesselName_CHART4]');
let Month_CHART4 = document.querySelector('select[name=Month_CHART4]');
let Year_CHART4 = document.querySelector('select[name=Year_CHART4]');
let __StartDate__ = document.querySelector('input[name=__StartDate__]');
let __EndDate__ = document.querySelector('input[name=__EndDate__]');
  
OpenChart4Filter.addEventListener('click', () => {
    VesselName_CHART4.value = OpenChart4Filter.nextElementSibling.textContent;
    Month_CHART4.value = new Date().getMonth() + 1;
    Year_CHART4.value = new Date().getFullYear();
    FilterChart4ForVesselDataByDateModal.style.display = 'flex';
})

CancelButtonFilterChart4ForVesselData.addEventListener('click', () => { 
    FilterChart4ForVesselDataByDateModal.style.display = 'none';
})
  
FilterChart4ForVesselData_GoButton.addEventListener('click', () => { 
        FilterChart4ForVesselData_GoButton.style.backgroundColor = '#1fb95e';
        FilterChart4ForVesselData_GoButton.textContent = '+ Processing..';
        window.location = '/Availability?Chart4=true&Vessel=' + VesselName_CHART4.value + '&FilterValue=&Month=' + Month_CHART4.value + '&Year=' + Year_CHART4.value + '&Status=' + OpenChart4Filter.nextElementSibling.nextElementSibling.textContent + '&StartDate=' + __StartDate__.value + '&EndDate=' + __EndDate__.value;
});
