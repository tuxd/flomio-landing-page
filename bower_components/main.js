/*! viewportSize | Author: Tyson Matanich, 2013 | License: MIT */
// (function(n){n.viewportSize={},n.viewportSize.getHeight=function(){return t("Height")},n.viewportSize.getWidth=function(){return t("Width")};var t=function(t){var f,o=t.toLowerCase(),e=n.document,i=e.documentElement,r,u;return n["inner"+t]===undefined?f=i["client"+t]:n["inner"+t]!=i["client"+t]?(r=e.createElement("body"),r.id="vpw-test-b",r.style.cssText="overflow:scroll",u=e.createElement("div"),u.id="vpw-test-d",u.style.cssText="position:absolute;top:-1000px",u.innerHTML="<style>@media("+o+":"+i["client"+t]+"px){body#vpw-test-b div#vpw-test-d{"+o+":7px!important}}<\/style>",r.appendChild(u),i.insertBefore(r,e.head),f=u["offset"+t]==7?i["client"+t]:n["inner"+t],i.removeChild(r)):f=n["inner"+t],f}})(this);

 /**
 * This demo was prepared for you by Petr Tichy - Ihatetomatoes.net
 * Want to see more similar demos and tutorials?
 * Help by spreading the word about Ihatetomatoes blog.
 * Facebook - https://www.facebook.com/ihatetomatoesblog
 * Twitter - https://twitter.com/ihatetomatoes
 * Google+ - https://plus.google.com/u/0/109859280204979591787/about
 * Article URL: http://ihatetomatoes.net/how-to-create-a-parallax-scrolling-website-part-2/
 */

// ( function( $ ) {
	

//  	htmlbody = $('html,body');

// 		function jumpToSection(ind){

// 			index = ind;
// 			scrollToSlide(ind);
// 		}

// 		$("#buttonRow-fixed .row > div").click(function(){
// 			var clickInd = $(this).index() +3;
// 			jumpToSection(clickInd);
// 		});
// 		$("#buttonRow > div").click(function(){
// 			var clickInd = $(this).index() +3;
// 			jumpToSection(clickInd);
// 		});
	    
	    
// 		function scrollToSlide(slideId){
			
// 			// Custom slide content offset
// 		    var customSlideOffset = $("#slide-"+slideId).attr('data-content-offset');
		    
		    
// 		    // Scroll to the top of a container if it doesn't have custom offset defined
// 		    if(typeof customSlideOffset === 'undefined'){
		        
// 		        htmlbody.animate({scrollTop: ($("#slide-"+slideId).offset().top) + 'px'},'slow');
		        
// 		    } else {
		        
// 		        // Convert percentage 'eg. 25p' into pixels
// 		        if(customSlideOffset.indexOf('p')!=-1) {
			       
// 			       var customSlideOffset = parseInt(customSlideOffset.split('p')[0]);
// 				   var slideHeight = $slide.height();
				   
// 				   customSlideOffset = Math.ceil((slideHeight/100) * customSlideOffset);
				   
// 				   //console.log(slideHeight +' '+ customSlideOffset);
				   
// 				   htmlbody.animate({scrollTop: ($("#slide-"+slideId).offset().top + customSlideOffset) + 'px'},'slow');
			        
// 		        } else {
			       
// 			       var customSlideOffset = parseInt(customSlideOffset);
			       
// 			       htmlbody.animate({scrollTop: ($("#slide-"+slideId).offset().top + customSlideOffset) + 'px'},'slow');
			        
// 		        }
		    
// 		    }
// 		}
	
//   $(document).foundation();

		
// } )( jQuery );