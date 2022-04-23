const navLinks = document.querySelector('nav .nav-links');
const navOpen = document.getElementById('open');
const navClose = document.getElementById('close');

navOpen.addEventListener('click', () => {
    navLinks.style.right = '0';
});

navClose.addEventListener('click', () => {
    navLinks.style.right = '-100%';
});

window.addEventListener('scroll', () => {
    let nav = document.querySelector('header nav');
    nav.classList.toggle('sticky', window.scrollY > 0);
});