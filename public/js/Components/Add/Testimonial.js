let CreateTestimonialButton = document.querySelector('.CreateTestimonialButton');
let AddTestimonialModal = document.querySelector('.AddTestimonial');
let CancelButton = document.querySelector('.cancel-button');
 
CreateTestimonialButton.addEventListener('click', () => {
    AddTestimonialModal.style.display = 'flex';

    CancelButton.addEventListener('click', () => {
        AddTestimonialModal.style.display = 'none';
    }) 
});
    
let WorkingPeriod_AddButton = document.querySelectorAll('.form-1 form .inner-2 .working-period table tr td span');

WorkingPeriod_AddButton.forEach(Button => {
    Button.addEventListener('click', () => { 
        Button.parentElement.parentElement.nextElementSibling.classList.toggle('Show');
    })
});

let AddTestimonialButton = document.querySelector('.AddTestimonialButton');
let AddTestimonialForm = document.querySelector('.AddTestimonialForm');

AddTestimonialButton.addEventListener('click', () => {
    AddTestimonialButton.style.backgroundColor = '#1fb95e';
    AddTestimonialButton.textContent = '+ Processing..';
    AddTestimonialForm.submit();
})
 