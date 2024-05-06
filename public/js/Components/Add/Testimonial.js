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
    let ErrorTestimonial = document.querySelector('.error-testimonial');
    let EmployeeInput = document.querySelector('input[name=Employee]');
    let StaffNumberInput = document.querySelector('input[name=StaffNumber]');
    let StartDate_1Input = document.querySelector('input[name=StartDate_1]');
    let StartDate_2Input = document.querySelector('input[name=StartDate_2]');
    let StartDate_3Input = document.querySelector('input[name=StartDate_3]');
    let StartDate_4Input = document.querySelector('input[name=StartDate_4]');
    let StartDate_5Input = document.querySelector('input[name=StartDate_5]');
    let EndDate_1Input = document.querySelector('input[name=EndDate_1]');
    let EndDate_2Input = document.querySelector('input[name=EndDate_2]');
    let EndDate_3Input = document.querySelector('input[name=EndDate_3]');
    let EndDate_4Input = document.querySelector('input[name=EndDate_4]');
    let EndDate_5Input = document.querySelector('input[name=EndDate_5]');

    if (EmployeeInput.value.trim() == '') { 
        ErrorTestimonial.textContent =  'Employee field cannot be empty';
    } else if (StaffNumberInput.value.trim() == '') { 
        ErrorTestimonial.textContent =  'Employee ID is required';
    } else if (StartDate_1Input.value > EndDate_1Input.value) { 
        ErrorTestimonial.textContent =  'Start date cannot be greater than End date on row 1';
    } else if (StartDate_2Input.value > EndDate_2Input.value) { 
        ErrorTestimonial.textContent =  'Start date cannot be greater than End date on row 2';
    } else if (StartDate_3Input.value > EndDate_3Input.value) { 
        ErrorTestimonial.textContent =  'Start date cannot be greater than End date on row 3';
    } else if (StartDate_4Input.value > EndDate_4Input.value) { 
        ErrorTestimonial.textContent =  'Start date cannot be greater than End date on row 4';
    } else if (StartDate_5Input.value > EndDate_5Input.value) { 
        ErrorTestimonial.textContent =  'Start date cannot be greater than End date on row 5';
    } else if (
        StartDate_1Input.value == '' || 
        EndDate_1Input.value == '' 
    ) { 
        ErrorTestimonial.textContent =  'Date field cannot be empty';
    } else if (StartDate_2Input.value && EndDate_1Input.value > StartDate_2Input.value) { 
        ErrorTestimonial.textContent =  'End date on row 1 cannot be greater than Start date on row 2';
    } else if (StartDate_3Input.value && EndDate_2Input.value > StartDate_3Input.value) { 
        ErrorTestimonial.textContent =  'End date on row 1 cannot be greater than Start date on row 2';
    } else if (StartDate_4Input.value && EndDate_3Input.value > StartDate_4Input.value) { 
        ErrorTestimonial.textContent =  'End date on row 1 cannot be greater than Start date on row 2';
    } else if (StartDate_5Input.value && EndDate_4Input.value > StartDate_5Input.value) { 
        ErrorTestimonial.textContent =  'End date on row 1 cannot be greater than Start date on row 2';
    } else { 
        ErrorTestimonial.style.backgroundColor =  'rgb(106, 97, 233)';
        ErrorTestimonial.style.color =  '#fff';
        ErrorTestimonial.style.padding =  '1em';
        ErrorTestimonial.textContent = 'Creating testimonial..';
        AddTestimonialButton.style.backgroundColor = '#1fb95e';
        AddTestimonialButton.textContent = '+ Processing..';
        AddTestimonialForm.submit();
    }
})
 