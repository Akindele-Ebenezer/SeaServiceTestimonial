let EditEmployeeButtons = document.querySelectorAll('.EditEmployeeButton');
let EditEmployeeModal = document.querySelector('.EditEmployee');
let CancelButtonUpdate = document.querySelector('.close-button-update');
 
EditEmployeeButtons.forEach(EditEmployeeButton => {
    EditEmployeeButton.addEventListener('click', () => {
        EditEmployeeModal.style.display = 'flex';
    
        CancelButtonUpdate.addEventListener('click', () => {
            EditEmployeeModal.style.display = 'none';
        })
    });
});