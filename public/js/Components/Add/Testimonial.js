let CreateTestimonialButton = document.querySelector('.CreateTestimonialButton');
let AddTestimonialModal = document.querySelector('.AddTestimonial');
let CancelButton = document.querySelector('.cancel-button');
 
CreateTestimonialButton.addEventListener('click', () => {
    AddTestimonialModal.style.display = 'flex';

    CancelButton.addEventListener('click', () => {
        AddTestimonialModal.style.display = 'none';
    })
});