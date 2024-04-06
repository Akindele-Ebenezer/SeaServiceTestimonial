let EditRankButtons = document.querySelectorAll('.EditRankButton');
let UpdateRankButton = document.querySelector('.UpdateRankButton');
let UpdateRankForm = document.querySelector('.UpdateRankForm');
let EditRankModal = document.querySelector('.EditRank');
let CancelButtonUpdateRank = document.querySelector('.close-button-update-rank');
 
EditRankButtons.forEach(EditRankButton => {
    EditRankButton.addEventListener('click', () => {
        EditRankModal.style.display = 'flex';
        let RankId = EditRankButton.nextElementSibling.nextElementSibling.textContent; 
        document.querySelector('.UpdateRankForm input[name=Position]').value = EditRankButton.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
 
        UpdateRankButton.addEventListener('click', () => {
            UpdateRankButton.style.backgroundColor = '#1fb95e';
            UpdateRankButton.textContent = '+ Processing..';
            UpdateRankForm.setAttribute('action', '/Edit/Rank/' + RankId)
            UpdateRankForm.submit();
        })

        CancelButtonUpdateRank.addEventListener('click', () => {
            EditRankModal.style.display = 'none';
        })
    });
});