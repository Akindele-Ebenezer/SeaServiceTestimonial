function filterFunction() {
    var input, filter;
    input = document.getElementById("FILTER_Input");
    input = document.getElementById("FILTER_Input");
    filter = input.value.toUpperCase();
    div = document.querySelector(".filter-list-wrapper");
    FilterValue = document.querySelectorAll(".filter-list-wrapper .filter-value");
    EmptyFilter = document.querySelector(".filter-list-wrapper .empty");
    FilterValue_SHOW = document.querySelectorAll(".filter-list-wrapper .Show");
 
    for (i = 0; i < FilterValue.length; i++) {
      txtValue = FilterValue[i].textContent || FilterValue[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        FilterValue[i].style.display = "";
        EmptyFilter.classList.remove('Show');  
    } else {
        FilterValue[i].style.display = "none";
        EmptyFilter.classList.add('Show');  
      }
    } 
  } 

let FILTER_Input = document.getElementById("FILTER_Input"); 
let FilterListWrapper = document.querySelector(".filter-list-wrapper");  

FILTER_Input.addEventListener('keyup', (e) => {
    FilterListWrapper.classList.add('Show');   
    e.stopPropagation();  
})   

document.addEventListener('click', () => {
    FilterListWrapper.classList.remove('Show'); 
})
FilterListWrapper.addEventListener('click', (e) => { 
    e.stopPropagation();  
})  
 