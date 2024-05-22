let TooltipX = document.querySelectorAll('.tooltip-x');

TooltipX.forEach(ToolTip => {
    ToolTip.addEventListener('mouseover', () => {
        ToolTip.firstElementChild.classList.add('Show');
    })
    ToolTip.addEventListener('mouseleave', () => {
        ToolTip.firstElementChild.classList.remove('Show');
    })
});