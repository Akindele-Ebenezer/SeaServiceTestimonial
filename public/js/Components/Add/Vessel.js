let CreateVesselButton = document.querySelector('.AddVesselButton');
let AddVesselModal = document.querySelector('.AddVessel');
let CancelButton_AddVessel = document.querySelector('.cancel-button-add-vessel');
 
CreateVesselButton.addEventListener('click', () => {
    AddVesselModal.style.display = 'flex';  

    CancelButton_AddVessel.addEventListener('click', () => {
        AddVesselModal.style.display = 'none';
    })
});