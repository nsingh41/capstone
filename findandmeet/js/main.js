(function ($) {
	"use strict";
    
    //document ready function
    jQuery(document).ready(function($){
/*-----
Bootstrap carousel active
----------------------*/ 
        var BlackCarousel = $('.carousel');
        BlackCarousel.carousel({
          interval: 6000,
        });
        
         BlackCarousel.carousel('cycle')
        


    });//End document ready function
   


}(jQuery));	


