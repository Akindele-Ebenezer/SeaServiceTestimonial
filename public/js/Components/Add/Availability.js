let CreateAvailabilityButton = document.querySelector('.RecordAvailabilityButton');
let AddAvailabilityModal = document.querySelector('.AddAvailability');
let CancelButton_Availability = document.querySelector('.cancel-button-availability');
let NoDataSelectedModal_Availability = document.querySelector('.no-data-selected.moc');
let ContentData_Availability = document.querySelector('.content-data');
if (window.location.pathname === '/Availability' || window.location.pathname === '/Vessels') { 
    let AddAvailabilityWrapper = document.querySelector('.add-availabilty-wrapper');
    if (CreateAvailabilityButton !== null) {
        CreateAvailabilityButton.addEventListener('click', () => { 
            AddAvailabilityModal.style.display = 'flex';  
            // ContentData_Availability.style.background = 'linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab)'; 
        
            let StartTimeInput = document.querySelector('input[name=StartTime]');
            let EndTimeInput = document.querySelector('input[name=EndTime]');
            StartTimeInput.addEventListener('keyup', () => {
                if (!isNaN(parseFloat(StartTimeInput.value))) {
                    if (StartTimeInput.value.length == 2) { 
                        StartTimeInput.value += ':';  
                        if (StartTimeInput.value.substring(0, 2) > 23) { 
                            StartTimeInput.value = '';  
                        }
                    } 
                    if (StartTimeInput.value.length == 5) { 
                        if (StartTimeInput.value.substring(3, 5) > 59) { 
                            StartTimeInput.value = '';  
                        } else {
                            StartTimeInput.value += ' HRS';   
                        }
                    }
                } else {
                    StartTimeInput.value = '';   
                }
            });
            EndTimeInput.addEventListener('keyup', () => {
                if (!isNaN(parseFloat(EndTimeInput.value))) {
                    if (EndTimeInput.value.length == 2) { 
                        EndTimeInput.value += ':';
                        if (EndTimeInput.value.substring(0, 2) > 23) {
                            EndTimeInput.value = '';  
                        }  
                    } 
                    if (EndTimeInput.value.length == 5) { 
                        if (EndTimeInput.value.substring(3, 5) > 59) { 
                            EndTimeInput.value = '';  
                        } else {
                            EndTimeInput.value += ' HRS';
                        }
                    }
                } else {
                    EndTimeInput.value = '';  
                }
            });

            CancelButton_Availability.addEventListener('click', () => {
                AddAvailabilityModal.style.display = 'none';
                NoDataSelectedModal_Availability.style.display = 'flex';
                if (NoDataSelectedModal_HR !== null) {
                    NoDataSelectedModal_HR.style.display = 'flex'; 
                }
                if (window.location.pathname === '/Availability' || window.location.pathname === '/Vessels') { 
                    AddAvailabilityWrapper.style.height = 'unset'; 
                }
            }) 
        }); 
    }
}
 
