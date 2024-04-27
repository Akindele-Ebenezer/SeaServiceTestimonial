let EditUserButtons = document.querySelectorAll('.EditUserButton');
let EditUserModal = document.querySelector('.EditUser');
let UpdateUserForm = document.querySelector('.UpdateUserForm');
let UpdateUserButton = document.querySelector('.UpdateUserButton');
let CancelButtonUpdate = document.querySelector('.close-button-update');
 
EditUserButtons.forEach(EditUserButton => {
    EditUserButton.addEventListener('click', () => {
        let ERROR_X_Wrapper = document.querySelector('.error-x-wrapper');
        let ERROR_X = document.querySelector('.error-x');
        if (EditUserButton.classList.contains("update-user-privilege-denied")) {
            ERROR_X_Wrapper.style.display = 'flex';  
            ERROR_X.textContent = 'Access denied to update a user.. contact an administrator!';
            setTimeout(() => {
                ERROR_X_Wrapper.style.display = 'none';  
            }, 3000);
        } else {
            EditUserModal.style.display = 'flex';
        }

        let UserId = EditUserButton.nextElementSibling.textContent;
        let EditFullName = document.querySelector('.UpdateUserForm input[name=FullName]');
        let EditEmail = document.querySelector('.UpdateUserForm input[name=Email]');
        let EditPassword = document.querySelector('.UpdateUserForm input[name=Password]');
        let EditDepartment = document.querySelector('.UpdateUserForm input[name=Department]');
        let EditPosition = document.querySelector('.UpdateUserForm input[name=Position]');
        let EditRole = document.querySelector('.UpdateUserForm select[name=Role]');
         
        EditFullName.value = EditUserButton.nextElementSibling.nextElementSibling.textContent;
        EditEmail.value = EditUserButton.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        EditPassword.value = EditUserButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        EditDepartment.value = EditUserButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        EditPosition.value = EditUserButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        EditRole.value = EditUserButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;

        UpdateUserButton.addEventListener('click', () => {
            UpdateUserButton.style.backgroundColor = '#1fb95e';
            UpdateUserButton.textContent = '+ Updating..';
            UpdateUserForm.setAttribute('action', '/Edit/User/' + UserId);
            UpdateUserForm.submit();
        })
    
        CancelButtonUpdate.addEventListener('click', () => {
            EditUserModal.style.display = 'none';
        })
    });
});