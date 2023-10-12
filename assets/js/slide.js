var swiper = new Swiper(".highlights-slider", {
    loop:true,
    grabCursor:true,
    spaceBetween: 20,
    breakpoints: {
       640: {
         slidesPerView: 1,
       },
       768: {
         slidesPerView: 2,
       },
       991: {
         slidesPerView: 3,
       },
    },
 });

 var swiper = new Swiper('.highlights-slider', {
  autoplay: {
    delay: 4000,
  },
});