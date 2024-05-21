let CreateAvailabilityButton = document.querySelector('.RecordAvailabilityButton');
let AddAvailabilityModal = document.querySelector('.AddAvailability');
let CancelButton_Availability = document.querySelector('.cancel-button-availability');
let NoDataSelectedModal_Availability = document.querySelector('.no-data-selected.moc');
let ContentData_Availability = document.querySelector('.content-data');
if (window.location.pathname === '/Availability') { 
    let AddAvailabilityWrapper = document.querySelector('.add-availabilty-wrapper');
    if (CreateAvailabilityButton !== null) {
        CreateAvailabilityButton.addEventListener('click', () => { 
            AddAvailabilityModal.style.display = 'flex';  
            ContentData_Availability.style.backgroundColor = '#225f7d'; 
        
            CancelButton_Availability.addEventListener('click', () => {
                AddAvailabilityModal.style.display = 'none';
                NoDataSelectedModal_Availability.style.display = 'flex';
            NoDataSelectedModal_HR.style.display = 'flex'; 
            AddAvailabilityWrapper.style.height = 'unset'; 
            }) 
        }); 
    }
}
 
if (CreateAvailabilityButton !== null) {
    CreateAvailabilityButton.addEventListener('click', () => { 
        AddAvailabilityWrapper.style.height = '100%';
        AddAvailabilityWrapper.style.display = 'flex'; 
        AddAvailabilityModal.style.display = 'flex';  
        NoDataSelectedModal_Availability.style.display = 'none'; 
        NoDataSelectedModal_HR.style.display = 'none';  
        ContentData_Availability.style.backgroundColor = '#225f7d'; 
    
        CancelButton_Availability.addEventListener('click', () => {
            AddAvailabilityModal.style.display = 'none';
            NoDataSelectedModal_Availability.style.display = 'flex';
            NoDataSelectedModal_HR.style.display = 'flex'; 
            AddAvailabilityWrapper.style.height = 'unset'; 
        }) 
    }); 
}

let AddAvailabilityButton = document.querySelector('.AddAvailabilityButton');
let AddAvailabilityForm = document.querySelector('.AddAvailabilityForm');

if (AddAvailabilityButton !== null) {
    AddAvailabilityButton.addEventListener('click', () => {
        let ErrorAvailability = document.querySelector('.error-availability');
        let VesselInput = document.querySelector('input[name=Vessel]');
        let StatusInput = document.querySelector('select[name=Status]');
        let DoneByInput = document.querySelector('input[name=DoneBy]');
        let AttachmentInput = document.querySelector('input[name=Attachment]');
        let StartTimeInput = document.querySelector('input[name=StartTime]');
        let EndTimeInput = document.querySelector('input[name=EndTime]');
        let StartDateInput = document.querySelector('input[name=StartDate]');
        let EndDateInput = document.querySelector('input[name=EndDate]');

        ErrorAvailability.style.backgroundColor =  'rgb(106, 97, 233)';
        ErrorAvailability.style.color =  '#fff';
        ErrorAvailability.style.padding =  '1em';
        ErrorAvailability.textContent = 'Creating availability..';
        AddAvailabilityButton.style.backgroundColor = '#1fb95e';
        AddAvailabilityButton.textContent = '+ Processing..';
        AddAvailabilityForm.setAttribute('method', 'POST');
        AddAvailabilityForm.setAttribute('action', '/Add/Availability');
        AddAvailabilityForm.submit();
        // if (VesselInput.value.trim() == '') { 
        //     ErrorAvailability.textContent =  'Vessel field cannot be empty';
        // } else if (StatusInput.value.trim() == '') { 
        //     ErrorAvailability.textContent =  'Status is required';
        // } else if (DoneByInput.value.trim() == '') { 
        //     ErrorAvailability.textContent =  'Done by field is required';
        // } else if (AttachmentInput.value.trim() == '') { 
        //     ErrorAvailability.textContent =  'Attachment is required';
        // }else if (
        //     StartTimeInput.value == '' || 
        //     EndTimeInput.value == '' 
        // ) { 
        //     ErrorAvailability.textContent =  'Start time cannot be empty';
        // } else if (StartDateInput.value > EndDateInput.value) { 
        //     ErrorAvailability.textContent =  'Start date cannot be greater than End date';
        // } else if (
        //     StartDateInput.value == '' || 
        //     EndDateInput.value == '' 
        // ) { 
        //     ErrorAvailability.textContent =  'Start date cannot be empty';
        // } else { 
        //     ErrorAvailability.style.backgroundColor =  'rgb(106, 97, 233)';
        //     ErrorAvailability.style.color =  '#fff';
        //     ErrorAvailability.style.padding =  '1em';
        //     ErrorAvailability.textContent = 'Creating availability..';
        //     AddAvailabilityButton.style.backgroundColor = '#1fb95e';
        //     AddAvailabilityButton.textContent = '+ Processing..';
        //     AddAvailabilityForm.setAttribute('method', 'POST');
        //     AddAvailabilityForm.setAttribute('action', '/Add/Availability');
        //     AddAvailabilityForm.submit();
        // }
    })
}   