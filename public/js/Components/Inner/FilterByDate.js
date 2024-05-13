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