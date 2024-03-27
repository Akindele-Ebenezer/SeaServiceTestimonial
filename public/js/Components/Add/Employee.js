let AddEmployeeButton = document.querySelector('.AddEmployeeButton');
let AddEmployeeButtonX = document.querySelector('.AddEmployeeButtonX');
let AddEmployeeModal = document.querySelector('.AddEmployee');
let AddEmployeeForm = document.querySelector('.AddEmployeeForm');
let CancelButton = document.querySelector('.close-button');
 
AddEmployeeButton.addEventListener('click', () => {
    AddEmployeeModal.style.display = 'flex';

    AddEmployeeButtonX.addEventListener('click', () => {
        AddEmployeeButtonX.style.backgroundColor = '#1fb95e';
        AddEmployeeButtonX.textContent = '+ Creating..';
        AddEmployeeForm.setAttribute('action', '/Add/Employee');
        AddEmployeeForm.submit();
    })

    CancelButton.addEventListener('click', () => {
        AddEmployeeModal.style.display = 'none';
    })
});