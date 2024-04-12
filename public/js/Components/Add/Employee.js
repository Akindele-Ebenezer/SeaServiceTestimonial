let AddEmployeeButton = document.querySelector('.AddEmployeeButton');
let AddEmployeeButtonX = document.querySelector('.AddEmployeeButtonX');
let AddEmployeeModal = document.querySelector('.AddEmployee');
let AddEmployeeForm = document.querySelector('.AddEmployeeForm');
let CancelButton = document.querySelector('.close-button');
 
AddEmployeeButton.addEventListener('click', () => {
    AddEmployeeModal.style.display = 'flex';

    AddEmployeeButtonX.addEventListener('click', () => {
        let ErrorEmployee = document.querySelector('.error-employee');
        let EmployeeNameInput = document.querySelector('input[name=FullName]');
        let StaffNumberInput = document.querySelector('input[name=StaffNumber]');
    
        if (EmployeeNameInput.value.trim() == '') { 
            ErrorEmployee.textContent =  'Employee\'s name field cannot be empty';
        } else if (StaffNumberInput.value.trim() == '') { 
            ErrorEmployee.textContent =  'Employee ID is required';
        } else { 
            AddEmployeeButtonX.style.backgroundColor = '#1fb95e';
            AddEmployeeButtonX.textContent = '+ Creating..';
            AddEmployeeForm.setAttribute('action', '/Add/Employee');
            AddEmployeeForm.submit();
        }
    })

    CancelButton.addEventListener('click', () => {
        AddEmployeeModal.style.display = 'none';
    })
});