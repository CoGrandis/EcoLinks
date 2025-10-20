const menu = document.getElementById('adminMenu');
const toggle = document.getElementById('menuToggle');

toggle.addEventListener('click', () => {
  menu.classList.toggle('open');
});