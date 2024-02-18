new Swiper('.about-slider', {
    loop: true,
   
    autoplay: { //автопроигрывать слайдер
       delay: 2500, //задержка 2500 миллисекунд
       stopOnLastSlide: false, //не отсанавливаться на последнем слайде
    },
   
    slidesPerView: 2.5, //показывать 2.5 слайда на одном экране
   });