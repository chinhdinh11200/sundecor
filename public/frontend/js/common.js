
$(window).scroll(function() {
    if ($(this).scrollTop()) {
        $('#to-top').fadeIn();
    } else {
        $('#to-top').fadeOut();
    }
});

$("#to-top").click(function () {
   $("html, body").animate({scrollTop: 0}, 0);
});

// video youtube
    $(".made__block--video").css("height",($(".made__block--item").width())*9/16);

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

// swiper Select item product
var swiper = new Swiper(".product__detail--swiper1", {
    loop: true,
    spaceBetween: 10,
    slidesPerView: 3,
    freeMode: true,
    watchSlidesProgress: true,
  });
  var swiper2 = new Swiper(".product__detail--swiper2", {
    loop: true,
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: swiper,
    },
  });
//   swiper-slide-thumb-active
(function( $ ){ 
    $(".product__select--image").click(function () {
        $(".product__select--image").removeClass("active");
        $(this).addClass("active");
     });
})( jQuery );


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
// btnSeeMore


// test
$('.footer__text_readMore_btn').click(function(){
    var $this = $(this);
    var currentHeight = $('.footer__text_paragraph').css('height');
    $this.toggleClass('.footer__text_readMore_btn');
    if($this.hasClass('.footer__text_readMore_btn')){
        $this.text('See Less');         
        $(".footer__text_paragraph").height('auto');
        // $(".footer__text_paragraph::before").display('none'); 
    } else {
        $this.text('See More');
        $(".footer__text_paragraph").height('200px');
    }
});
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
// readMore btn

})( jQuery );

(function( $ ){
    $(".product__select--image").css({
        "height": $('.product__select--image').width() ,
    })
    $(".product__detail--image").css({
        "height": $('.product__detail--swiper2').width() ,
    })

    

    var x = 0,
    container = $('.product__showroom--location'),
    items = container.find('.product__showroom--eachlocation'),
    containerHeight = 0,
    numberVisible = 2;

    container.css("height", numberVisible*($('.product__showroom--eachlocation').height()) );

    if(!container.find('.product__showroom--eachlocation:first').hasClass("product__showroom--first")){
        container.find('.product__showroom--eachlocation:first').addClass("product__showroom--first");
    }

    items.each(function(){
        if(x < numberVisible){
            containerHeight = containerHeight + $(this).outerHeight();
            x++;
        }
    });
    function vertCycle() {
        var firstItem = container.find('.product__showroom--eachlocation.product__showroom--first').html();
        container.append('<div class=\'product__showroom--eachlocation\'>'+firstItem+'</div>');
        firstItem = '';
        container.find('.product__showroom--eachlocation.product__showroom--first').animate({ marginTop: "-" + $('.product__showroom--eachlocation').height() + "px" }, 250, function(){  $(this).remove(); container.find('.product__showroom--eachlocation:first').addClass("product__showroom--first"); });
    }

    setInterval(vertCycle,5000);
})( jQuery );