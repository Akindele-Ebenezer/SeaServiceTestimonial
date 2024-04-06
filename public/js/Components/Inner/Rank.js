let ShowRankButton = document.querySelector('.ShowRanks');
let Ranks = document.querySelector('.ranks');
let Lists = document.querySelectorAll('.list');
let CloseButtonRanks = document.querySelector('.close-button-ranks');

ShowRankButton.addEventListener('click', () => {
    Ranks.style.display = 'flex';

    CloseButtonRanks.addEventListener('click', () => {
        Ranks.style.display = 'none';
    })
})

Lists.forEach(List => {
    List.addEventListener('mouseover', () => {
        List.firstElementChild.firstElementChild.nextElementSibling.nextElementSibling.style.display = 'block';
    })
    List.addEventListener('mouseleave', () => {
        List.firstElementChild.firstElementChild.nextElementSibling.nextElementSibling.style.display = 'none';
    })
});