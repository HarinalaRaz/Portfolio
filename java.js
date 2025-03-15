// Animation au défilement
document.addEventListener('scroll', () => {
    const elements = document.querySelectorAll('.animate');
    elements.forEach(el => {
        if (el.getBoundingClientRect().top < window.innerHeight - 100) {
            el.classList.add('visible');
        }
    });
});