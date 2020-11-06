<?php

class drex_User_Details extends WP_Widget {
    var $settings = array( 'title');

    function __construct() {
        $widget_ops = array('description' => 'Use this widget to show user details as a widget.' );
        parent::__construct(false, __('Drex - User Details', 'drex'),$widget_ops);
}


function widget($args, $instance) {
        $settings = $this->drex_get_settings();
        extract( $args, EXTR_SKIP );
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : ( ' About Author' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $instance = wp_parse_args( $instance, $settings );
        extract( $instance, EXTR_SKIP );

      
        echo $before_widget;
		 if ( $title ) echo $before_title . $title . $after_title; 
		 if ( is_single() ) {
		 }
		 else {
		 if(have_posts()) : while ( have_posts() ) : the_post();
		 endwhile;  endif; wp_reset_postdata();
		 }
		 
		echo '<div class="about-widget fl-wrap">';
		echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( '', 80 ) );
		echo '<h5><a>';
		echo get_the_author();
		echo '</a></h5>';
		echo '<div class="clearfix"></div>';
		echo '<p>';
		echo get_the_author_meta('description');
		echo '</p>';
		echo '<div class="about-widget-social fl-wrap">';
		echo '<span>'.esc_html__('Find us on : ','drex').'</span>';
		echo '<ul>';
		if ( get_the_author_meta('facebook') ) :
		echo '<li><a href="';
		echo the_author_meta('facebook');
		echo '" target="_blank">'.esc_html__('Facebook','drex').'</a></li>';
		endif;
		if ( get_the_author_meta('twitter') ) :
		echo '<li><a href="';
		echo the_author_meta('twitter');
		echo '" target="_blank">'.esc_html__('Twitter','drex').'</a></li>';
		endif;
		if ( get_the_author_meta('instagram') ) :
		echo '<li><a href="';
		echo the_author_meta('instagram');
		echo '" target="_blank">'.esc_html__('Instagram','drex').'</a></li>';
		endif;
		if ( get_the_author_meta('tumblr') ) :
		echo '<li><a href="';
		echo the_author_meta('tumblr');
		echo '" target="_blank">'.esc_html__('Tumblr','drex').'</a></li>';
		endif;
		if ( get_the_author_meta('pinterest') ) :
		echo '<li><a href="';
		echo the_author_meta('pinterest');
		echo '" target="_blank">'.esc_html__('Pinterest','drex').'</a></li>';
		endif;
		if ( get_the_author_meta('youtube') ) :
		echo '<li><a href="';
		echo the_author_meta('youtube');
		echo '" target="_blank">'.esc_html__('Youtube','drex').'</a></li>';
		endif;
		echo '</ul>';
		echo '</div>';
		echo '</div>';
		
		
       echo $after_widget;      
    }
	
	


function update( $new_instance, $old_instance ) {
        foreach ( array( 'title') as $setting )
            $new_instance[$setting] = strip_tags( $new_instance[$setting] );
        // Users without unfiltered_html cannot update this arbitrary HTML field
        if ( !current_user_can( 'unfiltered_html' ) )
            $new_instance['address'] = $old_instance['address'];
        return $new_instance;
    }


    function drex_get_settings() {
        // Set the default to a blank string
        $settings = array_fill_keys( $this->settings, '' );
        // Now set the more specific defaults
        return $settings;
    }

    function form($instance) {
        $instance = wp_parse_args( $instance, $this->drex_get_settings() );
        extract( $instance, EXTR_SKIP );
?>

    <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:','drex'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
    </p>
	
	

    <?php 

    }
}

register_widget('drex_User_Details');