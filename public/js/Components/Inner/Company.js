let ShowCompanyButton = document.querySelector('.ShowCompanies');
let Companies = document.querySelector('.companies');
let CompanyLists = document.querySelectorAll('.company-list');
let CloseButtonCompanies = document.querySelector('.close-button-companies');

ShowCompanyButton.addEventListener('click', () => {
    Companies.style.display = 'flex';

    CloseButtonCompanies.addEventListener('click', () => {
        Companies.style.display = 'none';
    })
})

CompanyLists.forEach(List => {
    List.addEventListener('mouseover', () => {
        List.firstElementChild.firstElementChild.nextElementSibling.nextElementSibling.style.display = 'block';
    })
    List.addEventListener('mouseleave', () => {
        List.firstElementChild.firstElementChild.nextElementSibling.nextElementSibling.style.display = 'none';
    })
});