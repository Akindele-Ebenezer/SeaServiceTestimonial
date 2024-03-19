let DeleteUserButtons = document.querySelectorAll('.DeleteUserButton');
let DeleteUserModal = document.querySelector('.DeleteUser');
let CancelButtonDeleteUsers = document.querySelectorAll('.cancel-button-delete-user');
 
DeleteUserButtons.forEach(DeleteUserButton => {
    DeleteUserButton.addEventListener('click', () => {
        DeleteUserModal.style.display = 'flex';
    
        CancelButtonDeleteUsers.forEach(CancelButtonDeleteUser => {
            CancelButtonDeleteUser.addEventListener('click', () => { 
                DeleteUserModal.style.display = 'none';
            })
        });
    });
});