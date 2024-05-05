let CreateAvailabilityButton = document.querySelector('.RecordAvailabilityButton');
let AddAvailabilityModal = document.querySelector('.AddAvailability');
let CancelButton_Availability = document.querySelector('.cancel-button-availability');
let NoDataSelectedModal_Availability = document.querySelector('.no-data-selected.moc');
let ContentData_Availability = document.querySelector('.content-data');
// let AddAvailabilityWrapper = document.querySelector('.add-availabilty-wrapper');
 
if (CreateAvailabilityButton !== null) {
    CreateAvailabilityButton.addEventListener('click', () => {
        AddAvailabilityWrapper.style.height = '100%';
        AddAvailabilityWrapper.style.display = 'flex';
        AddAvailabilityModal.style.display = 'flex'; 
        NoDataSelectedModal_Availability.style.display = 'none'; 
        ContentData_Availability.style.backgroundColor = '#225f7d'; 
    
        CancelButton_Availability.addEventListener('click', () => {
            AddAvailabilityModal.style.display = 'none';
            NoDataSelectedModal_Availability.style.display = 'flex';
            AddAvailabilityWrapper.style.height = 'unset'; 
        }) 
    }); 
}

let AddAvailabilityButton = document.querySelector('.AddAvailabilityButton');
let AddAvailabilityForm = document.querySelector('.AddAvailabilityForm');

if (AddAvailabilityButton !== null) {
    AddAvailabilityButton.addEventListener('click', () => {
        let ErrorAvailability = document.querySelector('.error-availability');
        let EmployeeInput = document.querySelector('input[name=Employee]');
        let StaffNumberInput = document.querySelector('input[name=StaffNumber]');
        let StartDate_1Input = document.querySelector('input[name=StartDate_1]');
        let StartDate_2Input = document.querySelector('input[name=StartDate_2]');
        let StartDate_3Input = document.querySelector('input[name=StartDate_3]');
        let StartDate_4Input = document.querySelector('input[name=StartDate_4]');
        let StartDate_5Input = document.querySelector('input[name=StartDate_5]');
        let EndDate_1Input = document.querySelector('input[name=EndDate_1]');
        let EndDate_2Input = document.querySelector('input[name=EndDate_2]');
        let EndDate_3Input = document.querySelector('input[name=EndDate_3]');
        let EndDate_4Input = document.querySelector('input[name=EndDate_4]');
        let EndDate_5Input = document.querySelector('input[name=EndDate_5]');

        if (EmployeeInput.value.trim() == '') { 
            ErrorAvailability.textContent =  'Employee field cannot be empty';
        } else if (StaffNumberInput.value.trim() == '') { 
            ErrorAvailability.textContent =  'Employee ID is required';
        } else if (StartDate_1Input.value > EndDate_1Input.value) { 
            ErrorAvailability.textContent =  'Start date cannot be greater than End date on row 1';
        } else if (StartDate_2Input.value > EndDate_2Input.value) { 
            ErrorAvailability.textContent =  'Start date cannot be greater than End date on row 2';
        } else if (StartDate_3Input.value > EndDate_3Input.value) { 
            ErrorAvailability.textContent =  'Start date cannot be greater than End date on row 3';
        } else if (StartDate_4Input.value > EndDate_4Input.value) { 
            ErrorAvailability.textContent =  'Start date cannot be greater than End date on row 4';
        } else if (StartDate_5Input.value > EndDate_5Input.value) { 
            ErrorAvailability.textContent =  'Start date cannot be greater than End date on row 5';
        } else if (
            StartDate_1Input.value == '' || 
            EndDate_1Input.value == '' 
        ) { 
            ErrorAvailability.textContent =  'Date field cannot be empty';
        } else { 
            ErrorAvailability.style.backgroundColor =  'rgb(106, 97, 233)';
            ErrorAvailability.style.color =  '#fff';
            ErrorAvailability.style.padding =  '1em';
            ErrorAvailability.textContent = 'Creating availability..';
            AddAvailabilityButton.style.backgroundColor = '#1fb95e';
            AddAvailabilityButton.textContent = '+ Processing..';
            AddAvailabilityForm.submit();
        }
    })
}   