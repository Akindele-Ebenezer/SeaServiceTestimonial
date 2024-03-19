let EditVesselButtons = document.querySelectorAll('.EditVesselButton');
let EditVesselModal = document.querySelector('.EditVessel');
let CancelButtonUpdate = document.querySelector('.cancel-button-update-vessel');
 
EditVesselButtons.forEach(EditVesselButton => {
    EditVesselButton.addEventListener('click', () => {
        EditVesselModal.style.display = 'flex';
    
        CancelButtonUpdate.addEventListener('click', () => { 
            EditVesselModal.style.display = 'none';
        })
    });
});