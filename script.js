document.addEventListener('DOMContentLoaded', () => {
    const hamburger = document.getElementById('hamburger');
    const dropdown = document.getElementById('dropdown');

    hamburger.addEventListener('click', () => {
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    });

    document.addEventListener('click', (event) => {
        if (!dropdown.contains(event.target) && !hamburger.contains(event.target)) {
            dropdown.style.display = 'none';
        }
    });
});


// form stuff that i gpt of the interwebs.

(function() {
    // https://dashboard.emailjs.com/admin/account
    emailjs.init({
        publicKey: "Mpo133ad6_ppsJtj8",
    });
})();

window.onload = function() {
    document.getElementById('form').addEventListener('submit', function(event) {
        event.preventDefault();
        // these IDs from the previous steps
        emailjs.sendForm('contact_service', 'form', this)
            .then(() => {
                console.log('SUCCESS!');
            }, (error) => {
                console.log('FAILED...', error);
            });
    });
}
