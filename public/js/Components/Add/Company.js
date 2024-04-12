let AddCompanyButton = document.querySelector('.AddCompanyButton');
let AddCompanyButtonX = document.querySelector('.AddCompanyButtonX');
let AddCompanyModal = document.querySelector('.AddCompany');
let AddCompanyForm = document.querySelector('.AddCompanyForm');
let CancelButtonCompany = document.querySelector('.close-button-company');
 
AddCompanyButton.addEventListener('click', () => {
    AddCompanyModal.style.display = 'flex';

    AddCompanyButtonX.addEventListener('click', () => {
        let ErrorCompany = document.querySelector('.error-company');
        let CompanyInput = document.querySelector('input[name=Company]');
    
        if (CompanyInput.value.trim() == '') { 
            ErrorCompany.textContent =  'Company name is required';
        } else { 
            AddCompanyButtonX.style.backgroundColor = '#1fb95e';
            AddCompanyButtonX.textContent = '+ Creating..';
            AddCompanyForm.setAttribute('action', '/Add/Company');
            AddCompanyForm.submit();
        }
    })

    CancelButtonCompany.addEventListener('click', () => {
        AddCompanyModal.style.display = 'none';
    })
});