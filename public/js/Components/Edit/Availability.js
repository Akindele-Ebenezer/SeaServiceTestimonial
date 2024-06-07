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
        document.querySelector('.UpdateAvailabilityForm input[name=EditStartTime]').value = EditAvailabilityButton.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        document.querySelector('.UpdateAvailabilityForm input[name=EditEndTime]').value = EditAvailabilityButton.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        document.querySelector('.UpdateAvailabilityForm input[name=EditStartDate]').value = EditAvailabilityButton.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        document.querySelector('.UpdateAvailabilityForm input[name=EditEndDate]').value = EditAvailabilityButton.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
 
        let EditStartTimeInput = document.querySelector('input[name=EditStartTime]');
        let EditEndTimeInput = document.querySelector('input[name=EditEndTime]');
        EditStartTimeInput.addEventListener('keyup', () => {
            if (!isNaN(parseFloat(EditStartTimeInput.value))) {
                if (EditStartTimeInput.value.length == 2) { 
                    EditStartTimeInput.value += ':';  
                    if (EditStartTimeInput.value.substring(0, 2) > 24) { 
                        EditStartTimeInput.value = '';  
                    }
                } 
                if (EditStartTimeInput.value.length == 5) { 
                    EditStartTimeInput.value += ' HRS';  
                }
            } else {
                EditStartTimeInput.value = '';  
            }
        });
        EditEndTimeInput.addEventListener('keyup', () => {
            if (!isNaN(parseFloat(EditStartTimeInput.value))) {
                if (EditEndTimeInput.value.length == 2) { 
                    EditEndTimeInput.value += ':';
                    if (EditEndTimeInput.value.substring(0, 2) > 24) {
                        EditEndTimeInput.value = '';  
                    }  
                } 
                if (EditEndTimeInput.value.length == 5) { 
                    EditEndTimeInput.value += ' HRS';  
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
            } else if (
                EditStartTimeInput.value == '' || 
                EditEndTimeInput.value == '' 
            ) { 
                ErrorAvailability_Update.textContent =  'Start time cannot be empty';
            } else if (EditStartTimeInput.value.substring(0, 2) > EditEndTimeInput.value.substring(0, 2)) { 
                ErrorAvailability_Update.textContent =  'Start time cannot be greater than end time';
            }  else if (EditStartDateInput.value > EditEndDateInput.value) { 
                ErrorAvailability_Update.textContent =  'Start date cannot be greater than End date';
            } else if (
                EditStartDateInput.value == '' || 
                EditEndDateInput.value == '' 
            ) { 
                ErrorAvailability_Update.textContent =  'Start date cannot be empty';
            } else {  
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