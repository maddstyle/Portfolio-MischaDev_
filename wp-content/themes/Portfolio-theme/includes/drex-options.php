<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "drex";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'drex/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
		'class'                => 'admin-color-pimax',
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Drex Options', 'drex' ),
        'page_title'           => esc_html__( 'Drex Options', 'drex' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the drex. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'drex'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'drex'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    
    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( esc_html__( '', 'drex' ), $v );
    } else {
        $args['intro_text'] = esc_html__( '', 'drex' );
    }

    // Add content after the form.
    $args['footer_text'] = esc_html__( '', 'drex' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Support', 'drex' ),
            'content' => esc_html__( 'Send us a mail by using our item support form.', 'drex' )
        ),
        
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( 'Send us a mail by using our item support form.', 'drex' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // ACTUAL DECLARATION OF SECTIONS
                Redux::setSection( $opt_name, array(
                    'title'  => esc_html__( 'General Settings', 'drex' ),
                    'desc'   => esc_html__( '', 'drex' ),
                    'icon'   => 'el-icon-home-alt',
                    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                    'fields' => array(

                   
					array(
			                'id' => 'notice_heaer_logo',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_attr__('Header Logo Options.', 'drex'),
			                'desc' => esc_attr__('Logo options of your site.', 'drex')
			            ),
					
					array(
                            'id'       => 'opt-logo-light',
                            'type'     => 'background',
                            'title'    => esc_attr__( 'Upload Logo', 'drex' ),
                            'subtitle' => esc_attr__( '', 'drex' ),
                            'desc'     => esc_attr__( '', 'drex' ),
                            'output'      => array('.logo'),
                            'background-repeat'      => true,
                            'background-attachment'      => false,
                            'background-position'      => false,
                            'background-size'      => false,
                            'background-image'      => true,
                            'background-color'      => false,
							
                            
                        ),
						
					
					$fields = array(
					'id'       => 'opt_logo_dimensions',
					'type'     => 'dimensions',
					'units'    => array('em','px','%'),
					'output' => array('.logo'),
					'title'    => __('Header Logo Size', 'drex'),
					'subtitle' => __('', 'drex'),
					'desc'     => __('Optional', 'drex'),
					'default'  => array(
						'Width'   => '59', 
						'Height'  => '35'
					),
					
				),
				
				array(
			                'id' => 'notice_pre_loader',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_attr__('Preloader Option.', 'drex'),
			                'desc' => esc_attr__('Enable/ Disable Preloader option of your site.', 'drex')
			            ),
					
					array(
							'id' => 'back_ani_opt',
							'type' => 'button_set',
							'title' => esc_html__('Preloader', 'drex'),
							'subtitle' => esc_html__('', 'drex'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Enable', 'drex'),
									'st2' => esc_html__('Disable', 'drex'),
									
									
							),
							'default'  => 'st1'
					),
					
					array(
			                'id' => 'notice_404_bg',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_attr__('404 Page Option.', 'drex'),
			                'desc' => esc_attr__('Upload 404 page sidebar image.', 'drex')
			        ),
						
					array(
							'id' => '404img',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_html__('Upload  Image', 'drex'),
							'subtitle' => esc_html__('404 page Sidebar Image', 'drex'),
						
					),
					
					array(
			                'id' => 'notice_pot_details',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_attr__('Portfolio Details Page Options.', 'drex'),
			                'desc' => esc_attr__('', 'drex')
			        ),
					array(
							'id' => 'gallerylink',
							'type' => 'text',
							'title' => esc_html__('Button URL ', 'drex'),
							'subtitle' => esc_html__('Gallery Details Page Button URL', 'drex'),
					),
					
					array(
							'id' => 'gallerylinkbutton',
							'type' => 'text',
							'title' => esc_html__('Button Text ', 'drex'),
							'subtitle' => esc_html__('Gallery Details Page Button', 'drex'),
					),
					
					array(
			                'id' => 'notice_wave_details',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_attr__('Wave Controls Options.', 'drex'),
			                'desc' => esc_attr__('', 'drex')
			        ),
					
					array(
							'id' => 'wave_count',
							'type' => 'text',
							'title' => esc_html__('Wave Count', 'drex'),
							'subtitle' => esc_html__('Default: 15', 'drex'),
					),
					
					array(
							'id' => 'wave_ranage_x',
							'type' => 'text',
							'title' => esc_html__('Wave Range X', 'drex'),
							'subtitle' => esc_html__('Default: 20', 'drex'),
					),
					
					array(
							'id' => 'wave_ranage_y',
							'type' => 'text',
							'title' => esc_html__('Wave Range Y', 'drex'),
							'subtitle' => esc_html__('Default: 80', 'drex'),
					),
					
					array(
							'id' => 'wave_wave_duration_min',
							'type' => 'text',
							'title' => esc_html__('Wave Duration Min', 'drex'),
							'subtitle' => esc_html__('Default: 20', 'drex'),
					),
					
					array(
							'id' => 'wave_wave_duration_max',
							'type' => 'text',
							'title' => esc_html__('Wave Duration Max', 'drex'),
							'subtitle' => esc_html__('Default: 40', 'drex'),
					),
					
					
					
				  )
               ) );
			   
			   
			   
			
				
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-bullhorn',
                    'title'  => esc_html__( 'Blog Options', 'drex' ),
                    'fields' => array(
					
					
					
					array(
							'id' => 'blogimg',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_html__('Upload  Image', 'drex'),
							'subtitle' => esc_html__('Blog Sidebar Image', 'drex'),
						
					),
					
					array(
							'id' => 'blogtitle',
							'type' => 'text',
							'title' => esc_html__('Index Title ', 'drex'),
							'subtitle' => esc_html__('', 'drex'),
					),
					
					array(
							'id' => 'blogsubtitle',
							'type' => 'text',
							'title' => esc_html__('Index Sub Title ', 'drex'),
							'subtitle' => esc_html__('', 'drex'),
					),
					
					array(
							'id' => 'arch-page-title',
							'type' => 'text',
							'title' => esc_html__('Archive Page Title', 'drex'),
							'subtitle' => esc_html__('Write header title for blog archive page here. Ex: Archive : ', 'drex'),
							'default' => '',
					),	
					array(
							'id' => 'cat-page-title',
							'type' => 'text',
							'title' => esc_html__('Category Page Title', 'drex'),
							'subtitle' => esc_html__('Write header title for blog category page here. Ex: Category : ', 'drex'),
							'default' => '',
					),	
	
					array(
							'id' => 'tag-page-title',
							'type' => 'text',
							'title' => esc_html__('Tag Page Title', 'drex'),
							'subtitle' => esc_html__('Write header title for blog tag page here. Ex: Tag : ', 'drex'),
							'default' => '',
					),						

					array(
							'id' => 'src-page-title',
							'type' => 'text',
							'title' => esc_html__('Search Page Title', 'drex'),
							'subtitle' => esc_html__('Write header title for blog search page title here. Ex: Search Results for :', 'drex'),
							'default' => '',
					),	
					
					array(
							'id' => 'blog_details_user',
							'type' => 'button_set',
							'title' => esc_html__('User Information', 'drex'),
							'subtitle' => esc_html__('Working only if widget area deactive.', 'drex'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'drex'),
									'st2' => esc_html__('Enable', 'drex'),
									
									
							),
							'default'  => 'st1'
					),
					
					array(
							'id' => 'blogpostnav',
							'type' => 'button_set',
							'title' => esc_attr__('Blog Details Page Pagination.', 'drex'),
							'subtitle' => esc_attr__('Working only if widget area active.', 'drex'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_attr__('Disable', 'drex'),
									'st2' => esc_attr__('Enable', 'drex'),
									
									
							),
							'default'  => 'st1'
					),
					
					array(
						'id'        => 'prev_post_t',
						'type'      => 'text',
						'title'     => esc_html__('Prev Post', 'drex'),
						'subtitle'  => esc_html__('Translate Option', 'drex'),
						'dece'      => esc_html__('','drex'),
						'validate'  => '',
						'required' => array('blogpostnav', '=' , 'st2')
					),
					
					array(
						'id'        => 'next_post_t',
						'type'      => 'text',
						'title'     => esc_html__('Next Post', 'drex'),
						'subtitle'  => esc_html__('Translate Option', 'drex'),
						'dece'      => esc_html__('','drex'),
						'validate'  => '',
						'required' => array('blogpostnav', '=' , 'st2')
					),
					
					array(
						'id'        => 'back_to_t',
						'type'      => 'text',
						'title'     => esc_html__('Back To', 'drex'),
						'subtitle'  => esc_html__('Translate Option', 'drex'),
						'dece'      => esc_html__('','drex'),
						'validate'  => '',
						'required' => array('blogpostnav', '=' , 'st2')
					),
					
					array(
						'id'        => 'back_to_home_t',
						'type'      => 'text',
						'title'     => esc_html__('Home', 'drex'),
						'subtitle'  => esc_html__('Translate Option', 'drex'),
						'dece'      => esc_html__('','drex'),
						'validate'  => '',
						'required' => array('blogpostnav', '=' , 'st2')
					),
					
					array(
							'id' => 'blogpostmore',
							'type' => 'button_set',
							'title' => esc_attr__('Blog Details Page More Post.', 'drex'),
							'subtitle' => esc_attr__('Working only if widget area active.', 'drex'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_attr__('Disable', 'drex'),
									'st2' => esc_attr__('Enable', 'drex'),
							),
							'default'  => 'st1'
					),
					
					array(
						'id'        => 'more_post_text_t',
						'type'      => 'text',
						'title'     => esc_html__('You Might Also Like:', 'drex'),
						'subtitle'  => esc_html__('Translate Option', 'drex'),
						'dece'      => esc_html__('','drex'),
						'validate'  => '',
						'required' => array('blogpostmore', '=' , 'st2')
					),
					
					
					array(
							'id' => 'blogpostshare',
							'type' => 'button_set',
							'title' => esc_attr__('Blog Details Page Share.', 'drex'),
							'subtitle' => esc_attr__('Working only if widget area active.', 'drex'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_attr__('Disable', 'drex'),
									'st2' => esc_attr__('Enable', 'drex'),
							),
							'default'  => 'st1'
					),
					
					array(
						'id'        => 'share_post_text_t',
						'type'      => 'text',
						'title'     => esc_html__('Share:', 'drex'),
						'subtitle'  => esc_html__('Translate Option', 'drex'),
						'dece'      => esc_html__('','drex'),
						'validate'  => '',
						'required' => array('blogpostshare', '=' , 'st2')
					),
					
                    )
                ) );
				
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-cog',
                    'title'  => __( 'Translate Options', 'drex' ),
                    'fields' => array(
					
										
					array(
							'id' => 'translet_opt_6',
							'type' => 'text',
							'title' => esc_html__('Type & Hit Enter...', 'drex'),
							'subtitle' => esc_html__('Search Widget Placeholder Text.', 'drex'),
					),
					
					array(
							'id' => 'translet_opt_26',
							'type' => 'text',
							'title' => esc_html__('Tags:', 'drex'),
							'subtitle' => esc_html__('Post Details Page.', 'drex'),
					),
					
					array(
							'id' => 'translet_opt_27',
							'type' => 'text',
							'title' => esc_html__('By', 'drex'),
							'subtitle' => esc_html__('Post Meta.', 'drex'),
					),
					
					array(
							'id' => 'translet_opt_28',
							'type' => 'text',
							'title' => esc_html__('Read More', 'drex'),
							'subtitle' => esc_html__('Post Meta.', 'drex'),
					),
					
					array(
							'id' => 'translet_opt_29',
							'type' => 'text',
							'title' => esc_html__('Category', 'drex'),
							'subtitle' => esc_html__('Post Meta.', 'drex'),
					),
					
					
					array(
							'id' => 'translet_opt_10',
							'type' => 'text',
							'title' => esc_html__('One thought on', 'drex'),
							'subtitle' => esc_html__('Post Comment Section.', 'drex'),
					),
					
					array(
							'id' => 'translet_opt_11',
							'type' => 'text',
							'title' => esc_html__('thought on', 'drex'),
							'subtitle' => esc_html__('Post Comment Section.', 'drex'),
					),
					
					array(
							'id' => 'translet_opt_12',
							'type' => 'text',
							'title' => esc_html__('thoughts on', 'drex'),
							'subtitle' => esc_html__('Post Comment Section.', 'drex'),
					),
					
					array(
							'id' => 'translet_opt_13',
							'type' => 'text',
							'title' => esc_html__('Comments are closed.', 'drex'),
							'subtitle' => esc_html__('Post Comment Section.', 'drex'),
					),
					
					array(
							'id' => 'translet_opt_14',
							'type' => 'text',
							'title' => esc_html__('Your Name', 'drex'),
							'subtitle' => esc_html__('Post Comment Section Form.', 'drex'),
					),
					
					array(
							'id' => 'translet_opt_15',
							'type' => 'text',
							'title' => esc_html__('Your Email', 'drex'),
							'subtitle' => esc_html__('Post Comment Section Form.', 'drex'),
					),
					
					array(
							'id' => 'translet_opt_16',
							'type' => 'text',
							'title' => esc_html__('Your Comment', 'drex'),
							'subtitle' => esc_html__('Post Comment Section Form.', 'drex'),
					),
					
					array(
							'id' => 'translet_opt_17',
							'type' => 'text',
							'title' => esc_html__('Leave a Comment', 'drex'),
							'subtitle' => esc_html__('Post Comment Section Form.', 'drex'),
					),
					
					array(
							'id' => 'translet_opt_25',
							'type' => 'text',
							'title' => esc_html__('Submit', 'drex'),
							'subtitle' => esc_html__('Post Comment Section Form.', 'drex'),
					),
					
					array(
							'id' => 'translet_opt_23',
							'type' => 'text',
							'title' => esc_html__('No Post Found', 'drex'),
							'subtitle' => esc_html__('Post Search Page.', 'drex'),
					),
					
					array(
							'id' => 'translet_opt_24',
							'type' => 'text',
							'title' => esc_html__('Error 404', 'drex'),
							'subtitle' => esc_html__('Error Page.', 'drex'),
					),
					
					array(
							'id' => 'translet_opt_7',
							'type' => 'text',
							'title' => esc_html__('Sorry that page you are looking for not found.', 'drex'),
							'subtitle' => esc_html__('Error Page.', 'drex'),
					),
					
					array(
							'id' => 'translet_opt_30',
							'type' => 'text',
							'title' => esc_html__('Back To Home', 'drex'),
							'subtitle' => esc_html__('Error Page.', 'drex'),
					),
					
					
                    )
                ) );
				
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-text-width',
                    'title'  => esc_attr__( 'Typography', 'drex' ),
                    'fields' => array(     

						array(
			                'id' => 'notice_critical11',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_attr__('Entry Headings', 'drex'),
			                'desc' => esc_attr__('Entry Headings in posts/pages', 'drex')
			            ),
						
						array(
                            'id'          => 'typo_body',
                            'type'        => 'typography', 
                            'title'       => __('Body', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('body'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the Body Text font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_intro_title',
                            'type'        => 'typography', 
                            'title'       => __('Intro Title', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h1.home-page-title'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the intro title text font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_intro_sub_title',
                            'type'        => 'typography', 
                            'title'       => __('Intro Sub Title', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.introduction h3'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the intro sub title text font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_intro_button_title',
                            'type'        => 'typography', 
                            'title'       => __('Intro Button ', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.the-button'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the intro button text font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_intro_popup_title',
                            'type'        => 'typography', 
                            'title'       => __('Intro Popup Section Title ', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.center-container-sign-up-modal h2.section-heading'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the intro popup section title text font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_intro_slider_title',
                            'type'        => 'typography', 
                            'title'       => __('Intro Slider Title ', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.right-side h2'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the intro slider title text font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_onepage_section_title',
                            'type'        => 'typography', 
                            'title'       => __('One Page Section Title ', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h1.home-page-title-all'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the one page section title text font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_onepage_section_sub_title',
                            'type'        => 'typography', 
                            'title'       => __('One Page Section Sub Title ', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h2.drex-sec-sub-title'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the one page section sub title text font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_timeline_ele_title',
                            'type'        => 'typography', 
                            'title'       => __('Timeline Element Title ', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h3.cd-timeline-name'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the timeline element title text font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_timeline_ele_title',
                            'type'        => 'typography', 
                            'title'       => __('Timeline Element Title ', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h3.cd-timeline-name'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the timeline element title text font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_timeline_ele_date',
                            'type'        => 'typography', 
                            'title'       => __('Timeline Element Date ', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h4.cd-timeline-date'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the timeline element date text font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_timeline_ele_sub',
                            'type'        => 'typography', 
                            'title'       => __('Timeline Element Sub Title', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.cd-timeline-position'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the timeline element sub title text font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_timeline_ele_text',
                            'type'        => 'typography', 
                            'title'       => __('Timeline Element Content', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.timeline .timeline-body>p'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the timeline element content text font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_service_ele_title',
                            'type'        => 'typography', 
                            'title'       => __('Service Element Title', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.services-block-correction h2'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the service element title text font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_service_ele_text',
                            'type'        => 'typography', 
                            'title'       => __('Service Element Content', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.services-block-correction p'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the service element content text font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_blog_ele_title',
                            'type'        => 'typography', 
                            'title'       => __('Blog Element Title', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h2.section-heading.section-heading-news'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the blog element title text font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_blog_ele_cat',
                            'type'        => 'typography', 
                            'title'       => __('Blog Element Category', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.news-content h3'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the blog element title text font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_blog_ele_date',
                            'type'        => 'typography', 
                            'title'       => __('Blog Element Date', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.news-content h5'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the blog element date text font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						
						
						array(
                            'id'          => 'typo_blog_ele_text',
                            'type'        => 'typography', 
                            'title'       => __('Blog Element Content', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.section-txt-news p, .section-txt-news'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the blog element content text font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_form_input',
                            'type'        => 'typography', 
                            'title'       => __('Form Text', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.wpcf7 input[type="text"], .wpcf7 input[type="email"], .wpcf7 input[type="password"], textarea, .mc4wp-form input[type="text"], .mc4wp-form input[type="email"]'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the form text font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_form_button',
                            'type'        => 'typography', 
                            'title'       => __('Form Button', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.mc4wp-form button, .wpcf7-submit'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the form button text font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_p',
                            'type'        => 'typography', 
                            'title'       => __('P', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('p, .services-txt, .works-page-img-carousel-wrapper .works-page-img-carousel-text .works-page-img-carousel-heading, .news-page-img-carousel-wrapper .news-page-img-carousel-text .news-page-img-carousel-heading, .news-text-txt p, .port-cats, .skillbar-title, .facts-counter-title, .contact-txt, .contact-txt a, .contact-txt a:hover, .center-container-contact-modal p, #form input, input[type="text"], input[type="email"], input[type="password"], .wr-content-area.post-details-opt-wr, .wr-content-area.post-details-opt-wr p, .news-blog .blog-content p a, .news-blog .blog-content p a:hover, .blog-heading, .news-blog p, .blog-quote p, .bottom-credits'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the P Text font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_a',
                            'type'        => 'typography', 
                            'title'       => __('a', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('a, .widget-posts-descr a, .c-btn.inverse-dark, .c-btn, .c-btn.inverse, a.button-link span, ul.social-icons-contact a, ul.social-icons-contact a:hover, input[type=button], input[type=reset], input[type=submit], .blog-heading a, .blog-heading a:hover, .widget li a, .c-btn.fullwidth-liquid, .c-btn.halfwidth-liquid'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the a Text font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						
						array(
                            'id'          => 'typo_menu',
                            'type'        => 'typography', 
                            'title'       => __('Menu Item', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('nav.navigation-menu a:link, nav.navigation-menu a:visited, nav.navigation-menu a:active, nav.navigation-menu a'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the Menu Text font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),

                        array(
                            'id'          => 'typography-h1',
                            'type'        => 'typography', 
                            'title'       => __('H1', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h1'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the Heading font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),

						array(
                            'id'          => 'typography-h2',
                            'type'        => 'typography', 
                            'title'       => __('H2', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h2, .section-heading, .section-heading-dark, .center-container-contact-modal h2.section-heading, .blog-comments .comment-title'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the Heading font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-h3',
                            'type'        => 'typography', 
                            'title'       => __('H3', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h3, .about-content-inner h3, .facts-counter-number, .blog-form .comment-title '),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the Heading font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-h4',
                            'type'        => 'typography', 
                            'title'       => __('H4', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h4, .news-page-img-carousel-title h4, .works-page-img-carousel-title h4, .text-title h4, .text-title.text-title-dark h4, .blog-title h4, .blog-title h4 a, .comments article h4'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the Heading font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-h5',
                            'type'        => 'typography', 
                            'title'       => __('H5', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h5, .section-title-vertical'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the Heading font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-h6',
                            'type'        => 'typography', 
                            'title'       => __('H6', 'drex'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h6'),
                            'units'       =>'px',
                            'subtitle'    => esc_attr__('Specify the Heading font properties.', 'drex'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
                        
                    )
                ) );
				
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-brush',
                    'title'  => esc_html__( 'Styling', 'drex' ),
                    'fields' => array(
					
					array(
                            'id'       => 'opt-theme-style',
                            'type'     => 'color',
                            'title'    => esc_html__( 'Button Hover Color', 'drex' ),
                            'subtitle' => esc_html__( 'Only color validation can be done on this field type', 'drex' ),
                            'desc'     => esc_html__( '', 'drex' ),
                            //'regular'   => false, // Disable Regular Color
                            //'hover'     => false, // Disable Hover Color
                            //'active'    => false, // Disable Active Color
                            //'visited'   => true,  // Enable Visited Color
                            
                        ),
						
					array(
							'id' => 'disable_image_overlay',
							'type' => 'button_set',
							'title' => esc_html__('Image & Video Overlay', 'drex'),
							'subtitle' => esc_html__('', 'drex'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Enable', 'drex'),
									'st2' => esc_html__('Disable', 'drex'),
									
									
							),
							'default'  => 'st1'
					),
						
					

                    )
                ) );	
				
				
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-key',
                    'title'  => esc_html__( 'Documentation', 'drex' ),
                    'fields' => array(					
					
					array(
							'id' => 'docs',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_html__('Drex Theme Documentation', 'drex'),
							'desc' => __('<a href="http://drex.webredox.net/doc/documentation.html" target="_blank">Click Here</a> To get the theme documentation.', 'drex')
							
					),	

			
			
					)
                ));
				
				
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'drex' ),
                'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'drex' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }


