<?php $drex_options = get_option('drex'); ?>
<?php
if ( post_password_required() ) {
	return;
}
?>


	<?php
	
	if ( have_comments() ) : ?>
	<?php
	global $drex_comment_meta_text, $drex_comment_meta_text2, $drex_comment_meta_text3;
	if(!empty($drex_options['translet_opt_10'])):
	$drex_comment_meta_text= esc_html(drex_AfterSetupTheme::return_thme_option('translet_opt_10',''));;
	else: 
	$drex_comment_meta_text='One thought on';
	endif;
	if(!empty($drex_options['translet_opt_11'])):
	$drex_comment_meta_text2= esc_html(drex_AfterSetupTheme::return_thme_option('translet_opt_11',''));;
	else: 
	$drex_comment_meta_text2='thought on';
	endif;
	if(!empty($drex_options['translet_opt_12'])):
	$drex_comment_meta_text3= esc_html(drex_AfterSetupTheme::return_thme_option('translet_opt_12',''));;
	else: 
	$drex_comment_meta_text3='thoughts on';
	endif;
	?>
		
		<h2 class="section-heading section-heading-all section-heading-light section-heading-news sidebar-style-comment">
			<?php
			$comment_count = get_comments_number();
			if ( 1 === $comment_count ) {
				printf(
					
					esc_html__( ''.$drex_comment_meta_text.' &ldquo;%1$s&rdquo;', 'drex' ),
					'' . get_the_title() . ''
				);
			} else {
				printf( 
					esc_html__( _nx( '%1$s '.$drex_comment_meta_text2.' &ldquo;%2$s&rdquo;', '%1$s '.$drex_comment_meta_text3.' &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'drex' ) ),
					number_format_i18n( $comment_count ),
					'' . get_the_title() . ''
				);
			}
			?>	
			</h2>
		
		
		
		<!-- .comments-title -->

		<?php the_comments_navigation(); ?>
		<div class="clear"></div>
		
			
			<?php
				wp_list_comments( array(
					'callback'   => 'drex_sidebar_style_comment',
					'short_ping' => true,
				) );
			?>
		<div class="clear"></div>
		
		
		
		<?php 
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'drex' ); ?></p>
		
		<!-- LEAVE A COMMENT -->
        
		<?php
		endif;
	endif; // Check for have_comments(). ?>
	
 	
<div class="block-form box-border">
	<?php 
	global $drex_comment_your_name, $drex_comment_your_email, $drex_comment_your_comment, $drex_comment_send_commen, $drex_comment_submit_comment;
			if(!empty($drex_options['translet_opt_14'])):
			$drex_comment_your_name= esc_html(drex_AfterSetupTheme::return_thme_option('translet_opt_14',''));;
			else: 
			$drex_comment_your_name='Your Name*';
			endif;
			if(!empty($drex_options['translet_opt_15'])):
			$drex_comment_your_email= esc_html(drex_AfterSetupTheme::return_thme_option('translet_opt_15',''));;
			else: 
			$drex_comment_your_email='Your Email*';
			endif;
			if(!empty($drex_options['translet_opt_16'])):
			$drex_comment_your_comment= esc_html(drex_AfterSetupTheme::return_thme_option('translet_opt_16',''));;
			else: 
			$drex_comment_your_comment='Your Comment*';
			endif;
			if(!empty($drex_options['translet_opt_17'])):
			$drex_comment_send_comment= esc_html(drex_AfterSetupTheme::return_thme_option('translet_opt_17',''));;
			else: 
			$drex_comment_send_comment='Leave a Comment';
			endif;
			if(!empty($drex_options['translet_opt_25'])):
			$drex_comment_submit_comment= esc_html(drex_AfterSetupTheme::return_thme_option('translet_opt_25',''));;
			else: 
			$drex_comment_submit_comment='Submit';
			endif;
	 $drex_args = array(
		'fields' => apply_filters(
		'comment_form_default_fields', array(
			
			'author' =>'<div class="row"><div class="col-sm-6 col-md-6 col-lg-6">' . '<input id="author" class="inp"  placeholder="'.esc_attr( $drex_comment_your_name) .'" name="author" type="text" value="' .
				esc_attr( $commenter['comment_author'] ) . '" size="40"/>'.
				
				'</div>'
				,
			'email'  => '<div class="col-sm-6 col-md-6 col-lg-6">' . '<input class="inp" id="email" placeholder="'.esc_attr( $drex_comment_your_email) .'" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				'" size="40"/>'  .
				
				'</div></div>',
			
		)
		),
		'comment_field' => '<div class="row"><div class="make-space">' .
		'<textarea id="comment" class="form-message" name="comment" cols="50" rows="8" placeholder="'.esc_attr( $drex_comment_your_comment) .'" aria-required="true"></textarea>' .
		'</div>',
		'comment_notes_after' => '<div class="contact-form-submit-wrapper">
                                                            <button class="the-button the-button-submit" id="submit" type="submit"><span>'.esc_html($drex_comment_submit_comment).'</span></button>
                                                        </div></div>',
		'title_reply' => '<div class="comment-title-area crunchify-text"> <div class="comment-title"><h2>'.esc_attr( $drex_comment_send_comment) .'</h2></div></div>'
		
	);
	comment_form($drex_args);
	?>
	</div>	


