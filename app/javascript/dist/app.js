var hamburger = document.querySelector(".header__hamburger");
var navList = document.querySelector(".header__links");

if (hamburger) {
  hamburger.addEventListener('click', function () {
    hamburger.classList.toggle('is-active');
    navList.classList.toggle('is-active');
  });
}
