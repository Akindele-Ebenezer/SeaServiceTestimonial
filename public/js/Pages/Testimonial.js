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

let ListComponent_TESTIMONIAL = document.querySelector('.list-component.testimonials');
let InfoButtons = document.querySelectorAll('.info-button');
let InfoButtonX = document.querySelector('.close-button-testimonials');

InfoButtons.forEach(Button => {
    Button.addEventListener('click', () => {
        ListComponent_TESTIMONIAL.style.display = 'flex';
        document.querySelector('.employee-name-info').textContent = Button.previousElementSibling.textContent;
        document.querySelector('.vessel-name-info').textContent = Button.nextElementSibling.nextElementSibling.textContent;
        document.querySelector('.date-info').textContent = Button.nextElementSibling.textContent;
        document.querySelector('.rank-info').textContent = Button.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        document.querySelector('.date-of-birth-info').textContent = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        document.querySelector('.staff-number-info').textContent = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        document.querySelector('.company-info').textContent = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        document.querySelector('.leave-info').textContent = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        document.querySelector('.working-period-info').textContent = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;

        InfoButtonX.addEventListener('click', () => {
            ListComponent_TESTIMONIAL.style.display = 'none';
        })
    })
});