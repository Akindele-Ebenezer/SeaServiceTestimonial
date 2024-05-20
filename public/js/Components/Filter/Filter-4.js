FilterValue4 = document.querySelectorAll(".filter-list-wrapper-4 .filter-value-4");function filterFunction4() {
    var input4, filter4;
    input4 = document.getElementById("FILTER_Input4"); 
    filter4 = input4.value.toUpperCase();
    div4 = document.querySelector(".filter-list-wrapper-4");
    EmptyFilter4 = document.querySelector(".filter-list-wrapper-4 .empty4");
    FilterValue_SHOW = document.querySelectorAll(".filter-list-wrapper-4 .Show");
 
    for (i = 0; i < FilterValue4.length; i++) {
      txtValue = FilterValue4[i].textContent || FilterValue4[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter4) > -1) {
        FilterValue4[i].style.display = "";
        EmptyFilter4.classList.remove('Show');  
    } else {
        FilterValue4[i].style.display = "none";
        EmptyFilter4.classList.add('Show');  
      }
    } 
  }
 
  let FILTER_Input4 = document.getElementById("FILTER_Input4"); 
  let FilterListWrapper4 = document.querySelector(".filter-list-wrapper-4"); 
 
FILTER_Input4.addEventListener('keyup', (e) => {
    FilterListWrapper4.classList.add('Show');   
    e.stopPropagation();  
})  
 
document.addEventListener('click', () => {
    FilterListWrapper4.classList.remove('Show'); 
})
FilterListWrapper4.addEventListener('click', (e) => { 
    e.stopPropagation();  
})  

FilterValue4.forEach(Value => {
  Value.addEventListener('click', () => {
        FILTER_Input4.value = Value.firstElementChild.textContent;
        FilterListWrapper4.classList.remove('Show'); 
    })
});
 