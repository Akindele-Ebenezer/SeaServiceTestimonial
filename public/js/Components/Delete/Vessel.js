let DeleteVesselButtons = document.querySelectorAll('.DeleteVesselButton');
let DeleteVesselModal = document.querySelector('.DeleteVessel');
let CancelButtonDeleteVessels = document.querySelectorAll('.cancel-button-delete-vessel');
 
DeleteVesselButtons.forEach(DeleteVesselButton => {
    DeleteVesselButton.addEventListener('click', () => {
        DeleteVesselModal.style.display = 'flex';
    
        CancelButtonDeleteVessels.forEach(CancelButtonDeleteVessel => {
            CancelButtonDeleteVessel.addEventListener('click', () => { 
                DeleteVesselModal.style.display = 'none';
            })
        });
    });
});