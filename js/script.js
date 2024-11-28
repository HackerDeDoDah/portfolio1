


var slideout = new Slideout({
    'panel': document.getElementById('panel'),
    'menu': document.getElementById('menu'),
    'padding': 256,
    'tolerance': 70,
    'easing': 'cubic-bezier(.32,2,.55,.27)'
});

// Toggle button
document.querySelector('.toggle-button').addEventListener('click', function() {
    slideout.toggle();
});


document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('form');

    form.addEventListener('submit', (event) => {
        event.preventDefault();

        const firstName = document.getElementById('first-name');
        const lastName = document.getElementById('last-name');
        const email = document.getElementById('email');
        const subject = document.getElementById('subject');
        const message = document.getElementById('message');

        let isValid = true;

        const errorElements = form.querySelectorAll('.error');
        errorElements.forEach(el => el.remove());

        if (!firstName.value.trim()) {
            isValid = false;
            showError(firstName, 'First name is required.');
        }

        if (!lastName.value.trim()) {
            isValid = false;
            showError(lastName, 'Last name is required.');
        }

        if (!validateEmail(email.value.trim())) {
            isValid = false;
            showError(email, 'Please enter a valid email address.');
        }

        if (!subject.value.trim()) {
            isValid = false;
            showError(subject, 'Subject is required.');
        }

        if (!message.value.trim()) {
            isValid = false;
            showError(message, 'Message is required.');
        }

        // Submit if all good
        if (isValid) {
            alert('Form submitted successfully!');
            form.submit();
        }
    });

    function showError(inputElement, message) {
        const error = document.createElement('div');
        error.className = 'error';
        error.style.color = 'red';
        error.style.fontSize = '0.9rem';
        error.textContent = message;
        inputElement.parentElement.appendChild(error);
    }

    function validateEmail(email) {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailPattern.test(email);
    }
});
