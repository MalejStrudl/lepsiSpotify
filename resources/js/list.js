const checks = document.querySelectorAll('.check');

for (let i = 0; i < checks.length; i++) {
    checks[i].addEventListener('click', () => {
        checks[i].classList.toggle('checkin');
        const box = checks[i].querySelector('.box');
        box.checked = !box.checked;
    });   
}

let addBtn = document.getElementById('addSpec');
let div = document.getElementsByClassName('addSpecDiv');
addBtn.addEventListener('click', showMenu);

function showMenu() {
    
    div[0].classList.toggle('showMenu');
}

let cross = document.getElementById('cross');
cross.addEventListener('click', showMenu);
