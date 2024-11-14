let DisplayAddChecklist1Button = document.querySelector('.DisplayAddChecklist1Button');
let AddSmallBoats_Checklist = document.querySelector('.AddSmallBoats_Checklist');
let AddSmallBoats_Checklist_CloseButton = document.querySelector('.AddSmallBoats_Checklist .cancel-button-small-boats-checklist');
let Checkboxes = document.querySelectorAll('input[type=checkbox]');
let AddSmallBoats_ChecklistButton = document.querySelector('.AddSmallBoats_ChecklistButton');
let AddSmallBoats_ChecklistForm = document.querySelector('.AddSmallBoats_ChecklistForm');

DisplayAddChecklist1Button.addEventListener('click', () => {
    AddSmallBoats_Checklist.style.display = 'flex';
    AddSmallBoats_Checklist.style.zIndex = '210';

    AddSmallBoats_ChecklistButton.addEventListener('click', () => {
        AddSmallBoats_ChecklistButton.style.backgroundColor = '#1fb95e';
        AddSmallBoats_ChecklistButton.textContent = '+ Creating..';
        AddSmallBoats_ChecklistForm.setAttribute('action', '/Add/Checklist1'); 
        AddSmallBoats_ChecklistForm.submit();
    })

    AddSmallBoats_Checklist_CloseButton.addEventListener('click', () => {
        AddSmallBoats_Checklist.style.display = 'none';
    })
})