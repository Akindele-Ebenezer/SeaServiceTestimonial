let DeleteVesselButtons = document.querySelectorAll('.DeleteVesselButton');
let DeleteVesselModal = document.querySelector('.DeleteVessel');
let VesselNameDelete = document.querySelector('.vessel-name-delete');
let DeleteVesselX = document.querySelector('.delete-vessel-x');
let CancelButtonDeleteVessels = document.querySelectorAll('.cancel-button-delete-vessel');
 
DeleteVesselButtons.forEach(DeleteVesselButton => {
    let VesselId = DeleteVesselButton.parentElement.parentElement.parentElement.firstElementChild.textContent;
    DeleteVesselButton.addEventListener('click', () => {
        let ERROR_X_Wrapper = document.querySelector('.error-x-wrapper');
        let ERROR_X = document.querySelector('.error-x');
        if (DeleteVesselButton.classList.contains("delete-vessel-privilege-denied")) {
            ERROR_X_Wrapper.style.display = 'flex';  
            ERROR_X.textContent = 'Access denied to delete a vessel.. contact an administrator!';
            setTimeout(() => {
                ERROR_X_Wrapper.style.display = 'none';  
            }, 3000);
        } else {
            DeleteVesselModal.style.display = 'flex';
        }
        VesselNameDelete.textContent = DeleteVesselButton.parentElement.parentElement.parentElement.firstElementChild.textContent;
        
        DeleteVesselX.addEventListener('click', () => {
            DeleteVesselX.textContent = '+ Deleting..';
            window.location = '/Delete/Vessel/' + VesselId;
        })
    
        CancelButtonDeleteVessels.forEach(CancelButtonDeleteVessel => {
            CancelButtonDeleteVessel.addEventListener('click', () => { 
                DeleteVesselModal.style.display = 'none';
            })
        });
    });
});