$(function(){

  // ======================================
  // ヘッダー
  // ======================================
  $(window).scroll(function () {
    if ($(this).scrollTop() > 150) {
      $('#site-header').addClass('is-show');
    } else {
      $('#site-header').removeClass('is-show');
    }
  });
  
  // ======================================
  // ハンバーガーアイコン
  // ======================================
  var state = false;
  var scrollpos;
  var naviTarget = '.m-header__navi';

  function menuOpen() {
    if(state == false) {
      scrollpos = $(window).scrollTop();
      $('body').addClass('fixed').css({'top': -scrollpos});
      $(naviTarget).fadeIn();
      $('.m-hamburger').addClass('open');
      state = true;
    } else {
      $('body').removeClass('fixed').css({'top': 0});
      window.scrollTo( 0 , scrollpos );
      $(naviTarget).fadeOut();
      $('.m-hamburger').removeClass('open');
      state = false;
    }
    return false;
  }

  $('.m-hamburger').on('click', function() {
    menuOpen();
  });

  var w = $(window).width();
	var x = 799;

	if (w <= x) {
    //スマホ時のみ動作
    $(naviTarget + ' a').on('click', function() {
      // menuOpen();
    });
  } else {
    //PC時のみ動作
  }

  
});

const animFadeUp = gsap.utils.toArray(".animFadeUp");
animFadeUp.forEach((el, index) => {
  let dataDelay = el.dataset.delay || 0;
  gsap.from(el, {
    opacity: 0,
    y: 50,
    duration: 1,
    delay: dataDelay,
    scrollTrigger: {
      // invalidateOnRefresh: true,
      trigger: el,
      start: 'top bottom',
      // toggleActions: 'play none none reverse',
      // markers: true,
      toggleClass: {
        targets: el,
        className: "is-animated",
      },
      once: true,
    },
  });
});

ScrollTrigger.batch(".animFadeUp-list > *", {
  // interval: 0.1, // time window (in seconds) for batching to occur. 
  // batchMax: 3,   // maximum batch size (targets)
  onEnter: batch => gsap.from(batch, {
    opacity: 0,
    y: 50,
    duration: 1,
    stagger: 0.2
  }),
  toggleClass: "is-animated",
  once: true,
});


$(document).ready(function(){

  var w = $(window).width();
	var x = 600;
  
  // ======================================
  // 背景ビデオ
  // ======================================
  // function positionVideo(){
	// 	$("#hero-video").css({
	// 		"margin-top": -$("#hero-video").innerHeight()/2
	// 	});
	// }

	// function showVideo(){
	// 	$(".mod-video ").removeClass('off');
  //   if (w >= x) {
	// 	  positionVideo();
  //   }
	// }
  
  // if (w >= x) {
  //   $(window).resize(positionVideo);
  // }

  // showVideo();
  
  // ======================================
  // スムーススクロール
  // ======================================
	if (w < x) {
    //スマホ時
    var scrollAdjust = 0;
  } else {
    //PC時
    var scrollAdjust = 0;
  }

  var urlHash = location.hash;
  if(urlHash) {
    $('body,html').stop().scrollTop(0);
    setTimeout(function () {
      scrollToAnker(urlHash) ;
    }, 100);
  }

  //通常のクリック時
  $('a[href^="#"]').click(function() {
    var href= $(this).attr("href");
    var hash = href == "#" || href == "" ? 'html' : href;
    scrollToAnker(hash);
    return false;
  });

  // 指定したアンカー(#ID)へアニメーションでスクロール
  function scrollToAnker(hash) {
    var target = $(hash);
    var position = target.offset().top - scrollAdjust;
    $('body,html').stop().animate({scrollTop:position}, 500);
  }

  //別ページのアンカーリンク ?id=○○ で遷移
  $(window).on('load', function() {
    var url = $(location).attr('href');
    if(url.indexOf("?id=") != -1){
      var id = url.split("?id=");
      var $target = $('#' + id[id.length - 1]);
      if($target.length){
        $('body').removeClass('fixed');
        $('.start_overlay').hide();
        var pos = $target.offset().top - scrollAdjust;
        $("html, body").animate({scrollTop:pos}, 1000);
      }
    }
  });

});


// ======================================
// ローディング
// ======================================
// $(window).on('load',function () {
//   endLoading();
// });

// //ローディング非表示処理
// function endLoading(){
//   $('#loading .loading-wrap').fadeOut(1000, function(){
//     $('#loading').fadeOut(500);
//   });
// }