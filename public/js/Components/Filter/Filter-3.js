FilterValue3 = document.querySelectorAll(".filter-list-wrapper-3 .filter-value-3");function filterFunction3() {
    var input3, filter3;
    input3 = document.getElementById("FILTER_Input3"); 
    filter3 = input3.value.toUpperCase();
    div3 = document.querySelector(".filter-list-wrapper-3");
    EmptyFilter3 = document.querySelector(".filter-list-wrapper-3 .empty3");
    FilterValue_SHOW = document.querySelectorAll(".filter-list-wrapper-3 .Show");
 
    for (i = 0; i < FilterValue3.length; i++) {
      txtValue = FilterValue3[i].textContent || FilterValue3[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter3) > -1) {
        FilterValue3[i].style.display = "";
        EmptyFilter3.classList.remove('Show');  
    } else {
        FilterValue3[i].style.display = "none";
        EmptyFilter3.classList.add('Show');  
      }
    } 
  }
 
  let FILTER_Input3 = document.getElementById("FILTER_Input3"); 
  let FilterListWrapper3 = document.querySelector(".filter-list-wrapper-3"); 
 
FILTER_Input3.addEventListener('keyup', (e) => {
    FilterListWrapper3.classList.add('Show');   
    e.stopPropagation();  
})  
 
document.addEventListener('click', () => {
    FilterListWrapper3.classList.remove('Show'); 
})
FilterListWrapper3.addEventListener('click', (e) => { 
    e.stopPropagation();  
})  

FilterValue3.forEach(Value => {
  Value.addEventListener('click', () => {
    FILTER_Input3.value = Value.firstElementChild.textContent;
    FilterListWrapper3.classList.remove('Show'); 
    document.querySelector('.UpdateTestimonialForm input[name=EditStaffNumber]').value = Value.firstElementChild.nextElementSibling.textContent;
    document.querySelector('.UpdateTestimonialForm input[name=EditDateOfBirth]').value = Value.firstElementChild.nextElementSibling.nextElementSibling.textContent;
    document.querySelector('.UpdateTestimonialForm input[name=EditDischargeBook]').value = Value.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
    document.querySelector('.UpdateTestimonialForm input[name=EditPreviousVessel]').value = Value.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
    document.querySelector('.UpdateTestimonialForm .input select[name=EditRank]').value = Value.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
    document.querySelector('.UpdateTestimonialForm .input select[name=EditCompany]').value = Value.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
  })
});
 