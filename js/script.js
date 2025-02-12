


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



//-- matrix --

const canvas = document.getElementById('canv');
const ctx = canvas.getContext('2d');

const w = canvas.width = document.body.offsetWidth;
const h = canvas.height = document.body.offsetHeight;
const cols = Math.floor(w / 20) + 1;
const ypos = Array(cols).fill(0);

ctx.fillStyle = '#000';
ctx.fillRect(0, 0, w, h);

function matrix () {
    ctx.fillStyle = '#0001';
    ctx.fillRect(0, 0, w, h);

    ctx.fillStyle = '#0f0';
    ctx.font = '15pt monospace';

    ypos.forEach((y, ind) => {
        const text = String.fromCharCode(Math.random() * 128);
        const x = ind * 20;
        ctx.fillText(text, x, y);
        if (y > 100 + Math.random() * 10000) ypos[ind] = 0;
        else ypos[ind] = y + 20;
    });
}

setInterval(matrix, 50);