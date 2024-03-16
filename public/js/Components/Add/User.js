let AddUserButton = document.querySelector('.AddUserButton');
let AddUserModal = document.querySelector('.AddUser');
let CancelButton = document.querySelector('.close-button');
 
AddUserButton.addEventListener('click', () => {
    AddUserModal.style.display = 'flex';

    CancelButton.addEventListener('click', () => {
        AddUserModal.style.display = 'none';
    })
});