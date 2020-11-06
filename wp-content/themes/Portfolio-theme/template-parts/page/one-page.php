<?php $drex_options = get_option('drex'); ?>
<?php
get_header();
?>
<!-- right side start -->
        <div class="right-side">
            
            <?php 
				if ( ( $locations = get_nav_menu_locations() ) && $locations['main-menu'] ) {
					$menu = wp_get_nav_menu_object( $locations['main-menu'] );
					$menu_items = wp_get_nav_menu_items($menu->term_id);
					$include = array();
					foreach($menu_items as $item) {
						if($item->object == 'page')
							$include[] = $item->object_id;
					}
					$main_query = new WP_Query( array( 'post_type' => 'page', 'post__in' => $include, 'posts_per_page' => count($include), 'orderby' => 'post__in' ) );
				}
				
				$i = 1;
				while ($main_query->have_posts()) : $main_query->the_post();
				 global $post, $separatepages;

				$post_name = $post->post_name;
				
				$post_id = get_the_ID();
				 ?>
				 <?php $separatepages = get_post_meta($post->ID,'rnr_open_page',true);

				if (($separatepages != true ))
				{ ?>
			<?php  if(get_post_meta($post->ID,'rnr_wr_one_intro_opt',true)=='st2'){ ?>
			<div class="slider">
			<?php $drex_images = rwmb_meta( 'rnr_drex_slider_image','type=image&size=' );
				foreach ( $drex_images as $drex_image ){ ?>
                <div class='slide'>
                        <div class='home-slide-content'>
                            <!-- page subtitle start -->
                            <p>
                               <?php echo esc_html ($drex_image['caption']);?>
                            </p><!-- page subtitle end -->
                            <!-- divider start -->
                            <div class='inner-divider-ultra-half'></div><!-- divider end -->
                            <!-- page title start -->
                            <h2>
                                <?php echo esc_html ($drex_image['title']);?>
                            </h2><!-- page title end -->
                        </div>
                    </div>
				<?php };?>
				
                </div>
			<?php } else { ?>
			<?php } ;?>
			<?php  if(get_post_meta($post->ID,'rnr_wr_one_intro_opt',true)=='st1'){ ?>
					<!-- container start -->
            <div class="container">
                <!-- copyright home start -->
                <div class="copyright-home">
                    <?php echo esc_attr(get_post_meta($post->ID,'rnr_drex_home_copy_text',true)); ?>
                </div><!-- copyright home end -->
            </div><!-- container end -->
            <div class="home-img-container overlay overlay-dark-60">
                <!-- single IMG start -->
                <div class="slide-img">
					
                    <!-- single IMG bg start -->
					<?php $drex_images = rwmb_meta( 'rnr_drex_sin_image_intro','type=image&size=' );
								
                                    foreach ( $drex_images as $drex_image ){
                                        echo "<img alt='{$drex_image['title']}' src='{$drex_image['url']}'>
								   ";
								 }
								  ;?>
                    <!-- single IMG bg end -->
			
                </div><!-- single IMG end -->
				
            </div><!-- home page IMG/VIDEO bg end -->
			
			<?php } else if(get_post_meta($post->ID,'rnr_wr_one_intro_opt',true)=='st6'){ ?>
					<!-- container start -->
            <div class="container">
                <!-- copyright home start -->
                <div class="copyright-home copyright-home-dark">
                    <?php echo esc_attr(get_post_meta($post->ID,'rnr_drex_home_copy_text',true)); ?>
                </div><!-- copyright home end -->
            </div><!-- container end -->
			<div class="home-img-container">
                <!-- thumbnail slider start -->
                <div class="slide-img">
                    <!-- thumbnail slider containment start -->
                    <div id="allContainment">
                        <!-- thumbnail slider top start -->
                        <div class="swiper-container swiper-slider-top">
                            <!-- thumbnail slider IMG start -->
                            <div class="swiper-wrapper">
								<?php $drex_images = rwmb_meta( 'rnr_drex_slider_thumb_image_intro','type=image&size=' );
								
                                    foreach ( $drex_images as $drex_image ){
                                        echo "<div class='swiper-slide  overlay overlay-dark-60' data-bg='{$drex_image['url']}'></div>
								   ";
								 }
								  ;?>
                                
                                
                            </div><!-- thumbnail slider IMG end -->
                            <!-- controls start -->
                            <div class="swiper-button-next swiper-button-white"></div>
                            <div class="swiper-button-prev swiper-button-white"></div><!-- controls end -->
                        </div><!-- thumbnail slider top end -->
                        <!-- thumbnail slider bottom start -->
                        <div class="swiper-container swiper-slider-bottom">
                            <!-- thumbnail slider thumbnail IMG start -->
                            <div class="swiper-wrapper">
                                
                                <?php $drex_images = rwmb_meta( 'rnr_drex_slider_thumb_image_intro','type=image&size=' );
								
                                    foreach ( $drex_images as $drex_image ){
                                        echo "<div class='swiper-slide ' data-bg='{$drex_image['url']}'></div>
								   ";
								 }
								  ;?>
                            </div><!-- thumbnail slider thumbnail IMG end -->
                        </div><!-- thumbnail slider bottom end -->
                    </div><!-- thumbnail slider containment end -->
                </div><!-- thumbnail slider end -->
            </div>
			<?php } else if(get_post_meta($post->ID,'rnr_wr_one_intro_opt',true)=='st2'){ ?>
			<div class="home-img-container overlay overlay-dark-60">
                <?php $drex_images = rwmb_meta( 'rnr_drex_slider_image','type=image&size=' );
				foreach ( $drex_images as $drex_image ){
                echo "<div class='slide-img'>
                    <img alt='{$drex_image['title']}' src='{$drex_image['url']}'>
                </div><!-- IMG slider 1 end -->";
				};?>
                
                
            </div>
			<?php } else if(get_post_meta($post->ID,'rnr_wr_one_intro_opt',true)=='st3'){ ?>
			<?php if(get_post_meta($post->ID,'rnr_wr_one_intro_vd_sound',true)=='st2'){ ?> 
			<?php $drex_video_sound ='false'; ?>
			<?php } else { ?>
			<?php $drex_video_sound ='true'; ?>
			<?php } ;?>
					<!-- container start -->
            <div class="container">
                <!-- copyright home start -->
                <div class="copyright-home">
                    <?php echo esc_attr(get_post_meta($post->ID,'rnr_drex_home_copy_text',true)); ?>
                </div><!-- copyright home end -->
            </div><!-- container end -->
			<div class="home-img-container overlay overlay-dark-60-video">
                <!-- YouTube video start -->
                <div class="slide-img">
                    <!-- YouTube video containment start -->
                    <div id="videoContainment">
                        <!-- YouTube video URL start -->
                        <div class="player" data-property=
                        "{videoURL: '<?php echo esc_attr(get_post_meta($post->ID,'rnr_be_youtube_url',true)); ?>', containment: '#videoContainment', showControls: false, autoPlay: true, loop: true, vol: 50, mute: <?php echo esc_attr($drex_video_sound);?>, startAt: 0, stopAt: 0, opacity: 1, addRaster: false, quality: 'large', optimizeDisplay: true, ratio: 16/9}"
                        id="bgndVideo"></div><!-- YouTube video URL end -->
                    </div><!-- YouTube video containment end -->
                    <!-- YouTube video mobile IMG start -->
                    <?php $drex_images = rwmb_meta( 'rnr_drex_you_image_mobile','type=image&size=' );
								
                                    foreach ( $drex_images as $drex_image ){
                                        echo "<div class='YT-bg' data-bg='{$drex_image['url']}'></div>
								   ";
								 }
								  ;?><!-- YouTube video mobile IMG end -->
                </div><!-- YouTube video end -->
            </div>
			<?php } else if(get_post_meta($post->ID,'rnr_wr_one_intro_opt',true)=='st4'){ ?>
					<!-- container start -->
            <div class="container">
                <!-- copyright home start -->
                <div class="copyright-home">
                    <?php echo esc_attr(get_post_meta($post->ID,'rnr_drex_home_copy_text',true)); ?>
                </div><!-- copyright home end -->
            </div><!-- container end -->
			<div class="home-img-container overlay overlay-dark-60-video">
                <!-- Vimeo video start -->
                <div class="slide-img">
                    <!-- Vimeo video containment start -->
                    <div id="vimeo-videoContainment">
                        <!-- Vimeo video URL start -->
                        <iframe data-fullscreeneo="" src="<?php echo esc_url(get_post_meta($post->ID,'rnr_drex_vimeo_url',true)); ?>"></iframe><!-- Vimeo video URL end -->
                    </div><!-- Vimeo video containment end -->
                    <!-- Vimeo video mobile IMG start -->
                    <?php $drex_images = rwmb_meta( 'rnr_drex_vimeo_image_mobile','type=image&size=' );
								
                                    foreach ( $drex_images as $drex_image ){
                                        echo "<div class='vimeo-bg' data-bg='{$drex_image['url']}'></div>
								   ";
								 }
								  ;?><!-- Vimeo video mobile IMG end -->
                </div><!-- Vimeo video end -->
            </div>
			<?php } else { ?>
			<div class="page-img-container-<?php echo $i;?> mobile overlay overlay-dark-60">
                <div class="slide-img">
				<?php if (has_post_thumbnail( $post->ID ) ):
					$drex_mob_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
                    <img alt="<?php the_title_attribute();?>" src="<?php echo esc_url($drex_mob_image[0]);?>">
					<?php endif;?>
                </div>
            </div>
			<?php } ;?>
            <?php $i++;}  endwhile; wp_reset_postdata(); ?>
            <!-- section page IMG bg mobile end -->
        </div><!-- right side end -->
		<!-- wave start -->
        <div class="wave-holder">
            <canvas id="wave" data-wavecount="<?php if(!empty($drex_options['wave_count'])):?><?php echo esc_attr(drex_AfterSetupTheme::return_thme_option('wave_count',''));?><?php else : ?>15<?php endif;?>" data-wave-range-x="<?php if(!empty($drex_options['wave_ranage_x'])):?><?php echo esc_attr(drex_AfterSetupTheme::return_thme_option('wave_ranage_x',''));?><?php else : ?>20<?php endif;?>" data-wave-range-y="<?php if(!empty($drex_options['wave_ranage_y'])):?><?php echo esc_attr(drex_AfterSetupTheme::return_thme_option('wave_ranage_y',''));?><?php else : ?>80<?php endif;?>" data-wave-duration-min="<?php if(!empty($drex_options['wave_wave_duration_min'])):?><?php echo esc_attr(drex_AfterSetupTheme::return_thme_option('wave_wave_duration_min',''));?><?php else : ?>20<?php endif;?>" data-wave-duration-max="<?php if(!empty($drex_options['wave_wave_duration_max'])):?><?php echo esc_attr(drex_AfterSetupTheme::return_thme_option('wave_wave_duration_max',''));?><?php else : ?>40<?php endif;?>"></canvas>
        </div><!-- wave end -->
		<?php 
				if ( ( $locations = get_nav_menu_locations() ) && $locations['main-menu'] ) {
					$menu = wp_get_nav_menu_object( $locations['main-menu'] );
					$menu_items = wp_get_nav_menu_items($menu->term_id);
					$include = array();
					foreach($menu_items as $item) {
						if($item->object == 'page')
							$include[] = $item->object_id;
					}
					$main_query = new WP_Query( array( 'post_type' => 'page', 'post__in' => $include, 'posts_per_page' => count($include), 'orderby' => 'post__in' ) );
				}
				
				$i = 1;
				while ($main_query->have_posts()) : $main_query->the_post();
				 global $post, $separatepages;

				$post_name = $post->post_name;
				
				$post_id = get_the_ID();
				 ?>
				 <?php $separatepages = get_post_meta($post->ID,'rnr_open_page',true);

				if (($separatepages != true ))
				{ ?>
		<?php  if(get_post_meta($post->ID,'rnr_wr_one_intro_opt',true)=='st0'){ ?>
		<?php } else { ?>
		 <!-- left side start -->
        <div class="left-side-home" id="<?php echo $post->post_name;?>">
            
            <!-- center container start -->
            <div class="center-container">
                <!-- center block start -->
                <div class="center-block">
                    <!-- container start -->
                    <div class="container-home">
                        <div class="introduction">
                            
							<?php if(get_post_meta($post->ID,'rnr_wr_intro_title_set_opt',true)=='st2'){ ?>
							<!-- page title start -->
                            <h1 class="typed-effect">
                                <span class="typed-title" data-text1="<?php echo esc_attr(get_post_meta($post->ID,'rnr_be_slide_title1',true)); ?>" data-text2="<?php echo esc_attr(get_post_meta($post->ID,'rnr_be_slide_title2',true)); ?>" data-text3="<?php echo esc_attr(get_post_meta($post->ID,'rnr_be_slide_title3',true)); ?>" data-text4="<?php echo esc_attr(get_post_meta($post->ID,'rnr_be_slide_title4',true)); ?>" data-loop="true"></span>
                            </h1><!-- page title end -->
							<?php } else { ?>
							<!-- page title start -->
                            <h1 class="home-page-title">
                                <?php echo esc_html(get_post_meta($post->ID,'rnr_drex_intro_title',true)); ?>
                            </h1><!-- page title end -->
							<?php } ;?>
                            <!-- divider start -->
                            <div class="inner-divider-half-home"></div><!-- divider end -->
							<?php if (( get_post_meta($post->ID,'rnr_drex_intro_sub_title',true))):?>
                            <!-- page subtitle start -->
                            <h3>
                                <?php echo esc_html(get_post_meta($post->ID,'rnr_drex_intro_sub_title',true)); ?>
                            </h3><!-- page subtitle end -->
							<?php endif;?>
                            <!-- divider start -->
                            <div class="inner-divider-half-home"></div><!-- divider end -->
							<?php if(get_post_meta($post->ID,'rnr_wr_intro_subscribe_opt',true)=='st2'){ ?>
                            <!-- sign up modal launcher start -->
                            <div class="the-button-wrapper sign-up-modal-launcher">
                                <div class="the-button">
                                    <?php if (( get_post_meta($post->ID,'rnr_drex_subs_button_title',true))):?><?php echo esc_html(get_post_meta($post->ID,'rnr_drex_subs_button_title',true)); ?><?php else : ?><?php esc_html_e('Newsletters','drex');?><?php endif;?>
                                </div>
                            </div><!-- sign up modal launcher end -->
							<?php } else { ?>
							<?php } ;?>
                        </div>
                    </div><!-- container end -->
                </div><!-- center block end -->
            </div><!-- center container end -->
			<?php if(get_post_meta($post->ID,'rnr_wr_team_so_en',true)=='st2'){ ?>
            <!-- social icons start -->
            <div class="social-icons-wrapper">
                <ul class="social-icons">
					<?php $drex_car_slide_opt = rwmb_meta( 'rnr_po_pu_team_so_gr' );
					if ( ! empty( $drex_car_slide_opt ) ) {
					foreach ( $drex_car_slide_opt as $drex_car_slide_opts ) {
					$drex_so_i = isset( $drex_car_slide_opts['po_pu_so_i'] ) ? $drex_car_slide_opts['po_pu_so_i'] : '';
					$drex_so_u = isset( $drex_car_slide_opts['po_pu_so_u'] ) ? $drex_car_slide_opts['po_pu_so_u'] : '';
					if ( !empty( $drex_so_i ) ) {
					if ( !empty( $drex_so_u ) ) { ?>
                    <li class="social-icon">
                        <a class="<?php echo esc_attr($drex_so_i);?>" target="_blank" href="<?php echo esc_url($drex_so_u);?>"></a>
                    </li>
                   <?php } } } } ?>
                </ul>
            </div><!-- social icons end -->
			<?php } else { ?>
			<?php } ;?>
            <!-- scroll indicator start -->
            <div class="scroll-indicator">
                <div class="scroll-indicator-wrapper">
                    <div class="scroll-line"></div>
                </div>
            </div><!-- scroll indicator end -->
        </div><!-- left side end -->
        
        
        <!-- home end -->
		<?php if(get_post_meta($post->ID,'rnr_wr_intro_subscribe_opt',true)=='st2'){ ?>
        <!-- sign up modal start -->
        <div class="sign-up-modal">
            <!-- container start -->
            <div class="container">
                <!-- center container start -->
                <div class="center-container-sign-up-modal">
                    <!-- center block start -->
                    <div class="center-block-sign-up-modal">
                        <!-- row start -->
                        <div class="row center-block-sign-up-modal-padding-top">
                            <!-- col start -->
                            <div class="col-lg-12">
                                <!-- sign up modal title start -->
                                <h2 class="section-heading">
                                    <?php if (( get_post_meta($post->ID,'rnr_drex_subs_form_title',true))):?><?php echo esc_html(get_post_meta($post->ID,'rnr_drex_subs_form_title',true)); ?><?php else : ?><?php esc_html_e('Newsletter sign up','drex');?><?php endif;?>
                                </h2><!-- sign up modal title end -->
                            </div><!-- col end -->
                        </div><!-- row end -->
                        <!-- divider start -->
                        <div class="inner-divider-half-sign-up"></div><!-- divider end -->
                        <!-- row start -->
                        <div class="row">
                            <!-- col start -->
                            <div class="col-lg-12">
                                <!-- newsletter form start -->
                                <div id="subscribe-wrapper">
                                    <div id="newsletter">
                                        <div class="newsletter">
                                            <?php echo do_shortcode(get_post_meta($post->ID,'rnr_drex_subs_form_shot',true)) ?>  
                                        </div>
                                    </div>
                                </div><!-- newsletter form end -->
                            </div><!-- col end -->
                        </div><!-- row end -->
                        <!-- divider start -->
                        <div class="inner-divider-half-sign-up"></div><!-- divider end -->
                        <!-- row start -->
                        <div class="row center-block-sign-up-modal-padding-bottom">
                            <!-- col start -->
                            <div class="col-lg-12">
                                <!-- sign up modal closer start -->
                                <div class="sign-up-modal-closer">
                                    <span class="ion-close"></span>
                                </div><!-- sign up modal closer end -->
                            </div><!-- col end -->
                        </div><!-- row end -->
                    </div><!-- center block end -->
                </div><!-- center container end -->
            </div><!-- container end -->
        </div><!-- sign up modal end -->
		<?php } else { ?>
		<?php } ;?>
		<?php } ;?>
		<?php $i++;}  endwhile; wp_reset_postdata(); ?>
		<section class="fireOT">
		<?php 
				if ( ( $locations = get_nav_menu_locations() ) && $locations['main-menu'] ) {
					$menu = wp_get_nav_menu_object( $locations['main-menu'] );
					$menu_items = wp_get_nav_menu_items($menu->term_id);
					$include = array();
					foreach($menu_items as $item) {
						if($item->object == 'page')
							$include[] = $item->object_id;
					}
					$main_query = new WP_Query( array( 'post_type' => 'page', 'post__in' => $include, 'posts_per_page' => count($include), 'orderby' => 'post__in' ) );
				}
				
				$i = 1;
				while ($main_query->have_posts()) : $main_query->the_post();
				 global $post, $separatepages;

				$post_name = $post->post_name;
				
				$post_id = get_the_ID();
				 ?>
				 <?php $separatepages = get_post_meta($post->ID,'rnr_open_page',true);

				if (($separatepages != true ))
				{ ?>
				<?php  if(get_post_meta($post->ID,'rnr_wr_one_intro_opt',true)=='st0'){ ?>
				<!-- section right start -->
            <div class="fireOT-right right-side  bg-main-drex-right-<?php echo $i;?>">
                <!-- about IMG start -->
                <div class="page-img-container-<?php echo $i;?> overlay overlay-dark-60">
                    <div class="slide-img">
					
                    <?php if (has_post_thumbnail( $post->ID ) ):
					$drex_page_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' ); ?>
                    <img alt="<?php the_title_attribute();?>" src="<?php echo esc_url($drex_page_image[0]);?>">
					<?php endif;?>
                    </div>
                </div><!-- about IMG end -->
            </div><!-- section right end -->
		     <!-- section left start -->
            <div class="fireOT-left left-side bg-main-drex-<?php echo $i;?>" id="<?php echo $post->post_name;?>">
                <!-- divider start -->
                <div class="divider"></div><!-- divider end -->
                <!-- container start -->
                <div class="container">
                   <?php global $more; $more = 0; the_content('');?>
				   
                    <!-- divider start -->
                    <div class="inner-divider-mobile hide-mob"></div><!-- divider end -->
                </div><!-- container end -->
            </div><!-- section left end -->
            
			<?php } ;?>
			<?php $i++;}  endwhile; wp_reset_postdata(); ?>
		</section> 
<?php 
wp_enqueue_script( 'wave' );  
?> 		