<?php

$args = array(
		'iconname'=>'',
		'data_title'=>'',
		'content_short'=>'',
		'image'=>'',
		
		
);

extract(shortcode_atts($args, $atts));
if(is_numeric($image)) {
            $drex_image = wp_get_attachment_url( $image );
        }else {
            $drex_image = $image;
        }
$html = '';


    $html .= '<li>';
    $html .= '<a class="expand">';
    $html .= '<div class="right-arrow">+</div>';
	if(is_numeric($image)) {
    $html .= '<div class="icon">
              <img alt="'.$data_title.'" src="'.$drex_image.'">
              </div>';
			  }
	$html .= '<h2>'.$data_title.'</h2>';
	$html .= '<p>'.$content_short.'</p>';
	$html .= '</a>';
	$html .= '<div class="detail">';
	$html .= '<p>'.$content.'</p>';
    $html .= '</div>';
    $html .= '</li>';
  
    


echo $html;