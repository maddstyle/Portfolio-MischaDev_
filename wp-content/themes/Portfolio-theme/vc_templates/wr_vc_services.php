<?php

$args = array(
    	'class'=>'',
		'title'=>'',
);

$html = "";

extract(shortcode_atts($args, $atts));

		
		$html .= '<div class="row '.$class.'">';
		if($title != '') {
		$html .= '<div class="col-md-6 col-sm-12 services-block">';
		$html .= '<h2 class="section-heading section-heading-all section-heading-light section-heading-services">'.$title.'</h2>';
		$html .= '<div class="inner-divider-mobile"></div>';
		$html .= '</div>';
		}
		if($title != '') {
		$html .= '<div class="col-md-6 col-sm-12 services-block services-block-correction">';
		}
		else{
		$html .= '<div class="col-md-12 col-sm-12 services-block services-block-correction">';
		}
		$html .= '<div id="item-list">';
		$html .= '<ul>';
		$html .= do_shortcode($content);
		$html .= '</ul>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';


echo $html;