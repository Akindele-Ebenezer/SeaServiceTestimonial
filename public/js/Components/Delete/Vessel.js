let DeleteVesselButtons = document.querySelectorAll('.DeleteVesselButton');
let DeleteVesselModal = document.querySelector('.DeleteVessel');
let VesselNameDelete = document.querySelector('.vessel-name-delete');
let DeleteVesselX = document.querySelector('.delete-vessel-x');
let CancelButtonDeleteVessels = document.querySelectorAll('.cancel-button-delete-vessel');
 
DeleteVesselButtons.forEach(DeleteVesselButton => {
    let VesselId = DeleteVesselButton.parentElement.parentElement.parentElement.firstElementChild.nextElementSibling.textContent;
    DeleteVesselButton.addEventListener('click', () => {
        DeleteVesselModal.style.display = 'flex';
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