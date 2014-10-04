<?php /**
 * Template Name: Home-Parallax
 *
 * Description: A home page template for the Flomio site.
 *
 * @package WordPress
 * @subpackage Propulsion
 * 
 */
	
	global $avia_config;
	 /* 
	  * create a new dynamic template object and display it.
	  * The rendering class is located in includes/helper-templates.php
	  */
	 $post_id = avia_get_the_ID();
	 $template_name = avia_post_meta($post_id, 'dynamic_templates');	 
 	 $template = new avia_dynamic_template($template_name);
 	
 	 $template -> set_layout();
 	 $template -> generate_html();
 	 $template -> special_slider_config();	 
	 $style = avia_get_option('boxed','stretched'); 
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php echo avia_get_browser('class', true); echo " html_$style";?> ">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php
	/*
	 * outputs a rel=follow or nofollow tag to circumvent google duplicate content for archives
	 * located in framework/php/function-set-avia-frontend.php
	 */
	 if (function_exists('avia_set_follow') && empty($avia_config['deactivate_seo'])) { echo avia_set_follow(); }


	 /*
	 * outputs a favicon if defined
	 */
	 if (function_exists('avia_favicon'))    { echo avia_favicon(avia_get_option('favicon')); }

	echo "\n\n\n<!-- page title, displayed in your browser bar -->\n";

	if(!empty($avia_config['deactivate_seo']))
	{
		$avia_page_title = wp_title('', false);
	}
	else
	{
		$avia_page_title = get_bloginfo('name') . ' | ' . (is_home() ? get_bloginfo('description') : wp_title('', false));
	}

	echo "<title>$avia_page_title</title>";
?>


<!-- add feeds, pingback and stuff-->
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> RSS2 Feed" href="<?php avia_option('feedburner',get_bloginfo('rss2_url')); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


<!-- add css stylesheets -->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/grid.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/base.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/layout.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/slideshow.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/shortcodes.css" type="text/css" media="screen"/>




<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/js/projekktor/theme/style.css" type="text/css" media="screen"/>

<!-- NEW CSS -->
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/app.min.css?v1.3.8" type="text/css" media="screen"/>

<!-- mobile setting -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<?php

	/* add javascript */
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'avia-default' );
	wp_enqueue_script( 'avia-prettyPhoto' );
	wp_enqueue_script( 'avia-html5-video' );
	wp_enqueue_script( 'adaptavia-slider' );


	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }

?>

<!-- plugin and theme output with wp_head() -->
<?php

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */

	wp_head();
?>


<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/custom.css" type="text/css" media="screen"/>

</head>


<body>

<div id="loader">
	<span class="helper"></span>
	<img src="<?php echo get_bloginfo('template_url'); ?>/images/landing/ajax-loader.gif"/>
</div>
  <div id="top">
  <div id="skrollr-body">

  <div id="buttonRow-fixed">
		<div class="row clearfix">
		    <div href="#" class="columns small-6 large-3 button green"
		    data-top="margin-top:0px;" data-200-top="margin-top:1500px;" data-anchor-target="#slide-2">
		    	<span class="icon-tags icon"></span><p>Tags</p>
		    </div>
		    <div class="columns small-6 large-3 button component blue"
		    data-top="margin-top:0px;" data-200-top="margin-top:1500px;" data-anchor-target="#slide-2">
		    	<span class="icon-book icon"></span><p>Readers</p>
		    </div>
		    <div class="columns small-6 large-3 button component yellow"
		    data-top="margin-top:0px;" data-200-top="margin-top:1500px;" data-anchor-target="#slide-2">
		    	<span class="icon-keyboard-o icon"></span><p>Middleware</p>
		    </div>
		    <div class="columns small-6 large-3 button component red"
		    data-top="margin-top:0px;" data-200-top="margin-top:1500px;" data-anchor-target="#slide-2">
		    	<span class="icon-globe icon"></span><p>Web Services</p>
		    </div>
		</div>
	</div>

	<div id='wrap_all'>

			<?php
			$position = avia_shop_banner();
			avia_banner($position);   // avia_banner functions located in functions.php - creates the notification at the top of the site as well as the shopping cart
			?>

<!-- ####### HEAD CONTAINER ####### -->

