import './bootstrap';
const userBtn = document.getElementsByClassName('user');
const userMenu = document.getElementsByClassName('user-div');

for (let i = 0; i < userBtn.length; i++) {
    userBtn[i].addEventListener('click', clickUser);
}
function clickUser() {
    for (let i = 0; i < userMenu.length; i++) {
        userMenu[i].classList.toggle('show');
    }

}