if (CreateAvailabilityButton !== null) {
    CreateAvailabilityButton.addEventListener('click', () => { 
        if (window.location.pathname === '/Availability' || window.location.pathname === '/Vessels') { 
            AddAvailabilityWrapper.style.height = '100%';
            AddAvailabilityWrapper.style.display = 'flex'; 
        }
        AddAvailabilityModal.style.display = 'flex';  
        if (window.location.pathname === '/Availability' || window.location.pathname === '/Vessels') { 
            NoDataSelectedModal_Availability.style.display = 'none'; 
            ContentData_Availability.style.background = 'linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab)'; 
        }
        if (NoDataSelectedModal_HR !== null) {
            NoDataSelectedModal_HR.style.display = 'none';  
        }
        
        CancelButton_Availability.addEventListener('click', () => {
            AddAvailabilityModal.style.display = 'none';
            if (window.location.pathname === '/Availability' || window.location.pathname === '/Vessels') { 
                NoDataSelectedModal_Availability.style.display = 'flex';
                AddAvailabilityWrapper.style.height = 'unset'; 
            }
            if (NoDataSelectedModal_HR !== null) {
                NoDataSelectedModal_HR.style.display = 'flex';   
            }
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
        
        if (AttachmentInput.value.trim() == '') { 
            ErrorAvailability.textContent =  'Attachment is required/Fill other fields manually';
        }

        if (VesselInput.value.trim()) {  
            if (StatusInput.value.trim() == '') { 
                ErrorAvailability.textContent =  'Status is required';
            } else if (DoneByInput.value.trim() == '') { 
                ErrorAvailability.textContent =  'Done by field is required';
            } else if (StartTimeInput.value == '') { 
                ErrorAvailability.textContent =  'Start time cannot be empty';
            } else if (EndTimeInput.value == '') { 
                ErrorAvailability.textContent =  'End time cannot be empty';
            } else if (StartTimeInput.value.substring(0, 2) > EndTimeInput.value.substring(0, 2)) { 
                ErrorAvailability.textContent =  'Start time cannot be greater than end time';
            } else if (StartDateInput.value > EndDateInput.value) { 
                ErrorAvailability.textContent =  'Start date cannot be greater than End date';
            } else if (StartDateInput.value == '') { 
                ErrorAvailability.textContent =  'Start date cannot be empty';
            } else if (EndDateInput.value == '') { 
                ErrorAvailability.textContent =  'End date cannot be empty';
            } else if (
                /[a-zA-Z]/.test(StartTimeInput.value.substring(0, 6)) ||
                /[a-zA-Z]/.test(EndTimeInput.value.substring(0, 6))
            ) {
                ErrorAvailability.textContent =  'Time cannot include alphabets';
            } else { 
                ErrorAvailability.style.backgroundColor =  'rgb(106, 97, 233)';
                ErrorAvailability.style.color =  '#fff';
                ErrorAvailability.style.padding =  '1em';
                ErrorAvailability.textContent = 'Creating availability..';
                AddAvailabilityButton.style.backgroundColor = '#1fb95e';
                AddAvailabilityButton.textContent = '+ Processing..';
                AddAvailabilityForm.setAttribute('method', 'POST');
                AddAvailabilityForm.setAttribute('action', '/Add/Availability?Vessel=' + VesselInput.value + '&Status=' + StatusInput.value + '&DoneBy=' + DoneByInput.value + '&StartTime=' + StartTimeInput.value + '&EndTime=' + EndTimeInput.value + '&StartDate=' + StartDateInput.value + '&EndDate=' + EndDateInput.value + '&Attachment=' + AttachmentInput.value);
                AddAvailabilityForm.submit();
            }
        } else if (AttachmentInput.value.trim() ) {
            if (
                AttachmentInput.value.endsWith('.xlsx') ||
                AttachmentInput.value.endsWith('.xls') ||
                AttachmentInput.value.endsWith('.csv') 
            ) {
                ErrorAvailability.style.backgroundColor =  'rgb(106, 97, 233)';
                ErrorAvailability.style.color =  '#fff';
                ErrorAvailability.style.padding =  '1em';
                ErrorAvailability.textContent = 'Creating availability..';
                AddAvailabilityButton.style.backgroundColor = '#1fb95e';
                AddAvailabilityButton.textContent = '+ Processing..';
                AddAvailabilityForm.setAttribute('method', 'POST');
                AddAvailabilityForm.setAttribute('action', '/Add/Availability?Vessel=' + VesselInput.value + '&Status=' + StatusInput.value + '&DoneBy=' + DoneByInput.value + '&StartTime=' + StartTimeInput.value + '&EndTime=' + EndTimeInput.value + '&StartDate=' + StartDateInput.value + '&EndDate=' + EndDateInput.value + '&Attachment=' + AttachmentInput.value);
                AddAvailabilityForm.submit();
            } else {
                ErrorAvailability.textContent = 'File format is not EXCEL type..';
            }
        } 
    })
}    