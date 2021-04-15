let hamburger = document.querySelector(".header__hamburger");
let navList = document.querySelector(".header__links");

if (hamburger) {
  hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('is-active');
    navList.classList.toggle('is-active');
  })
}