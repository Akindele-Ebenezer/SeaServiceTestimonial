let EditAvailabilityButtons = document.querySelectorAll('.EditAvailabilityButton');
let UpdateAvailabilityButton = document.querySelector('.UpdateAvailabilityButton');
let UpdateAvailabilityForm = document.querySelector('.UpdateAvailabilityForm');
let EditAvailabilityModal = document.querySelector('.UpdateAvailability');
let CancelButtonUpdateAvailability = document.querySelector('.close-button-update-availability');
let StatusList = document.querySelectorAll('.availability .list'); 

EditAvailabilityButtons.forEach(EditAvailabilityButton => {
    EditAvailabilityButton.addEventListener('click', () => {
        EditAvailabilityModal.style.display = 'flex';
        let AvailabilityId = EditAvailabilityButton.parentElement.parentElement.firstElementChild.textContent;
        document.querySelector('.UpdateAvailabilityForm input[name=EditVessel]').value = EditAvailabilityButton.parentElement.parentElement.firstElementChild.nextElementSibling.textContent;
        document.querySelector('.UpdateAvailabilityForm select[name=EditStatus]').value = EditAvailabilityButton.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.textContent;
        document.querySelector('.UpdateAvailabilityForm input[name=EditDoneBy]').value = EditAvailabilityButton.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        document.querySelector('.UpdateAvailabilityForm input[name=EditStartTime]').value = EditAvailabilityButton.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent + ' HRS';
        document.querySelector('.UpdateAvailabilityForm input[name=EditEndTime]').value = EditAvailabilityButton.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent + ' HRS';
        document.querySelector('.UpdateAvailabilityForm input[name=EditStartDate]').value = EditAvailabilityButton.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        document.querySelector('.UpdateAvailabilityForm input[name=EditEndDate]').value = EditAvailabilityButton.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        document.querySelector('.UpdateAvailabilityForm select[name=EditTillNow]').value = EditAvailabilityButton.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        document.querySelector('.UpdateAvailabilityForm input[name=EditComment]').value = EditAvailabilityButton.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        document.querySelector('.UpdateAvailabilityForm .report-file').textContent = EditAvailabilityButton.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        document.querySelector('.UpdateAvailabilityForm .report-file-link').setAttribute('href', '/Documents/Reports/Vessels/' + document.querySelector('.UpdateAvailabilityForm input[name=EditVessel]').value.trim() + '/' + EditAvailabilityButton.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent);
        document.querySelector('.UpdateAvailabilityForm .picture-file').textContent = EditAvailabilityButton.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        document.querySelector('.UpdateAvailabilityForm .picture-file-link').setAttribute('href', '/Documents/Pictures/Vessels/' + document.querySelector('.UpdateAvailabilityForm input[name=EditVessel]').value.trim() + '/' +  EditAvailabilityButton.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent);
        document.querySelector('.UpdateAvailabilityForm input[name=EditLocation]').value = EditAvailabilityButton.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
 
        let EditStartTimeInput = document.querySelector('input[name=EditStartTime]');
        let EditEndTimeInput = document.querySelector('input[name=EditEndTime]');
        EditStartTimeInput.addEventListener('keyup', () => {
            if (!isNaN(parseFloat(EditStartTimeInput.value))) {
                if (EditStartTimeInput.value.length == 2) { 
                    EditStartTimeInput.value += ':';  
                    if (EditStartTimeInput.value.substring(0, 2) > 23) { 
                        EditStartTimeInput.value = '';  
                    }
                } 
                if (EditStartTimeInput.value.length == 5) { 
                    if (EditStartTimeInput.value.substring(3, 5) > 59) { 
                        EditStartTimeInput.value = '';  
                    } else {
                        EditStartTimeInput.value += ' HRS';  
                    }
                }
            } else {
                EditStartTimeInput.value = '';  
            }
        });
        EditEndTimeInput.addEventListener('keyup', () => {
            if (!isNaN(parseFloat(EditStartTimeInput.value))) {
                if (EditEndTimeInput.value.length == 2) { 
                    EditEndTimeInput.value += ':';
                    if (EditEndTimeInput.value.substring(0, 2) > 23) {
                        EditEndTimeInput.value = '';  
                    }  
                } 
                if (EditEndTimeInput.value.length == 5) { 
                    if (EditEndTimeInput.value.substring(3, 5) > 59) { 
                        EditEndTimeInput.value = '';  
                    } else {
                        EditEndTimeInput.value += ' HRS';
                    }  
                }
            } else {
                EditEndTimeInput.value = '';  
            }
        });

        UpdateAvailabilityButton.addEventListener('click', () => { 
            let ErrorAvailability_Update = document.querySelector('.error-availability.update');
            let EditVesselInput = document.querySelector('input[name=EditVessel]');
            let EditStatusInput = document.querySelector('select[name=EditStatus]');
            let EditDoneByInput = document.querySelector('input[name=EditDoneBy]');
            let EditStartTimeInput = document.querySelector('input[name=EditStartTime]');
            let EditEndTimeInput = document.querySelector('input[name=EditEndTime]');
            let EditStartDateInput = document.querySelector('input[name=EditStartDate]');
            let EditEndDateInput = document.querySelector('input[name=EditEndDate]');
            
            if (EditVesselInput.value.trim() == '') { 
                ErrorAvailability_Update.textContent =  'Vessel field cannot be empty';
            } else if (EditStatusInput.value.trim() == '') { 
                ErrorAvailability_Update.textContent =  'Status is required';
            } else if (EditDoneByInput.value.trim() == '') { 
                ErrorAvailability_Update.textContent =  'Done by field is required';
            } else if ((EditStartTimeInput.value.length < 9) || (EditEndTimeInput.value.length < 9)) {
                ErrorAvailability_Update.textContent =  'Value of Start/End Time not correct.. kindly clear and re-enter correct value';
            } else if (
                EditStartTimeInput.value == '' || 
                EditEndTimeInput.value == '' 
            ) { 
                ErrorAvailability_Update.textContent =  'Start time cannot be empty';
            } else if (EditStartDateInput.value > EditEndDateInput.value) { 
                ErrorAvailability_Update.textContent =  'Start date cannot be greater than End date';
            } else if (
                EditStartDateInput.value == '' || 
                EditEndDateInput.value == '' 
            ) { 
                ErrorAvailability_Update.textContent =  'Start date cannot be empty';
            } else if (
                /[a-zA-Z]/.test(EditStartTimeInput.value.substring(0, 6)) ||
                /[a-zA-Z]/.test(EditEndTimeInput.value.substring(0, 6))
            ) {
                ErrorAvailability_Update.textContent =  'Time cannot include alphabets';
            }  else {  
                UpdateAvailabilityButton.style.backgroundColor = '#1fb95e';
                UpdateAvailabilityButton.textContent = '+ Processing..';
                UpdateAvailabilityForm.setAttribute('action', '/Edit/Availability/' + AvailabilityId)
                UpdateAvailabilityForm.setAttribute('method', 'POST')
                UpdateAvailabilityForm.submit();
            } 
        })

        CancelButtonUpdateAvailability.addEventListener('click', () => {
            EditAvailabilityModal.style.display = 'none';
        })
    });
});