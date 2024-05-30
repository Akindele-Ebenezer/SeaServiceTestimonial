let Loader2 = document.querySelector('.loader-2');
let Loader2X = document.querySelector('.loader-2 .x');
let LoaderPercentage = document.querySelector('.loader-2 p');
let Login = document.querySelector('.Login');
setTimeout(() => {
    Loader2.style.display = 'none';
    Login.style.display = 'flex'; 
}, 5500);
setTimeout(() => {
    Loader2X.style.scale = 1; 
    LoaderPercentage.textContent = '100%';
}, 4500);
setTimeout(() => {
    Loader2X.style.scale = .9; 
    LoaderPercentage.textContent = '99%';
}, 4000);
setTimeout(() => {
    Loader2X.style.scale = .7; 
    LoaderPercentage.textContent = '95%';
}, 3000);
setTimeout(() => {
    Loader2X.style.scale = .7; 
    LoaderPercentage.textContent = '90%';
}, 2500);
setTimeout(() => {
    Loader2X.style.scale = .7; 
    LoaderPercentage.textContent = '84%';
}, 2000);
setTimeout(() => {
    Loader2X.style.scale = .7; 
    LoaderPercentage.textContent = '70%';
}, 1500);
setTimeout(() => {
    Loader2X.style.scale = .5; 
    LoaderPercentage.textContent = '63%';
}, 1200);
setTimeout(() => {
    Loader2X.style.scale = .5; 
    LoaderPercentage.textContent = '45%';
}, 1000);
setTimeout(() => {
    Loader2X.style.scale = .2; 
    LoaderPercentage.textContent = '20%';
}, 500);
setTimeout(() => {
    Loader2X.style.scale = .2; 
    LoaderPercentage.textContent = '0%';
}, 0);

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

