let CreateVesselButton = document.querySelector('.AddVesselButton');
let CreateNewVesselButton = document.querySelector('.CreateVesselButton');
let AddVesselModal = document.querySelector('.AddVessel');
let AddVesselForm = document.querySelector('.VesselForm');
let CancelButton_AddVessel = document.querySelector('.cancel-button-add-vessel');
 
CreateVesselButton.addEventListener('click', () => {
    let ERROR_X_Wrapper = document.querySelector('.error-x-wrapper');
    let ERROR_X = document.querySelector('.error-x');
    if (CreateVesselButton.classList.contains("add-vessel-privilege-denied")) {
        
        ERROR_X_Wrapper.style.display = 'flex';  
        ERROR_X.textContent = 'Access denied to add a vessel.. contact an administrator!';
        setTimeout(() => {
            ERROR_X_Wrapper.style.display = 'none';  
        }, 3000);
    } else {
        AddVesselModal.style.display = 'flex';  
    }

    CreateNewVesselButton.addEventListener('click', () => {
        let ErrorVessel = document.querySelector('.error-vessel');
        let VesselNameInput = document.querySelector('input[name=VesselName]'); 
        let ImoNumberInput = document.querySelector('input[name=ImoNumber]');
    
        if (VesselNameInput.value.trim() == '') { 
            ErrorVessel.textContent =  'Vessel name field cannot be empty';
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