<?php $drex_options = get_option('drex'); ?>
<?php
get_header();
?>
<?php while ( have_posts() ) : the_post(); ?>
 <?php  if(get_post_meta($post->ID,'rnr_wr_one_intro_opt',true)=='st3'){ ?>
    <?php if(get_post_meta($post->ID,'rnr_wr_one_intro_vd_sound',true)=='false'){ ?> 
	<?php $drex_video_sound ='false'; ?>
	<?php } else { ?>
	<?php $drex_video_sound ='true'; ?>
	<?php } ;?>
	 <!-- hero bg start -->
        <div class="hero-fullscreen">
            <!-- YouTube video start -->
            <div class="hero-fullscreen-FIX">
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
								  ;?>
                <!-- YouTube video mobile IMG end -->
            </div><!-- YouTube video end -->
        </div><!-- hero bg end -->
<?php } else if(get_post_meta($post->ID,'rnr_wr_one_intro_opt',true)=='st5'){ ?>
<!-- hero bg start -->
 
		
		<div class="hero-fullscreen">
            <!-- HTML5 video start -->
            <div class="hero-fullscreen-FIX">
                <!-- HTML5 video URL start -->
                <div class="html5-videoContainment" data-vide-bg="<?php echo esc_url(get_post_meta($post->ID,'rnr_drex_mp4_url',true)); ?>" data-vide-options="loop: true, muted: true, position: 0% 0%"></div><!-- HTML5 video URL end -->
                <!-- HTML5 video mobile IMG start -->
                <?php $drex_images = rwmb_meta( 'rnr_drex_mp4_image_mobile','type=image&size=' );
								
                                    foreach ( $drex_images as $drex_image ){
                                        echo "<div class='html5-bg' data-bg='{$drex_image['url']}'></div>
								   ";
								 }
								  ;?><!-- HTML5 video mobile IMG end -->
            </div><!-- HTML5 video end -->
        </div>
<?php } else { ?>
<?php } ;?>


<!-- fullPage start -->
		<?php
		global $drex_scroll_bar;
		if ($drex_options['one_page_scroll_bar_opt']=="st2") {
		$drex_scroll_bar ='false';
		}
		else {
		$drex_scroll_bar ='true';
		}
		
		
		?>
        <div id="fullpage" data-scrollbar="<?php echo esc_attr($drex_scroll_bar);?>" data-menu-id="">
    
    
	<section class="section" >
	<?php if(get_post_meta($post->ID,'rnr_drex_page_title',true)=='st1'){ ?> 
	<!-- section title start -->
                <div class="section-title-vertical">
                    <span><?php the_title();?></span>
                </div><!-- section title end -->
	<?php } else if(get_post_meta($post->ID,'rnr_drex_page_title',true)=='st2'){ ?> 
	<!-- section title start -->
                <div class="section-title-vertical right-side">
                    <span><?php the_title();?></span>
                </div><!-- section title end -->
	<?php } else { ?>
	<?php } ;?>
	<?php get_template_part('template-parts/intro');?>
	
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
	
	</section>
	
	</div>
	<?php endwhile; ?>
	<?php wp_reset_postdata();?>