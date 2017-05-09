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
  var _windowResize;
 //Calculate window size 
//$(window).resize(
    function _resizeW(){
      _windowResize = $(window).width();
      console.log(_windowResize);
      _bodyResize = $('body').width();
      //console.log(_windowResize);
  // if (_windowResize > 1070){
  //       //console.log(_windowResize);
  //       $('.has-parallax').parallax("50%",.5);
  //     }  
}

_resizeW(_windowResize);
$(window).resize(_resizeW(_windowResize));

function _parallax(e){
  _resizeW(_windowResize);
  $(window).resize(_resizeW(_windowResize));
  if(_windowResize > 1000){
    $('.has-parallax').parallax("50%",.5);
  }else{
    $('.has-parallax').removeClass('has-parallax');
  }
}

_parallax();
$(window).resize(_parallax);

//Run funciton on load and resize
//$(document).ready(_resizeW(_windowResize));
//$(window).resize(console.log(_bodyResize));




  // if (windowW > 1070){
  //   $('.panel').each(function(i){
  //       i = i++;
  //       $(this).parallax("50%", .05);
  //     });   

  //   $('.has-parallax').parallax("50%",.5);
  // }

  $('#masonry').masonry({
  // set itemSelector so .grid-sizer is not used in layout
  itemSelector: '[class*="columns-"]',
  // use element for option
  columnWidth: 160,
  percentPosition: true
	});

  //Force divs in homepage grid to be square
//Setup variables to hold our sizes
var gi2, gi3, gi4, gi5, gi6, gi7, cp4, cp5, cp6, cp7;

//Grab the width of each element
function gi_resize(){
  gi2 = $('.grid-item-width2 ').width();
  gi3 = $('.grid-item-width3 ').width();
  //console.log(gi3);
  gi4 = $('.grid-item-width4 ').width();
  gi5 = $('.grid-item-width5 ').width();
  gi6 = $('.grid-item-width6 ').width();
  gi7 = $('.grid-item-width7 ').width();
  cp4 = $('.columns-4').width();
  cp5 = $('.columns-5').width();
  cp6 =  $('.columns-6.eq ').width();
  //console.log(cp6);
  //cp6_alt = $('.columns-6')
  cp7 = $('.columns-7.trip').width();
  //return gi2, gi3, gi4;
}
//Run the function above at document ready and on a window resize event
 $(document).ready(gi_resize(gi2, gi3, gi4, gi5, gi6, gi7, cp4, cp5, cp6, cp7));
 $(window).resize(gi_resize(gi2, gi3, gi4, gi5, gi6, gi7, cp4, cp5, cp6, cp7));

//Apply our widths to the height of selected elements either on load, or on resize
function _resize(){
  gi_resize(gi2, gi3, gi4, gi5, gi6, gi7, cp4, cp5, cp6, cp7);
   $(window).resize(gi_resize(gi2, gi3, gi4, gi5, gi6, gi7, cp4, cp5, cp6, cp7));

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
  $('.columns-4.child-links').css({height:cp4});
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

//Run the function on load & on resize
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

//Smooth page scroll + page scroll location control
$(function() {
$('a[href*=#]:not([href=#])').click(function() {
if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
  var target = $(this.hash);
  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
  if (target.length) {
    //alert("BAMM!");
    $('html,body').animate({
      //'top-75' is custom.  limits the offset to top of window plus 75px
      scrollTop: (target.offset().top-75)
    }, 800);
    return false;
  }
}
});
});

// $(function(){
//     $(document).scroll(function(){
//         if($(this).scrollTop() >= $('.listing').offset().top - 50) {
//             $(".listing").css("background","red");
//         } else {
//             $(".listing").css("background","orange");
//         }
//     });
// });


// var $menu = $("#monthselectors"),
//     $window = $(window);

// $menu.on("click","a", function(){
//     var $this = $(this),
//         href = $this.attr("href"),
//         topY = $(href).offset().top;
//     TweenMax.to($window, 1, {scrollTo:{y:(topY-40), autoKill: true}, ease:Power3.easeInOut});
  
//   return false;
// });

 (function($) {
  $.fn.yellowFade = function() {
    return (this.css({backgroundColor: "#ffff66"}).animate(
    {backgroundColor: "#ffffff"}, 1000));
  }
  })(jQuery);

