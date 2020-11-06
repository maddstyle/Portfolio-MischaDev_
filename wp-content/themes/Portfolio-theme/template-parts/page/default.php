<?php $drex_options = get_option('drex'); ?>
<?php
get_header();
?>	
<div class="inner-divider"></div>
<?php global $drex_active_wid_left, $drex_disable_wid_left ;?>
<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
<?php 
$drex_active_wid_left='left-side left-full';
$drex_disable_wid_left='col-sm-12 col-md-8 col-lg-8';
?>
<?php else : ?>
<?php if (has_post_thumbnail( $post->ID ) ): ?>
<?php 
$drex_active_wid_left='left-side';
$drex_disable_wid_left='col-sm-12 col-md-12 col-lg-12';
?>
<?php else : ?>
<?php 
$drex_active_wid_left='left-side left-full';
$drex_disable_wid_left='col-sm-12 col-md-12 col-lg-12';
?>

<?php endif;?>
<?php endif;?>
<!-- blog start -->
        <!-- left side start -->
        <div class="<?php echo esc_attr($drex_active_wid_left);?>" id="blog">
            <!-- divider start -->
            <div class="inner-divider"></div><!-- divider end -->
            <!-- container start -->
            <div class="container">
                <!-- row start -->
                <div class="row">
                    <!-- col start -->
                    <div class="col-lg-12">
                        <!-- page title start -->
                        <h1 class="home-page-title-all">
                        <?php the_title();?>
                        </h1><!-- page title end -->
						
                       
						
                    </div><!-- col end -->
                </div><!-- row end -->
                <!-- divider start -->
                <div class="inner-divider"></div><!-- divider end -->
                <!-- row start -->
                <div class="row">
                    <!-- col start -->
                    <div class="<?php echo esc_attr($drex_disable_wid_left);?>">
                        <?php while ( have_posts() ) : the_post(); ?>
                        <div class="news-item">
						
                            <figure class="news-content news-content-blog">
                                <figcaption>
                                
                                    <!-- section TXT start -->
                                    <div class="section-txt-page page-content-default">
                                        <?php the_content();
										wp_link_pages( array(
										'before'      => '<div class="page-links">',
										'after'       => '</div>',
										'link_before' => '<span>',
										'link_after'  => '</span>',
										'pagelink'    => '%',
										'separator'   => '',
										) );
										?>
                                    </div><!-- section TXT end -->
                                    
                                </figcaption>
								<div class="inner-divider-timeline-news"></div>
								<?php if ( comments_open() || get_comments_number() ) { ?>
								<div class="row">
								<div class="col-lg-12">
								<?php comments_template();
								wp_enqueue_style( 'drex-blog-comment-sidebar' );
								?>
								</div>
								</div>
								<?php }?>
                            </figure>
						
                        </div><!-- news item 1 end -->
                        <!-- divider start -->
                        <div class="inner-divider-timeline-news"></div><!-- divider end -->
                        <?php endwhile; ?>
						<?php wp_reset_postdata();?>
						
					
                    </div><!-- col end -->
					<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
					<div class="col-sm-12 col-md-4 col-lg-4">
                        <!-- blog sidebar wrapper start -->
                        <div class="blog-sidebar-wrapper">
						
						<?php dynamic_sidebar( 'sidebar-2' ); ?>
						
						</div>
						<div class="clear"></div>
						<div class="inner-divider"></div>
					</div>
					<?php endif;?>
                </div><!-- row end -->
            </div><!-- container end -->
            
        </div><!-- left side end -->
		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<?php else : ?>
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
        <!-- wave start -->
        <div class="wave-holder">
            <canvas id="wave" data-wavecount="<?php if(!empty($drex_options['wave_count'])):?><?php echo esc_attr(drex_AfterSetupTheme::return_thme_option('wave_count',''));?><?php else : ?>15<?php endif;?>" data-wave-range-x="<?php if(!empty($drex_options['wave_ranage_x'])):?><?php echo esc_attr(drex_AfterSetupTheme::return_thme_option('wave_ranage_x',''));?><?php else : ?>20<?php endif;?>" data-wave-range-y="<?php if(!empty($drex_options['wave_ranage_y'])):?><?php echo esc_attr(drex_AfterSetupTheme::return_thme_option('wave_ranage_y',''));?><?php else : ?>80<?php endif;?>" data-wave-duration-min="<?php if(!empty($drex_options['wave_wave_duration_min'])):?><?php echo esc_attr(drex_AfterSetupTheme::return_thme_option('wave_wave_duration_min',''));?><?php else : ?>20<?php endif;?>" data-wave-duration-max="<?php if(!empty($drex_options['wave_wave_duration_max'])):?><?php echo esc_attr(drex_AfterSetupTheme::return_thme_option('wave_wave_duration_max',''));?><?php else : ?>40<?php endif;?>"></canvas>
        </div><!-- wave end -->
        <!-- right side start -->
        <div class="right-side">
		<?php if (has_post_thumbnail( $post->ID ) ):
		$drex_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
		<?php endif;?>
            <!-- container start -->
            <div class="container"></div><!-- container end -->
            <!-- blog page IMG/VIDEO bg start -->
            <div class="home-img-container overlay overlay-dark-60 hide-on-mobile-xs-blog">
                <!-- single IMG start -->
                <div class="slide-img">
				<?php if (has_post_thumbnail( $post->ID ) ): ?>
                    <!-- single IMG bg start -->
                    <img alt="<?php the_title_attribute();?>" src="<?php echo esc_url($drex_image[0]);?>"><!-- single IMG bg end -->
				<?php endif;?>
                </div><!-- single IMG end -->
            </div><!-- blog page IMG/VIDEO bg end -->
        </div><!-- right side end -->
        <!-- section right blog mobile start -->
        <div class="fireOT-right fireOT-right-blog right-side">
            <!-- blog mobile IMG start -->
            <div class="about-img-container overlay overlay-dark-60">
                <div class="slide-img">
				<?php if (has_post_thumbnail( $post->ID ) ): ?>
                    <img alt="<?php the_title_attribute();?>" src="<?php echo esc_url($drex_image[0]);?>">
				<?php endif;?>
                </div>
            </div><!-- blog mobile IMG end -->
        </div><!-- section right blog mobile end -->
		<?php 
		wp_enqueue_script( 'wave' );  
		?> 	
		<?php endif;?>
		<?php endif;?>
        <!-- blog end -->
<?php get_footer(); ?>	