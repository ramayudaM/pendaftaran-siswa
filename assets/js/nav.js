const main = document.querySelector('main');

// logout
const btnLogout = document.getElementById('btn-logout');
const modalLogout = document.querySelector('.logout');
const batalLogout = document.getElementById('batal-logout');

btnLogout.addEventListener('click', () => {
    modalLogout.style.visibility = 'visible';
    modalLogout.style.opacity = '1';
    main.classList.add('blur');
});

batalLogout.addEventListener('click', () => {
    modalLogout.style.visibility = 'hidden';
    modalLogout.style.opacity = '0';
    main.classList.remove('blur');
});

// status (dash-admin)
const btnStatus = document.querySelectorAll('.btn-status');
const batalStatus = document.querySelectorAll('#batal-status');

btnStatus.forEach( (btn) => {
    btn.onclick = function() {
        const modal = btn.getAttribute('data-modal');

        document.getElementById(modal).style.opacity = "1";
        document.getElementById(modal).style.visibility = "visible";
    };
});

batalStatus.forEach( (btn) => {
    btn.onclick = function() {
        (btn.closest('.status').style.opacity = '0');
        (btn.closest('.status').style.visibility = 'hidden');
    };
});

// hapus data pendaftar (dash-admin)
const btnHapus = document.querySelectorAll('.btn-hapus');
const batalHapus = document.querySelectorAll('#batal-hapus');

btnHapus.forEach( (btn) => {
    btn.onclick = function() {
        const modalHapus = btn.getAttribute('hapus-modal');

        document.getElementById(modalHapus).style.opacity = "1";
        document.getElementById(modalHapus).style.visibility = "visible";
    };
});

batalHapus.forEach( (btn) => {
    btn.onclick = function() {
        (btn.closest('.hapus').style.opacity = '0');
        (btn.closest('.hapus').style.visibility = 'hidden');
    };
});

// hapus data pendaftar (dash-admin)
const btnCek = document.querySelectorAll('.btn-cek');
const batalCek = document.querySelectorAll('#batal-cek');

btnCek.forEach( (btn) => {
    btn.onclick = function() {
        const modalCek = btn.getAttribute('cek-modal');

        document.getElementById(modalCek).style.opacity = "1";
        document.getElementById(modalCek).style.visibility = "visible";
    };
});

batalCek.forEach( (btn) => {
    btn.onclick = function() {
        (btn.closest('.cek-data').style.opacity = '0');
        (btn.closest('.cek-data').style.visibility = 'hidden');
    };
});
