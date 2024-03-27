let EditEmployeeButtons = document.querySelectorAll('.EditEmployeeButton');
let UpdateEmployeeButton = document.querySelector('.UpdateEmployeeButton');
let UpdateEmployeeForm = document.querySelector('.UpdateEmployeeForm');
let EditEmployeeModal = document.querySelector('.EditEmployee');
let CancelButtonUpdate = document.querySelector('.close-button-update');
 
EditEmployeeButtons.forEach(EditEmployeeButton => {
    EditEmployeeButton.addEventListener('click', () => {
        EditEmployeeModal.style.display = 'flex';
        let EmployeeId = document.querySelector('.UpdateEmployeeForm input[name=EditStaffNumber]'); 

        EmployeeId.value = EditEmployeeButton.nextElementSibling.textContent;
        document.querySelector('.UpdateEmployeeForm input[name=EditFullName]').value = EditEmployeeButton.nextElementSibling.nextElementSibling.textContent;
        document.querySelector('.UpdateEmployeeForm input[name=EditDateOfBirth]').value = EditEmployeeButton.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        document.querySelector('.UpdateEmployeeForm input[name=EditDischargeBook]').value = EditEmployeeButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        document.querySelector('.UpdateEmployeeForm select[name=EditLocation]').value = EditEmployeeButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        document.querySelector('.UpdateEmployeeForm select[name=EditRank]').value = EditEmployeeButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        document.querySelector('.UpdateEmployeeForm select[name=EditCompany]').value = EditEmployeeButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;

        UpdateEmployeeButton.addEventListener('click', () => {
            UpdateEmployeeButton.style.backgroundColor = '#1fb95e';
            UpdateEmployeeButton.textContent = '+ Processing..';
            UpdateEmployeeForm.setAttribute('action', '/Edit/Employee/' + EmployeeId.value)
            UpdateEmployeeForm.submit();
        })

        CancelButtonUpdate.addEventListener('click', () => {
            EditEmployeeModal.style.display = 'none';
        })
    });
});