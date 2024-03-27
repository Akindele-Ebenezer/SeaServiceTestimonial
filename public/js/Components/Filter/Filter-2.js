FilterValue2 = document.querySelectorAll(".filter-list-wrapper-2 .filter-value-2");function filterFunction2() {
    var input2, filter2;
    input2 = document.getElementById("FILTER_Input2"); 
    filter2 = input2.value.toUpperCase();
    div2 = document.querySelector(".filter-list-wrapper-2");
    EmptyFilter2 = document.querySelector(".filter-list-wrapper-2 .empty2");
    FilterValue_SHOW = document.querySelectorAll(".filter-list-wrapper-2 .Show");
 
    for (i = 0; i < FilterValue2.length; i++) {
      txtValue = FilterValue2[i].textContent || FilterValue2[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter2) > -1) {
        FilterValue2[i].style.display = "";
        EmptyFilter2.classList.remove('Show');  
    } else {
        FilterValue2[i].style.display = "none";
        EmptyFilter2.classList.add('Show');  
      }
    } 
  }
 
  let FILTER_Input2 = document.getElementById("FILTER_Input2"); 
  let FilterListWrapper2 = document.querySelector(".filter-list-wrapper-2"); 
 
FILTER_Input2.addEventListener('keyup', (e) => {
    FilterListWrapper2.classList.add('Show');   
    e.stopPropagation();  
})  
 
document.addEventListener('click', () => {
    FilterListWrapper2.classList.remove('Show'); 
})
FilterListWrapper2.addEventListener('click', (e) => { 
    e.stopPropagation();  
})  

FilterValue2.forEach(Value => {
  Value.addEventListener('click', () => {
    FILTER_Input2.value = Value.firstElementChild.textContent;
    FilterListWrapper2.classList.remove('Show'); 
  })
});
 