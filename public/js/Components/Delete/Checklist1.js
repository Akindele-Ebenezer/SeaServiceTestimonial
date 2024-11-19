let DeleteChecklist1Buttons = document.querySelectorAll('.DeleteChecklist1Button');
let Checklist1Name = document.querySelector('.checklist1-name');
let DeleteChecklist1Modal = document.querySelector('.DeleteChecklist1');
let DeleteChecklist1X = document.querySelector('.DeleteChecklist1X');
let CancelButtonDeleteChecklist1s = document.querySelectorAll('.cancel-button-delete-checklist1');
 
DeleteChecklist1Buttons.forEach(DeleteChecklist1Button => {
    DeleteChecklist1Button.addEventListener('click', () => {
        DeleteChecklist1Modal.style.display = 'flex'; 
        let Checklist1Id = DeleteChecklist1Button.parentElement.firstElementChild.textContent;
        Checklist1Name.textContent = DeleteChecklist1Button.parentElement.firstElementChild.nextElementSibling.textContent;

        DeleteChecklist1X.addEventListener('click', () => {
            DeleteChecklist1X.textContent = '+ Deleting..';
            window.location = '/Delete/Checklist1/' + Checklist1Id;
        })

        CancelButtonDeleteChecklist1s.forEach(CancelButtonDeleteChecklist1 => {
            CancelButtonDeleteChecklist1.addEventListener('click', () => { 
                DeleteChecklist1Modal.style.display = 'none';
            })
        });
    });
});