<div class='container_wrap' id='header'>

	<div class='container' style='border-bottom: initial;'>

		<?php
		/*
		*	display the main navigation menu
		*   check if a description for submenu items was added and change the menu class accordingly
		*   modify the output in your wordpress admin backend at appearance->menu
		*/
		echo "<div class='main_menu' data-selectname='".__('Select a page','avia_framework')."' style='float:right;top:inherit;'>";
		/*  Grundy: swapped this line for a hardcoded nav bar just for Home page
		$args = array('theme_location'=>'avia', 'fallback_cb' => 'avia_fallback_menu', 'max_columns'=>4);
		*/
		wp_nav_menu(array('menu'=>'MAIN MENU P2', 'menu_id'=>'main_menu', 'max_columns'=>4));
		echo "</div>";
		if(isset($avia_config['new_query'])) { query_posts($avia_config['new_query']); the_post(); }
		
		/*
		*	display the theme logo by checking if the default css defined logo was overwritten in the backend.
		*   the function is located at framework/php/function-set-avia-frontend-functions.php in case you need to edit the output
		*/
		echo avia_logo(AVIA_BASE_URL.'images/layout/logo.png');
		?>

	</div><!-- end container-->
</div><!-- end container_wrap-->

<!-- ####### END HEAD CONTAINER ####### -->

