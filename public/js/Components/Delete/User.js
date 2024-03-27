let DeleteUserButtons = document.querySelectorAll('.DeleteUserButton');
let DeleteUserModal = document.querySelector('.DeleteUser');
let UserDelete = document.querySelector('.user-delete');
let DeleteUserButtonX = document.querySelector('.DeleteUserButtonX');
let CancelButtonDeleteUsers = document.querySelectorAll('.cancel-button-delete-user');
 
DeleteUserButtons.forEach(DeleteUserButton => {
    DeleteUserButton.addEventListener('click', () => {
        DeleteUserModal.style.display = 'flex';
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