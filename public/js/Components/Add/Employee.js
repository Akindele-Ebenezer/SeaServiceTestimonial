let AddEmployeeButton = document.querySelector('.AddEmployeeButton');
let AddEmployeeModal = document.querySelector('.AddEmployee');
let CancelButton = document.querySelector('.close-button');
 
AddEmployeeButton.addEventListener('click', () => {
    AddEmployeeModal.style.display = 'flex';

    CancelButton.addEventListener('click', () => {
        AddEmployeeModal.style.display = 'none';
    })
});