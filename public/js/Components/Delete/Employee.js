let DeleteEmployeeButtons = document.querySelectorAll('.DeleteEmployeeButton');
let DeleteEmployeeModal = document.querySelector('.DeleteEmployee');
let CancelButtonDeleteEmployees = document.querySelectorAll('.cancel-button-delete-employee');
 
DeleteEmployeeButtons.forEach(DeleteEmployeeButton => {
    DeleteEmployeeButton.addEventListener('click', () => {
        DeleteEmployeeModal.style.display = 'flex';
    
        CancelButtonDeleteEmployees.forEach(CancelButtonDeleteEmployee => {
            CancelButtonDeleteEmployee.addEventListener('click', () => { 
                DeleteEmployeeModal.style.display = 'none';
            })
        });
    });
});