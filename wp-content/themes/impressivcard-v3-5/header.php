<?php	
	if ( get_option( 'enable_safe_mod' ) ) { $enable_safe_mod = 'true'; } else { $enable_safe_mod = 'false'; }
	
	if ( get_option( 'disable_mobile_safe_mod' ) ) { $disable_mobile_safe_mod = 'false'; } else { $disable_mobile_safe_mod = 'true'; }
	
	$safe_mod_page_in_animation = get_option( 'safe_mod_page_in_animation', 'fadeInLeft' );
	
	$pf_details_page_in_animation = get_option( 'pf_details_page_in_animation', 'fadeInLeft' );
	
	$pf_details_page_out_animation = get_option( 'pf_details_page_out_animation', 'fadeOutRightBig' );
	
	$lightbox_in_animation = get_option( 'lightbox_in_animation', 'fadeInLeftBig' );
	
	$profile_image_animation = get_option( 'profile_image_animation', 'rotate-left' );
	
	$page_transition_duration = get_option( 'page_transition_duration', '1000' );
	
	if ( $page_transition_duration == "" )
	{
		$page_transition_duration = "1000";
	}
	
	if ( get_option( 'enable_scrollbar' ) ) { $enable_scrollbar = 'false'; } else { $enable_scrollbar = 'true'; }
?>
<!doctype html>