<!-- ####### MAIN CONTAINER ####### -->
<div class='container_wrap <?php echo $avia_config['layout']; ?>' id='main'>

		<!-- SKROLLR SECTIONS -->

		<main>
	        <section id="slide-1" class="homeSlide">
        		<div class="row padding1">
		    			<h2 class="text-left easier-way" style="margin-top: -25px;">An easier way to <strong>play</strong>.</h2>
		    		</div>

		    		<div class="iphone-touch" id="iphone-touch" style="height: 230px;">
              
              <img src="<?php echo get_bloginfo('template_url'); ?>/images/landing/iphone6-hand.jpg"  data--300-top="transform: translate(400px,0px)" data-100-top="transform: translate(0px,0px)" data-300-top="transform: translate(200px,0px)" class="hand"/>

              <img src="<?php echo get_bloginfo('template_url'); ?>/images/landing/reader-on.jpg" data-300-top="opacity:0" data--300-top="opacity:0" data-100-top="opacity:1" class="reader"/>

              <img src="<?php echo get_bloginfo('template_url'); ?>/images/landing/reader-off.jpg" class="reader-off"/>

            </div>

            <div class="row padding1" data-start="opacity: 1;" data-anchor-target="#slide-1">
		    			<h3 style="margin-top:20px;">We help developers integrate <strong>proximity ID technologies</strong>.</h3>
            	<div class="contact-us-box-home" style="margin: inherit;">
		    		  	<h3><a title="Learn more" href="what-is-nfc">Start using NFC, BLE, and UHF RFID today.</a></h3>
		    			</div>
		    		</div>

		    </section>
       	 
		    
		    <section id="slide-2" class="homeSlide">   
		    	<div class="bcg" data-100-top="background-position: 50% -30px;" data-top-bottom="background-position: 50% 80px;" data-anchor-target="#slide-2">

		    		<div class="row fourthings padding1">

		    			<div class="columns small-12 small-centered large-uncentered">
			    			<h2 data-400-top="opacity: 0;" data-top="opacity: 1;" data-smooth-scrolling="true" data-anchor-target="#slide-2">Most <strong>proximity ID</strong> applications are built with the<br /><strong>same four components</strong>.</h2>

						<div class="row clearfix" id="buttonRow">
						    <div href="#" class="columns small-6 large-3 button green"><span class="icon-tags icon"></span><p>Tags</p></div>
						    <div class="columns small-6 large-3 button component blue"><span class="icon-book icon"></span><p>Readers</p></div>
						    <div class="columns small-6 large-3 button component yellow"><span class="icon-keyboard-o icon"></span><p>Middleware</p></div>
						    <div class="columns small-6 large-3 button component red"><span class="icon-globe icon"></span><p>Web Services</p></div>
						</div>
            
			    			<div class="columns small-12 small-centered youtube-video">
			    		<!--	
			    				<iframe width="100%" height="100%" src="//www.youtube.com/embed/7BXBH0CgvT8" frameborder="0" allowfullscreen></iframe>-->

			    				<embed id="usecase-video" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen allowfullscreen="true" allowscriptaccess="always" quality="high" bgcolor="#000000" name="my-video" style="" src="http://www.youtube.com/v/7BXBH0CgvT8?enablejsapi=1&version=3&playerapiid=ytplayer" type="application/x-shockwave-flash">
			    			</div>

			    			<h3 style="width: 105%; margin-left: -15px;">
                      Tag along with Virginia and see components in action...
                  </h3>

						</div>
						
					</div>
				</div>
		    </section>

		    <section id="slide-3" class="homeSlide" data-400-top="background-color:rgb(0,0,0);" data-top="background-color:rgb(202,203,205);" data-anchor-target="#slide-3">

		    		<img src="<?php echo get_bloginfo('template_url'); ?>/images/landing/tags-vip.png" id="tags-vip" data-bottom="transform: translate(0px,185px)" data-400-top="transform: translate(0px,0px)" data--300-bottom="transform: translate(0px,185px)" data--400-bottom="transform: translate(0px,0px)" data-anchor-target="#slide-3"/>
		    		<img src="<?php echo get_bloginfo('template_url'); ?>/images/landing/tags-phone-green.png" id="tags-phone-green" data-bottom="display:block" data-400-top="display:none" data--300-bottom="display:block" data--400-bottom="display:none" data-anchor-target="#slide-3"/>
						<img src="<?php echo get_bloginfo('template_url'); ?>/images/landing/tags-phone.png" id="tags-phone"/>
						

	    	<div class="row padding1">

					<div class="columns small-12 xlarge-8 minHeight tags-blurb">
						<h2 class="text-left"><span class="icon-tags icon iconBig"></span>Tags</h2>
						<h3 class="text-left">
						Flomio is a Market Leader in tag curation. 
						Strong relations with TI, Kovio, CXJ RFID, NXP, Verayo, GemaTouch and Capift.</h3>

						<div class="tag-examples">
							<a href="http://flomio.com/shop/nfc-tags/flomio-hipstrip-nfc-wristbands/" class="columns small-4"><img src="<?php echo get_bloginfo('template_url'); ?>/images/landing/tags-1.jpg" /></a>
							<a href="http://flomio.com/shop/nfc-tags/printable-nfc-tags-64b/" class="columns small-4"><img src="<?php echo get_bloginfo('template_url'); ?>/images/landing/tags-2.jpg" /></a>
							<a href="http://flomio.com/shop/nfc-tags/nfc-sensor-tags/" class="columns small-4"><img src="<?php echo get_bloginfo('template_url'); ?>/images/landing/tags-3.jpg" /></a>
							<a href="http://flomio.com/shop/nfc-tags/dimensional-nfc-tags/" class="columns small-4"><img src="<?php echo get_bloginfo('template_url'); ?>/images/landing/tags-4.jpg" /></a>
							<a href="http://flomio.com/shop/nfc-tags/nfc-action-cards/" class="columns small-4"><img src="<?php echo get_bloginfo('template_url'); ?>/images/landing/tags-5.jpg" /></a>
							<a href="http://flomio.com/shop/nfc-tags/nfc-inlays-64b/" class="columns small-4"><img src="<?php echo get_bloginfo('template_url'); ?>/images/landing/tags-6.jpg" /></a>
						</div>
					</div>					
				</div>

			</section>

			<section id="slide-4" class="homeSlide">
				<div class="bcg" data-100-top="background-position: 50% -30px;" data-top-bottom="background-position: 50% 80px;" data-anchor-target="#slide-4">
					<div class="row padding1">
			    		<div class="columns xlarge-8 xlarge-push-4">
			    			<h2 class="text-left"><span class="icon-book icon iconBig"></span>Readers</h2>
			    			<h3 class="text-left">Flomio&rsquo;s FloJack is the world&rsquo;s most practical NFC reader. Kickstarter success has driven custom build requests where IP is reused. </h3>
                <h3> We take the time to solve the <strong>hard</strong>(ware) problems so you don't have to. Arduinos are cool but for low power, low cost, and low pain-in-the-butt, nothing beats a tailored product design. </h3>  
			    		</div>
			    	</div>
	    		</div>
			</section>

			<section id="slide-5" class="homeSlide" data-400-top="background-color:rgb(202,203,205);" data-top="background-color:rgb(190,191,193);" data-anchor-target="#slide-5">
				<div class="bcg">
					<div class="row padding1">
						<div class="columns large-6">
							<h2 class="text-left"><span class="icon-keyboard-o icon iconBig"></span>Middleware</h2>
							<h3 class="text-left">
							Flomio&rsquo;s consumer-facing middlewear educates the market and establishes social proof.
							</h3>
						</div>
						<div class="columns small-8 small-centered large-uncentered large-6">
							<img src="<?php echo get_bloginfo('template_url'); ?>/images/landing/middleware.png" id="middleware" data-bottom-top="transform: scale(0.1);" data-top-bottom="transform: scale(0.1);" data-center="transform: scale(1);" data-anchor-target="#slide-5"/>
						</div>
					</div>
					<div class="row">
						<br />
					</div>
			    </div>
			</section>

			<section id="slide-6" class="homeSlide" data-400-top="background-color:rgb(190,191,193);" data-top="background-color:rgb(179,179,181);" data-anchor-target="#slide-6">    
				<div class="bcg">
					<div class="padding1">

						<div class="columns small-12 clearfix title">
			    			<h2 class="text-left clearfix"><span class="icon-globe icon iconBig"></span>Web Services</h2>
			    			<h3 class="text-left clearfix">Flomio has built <strong>NFC+BLE-specific</strong> software that accelerates solution implementation.</h3>
			    		</div>

			    		<div class="columns small-12 clearfix" id="puzzle">
			    			<img src="<?php echo get_bloginfo('template_url'); ?>/images/landing/puzzle-main.png" id="webServices"/>
			    			<img src="<?php echo get_bloginfo('template_url'); ?>/images/landing/puzzle-piece.png" id="webServices-piece" data-bottom-top="transform:perspective(600px) rotateY(-270deg) rotateX(140deg) rotateZ(125deg) translate(-300%,30%); rotate" data-top="transform: perspective(600px) rotateY(0deg) rotateX(0deg) rotateZ(0deg) translate(0%,0%)" data-anchor-target="#slide-6"/>
			    		</div>

			    		<div class="row">
							<br />
						</div>
					</div>
			    </div>
			</section>   
		</main>



				<div class='content <?php echo $avia_config['content_class']; ?> units template-dynamic template-dynamic-<?php echo $template_name; ?>'>
				
				<?php
				
				$template -> element_on_condition('heading', 0, true, false);
				$template -> display();
				
				?>
				
				
				<!--end content-->
				</div>
				
				<?php 

				//get the sidebar
				wp_reset_query();
				
				if(!isset($avia_config['currently_viewing']))
				{
					$avia_config['currently_viewing'] = 'page';
				}
				if($avia_config['layout'] != 'fullsize') get_sidebar();
				
				?>
			</div><!--end container-->
		</div>
	</div>
	<!-- ####### END MAIN CONTAINER ####### -->

