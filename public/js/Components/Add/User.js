let AddUserButton = document.querySelector('.AddUserButton');
let AddUserForm = document.querySelector('.AddUserForm');
let AddUserButtonX = document.querySelector('.AddUserButtonX');
let AddUserModal = document.querySelector('.AddUser');
let CancelButton = document.querySelector('.close-button');
 
AddUserButton.addEventListener('click', () => {
    let ERROR_X_Wrapper = document.querySelector('.error-x-wrapper');
    let ERROR_X = document.querySelector('.error-x');
    if (AddUserButton.classList.contains("add-user-privilege-denied")) {
        ERROR_X_Wrapper.style.display = 'flex';  
        ERROR_X.textContent = 'Access denied to add a user.. contact an administrator!';
        setTimeout(() => {
            ERROR_X_Wrapper.style.display = 'none';  
        }, 3000);
    } else {
        AddUserModal.style.display = 'flex';
    }

    AddUserButtonX.addEventListener('click', () => {
        let ErrorUser = document.querySelector('.error-user');
        let UserNameInput = document.querySelector('input[name=FullName]');
        let EmailInput = document.querySelector('input[name=Email]');
        let PasswordInput = document.querySelector('input[name=Password]');
    
        if (UserNameInput.value.trim() == '') { 
            ErrorUser.textContent =  'Full-name is required';
        } else if (EmailInput.value.trim() == '') { 
            ErrorUser.textContent =  'Email field cannot be empty';
        } else if (PasswordInput.value.trim() == '') { 
            ErrorUser.textContent =  'Password is required';
        } else { 
            AddUserButtonX.style.backgroundColor = '#1fb95e';
            AddUserButtonX.textContent = '+ Processing..';
            AddUserForm.setAttribute('action', '/Add/User');
            AddUserForm.submit();
        }
    })

    CancelButton.addEventListener('click', () => {
        AddUserModal.style.display = 'none';
    })
});