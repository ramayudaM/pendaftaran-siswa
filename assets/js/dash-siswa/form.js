const realFile = document.getElementById('real-file');
const customBtn = document.getElementById('custom-button');
const customText = document.getElementById('custom-text');

const previewContainer = document.querySelector('.image-preview');
const previewImage = document.querySelector('.image-preview img');
const previewText = document.querySelector('.image-preview span')

const btnReset = document.getElementById('reset-preview');

// file image function
customBtn.addEventListener('click', () => {
    realFile.click();
});

realFile.addEventListener('change', () => {
    if (realFile.value) {
        customText.innerHTML = realFile.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
    } else {
        customText.innerHTML = 'Tidak ada file yang dipilih.';
    }
});

// preview file image
realFile.addEventListener('change', function () {
    previewImage.src = window.URL.createObjectURL(this.files[0]);
    previewText.style.display = 'none';
    previewImage.style.display = 'block';
});

// button reset image preview
btnReset.addEventListener('click', () => {
    previewText.style.display = 'block';
    previewImage.style.display = 'none';
    customText.innerHTML = 'Tidak ada file yang dipilih.';
});
// sampe sini