<html class="no-overflow" data-safeMod="<?php echo $enable_safe_mod; ?>" data-mobileSafeMod="<?php echo $disable_mobile_safe_mod; ?>" data-safeModPageInAnimation="<?php echo $safe_mod_page_in_animation; ?>" data-inAnimation="<?php echo $pf_details_page_in_animation; ?>" data-outAnimation="<?php echo $pf_details_page_out_animation; ?>" data-lightboxInAnimation="<?php echo $lightbox_in_animation; ?>" data-profileImageAnimation="<?php echo $profile_image_animation; ?>" data-jmpressAnimationDuration="<?php echo $page_transition_duration; ?>" data-hideScrollbar="<?php echo $enable_scrollbar; ?>" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php echo get_bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	
	<?php
		echo '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Patua+One|Rokkitt:400,700|Lora:400,700,400italic,700italic">' . "\n";
	
		if ( get_option( 'site_name_font_family' ) )
		{
			$site_name_font_family = get_option( 'site_name_font_family' );
			
			echo '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' . $site_name_font_family . '">' . "\n";
		}
		else
		{
			$site_name_font_family = "";
		}
		
		
		if ( get_option( 'heading_font_family' ) )
		{
			$heading_font_family = get_option( 'heading_font_family' );
			
			echo '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' . $heading_font_family . '">' . "\n";
		}
		else
		{
			$heading_font_family = "";
		}
		
		
		if ( get_option( 'content_font_family' ) )
		{
			$content_font_family = get_option( 'content_font_family' );
			
			echo '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' . $content_font_family . '">';
		}
		else
		{
			$content_font_family = "";
		}
	?>
	
	<!--[if lte IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/IE9.js"></script>
	<![endif]-->
	
	<?php
		if ( is_singular() && get_option( 'thread_comments' ) )
		{
			wp_enqueue_script( 'comment-reply' );
		}
	?>
	
	<?php
		wp_head();
	?>
	
	<?php
		if ( get_option( 'base_skin' ) != "" )
		{
			echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/css/skins/base/' . stripcslashes( get_option( 'base_skin' ) ) . '.css">' . "\n";
		}
		
		
		if ( get_option( 'primary_color' ) != "" )
		{
			echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/css/skins/color/' . stripcslashes( get_option( 'primary_color' ) ) . '.css">' . "\n";
		}
		
		
		if ( get_option( 'menu_skin' ) != "" )
		{
			echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/css/skins/menu/' . stripcslashes( get_option( 'menu_skin' ) ) . '.css">' . "\n";
		}
		else
		{
			echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/css/skins/menu/light.css">' . "\n";
		}
		
		
		if ( get_option( 'background_color' ) != "" )
		{
			echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/css/skins/background/' . stripcslashes( get_option( 'background_color' ) ) . '.css">' . "\n";
		}
		
		
		if ( get_option( 'background_image' ) != "" )
		{
			echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/css/skins/background/' . stripcslashes( get_option( 'background_image' ) ) . '.css">' . "\n";
		}
		
		
		if ( get_option( 'glow' ) )
		{
			echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/css/skins/extra/glow.css">' . "\n";
		}
		
		if ( get_option( 'light_glow' ) )
		{
			echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/css/skins/extra/glow-light.css">' . "\n";
		}
		
		if ( get_option( 'noise' ) )
		{
			echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/css/skins/extra/noise.css">' . "\n";
		}
		
		if ( get_option( 'overlay' ) )
		{
			echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/css/skins/extra/overlay.css">' . "\n";
		}
		
		if ( get_option( 'alternate_portfolio' ) )
		{
			echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/css/skins/extra/portfolio-alt.css">' . "\n";
		}
		
		if ( get_option( 'portfolio_transparent' ) )
		{
			echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/css/skins/extra/portfolio-transparent.css">' . "\n";
		}
		
		if ( get_option( 'pf_details_light_transparent' ) )
		{
			echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/css/skins/extra/portfolio-details-transparent-light.css">' . "\n";
		}
		
		if ( get_option( 'pf_details_dark_transparent' ) )
		{
			echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/css/skins/extra/portfolio-details-transparent-dark.css">' . "\n";
		}
		
		if ( get_option( 'retro' ) )
		{
			echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/css/skins/extra/retro.css">' . "\n";
		}
	?>
	
	<?php
		// Custom Primary Color
		if ( get_option( 'custom_primary_color' ) != "" )
		{
			$custom_primary_color = get_option( 'custom_primary_color' );
			
			echo   "\n" . '<style type="text/css">' . "\n";
			
			echo   '#header nav ul .current-menu-item span,
					#header nav ul .current-menu-item a:hover span,
					h2.caption span,
					ul.personal-info .title,
					.btn, button,
					html input[type="button"],
					input[type="reset"],
					input[type="submit"],
					.bar .progress,
					#header nav:after,
					.portfolio-nav a.button:hover { background: #' . $custom_primary_color . '; }

					h2.caption span:after { border-left-color: #' . $custom_primary_color . '; }
					ul.personal-info .title:after { border-left-color: #' . $custom_primary_color . '; }

					.history-unit,
					.map iframe,
					input:focus,
					textarea:focus,
					span.label.primary { border-color: #' . $custom_primary_color . '; }

					#filters .current a,
					.media-box .mask .title,
					.portfolio-title h2,
					.portfolio-field h3 { border-color: #' . $custom_primary_color . ';  }';
					
			echo    "\n" . '</style>' . "\n";
		}
		// end Custom Primary Color
		
		
		// Menu Background Color
		if ( get_option( 'menu_bg_color' ) != "" )
		{
			$menu_bg_color = get_option( 'menu_bg_color' );
			
			echo  "\n" . '<style type="text/css">' . "\n";
			
			echo   '#header nav ul:after,
					#header nav ul:before { border-color: #' . $menu_bg_color . '; }
					#header nav ul span { background: #' . $menu_bg_color . '; }
					#header nav ul span:before,
					#header nav ul span:after { border-bottom-color: #' . $menu_bg_color . '; }';
			
			echo  "\n" . '</style>' . "\n";
		}
		// end Menu Background Color
		
		
		// Menu Hover Background Color
		if ( get_option( 'menu_hover_bg_color' ) != "" )
		{
			$menu_hover_bg_color = get_option( 'menu_hover_bg_color' );
			
			echo  "\n" . '<style type="text/css">' . "\n";
			
			echo   '#header nav ul a:hover span,
					#header nav ul a.waiting span { background: #' . $menu_hover_bg_color . '; }';
			
			echo  "\n" . '</style>' . "\n";
		}
		// end Menu Hover Background Color
		
		
		// Menu Shadow Color
		if ( get_option( 'menu_shadow_color' ) != "" )
		{
			$menu_shadow_color = get_option( 'menu_shadow_color' );
			
			echo  "\n" . '<style type="text/css">' . "\n";
			
			echo   '#header nav ul span:before {  border-right-color: #' . $menu_shadow_color . '; }
					#header nav ul span:after { border-left-color: #' . $menu_shadow_color . '; }';
			
			echo  "\n" . '</style>' . "\n";
		}
		// end Menu Shadow Color
		
		
		// Custom Background Color
		if ( get_option( 'custom_background_color' ) != "" )
		{
			$custom_background_color = get_option( 'custom_background_color' );
			
			echo  "\n" . '<style type="text/css">' . "\n";
			
			echo   'body { background: #' . $custom_background_color . '; }';
			
			echo  "\n" . '</style>' . "\n";
		}
		// end Custom Background Color
		
		
		// Custom Background Image
		if ( get_option( 'custom_background_image' ) != "" )
		{
			$custom_background_image = get_option( 'custom_background_image' );
			
			echo  "\n" . '<style type="text/css">' . "\n";
			
			echo   'body { background-image: url( "' . $custom_background_image . '" ); }';
			
			echo  "\n" . '</style>' . "\n";
		}
		// end Custom Background Image
		
		
		// Site Name Color
		if ( get_option( 'site_name_color' ) != "" )
		{
			$site_name_color = get_option( 'site_name_color' );
			
			echo  "\n" . '<style type="text/css">' . "\n";
			
			echo   '#header .title h1 { color: #' . $site_name_color . '; }';
			
			echo  "\n" . '</style>' . "\n";
		}
		// end Site Name Color
		
		
		// Site Slogan Color
		if ( get_option( 'site_slogan_color' ) != "" )
		{
			$site_slogan_color = get_option( 'site_slogan_color' );
			
			echo  "\n" . '<style type="text/css">' . "\n";
			
			echo   '#header .title p { color: #' . $site_slogan_color . '; }';
			
			echo  "\n" . '</style>' . "\n";
		}
		// end Site Slogan Color
		
		
		// Link Color
		if ( get_option( 'link_color' ) != "" )
		{
			$link_color = get_option( 'link_color' );
			
			echo  "\n" . '<style type="text/css">' . "\n";
			
			echo   'a, a:link, a:visited { color: #' . $link_color . '; }';
			
			echo  "\n" . '</style>' . "\n";
		}
		// end Link Color
		
		
		// Link Background Color
		if ( get_option( 'link_background_color' ) != "" )
		{
			$link_background_color = get_option( 'link_background_color' );
			
			echo  "\n" . '<style type="text/css">' . "\n";
			
			echo   'a, a:link, a:visited { background-color: #' . $link_background_color . '; }';
			
			echo  "\n" . '</style>' . "\n";
		}
		// end Link Background Color
		
		
		// Link Hover Color
		if ( get_option( 'link_hover_color' ) != "" )
		{
			$link_hover_color = get_option( 'link_hover_color' );
			
			echo  "\n" . '<style type="text/css">' . "\n";
			
			echo   'a:link:hover, a:visited:hover { color: #' . $link_hover_color . '; }';
			
			echo  "\n" . '</style>' . "\n";
		}
		// end Link Hover Color
		
		
		// Link Hover Background Color
		if ( get_option( 'link_hover_background_color' ) != "" )
		{
			$link_hover_background_color = get_option( 'link_hover_background_color' );
			
			echo  "\n" . '<style type="text/css">' . "\n";
			
			echo   'a:link:hover, a:visited:hover { background-color: #' . $link_hover_background_color . '; }';
			
			echo  "\n" . '</style>' . "\n";
		}
		// end Link Hover Background Color
		
		
		// Text Color
		if ( get_option( 'text_color' ) != "" )
		{
			$text_color = get_option( 'text_color' );
			
			echo  "\n" . '<style type="text/css">' . "\n";
			
			echo   'body { color: #' . $text_color . '; }';
			
			echo  "\n" . '</style>' . "\n";
		}
		// end Text Color
		
		
		// Text Selection Color
		if ( get_option( 'selection_color' ) != "" )
		{
			$selection_color = get_option( 'selection_color' );
			
			echo  "\n" . '<style type="text/css">' . "\n";
			
			echo '::selection { color: #' . $selection_color . '; }' . "\n";
			echo '::-moz-selection { color: #' . $selection_color . '; }';
			
			echo  "\n" . '</style>' . "\n";
		}
		// end Text Selection Color
		
		
		// Text Selection Background Color
		if ( get_option( 'selection_bg_color' ) != "" )
		{
			$selection_bg_color = get_option( 'selection_bg_color' );
			
			echo  "\n" . '<style type="text/css">' . "\n";
			
			echo '::selection { background-color: #' . $selection_bg_color . '; }' . "\n";
			echo '::-moz-selection { background-color: #' . $selection_bg_color . '; }';
			
			echo  "\n" . '</style>' . "\n";
		}
		// end Text Selection Background Color
	?>
	
	<?php
		// Site Name Font Family
		if ( $site_name_font_family != "" )
		{
			echo  "\n" . '<style type="text/css">' . "\n";
			
			echo   '#header .title h1 { font-family: "' . $site_name_font_family . '"; }';
			
			echo  "\n" . '</style>' . "\n";
		}
		// end Site Name Font Family
		
		
		// Site Name Font Size
		if ( get_option( 'site_name_font_size' ) )
		{
			$site_name_font_size = get_option( 'site_name_font_size' );
			
			echo  "\n" . '<style type="text/css">' . "\n";
			
			echo   '#header .title h1 { font-size: ' . $site_name_font_size . '; }';
			
			echo  "\n" . '</style>' . "\n";
		}
		// end Site Name Font Size
		
		
		// Heading Font Family
		if ( $heading_font_family != "" )
		{
			echo  "\n" . '<style type="text/css">' . "\n";
			
			echo   'h1, h2, h3, h4, h5, h6, #filters li { font-family: "' . $heading_font_family . '"; }';
			
			echo  "\n" . '</style>' . "\n";
		}
		// end Heading Font Family
		
		
		// Heading Font Size
		if ( get_option( 'h1_font_size' ) )
		{
			echo  "\n" . '<style type="text/css">' . "\n";
			
			echo   'h1 { font-size: ' . get_option( 'h1_font_size' ) . '; }';
			
			echo  "\n" . '</style>' . "\n";
		}

		if ( get_option( 'h2_font_size' ) )
		{
			echo  "\n" . '<style type="text/css">' . "\n";
			
			echo   'h1 { font-size: ' . get_option( 'h2_font_size' ) . '; }';
			
			echo  "\n" . '</style>' . "\n";
		}
		
		if ( get_option( 'h3_font_size' ) )
		{
			echo  "\n" . '<style type="text/css">' . "\n";
			
			echo   'h1 { font-size: ' . get_option( 'h3_font_size' ) . '; }';
			
			echo  "\n" . '</style>' . "\n";
		}
		
		if ( get_option( 'h4_font_size' ) )
		{
			echo  "\n" . '<style type="text/css">' . "\n";
			
			echo   'h1 { font-size: ' . get_option( 'h4_font_size' ) . '; }';
			
			echo  "\n" . '</style>' . "\n";
		}
		
		if ( get_option( 'h5_font_size' ) )
		{
			echo  "\n" . '<style type="text/css">' . "\n";
			
			echo   'h1 { font-size: ' . get_option( 'h5_font_size' ) . '; }';
			
			echo  "\n" . '</style>' . "\n";
		}
		
		if ( get_option( 'h6_font_size' ) )
		{
			echo  "\n" . '<style type="text/css">' . "\n";
			
			echo   'h1 { font-size: ' . get_option( 'h6_font_size' ) . '; }';
			
			echo  "\n" . '</style>' . "\n";
		}
		// end Heading Font Size
		
		
		// Content Font Family
		if ( $content_font_family != "" )
		{
			echo  "\n" . '<style type="text/css">' . "\n";
			
			echo   'body,
					input,
					textarea,
					select,
					button,
					html input[type="button"],
					input[type="reset"],
					input[type="submit"] { font-family: "' . $content_font_family . '"; }';
			
			echo  "\n" . '</style>' . "\n";
		}
		// end Content Font Family
	?>
</head>

<body <?php body_class(); ?>>
    <header id="header">
        <div class="wrapper">
            <!-- NAV MENU -->
			<nav>
				<?php
					wp_nav_menu( array( 'menu' => 'top_menu',
										'menu_id' => 'nav',
										'menu_class' => "menu-custom",
										'theme_location' => 'top_menu',
										'container' => false,
										'depth' => 1,
										'fallback_cb' => 'wp_page_menu2' ) );
				?>
				
				<script>
					jQuery( function( $ )
					{
						var menuDef = $( '.menu-default' );
						
						if ( menuDef.length )
						{
							menuDef.find( 'a' ).each( function()
							{
								var url = $( this ).attr( 'href' );
								var newUrl = url.slice( 0, -1 );
								var lastSlash = newUrl.lastIndexOf( '/' );
								newUrl = '#' + newUrl.slice( lastSlash, newUrl.length );
								$( this ).attr( 'href', newUrl );
							});
						}
					} );
				</script>
			</nav>
            <!-- end NAV MENU -->
            
            <div class="title">
				<?php
					if ( get_option( 'image_logo' ) != "" )
					{
						echo '<img alt="' . get_bloginfo( 'name' ) . '" src="' . stripcslashes( get_option( 'image_logo' ) ) . '">';
					}
					else
					{
						echo '<h1>' . stripcslashes( get_option( 'text_logo' ) ) . '</h1>';
				
						echo '<p>' . stripcslashes( get_option( 'text_slogan' ) ) . '</p>';
					}
					// end if
				?>
            </div>
            <!-- end .title -->
        </div>
		<!-- end .wrapper -->
    </header>
    <!-- end #header -->