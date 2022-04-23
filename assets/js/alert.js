const alert = document.querySelectorAll('.alert');
const closeAlert = document.querySelectorAll('.alert span');

closeAlert.forEach( (ca) => {
    ca.addEventListener('click', (e) => {
        e.target.parentElement.style.top = '-10vh';
        e.target.parentElement.style.opacity = '0';
    }); 
});

