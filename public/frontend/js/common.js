
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
    // var d_voucher = null;
    // var h_voucher;
    // var m_voucher;
    // var s_voucher;
    // function start_timte_voucher(){
    //     if(d_voucher == null){
    //         d_voucher = 2;
    //         h_voucher = 23;
    //         m_voucher = 59;
    //         s_voucher = 60;
    //     }

    //     if (h_voucher == -1){
    //         d_voucher = -1;
    //         h_voucher = 23;
    //     }
    
    //     if (m_voucher == -1){
    //         h_voucher -= 1;
    //         m_voucher = 59;
    //     }

    //     if (s_voucher == -1){
    //         m_voucher -= 1;
    //         s_voucher = 59;
    //     }

    //     if (d_voucher == -1){
    //         d_voucher = null;
    //     }
    //     s_voucher--;
    // }
    // setInterval(function(){
    //     start_timte_voucher();
    //     $('.voucher__block--day').text(d_voucher);
    //     $('.voucher__block--hours').text(h_voucher);
    //     $('.voucher__block--minutes').text(m_voucher);
    //     $('.voucher__block--seconds').text(s_voucher);
    // }, 1000);
// readMore btn
    // Set the date we're counting down to
    var time_start = new Date("December 11, 2021 00:00:00").getTime();

    // Update the count down every 1 second
    // setInterval(function() {

    // Get today's date and time
    var time_now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = time_now - time_start ;

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