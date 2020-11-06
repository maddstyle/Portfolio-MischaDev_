<?php $drex_options = get_option('drex'); ?>
<!-- navigation start -->
        <div class="content content--demo-3 demo-3">
            <!-- navigation hamburger start -->
            <div class="hamburger hamburger--demo-3">
                <div class="hamburger__line hamburger__line--01">
                    <div class="hamburger__line-in hamburger__line-in--01"></div>
                </div>
                <div class="hamburger__line hamburger__line--02">
                    <div class="hamburger__line-in hamburger__line-in--02"></div>
                </div>
                <div class="hamburger__line hamburger__line--03">
                    <div class="hamburger__line-in hamburger__line-in--03"></div>
                </div>
                <div class="hamburger__line hamburger__line--cross01">
                    <div class="hamburger__line-in hamburger__line-in--cross01"></div>
                </div>
                <div class="hamburger__line hamburger__line--cross02">
                    <div class="hamburger__line-in hamburger__line-in--cross02"></div>
                </div>
            </div><!-- navigation hamburger end -->
            <!-- navigation menu start -->
            <nav>
                <ul class="menu page-scroll-closer shape-overlays-navigation global-menu">
                    <?php

        $defaults = array(
                    'theme_location'  => 'main-menu',
                    'menu'            => '',
                    'container'       => 'ul',
                    'container_class' => '',
                    'menu_class'      => 'option-set clearfix ',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'show_top_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '%3$s',
                    'depth'           => 0,
                    'walker'          => new description_walker
                        );

         $athers = array(
                    'theme_location'  => 'top-menu',
                    'menu'            => 'div',
                    'container'       => 'ul',
                    'container_class' => '',
                    'menu_class'      => 'option-set clearfix',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'show_top_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '%3$s',
                    'depth'           => 0,
                    'walker'          => new drex_main_Walker
                        );
        

                       if(has_nav_menu('main-menu')) {
                        wp_nav_menu( $defaults );
}
          else if(has_nav_menu('top-menu')){
            wp_nav_menu( $athers );
          }
          else {
            
          }
                        ?>
                </ul>
            </nav><!-- navigation menu end -->
            <!-- navigation overlay start -->
            <svg class="shape-overlays" preserveaspectratio="none" viewbox="0 0 100 100">
            <path class="shape-overlays__path" d=""></path>
            <path class="shape-overlays__path" d=""></path>
            <path class="shape-overlays__path" d=""></path>
            </svg><!-- navigation overlay end -->
        </div><!-- navigation end -->
		<!-- header start -->
            <div class="header">
                <!-- logo start -->
                <a href="<?php echo esc_url(home_url( '/' )); ?>"><div class="logo"></div></a><!-- logo end -->
            </div><!-- header end -->