const aside = document.querySelector('.column_info_hero');
const asideWrapper = document.querySelector('.aside_wrapper');

const asideHeight = aside.offsetHeight;
const asideWidth = aside.offsetWidth;
const asideWrapperTop = asideWrapper.offsetTop;

window.addEventListener('scroll', () => {
  const scrollY = window.scrollY;

  if (scrollY > asideWrapperTop - 20) {
    aside.classList.add('fixed-aside');
    asideWrapper.style.height = asideHeight + 'px';
    aside.style.width = asideWidth + 'px';
  } else {
    aside.classList.remove('fixed-aside');
    asideWrapper.style.height = 'auto';
    aside.style.width = 'auto';
  }
});