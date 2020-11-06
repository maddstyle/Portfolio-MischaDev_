<?php

$args = array(
    	'class'=>'',
		'boxsize'=>'',
		'boxheight'=>'',
		'title'=>'',
		'iconclass'=>'',
);

$html = "";

extract(shortcode_atts($args, $atts));

		
		$html .= '<ul class="timeline '.$class.'">';
		$html .= do_shortcode($content);
		$html .= '</ul>';


echo $html;