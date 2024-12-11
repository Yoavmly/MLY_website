document.addEventListener('DOMContentLoaded', function() {
  const navItems = document.querySelectorAll('.nav-menu .nav-item');
  if (navItems.length > 0) {
    navItems[navItems.length - 1].classList.add('last-nav-item');
  }
});

function toggleMenu() {
  document.querySelector('.nav-menu').classList.toggle('show-menu');
  document.querySelector('.message-box').classList.toggle('show-menu');
  document.querySelector('.socials').classList.toggle('show-socials');
}
