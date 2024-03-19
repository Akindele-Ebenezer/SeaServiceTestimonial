let DeleteTestimonialButtons = document.querySelectorAll('.DeleteTestimonialButton');
let DeleteTestimonialModal = document.querySelector('.DeleteTestimonial');
let CancelButtonDeleteTestimonials = document.querySelectorAll('.cancel-button-delete-testimonial');
 
DeleteTestimonialButtons.forEach(DeleteTestimonialButton => {
    DeleteTestimonialButton.addEventListener('click', () => {
        DeleteTestimonialModal.style.display = 'flex';
    
        CancelButtonDeleteTestimonials.forEach(CancelButtonDeleteTestimonial => {
            CancelButtonDeleteTestimonial.addEventListener('click', () => { 
                DeleteTestimonialModal.style.display = 'none';
            })
        });
    });
});