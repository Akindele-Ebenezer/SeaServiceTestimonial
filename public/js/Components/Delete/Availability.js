let DeleteAvailabilityButtons = document.querySelectorAll('.DeleteAvailabilityButton');
let AvailabilityName = document.querySelector('.availability-name');
let DeleteAvailabilityModal = document.querySelector('.DeleteAvailability');
let DeleteAvailabilityX = document.querySelector('.DeleteAvailabilityX');
let CancelButtonDeleteAvailabilitys = document.querySelectorAll('.cancel-button-delete-availability');
 
DeleteAvailabilityButtons.forEach(DeleteAvailabilityButton => {
    DeleteAvailabilityButton.addEventListener('click', () => {
        DeleteAvailabilityModal.style.display = 'flex'; 
        let AvailabilityId = DeleteAvailabilityButton.parentElement.parentElement.firstElementChild.textContent;
        AvailabilityName.textContent = DeleteAvailabilityButton.parentElement.parentElement.firstElementChild.nextElementSibling.textContent;

        DeleteAvailabilityX.addEventListener('click', () => {
            DeleteAvailabilityX.textContent = '+ Deleting..';
            window.location = '/Delete/Availability/' + AvailabilityId;
        })

        CancelButtonDeleteAvailabilitys.forEach(CancelButtonDeleteAvailability => {
            CancelButtonDeleteAvailability.addEventListener('click', () => { 
                DeleteAvailabilityModal.style.display = 'none';
            })
        });
    });
});