<?php get_footer(); ?>
<!--//////////////////////////////////////////-->
<!--//////////////////////////////////////////-->
<!--//////////////////////////////////////////-->
<!--//////////////////////////////////////////-->
<!-- NEW JS FOR SKROLLR -->
<script type='text/javascript' src='<?php echo get_bloginfo('template_url'); ?>/js/app.min.js'></script>
<!--[if lt IE 9]>
    <script type="text/javascript" src="<?php echo get_bloginfo('template_url'); ?>/js/skrollr.ie.min.js"></script>
  <![endif]-->

<?php 

$isMobile = 1;

	if(!is_mobile()){
		$isMobile = 0;
	}

?>

<script>
(function(n){n.viewportSize={},n.viewportSize.getHeight=function(){return t("Height")},n.viewportSize.getWidth=function(){return t("Width")};var t=function(t){var f,o=t.toLowerCase(),e=n.document,i=e.documentElement,r,u;return n["inner"+t]===undefined?f=i["client"+t]:n["inner"+t]!=i["client"+t]?(r=e.createElement("body"),r.id="vpw-test-b",r.style.cssText="overflow:scroll",u=e.createElement("div"),u.id="vpw-test-d",u.style.cssText="position:absolute;top:-1000px",u.innerHTML="<style>@media("+o+":"+i["client"+t]+"px){body#vpw-test-b div#vpw-test-d{"+o+":7px!important}}<\/style>",r.appendChild(u),i.insertBefore(r,e.head),f=u["offset"+t]==7?i["client"+t]:n["inner"+t],i.removeChild(r)):f=n["inner"+t],f}})(this);


  ( function( $ ) {

  	var $window = $(window);
  	var $body = $("main");

  	var halfHeight = $window.height() / 2;

  	$("#loader img").css({ marginTop: (halfHeight - 11) + "px"});

  $body.imagesLoaded( function() {
		setTimeout(function() {
		      // Fade out loader
			  $("#loader").fadeOut("fast", function(){
			  	$(this).remove();
			  });

		}, 800);
	});

  var $window = $(window);

    resizeSlides();
  //  centerSecondFrame();

  	htmlbody = $('html,body');

		function jumpToSection(ind){
			index = ind;
			scrollToSlide(ind);
		}

		$("#buttonRow-fixed .row > div").click(function(){
			var clickInd = $(this).index() +3;
			jumpToSection(clickInd);
		});
		$("#buttonRow > div").click(function(){
			var clickInd = $(this).index() +3;
			jumpToSection(clickInd);
		});
	    
	    
		function scrollToSlide(slideId){
			
			// Custom slide content offset
		    var customSlideOffset = $("#slide-"+slideId).attr('data-content-offset');
		    
		    
		    // Scroll to the top of a container if it doesn't have custom offset defined
		    if(typeof customSlideOffset === 'undefined'){
		        
		        htmlbody.animate({scrollTop: ($("#slide-"+slideId).offset().top) + 'px'},'slow');
		        
		    } else {
		        
		        // Convert percentage 'eg. 25p' into pixels
		        if(customSlideOffset.indexOf('p')!=-1) {
			       
			       var customSlideOffset = parseInt(customSlideOffset.split('p')[0]);
				   var slideHeight = $slide.height();
				   
				   customSlideOffset = Math.ceil((slideHeight/100) * customSlideOffset);
				   
				   //console.log(slideHeight +' '+ customSlideOffset);
				   
				   htmlbody.animate({scrollTop: ($("#slide-"+slideId).offset().top + customSlideOffset) + 'px'},'slow');
			        
		        } else {
			       
			       var customSlideOffset = parseInt(customSlideOffset);
			       
			       htmlbody.animate({scrollTop: ($("#slide-"+slideId).offset().top + customSlideOffset) + 'px'},'slow');
			        
		        }
		    
		    }
		}

  if(<?php echo $isMobile ?> == 0){
    skrollr.init({
      forceHeight:true
    });
    resizeSlides();
    //centerSecondFrame();
  }
  else {
        skrollr.init({
          forceHeight:true
        }).destroy();
      //$(".fourthings").css({ paddingTop: 0 });
    }

  // $window.on('resize', function () {
  //   if($.browser.mobile){
  //     skrollr.init({
  //        forceHeight:true
  //     }).destroy();
  //     $(".fourthings").css({ paddingTop: 0 });

  //   } else {
    //     skrollr.init({
    //       forceHeight:true
    //     });
    //     resizeSlides();
    //     centerSecondFrame();
    // }
  // });

  
  function resizeSlides(){

    var sectionHeight = $window.height();
    
    if(sectionHeight > 500) {
      $(".homeSlide:not(#slide-1), .bcg, .minHeight").height(sectionHeight);
    } else {
      $(".homeSlide, .bcg, .minHeight").height(500);
    }

  }
  
  function centerSecondFrame(){
     var $slide2Content = $(".fourthings");
     var $contentHeight = $slide2Content.height();
     var $midPoint = ($window.height() - ($contentHeight/2))/3;
     $slide2Content.css({ paddingTop: $midPoint + "px" });
    };

    var menuOffset = $("#slide-2").offset().top;
		var videoOffset = $("#usecase-video").offset().top;


    $window.scroll(function() {

      var windowOffset = $window.scrollTop();


      if(((menuOffset + $("#slide-2").height()) - windowOffset) < 10) {
        $("#buttonRow-fixed").fadeIn();
        $("#buttonRow").css({ display:"none" });
      }
      else {
        $("#buttonRow-fixed").fadeOut();
        $("#buttonRow").css({ display:"block" });
      }

      if(Math.abs(videoOffset - windowOffset) < 300) {
        playthevideo();
      } else {
      	pausethevideo();
      }

      if(windowOffset < 20){
      	pausethevideo();
      }

    });

    var myPlayer = document.getElementById('usecase-video');

    function playthevideo(){
			myPlayer.playVideo();
		}
		function pausethevideo(){
			myPlayer.pauseVideo();
		}


    
     $(document).foundation();

} )( jQuery );
</script>


<!--//////////////////////////////////////////-->
<!--//////////////////////////////////////////-->
<!--//////////////////////////////////////////-->
<!--//////////////////////////////////////////-->

</body></html>
