jQuery(document).ready(function($){

  //Are we loaded?
  console.log('New theme loaded!');

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

  $('#masonry').masonry({
  // set itemSelector so .grid-sizer is not used in layout
  itemSelector: '[class*="columns-"]',
  // use element for option
  columnWidth: 160,
  percentPosition: true
	});

  $('#packery').packery({
  itemSelector: '.grid-item',
  percentPosition: true
});

  //Force divs in homepage grid to be square

  var gi2, gi3, gi4;

function gi_resize(){
  gi2 = $('.grid-item-width2').width();
  gi3 = $('.grid-item-width3').width();
  gi4 = $('.grid-item-width4').width();
  //return gi2, gi3, gi4;
}
 $(document).ready(gi_resize(gi2, gi3, gi4));
 $(window).resize(gi_resize(gi2, gi3, gi4));

function _resize(){
  gi_resize(gi2, gi3, gi4);
   $(window).resize(gi_resize(gi2, gi3, gi4));

  console.log("Width 2: "+gi2);
	console.log("Width 3: "+gi3);
	 console.log("Width 4: "+gi4);
  $('.grid-item-width2').css({height: gi2});
  $('.grid-item-width3').css({height: gi3});
  $('.grid-item-width4').css({height: gi4});

}

_resize();
$(window).resize(_resize);

});
