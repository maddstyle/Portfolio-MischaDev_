<?php $drex_options = get_option('drex'); ?>
<?php
global $drex_image, $drex_page_back;
 if (has_post_thumbnail( $post->ID ) ):
$drex_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );
$drex_page_back ='background-image:url('.$drex_image[0].');  '
?>
<?php endif;?>
<li>
													<!-- Begin content share trigger  -->
													<div class="content-share-trigger">
														<a href="#0" class="content-share-icon" title="Share this album" data-toggle="modal" data-target="#modal-38874978">
															<i class="fa fa-share-alt"></i>
														</a>
													</div>
													<!-- End content share trigger -->

													<!-- Begin modal (for content share) 
													=====================================
													* Use class "modal-center" to enable modal center position.
													-->
													<div id="modal-38874978" class="modal modal-center fade" tabindex="-1" role="dialog" aria-hidden="false">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#215;</span></button>
																	<h4 class="modal-title"><?php esc_html_e('Share this album','drex');?></h4>
																</div>
																<div class="modal-body">

																	<!-- Begin modal share -->
																	<div class="modal-share">
																		<div class="modal-share-image" style="<?php echo esc_attr($drex_page_back);?>"></div>
																		
																		<!-- Begin social buttons -->
																		<div class="social-buttons">
									<ul class="share-container"  data-share="['facebook','pinterest','twitter','linkedin']">
													
									</ul>
																		</div>
																		<!-- End social buttons -->
																		
																		<input class="grab-link" type="text" readonly="" value="<?php the_permalink();?>" onclick="this.select()">
																	</div>
																	<!-- End modal share -->

																</div>
																
															</div> <!-- /.modal-content -->
														</div> <!-- /.modal-dialog -->
													</div>
													<!-- End modal -->
												</li>