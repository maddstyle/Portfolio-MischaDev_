<?php if(get_post_meta($post->ID,'rnr_wr_one_intro_opt',true)=='st0'){ ?>

<?php } else { ?>
<!-- section home start -->
           <?php  if(get_post_meta($post->ID,'rnr_wr_one_intro_opt',true)=='st3'){ ?>
		   <div class="overlay-video overlay-dark-60">
		   <?php } else if(get_post_meta($post->ID,'rnr_wr_one_intro_opt',true)=='st4'){ ?>
		   <div class="overlay-video overlay-dark-60">
		   <?php } else if(get_post_meta($post->ID,'rnr_wr_one_intro_opt',true)=='st5'){ ?>
		   <div class="overlay-video overlay-dark-60">
		   <?php } else { ?>
            <div class="overlay overlay-dark-60">
			<?php } ;?>
			<?php if(get_post_meta($post->ID,'rnr_wr_one_intro_opt',true)=='st1'){ ?>
			<?php $drex_images = rwmb_meta( 'rnr_drex_sin_image_intro','type=image&size=' );
								
                                    foreach ( $drex_images as $drex_image ){
                                        echo "<div class='section-bg-home' data-bg='{$drex_image['url']}'></div>
								   ";
								 }
								  ;?>
			
			<?php } else if(get_post_meta($post->ID,'rnr_wr_one_intro_opt',true)=='st2'){ ?>
                <!-- hero bg start -->
                <div class="hero-fullscreen">
                    <div class="hero-fullscreen-FIX">
                        <!-- slick fullscreen slideshow start -->
                        <div class="slick-fullscreen-slideshow">
                            <!-- slideshow item 1 start -->
							<?php $drex_images = rwmb_meta( 'rnr_drex_slider_image','type=image&size=' );
								
                                    foreach ( $drex_images as $drex_image ){
                                        echo "<div class='slick-fullscreen-item'>
                                <div class='slick-fullscreen-img-fill'>
                                    <div class='bg-img' data-bg='{$drex_image['url']}'></div>
                                </div>
                            </div>
								   ";
								 }
								  ;?>
                            
                            
                        </div><!-- slick fullscreen slideshow end -->
                    </div>
                </div><!-- hero bg end -->
				<?php } else if(get_post_meta($post->ID,'rnr_wr_one_intro_opt',true)=='st3'){ ?>
				<?php } else if(get_post_meta($post->ID,'rnr_wr_one_intro_opt',true)=='st4'){ ?>
				<!-- hero bg start -->
                <div class="hero-fullscreen">
                    <!-- Vimeo video start -->
                    <div class="hero-fullscreen-FIX">
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
								  ;?>
                        <!-- Vimeo video mobile IMG end -->
                    </div><!-- Vimeo video end -->
                </div><!-- hero bg end -->
				<?php } else if(get_post_meta($post->ID,'rnr_wr_one_intro_opt',true)=='st5'){ ?>
				<?php } else { ?>
				<?php } ;?>
                <!-- intro wrapper start -->
                <div class="intro-wrapper fadeIn-element">
                    <!-- center container start -->
                    <div class="center-container-home">
                        <!-- center block start -->
                        <div class="center-block-home">
						  <?php if (( get_post_meta($post->ID,'rnr_drex_intro_title',true))):?>
                            <!-- intro subtitle start -->
							<div class="intro-subtitle">
                                <?php echo esc_html(get_post_meta($post->ID,'rnr_drex_intro_title',true)); ?>
                            </div><!-- intro subtitle end -->
							<?php endif;?>
							<?php if (( get_post_meta($post->ID,'rnr_drex_intro_sub_title',true))):?>
                            <!-- intro title start -->
                            <div id="intro-title">
                                <?php echo esc_html(get_post_meta($post->ID,'rnr_drex_intro_sub_title',true)); ?>
                            </div><!-- intro title end -->
							<?php endif;?>
                        </div><!-- center block end -->
                    </div><!-- center container end -->
                </div><!-- intro wrapper end -->
				<?php if (( get_post_meta($post->ID,'rnr_drex_copyrught_text',true))):?>
                <!-- bottom credits start -->
                <div class="bottom-credits fadeIn-element">
				<?php echo balanceTags(get_post_meta($post->ID,'rnr_drex_copyrught_text',true)); ?>
                    
                </div><!-- bottom credits end -->
				<?php endif;?>
				<?php if(get_post_meta($post->ID,'rnr_wr_team_so_en',true)=='st2'){ ?>
                <!-- social icons start -->
                <div class="social-icons-wrapper fadeIn-element">
                    <ul class="social-icons">
					<?php $drex_car_slide_opt = rwmb_meta( 'rnr_po_pu_team_so_gr' );
					if ( ! empty( $drex_car_slide_opt ) ) {
					foreach ( $drex_car_slide_opt as $drex_car_slide_opts ) {
					$drex_so_i = isset( $drex_car_slide_opts['po_pu_so_i'] ) ? $drex_car_slide_opts['po_pu_so_i'] : '';
					$drex_so_u = isset( $drex_car_slide_opts['po_pu_so_u'] ) ? $drex_car_slide_opts['po_pu_so_u'] : '';
					if ( !empty( $drex_so_i ) ) {
					if ( !empty( $drex_so_u ) ) { ?>
                    <li class="social-icon">
						<a class="fa <?php echo esc_attr($drex_so_i);?>" target="_blank" href="<?php echo esc_url($drex_so_u);?>"></a>
                    </li>
					<?php } } } } ?>
                        
                        
                    </ul>
                </div><!-- social icons end -->
				<?php } else { ?>
				<?php } ;?>
                <!-- scroll indicator start -->
                <div class="scroll-indicator-wrapper fadeIn-element">
                    <div class="scroll-indicator"></div>
                </div><!-- scroll indicator end -->
            </div><!-- section home end -->
			<?php } ?>