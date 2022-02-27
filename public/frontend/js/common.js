// open_menu_sp();
function open_menu_sp() {

    $('#header .icon-open__sp img').click(function() {
        $(".container-menu__sp").toggleClass("menu__open--sp", { direction: "left" }, 1000);
    });
    $('#header .icon-close__sp img').click(function() {
        $(".container-menu__sp").toggleClass("menu__open--sp", { direction: "left" }, 1000);
    });
}
open_menu_sp();


$(window).scroll(function() {
    if ($(this).scrollTop()) {
        $('#to-top').css("opacity","1");
    } else {
        $('#to-top').css("opacity","0");
    }
});


$("#to-top").click(function () {
   $("html, body").animate({scrollTop: 0}, 0);
});

// video youtube
    $(".made__block--video").css("height",($(".made__block--item").width())*9/16);
    $("#footer .footer__video--iframe").css("height",($("#footer .footer__video").width())*9/16);
    $(".page-video .made__block--video").css("height",($(".made__block--item").width())*9/16);

// construct img
$(".made__block--construct .made__block--img img").css("height",($(".made__block--construct .made__block--item").width())*4/6);

// img product\
    $(".card__product--img").css("height",($(".product__block--normal .card__product--img").width()));

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


// product__price--show

$('.product__code_a:nth-child(1)').addClass("active");
$('.product__price--show').hide();
$('.product__price--show1').show();
$('.product__detail .product__code_a').click(function() {
    $('.product__code_a').removeClass("active");
    $(this).addClass("active");
    $('.product__price--show').hide();
    $('.product__price--show' + $(this).attr('target')).show();
});
})( jQuery );


//swiper product

if(window.innerWidth >= 576){
    var slidesPerView = 3;
    if(window.innerWidth >= 768){
        var slidesPerView = 4;
    }
}
if(window.innerWidth < 576){
    var slidesPerView = 2;
}
var swiperProduct = new Swiper(".productSwiper", {
    slidesPerView: slidesPerView,
    // direction: getDirection(),
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

//swiper Video
var swiperVideo = new Swiper(".videoSwiper", {
    slidesPerView: 3,
    direction: getDirection(),
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    on: {
        resize: function () {
            swiperVideo.changeDirection(getDirection());
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
// textmore__block--content
if($(".textmore__block .textmore__block--content1 p").height() <= 120){
    $(".textmore__block--content1 .textmore__block--overlay").css("display","none");
    $(".textmore__block--content1").css("height","fit-content");
    $(".textmore__block .textmore__block--button1").css("display","none");
}
if($(".textmore__block .textmore__block--content2 p").height() <= 720){
    $(".textmore__block--content2 .textmore__block--overlay").css("display","none");
    $(".textmore__block--content2").css("height","fit-content");
    $(".textmore__block .textmore__block--button2").css("display","none");
}
$(".textmore__block .textmore__block--button").click(function () {
    $(this).closest('.textmore__block').find('.textmore__block--content').css("height",$(this).closest('.textmore__block').find('.textmore__block--content p').height());
    $(this).closest('.textmore__block').find('.textmore__block--overlay').css("display","none");
    $(this).css("display","none");
});

// time voucher
(function( $ ){

    var time_start = new Date("December 19, 2021 00:00:00").getTime();

    var time_now = new Date().getTime();

    var distance = (86400000 * 3) - (time_now - time_start ) % (86400000 * 3);
    // Time calculations for days, hours, minutes and seconds
    var d_voucher = Math.floor(distance / 86400000);
    var h_voucher = Math.floor((distance % 86400000) / 3600000);
    var m_voucher = Math.floor(((distance % 86400000) % 3600000) / 60000);
    var s_voucher = Math.floor(distance % 86400000 % 3600000 % 60000 / 1000);
    function start_timte_voucher(){
        if(d_voucher == 3){
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
            d_voucher = 3;
        }
    }
    setInterval(function(){
        start_timte_voucher();
        $('.voucher__block--day').html(d_voucher+'<span>ngày</span>');
        $('.voucher__block--hours').html(h_voucher+'<span>giờ</span>');
        $('.voucher__block--minutes').html(m_voucher+'<span>phút</span>');
        $('.voucher__block--seconds').html(s_voucher+'<span>giây</span>');
        s_voucher--;
    }, 1000);

})( jQuery );

(function( $ ){
    $(".product__select--image").css({
        "height": $('.product__select--image').width() ,
    })
    $(".product__detail--image").css({
        "height": $('.product__detail--swiper2').width() ,
    })
    $(".news__block .news__block--img img").css({
        "height": $('.news__block .news__block--img img').width() ,
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

