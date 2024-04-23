let EditTestimonialButtons = document.querySelectorAll('.EditTestimonialButton');
let EditTestimonialModal = document.querySelector('.EditTestimonial');
let CancelButtonUpdate = document.querySelector('.close-button-update');
 
let EditEmployeeInput = document.querySelector('input[name=EditEmployee]');
let EditStaffNumberInput = document.querySelector('input[name=EditStaffNumber]');
let EditDateOfBirthInput = document.querySelector('input[name=EditDateOfBirth]');
let EditAreaOfOperationInput = document.querySelector('select[name=EditAreaOfOperation]');
let EditDischargeBookInput = document.querySelector('input[name=EditDischargeBook]');
let EditRankInput = document.querySelector('select[name=EditRank]');
let EditCompanyInput = document.querySelector('select[name=EditCompany]');
let EditStartDate_1Input = document.querySelector('input[name=EditStartDate_1]');
let EditEndDate_1Input = document.querySelector('input[name=EditEndDate_1]');
let EditStartDate_2Input = document.querySelector('input[name=EditStartDate_2]');
let EditEndDate_2Input = document.querySelector('input[name=EditEndDate_2]');
let EditStartDate_3Input = document.querySelector('input[name=EditStartDate_3]');
let EditEndDate_3Input = document.querySelector('input[name=EditEndDate_3]');
let EditStartDate_4Input = document.querySelector('input[name=EditStartDate_4]');
let EditEndDate_4Input = document.querySelector('input[name=EditEndDate_4]');
let EditStartDate_5Input = document.querySelector('input[name=EditStartDate_5]');
let EditEndDate_5Input = document.querySelector('input[name=EditEndDate_5]');
let EditTemplateInput = document.querySelector('select[name=EditTemplateFormat]'); 
let EditCurrentVesselInput = document.querySelector('input[name=EditCurrentVessel]'); 
let EditPreviousVesselInput = document.querySelector('input[name=EditPreviousVessel]'); 

EditTestimonialButtons.forEach(EditTestimonialButton => {
    EditTestimonialButton.addEventListener('click', () => {
        EditTestimonialModal.style.display = 'flex';
 
        EditEmployeeInput.value = EditTestimonialButton.nextElementSibling.nextElementSibling.textContent;
        EditStaffNumberInput.value = EditTestimonialButton.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        EditDateOfBirthInput.value = EditTestimonialButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        EditAreaOfOperationInput.value = EditTestimonialButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        EditDischargeBookInput.value = EditTestimonialButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        EditRankInput.value = EditTestimonialButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        EditCompanyInput.value = EditTestimonialButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        EditStartDate_1Input.value = EditTestimonialButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        EditStartDate_1Input.value = EditTestimonialButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        EditEndDate_1Input.value = EditTestimonialButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        EditStartDate_2Input.value = EditTestimonialButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        EditEndDate_2Input.value = EditTestimonialButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        EditStartDate_3Input.value = EditTestimonialButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        EditEndDate_3Input.value = EditTestimonialButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        EditStartDate_4Input.value = EditTestimonialButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        EditEndDate_4Input.value = EditTestimonialButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        EditStartDate_5Input.value = EditTestimonialButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        EditEndDate_5Input.value = EditTestimonialButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        EditTemplateInput.value = EditTestimonialButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        EditCurrentVesselInput.value = EditTestimonialButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        EditPreviousVesselInput.value = EditTestimonialButton.previousElementSibling.textContent;
         
        if((EditStartDate_2Input.value == '') &&
            (EditEndDate_2Input.value == '')
        ) {
            EditStartDate_2Input.parentElement.parentElement.classList.add('Hide');
        } else {
            EditStartDate_2Input.parentElement.parentElement.classList.add('Show');
            EditEndDate_2Input.parentElement.parentElement.classList.add('Show');
        }
        if((EditStartDate_3Input.value == '') &&
            (EditEndDate_3Input.value == '')
        ) {
            EditStartDate_3Input.parentElement.parentElement.classList.add('Hide');
        } else {
            EditStartDate_3Input.parentElement.parentElement.classList.add('Show');
            EditEndDate_3Input.parentElement.parentElement.classList.add('Show');
        }
        if((EditStartDate_4Input.value == '') &&
            (EditEndDate_4Input.value == '')
        ) {
            EditStartDate_4Input.parentElement.parentElement.classList.add('Hide');
        } else {
            EditStartDate_4Input.parentElement.parentElement.classList.add('Show');
            EditEndDate_4Input.parentElement.parentElement.classList.add('Show');
        }
        if((EditStartDate_5Input.value == '') &&
            (EditEndDate_5Input.value == '')
        ) {
            EditStartDate_5Input.parentElement.parentElement.classList.add('Hide');
        } else {
            EditStartDate_5Input.parentElement.parentElement.classList.add('Show');
            EditEndDate_5Input.parentElement.parentElement.classList.add('Show');
        }

        let UpdateTestimonialButton = document.querySelector('.UpdateTestimonialButton');
        let UpdateTestimonialForm = document.querySelector('.UpdateTestimonialForm');
        let TestimonialId = EditTestimonialButton.nextElementSibling.textContent;

        UpdateTestimonialButton.addEventListener('click', () => {
            UpdateTestimonialButton.style.backgroundColor = '#1fb95e';
            UpdateTestimonialButton.textContent = '+ Updating..';
            UpdateTestimonialForm.setAttribute('action', '/Edit/Testimonial/' + TestimonialId);
            UpdateTestimonialForm.submit();
        });

        CancelButtonUpdate.addEventListener('click', () => {
            EditTestimonialModal.style.display = 'none';
            UpdateTestimonialForm.removeAttribute('action');
            EditStartDate_2Input.parentElement.parentElement.classList.remove('Show');
            EditStartDate_3Input.parentElement.parentElement.classList.remove('Show');
            EditStartDate_4Input.parentElement.parentElement.classList.remove('Show');
            EditStartDate_5Input.parentElement.parentElement.classList.remove('Show');
            EditEndDate_2Input.parentElement.parentElement.classList.remove('Show');
            EditEndDate_3Input.parentElement.parentElement.classList.remove('Show');
            EditEndDate_4Input.parentElement.parentElement.classList.remove('Show');
            EditEndDate_5Input.parentElement.parentElement.classList.remove('Show');
        })
    });
});