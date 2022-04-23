const inputWrap = document.querySelectorAll('.input-wrap');
const input = document.querySelectorAll('input');
const label = document.querySelectorAll('label');
const errorText = document.querySelectorAll('.error-text');
const infoText = document.querySelector('.info-text i');

const eFormat = /^[a-z0-9._]+@[a-z0-9]+\.[a-z]{2,3}$/;
const hide = document.getElementById('hide');
const show = document.getElementById('show');

function validasi() {
    
    // email validasi
    if (input[0].value.length === 0) {
        
        inputWrap[0].classList.add('shake');
        label[0].style.color = 'var(--error)';
        input[0].style.borderBottom = '1px solid var(--error)';
        errorText[0].style.display = 'block';

        setTimeout ( () => {
            inputWrap[0].classList.remove('shake');
        }, 100);

        return false
    }

    // password validasi
    if (input[1].value.length === 0) {

        inputWrap[1].classList.add('shake');
        input[1].style.borderBottom = '1px solid var(--error)';
        label[1].style.color = 'var(--error)';
        errorText[1].style.display = 'block';

        setTimeout( () => {
            inputWrap[1].classList.remove('shake');
        }, 100);

        return false;
    }
    
    // confirm password validasi
    if (input[2].value !== input[1].value) {

        inputWrap[2].classList.add('shake');
        input[2].style.borderBottom = '1px solid var(--error)';
        label[2].style.color = 'var(--error)';
        errorText[2].style.display = 'block';

        setTimeout( () => {
            inputWrap[2].classList.remove('shake');
        }, 100);

        return false;
    }

    // email validasi format
    if (input[0].value.match(eFormat)) {
        return true;
    } else {
        inputWrap[0].classList.add('shake');
        input[0].style.borderBottom = '1px solid var(--error)';
        label[0].style.color = 'var(--error)';
        errorText[0].innerHTML = 'Masukkan format email yang benar';
        errorText[0].style.display = 'block';

        setTimeout( () => {
            inputWrap[0].classList.remove('shake');
        }, 100);

        return false;
    }
}

// input function
input.forEach( (el) => {
    el.addEventListener('keyup', (e) => {
        if(el.value !== '') {
            e.target.nextElementSibling.style.top = '0';
            e.target.nextElementSibling.style.fontSize = '0.8rem';
            e.target.nextElementSibling.style.color = 'var(--purple)';
            e.target.style.borderBottom = '1px solid var(--purple)';
            e.target.parentElement.nextElementSibling.style.display = 'none';
        }
    });
});

input.forEach( (el) => {
    el.addEventListener('blur', (e) => {
        if(el.value === ''){
            e.target.nextElementSibling.style.top = '';
            e.target.nextElementSibling.style.fontSize = '';
            e.target.nextElementSibling.style.color = '';
            e.target.style.borderBottom = '';
        }
    });
});

// password function
input[1].addEventListener('keyup', () => {

    if(input[1].value !== ''){
        hide.style.visibility = 'visible';
    } else {
        hide.style.visibility = 'hidden';
    }

    if(input[1].value === input[2].value) {
        errorText[1].style.display = 'none';
        errorText[2].style.display = 'none';
    }
    
});

hide.addEventListener('click', () => {
    if (input[1].type === 'password' || input[2].type === 'password') {
        input[1].type = 'text';
        input[2].type = 'text';
        hide.style.visibility = 'hidden';
        show.style.visibility = 'visible';
    }
});

show.addEventListener('click', () => {
    if (input[1].type === 'text' || input[2].type === 'text') {
        input[1].type = 'password';
        input[2].type = 'password';
        hide.style.visibility = 'visible';
        show.style.visibility = 'hidden';
    }
});

// function info-text
infoText.addEventListener('click', () => {
    infoText.parentElement.style.display = 'none';
});