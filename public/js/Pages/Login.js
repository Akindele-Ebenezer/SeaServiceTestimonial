let LoginButtonX = document.querySelector('.LoginButton');
let LoginForm = document.querySelector('.LoginForm');
let ErrorLogin = document.querySelector('.error-login');
let EmailInput = document.querySelector('input[name=Email]');
let PasswordInput = document.querySelector('input[name=Password]');

LoginButtonX.addEventListener('click', () => {
    if (EmailInput.value.trim() == '') { 
        ErrorLogin.style.display = 'block';
        ErrorLogin.textContent =  'Kindly enter your email';
    } else if (PasswordInput.value.trim() == '') { 
        ErrorLogin.style.display = 'block';
        ErrorLogin.textContent =  'Password is required';
    } else { 
        ErrorLogin.style.display = 'block';
        ErrorLogin.textContent =  'User Confirmation..';
        ErrorLogin.style.backgroundColor = '#62bd62';
        LoginButtonX.style.backgroundColor = '#ff3838';
        LoginButtonX.textContent = 'Verifying..';
        LoginForm.setAttribute('action', '/Auth');
        LoginForm.submit();
    }
})