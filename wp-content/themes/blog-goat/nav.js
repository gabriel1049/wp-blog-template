// Botão de menu hamburguer
const toggle = document.getElementById('menu-toggle');
const nav = document.querySelector('.nav_bar');
const overlay = document.getElementById('menu-overlay');
const body = document.body;

toggle.addEventListener('click', () => {
  toggle.classList.toggle('active');
  nav.classList.toggle('menu-open');
  overlay.classList.toggle('active');
  body.classList.toggle('menu-open');
});

overlay.addEventListener('click', () => {
  toggle.classList.remove('active');
  nav.classList.remove('menu-open');
  overlay.classList.remove('active');
  body.classList.remove('menu-open');
});

// Dropdown funcional no mobile
document.addEventListener("DOMContentLoaded", function () {
  const menuItems = document.querySelectorAll('.nav_bar .menu-item-has-children > a');

  menuItems.forEach(item => {
    item.addEventListener('click', function (e) {
      if (window.innerWidth <= 1250) {
        e.preventDefault();

        const parentLi = item.parentElement;

        // Fecha outros dropdowns abertos
        document.querySelectorAll('.nav_bar li.menu-item-has-children.open').forEach(openItem => {
          if (openItem !== parentLi) {
            openItem.classList.remove('open');
          }
        });

        // Abre ou fecha o atual
        parentLi.classList.toggle('open');
      }
    });
  });
});

// Hero slider 
let currentHero = 0;
const heroSlides = document.querySelectorAll('.hero_slide');
const totalHero = heroSlides.length;

function showHeroSlide(index) {
  const wrapper = document.querySelector('.hero_slider_wrapper');
  currentHero = index % totalHero;
  wrapper.style.transform = `translateX(-${currentHero * 100}%)`;
}

setInterval(() => {
  showHeroSlide(currentHero + 1);
}, 7000);


document.addEventListener('DOMContentLoaded', function () {
  const track = document.querySelector('.scroll_track');
  if (track) {
    const clone = track.innerHTML;
    track.innerHTML += clone; // duplica os posts para looping
  }
});
