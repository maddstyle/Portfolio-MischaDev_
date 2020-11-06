<?php $drex_options = get_option('drex'); ?>
<?php
get_header();
?>	
<?php if(get_post_meta($post->ID,'rnr_wr_port_det_opt',true)=='st2'){ ?> 
<div class="inner-divider"></div>
<?php global $drex_active_wid_left, $drex_disable_wid_left ;?>
<?php if ( is_active_sidebar( 'sidebar-6' ) ) : ?>
<?php 
$drex_active_wid_left='left-side left-full';
$drex_disable_wid_left='col-sm-12 col-md-8 col-lg-8';
?>
<?php else : ?>
<?php 
$drex_active_wid_left='left-side';
$drex_disable_wid_left='col-sm-12 col-md-12 col-lg-12';
?>
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
						<?php if(get_post_meta($post->ID,'port_det_gallery_title_opt',true)):?><?php echo esc_html(get_post_meta($post->ID,'port_det_gallery_title_opt',true));?> <?php else : ?><?php esc_html_e('Work','drex');?><?php endif;?>
                        </h1><!-- page title end -->
						<div class="inner-divider-half"></div><!-- divider end -->
                        <!-- section subtitle start -->
                        <h2 class="section-heading section-heading-all section-heading-light">
						<span>01.</span><?php the_title();?>
						</h2>
						
                    </div><!-- col end -->
                </div><!-- row end -->
                <!-- divider start -->
                <div class="inner-divider"></div><!-- divider end -->
                <!-- row start -->
                <div class="row">
                    <!-- col start -->
                    <div class="<?php echo esc_attr($drex_disable_wid_left);?>">
                        <?php if(have_posts()) : while ( have_posts() ) : the_post();?>
                        <div class="news-item">
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <figure class="portfolio-content news-content-blog">
                                <figcaption>
                                
									
                                    <!-- row start -->
                    <div class="row">
                        <!-- photoSwipe start -->
                        <div class="legendary-gallery">
						<?php $drex_images = rwmb_meta( 'rnr_dr_portfolio_gallery','type=image&size=drex_blog_image' );
						foreach ( $drex_images as $drex_image ){ ?>
                            <!-- gallery item 1 start -->
                            <figure class="col-sm-12 col-md-6 col-lg-6 hover-effect-img move-down">
                                <a data-size="<?php echo esc_attr(($drex_image['width']));?>x<?php echo esc_attr(($drex_image['height']));?>" href="<?php echo esc_url(($drex_image['url']));?>"><img alt="<?php echo esc_attr(($drex_image['title']));?>" class="img-responsive" src="<?php echo esc_url(($drex_image['url']));?>"></a>
                                <figcaption>
                                    <span class="img-caption"><?php echo esc_html(($drex_image['title']));?></span>
                                    <div class="hover-effect"></div>
                                    <div class="hover-icons">
                                        <a class="iw-slide-right ion-ios-plus-empty" href="#"></a> 
                                    </div>
                                </figcaption>
                            </figure><!-- gallery item 1 end -->
                        <?php } ;?>    
                        </div><!-- photoSwipe end -->
                    </div><!-- row end -->
									
									<!-- news IMG end -->
                                    <!-- divider start -->
                                   
									 <div class="inner-divider-timeline-news"></div><!-- divider end -->
                                    <!-- section TXT start -->
                                    <div class="section-txt-news">
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
                            </figure>
						</div>
                        </div><!-- news item 1 end -->
                        <!-- divider start -->
                        <div class="inner-divider-timeline-news"></div><!-- divider end -->
                        <?php endwhile;  endif; wp_reset_postdata(); ?>
						
					
                    </div><!-- col end -->
					<?php if ( is_active_sidebar( 'sidebar-6' ) ) : ?>
					<div class="col-sm-12 col-md-4 col-lg-4">
                        <!-- blog sidebar wrapper start -->
                        <div class="blog-sidebar-wrapper">
						
						<?php dynamic_sidebar( 'sidebar-6' ); ?>
						
						</div>
						<div class="clear"></div>
						<div class="inner-divider"></div>
					</div>
					<?php endif;?>
                </div><!-- row end -->
            </div><!-- container end -->
            <!-- scroll indicator start -->
            <div class="scroll-indicator">
                <div class="scroll-indicator-wrapper">
                    <div class="scroll-line"></div>
                </div>
            </div><!-- scroll indicator end -->
        </div><!-- left side end -->
		<?php if (has_post_thumbnail( $post->ID ) ):
		$drex_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );
		endif;
		?>
        <!-- wave start -->
        <div class="wave-holder">
            <canvas id="wave" data-wavecount="<?php if(!empty($drex_options['wave_count'])):?><?php echo esc_attr(drex_AfterSetupTheme::return_thme_option('wave_count',''));?><?php else : ?>15<?php endif;?>" data-wave-range-x="<?php if(!empty($drex_options['wave_ranage_x'])):?><?php echo esc_attr(drex_AfterSetupTheme::return_thme_option('wave_ranage_x',''));?><?php else : ?>20<?php endif;?>" data-wave-range-y="<?php if(!empty($drex_options['wave_ranage_y'])):?><?php echo esc_attr(drex_AfterSetupTheme::return_thme_option('wave_ranage_y',''));?><?php else : ?>80<?php endif;?>" data-wave-duration-min="<?php if(!empty($drex_options['wave_wave_duration_min'])):?><?php echo esc_attr(drex_AfterSetupTheme::return_thme_option('wave_wave_duration_min',''));?><?php else : ?>20<?php endif;?>" data-wave-duration-max="<?php if(!empty($drex_options['wave_wave_duration_max'])):?><?php echo esc_attr(drex_AfterSetupTheme::return_thme_option('wave_wave_duration_max',''));?><?php else : ?>40<?php endif;?>"></canvas>
        </div><!-- wave end -->
        <!-- right side start -->
        <div class="right-side">
            <!-- container start -->
            <div class="container"></div><!-- container end -->
            <!-- blog page IMG/VIDEO bg start -->
            <div class="home-img-container overlay overlay-dark-60 hide-on-mobile-xs-blog">
                <!-- single IMG start -->
                <div class="slide-img">
                    <!-- single IMG bg start -->
                    <img alt="BG Img" src="<?php echo esc_url($drex_image[0]);?>"><!-- single IMG bg end -->
                </div><!-- single IMG end -->
            </div><!-- blog page IMG/VIDEO bg end -->
        </div><!-- right side end -->
        <!-- section right blog mobile start -->
        <div class="fireOT-right fireOT-right-blog right-side">
            <!-- blog mobile IMG start -->
            <div class="about-img-container overlay overlay-dark-60">
                <div class="slide-img">
                    <img alt="BG Img" src="<?php echo esc_url($drex_image[0]);?>">
                </div>
            </div><!-- blog mobile IMG end -->
        </div><!-- section right blog mobile end -->
		<?php 
		wp_enqueue_script( 'wave' );  
		?> 	
		
        <!-- blog end -->
