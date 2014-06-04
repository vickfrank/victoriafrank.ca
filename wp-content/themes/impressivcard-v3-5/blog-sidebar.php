<!doctype html>

<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php echo get_bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	
	<?php
		echo '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Patua+One|Rokkitt:400,700|Lora:400,700,400italic,700italic">' . "\n";
		
		if ( get_option( 'site_name_font_family' ) )
		{
			$site_name_font_family = get_option( 'site_name_font_family' );
			
			echo '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' . $site_name_font_family . '">';
		}
		else
		{
			$site_name_font_family = "";
		}
		
		
		if ( get_option( 'heading_font_family' ) )
		{
			$heading_font_family = get_option( 'heading_font_family' );
			
			echo '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' . $heading_font_family . '">';
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
	
	<!--[if lte IE 9]><script src="js/IE9.js"></script><![endif]-->
	
	<?php
		if ( is_singular() && get_option( 'thread_comments' ) )
		{
			wp_enqueue_script( 'comment-reply' );
		}
	?>
	
	<?php
		wp_head();
	?>
	
    <script>
    	jQuery(document).ready(function($)
		{
			$('.portfolio-single').fitVids();
		});
    </script>
	
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

<body>
    <div class="container portfolio-single">
        <div class="row">
			<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						?>
							<div class="span12">
								<div class="row">
									<div class="span12 portfolio-field portfolio-title">
										<h2><?php the_title(); ?></h2>
									</div>
									<!-- end .portfolio-title -->
								</div>
								<!-- end .row -->
								
								<div class="row">
									<div class="span12 portfolio-field">
										<?php
											the_content();
										?>
									</div>
									<!-- end .portfolio-field -->
								</div>
								<!-- end .row -->
							</div>
							<!-- end .span12 -->
						<?php
					endwhile;
				endif;
				wp_reset_query();
			?>
		</div>
		<!-- end .row -->
		
		<div class="row">
			<div class="span8">
				<div class="row">
					<?php
						$args_post = array( 'post_type' => 'post', 'posts_per_page' => -1 );
						$loop_post = new WP_Query( $args_post );
						
						if ( $loop_post->have_posts() ) :
							while ( $loop_post->have_posts() ) : $loop_post->the_post();
								?>
									<div id="post-<?php the_ID(); ?>" <?php post_class( 'span8 clearfix' ); ?>>
										<div class="row">
											<?php
												if ( has_post_thumbnail() )
												{
													?>
														<div class="span3 portfolio-field featured-image">
															<a href="<?php the_permalink(); ?>">
																<?php
																	the_post_thumbnail( 'full', array( 'alt' => get_the_title(), 'title' => "" ) );
																?>
															</a>
														</div>
														<!-- end .featured-image -->
														
														<div class="span5 portfolio-field clearfix">
															<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
															
															<div class="clearfix">
																<?php
																	the_excerpt();
																?>
															</div>
															
															<?php
																wp_link_pages( array( 'before' => '<div class="page-links clearfix">' . __( 'Pages:', 'impressivcard' ), 'after' => '</div>' ) );
															?>
														</div>
														<!-- end .portfolio-field -->
													<?php
												}
												else
												{
													?>
														<div class="span8 portfolio-field clearfix">
															<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
															
															<div class="clearfix">
																<?php
																	the_excerpt();
																?>
															</div>
															
															<?php
																wp_link_pages( array( 'before' => '<div class="page-links clearfix">' . __( 'Pages:', 'impressivcard' ), 'after' => '</div>' ) );
															?>
														</div>
														<!-- end .portfolio-field -->
													<?php
												}
												// end if
											?>
										</div>
										<!-- end .row -->
									</div>
									<!-- end .span8 -->
								<?php
							endwhile;
						endif;
						wp_reset_query();
					?>
				</div>
				<!-- end .row -->
			</div>
			<!-- end .span8 -->
			
			<?php
				get_sidebar();
			?>
		</div>
		<!-- end .row -->
    </div>
	<!-- end .container -->
	
	<?php
		wp_footer();
	?>
</body>
</html>