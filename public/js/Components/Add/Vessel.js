let CreateVesselButton = document.querySelector('.AddVesselButton');
let CreateNewVesselButton = document.querySelector('.CreateVesselButton');
let AddVesselModal = document.querySelector('.AddVessel');
let AddVesselForm = document.querySelector('.VesselForm');
let CancelButton_AddVessel = document.querySelector('.cancel-button-add-vessel');
 
CreateVesselButton.addEventListener('click', () => {
    AddVesselModal.style.display = 'flex';  

    CreateNewVesselButton.addEventListener('click', () => {
        let ErrorVessel = document.querySelector('.error-vessel');
        let VesselNameInput = document.querySelector('input[name=VesselName]');
        let ImoNumberInput = document.querySelector('input[name=ImoNumber]');
    
        if (VesselNameInput.value.trim() == '') { 
            ErrorVessel.textContent =  'Vessel name field cannot be empty';
        } else if (ImoNumberInput.value.trim() == '') { 
            ErrorVessel.textContent =  'Vessel ID is required';
        } else {
            CreateNewVesselButton.style.backgroundColor = '#1fb95e';
            CreateNewVesselButton.textContent = '+ Creating..';
            AddVesselForm.setAttribute('action', '/Add/Vessel');
            AddVesselForm.submit();
        }
    })

    CancelButton_AddVessel.addEventListener('click', () => {
        AddVesselModal.style.display = 'none';
    })
});