let EditCompanyButtons = document.querySelectorAll('.EditCompanyButton');
let UpdateCompanyButton = document.querySelector('.UpdateCompanyButton');
let UpdateCompanyForm = document.querySelector('.UpdateCompanyForm');
let EditCompanyModal = document.querySelector('.EditCompany');
let CancelButtonUpdateCompany = document.querySelector('.close-button-update-company');
 
EditCompanyButtons.forEach(EditCompanyButton => {
    EditCompanyButton.addEventListener('click', () => {
        EditCompanyModal.style.display = 'flex';
        let CompanyId = EditCompanyButton.nextElementSibling.nextElementSibling.textContent; 
        document.querySelector('.UpdateCompanyForm input[name=Position]').value = EditCompanyButton.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
 
        UpdateCompanyButton.addEventListener('click', () => {
            UpdateCompanyButton.style.backgroundColor = '#1fb95e';
            UpdateCompanyButton.textContent = '+ Processing..';
            UpdateCompanyForm.setAttribute('action', '/Edit/Company/' + CompanyId)
            UpdateCompanyForm.submit();
        })

        CancelButtonUpdateCompany.addEventListener('click', () => {
            EditCompanyModal.style.display = 'none';
        })
    });
});