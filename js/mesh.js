jQuery(document).ready(function($){

 

  //Let's do something awesome!

  Macy.init({
    container: '#macy',
    trueOrder: true,
    waitForImages: false,
    margin: 0,
    columns: 5,
    breakAt: {
        //1200: ,
        950: 2,
        520: 1,
        //400: 1
    }
    });


  //Homepage parallax

  var windowW = $(window).width();
  
  if (windowW > 768){
  $('.panel').each(function(i){
      i = i++;
      $(this).parallax("50%", .05);
    });   

  $('.has-parallax').parallax("50%",.5);
  }

  $('#masonry').masonry({
  // set itemSelector so .grid-sizer is not used in layout
  itemSelector: '[class*="columns-"]',
  // use element for option
  columnWidth: 160,
  percentPosition: true
	});

  //Force divs in homepage grid to be square

  var gi2, gi3, gi4, gi5, gi6, gi7, cp5, cp6, cp7;

function gi_resize(){
  gi2 = $('.grid-item-width2 ').width();
  gi3 = $('.grid-item-width3 ').width();
  //console.log(gi3);
  gi4 = $('.grid-item-width4 ').width();
  gi5 = $('.grid-item-width5 ').width();
  gi6 = $('.grid-item-width6 ').width();
  gi7 = $('.grid-item-width7 ').width();
  cp5 = $('.columns-5').width();
  cp6 =  $('.columns-6.eq ').width();
  console.log(cp6);
  //cp6_alt = $('.columns-6')
  cp7 = $('.columns-7.trip').width();
  //return gi2, gi3, gi4;
}
 $(document).ready(gi_resize(gi2, gi3, gi4, gi5, gi6, gi7, cp5, cp6, cp7));
 $(window).resize(gi_resize(gi2, gi3, gi4, gi5, gi6, gi7, cp5, cp6, cp7));

function _resize(){
  gi_resize(gi2, gi3, gi4, gi5, gi6, gi7, cp5, cp6, cp7);
   $(window).resize(gi_resize(gi2, gi3, gi4, gi5, gi6, gi7, cp5, cp6, cp7));

 //  console.log("Width 2: "+gi2);
	// console.log("Width 3: "+gi3);
	//  console.log("Width 4: "+gi4);
  $('.grid-item-width2').css({height: (gi2)});
  $('.grid-item-width2.nest').css({height: (gi2*2)});
  $('.grid-item-width2.nest .nested').css({height: gi2});
  $('.grid-item-width3').css({height: gi3});
  $('.grid-item-width4').css({height: gi4});
  $('.grid-item-width5').css({height: gi5})
  $('.grid-item-width6').css({height: (gi6*.66)});
  $('.width6-diamond').css({height: (gi6*0.4)});
  $('.columns-6.promo').css({height: (cp6*.5)});
  $('.columns-6.cpromo').css({height: (cp6*.66)});
  //console.log(cp6*.66);
  $('.columns-6 .width6-diamond').css({height: (cp6*0.4)});
  $('.columns-5.event-feed').css({height: (cp5)});
  $('.columns-7.trip').css({height: cp5});
  $('.grid-item-width6.nest').css({height: gi2});
  $('.grid-item-width6.nest .nested').css({height: gi2});
  $('.grid-item-width7').css({height: (gi5)});

}

_resize();
$(window).resize(_resize);

$('#packery').packery({
  itemSelector: '.grid-item',
  percentPosition: true
});

$('#monthselectors a').on('click', function(){
  $('a.active_month').removeClass('active_month');
  $(this).addClass('active_month');
});

// $(".monthscrolltrigger").each(function(index, element){
//   $(this).click(function(){
//     TweenMax.to(window, 0.5, {scrollTo:{y:"#section" + (index+1)}});
//   })
// })
var $menu = $("#monthselectors"),
    $window = $(window);

$menu.on("click","a", function(){
    var $this = $(this),
        href = $this.attr("href"),
        topY = $(href).offset().top;
    TweenMax.to($window, 1, {scrollTo:{y:(topY-40), autoKill: true}, ease:Power3.easeInOut});
  
  return false;
});

//google map api key: AIzaSyCpTB55GXBBqmS_nEt_XH_HKGf_mSTQUY8

});
