let DeleteTestimonialButtons = document.querySelectorAll('.DeleteTestimonialButton');
let DeleteTestimonialModal = document.querySelector('.DeleteTestimonial');
let CancelButtonDeleteTestimonials = document.querySelectorAll('.cancel-button-delete-testimonial');
let ConfirmDeleteTestimonialButton = document.querySelector('.ConfirmDeleteTestimonialButton');
 
DeleteTestimonialButtons.forEach(DeleteTestimonialButton => {
    DeleteTestimonialButton.addEventListener('click', () => {
        let TestimonialId = DeleteTestimonialButton.nextElementSibling.textContent;
        let VesselNameDelete = document.querySelector('.vessel-name-delete');
        let VesselDateDelete = document.querySelector('.vessel-date-delete'); 

        DeleteTestimonialModal.style.display = 'flex';
        VesselNameDelete.textContent = DeleteTestimonialButton.nextElementSibling.nextElementSibling.textContent;
        VesselDateDelete.textContent = DeleteTestimonialButton.nextElementSibling.nextElementSibling.nextElementSibling.textContent;

        ConfirmDeleteTestimonialButton.addEventListener('click', () => {
            ConfirmDeleteTestimonialButton.textContent = '+ Deleting..';
            window.location = '/Delete/Testimonial/' + TestimonialId;
        })

        CancelButtonDeleteTestimonials.forEach(CancelButtonDeleteTestimonial => {
            CancelButtonDeleteTestimonial.addEventListener('click', () => { 
                DeleteTestimonialModal.style.display = 'none';
            })
        });
    });
});