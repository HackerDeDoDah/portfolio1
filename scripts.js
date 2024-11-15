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
