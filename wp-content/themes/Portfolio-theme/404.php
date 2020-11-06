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
<?php 
$drex_active_wid_left='left-side';
$drex_disable_wid_left='col-sm-12 col-md-12 col-lg-12';
?>
<?php endif;?>
<!-- blog start -->
        <!-- left side start -->
        <div class="left-side" id="blog">
          <!-- center block start -->
                <div class="center-block">
                    <!-- container start -->
                    <div class="container-home">
                        <div class="introduction">
						<div class="inner-divider-half-home"></div>
                            <!-- page title start -->
                            <h1 class="home-page-title">
                                <?php if(!empty($drex_options['translet_opt_24'])):?><?php echo esc_html(drex_AfterSetupTheme::return_thme_option('translet_opt_24',''));?><?php else: ?><?php esc_html_e('Error 404','drex');?><?php endif;?>
                            </h1><!-- page title end -->
                            <!-- divider start -->
                            <div class="inner-divider-half-home"></div><!-- divider end -->
                            <!-- page subtitle start -->
                            <h3>
                                  <?php if(!empty($drex_options['translet_opt_7'])):?><?php echo esc_html(drex_AfterSetupTheme::return_thme_option('translet_opt_7',''));?><?php else: ?><?php esc_html_e('Sorry that page you are looking for not found.','drex');?><?php endif;?>
                            </h3><!-- page subtitle end -->
                            <!-- divider start -->
                            <div class="inner-divider-half-home"></div><!-- divider end -->
                            <!-- sign up modal launcher start -->
                            <div class="the-button-wrapper sign-up-modal-launcher">
                                <a class="the-button" href="<?php echo esc_url(home_url( '/' )); ?>">
                                   <?php if(!empty($drex_options['translet_opt_30'])):?><?php echo esc_html(drex_AfterSetupTheme::return_thme_option('translet_opt_30',''));?><?php else: ?><?php esc_html_e('Back To Home','drex');?><?php endif;?>
                                </a>
                            </div><!-- sign up modal launcher end -->
							<div class="inner-divider-half-home"></div>
                        </div>
                    </div><!-- container end -->
                </div><!-- center block end -->  
        </div><!-- left side end -->
		
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
                    <img alt="BG Img" src="<?php echo esc_url(drex_AfterSetupTheme::return_thme_option('404img','url'));?>"><!-- single IMG bg end -->
                </div><!-- single IMG end -->
            </div><!-- blog page IMG/VIDEO bg end -->
        </div><!-- right side end -->
        <!-- section right blog mobile start -->
        <div class="fireOT-right fireOT-right-blog right-side">
            <!-- blog mobile IMG start -->
            <div class="about-img-container overlay overlay-dark-60">
                <div class="slide-img">
                    <img alt="BG Img" src="<?php echo esc_url(drex_AfterSetupTheme::return_thme_option('404img','url'));?>">
                </div>
            </div><!-- blog mobile IMG end -->
        </div><!-- section right blog mobile end -->
		<?php 
		wp_enqueue_script( 'wave' );  
		?> 	
		
        <!-- blog end -->
<?php get_footer(); ?>	