const checks = document.querySelectorAll('.check');

for (let i = 0; i < checks.length; i++) {
    checks[i].addEventListener('click', () => {
        checks[i].classList.toggle('checkin');
        const box = checks[i].querySelector('.box');
        box.checked = !box.checked;
    });   
}