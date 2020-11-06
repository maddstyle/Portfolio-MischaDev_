<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>> 
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php $drex_options = get_option('drex'); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="height=device-height, width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<?php 
	wp_head(); 
	?>
</head>
<body <?php body_class(); ?>>
<?php if (drex_AfterSetupTheme::return_thme_option('back_ani_opt')=='st2'){ ?>
<?php } else { ?>
<!-- preloader start -->
        <div class="preloader-bg"></div>
        <div id="preloader">
            <div id="preloader-status">
                <div class="preloader-position loader">
                    <span></span>
                </div>
            </div>
        </div>
        <div class="preloader-after">
            <div class="preloader-after-inner"></div>
        </div><!-- preloader end -->
<?php } ;?>

<?php get_template_part('template-parts/menu-part');?>

