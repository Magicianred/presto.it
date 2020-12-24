//nav scoll
let navbar = document.querySelector('#navbar')
let navbarBrand = document.querySelector('#navbarLogo')

if (window.innerWidth < 567) {
    navbar.classList.add('bg-dark', 'shadow')
} else {
    document.addEventListener('scroll', () => {
        let navbar = document.querySelector('#navbar')
        let scrolled = window.pageYOffset
        if (scrolled > 40) {
            navbar.classList.remove('bg-transparent')
            navbar.classList.add('bg-dark', 'shadow')
        } else {
            navbar.classList.remove('bg-main', 'shadow' ,'mt-5')
            navbar.classList.add('bg-dark')
            //navbarBrand.src = "resources/img/logo/logo-bianco-orr.png"
        }
    })
}
var swiper = new Swiper('.swiper-container', {
  loop: true,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});

var galleryThumbs = new Swiper('.gallery-thumbs', {
  spaceBetween: 10,
  slidesPerView: 4,
  freeMode: true,
  watchSlidesVisibility: true,
  watchSlidesProgress: true,
});
var galleryTop = new Swiper('.gallery-top', {
  spaceBetween: 10,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  thumbs: {
    swiper: galleryThumbs
  }
});