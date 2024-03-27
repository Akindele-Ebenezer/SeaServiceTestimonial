let CreateVesselButton = document.querySelector('.AddVesselButton');
let CreateNewVesselButton = document.querySelector('.CreateVesselButton');
let AddVesselModal = document.querySelector('.AddVessel');
let AddVesselForm = document.querySelector('.VesselForm');
let CancelButton_AddVessel = document.querySelector('.cancel-button-add-vessel');
 
CreateVesselButton.addEventListener('click', () => {
    AddVesselModal.style.display = 'flex';  

    CreateNewVesselButton.addEventListener('click', () => {
        CreateNewVesselButton.style.backgroundColor = '#1fb95e';
        CreateNewVesselButton.textContent = '+ Creating..';
        AddVesselForm.setAttribute('action', '/Add/Vessel');
        AddVesselForm.submit();
    })

    CancelButton_AddVessel.addEventListener('click', () => {
        AddVesselModal.style.display = 'none';
    })
});