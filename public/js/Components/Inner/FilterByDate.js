let FilterByDateButton = document.querySelector('.FilterByDateButton');
let FilterByDateModal = document.querySelector('.FilterByDate');
let CancelButtonFilterByDate = document.querySelectorAll('.cancel-button-filter-by-date');

FilterByDateButton.addEventListener('click', () => {
    FilterByDateModal.style.display = 'flex';
})

CancelButtonFilterByDate.forEach(CancelButtonFilterByDate => {
    CancelButtonFilterByDate.addEventListener('click', () => { 
        FilterByDateModal.style.display = 'none';
    })
});

let FilterByDate_GoButton = document.querySelector('.FilterByDate_GoButton');
let FilterByDateForm = document.querySelector('.FilterByDateForm');
let ErrorFilterByDate = document.querySelector('.error-filter-by-date');
let FromDate = document.querySelector('input[name=FromDate_FILTERBYDATE]');
let EndDate = document.querySelector('input[name=EndDate_FILTERBYDATE]');
let SpecificDay = document.querySelector('input[name=SpecificDay]');

FilterByDate_GoButton.addEventListener('click', () => {
    if (SpecificDay.value) {  
        FilterByDate_GoButton.style.backgroundColor = '#1fb95e';
        FilterByDate_GoButton.textContent = '+ Processing..';
        FilterByDateForm.submit();
    } else if (FromDate.value == '') { 
        ErrorFilterByDate.textContent =  'From Date can\'t be empty';
    } else if (EndDate.value == '') {  
        ErrorFilterByDate.textContent =  'End Date is required';
    } else if (FromDate.value > EndDate.value) {  
        ErrorFilterByDate.textContent =  'From Date cannot be greater than End date';
    } else { 
        FilterByDate_GoButton.style.backgroundColor = '#1fb95e';
        FilterByDate_GoButton.textContent = '+ Processing..';
        FilterByDateForm.submit();
    }
})