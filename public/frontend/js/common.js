
$(window).scroll(function() {
    if ($(this).scrollTop()) {
        $('#to-top').fadeIn();
    } else {
        $('#to-top').fadeOut();
    }
});

$("#to-top").click(function () {
   $("html, body").animate({scrollTop: 0}, 2000);
});


// swiper Banner top
var swiper = new Swiper(".bannerSwiper", {
    spaceBetween: 30,
    centeredSlides: true,
    speed: 1000,
    // autoplay: {
    //   delay: 3500,
    //   disableOnInteraction: false,
    // },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
});

//swiper product
var swiperProduct = new Swiper(".productSwiper", {
    slidesPerView: 4,
    direction: getDirection(),
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    on: {
        resize: function () {
            swiperProduct.changeDirection(getDirection());
        },
    },
    speed: 1000,
    autoplay: {
      delay: 3500,
      disableOnInteraction: false,
    },
});
function getDirection() {
    var windowWidth = window.innerWidth;
    var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';

    return direction;
}

// time voucher
(function( $ ){
    var d_voucher = null;
    var h_voucher;
    var m_voucher;
    var s_voucher;
    function start_timte_voucher(){
        if(d_voucher == null){
            d_voucher = 2;
            h_voucher = 23;
            m_voucher = 59;
            s_voucher = 60;
        }

        if (h_voucher == -1){
            d_voucher = -1;
            h_voucher = 23;
        }
    
        if (m_voucher == -1){
            h_voucher -= 1;
            m_voucher = 59;
        }

        if (s_voucher == -1){
            m_voucher -= 1;
            s_voucher = 59;
        }

        if (d_voucher == -1){
            d_voucher = null;
        }
        s_voucher--;
    }
    // setInterval(function(){
    //     start_timte_voucher();
    //     $('.voucher__block--day').text(d_voucher);
    //     $('.voucher__block--hours').text(h_voucher);
    //     $('.voucher__block--minutes').text(m_voucher);
    //     $('.voucher__block--seconds').text(s_voucher);
    // }, 1000);

})( jQuery );