let DeleteRankButtons = document.querySelectorAll('.DeleteRankButton');
let RankName = document.querySelector('.rank-name');
let DeleteRankModal = document.querySelector('.DeleteRank');
let DeleteRankX = document.querySelector('.DeleteRankX');
let CancelButtonDeleteRanks = document.querySelectorAll('.cancel-button-delete-rank');
 
DeleteRankButtons.forEach(DeleteRankButton => {
    DeleteRankButton.addEventListener('click', () => {
        DeleteRankModal.style.display = 'flex';
        RankName.textContent = DeleteRankButton.nextElementSibling.nextElementSibling.textContent;
        let RankId = DeleteRankButton.nextElementSibling.textContent;

        DeleteRankX.addEventListener('click', () => {
            DeleteRankX.textContent = '+ Deleting..';
            window.location = '/Delete/Rank/' + RankId;
        })

        CancelButtonDeleteRanks.forEach(CancelButtonDeleteRank => {
            CancelButtonDeleteRank.addEventListener('click', () => { 
                DeleteRankModal.style.display = 'none';
            })
        });
    });
});