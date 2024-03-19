let EditTestimonialButtons = document.querySelectorAll('.EditTestimonialButton');
let EditTestimonialModal = document.querySelector('.EditTestimonial');
let CancelButtonUpdate = document.querySelector('.close-button-update');
 
EditTestimonialButtons.forEach(EditTestimonialButton => {
    EditTestimonialButton.addEventListener('click', () => {
        EditTestimonialModal.style.display = 'flex';
    
        CancelButtonUpdate.addEventListener('click', () => {
            EditTestimonialModal.style.display = 'none';
        })
    });
});