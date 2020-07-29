equalheight = function(container){

var currentTallest = 0,
     currentRowStart = 0,
     rowDivs = new Array(),
     $el,
     topPosition = 0;
 jQuery(container).each(function() {

   $el = jQuery(this);
   jQuery($el).height('auto')
   topPostion = $el.position().top;

   if (currentRowStart != topPostion) {
     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
       rowDivs[currentDiv].height(currentTallest);
     }
     rowDivs.length = 0; // empty the array
     currentRowStart = topPostion;
     currentTallest = $el.height();
     rowDivs.push($el);
   } else {
     rowDivs.push($el);
     currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
  }
   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
     rowDivs[currentDiv].height(currentTallest);
   }
 });
}

jQuery(window).load(function() {
	if(jQuery(window).width() > 767){
		equalheight('.service_area .service_wraper');
	}
});


jQuery(window).resize(function(){
  if(jQuery(window).width() > 767){
		equalheight('.service_area .service_wraper');
	}
});

jQuery(window).scroll(function() { 
  var height = jQuery(window).scrollTop();
  if(height  > 100) {
    jQuery(".site-masthead").addClass('dark_head');
  } else{
    jQuery(".site-masthead").removeClass('dark_head');
  }
});


jQuery(function($){
	$('.both-line.fancy').each(function() {
        $(this).wrapInner('<span />');
  });

  $('.ftr_mdll_container aside').each(function() {
      if( $(this).index() == 1){
        $(this).find('h3.widget-title').html(function (i, t) {
          var words = t.split(/\s+/)
          return "<span>" + words.slice(0,2).join(" ") + "</span> " + words.slice(2).join(" ");
        });
      }else{
        $(this).find('h3.widget-title').html(function (i, t) {
          var words = t.split(/\s+/)
          return "<span>" + words.slice(0,1).join(" ") + "</span> " + words.slice(1).join(" ");
        });
      }
   });	
});

