<?php $drex_options = get_option('drex'); ?>
<?php
get_header();
?>	
<div class="inner-divider"></div>
<?php global $drex_active_wid_left, $drex_disable_wid_left ;?>
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
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
            <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<?php else:?>
            <!-- divider start -->
            <div class="inner-divider"></div><!-- divider end -->
		<?php endif;?>
            <!-- container start -->
            <div class="container">
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<?php else:?>
                <!-- row start -->
                <div class="row">
                    <!-- col start -->
                    <div class="col-lg-12">
                        <!-- page title start -->
                        <h1 class="home-page-title-all">
                        <?php if(!empty($drex_options['cat-page-title'])): ?>
							<?php echo esc_html(($drex_options['cat-page-title']));?>
							<?php else :?>
							<?php esc_html_e('Category','drex');?>
							<?php endif;?>
                        </h1><!-- page title end -->
						
                        <!-- divider start -->
                        <div class="inner-divider-half"></div><!-- divider end -->
                        <!-- section subtitle start -->
                        <h2 class="section-heading section-heading-all section-heading-light">
                       <?php single_cat_title( '', true ); ?>
                        </h2><!-- section subtitle end -->
						
                    </div><!-- col end -->
                </div><!-- row end -->
                <!-- divider start -->
                <div class="inner-divider"></div><!-- divider end -->
				<?php endif;?>
                <!-- row start -->
                <div class="row">
                    <!-- col start -->
                    <div class="<?php echo esc_attr($drex_disable_wid_left);?>">
                        <?php global $post, $post_id;?>
						<?php while ( have_posts() ) : the_post();?>
						<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

											<!-- Begin blog list item -->
											<article class="blog-list-item isotope col-1">
												<?php if (has_post_thumbnail( $post->ID ) ):
												$drex_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
												<!-- Blog list item image -->
												<a href="<?php the_permalink();?>" class="bl-item-image"><img src="<?php echo esc_url($drex_image[0]);?>" alt="<?php the_title_attribute();?>"></a>
												
												<!-- Begin blog list item info -->
												<div class="bl-item-info wr-blog-main">
													<div class="bl-item-category"><?php the_category(', ') ?></div>
													<a href="<?php the_permalink();?>" class="bl-item-title"><h2><?php the_title(); ?></h2></a>
													<div class="bl-item-meta">
														<i class="fa fa-clock-o"></i> 
														<span class="published"><?php the_time( get_option( 'date_format' ) ); ?></span>
														<?php
														global $drex_post_meta_by_t_opt;
														if(!empty($drex_options['translet_opt_27'])):
														$drex_post_meta_by_t_opt= esc_html(drex_AfterSetupTheme::return_thme_option('translet_opt_27',''));
														else: 
														$drex_post_meta_by_t_opt='by';
														endif;
														?>
														<span class="posted-by"><?php esc_attr_e('-','drex');?><?php echo esc_html($drex_post_meta_by_t_opt)?> <a href="<?php the_permalink();?>" title="<?php the_author();?>"><?php the_author();?></a></span>
													</div>
													<div class="bl-item-desc">
														<?php
												$drex_excerpt= substr(strip_tags($post->post_content), 0, 183);
												update_post_meta(get_the_ID(), 'drex_excerpt', $drex_excerpt);
												echo esc_html($drex_excerpt);
												?>...
													</div>
													<div class="the-button-wrapper the-button-wrapper-news">
														<a class="the-button" href="<?php the_permalink();?>">
															<?php
														global $drex_post_read_more_opt;
														if(!empty($drex_options['translet_opt_28'])):
														$drex_post_read_more_opt= esc_html(drex_AfterSetupTheme::return_thme_option('translet_opt_28',''));
														else: 
														$drex_post_read_more_opt='Read More';
														endif;
														?>
                                            <?php echo esc_html($drex_post_read_more_opt);?>
														</a>
													</div><!-- the button wrapper end -->
												</div>
												<!-- End blog list item info -->
												<?php else:?>
												<div class="bl-item-info wr-blog-item-list">
													<div class="bl-item-category"><?php the_category(', ') ?></div>
													<a href="<?php the_permalink();?>" class="bl-item-title"><h2><?php the_title(); ?></h2></a>
													<div class="bl-item-meta">
														<i class="fa fa-clock-o"></i> 
														<span class="published"><?php the_time( get_option( 'date_format' ) ); ?></span>
														<?php
														global $drex_post_meta_by_t_opt;
														if(!empty($drex_options['translet_opt_27'])):
														$drex_post_meta_by_t_opt= esc_html(drex_AfterSetupTheme::return_thme_option('translet_opt_27',''));
														else: 
														$drex_post_meta_by_t_opt='by';
														endif;
														?>
														<span class="posted-by"><?php esc_attr_e('-','drex');?><?php echo esc_html($drex_post_meta_by_t_opt)?> <a href="<?php the_permalink();?>" title="<?php the_author();?>"><?php the_author();?></a></span>
													</div>
													<div class="bl-item-desc">
														<?php
												$drex_excerpt= substr(strip_tags($post->post_content), 0, 183);
												update_post_meta(get_the_ID(), 'waldo_excerpt', $drex_excerpt);
												echo esc_html($drex_excerpt);
												?>...
													</div>
													<div class="the-button-wrapper the-button-wrapper-news">
														<a class="the-button" href="<?php the_permalink();?>">
															<?php
														global $drex_post_read_more_opt;
														if(!empty($drex_options['translet_opt_28'])):
														$drex_post_read_more_opt= esc_html(drex_AfterSetupTheme::return_thme_option('translet_opt_28',''));
														else: 
														$drex_post_read_more_opt='Read More';
														endif;
														?>
                                            <?php echo esc_html($drex_post_read_more_opt);?>
														</a>
													</div><!-- the button wrapper end -->
												</div>
												<?php endif;?>

											</article>
											<!-- End blog list item -->

										</div>
			            <?php else:?>
                        <div class="news-item">
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <figure class="news-content news-content-blog">
                                <figcaption>
                                    <!-- news subtitle start -->
                                    <h3>
														<?php
														global $drex_post_meta_cat_t_opt;
														if(!empty($drex_options['translet_opt_29'])):
														$drex_post_meta_cat_t_opt= esc_html(drex_AfterSetupTheme::return_thme_option('translet_opt_29',''));
														else: 
														$drex_post_meta_cat_t_opt='Category';
														endif;
														?>
                                    <span class="blog-category-title"><?php echo esc_html($drex_post_meta_cat_t_opt)?><?php esc_html_e(':','drex');?></span> <span class="blog-category"><?php the_category(' / ');?></span>
                                    </h3><!-- news subtitle end -->
                                    <!-- divider start -->
                                    <div class="inner-divider-half"></div><!-- divider end -->
                                    <!-- news title start -->
                                    <h2 class="section-heading section-heading-all section-heading-light section-heading-news">
                                        <?php the_title();?>
                                    </h2><!-- news title end -->
                                    <!-- divider start -->
                                    <div class="inner-divider-half"></div><!-- divider end -->
                                    <!-- news date start -->
                                    <h5>
                                        <?php the_time( get_option( 'date_format' ) ); ?>
                                    </h5><!-- news date end -->
									<?php if (has_post_thumbnail( $post->ID ) ):
									$drex_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
                                    <!-- divider start -->
                                    <div class="inner-divider-timeline-news"></div><!-- divider end -->
                                    <!-- news IMG start -->
									<a href="<?php the_permalink();?>">
                                    <img alt="<?php the_title_attribute();?>" src="<?php echo esc_url($drex_image[0]);?>">
									</a>
									<!-- news IMG end -->
                                    <!-- divider start -->
                                    
									<?php endif;?>
									<div class="inner-divider-timeline-news"></div><!-- divider end -->
                                    <!-- section TXT start -->
                                    <div class="section-txt-news">
									<?php if( wp_link_pages('echo=0') ): ?>
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
										<?php else : ?>
                                        <p>
                                            <?php $drex_excerpt= substr(strip_tags($post->post_content), 0, 300);
											update_post_meta(get_the_ID(), 'drex_excerpt', $drex_excerpt);
											echo esc_html($drex_excerpt); ?>
                                        </p>
										<?php endif;?>
                                    </div><!-- section TXT end -->
                                    <!-- divider start -->
                                    <div class="inner-divider-timeline-news"></div><!-- divider end -->
                                    <!-- the button wrapper start -->
                                    <div class="the-button-wrapper the-button-wrapper-news">
                                        <a class="the-button" href="<?php the_permalink();?>">
                                            <?php
														global $drex_post_read_more_opt;
														if(!empty($drex_options['translet_opt_28'])):
														$drex_post_read_more_opt= esc_html(drex_AfterSetupTheme::return_thme_option('translet_opt_28',''));
														else: 
														$drex_post_read_more_opt='Read More';
														endif;
														?>
                                            <?php echo esc_html($drex_post_read_more_opt);?>
                                        </a>
                                    </div><!-- the button wrapper end -->
                                </figcaption>
                            </figure>
						</div>
                        </div><!-- news item 1 end -->
                        <!-- divider start -->
                        <div class="inner-divider"></div><!-- divider end -->
						<?php endif;?>
                        <?php endwhile; ?>
						<?php wp_reset_postdata();?>
						<div class="hidden"><?php the_tags(); next_posts_link(); previous_posts_link();wp_link_pages();comment_form();paginate_comments_links();previous_comments_link(); wp_enqueue_script('comment-reply'); the_post_thumbnail();?></div>
						<!-- Pagination -->
						<?php if (function_exists("drex_pagination")) {
						drex_pagination($wp_query->max_num_pages);
						} ?>
                    </div><!-- col end -->
					<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
					<div class="col-sm-12 col-md-4 col-lg-4">
                        <!-- blog sidebar wrapper start -->
                        <div class="blog-sidebar-wrapper">
						
						<?php dynamic_sidebar( 'sidebar-1' ); 
						wp_enqueue_style( 'drex-blog' );
						?>
						
						</div>
						<div class="clear"></div>
						<div class="inner-divider"></div>
					</div>
					<?php endif;?>
                </div><!-- row end -->
            </div><!-- container end -->
            <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		    <?php else : ?>
            <!-- scroll indicator start -->
            <div class="scroll-indicator">
                <div class="scroll-indicator-wrapper">
                    <div class="scroll-line"></div>
                </div>
            </div><!-- scroll indicator end -->
			<?php endif;?>
        </div><!-- left side end -->
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<?php else : ?>
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
                    <img alt="BG Img" src="<?php echo esc_url(drex_AfterSetupTheme::return_thme_option('blogimg','url'));?>"><!-- single IMG bg end -->
                </div><!-- single IMG end -->
            </div><!-- blog page IMG/VIDEO bg end -->
        </div><!-- right side end -->
        <!-- section right blog mobile start -->
        <div class="fireOT-right fireOT-right-blog right-side">
            <!-- blog mobile IMG start -->
            <div class="about-img-container overlay overlay-dark-60">
                <div class="slide-img">
                    <img alt="BG Img" src="<?php echo esc_url(drex_AfterSetupTheme::return_thme_option('blogimg','url'));?>">
                </div>
            </div><!-- blog mobile IMG end -->
        </div><!-- section right blog mobile end -->
		<?php 
		wp_enqueue_script( 'wave' );  
		?> 	
		<?php endif;?>
        <!-- blog end -->
<?php get_footer(); ?>	