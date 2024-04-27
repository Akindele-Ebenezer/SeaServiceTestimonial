let DeleteUserButtons = document.querySelectorAll('.DeleteUserButton');
let DeleteUserModal = document.querySelector('.DeleteUser');
let UserDelete = document.querySelector('.user-delete');
let DeleteUserButtonX = document.querySelector('.DeleteUserButtonX');
let CancelButtonDeleteUsers = document.querySelectorAll('.cancel-button-delete-user');
 
DeleteUserButtons.forEach(DeleteUserButton => {
    DeleteUserButton.addEventListener('click', () => {
        let ERROR_X_Wrapper = document.querySelector('.error-x-wrapper');
        let ERROR_X = document.querySelector('.error-x');
        if (DeleteUserButton.classList.contains("delete-user-privilege-denied")) {
            ERROR_X_Wrapper.style.display = 'flex';  
            ERROR_X.textContent = 'Access denied to delete a user.. contact an administrator!';
            setTimeout(() => {
                ERROR_X_Wrapper.style.display = 'none';  
            }, 3000);
        } else {
            DeleteUserModal.style.display = 'flex';
        }
        let UserId = DeleteUserButton.nextElementSibling.textContent;
        UserDelete.textContent = DeleteUserButton.nextElementSibling.nextElementSibling.textContent;

        DeleteUserButtonX.addEventListener('click', () => {
            DeleteUserButtonX.textContent = '+ Deleting..';
            window.location = '/Delete/User/' + UserId;
        })

        CancelButtonDeleteUsers.forEach(CancelButtonDeleteUser => {
            CancelButtonDeleteUser.addEventListener('click', () => { 
                DeleteUserModal.style.display = 'none';
            })
        });
    });
});