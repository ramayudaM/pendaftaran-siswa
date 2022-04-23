const tabs = document.querySelectorAll('.content2 .tabs h5');
const text = document.querySelectorAll('.content2 .box .text');

// tabs function click
tabs[0].addEventListener('click', () => {
    tabs[0].style.opacity = '1';
    tabs[1].style.opacity = '0.2';
    tabs[2].style.opacity = '0.2';
    
    text[0].style.display = 'block';
    text[1].style.display = 'none';
    text[2].style.display = 'none';
});

tabs[1].addEventListener('click', () => {
    tabs[0].style.opacity = '0.2';
    tabs[1].style.opacity = '1';
    tabs[2].style.opacity = '0.2';
    
    text[0].style.display = 'none';
    text[1].style.display = 'block';
    text[2].style.display = 'none';
});

tabs[2].addEventListener('click', () => {
    tabs[0].style.opacity = '0.2';
    tabs[1].style.opacity = '0.2';
    tabs[2].style.opacity = '1';
    
    text[0].style.display = 'none';
    text[1].style.display = 'none';
    text[2].style.display = 'block';
});