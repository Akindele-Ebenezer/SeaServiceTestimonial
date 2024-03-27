let ActionButtions = document.querySelectorAll('.table-1 .table table tr td.action');

ActionButtions.forEach(Button => {
    Button.addEventListener('click', () => {
        Button.parentElement.nextElementSibling.style.display = 'table-row !important';
        Button.parentElement.nextElementSibling.nextElementSibling.style.display = 'table-row !important';
    })
});

let TestimonialPdfs = document.querySelectorAll('.TestimonialPdf');

TestimonialPdfs.forEach(Pdf => {
    let TestimonialId = Pdf.nextElementSibling.textContent;
    let TestimonialTemplate = Pdf.nextElementSibling.nextElementSibling.textContent;
    Pdf.addEventListener('click', () => {
        switch (TestimonialTemplate) {
            case 'Deck':
                window.open('/Testimonials/Template/1?Testimonial_Id=' + TestimonialId);
                break;
            case 'Engine':
                window.open('/Testimonials/Template/2?Testimonial_Id=' + TestimonialId);
                break;
            case 'Captain':
                window.open('/Testimonials/Template/3?Testimonial_Id=' + TestimonialId);
                break;
            default:
                break;
        } 
    })
});