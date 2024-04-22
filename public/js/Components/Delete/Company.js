let DeleteCompanyButtons = document.querySelectorAll('.DeleteCompanyButton');
let CompanyName = document.querySelector('.company-name');
let DeleteCompanyModal = document.querySelector('.DeleteCompany');
let DeleteCompanyX = document.querySelector('.DeleteCompanyX');
let CancelButtonDeleteCompanies = document.querySelectorAll('.cancel-button-delete-company');
 
DeleteCompanyButtons.forEach(DeleteCompanyButton => {
    DeleteCompanyButton.addEventListener('click', () => {
        DeleteCompanyModal.style.display = 'flex';
        CompanyName.textContent = DeleteCompanyButton.nextElementSibling.nextElementSibling.textContent;
        let CompanyId = DeleteCompanyButton.nextElementSibling.textContent;

        DeleteCompanyX.addEventListener('click', () => {
            DeleteCompanyX.textContent = '+ Deleting..';
            window.location = '/Delete/Company/' + CompanyId;
        })

        CancelButtonDeleteCompanies.forEach(CancelButtonDeleteCompany => {
            CancelButtonDeleteCompany.addEventListener('click', () => { 
                DeleteCompanyModal.style.display = 'none';
            })
        });
    });
});