<?php } else { ?>
<div id="body-content">
<?php if(have_posts()) : while ( have_posts() ) : the_post();?>
<section id="gallery-single-section" class="gallery-single-slider gss-center">
<div class="container-fluid no-padding">
	<div id="lg-share-demo" class="owl-carousel lightgallery cc-height-full owl-mousewheel nav-bottom-right nav-light" data-items="3" data-center="true" data-margin="25" data-autowidth="true" data-loop="true" data-nav="true" data-dots="false">
	
						
						<?php $drex_images = rwmb_meta( 'rnr_dr_portfolio_gallery','type=image&size=' );
                                    foreach ( $drex_images as $drex_image ){
                                        echo "<a href='{$drex_image['url']}' class='cc-item lg-trigger' data-exthumbnail='{$drex_image['url']}' data-facebook-share-url='{$drex_image['url']}' data-twitter-share-url='{$drex_image['url']}' data-googleplus-share-url='{$drex_image['url']}' data-pinterest-share-url='{$drex_image['url']}' data-sub-html=''>

							<!-- cc auto width img -->
							<img class='cc-image cc-auto-width-img' src='{$drex_image['url']}' alt=''>

							<!-- cc auto width img for small devices -->
							<div class='cc-image cc-auto-width-img-bg bg-image' style='background-image: url({$drex_image['url']});'></div>

							<!-- Element cover -->
							<span class='cover'></span>

						</a>
							   ";
								 };?>
	</div>
	
	<!-- Begin gallery single bottom -->
					<div class="gallery-single-bottom">

						<div class="row">
							<div class="col-xs-6">
								<?php if(!empty($drex_options['gallerylink'])):?>
								<!-- for small screens only! -->
								<a href="<?php echo esc_url($drex_options['gallerylink']);?>" class="gs-back-to-list hide-to-sm" title="<?php esc_attr_e('Back To List','drex');?>"><i class="fa fa-th fa-2x"></i></a>
								<?php endif;?>

								<!-- for desktop screens only! -->
								
								
								<!--Begin back to list -->
								<?php if(!empty($drex_options['gallerylink'])):?>
								<!--Begin back to list -->
								<a href="<?php echo esc_url($drex_options['gallerylink']);?>" class="gs-back-to-list hide-from-sm">
								<?php if(!empty($drex_options['gallerylinkbutton'])):?>
								<i class="fa fa-long-arrow-left"></i> <?php echo esc_attr($drex_options['gallerylinkbutton']);?>	
								<?php else: ?>
								<i class="fa fa-long-arrow-left"></i> <?php esc_html_e('Back To List','drex');?>
								<?php endif;?>
								</a>
								<!--End back to list -->
								<?php else: ?>
								<?php endif;?>
								<!--End back to list -->
								

							</div> <!-- /.col -->

							<div class="col-xs-6 text-right">

								<!-- Begin gallery meta -->
								<ul class="gallery-meta">
									<li>
									<?php global $drex_content;
									$drex_content = get_the_content();
									?>
									<?php if($drex_content != '') { ?>
										<!-- Begin content info trigger  -->
										<div class="content-modal-trigger">
											<a href="#0" class="content-modal-icon" title="Info" data-toggle="modal" data-target="#modal-09665622">
												<i class="fa fa-info-circle"></i>
											</a>
										</div>
										<!-- End content info trigger -->
										<?php }?>
										<!-- Begin modal (for content info) 
										=====================================
										* Use class "modal-center" to enable modal center position.
										-->
										<div id="modal-09665622" class="modal modal-center fade" tabindex="-1" role="dialog" aria-hidden="false">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#215;</span></button>
														<h4 class="modal-title"><?php esc_html_e('Info','drex');?></h4>
													</div>
													<div class="modal-body">

														<!-- Begin modal info -->
														<div class="modal-info">

															<h4 class="font-alter-1"><?php the_title();?></h4>
															<?php the_content();?>
														</div>
														<!-- End modal info -->

													</div>
													
												</div> <!-- /.modal-content -->
											</div> <!-- /.modal-dialog -->
										</div>
										<!-- End modal -->
									</li>
									<?php get_template_part('template-parts/share');?>
									
								</ul>
								<!-- End gallery meta -->

							</div> <!-- /.col -->
						</div> <!-- /.row -->

					</div>
					<!-- End gallery single bottom -->
</div>
<?php wp_enqueue_style( 'drex-blog' );?>
</section>
<?php endwhile;  endif; wp_reset_postdata(); ?>
</div>
<?php } ;?>

<?php get_footer(); ?>	