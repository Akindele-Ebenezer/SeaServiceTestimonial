let AddUserButton = document.querySelector('.AddUserButton');
let AddUserForm = document.querySelector('.AddUserForm');
let AddUserButtonX = document.querySelector('.AddUserButtonX');
let AddUserModal = document.querySelector('.AddUser');
let CancelButton = document.querySelector('.close-button');
 
AddUserButton.addEventListener('click', () => {
    AddUserModal.style.display = 'flex';

    AddUserButtonX.addEventListener('click', () => {
        AddUserButtonX.style.backgroundColor = '#1fb95e';
        AddUserButtonX.textContent = '+ Processing..';
        AddUserForm.setAttribute('action', '/Add/User');
        AddUserForm.submit();
    })

    CancelButton.addEventListener('click', () => {
        AddUserModal.style.display = 'none';
    })
});