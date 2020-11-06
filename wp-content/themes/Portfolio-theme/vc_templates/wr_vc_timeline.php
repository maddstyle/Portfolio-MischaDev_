<?php

$args = array(
		'iconname'=>'',
		'data_title_1'=>'',
		'data_title_2'=>'',
		'data_title_3'=>'',
		'image'=>'',
		'companyname'=>'',
		'timeline_position'=>'',
		
);

extract(shortcode_atts($args, $atts));
if(is_numeric($image)) {
            $drex_image = wp_get_attachment_url( $image );
			$drex_title = get_the_title( $image );
        }else {
            $drex_image = $image;
        }
$html = '';
$timeline_position_opt ='';
		if($timeline_position == "st2"){
		$timeline_position_opt .='class="timeline-inverted"';
		}
		else {
		$timeline_position_opt .='';
		}

    $html .= '<li '.$timeline_position_opt.'>';
	if(is_numeric($image)) {
    $html .= '<div class="timeline-image">
              <img alt="'.$drex_title.'" class="img-circle img-responsive" src="'.$drex_image.'">
              </div>';
			  }
    $html .= '<div class="timeline-panel">
                                        <!-- timeline heading start -->
                                        <div class="timeline-heading">
                                            <!-- date start -->
                                            <h4 class="cd-timeline-date">
                                                '.$data_title_1.'
                                            </h4><!-- date end -->
                                            <!-- divider start -->
                                            <div class="inner-divider-half"></div><!-- divider end -->
                                            <!-- position start -->
                                            <h3 class="cd-timeline-name">
                                               '.do_shortcode($data_title_2).'
                                            </h3><!-- position end -->
                                            <!-- divider start -->
                                            <div class="inner-divider-half"></div><!-- divider end -->
                                            <!-- position time start -->
                                            <h3 class="cd-timeline-name">
                                                <span class="cd-timeline-position">'.$data_title_3.'</span>
                                            </h3><!-- position time end -->
                                            <!-- divider start -->
                                            <div class="inner-divider-half"></div><!-- divider end -->
                                        </div><!-- timeline heading end -->
                                        <!-- section TXT start -->
                                        <div class="timeline-body">
                                            <p>
                                                '.$content.'
                                            </p>
                                        </div><!-- section TXT end -->
                                    </div>';
    $html .= '</li>';
  
    


echo $html;