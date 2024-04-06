let AddRankButton = document.querySelector('.AddRankButton');
let AddRankButtonX = document.querySelector('.AddRankButtonX');
let AddRankModal = document.querySelector('.AddRank');
let AddRankForm = document.querySelector('.AddRankForm');
let CancelButtonRank = document.querySelector('.close-button-rank');
 
AddRankButton.addEventListener('click', () => {
    AddRankModal.style.display = 'flex';

    AddRankButtonX.addEventListener('click', () => {
        AddRankButtonX.style.backgroundColor = '#1fb95e';
        AddRankButtonX.textContent = '+ Creating..';
        AddRankForm.setAttribute('action', '/Add/Rank');
        AddRankForm.submit();
    })

    CancelButtonRank.addEventListener('click', () => {
        AddRankModal.style.display = 'none';
    })
});