// If there is a '#' in the URL (someone linking directly to a page with an anchor), highlight that section and set focus to it.
  // The tabindex attribute is removed AFTER the user navigates away from the element to help address a nasty VoiceOver bug.
  
  if (document.location.hash) {
    var myAnchor = document.location.hash;
    $(myAnchor).attr('tabindex', -1).on('blur focusout', function () {
      $(this).removeAttr('tabindex');
    }).focus(function(){
      $(this).removeClass("redFade");
      setTimeout(function() {
        $(this).addClass("redFade");
    }, 1);    });//.addClass('yellowFade');//.delay(50).removeClass('yellowFade');
  }
  
  /* This function looks for a change in the hash (activation of an in-page link) and sets focus to and 
  highlights the target element. This is necessary because webkit does not set focus as it should. If 
  the hash is empty (the user hit the back button after activating an in-page link) focus is set to body.
  */
  $(window).bind('hashchange', function() {
    var hash = "#"+window.location.hash.replace(/^#/,'');
    if (hash!="#") {
      $(hash).attr('tabindex', -1).on('blur focusout', function () {
        $(this).removeAttr('tabindex');
      }).focus().addClass('redFade');
    }
    else {
      $("#headcontainer").attr('tabindex', -1).on('blur focusout', function () {
        $(this).removeAttr('tabindex');
      }).focus();
    }
  });

$('.with-map').hover(function(){
  //console.log('Map hovered');
  //$('.banner-content').slideDown(50);
  setTimeout(function() {
  $('.banner-content').animate({
    position:'absolute',
    bottom:'-500px',
    opacity:'0'
  },400);
}, 500);
},function(){
  setTimeout(function() {
   //$('.banner-content').slideDown(50);
   $('.banner-content').animate({
    position:'relative',
    bottom:'',
    opacity:'1'
  },400);
  }, 300);
}); 

if (windowW > 768){
$('.with-map').click(function(){
  //console.log('Map hovered');
  //$('.banner-content').slideDown(50);
  setTimeout(function() {
  $('.banner-content').animate({
    position:'absolute',
    bottom:'-500px',
    opacity:'0'
  },400);
}, 500);
},function(){
  setTimeout(function() {
   //$('.banner-content').slideDown(50);
   $('.banner-content').animate({
    position:'relative',
    bottom:'',
    opacity:'1'
  },400);
  }, 300);
}); 
}
//Full Map Color Key functionality
var $ctr=0;
$('.legend-title').click(function(){

  $ctr++;
  console.log($ctr);
  if($ctr==1){
    $('.map-key').slideDown(100);
    $('.map-key').addClass('open');
    $(this).animate({'margin-bottom':'.5em'}, 50);
    $('.indicator')
        .css({
        '-moz-transform':'rotate(90deg)',
        '-webkit-transform':'rotate(90deg)',
        '-o-transform':'rotate(90deg)',
        '-ms-transform':'rotate(90deg)',
        'transform':'rotate(90deg)'
      })
  }else{
    $ctr=0;
     $('.map-key').slideUp(100);
     $('.map-key').removeClass('open');
     $(this).animate({'margin-bottom':'0'}, 50);
     $('.indicator')
        .css({
        '-moz-transform':'rotate(-90deg)',
        '-webkit-transform':'rotate(-90deg)',
        '-o-transform':'rotate(-90deg)',
        '-ms-transform':'rotate(-90deg)',
        'transform':'rotate(-90deg)'
      })
  }
})

//google map api key: AIzaSyCpTB55GXBBqmS_nEt_XH_HKGf_mSTQUY8

//Sidr
$('.sidr-trigger').sidr({
      name: 'sidr-main',
      source: '.main-navigation, .gateway-nav',
      renaming: false,
      side: 'right',
      displace: false,      
      onOpen: function(){

        $('.sidr-trigger').animate({right:"20000"},50);
          $clk = 0;
        
        $('.sidr .open').click(function(){
            $clk++;
            
            //Set every .sub-menu back to initial state on click
            if($clk == 1){
                $('ul.sub-menu')
                  //.slideUp()
                  .removeClass('sidr-active');
                //
                $(this).find('i img')
                  .css({
                  '-moz-transform':'rotate(180deg)',
                  '-webkit-transform':'rotate(180deg)',
                  '-o-transform':'rotate(180deg)',
                  '-ms-transform':'rotate(180deg)',
                  'transform':'rotate(180deg)'
                })
                
                //On click find the nearest ul.sub-menu and open it
                $(this)
                  .closest('li')
                  .find('ul.sub-menu')
                  .addClass('sidr-active')
                  .slideDown();
                //On click find the .open button and change the symbol from closed to open
          
            }else{
              $clk = 0;
              //$('ul.sub-menu').slideUp();
              
              $('ul.sub-menu').slideUp();

              $(this).find('i img')
              .css({
                  '-moz-transform':'rotate(0)',
                  '-webkit-transform':'rotate(0)',
                  '-o-transform':'rotate(0)',
                  '-ms-transform':'rotate(0)',
                  'transform':'rotate(0)'
              });
            }//end else

        }); //end .sidr .open function
      }////end sidr onOpen function

});//end sidr onOpen function

$('.close').click(
    function(){
      $.sidr('close', 'sidr-main');
      $('.sidr-trigger').animate({right:"2em"},50);
});

//IDs would be re-used in sidr, as it is cloning our global nav
//For the sake of accessibility, we are removing IDs in the sidr menu
$('.sidr li').removeAttr('id');

$('.sidr ul.menu > li')
  .has('.sub-menu')
  .find('a:first')
  .after('<div class="open"><i class="arrow-icon"><img src="'+$dir+'/img/sidr-down-arrow.png" alt="Press to show or hide more links"></i></div>');//&#10148;
  //.after('<div class="open"><i class="fa fa-fw fa-3x fa-angle-down"></i></div>');


});
