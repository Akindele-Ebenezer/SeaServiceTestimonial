let DeleteEmployeeButtons = document.querySelectorAll('.DeleteEmployeeButton');
let EmployeeName = document.querySelector('.employee-name');
let DeleteEmployeeModal = document.querySelector('.DeleteEmployee');
let DeleteEmployeeX = document.querySelector('.DeleteEmployeeX');
let CancelButtonDeleteEmployees = document.querySelectorAll('.cancel-button-delete-employee');
 
DeleteEmployeeButtons.forEach(DeleteEmployeeButton => {
    DeleteEmployeeButton.addEventListener('click', () => {
        DeleteEmployeeModal.style.display = 'flex';
        EmployeeName.textContent = DeleteEmployeeButton.nextElementSibling.textContent;
        let EmployeeId = DeleteEmployeeButton.nextElementSibling.nextElementSibling.textContent;

        DeleteEmployeeX.addEventListener('click', () => {
            DeleteEmployeeX.textContent = '+ Deleting..';
            window.location = '/Delete/Employee/' + EmployeeId;
        })

        CancelButtonDeleteEmployees.forEach(CancelButtonDeleteEmployee => {
            CancelButtonDeleteEmployee.addEventListener('click', () => { 
                DeleteEmployeeModal.style.display = 'none';
            })
        });
    });
});