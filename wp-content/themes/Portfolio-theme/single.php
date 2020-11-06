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
                        <?php if(!empty($drex_options['blogtitle'])):?><?php echo esc_attr(drex_AfterSetupTheme::return_thme_option('blogtitle',''));?>
						<?php else : ?>
						<?php esc_html_e('News','drex');?>
						<?php endif;?>
                        </h1><!-- page title end -->
						<?php if(!empty($drex_options['blogsubtitle'])):?>
                        <!-- divider start -->
                        <div class="inner-divider-half"></div><!-- divider end -->
                        <!-- section subtitle start -->
                        <h2 class="section-heading section-heading-all section-heading-light">
                       <?php echo esc_attr(drex_AfterSetupTheme::return_thme_option('blogsubtitle',''));?>
                        </h2><!-- section subtitle end -->
						<?php endif;?>
                    </div><!-- col end -->
                </div><!-- row end -->
                <!-- divider start -->
                <div class="inner-divider"></div><!-- divider end -->
			<?php endif;?>
                <!-- row start -->
                <div class="row">
                    <!-- col start -->
                    <div class="<?php echo esc_attr($drex_disable_wid_left);?>">
                        <?php if(have_posts()) : while ( have_posts() ) : the_post();?>
						<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
						<!-- Begin blog single post 
								============================= -->
								<article class="blog-single-post">

									<!-- Blog single image -->
									<?php if (has_post_thumbnail( $post->ID ) ):
									$drex_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
									<div class="blog-single-image bg-image" style="background-image: url(<?php echo esc_url($drex_image[0]);?>);"></div>
									<?php endif;?>

									<!-- Begin blog single heading -->
									<div class="blog-single-post-heading">
										<h1 class="blog-single-post-title"><?php the_title();?></h1>
										<div class="blog-single-post-category"><?php the_category(', ') ?></div>
									</div>
									<!-- End blog single heading -->

									<!-- Begin blog single post inner -->
									<div class="blog-single-post-inner">

										<!-- Begin blog single attributes -->
										<div class="blog-single-attributes">
											<div class="row">
												<div class="col-sm-8">

													<!-- Begin blog single meta -->
													<div class="blog-single-meta-wrap">

														<!-- Blog single author avatar -->
														<a href="<?php the_permalink();?>" class="author-avatar pull-left bg-image"><?php
									// Display author avatar
									echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( '', 45 ) ); ?></a>
														<?php
														global $drex_post_meta_by_t_opt;
														if(!empty($drex_options['translet_opt_27'])):
														$drex_post_meta_by_t_opt= esc_html(drex_AfterSetupTheme::return_thme_option('translet_opt_27',''));
														else: 
														$drex_post_meta_by_t_opt='by';
														endif;
														?>
														<div class="blog-single-meta">
															<div class="article-author"><?php echo esc_html($drex_post_meta_by_t_opt);?>: <a href="<?php the_permalink();?>"><?php the_author();?></a></div>
															<div class="article-time-cat">
																<span class="article-time"><?php the_time( get_option( 'date_format' ) ); ?></span>
															</div>
														</div>

													</div>
													<!-- End blog single meta -->

												</div> <!-- /.col -->

												<div class="col-sm-4">

													<!-- Begin blog single links -->
													<ul class="blog-single-links list-unstyled list-inline">
														<li>
															<!-- Begin comments count -->
															<a href="#blog-post-comments" class="blog-single-comment-count sm-scroll" title="Read the comments"><i class="fa fa-comment-o"></i> <?php echo esc_attr(comments_number( '0', ' 1 ', ' % ' )); ?></a>
															<!-- End comments count -->
														</li>
														<?php if(function_exists('the_views')) {?>
														<li>
															
															<!-- Begin views count -->
															<div class="blog-single-views-count" title="Post Views"><i class="fa fa-eye"></i> <?php  the_views(); ?></div>
															
															<!-- End views count -->
														</li>
														<?php } ?>
													</ul>
													<!-- End blog single links -->

												</div> <!-- /.col -->
											</div> <!-- /.row -->
										</div>
										<!-- End blog single attributes -->

										<!-- Begin post content -->
										<div class="post-content lightgallery page-content-default">
											
											
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
										

										</div>
										<!-- End post content -->

										<!-- Begin blog single attributes -->
										<div class="blog-single-attributes margin-top-60">
											<div class="row">
												<div class="col-sm-8">
													<?php if( has_tag() ) {?>
													<!-- Begin blog single tags -->
													<div class="blog-single-tags">
														<?php
														global $drex_post_tag_t_opt;
														if(!empty($drex_options['translet_opt_26'])):
														$drex_post_tag_t_opt= esc_html(drex_AfterSetupTheme::return_thme_option('translet_opt_26',''));
														else: 
														$drex_post_tag_t_opt='Tags:';
														endif;
														?>
														<ul>
															<li><span><?php echo esc_html($drex_post_tag_t_opt);?></span></li>
															<?php the_tags( '<li>', '</li><li>', '</li>' ); ?>
														</ul>
														
													</div>
													<?php }?>
													<!-- End blog single tags -->

												</div> <!-- /.col -->

												<div class="col-sm-4 text-right">

													<!-- Begin blog single links -->
													<ul class="blog-single-links list-unstyled list-inline">
														
														<?php if ( comments_open() || get_comments_number() ) {?>
														<li>
														<?php
														global $drex_comment_send_comment;
														if(!empty($drex_options['translet_opt_17'])):
														$drex_comment_send_comment= esc_html(drex_AfterSetupTheme::return_thme_option('translet_opt_17',''));;
														else: 
														$drex_comment_send_comment='Leave a Comment';
														endif;
														?>
															<!-- Begin leave a comment button -->
															<a href="#commentform" class="leave-comment-btn sm-scroll"><?php echo esc_html($drex_comment_send_comment);?></a>
															<!-- End leave a comment button -->
														</li>
														<?php } ;?>
													</ul>
													<!-- End blog single links -->

												</div> <!-- /.col -->
											</div> <!-- /.col -->
										</div>
										<!-- End blog single attributes -->
										<?php if ($drex_options['blogpostshare']=="st2") {?>
										<?php 
										global $drex_share_post_t_opt;
										if(!empty($drex_options['share_post_text_t'])):
										$drex_share_post_t_opt= esc_html(drex_AfterSetupTheme::return_thme_option('share_post_text_t',''));;
										else: 
										$drex_share_post_t_opt='Share:';
										endif;
										
										?>
										<!-- Begin blog single post share -->
										<div class="blog-single-share">
											<ul class="share-container share-blog-post"  data-share="['facebook','pinterest','twitter','linkedin']">
												<li class="bss-text"><?php echo esc_html($drex_share_post_t_opt);?></li>
												
												
											</ul>
										</div>
										<!-- End blog single post share -->
										<?php } ;?>
									</div>
									<!-- End blog single post inner -->

								</article> 
								<!-- End blog single post -->


								<?php if ($drex_options['blogpostnav']=="st2") {?>
								<?php 
								global $drex_pagi_prev_post_t, $drex_pagi_next_post_t, $drex_pagi_back_to_t, $drex_pagi_back_to_home_t;
								if(!empty($drex_options['prev_post_t'])):
								$drex_pagi_prev_post_t= esc_html(drex_AfterSetupTheme::return_thme_option('prev_post_t',''));;
								else: 
								$drex_pagi_prev_post_t='Prev Post';
								endif;
								if(!empty($drex_options['next_post_t'])):
								$drex_pagi_next_post_t= esc_html(drex_AfterSetupTheme::return_thme_option('next_post_t',''));;
								else: 
								$drex_pagi_next_post_t='Next Post';
								endif;
								if(!empty($drex_options['back_to_t'])):
								$drex_pagi_back_to_t= esc_html(drex_AfterSetupTheme::return_thme_option('back_to_t',''));;
								else: 
								$drex_pagi_back_to_t='Back To';
								endif;
								
								if(!empty($drex_options['back_to_home_t'])):
								$drex_pagi_back_to_home_t= esc_html(drex_AfterSetupTheme::return_thme_option('back_to_home_t',''));;
								else: 
								$drex_pagi_back_to_home_t='Back To';
								endif;
								
								?>
								<!-- Begin blog single nav 
								=========================== -->
								<?php $drex_next_post = get_next_post();
								$drex_nxt_url = is_object( $drex_next_post ) ? get_permalink( $drex_next_post->ID ) : '';
								$drex_nxt_title = is_object( $drex_next_post ) ? get_the_title( $drex_next_post->ID ) : ''; 
								
								?>
								<?php $drex_previous_post = get_previous_post();
								$drex_pre_url = is_object( $drex_previous_post ) ? get_permalink( $drex_previous_post->ID ) : '';
								$drex_pre_title = is_object( $drex_previous_post ) ? get_the_title( $drex_previous_post->ID ) : ''; 
								
								?>
								<div class="blog-single-nav">
								    <?php if ($drex_previous_post) {?>
									<div class="bs-nav-col bs-nav-left">
										<div class="bs-nav-text"><i class="fa fa-long-arrow-left"></i> <?php echo esc_html($drex_pagi_prev_post_t);?></div>
										<a href="<?php echo esc_url( $drex_pre_url ); ?>" class="bs-nav-title"><h4><?php echo esc_html( $drex_pre_title ); ?></h4></a>
									</div>
									<?php } else { ?>
									<div class="bs-nav-col bs-nav-left">
										<div class="bs-nav-text"><i class="fa fa-long-arrow-left"></i> <?php echo esc_html($drex_pagi_back_to_t);?></div>
										<a href="<?php echo esc_url(home_url( '/' )); ?>" class="bs-nav-title"><h4><?php echo esc_html($drex_pagi_back_to_home_t); ?></h4></a>
									</div>
									<?php } ;?>
									<?php if ($drex_next_post) {?>
									<div class="bs-nav-col bs-nav-right">
										<div class="bs-nav-text"><?php echo esc_html($drex_pagi_next_post_t);?><i class="fa fa-long-arrow-right"></i></div>
										<a href="<?php echo esc_url( $drex_nxt_url ); ?>" class="bs-nav-title"><h4><?php echo esc_html( $drex_nxt_title ); ?></h4></a>
									</div>
									<?php } else { ?>
									<div class="bs-nav-col bs-nav-right">
										<div class="bs-nav-text"><?php echo esc_html($drex_pagi_back_to_t);?><i class="fa fa-long-arrow-right"></i></div>
										<a href="<?php echo esc_url(home_url( '/' )); ?>" class="bs-nav-title"><h4><?php echo esc_html($drex_pagi_back_to_home_t); ?></h4></a>
									</div>
									<?php } ;?>
								</div>
								<!-- End blog single nav -->
								<?php } else { ?>
								<?php } ;?>
								<?php if ($drex_options['blogpostmore']=="st2") {?>
								<?php 
								global $drex_more_post_t_opt;
								if(!empty($drex_options['more_post_text_t'])):
								$drex_more_post_t_opt= esc_html(drex_AfterSetupTheme::return_thme_option('more_post_text_t',''));;
								else: 
								$drex_more_post_t_opt='You Might Also Like:';
								endif;
								
								?>
								<!-- Begin related posts 
								========================= -->
								<div class="related-posts">
									<h3 class="related-posts-heading"><?php echo esc_html($drex_more_post_t_opt);?></h3>

									
									<div class="owl-carousel nav-outside-top nav-light" data-items="3" data-margin="20" data-nav="true" data-dots="false" data-mobile-landscape="2" data-mobile-portrait="1">
							    <?php
								global $post, $post_id;;
								$paged=(get_query_var('paged'))?get_query_var('paged'):1;
								$loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page'=>'6', 'orderby' => 'rand', 'category_name'=> '', 'paged'=>$paged ) ); ?>
								<?php while ( $loop->have_posts() ) : $loop->the_post();?>
								<?php if (has_post_thumbnail( $post->ID ) ):
								$drex_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
										<!-- Begin related posts item -->
										<div class="related-posts-item">
											<a href="<?php the_permalink();?>" class="rp-item-image bg-image" style="background-image: url(<?php echo esc_url($drex_image[0]);?>);"></a>
											<div class="rp-item-info">
												<div class="rp-item-category"><?php the_category(', ') ?></div>
												<a href="" class="rp-item-title"><h4><?php the_title();?></h4></a>
											</div>
										</div>
										<!-- End related posts item -->
										<?php endif; ?>
										<?php endwhile; ?>
									    <?php wp_reset_postdata();?>
										

									</div>
									<!-- End content carousel -->

								</div>
								<!-- End related posts -->
								<?php } else { ?>
								<?php } ;?>

								<?php if ( comments_open() || get_comments_number() ) { ?>
								<!-- Begin post comments 
								========================= -->
								<div id="blog-post-comments">
								<?php comments_template();?>
								</div>
								<!-- End post comments -->
								<?php } ?>
		                <?php else:?>
						
                        <div class="news-item">
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <figure class="news-content news-content-blog">
                                <figcaption>
                                    <!-- news subtitle start -->
                                    <h3>
                                    <span class="blog-category-title"><?php esc_html_e('Category:','drex');?></span> <span class="blog-category"><?php the_category(' / ');?></span>
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
									
                                    <img alt="<?php the_title_attribute();?>" src="<?php echo esc_url($drex_image[0]);?>">
									
									<!-- news IMG end -->
                                    <!-- divider start -->
                                   
									<?php endif;?>
									 <div class="inner-divider-timeline-news"></div><!-- divider end -->
                                    <!-- section TXT start -->
                                    <div class="section-txt-news page-content-default">
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
								<?php if (drex_AfterSetupTheme::return_thme_option('blog_details_user')=='st2'){ ?>
                                <!-- divider start -->
                                    <div class="inner-divider-timeline-news"></div><!-- divider end -->
                                    <!-- section TXT start -->
                                    <!-- testimonials IMG start -->
                                    <div class="testimonials-quote-img">
                                        <?php echo get_avatar( get_the_author_meta(''), $size = '100'); ?>
                                    </div><!-- testimonials IMG end -->
                                    <!-- divider start -->
                                    <div class="inner-divider-half"></div><!-- divider end -->
                                    <!-- section testimonial start -->
                                    <div class="section-txt-news-author">
                                        <p>
                                            <?php the_author_meta('description'); ?>
                                        </p>
                                    </div><!-- section testimonial end -->
                                    <!-- divider start -->
                                    <div class="inner-divider-half"></div><!-- divider end -->
                                    <div class="testimonials-signature">
                                        <?php the_author();?>
                                    </div><!-- section TXT end -->    
                                <?php } ;?>
								
								<?php if ( comments_open() || get_comments_number() ) { ?>
								
								<div id="blog-post-comments">
								<?php comments_template();?>
								</div>
								<?php }?>
								</figcaption>
                            </figure>
						</div>
                        </div><!-- news item 1 end -->
                        <!-- divider start -->
                        <div class="inner-divider-timeline-news"></div><!-- divider end -->
						<?php endif;?>
                        <?php endwhile;  endif; wp_reset_postdata(); ?>
						
					
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
		<?php wp_enqueue_style( 'drex-blog-comment-sidebar' );?>
        <!-- blog end -->
<?php get_footer(); ?>	