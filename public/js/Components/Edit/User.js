let EditUserButtons = document.querySelectorAll('.EditUserButton');
let EditUserModal = document.querySelector('.EditUser');
let CancelButtonUpdate = document.querySelector('.close-button-update');
 
EditUserButtons.forEach(EditUserButton => {
    EditUserButton.addEventListener('click', () => {
        EditUserModal.style.display = 'flex';
    
        CancelButtonUpdate.addEventListener('click', () => {
            EditUserModal.style.display = 'none';
        })
    });
});