let DisplayAddChecklist1Button = document.querySelector('.DisplayAddChecklist1Button');
let AddSmallBoats_Checklist = document.querySelector('.AddSmallBoats_Checklist');
let AddSmallBoats_Checklist_CloseButton = document.querySelector('.AddSmallBoats_Checklist .cancel-button-small-boats-checklist');
let Checkboxes = document.querySelectorAll('input[type=checkbox]');
let AddSmallBoats_ChecklistButton = document.querySelector('.AddSmallBoats_ChecklistButton');
let AddSmallBoats_ChecklistForm = document.querySelector('.AddSmallBoats_ChecklistForm');

let InputFields = [
    'Clean_Tidy', 'VHF_1', 'VHF_2', 'Handheld', 'AIS', 'SOPToDate', 'CompanyOrdersToDate',
    'LogbooksToDate', 'RequisitionBookToDate', 'PendingRequisutions_Name', 'SteeringSytem', 'EmergencySteering', 
    'NavigationalLights', 'SearchLight', 'A_B_Flags', 'Siren_Horn', 'MagneticCompass', 'Radar', 
    'EchoSounder', 'GPS', 'BitsAndBollards', 'ConditionOfRopes', 'ConditionOfWindows', 'LifeRaftsAndCradles', 
    'LifeRings', 'LifeJacketsAndWorkVest', 'DeckMaintenanceCondition', 'AccommodationMaintenanceCondition', 'PilotHandrailsCondition', 
    'TyreFenderCondition', 'HullFendersCondition', 'GarbageCollecting', 'GarbageDepositing', 'EngineSmoking', 
    'Extinguishers_Exp_Date', 'FireHosesCondition', 'Nozzles_NoCondition', 'AllCrewOnBoard', 'FuelOil', 'LubeOil', 
    'FreshWater', 'ConditionOfMainEngine', 'LubeOil_Cons_hour_Engine', 'ConditionOfGearBox', 'ConditionOfGenSet', 
    'ConditionOfBilgePump', 'ConditionOfBilgeSystem', 'ConditionOfBattery', 'ShoreConnectionCables',  
];
let TextareaFields = ['Outgoing_Captain_Engineer','Incoming_Captain_Engineer',];
let SelectFields = ['Boat','IncomingCapt_EngName','OutgoingCapt_EngName',];
let OtherFields = ['Port_PlaceOfHandover','Date',];

DisplayAddChecklist1Button.addEventListener('click', () => {
    AddSmallBoats_Checklist.style.display = 'flex';
    AddSmallBoats_Checklist.style.zIndex = '210';

    AddSmallBoats_ChecklistButton.addEventListener('click', () => {
        InputFields.forEach(InputField => {
            if ((!document.querySelector('.AddSmallBoats_ChecklistForm .input input[name=' + InputField + '][value=NotGood]').checked) &&
                (!document.querySelector('.AddSmallBoats_ChecklistForm .input input[name=' + InputField + '][value=Good]').checked)) {
                Checklist1_Error.textContent = document.querySelector('.AddSmallBoats_ChecklistForm .input input[name=' + InputField + ']').parentElement.firstElementChild.textContent + ' field is required';
                document.querySelector('.AddSmallBoats_ChecklistForm .input input[name=' + InputField + ']').parentElement.firstElementChild.style.color = 'red';
                return;
            } else if ((document.querySelector('.AddSmallBoats_ChecklistForm .input input[name=' + InputField + '][value=NotGood]').checked) ||
                        (document.querySelector('.AddSmallBoats_ChecklistForm .input input[name=' + InputField + '][value=Good]').checked)) {
                document.querySelector('.AddSmallBoats_ChecklistForm .input input[name=' + InputField + ']').parentElement.firstElementChild.style.color = '#888';
                return;
            }
        });
        SelectFields.forEach(SelectField => {
            if (document.querySelector('.AddSmallBoats_ChecklistForm .input select[name=' + SelectField + ']').value == '') {
                Checklist1_Error.textContent = document.querySelector('.AddSmallBoats_ChecklistForm .input select[name=' + SelectField + ']').parentElement.firstElementChild.textContent + ' field is required';
                document.querySelector('.AddSmallBoats_ChecklistForm .input select[name=' + SelectField + ']').parentElement.firstElementChild.style.color = 'red';
                return;
            } else if (!(document.querySelector('.AddSmallBoats_ChecklistForm .input select[name=' + SelectField + ']').value == '')) {
                document.querySelector('.AddSmallBoats_ChecklistForm .input select[name=' + SelectField + ']').parentElement.firstElementChild.style.color = '#888';
                return;
            } 
        });
        OtherFields.forEach(OtherField => {
            if (document.querySelector('.AddSmallBoats_ChecklistForm .input input[name=' + OtherField + ']').value == '') {
                Checklist1_Error.textContent = document.querySelector('.AddSmallBoats_ChecklistForm .input input[name=' + OtherField + ']').parentElement.firstElementChild.textContent + ' field is required';
                document.querySelector('.AddSmallBoats_ChecklistForm .input input[name=' + OtherField + ']').parentElement.firstElementChild.style.color = 'red';
                return;
            } else if (!(document.querySelector('.AddSmallBoats_ChecklistForm .input input[name=' + OtherField + ']').value == '')) {
                document.querySelector('.AddSmallBoats_ChecklistForm .input input[name=' + OtherField + ']').parentElement.firstElementChild.style.color = '#888';
                return;
            } 
        });
        // AddSmallBoats_ChecklistButton.style.backgroundColor = '#1fb95e';
        // AddSmallBoats_ChecklistButton.textContent = '+ Creating..';
        // AddSmallBoats_ChecklistForm.setAttribute('action', '/Add/Checklist1'); 
        // AddSmallBoats_ChecklistForm.submit();
    })

    AddSmallBoats_Checklist_CloseButton.addEventListener('click', () => {
        AddSmallBoats_Checklist.style.display = 'none';
    })
})