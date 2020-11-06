<?php
add_action('wp_head', 'drex_custom_colors', 160);
function drex_custom_colors() { 
$drex_options = get_option('drex');
?>
 
 <style type="text/css" class="drex-custom-dynamic-css">
 <?php if(!empty($drex_options['opt-theme-style'])):?>
 .hamburger, .link-underline::before, .to-top-arrow, .hover-icons a:hover, #news-carousel .owl-prev:before, #news-carousel .owl-next:before, .widget .tagcloud a:hover, .slick-prev:before, .slick-next:before, .slick-arrow:after{background:<?php echo esc_attr(drex_AfterSetupTheme::return_thme_option('opt-theme-style',''));?>;}
 
 .the-button, .intro-quote, p a, p a:hover, h4.cd-timeline-date, .cd-timeline-position, h2, .news-content h3, a:hover, a:visited, a:active, a:focus, .news-content h5, a, .wpcf7-submit, .blog-category a, .blog-category a:hover, .page-content-default h3, .drex-comment-text h3, .bs-nav-title:hover, .bs-nav-title h4:hover, .gallery-single-bottom ul.gallery-meta > li a:hover, .the-button-inverse, .global-menu li a.active, .right-side h2{color:<?php echo esc_attr(drex_AfterSetupTheme::return_thme_option('opt-theme-style',''));?>;}
 
 .the-button::before, .the-button::after, .hover-icons a:hover, .wpcf7-submit, .wpcf7 input[type="text"]:hover, .wpcf7 input[type="email"]:hover, .wpcf7 input[type="password"]:hover, .wpcf7 textarea:hover, .related-posts-heading, .the-button-inverse::before, .the-button-inverse::after, .mc4wp-form input[type="text"]:hover, .mc4wp-form input[type="email"]:hover{border-color:<?php echo esc_attr(drex_AfterSetupTheme::return_thme_option('opt-theme-style',''));?>!important;}
 
 .shape-overlays__path:nth-of-type(1){fill:<?php echo esc_attr(drex_AfterSetupTheme::return_thme_option('opt-theme-style',''));?>;}
 
 .blog-single-post-category{background-color:<?php echo esc_attr(drex_AfterSetupTheme::return_thme_option('opt-theme-style',''));?>!important;}
 <?php endif;?>
 <?php if (drex_AfterSetupTheme::return_thme_option('disable_image_overlay')=='st2'){ ?>
 .overlay-dark-60:before, .overlay:before{
	display:none;
 }
 <?php } else { ?>
 
 <?php } ;?>


 </style>

 
 <?php 
	}
?>
