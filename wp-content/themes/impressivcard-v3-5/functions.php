<?php

/* ============================================================================================================================================= */

	function my_enqueue()
	{
		// Register style
		wp_register_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );
		wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
		wp_register_style( 'transitions', get_template_directory_uri() . '/css/jquery.transitions.css' );
		wp_register_style( 'main', get_template_directory_uri() . '/css/main.css' );
		wp_register_style( 'wpfix', get_template_directory_uri() . '/css/wp-fix.css' );
		wp_register_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
		wp_register_style( 'fancybox', get_template_directory_uri() . '/css/jquery.fancybox-1.3.4.css' );
		
		// Enqueue style
		wp_enqueue_style( 'normalize' );
		wp_enqueue_style( 'bootstrap' );
		wp_enqueue_style( 'transitions' );
		wp_enqueue_style( 'main' );
		wp_enqueue_style( 'wpfix' );
		wp_enqueue_style( 'animate' );
		wp_enqueue_style( 'fancybox' );
		
		
		// Register script
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js', null, null );
		wp_register_script( 'address', get_template_directory_uri() . '/js/jquery.address-1.4.min.js', null, null );
		wp_register_script( 'detectmobilebrowser', get_template_directory_uri() . '/js/detectmobilebrowser.js', null, null );
		wp_register_script( 'jmpress', get_template_directory_uri() . '/js/jmpress.js', null, null );
		wp_register_script( 'iscroll', get_template_directory_uri() . '/js/iscroll.js', null, null );
		wp_register_script( 'jScroll', get_template_directory_uri() . '/js/jScroll.js', null, null );
		wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', null, null );
		wp_register_script( 'waitforimages', get_template_directory_uri() . '/js/jquery.waitforimages.js', null, null );
		wp_register_script( 'isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', null, null );
		wp_register_script( 'transitions', get_template_directory_uri() . '/js/jquery.transitions.js', null, null );
		wp_register_script( 'fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', null, null );
		wp_register_script( 'validate', get_template_directory_uri() . '/js/jquery.validate.min.js', null, null );
		wp_register_script( 'spin', get_template_directory_uri() . '/js/spin.min.js', null, null );
		wp_register_script( 'fancybox', get_template_directory_uri() . '/js/jquery.fancybox-1.3.4.pack.js', null, null );
		wp_register_script( 'sendmail', get_template_directory_uri() . '/js/send-mail.js', null, null );
		wp_register_script( 'wpfix', get_template_directory_uri() . '/js/wp-fix.js', null, null );
		wp_register_script( 'main', get_template_directory_uri() . '/js/main.js', null, null );
		
		// Enqueue script
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'address' );
		wp_enqueue_script( 'detectmobilebrowser' );
		wp_enqueue_script( 'jmpress' );
		wp_enqueue_script( 'iscroll' );
		wp_enqueue_script( 'jScroll' );
		wp_enqueue_script( 'modernizr' );
		wp_enqueue_script( 'waitforimages' );
		wp_enqueue_script( 'isotope' );
		wp_enqueue_script( 'transitions' );
		wp_enqueue_script( 'fitvids' );
		wp_enqueue_script( 'validate' );
		wp_enqueue_script( 'spin' );
		wp_enqueue_script( 'fancybox' );
		wp_enqueue_script( 'sendmail' );
		wp_enqueue_script( 'wpfix' );
		wp_enqueue_script( 'main' );
	}
	// end my_enqueue

/* ============================================================================================================================================= */

	function my_theme_setup()
	{
		add_action( 'wp_enqueue_scripts', 'my_enqueue' );
		
		$lang_dir = get_template_directory() . '/languages';
		
		load_theme_textdomain( 'impressivcard', $lang_dir ); 
		
		$locale = get_locale();
		$locale_file = get_template_directory() . "/languages/$locale.php";
		
		if ( is_readable( $locale_file ) )
		{
			require_once( $locale_file );
		}
	}
	// end my_theme_setup
	
	add_action( 'after_setup_theme', 'my_theme_setup' );

/* ============================================================================================================================================= */

	function theme_style_css()
	{
?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>">

<?php
	}
	// end theme_style_css
	
	add_action( 'wp_head', 'theme_style_css' );

/* ============================================================================================================================================= */

	function theme_favicons()
	{
		$favicon = get_option( 'favicon', "" );
		
		if ( $favicon != "" )
		{
			echo '<link rel="shortcut icon" href="' . $favicon . '">' . "\n\n";
		}
		
		
		$apple_touch_icon = get_option( 'apple_touch_icon', "" );
		
		if ( $apple_touch_icon != "" )
		{
			$apple_touch_icon_src_no_ext = substr( $apple_touch_icon, 0, -4 );
			
			echo '<link rel="apple-touch-icon-precomposed" href="' . $apple_touch_icon_src_no_ext . '-57x57.png' . '">' . "\n";
			echo '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="' . $apple_touch_icon_src_no_ext . '-72x72.png' . '">' . "\n";
			echo '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="' . $apple_touch_icon_src_no_ext . '-114x114.png' . '">' . "\n";
			echo '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="' . $apple_touch_icon_src_no_ext . '-144x144.png' . '">' . "\n";
		}
		// end if
	}
	// end theme_favicons
	
	add_action( 'wp_head', 'theme_favicons' );

/* ============================================================================================================================================= */

	function theme_login()
	{
		$hide_login_logo = get_option( 'hide_login_logo', false );
		
		if ( $hide_login_logo )
		{
			echo '<style type="text/css">h1 { display: none; }</style>';
		}
		else
		{
			$login_logo = get_option( 'login_logo', "" );
			
			if ( $login_logo != "" )
			{
				echo '<style type="text/css">h1 a { cursor: default; background-image: url( "' . $login_logo . '" ) !important; }</style>';
			}
			// end if
		}
		// end if
	}
	// end theme_login
	
	add_action( 'login_head', 'theme_login' );

/* ============================================================================================================================================= */

	function theme_wp_title( $title, $sep )
	{
		global $paged, $page;
		
		if ( is_feed() )
		{
			return $title;
		}
		// end if
		
		
		$title .= get_bloginfo( 'name' );
		
		$site_description = get_bloginfo( 'description', 'display' );
		
		if ( $site_description && ( is_home() || is_front_page() ) )
		{
			$title = "$title $sep $site_description";
		}
		// end if
		
		
		if ( $paged >= 2 || $page >= 2 )
		{
			$title = "$title $sep " . sprintf( __( 'Page %s', 'impressivcard' ), max( $paged, $page ) );
		}
		// end if
		
		return $title;
	}
	// end theme_wp_title
	
	add_filter( 'wp_title', 'theme_wp_title', 10, 2 );

/* ============================================================================================================================================= */

	if ( function_exists( 'register_nav_menus' ) )
	{
		register_nav_menus( array(  'top_menu' => __( 'Navigation Menu', 'impressivcard' ) ) );
	}
	
	
	function wp_page_menu2( $args = array() )
	{
		$defaults = array(  'sort_column' => 'menu_order, post_title',
							'menu_class' => 'menu',
							'echo' => true,
							'link_before' => "",
							'link_after' => "" );
							
		$args = wp_parse_args( $args, $defaults );
		$args = apply_filters( 'wp_page_menu_args', $args );
		
		$menu = "";

		$list_args = $args;
		
		// Show Home in the menu
		if ( ! empty( $args['show_home'] ) )
		{
			if ( true === $args['show_home'] || '1' === $args['show_home'] || 1 === $args['show_home'] )
			{
				$text = __( 'Home', 'impressivcard' );
			}
			else
			{
				$text = $args['show_home'];
			}
			
			$class = "";
			
			if ( is_front_page() && !is_paged() )
			{
				$class = 'class="current_page_item"';
			}
			
			$menu .= '<li ' . $class . '><a href="' . home_url( '/' ) . '" title="' . esc_attr( $text ) . '">' . $args['link_before'] . $text . $args['link_after'] . '</a></li>';
			
			// If the front page is a page, add it to the exclude list
			if ( get_option( 'show_on_front' ) == 'page' )
			{
				if ( ! empty( $list_args['exclude'] ) )
				{
					$list_args['exclude'] .= ',';
				}
				else
				{
					$list_args['exclude'] = "";
				}
				
				$list_args['exclude'] .= get_option('page_on_front');
			}
			// end if
		}
		// end if
		
		$list_args['echo'] = false;
		$list_args['title_li'] = "";
		$menu .= str_replace( array( "\r", "\n", "\t" ), "", wp_list_pages( $list_args ) );
		
		if ( $menu )
		{
			$menu = '<ul class="menu-default">' . $menu . '</ul>';
		}
		
		$menu = $menu . "\n";
		$menu = apply_filters( 'wp_page_menu', $menu, $args );
		
		if ( $args['echo'] )
		{
			echo $menu;
		}
		else
		{
			return $menu;
		}
		// end if
	}
	//end wp_page_menu2

/* ============================================================================================================================================= */

	if ( function_exists( 'add_theme_support' ) )
	{
		add_theme_support( 'post-thumbnails', array( 'portfolio', 'post' ) );
		add_theme_support( 'automatic-feed-links' );
	}
	// end add_theme_support

	
	if ( function_exists( 'add_image_size' ) )
	{
		add_image_size( 'featured_image', 150 );
		
		add_image_size( 'apple_touch_icon_57', 57, 57, true );
		add_image_size( 'apple_touch_icon_72', 72, 72, true );
		add_image_size( 'apple_touch_icon_114', 114, 114, true );
		add_image_size( 'apple_touch_icon_144', 144, 144, true );
	}
	// end add_image_size
	
	
	if ( ! isset( $content_width ) )
	{
		$content_width = 1170;
	}
	
	
	add_editor_style( 'custom-editor-style.css' );

/* ============================================================================================================================================= */

	function custom_excerpt_length( $length )
	{
		return 100;
	}
	
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	
	
	function new_excerpt_more( $more )
	{
		return ' ... <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Read More', 'impressivcard' ) . '</a>';
	}
	
	add_filter( 'excerpt_more', 'new_excerpt_more' );

/* ============================================================================================================================================= */

	$theme_seo_fields = stripcslashes( get_option( 'theme_seo_fields', 'No' ) );
	
	
	function my_meta_box_seo()
	{
		global $post, $post_ID;
		
		?>
			<div class="admin-inside-box">
				<input type="hidden" name="my_meta_box_seo_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">
				
				<p>
					<label for="my_seo_description"><?php echo __( 'Description', 'impressivcard' ); ?></label>
					
					<?php
						$my_seo_description = stripcslashes( get_option( $post->ID . 'my_seo_description' ) );
					?>
					
					<textarea id="my_seo_description" name="my_seo_description" rows="4" cols="46" class="widefat"><?php echo $my_seo_description; ?></textarea>
				</p>
				
				<p>
					<label for="my_seo_keywords"><?php echo __( 'Keywords', 'impressivcard' ); ?></label>
					
					<?php
						$my_seo_keywords = stripcslashes( get_option( $post->ID . 'my_seo_keywords' ) );
					?>
					
					<textarea id="my_seo_keywords" name="my_seo_keywords" rows="4" cols="46" class="widefat"><?php echo $my_seo_keywords; ?></textarea>
				</p>
				
				<p class="howto"><?php echo __( 'Separate keywords with commas', 'impressivcard' ); ?></p>
			</div>
			<!-- end .admin-inside-box -->
		<?php
	}
	// end my_meta_box_seo
	
	
	function my_add_meta_box_seo()
	{
		add_meta_box( 'my_meta_box_seo_post', __( 'SEO', 'impressivcard' ), 'my_meta_box_seo', 'post', 'side', 'low' );
		add_meta_box( 'my_meta_box_seo_page', __( 'SEO', 'impressivcard' ), 'my_meta_box_seo', 'page', 'side', 'low' );
		
		$args = array( '_builtin' => false );
		$post_types = get_post_types( $args ); 
		
		foreach ( $post_types as $post_type )
		{
			add_meta_box( 'my_meta_box_seo_' . $post_type, __( 'SEO', 'impressivcard' ), 'my_meta_box_seo', $post_type, 'side', 'low' );
		}
	}
	// end my_add_meta_box_seo
	
	if ( $theme_seo_fields == 'Yes' )
	{
		add_action( 'admin_init', 'my_add_meta_box_seo' );
	}
	
	
	function my_save_meta_box_seo( $post_id )
	{
		global $post, $post_ID;
		
		if ( ! wp_verify_nonce( @$_POST['my_meta_box_seo_nonce'], basename(__FILE__) ) )
		{
			return $post_id;
		}
		
		update_option( $post->ID . 'my_seo_description', $_POST['my_seo_description'] );
		update_option( $post->ID . 'my_seo_keywords', $_POST['my_seo_keywords'] );
	}
	// end my_save_meta_box_seo
	
	if ( $theme_seo_fields == 'Yes' )
	{
		add_action( 'save_post', 'my_save_meta_box_seo' );
	}
	
	
	function my_seo_wp_head()
	{
		global $post, $post_ID;
		
		
		if ( is_singular() )
		{
			$my_seo_description = stripcslashes( get_option( $post->ID . 'my_seo_description', "" ) );
			$my_seo_keywords = stripcslashes( get_option( $post->ID . 'my_seo_keywords', "" ) );
			
			
			if ( $my_seo_description != "" )
			{
				echo '<meta name="description" content="' . $my_seo_description . '">' . "\n";
			}
			
			if ( $my_seo_keywords != "" )
			{
				echo '<meta name="keywords" content="' . $my_seo_keywords . '">' . "\n";
			}
		}
		else
		{
			$site_description = stripcslashes( get_option( 'site_description', "" ) );
			$site_keywords = stripcslashes( get_option( 'site_keywords', "" ) );
			
			
			if ( $site_description != "" )
			{
				echo '<meta name="description" content="' . $site_description . '">' . "\n";
			}
			
			if ( $site_keywords != "" )
			{
				echo '<meta name="keywords" content="' . $site_keywords . '">' . "\n";
			}
		}
		// end if
	}
	// end my_seo_wp_head
	
	if ( $theme_seo_fields == 'Yes' )
	{
		add_action( 'wp_head', 'my_seo_wp_head' );
	}

/* ============================================================================================================================================= */

	function create_portfolio()
	{
		$labels = array('name' => __( 'Portfolio', 'impressivcard' ),
						'singular_name' => __( 'Portfolio Item', 'impressivcard' ),
						'add_new' => __( 'Add New', 'impressivcard' ),
						'add_new_item' => __( 'Add New Item', 'impressivcard' ),
						'edit_item' => __( 'Edit Item', 'impressivcard' ),
						'new_item' => __( 'New Item', 'impressivcard' ),
						'view_item' => __( 'View Item', 'impressivcard' ),
						'search_items' => __( 'Search', 'impressivcard' ),
						'not_found' =>  __( 'No items found.', 'impressivcard' ),
						'not_found_in_trash' => __( 'No items found in Trash.', 'impressivcard' ),
						'parent_item_colon' => "",
						'menu_name' => 'Portfolio' );
		
		$args = array(  'labels' => $labels,
						'public' => true,
						'publicly_queryable' => true,
						'show_ui' => true,
						'query_var' => true,
						'show_in_nav_menus' => true,
						'capability_type' => 'post',
						'hierarchical' => false,
						'menu_position' => 5,
						'supports' => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions', ),
						'rewrite' => array( 'slug' => 'portfolio', 'with_front' => false ) );
		
		register_post_type( 'portfolio' , $args );
	}
	// end create_portfolio
	
	add_action( 'init', 'create_portfolio' );
	
/* ------------------------------------------------------------------------------------ */

	function portfolio_updated_messages( $messages )
	{
		global $post, $post_ID;
		
		$messages['portfolio'] = array( 0 => '', // Unused. Messages start at index 1.
		
										1 => sprintf( __( 'Updated. <a target="_blank" href="%s">View</a>', 'impressivcard' ), esc_url( get_permalink( $post_ID) ) ),
										
										2 => __( 'Custom field updated.', 'impressivcard' ),
										
										3 => __( 'Custom field deleted.', 'impressivcard' ),
										
										4 => __( 'Item updated.', 'impressivcard' ),
										
										// translators: %s: date and time of the revision
										5 => isset( $_GET['revision'] ) ? sprintf( __( 'Item restored to revision from %s', 'impressivcard' ), wp_post_revision_title( ( int ) $_GET['revision'], false ) ) : false,
										
										6 => sprintf( __( 'Published. <a target="_blank" href="%s">View</a>', 'impressivcard' ), esc_url( get_permalink( $post_ID) ) ),
										
										7 => __( 'Item saved.', 'impressivcard' ),
										
										8 => sprintf( __( 'Item submitted. <a target="_blank" href="%s">Preview Item</a>', 'impressivcard' ), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
										
										9 => sprintf( __( 'Item scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Item</a>', 'impressivcard' ),
										
										// translators: Publish box date format, see http://php.net/date
										date_i18n( __( 'M j, Y @ G:i', 'impressivcard' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID) ) ),
										
										10 => sprintf( __( 'Item draft updated. <a target="_blank" href="%s">Preview Item</a>', 'impressivcard' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID) ) ) ) );
	
		return $messages;
	}
	// end portfolio_updated_messages
	
	add_filter( 'post_updated_messages', 'portfolio_updated_messages' );
	
/* ------------------------------------------------------------------------------------ */
	
	function portfolio_edit_columns( $pf_columns )
	{
		$pf_columns = array('cb' => '<input type="checkbox">',
							'title' => __( 'Title', 'impressivcard' ),
							'screenshot' => __( 'Featured Image', 'impressivcard' ),
							'department' => __( 'Department', 'impressivcard' ),
							'portfolio_type_column' => __( 'Type', 'impressivcard' ),
							'short_description' => __( 'Short Description', 'impressivcard' ) );
		
		return $pf_columns;
	}
	
	add_filter( 'manage_edit-portfolio_columns', 'portfolio_edit_columns' );
	
/* ------------------------------------------------------------------------------------ */
	
	function portfolio_custom_columns( $pf_column )
	{
		global $post, $post_ID;
		
		switch ( $pf_column )
		{
			case 'screenshot':
			
				if ( has_post_thumbnail() )
				{
					the_post_thumbnail( 'featured_image' );
				}
				
				break;
			
			case 'department':
			
				$taxon = 'department';
				$terms_list = get_the_terms( $post_ID, $taxon );
				
				if ( ! empty( $terms_list ) )
				{
					$out = array();
					
					foreach ( $terms_list as $term_list )
					{
						$out[] = '<a href="edit.php?post_type=portfolio&department=' .$term_list->slug .'">' .$term_list->name .' </a>';
					}
					
					echo join( ', ', $out );
				}
				
				break;
				
			case 'portfolio_type_column':
			
				$portfoio_type2 = get_option( $post->ID . 'portfoio_type2' );
				
				if ( $portfoio_type2 )
				{
					echo __( 'Lightbox', 'impressivcard' );
				}
				else
				{
					echo __( 'Standard', 'impressivcard' );
				}
				
				break;
			
			case 'short_description':
			
				echo get_option( $post->ID . 'short_description' );
				
				break;
		}
	}
	// end portfolio_custom_columns
	
	add_action( 'manage_posts_custom_column',  'portfolio_custom_columns' );
	
/* ------------------------------------------------------------------------------------ */

	function portfolio_item_details()
	{
		global $post, $post_ID;
		
		?>
			<div class="admin-inside-box">
				<script>
					jQuery(document).ready(function($)
					{
						$( '#portfoio_type1' ).click(function()
						{
							$( '#portfoio_type2' ).removeAttr( 'checked' );
							$( '#portfoio_type1' ).attr( 'checked', 'checked' );
						});
						
						$( '#portfoio_type2' ).click(function()
						{
							$( '#portfoio_type1' ).removeAttr( 'checked' );
							$( '#portfoio_type2' ).attr( 'checked', 'checked' );
						});
					});
					// end jquery
				</script>
			
				<p>
					<input type="hidden" name="portfolio_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">
				</p>
				
				<p>
					<label style="display: block; font-weight: bold; cursor: default; padding-bottom: 10px;"><?php echo __( 'Type', 'impressivcard' ); ?></label>
					
					<?php
						$portfoio_type2 = get_option( $post->ID . 'portfoio_type2' );
					?>
					<label style="display: inline-block; margin-bottom: 4px;">
						<input type="radio" id="portfoio_type1" name="portfoio_type1" value="portfoio_type1" <?php if ( ! $portfoio_type2 ) { echo 'checked="checked"'; } ?> /> <?php echo __( 'Standard', 'impressivcard' ); ?>
					</label>
					<br>
					<label style="display: inline-block; margin-bottom: 4px;">
						<input type="radio" id="portfoio_type2" name="portfoio_type2" value="portfoio_type2" <?php if ( $portfoio_type2 ) { echo 'checked="checked"'; } ?> /> <?php echo __( 'Lightbox', 'impressivcard' ); ?>
					</label>
				</p>
				<!-- end Type -->
				
				<p>
					<label for="short_description" style="font-weight: bold;"><?php echo __( 'Short Description', 'impressivcard' ); ?></label>
					
					<textarea id="short_description" name="short_description" style="outline: none; resize: vertical; padding: 7px; width: 100%;" rows="3" cols="50"><?php echo stripcslashes( get_option( $post->ID . 'short_description' ) ); ?></textarea>
				</p>
				<!-- end Short Description -->
				
				<p>
					<label for="pf_direct_url" style="font-weight: bold;"><?php echo __( 'Direct URL', 'impressivcard' ); ?></label>
					
					<input type="text" id="pf_direct_url" name="pf_direct_url" class="code2" style="width: 100%;" value="<?php echo stripcslashes( get_option( $post->ID . 'pf_direct_url' ) ); ?>">
					
					<label style="display: inline-block; font-size: 11px; color: #666666; margin-top: 5px;">
						<?php
							$pf_url_new_tab = get_option( $post->ID . 'pf_url_new_tab' );
						?>
						<input type="checkbox" id="pf_url_new_tab" name="pf_url_new_tab" value="pf_url_new_tab" <?php if ( $pf_url_new_tab ) { echo 'checked="checked"'; } ?>> <?php echo __( 'Open in a new tab', 'impressivcard' ); ?>
					</label>
				</p>
				<!-- end Direct URL -->
			</div>
			<!-- end .admin-inside-box -->
		<?php
	}
	// end portfolio_item_details

	function add_portfolio_metabox()
	{
		add_meta_box( 'portfolio_meta_box', __( 'Details', 'impressivcard' ), 'portfolio_item_details', 'portfolio', 'side', 'default' );
	}
	
	add_action( 'admin_init', 'add_portfolio_metabox' );
	
/* ------------------------------------------------------------------------------------ */

	function save_portfolio_details( $post_id )
	{
		global $post, $post_ID;
	
		if ( ! wp_verify_nonce( @$_POST['portfolio_nonce'], basename(__FILE__) ) )
		{
			return $post_id;
		}

		if ( $_POST['post_type'] == 'portfolio' )
		{
			if ( !current_user_can( 'edit_page', $post_id ) )
				return $post_id;
		}
		else
		{
			if ( !current_user_can( 'edit_post', $post_id ) )
			return $post_id;
		}
	
		if ( $_POST['post_type'] == 'portfolio' )
		{
			update_option( $post->ID . "portfoio_type2", $_POST['portfoio_type2'] );
			update_option( $post->ID . "short_description", $_POST['short_description'] );
			update_option( $post->ID . "pf_direct_url", $_POST['pf_direct_url'] );
			update_option( $post->ID . "pf_url_new_tab", $_POST['pf_url_new_tab'] );
		}
		// end if post_type
		
	}
	// end save_portfolio_details
	
	add_action( 'save_post', 'save_portfolio_details' );
	
/* ------------------------------------------------------------------------------------ */

	function portfolio_taxonomy()
	{
		$labels = array('name' => __( 'Departments', 'impressivcard' ),
						'singular_name' => __( 'Department', 'impressivcard' ),
						'search_items' =>  __( 'Search', 'impressivcard' ),
						'all_items' => __( 'All Departments', 'impressivcard' ),
						'parent_item' => __( 'Parent Department', 'impressivcard' ),
						'parent_item_colon' => __( 'Parent Department:', 'impressivcard' ),
						'edit_item' => __( 'Edit', 'impressivcard' ),
						'update_item' => __( 'Update Department', 'impressivcard' ),
						'add_new_item' => __( 'Add New', 'impressivcard' ),
						'new_item_name' => __( 'New Department Name', 'impressivcard' ),
						'menu_name' => __( 'Departments', 'impressivcard' ) );

		register_taxonomy(  'department',
							array( 'portfolio' ),
							array( 'hierarchical' => true,
							'labels' => $labels,
							'show_ui' => true,
							'public' => true,
							'query_var' => true,
							'rewrite' => array( 'slug' => 'department' )));
	}
	// end portfolio_taxonomy
	
	add_action( 'init', 'portfolio_taxonomy' );

/* ------------------------------------------------------------------------------------ */

	function only_show_departments()
	{
		global $typenow;
		
		if ( $typenow == 'portfolio' )
		{
			$filters = array( 'department' );
			
			foreach ( $filters as $tax_slug )
			{
				$tax_obj = get_taxonomy( $tax_slug );
				$tax_name = $tax_obj->labels->name;
				$terms = get_terms( $tax_slug );
			
				echo '<select name="' .$tax_slug .'" id="' .$tax_slug .'" class="postform">';
				echo '<option value="">' . __( 'Show All', 'impressivcard' ) . " " . $tax_name .'</option>';
				
				foreach ( $terms as $term )
				{
					echo '<option value=' . $term->slug, @$_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name . ' (' . $term->count . ')</option>';
				}
				
				echo '</select>';
			}
			
		}
		// end if typenow
		
	}
	// end only_show_departments

	add_action( 'restrict_manage_posts', 'only_show_departments' );
	
/* ------------------------------------------------------------------------------------ */

	function get_nav_menu_id( $template )
	{
		static $nav_menu_id;
		
		if ( !isset( $nav_menu_id ) )
		{
			global $wpdb;
			
			$sql = <<<SQL
			SELECT menu.post_id AS menu_id FROM {$wpdb->postmeta}
			AS template INNER JOIN {$wpdb->postmeta}
			AS menu_id ON menu_id.meta_key='_menu_item_object_id'
                        AND menu_id.meta_value=template.post_id
			INNER JOIN {$wpdb->postmeta} AS menu ON menu_id.post_id=menu.post_id
			WHERE 1=1
			AND menu.meta_key='_menu_item_object' AND menu.meta_value='page'
			AND template.meta_key='_wp_page_template' AND template.meta_value='%s'
SQL;
			$nav_menu_id = $wpdb->get_var( $wpdb->prepare( $sql, $template ) );
		}
		
		return $nav_menu_id;
	}
	// end get_nav_menu_id

	function remove_class($var)
	{
		if ( $var == 'current_page_parent' )
		{
			return false;
		}
		
		return true;
	}
	// end remove_class

	function add_class_to_menu($current)
	{
		global $wp_query, $post;
		
		$post_type = get_query_var( 'post_type' );
		$term_type = get_query_var( 'taxonomy' );
		
		if ( $post_type == 'portfolio' || $term_type == 'department' || is_404() )
		{
			$current = array_filter( $current, 'remove_class' );

			if ( ! is_404() )
			{
				// get nav_menu_id from products page that using page template (products_page.php)
				$menu_id = 'menu-item-' . get_nav_menu_id( 'portfolio.php' );
				
				if ( in_array( $menu_id, $current) )
				{
					$current[] = 'current_page_parent';
				}
			}
		}
		
		return $current;
	}
	// end add_class_to_menu
	
	// check if we are not in backend
	if ( ! is_admin() )
	{
		add_filter( 'nav_menu_css_class', 'add_class_to_menu' );
	}

/* ============================================================================================================================================= */

	if ( function_exists( 'register_sidebar' ) )
	{
		register_sidebar( array('name' => __( 'Blog Sidebar', 'impressivcard' ),
								'id' => 'blog_sidebar',
								'before_widget' => '<aside id="%1$s" class="widget %2$s" style="padding-bottom: 1em;">',
								'after_widget' => '</aside>',
								'before_title' => '<h3 class="widget-title">',
								'after_title' => '</h3>' ) );
								
								
		register_sidebar( array('name' => __( 'Custom Pages', 'impressivcard' ),
								'id' => 'pages',
								'description' => __( 'Use only impressivCard widgets in here.', 'impressivcard' ),
								'before_widget' => '',
								'after_widget' => '',
								'before_title' => '<span style="display: none;">',
								'after_title' => '</span>' ) );
	}
	// end if

/* ============================================================================================================================================= */

	class Page_Widget extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct('page_widget',
								__( 'impressivCard - Custom Pages', 'impressivcard' ),
								array( 'description' => __( 'About Me, Resume and Contact pages.', 'impressivcard' ) ) );
		}
		
		
		public function form( $instance )
		{
			if ( isset( $instance[ 'title' ] ) ) { $title = $instance[ 'title' ]; } else { $title = ""; }
			
			if ( isset( $instance[ 'custom_page' ] ) ) { $custom_page = $instance[ 'custom_page' ]; } else { $custom_page = ""; }
			
			if ( isset( $instance[ 'page_x' ] ) ) { $page_x = $instance[ 'page_x' ]; } else { $page_x = ""; }
			
			if ( isset( $instance[ 'page_y' ] ) ) { $page_y = $instance[ 'page_y' ]; } else { $page_y = ""; }
			
			if ( isset( $instance[ 'page_z' ] ) ) { $page_z = $instance[ 'page_z' ]; } else { $page_z = ""; }
			
			if ( isset( $instance[ 'page_r' ] ) ) { $page_r = $instance[ 'page_r' ]; } else { $page_r = ""; }
			
			if ( isset( $instance[ 'page_phi' ] ) ) { $page_phi = $instance[ 'page_phi' ]; } else { $page_phi = ""; }
			
			if ( isset( $instance[ 'page_scale' ] ) ) { $page_scale = $instance[ 'page_scale' ]; } else { $page_scale = ""; }
			
			if ( isset( $instance[ 'page_rotate' ] ) ) { $page_rotate = $instance[ 'page_rotate' ]; } else { $page_rotate = ""; }
			
			if ( isset( $instance[ 'page_rotate_x' ] ) ) { $page_rotate_x = $instance[ 'page_rotate_x' ]; } else { $page_rotate_x = ""; }
			
			if ( isset( $instance[ 'page_rotate_y' ] ) ) { $page_rotate_y = $instance[ 'page_rotate_y' ]; } else { $page_rotate_y = ""; }
			
			if ( isset( $instance[ 'page_rotate_z' ] ) ) { $page_rotate_z = $instance[ 'page_rotate_z' ]; } else { $page_rotate_z = ""; }
			
			?>
				<!-- custom_page -->
				<p>
					<label for="<?php echo $this->get_field_id( 'custom_page' ); ?>"><?php echo __( 'All Pages:', 'impressivcard' ); ?></label>
					
					<select class="widefat" id="<?php echo $this->get_field_id( 'custom_page' ); ?>" name="<?php echo $this->get_field_name( 'custom_page' ); ?>">
					
						<option></option>
						
						<?php
							$pages = get_pages();
							
							foreach ( $pages as $page )
							{
								if ( $custom_page == $page->post_name )
								{
									$option = '<option selected="selected" value="' . $page->post_name . '">' . $page->post_title . '</option>';
									
									echo $option;
								}
								else
								{
									$option = '<option value="' . $page->post_name . '">' . $page->post_title . '</option>';
									
									echo $option;
								}
								// end if
							}
							// end for
						?>
					</select>
				</p>
				<!-- end custom_page -->
				
				<!-- title -->
				<p>
					<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __( 'Page Title:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>">
				</p>
				<!-- end title -->
				
				<hr>
				<hr>
				
				<h4 style="text-align: center;">Parameters</h4>
				
				<!-- page_x -->
				<p>
					<label for="<?php echo $this->get_field_id( 'page_x' ); ?>" title="Required" style="font-weight: bold; color: red;"><?php echo __( 'X-Axis:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'page_x' ); ?>" name="<?php echo $this->get_field_name( 'page_x' ); ?>" value="<?php echo esc_attr( $page_x ); ?>">
				</p>
				<!-- end page_x -->
				
				<!-- page_y -->
				<p>
					<label for="<?php echo $this->get_field_id( 'page_y' ); ?>" title="Required" style="font-weight: bold; color: red;"><?php echo __( 'Y-Axis:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'page_y' ); ?>" name="<?php echo $this->get_field_name( 'page_y' ); ?>" value="<?php echo esc_attr( $page_y ); ?>">
				</p>
				<!-- end page_y -->
				
				<!-- page_z -->
				<p>
					<label for="<?php echo $this->get_field_id( 'page_z' ); ?>"><?php echo __( 'Z-Axis:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'page_z' ); ?>" name="<?php echo $this->get_field_name( 'page_z' ); ?>" value="<?php echo esc_attr( $page_z ); ?>">
				</p>
				<!-- end page_z -->
				
				<!-- page_r -->
				<p>
					<label for="<?php echo $this->get_field_id( 'page_r' ); ?>"><?php echo __( 'Radius:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'page_r' ); ?>" name="<?php echo $this->get_field_name( 'page_r' ); ?>" value="<?php echo esc_attr( $page_r ); ?>">
				</p>
				<!-- end page_r -->
				
				<!-- page_phi -->
				<p>
				
					<label for="<?php echo $this->get_field_id( 'page_phi' ); ?>"><?php echo __( 'Angle:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'page_phi' ); ?>" name="<?php echo $this->get_field_name( 'page_phi' ); ?>" value="<?php echo esc_attr( $page_phi ); ?>">
					
				</p>
				<!-- end page_phi -->
				
				<!-- page_scale -->
				<p>
					<label for="<?php echo $this->get_field_id( 'page_scale' ); ?>" title="Required" style="font-weight: bold; color: red;"><?php echo __( 'Scale:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'page_scale' ); ?>" name="<?php echo $this->get_field_name( 'page_scale' ); ?>" value="<?php echo esc_attr( $page_scale ); ?>">
				</p>
				<!-- end page_scale -->
				
				<!-- page_rotate -->
				<p>
					<label for="<?php echo $this->get_field_id( 'page_rotate' ); ?>" title="Required" style="font-weight: bold; color: red;"><?php echo __( 'Rotate:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'page_rotate' ); ?>" name="<?php echo $this->get_field_name( 'page_rotate' ); ?>" value="<?php echo esc_attr( $page_rotate ); ?>">
				</p>
				<!-- end page_rotate -->
				
				<!-- page_rotate_x -->
				<p>
					<label for="<?php echo $this->get_field_id( 'page_rotate_x' ); ?>"><?php echo __( 'Rotate X-Axis:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'page_rotate_x' ); ?>" name="<?php echo $this->get_field_name( 'page_rotate_x' ); ?>" value="<?php echo esc_attr( $page_rotate_x ); ?>">
				</p>
				<!-- end page_rotate_x -->
				
				<!-- page_rotate_y -->
				<p>
					<label for="<?php echo $this->get_field_id( 'page_rotate_y' ); ?>"><?php echo __( 'Rotate Y-Axis:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'page_rotate_y' ); ?>" name="<?php echo $this->get_field_name( 'page_rotate_y' ); ?>" value="<?php echo esc_attr( $page_rotate_y ); ?>">
				</p>
				<!-- end page_rotate_y -->
				
				<!-- page_rotate_z -->
				<p>
					<label for="<?php echo $this->get_field_id( 'page_rotate_z' ); ?>"><?php echo __( 'Rotate Z-Axis:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'page_rotate_z' ); ?>" name="<?php echo $this->get_field_name( 'page_rotate_z' ); ?>" value="<?php echo esc_attr( $page_rotate_z ); ?>">
				</p>
				<!-- end page_rotate_z -->
			<?php
		}
		// end form
		
		
		public function update( $new_instance, $old_instance )
		{
			$instance = array();
			
			$instance['title'] = strip_tags( $new_instance['title'] );
			
			$instance['custom_page'] = strip_tags( $new_instance['custom_page'] );
			
			$instance['page_x'] = strip_tags( $new_instance['page_x'] );
			
			$instance['page_y'] = strip_tags( $new_instance['page_y'] );
			
			$instance['page_z'] = strip_tags( $new_instance['page_z'] );
			
			$instance['page_r'] = strip_tags( $new_instance['page_r'] );
			
			$instance['page_phi'] = strip_tags( $new_instance['page_phi'] );
			
			$instance['page_scale'] = strip_tags( $new_instance['page_scale'] );
			
			$instance['page_rotate'] = strip_tags( $new_instance['page_rotate'] );
			
			$instance['page_rotate_x'] = strip_tags( $new_instance['page_rotate_x'] );
			
			$instance['page_rotate_y'] = strip_tags( $new_instance['page_rotate_y'] );
			
			$instance['page_rotate_z'] = strip_tags( $new_instance['page_rotate_z'] );
			
			return $instance;
		}
		// end update
		
		
		public function widget( $args, $instance )
		{
			extract( $args );
			
			$title = apply_filters( 'widget_title', $instance['title'] );
			
			$custom_page = apply_filters( 'widget_slug', $instance['custom_page'] );
			
			$page_x = apply_filters( 'widget_page_x', $instance['page_x'] );
			
			$page_y = apply_filters( 'widget_page_y', $instance['page_y'] );
			
			$page_z = apply_filters( 'widget_page_z', $instance['page_z'] );
			
			$page_r = apply_filters( 'widget_page_r', $instance['page_r'] );
			
			$page_phi = apply_filters( 'widget_page_phi', $instance['page_phi'] );
			
			$page_scale = apply_filters( 'widget_page_scale', $instance['page_scale'] );
			
			$page_rotate = apply_filters( 'widget_page_rotate', $instance['page_rotate'] );
			
			$page_rotate_x = apply_filters( 'widget_page_rotate_x', $instance['page_rotate_x'] );
			
			$page_rotate_y = apply_filters( 'widget_page_rotate_y', $instance['page_rotate_y'] );
			
			$page_rotate_z = apply_filters( 'widget_page_rotate_z', $instance['page_rotate_z'] );
			
			echo $before_widget;
			
			if ( ! empty( $title ) )
			{
				// echo $before_title . $title . $after_title;
			}
			
			/* ------------------------------------------------------------------------------------ */
			
			?>
			
				<!-- PAGE -->
				<section id="<?php echo $custom_page; ?>" class="page wrapper" data-x="<?php echo $page_x; ?>" data-y="<?php echo $page_y; ?>" data-z="<?php echo $page_z; ?>" data-r="<?php echo $page_r; ?>" data-phi="<?php echo $page_phi; ?>" data-scale="<?php echo $page_scale; ?>" data-rotate="<?php echo $page_rotate; ?>" data-rotate-x="<?php echo $page_rotate_x; ?>" data-rotate-y="<?php echo $page_rotate_y; ?>" data-rotate-z="<?php echo $page_rotate_z; ?>">
					
					<!-- PAGE TITLE -->
					<h2 class="caption"><span><?php echo $title; ?></span></h2>
					
					<div class="iscroll-wrapper">
						<div class="scroller container">
							<div class="row">
								<?php
									$args_pf_content = 'pagename=' . $custom_page;
									$loop_pf_content = new WP_Query( $args_pf_content );
									
									if ( $loop_pf_content->have_posts() ) :
										while ( $loop_pf_content->have_posts() ) : $loop_pf_content->the_post();
										
											the_content();
										
										endwhile;
									endif;
									wp_reset_query();
								?>
							</div>
							<!-- end row -->
						</div>
						<!-- end scroller -->
					</div>
					<!-- end iscroll-wrapper -->
				</section>
				<!-- end PAGE -->
			<?php

			/* ------------------------------------------------------------------------------------ */
			
			echo $after_widget;
		}
		// end widget
	}
	// end Page_Widget
	
	add_action( 'widgets_init', create_function( '', 'register_widget( "page_widget" );' ) );

/* ============================================================================================================================================= */

	class Portfolio_Widget extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct('portfolio_widget',
								__( 'impressivCard - Portfolio Page', 'impressivcard' ),
								array( 'description' => __( 'Portfolio page.', 'impressivcard' ) ) );
		}
		
		
		public function form( $instance )
		{
			if ( isset( $instance[ 'title' ] ) ) { $title = $instance[ 'title' ]; } else { $title = ""; }
			
			if ( isset( $instance[ 'slug' ] ) ) { $slug = $instance[ 'slug' ]; } else { $slug = ""; }
			
			if ( isset( $instance[ 'portfolio_editor_content' ] ) ) { $portfolio_editor_content = $instance[ 'portfolio_editor_content' ]; } else { $portfolio_editor_content = false; }
			
			if ( isset( $instance[ 'portfolio_top_content' ] ) ) { $portfolio_top_content = $instance[ 'portfolio_top_content' ]; } else { $portfolio_top_content = false; }
			
			if ( isset( $instance[ 'portfolio_x' ] ) ) { $portfolio_x = $instance[ 'portfolio_x' ]; } else { $portfolio_x = ""; }
			
			if ( isset( $instance[ 'portfolio_y' ] ) ) { $portfolio_y = $instance[ 'portfolio_y' ]; } else { $portfolio_y = ""; }
			
			if ( isset( $instance[ 'portfolio_z' ] ) ) { $portfolio_z = $instance[ 'portfolio_z' ]; } else { $portfolio_z = ""; }
			
			if ( isset( $instance[ 'portfolio_r' ] ) ) { $portfolio_r = $instance[ 'portfolio_r' ]; } else { $portfolio_r = ""; }
			
			if ( isset( $instance[ 'portfolio_phi' ] ) ) { $portfolio_phi = $instance[ 'portfolio_phi' ]; } else { $portfolio_phi = ""; }

			if ( isset( $instance[ 'portfolio_scale' ] ) ) { $portfolio_scale = $instance[ 'portfolio_scale' ]; } else { $portfolio_scale = ""; }
			
			if ( isset( $instance[ 'portfolio_rotate' ] ) ) { $portfolio_rotate = $instance[ 'portfolio_rotate' ]; } else { $portfolio_rotate = ""; }
			
			if ( isset( $instance[ 'portfolio_rotate_x' ] ) ) { $portfolio_rotate_x = $instance[ 'portfolio_rotate_x' ]; } else { $portfolio_rotate_x = ""; }
			
			if ( isset( $instance[ 'portfolio_rotate_y' ] ) ) { $portfolio_rotate_y = $instance[ 'portfolio_rotate_y' ]; } else { $portfolio_rotate_y = ""; }
			
			if ( isset( $instance[ 'portfolio_rotate_z' ] ) ) { $portfolio_rotate_z = $instance[ 'portfolio_rotate_z' ]; } else { $portfolio_rotate_z = ""; }
			
			?>
				<!-- slug -->
				<p>
					<label for="<?php echo $this->get_field_id( 'slug' ); ?>"><?php echo __( 'All Pages:', 'impressivcard' ); ?></label>
					
					<select id="<?php echo $this->get_field_id( 'slug' ); ?>" name="<?php echo $this->get_field_name( 'slug' ); ?>" class="widefat">
					
						<option></option>
						
						<?php
							$pages = get_pages();
							
							foreach ( $pages as $page )
							{
								if ( $slug == $page->post_name )
								{
									$option = '<option selected="selected" value="' . $page->post_name . '">' . $page->post_title . '</option>';
									
									echo $option;
								}
								else
								{
									$option = '<option value="' . $page->post_name . '">' . $page->post_title . '</option>';
									
									echo $option;
								}
								// end if
							}
							// end for
						?>
					</select>
				</p>
				<!-- end slug -->
				
				<!-- title -->
				<p>
					<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __( 'Page Title:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>">
				</p>
				<!-- end title -->
				
				<hr>
				<hr>
				
				<!-- Activate content editor -->
				<p>
					<label><input type="checkbox" id="<?php echo $this->get_field_id( 'portfolio_editor_content' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_editor_content' ); ?>" <?php if ( $portfolio_editor_content ) { echo 'checked="checked"'; } ?> value="portfolio_editor_content"> Activate content editor</label>
				</p>
				<!-- end Activate content editor -->
				
				<!-- Show content on the top -->
				<p>
					<label><input type="checkbox" id="<?php echo $this->get_field_id( 'portfolio_top_content' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_top_content' ); ?>" <?php if ( $portfolio_top_content ) { echo 'checked="checked"'; } ?>> Show content editor on the top</label>
				</p>
				<!-- end Show content on the top -->
				
				<hr>
				<hr>
				
				<h4 style="text-align: center;"><?php echo __( 'Parameters', 'impressivcard' ); ?></h4>
				
				<!-- portfolio_x -->
				<p>
					<label for="<?php echo $this->get_field_id( 'portfolio_x' ); ?>" title="Required" style="font-weight: bold; color: red;"><?php echo __( 'X-Axis:', 'impressivcard' ); ?></label>
					
					<input type="text" id="<?php echo $this->get_field_id( 'portfolio_x' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_x' ); ?>" class="widefat" value="<?php echo esc_attr( $portfolio_x ); ?>">
				</p>
				<!-- end portfolio_x -->
				
				<!-- portfolio_y -->
				<p>
					<label for="<?php echo $this->get_field_id( 'portfolio_y' ); ?>" title="Required" style="font-weight: bold; color: red;"><?php echo __( 'Y-Axis:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'portfolio_y' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_y' ); ?>" value="<?php echo esc_attr( $portfolio_y ); ?>">
				</p>
				<!-- end portfolio_y -->
				
				<!-- portfolio_z -->
				<p>
					<label for="<?php echo $this->get_field_id( 'portfolio_z' ); ?>"><?php echo __( 'Z-Axis:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'portfolio_z' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_z' ); ?>" value="<?php echo esc_attr( $portfolio_z ); ?>">
				</p>
				<!-- end portfolio_z -->
				
				<!-- portfolio_r -->
				<p>
					<label for="<?php echo $this->get_field_id( 'portfolio_r' ); ?>"><?php echo __( 'Radius:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'portfolio_r' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_r' ); ?>" value="<?php echo esc_attr( $portfolio_r ); ?>">
				</p>
				<!-- end portfolio_r -->
				
				<!-- portfolio_phi -->
				<p>
					<label for="<?php echo $this->get_field_id( 'portfolio_phi' ); ?>"><?php echo __( 'Angle:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'portfolio_phi' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_phi' ); ?>" value="<?php echo esc_attr( $portfolio_phi ); ?>">
				</p>
				<!-- end portfolio_phi -->
				
				<!-- portfolio_scale -->
				<p>
					<label for="<?php echo $this->get_field_id( 'portfolio_scale' ); ?>" title="Required" style="font-weight: bold; color: red;"><?php echo __( 'Scale:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'portfolio_scale' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_scale' ); ?>" value="<?php echo esc_attr( $portfolio_scale ); ?>">
				</p>
				<!-- end portfolio_scale -->
				
				<!-- portfolio_rotate -->
				<p>
					<label for="<?php echo $this->get_field_id( 'portfolio_rotate' ); ?>" title="Required" style="font-weight: bold; color: red;"><?php echo __( 'Rotate:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'portfolio_rotate' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_rotate' ); ?>" value="<?php echo esc_attr( $portfolio_rotate ); ?>">
				</p>
				<!-- end portfolio_rotate -->
				
				<!-- portfolio_rotate_x -->
				<p>
					<label for="<?php echo $this->get_field_id( 'portfolio_rotate_x' ); ?>"><?php echo __( 'Rotate X-Axis:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'portfolio_rotate_x' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_rotate_x' ); ?>" value="<?php echo esc_attr( $portfolio_rotate_x ); ?>">
				</p>
				<!-- end portfolio_rotate_x -->
				
				<!-- portfolio_rotate_y -->
				<p>
					<label for="<?php echo $this->get_field_id( 'portfolio_rotate_y' ); ?>"><?php echo __( 'Rotate Y-Axis:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'portfolio_rotate_y' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_rotate_y' ); ?>" value="<?php echo esc_attr( $portfolio_rotate_y ); ?>">
				</p>
				<!-- end portfolio_rotate_y -->
				
				<!-- portfolio_rotate_z -->
				<p>
					<label for="<?php echo $this->get_field_id( 'portfolio_rotate_z' ); ?>"><?php echo __( 'Rotate Z-Axis:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'portfolio_rotate_z' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_rotate_z' ); ?>" value="<?php echo esc_attr( $portfolio_rotate_z ); ?>">
				</p>
				<!-- end portfolio_rotate_z -->
			<?php
		}
		// end form
		
		
		public function update( $new_instance, $old_instance )
		{
			$instance = array();
			
			$instance['title'] = strip_tags( $new_instance['title'] );
			
			$instance['slug'] = strip_tags( $new_instance['slug'] );
			
			update_option( 'portfolio_slug', strip_tags( $new_instance['slug'] ) );
			
			$instance['portfolio_editor_content'] = strip_tags( $new_instance['portfolio_editor_content'] );
			
			$instance['portfolio_top_content'] = strip_tags( $new_instance['portfolio_top_content'] );
			
			$instance['portfolio_x'] = strip_tags( $new_instance['portfolio_x'] );
			
			$instance['portfolio_y'] = strip_tags( $new_instance['portfolio_y'] );
			
			$instance['portfolio_z'] = strip_tags( $new_instance['portfolio_z'] );
			
			$instance['portfolio_r'] = strip_tags( $new_instance['portfolio_r'] );
			
			$instance['portfolio_phi'] = strip_tags( $new_instance['portfolio_phi'] );
			
			$instance['portfolio_scale'] = strip_tags( $new_instance['portfolio_scale'] );
			
			$instance['portfolio_rotate'] = strip_tags( $new_instance['portfolio_rotate'] );
			
			$instance['portfolio_rotate_x'] = strip_tags( $new_instance['portfolio_rotate_x'] );
			
			$instance['portfolio_rotate_y'] = strip_tags( $new_instance['portfolio_rotate_y'] );
			
			$instance['portfolio_rotate_z'] = strip_tags( $new_instance['portfolio_rotate_z'] );
			
			return $instance;
		}
		// end update
		
		
		public function widget( $args, $instance )
		{
			extract( $args );
			
			$title = apply_filters( 'widget_title', $instance['title'] );
			
			$slug = apply_filters( 'widget_slug', $instance['slug'] );
			
			$portfolio_editor_content = apply_filters( 'widget_editor_content', $instance['portfolio_editor_content'] );
			
			$portfolio_top_content = apply_filters( 'widget_top_content', $instance['portfolio_top_content'] );
			
			$portfolio_x = apply_filters( 'widget_portfolio_x', $instance['portfolio_x'] );
			
			$portfolio_y = apply_filters( 'widget_portfolio_y', $instance['portfolio_y'] );
			
			$portfolio_z = apply_filters( 'widget_portfolio_z', $instance['portfolio_z'] );
			
			$portfolio_r = apply_filters( 'widget_portfolio_r', $instance['portfolio_r'] );
			
			$portfolio_phi = apply_filters( 'widget_portfolio_phi', $instance['portfolio_phi'] );
			
			$portfolio_scale = apply_filters( 'widget_portfolio_scale', $instance['portfolio_scale'] );
			
			$portfolio_rotate = apply_filters( 'widget_portfolio_rotate', $instance['portfolio_rotate'] );
			
			$portfolio_rotate_x = apply_filters( 'widget_portfolio_rotate_x', $instance['portfolio_rotate_x'] );
			
			$portfolio_rotate_y = apply_filters( 'widget_portfolio_rotate_y', $instance['portfolio_rotate_y'] );
			
			$portfolio_rotate_z = apply_filters( 'widget_portfolio_rotate_z', $instance['portfolio_rotate_z'] );
			
			echo $before_widget;
			
			if ( ! empty( $title ) )
			{
				// echo $before_title . $title . $after_title;
			}
			
			/* ------------------------------------------------------------------------------------ */
			
			?>
				<!-- PAGE : PORTFOLIO -->
				<section id="<?php echo $slug; ?>" class="page wrapper portfolio" data-x="<?php echo $portfolio_x; ?>" data-y="<?php echo $portfolio_y; ?>" data-z="<?php echo $portfolio_z; ?>" data-r="<?php echo $portfolio_r; ?>" data-phi="<?php echo $portfolio_phi; ?>" data-scale="<?php echo $portfolio_scale; ?>" data-rotate="<?php echo $portfolio_rotate; ?>" data-rotate-x="<?php echo $portfolio_rotate_x; ?>" data-rotate-y="<?php echo $portfolio_rotate_y; ?>" data-rotate-z="<?php echo $portfolio_rotate_z; ?>">
					
					<!-- PAGE TITLE -->
					<h2 class="caption"><span><?php echo $title; ?></span></h2>
					
					<div class="iscroll-wrapper">
						<div class="scroller container">
							<!-- FILTERS -->
							<ul id="filters">
								<?php
									$pf_terms = get_categories( 'type=portfolio&taxonomy=department' );
								
									if ( count( $pf_terms ) >= 2 )
									{
										?>
											<li class="current pf-all-items">
												<a href="#" data-filter="*"><?php echo __( 'all', 'impressivcard' ); ?></a>
											</li>
										<?php
									}
									
									foreach ( $pf_terms as $pf_term ) :
										?>
											<li>
												<a href="#" data-filter=".<?php echo $pf_term->slug; ?>"><?php echo $pf_term->name; ?></a>
											</li>
										<?php
									endforeach;
								?>
							</ul>
							<!-- end FILTERS -->
							
							<?php
								if ( $portfolio_editor_content )
								{
									if ( $portfolio_top_content )
									{
										?>
											<div class="row">
												<?php
													$args_pf_content = 'pagename=' . $slug;
													$loop_pf_content = new WP_Query( $args_pf_content );
													
													if ( $loop_pf_content->have_posts() ) :
														while ( $loop_pf_content->have_posts() ) : $loop_pf_content->the_post();
														
															the_content();
														
														endwhile;
													endif;
													wp_reset_query();
												?>
											</div>
											<!-- end row -->
										<?php
									}
									// end if $portfolio_top_content
								}
								// end if $portfolio_editor_content
							?>
							
							<!-- PORTFOLIO -->
							<div id="portfolio-items" class="portfolio-items">
								<?php
									$args_portfolio = array( 'post_type' => 'portfolio', 'posts_per_page' => -1 );
									$loop_portfolio = new WP_Query( $args_portfolio );
									
									if ( $loop_portfolio->have_posts() ) :
										while ( $loop_portfolio->have_posts() ) : $loop_portfolio->the_post();
											
											$terms = get_the_terms( get_the_ID(), 'department' );
											$on_draught = '';
											
											if ( $terms && ! is_wp_error( $terms ) ) :
												
												$draught_links = array();

												foreach ( $terms as $term )
												{
													$draught_links[] = $term->slug;
												}
										
												$on_draught = join( " ", $draught_links );
												
											endif;
											
											?>
										
											<div id="post-<?php the_ID(); ?>" <?php post_class( 'item ' . $on_draught ); ?>>
												<div class="media-box">
													<?php
														if ( has_post_thumbnail() )
														{
															the_post_thumbnail( 'full', array( 'alt' => get_the_title(), 'title' => "" ) );
														}
													?>
													
													<div class="mask">
														<h3 class="title"><?php echo __( 'SEE PROJECT DETAILS', 'impressivcard' ); ?></h3>
														
														<?php
															if ( get_option( get_the_ID() . 'pf_direct_url' ) != "" )
															{
																if ( get_option( get_the_ID() . 'pf_url_new_tab' ) )
																{
																	$pf_url_new_tab = '_blank';
																}
																else
																{
																	$pf_url_new_tab = "";
																}
																
																echo '<a class="ico" target="' . $pf_url_new_tab . '" href="' . get_option( get_the_ID() . 'pf_direct_url' ) . '"></a>';
															}
															else
															{
																if ( get_option( get_the_ID() . 'portfoio_type2' ) )
																{
																	the_content();
																}
																else
																{
																	echo '<a class="ico ajax" href="' . get_permalink() . '"></a>';
																}
															}
														?>
													</div>
													<!-- end mask -->
												</div>
												<!-- end media-box -->
												
												<h3 class="project-title"><?php the_title(); ?></h3>
												
												<p class="category"><?php echo stripcslashes( get_option( get_the_ID() . 'short_description' ) ); ?></p>
											</div>
											<!-- end item -->
										<?php
										endwhile;
									endif;
									wp_reset_query();
								?>
							</div>
							<!-- end PORTFOLIO -->
							
							<?php
								if ( $portfolio_editor_content )
								{
									if ( ! $portfolio_top_content )
									{
										?>
											<div class="row">
												<?php
													$args_pf_content = 'pagename=' . $slug;
													$loop_pf_content = new WP_Query( $args_pf_content );
													
													if ( $loop_pf_content->have_posts() ) :
														while ( $loop_pf_content->have_posts() ) : $loop_pf_content->the_post();
														
															the_content();
														
														endwhile;
													endif;
													wp_reset_query();
												?>
											</div>
											<!-- end row -->
										<?php
									}
									// end if $portfolio_top_content
								}
								// end if $portfolio_editor_content
							?>
						</div>
						<!--end scroller-->
					</div>
					<!--iscroll-wrapper-->
				</section>
				<!-- PAGE : PORTFOLIO -->
			<?php

			/* ------------------------------------------------------------------------------------ */
			
			echo $after_widget;
		}
		// end widget
	}
	// end Portfolio_Widget

	add_action( 'widgets_init', create_function( '', 'register_widget( "portfolio_widget" );' ) );

/* ============================================================================================================================================= */

	class Blog_Widget extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct('blog_widget',
								__( 'impressivCard - Blog Page', 'impressivcard' ),
								array( 'description' => __( 'Your latest posts.', 'impressivcard' ) ) );
		}
		// end __construct
		
		
		public function form( $instance )
		{
			if ( isset( $instance[ 'title' ] ) ) { $title = $instance[ 'title' ]; } else { $title = ""; }
			
			if ( isset( $instance[ 'slug' ] ) ) { $slug = $instance[ 'slug' ]; } else { $slug = ""; }
			
			if ( isset( $instance[ 'portfolio_editor_content' ] ) ) { $portfolio_editor_content = $instance[ 'portfolio_editor_content' ]; } else { $portfolio_editor_content = false; }
			
			if ( isset( $instance[ 'portfolio_top_content' ] ) ) { $portfolio_top_content = $instance[ 'portfolio_top_content' ]; } else { $portfolio_top_content = false; }
			
			if ( isset( $instance[ 'portfolio_x' ] ) ) { $portfolio_x = $instance[ 'portfolio_x' ]; } else { $portfolio_x = ""; }
			
			if ( isset( $instance[ 'portfolio_y' ] ) ) { $portfolio_y = $instance[ 'portfolio_y' ]; } else { $portfolio_y = ""; }
			
			if ( isset( $instance[ 'portfolio_z' ] ) ) { $portfolio_z = $instance[ 'portfolio_z' ]; } else { $portfolio_z = ""; }
			
			if ( isset( $instance[ 'portfolio_r' ] ) ) { $portfolio_r = $instance[ 'portfolio_r' ]; } else { $portfolio_r = ""; }
			
			if ( isset( $instance[ 'portfolio_phi' ] ) ) { $portfolio_phi = $instance[ 'portfolio_phi' ]; } else { $portfolio_phi = ""; }

			if ( isset( $instance[ 'portfolio_scale' ] ) ) { $portfolio_scale = $instance[ 'portfolio_scale' ]; } else { $portfolio_scale = ""; }
			
			if ( isset( $instance[ 'portfolio_rotate' ] ) ) { $portfolio_rotate = $instance[ 'portfolio_rotate' ]; } else { $portfolio_rotate = ""; }
			
			if ( isset( $instance[ 'portfolio_rotate_x' ] ) ) { $portfolio_rotate_x = $instance[ 'portfolio_rotate_x' ]; } else { $portfolio_rotate_x = ""; }
			
			if ( isset( $instance[ 'portfolio_rotate_y' ] ) ) { $portfolio_rotate_y = $instance[ 'portfolio_rotate_y' ]; } else { $portfolio_rotate_y = ""; }
			
			if ( isset( $instance[ 'portfolio_rotate_z' ] ) ) { $portfolio_rotate_z = $instance[ 'portfolio_rotate_z' ]; } else { $portfolio_rotate_z = ""; }
			
			?>
				<!-- slug -->
				<p>
					<label for="<?php echo $this->get_field_id( 'slug' ); ?>"><?php echo __( 'All Pages:', 'impressivcard' ); ?></label>
					
					<select id="<?php echo $this->get_field_id( 'slug' ); ?>" name="<?php echo $this->get_field_name( 'slug' ); ?>" class="widefat">
						<option></option>
						
						<?php
							$pages = get_pages();
							
							foreach ( $pages as $page )
							{
								if ( $slug == $page->post_name )
								{
									$option = '<option selected="selected" value="' . $page->post_name . '">' . $page->post_title . '</option>';
									
									echo $option;
								}
								else
								{
									$option = '<option value="' . $page->post_name . '">' . $page->post_title . '</option>';
									
									echo $option;
								}
								// end if
							}
							// end for
						?>
					</select>
				</p>
				<!-- end slug -->
				
				<!-- title -->
				<p>
					<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __( 'Page Title:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>">
				</p>
				<!-- end title -->
				
				<hr>
				<hr>
				
				<!-- Activate content editor -->
				<p>
					<label><input type="checkbox" id="<?php echo $this->get_field_id( 'portfolio_editor_content' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_editor_content' ); ?>" <?php if ( $portfolio_editor_content ) { echo 'checked="checked"'; } ?> value="portfolio_editor_content"> Activate content editor</label>
				</p>
				<!-- end Activate content editor -->
				
				<!-- Show content on the top -->
				<p>
					<label><input type="checkbox" id="<?php echo $this->get_field_id( 'portfolio_top_content' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_top_content' ); ?>" <?php if ( $portfolio_top_content ) { echo 'checked="checked"'; } ?>> Show content editor on the top</label>
				</p>
				<!-- end Show content on the top -->
				
				<hr>
				<hr>
				
				<h4 style="text-align: center;"><?php echo __( 'Parameters', 'impressivcard' ); ?></h4>
				
				<!-- portfolio_x -->
				<p>
					<label for="<?php echo $this->get_field_id( 'portfolio_x' ); ?>" title="Required" style="font-weight: bold; color: red;"><?php echo __( 'X-Axis:', 'impressivcard' ); ?></label>
					
					<input type="text" id="<?php echo $this->get_field_id( 'portfolio_x' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_x' ); ?>" class="widefat" value="<?php echo esc_attr( $portfolio_x ); ?>">
				</p>
				<!-- end portfolio_x -->
				
				<!-- portfolio_y -->
				<p>
					<label for="<?php echo $this->get_field_id( 'portfolio_y' ); ?>" title="Required" style="font-weight: bold; color: red;"><?php echo __( 'Y-Axis:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'portfolio_y' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_y' ); ?>" value="<?php echo esc_attr( $portfolio_y ); ?>">
				</p>
				<!-- end portfolio_y -->
				
				<!-- portfolio_z -->
				<p>
					<label for="<?php echo $this->get_field_id( 'portfolio_z' ); ?>"><?php echo __( 'Z-Axis:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'portfolio_z' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_z' ); ?>" value="<?php echo esc_attr( $portfolio_z ); ?>">
				</p>
				<!-- end portfolio_z -->
				
				<!-- portfolio_r -->
				<p>
					<label for="<?php echo $this->get_field_id( 'portfolio_r' ); ?>"><?php echo __( 'Radius:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'portfolio_r' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_r' ); ?>" value="<?php echo esc_attr( $portfolio_r ); ?>">
				</p>
				<!-- end portfolio_r -->
				
				<!-- portfolio_phi -->
				<p>
					<label for="<?php echo $this->get_field_id( 'portfolio_phi' ); ?>"><?php echo __( 'Angle:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'portfolio_phi' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_phi' ); ?>" value="<?php echo esc_attr( $portfolio_phi ); ?>">
				</p>
				<!-- end portfolio_phi -->
				
				<!-- portfolio_scale -->
				<p>
					<label for="<?php echo $this->get_field_id( 'portfolio_scale' ); ?>" title="Required" style="font-weight: bold; color: red;"><?php echo __( 'Scale:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'portfolio_scale' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_scale' ); ?>" value="<?php echo esc_attr( $portfolio_scale ); ?>">
				</p>
				<!-- end portfolio_scale -->
				
				<!-- portfolio_rotate -->
				<p>
					<label for="<?php echo $this->get_field_id( 'portfolio_rotate' ); ?>" title="Required" style="font-weight: bold; color: red;"><?php echo __( 'Rotate:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'portfolio_rotate' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_rotate' ); ?>" value="<?php echo esc_attr( $portfolio_rotate ); ?>">
				</p>
				<!-- end portfolio_rotate -->
				
				<!-- portfolio_rotate_x -->
				<p>
					<label for="<?php echo $this->get_field_id( 'portfolio_rotate_x' ); ?>"><?php echo __( 'Rotate X-Axis:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'portfolio_rotate_x' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_rotate_x' ); ?>" value="<?php echo esc_attr( $portfolio_rotate_x ); ?>">
				</p>
				<!-- end portfolio_rotate_x -->
				
				<!-- portfolio_rotate_y -->
				<p>
					<label for="<?php echo $this->get_field_id( 'portfolio_rotate_y' ); ?>"><?php echo __( 'Rotate Y-Axis:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'portfolio_rotate_y' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_rotate_y' ); ?>" value="<?php echo esc_attr( $portfolio_rotate_y ); ?>">
				</p>
				<!-- end portfolio_rotate_y -->
				
				<!-- portfolio_rotate_z -->
				<p>
					<label for="<?php echo $this->get_field_id( 'portfolio_rotate_z' ); ?>"><?php echo __( 'Rotate Z-Axis:', 'impressivcard' ); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'portfolio_rotate_z' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_rotate_z' ); ?>" value="<?php echo esc_attr( $portfolio_rotate_z ); ?>">
				</p>
				<!-- end portfolio_rotate_z -->
			<?php
		}
		// end form
		
		
		public function update( $new_instance, $old_instance )
		{
			$instance = array();
			
			$instance['title'] = strip_tags( $new_instance['title'] );
			
			$instance['slug'] = strip_tags( $new_instance['slug'] );
			
			update_option( 'portfolio_slug', strip_tags( $new_instance['slug'] ) );
			
			$instance['portfolio_editor_content'] = strip_tags( $new_instance['portfolio_editor_content'] );
			
			$instance['portfolio_top_content'] = strip_tags( $new_instance['portfolio_top_content'] );
			
			$instance['portfolio_x'] = strip_tags( $new_instance['portfolio_x'] );
			
			$instance['portfolio_y'] = strip_tags( $new_instance['portfolio_y'] );
			
			$instance['portfolio_z'] = strip_tags( $new_instance['portfolio_z'] );
			
			$instance['portfolio_r'] = strip_tags( $new_instance['portfolio_r'] );
			
			$instance['portfolio_phi'] = strip_tags( $new_instance['portfolio_phi'] );
			
			$instance['portfolio_scale'] = strip_tags( $new_instance['portfolio_scale'] );
			
			$instance['portfolio_rotate'] = strip_tags( $new_instance['portfolio_rotate'] );
			
			$instance['portfolio_rotate_x'] = strip_tags( $new_instance['portfolio_rotate_x'] );
			
			$instance['portfolio_rotate_y'] = strip_tags( $new_instance['portfolio_rotate_y'] );
			
			$instance['portfolio_rotate_z'] = strip_tags( $new_instance['portfolio_rotate_z'] );
			
			return $instance;
		}
		// end update
		
		
		public function widget( $args, $instance )
		{
			extract( $args );
			
			$title = apply_filters( 'widget_title', $instance['title'] );
			
			$slug = apply_filters( 'widget_slug', $instance['slug'] );
			
			$portfolio_editor_content = apply_filters( 'widget_editor_content', $instance['portfolio_editor_content'] );
			
			$portfolio_top_content = apply_filters( 'widget_top_content', $instance['portfolio_top_content'] );
			
			$portfolio_x = apply_filters( 'widget_portfolio_x', $instance['portfolio_x'] );
			
			$portfolio_y = apply_filters( 'widget_portfolio_y', $instance['portfolio_y'] );
			
			$portfolio_z = apply_filters( 'widget_portfolio_z', $instance['portfolio_z'] );
			
			$portfolio_r = apply_filters( 'widget_portfolio_r', $instance['portfolio_r'] );
			
			$portfolio_phi = apply_filters( 'widget_portfolio_phi', $instance['portfolio_phi'] );
			
			$portfolio_scale = apply_filters( 'widget_portfolio_scale', $instance['portfolio_scale'] );
			
			$portfolio_rotate = apply_filters( 'widget_portfolio_rotate', $instance['portfolio_rotate'] );
			
			$portfolio_rotate_x = apply_filters( 'widget_portfolio_rotate_x', $instance['portfolio_rotate_x'] );
			
			$portfolio_rotate_y = apply_filters( 'widget_portfolio_rotate_y', $instance['portfolio_rotate_y'] );
			
			$portfolio_rotate_z = apply_filters( 'widget_portfolio_rotate_z', $instance['portfolio_rotate_z'] );
			
			echo $before_widget;
			
			if ( ! empty( $title ) )
			{
				// echo $before_title . $title . $after_title;
			}
			
			?>
				<!-- PAGE: BLOG -->
				<section id="<?php echo $slug; ?>" class="page wrapper portfolio" data-x="<?php echo $portfolio_x; ?>" data-y="<?php echo $portfolio_y; ?>" data-z="<?php echo $portfolio_z; ?>" data-r="<?php echo $portfolio_r; ?>" data-phi="<?php echo $portfolio_phi; ?>" data-scale="<?php echo $portfolio_scale; ?>" data-rotate="<?php echo $portfolio_rotate; ?>" data-rotate-x="<?php echo $portfolio_rotate_x; ?>" data-rotate-y="<?php echo $portfolio_rotate_y; ?>" data-rotate-z="<?php echo $portfolio_rotate_z; ?>">
					
					<!-- PAGE TITLE -->
					<h2 class="caption"><span><?php echo $title; ?></span></h2>
					
					<div class="iscroll-wrapper">
						<div class="scroller container">
							<?php
								if ( $portfolio_editor_content )
								{
									if ( $portfolio_top_content )
									{
										?>
											<div class="row">
												<?php
													$args_pf_content = 'pagename=' . $slug;
													$loop_pf_content = new WP_Query( $args_pf_content );
													
													if ( $loop_pf_content->have_posts() ) :
														while ( $loop_pf_content->have_posts() ) : $loop_pf_content->the_post();
														
															the_content();
														
														endwhile;
													endif;
													wp_reset_query();
												?>
											</div>
											<!-- end row -->
										<?php
									}
									// end if
								}
								// end if
							?>
							
							<!-- POSTS -->
							<div id="portfolio-items" class="portfolio-items">
								<?php
									$args_portfolio = array( 'post_type' => 'post', 'posts_per_page' => 15 );
									$loop_portfolio = new WP_Query( $args_portfolio );
									
									if ( $loop_portfolio->have_posts() ) :
										while ( $loop_portfolio->have_posts() ) : $loop_portfolio->the_post();
											
											$terms = get_the_terms( get_the_ID(), 'department' );
											$on_draught = '';
											
											if ( $terms && ! is_wp_error( $terms ) ) :
												
												$draught_links = array();

												foreach ( $terms as $term )
												{
													$draught_links[] = $term->slug;
												}
										
												$on_draught = join( " ", $draught_links );
												
											endif;
											
											?>
											
											<?php
												if ( has_post_thumbnail() )
												{
													?>
														<div id="post-<?php the_ID(); ?>" <?php post_class( 'item ' . $on_draught ); ?>>
															<div class="media-box">
																<?php
																	the_post_thumbnail( 'full', array( 'alt' => get_the_title(), 'title' => "" ) );
																?>
																
																<!--
																<div class="mask">
																	<h3 class="title"><?php echo __( 'SEE POST DETAILS', 'impressivcard' ); ?></h3>
																	
																	<?php
																		if ( get_option( get_the_ID() . 'pf_direct_url' ) != "" )
																		{
																			if ( get_option( get_the_ID() . 'pf_url_new_tab' ) )
																			{
																				$pf_url_new_tab = '_blank';
																			}
																			else
																			{
																				$pf_url_new_tab = "";
																			}
																			
																			echo '<a class="ico" target="' . $pf_url_new_tab . '" href="' . get_option( get_the_ID() . 'pf_direct_url' ) . '"></a>';
																		}
																		else
																		{
																			if ( get_option( get_the_ID() . 'portfoio_type2' ) )
																			{
																				the_content();
																			}
																			else
																			{
																				echo '<a class="ico ajax" href="' . get_permalink() . '"></a>';
																			}
																		}
																		// end if
																	?>
																</div>
																-->
															</div>
															<!-- end media-box -->
															
															<h3 class="project-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
															
															<!--
															<p class="category"><?php the_category( ', ' ); ?></p>
															-->
														</div>
														<!-- end item -->
													<?php
												}
												// end if
											?>
											
											<?php
										endwhile;
									endif;
									wp_reset_query();
								?>
							</div>
							<!-- end POSTS -->
							
							<?php
								if ( $portfolio_editor_content )
								{
									if ( ! $portfolio_top_content )
									{
										?>
											<div class="row">
												<?php
													$args_pf_content = 'pagename=' . $slug;
													$loop_pf_content = new WP_Query( $args_pf_content );
													
													if ( $loop_pf_content->have_posts() ) :
														while ( $loop_pf_content->have_posts() ) : $loop_pf_content->the_post();
														
															the_content();
														
														endwhile;
													endif;
													wp_reset_query();
												?>
											</div>
											<!-- end row -->
										<?php
									}
									// end if
								}
								// end if
							?>
							
							<?php
								// get_template_part( 'part', 'pagination' );
							?>
						</div>
						<!-- end scroller -->
					</div>
					<!-- end iscroll-wrapper -->
				</section>
				<!-- end PAGE: BLOG -->
			<?php
			
			echo $after_widget;
		}
		// end widget
	}
	// end Blog_Widget

	add_action( 'widgets_init', create_function( '', 'register_widget( "blog_widget" );' ) );

/* ============================================================================================================================================= */

	function my_formatter( $content )
	{
		$new_content = "";
		$pattern_full = '{(\[raw\].*?\[/raw\])}is';
		$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
		$pieces = preg_split( $pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE );

		foreach ( $pieces as $piece )
		{
			if ( preg_match( $pattern_contents, $piece, $matches ) )
			{
				$new_content .= $matches[1];
			}
			else
			{
				$new_content .= wptexturize( wpautop( $piece ) );
			}
		}
		
		return $new_content;
	}
	// end my_formatter
	
	remove_filter( 'the_content', 'wpautop' );
	remove_filter( 'the_content', 'wptexturize' );
	
	add_filter( 'the_content', 'my_formatter', 99 );
	add_filter( 'widget_text', 'my_formatter', 99 );
	
/* ============================================================================================================================================= */
	
	add_filter( 'the_excerpt', 'do_shortcode' );
	add_filter( 'widget_text', 'do_shortcode' );
	
/* ============================================================================================================================================= */

	function row( $atts, $content = "" )
	{
		$row =  '<div class="row">' . do_shortcode( $content ) . '</div>';
		
		return $row;
	}
  
	add_shortcode( 'row', 'row' );

/* ============================================================================================================================================= */

	function column( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'width' => "",
										'offset' => "" ), $atts ) );
									
		$column =  '<div class="span' . $width . ' offset' . $offset . '">' . do_shortcode( $content ) . '</div>';
		
		return $column;
	}
  
	add_shortcode( 'column', 'column' );

/* ============================================================================================================================================= */

	function profile_images( $atts, $content = "" )
	{
		$profile_images =  '<div id="te-wrapper" class="te-wrapper profile-image"><div class="te-images">' . do_shortcode( $content ) . '</div><div class="te-cover"></div><div class="te-transition"><div class="te-card"><div class="te-front"></div><div class="te-back"></div></div></div></div>';
		
		return $profile_images;
	}
  
	add_shortcode( 'profile_images', 'profile_images' );

/* ============================================================================================================================================= */

	function profile_image( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'alt' => "",
										'title' => "",
										'src' => "" ), $atts ) );
								
		$profile_image =  '<img alt="' . $alt . '" title="' . $title . '" src="' . $src . '">';
		
		return $profile_image;
	}
  
	add_shortcode( 'profile_image', 'profile_image' );

/* ============================================================================================================================================= */

	function label( $atts, $content = "" )
	{
		$label =  '<span class="label primary">' . do_shortcode( $content ) . '</span>';
		
		return $label;
	}
  
	add_shortcode( 'label', 'label' );

/* ============================================================================================================================================= */

	function social_icons( $atts, $content = "" )
	{
		$social_icons =  '<ul class="social">' . do_shortcode( $content ) . '</ul>';
		
		return $social_icons;
	}
  
	add_shortcode( 'social_icons', 'social_icons' );

/* ============================================================================================================================================= */

	function social_icon( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'type' => "",
										'title' => "",
										'url' => "" ), $atts ) );
										
		$type_icon = "";
		
		if ( $type == 'facebook' )
		{
			$type_icon = '&#88;';
		}
		elseif ( $type == 'twitter' )
		{
			$type_icon = '&#95;';
		}
		elseif ( $type == 'linkedin' )
		{
			$type_icon = '&#118;';
		}
		elseif ( $type == 'flickr' )
		{
			$type_icon = '&#98;';
		}
		elseif ( $type == 'dribble' )
		{
			$type_icon = '&#83;';
		}
		elseif ( $type == 'dribbble' )
		{
			$type_icon = '&#83;';
		}
		elseif ( $type == 'lastfm' )
		{
			$type_icon = '&#117;';
		}
		elseif ( $type == 'rss' )
		{
			$type_icon = '&#42;';
		}
		elseif ( $type == 'forrst' )
		{
			$type_icon = '&#100;';
		}
		elseif ( $type == 'skype' )
		{
			$type_icon = '&#58;';
		}
		elseif ( $type == 'picassa' )
		{
			$type_icon = '&#56;';
		}
		elseif ( $type == 'youtube' )
		{
			$type_icon = '&#39;';
		}
		elseif ( $type == 'google' )
		{
			$type_icon = '&#107;';
		}
		elseif ( $type == 'vimeo' )
		{
			$type_icon = '&#33;';
		}
		elseif ( $type == 'behance' )
		{
			$type_icon = '&#71;';
		}
		elseif ( $type == 'tumblr' )
		{
			$type_icon = '&#92;';
		}
		elseif ( $type == 'blogger' )
		{
			$type_icon = '&#74;';
		}
		elseif ( $type == 'delicious' )
		{
			$type_icon = '&#76;';
		}
		elseif ( $type == 'digg' )
		{
			$type_icon = '&#81;';
		}
		elseif ( $type == 'friendfeed' )
		{
			$type_icon = '&#102;';
		}
		elseif ( $type == 'github' )
		{
			$type_icon = '&#106;';
		}
		elseif ( $type == 'wordpress' )
		{
			$type_icon = '$';
		}
		elseif ( $type == 'pinterest' )
		{
			$type_icon = 'P';
		}
		elseif ( $type == 'soundcloud' )
		{
			$type_icon = 'S';
		}
		
		$social_icon =  '<li><a target="_blank" class="' . $type . '" title="' . $title . '" href="' . $url . '">' . $type_icon . '</a></li>';
		
		return $social_icon;
	}
	// end social_icon
	
	add_shortcode( 'social_icon', 'social_icon' );

/* ============================================================================================================================================= */
	
	function personal_infos( $atts, $content = "" )
	{
		$personal_infos =  '<ul class="personal-info">' . do_shortcode( $content ) . '</ul>';
		
		return $personal_infos;
	}

	add_shortcode( 'personal_infos', 'personal_infos' );

/* ============================================================================================================================================= */

	function personal_info( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'title' => "" ), $atts ) );
		
		$personal_info =  '<li><span class="title">' . $title . '</span><span class="value">' . do_shortcode( $content ) . '</span></li>';
		
		return $personal_info;
	}

	add_shortcode( 'personal_info', 'personal_info' );
	
/* ============================================================================================================================================= */

	function resume_group( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'title' => "" ), $atts ) );
		
		if ( $title != "" )
		{
			$title_out = '<h3><span class="label black">' . $title . '</span></h3>';
		}
		else
		{
			$title_out = '';
		}
		
		$resume_group =  '<div class="history-group">' . $title_out . '' . do_shortcode( $content ) . '</div>';
		
		return $resume_group;
	}

	add_shortcode( 'resume_group', 'resume_group' );

/* ============================================================================================================================================= */

	function history_unit( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'position' => "",
										'company' => "",
										'year' => "" ), $atts ) );
		
		$history_unit =  '<div class="history-unit"><h4>' . $position . '<span class="work-time">' . $year . '</span></h4><h5>' . $company . '</h5><p>' . do_shortcode( $content ) . '</p></div>';
		
		return $history_unit;
	}

	add_shortcode( 'history_unit', 'history_unit' );

/* ============================================================================================================================================= */

	function skill_unit( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'progress' => "" ), $atts ) );
		
		$skill_unit =  '<div class="history-unit"><h4>' . do_shortcode( $content ) . '</h4><div class="bar" data-percent="' . $progress . '"><div class="progress"></div></div></div>';
		
		return $skill_unit;
	}

	add_shortcode( 'skill_unit', 'skill_unit' );

/* ============================================================================================================================================= */

	function cv_button( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'text' => "",
										'url' => "",
										'target' => "" ), $atts ) );
		
		$cv_button =  '<div class="launch cv"><a class="btn" target="' . $target . '" href="' . $url . '">' . $text . '</a></div>';
		
		return $cv_button;
	}
	
	add_shortcode( 'cv_button', 'cv_button' );

/* ============================================================================================================================================= */

	function map( $atts, $content = "" )
	{	
		$map =  '<div class="map">' . do_shortcode( $content ) . '</div>';
		
		return $map;
	}

	add_shortcode( 'map', 'map' );

/* ============================================================================================================================================= */

	function contact_form( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'to' => "",
										'subject' => "",
										'captcha' => "" ), $atts ) );
										
		if ( $subject == 'yes' )
		{
			$subject_field = '<li><label class="title" for="subject">' . __( 'SUBJECT', 'impressivcard' ) . '</label><input class="text required" id="subject" name="subject" type="text" placeholder="' . __( 'Subject.', 'impressivcard' ) . '"></li>';
			$subject_default = "";
		}
		elseif ( ( $subject != 'yes' ) && ( $subject != "" ) )
		{
			$subject_field = "";
			$subject_default = '<input type="hidden" id="subject" name="subject" value="' . $subject . '">';
		}
		else
		{
			$subject_field = "";
			$subject_default = '<input type="hidden" id="subject" name="subject" value="' . __( 'Contact form message from your', 'impressivcard' ) . ' ' . get_bloginfo( 'name' ) . ' ' . __( 'site', 'impressivcard' ) . '">';
		}
		// end if
		
		
		$captcha_out = "";
		
		if ( $captcha == "yes" )
		{
			$random1 = rand(1, 5);
			$random2 = rand(1, 5);
			$sum_random = $random1 + $random2;
		
			$captcha_out = '<li><label class="title" for="sum_user">' . $random1 . ' + ' . $random2 . ' = ?</label><input type="text" class="text required" id="sum_user" name="sum_user" placeholder="' . __( 'What is the sum?', 'impressivcard' ) . '"><input type="hidden" id="sum_random" name="sum_random" value="' . $sum_random . '"></li>';
		}
		// end if
		
		
		// Get the site domain and get rid of www.
		$sitename = strtolower( $_SERVER['SERVER_NAME'] );
		
		if ( substr( $sitename, 0, 4 ) == 'www.' )
		{
			$sitename = substr( $sitename, 4 );
		}
		
		$sender_domain = 'wordpress@' . $sitename;
		
		
		$contact_form = '<form id="contact-form" action="' . get_template_directory_uri() . '/send-mail.php" method="post" class="validate-form"><fieldset><input type="hidden" id="sender_domain" name="sender_domain" value="' . $sender_domain . '"><input type="hidden" id="to" name="to" value="' . $to . '">' . $subject_default . '<ul class="personal-info contact-form"><li><label class="title" for="name">' . __( 'NAME', 'impressivcard' ) . '</label><input class="text required" id="name" name="name" type="text" placeholder="' . __( 'What is your name?', 'impressivcard' ) . '"></li><li><label class="title" for="email">' . __( 'E-MAIL', 'impressivcard' ) . '</label><input class="text required email" id="email" name="email" type="text" placeholder="' . __( 'So i can get back to you.', 'impressivcard' ) . '"></li>' . $subject_field . '<li><label class="title" for="message">' . __( 'MESSAGE', 'impressivcard' ) . '</label><textarea class="text required" id="message" name="message" placeholder="' . __( 'And your message to me...', 'impressivcard' ) . '"></textarea></li>' . $captcha_out . '<li class="submit-area"><button type="submit" class="btn-send">' . __( 'SEND', 'impressivcard' ) . '</button><input type="hidden" id="submitted" name="submitted" value="true"><span class="icon">&#195;</span></li></ul></fieldset></form>';
		
		return $contact_form;
	}
	// end contact_form
	
	add_shortcode( 'contact_form', 'contact_form' );

/* ============================================================================================================================================= */

	function lightbox( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'video' => "",
										'title' => "",
										'src' => "" ), $atts ) );
										
		if ( $video == 'yes' )
		{
			$video_out = 'iframe';
		}
		else
		{
			$video_out = "";
		}
		
		
		if ( is_single() )
		{
			$lightbox = '<div class="portfolio-field span12">';
			
			if ( $video == 'yes' )
			{
				$lightbox .= '<iframe src="' . $src . '"></iframe>';
			}
			else
			{
				$lightbox .= '<img alt="' . $title . '" src="' . $src . '">';
			}
			
			$lightbox .= '</div>';
		}
		else
		{
			$lightbox = '<a class="lightbox hidden ' . $video_out . '" data-lightbox-gallery="fancybox-' . get_the_ID() . '" title="' . $title . '" href="' . $src . '"></a>';
		}
		
		return $lightbox;
	}
	
	add_shortcode( 'lightbox', 'lightbox' );

/* ============================================================================================================================================= */

	function portfolio_field( $atts, $content = "" )
	{	
		$portfolio_field = '<div class="portfolio-field">' . do_shortcode( $content ) . '</div>';
		
		return $portfolio_field;
	}
	
	add_shortcode( 'portfolio_field', 'portfolio_field' );

/* ============================================================================================================================================= */

	function tags( $atts, $content = "" )
	{	
		$tags = '<ul class="tags">' . do_shortcode( $content ) . '</ul>';
		
		return $tags;
	}
	
	add_shortcode( 'tags', 'tags' );

/* ============================================================================================================================================= */

	function tag( $atts, $content = "" )
	{	
		$tag = '<li><a>' . do_shortcode( $content ) . '</a></li>';
		
		return $tag;
	}
	
	add_shortcode( 'tag', 'tag' );

/* ============================================================================================================================================= */

	function launch_button( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'text' => "",
										'url' => "",
										'target' => "" ), $atts ) );
		
		$launch_button =  '<div class="launch"><a class="btn" target="' . $target . '" href="' . $url . '">' . $text . '</a></div>';
		
		return $launch_button;
	}
	
	add_shortcode( 'launch_button', 'launch_button' );

/* ============================================================================================================================================= */

	function button( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'text' => "",
										'url' => "",
										'target' => "" ), $atts ) );
		
		$button =  '<a class="btn" target="' . $target . '" href="' . $url . '">' . $text . '</a>';
		
		return $button;
	}
	
	add_shortcode( 'button', 'button' );

/* ============================================================================================================================================= */

	function image( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'width' => "",
										'height' => "",
										'alt' => "",
										'title' => "",
										'src' => "" ), $atts ) );
		
		$image =  '<img width="' . $width . '" height="' . $height . '" alt="' . $alt . '" title="' . $title . '" src="' . $src . '">';
		
		return $image;
	}
	
	add_shortcode( 'image', 'image' );

/* ============================================================================================================================================= */

	function inline_video( $atts, $content = "" )
	{
		$inline_video = '<div class="video-wrap">' . do_shortcode( $content ) . '</div>';
		
		return $inline_video;
	}
	
	add_shortcode( 'inline_video', 'inline_video' );

/* ============================================================================================================================================= */

	function twitter_tweets( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'username' => "",
										'count' => '1' ), $atts ) );
		
		$twitter_tweets =  '<aside class="widget widget-twitter">';
		$twitter_tweets .=  '<div id="twitter-list">';
		$twitter_tweets .=  '<ul id="twitter_update_list"></ul>';
		$twitter_tweets .=  '</div>';
		$twitter_tweets .=  '<script src="' . get_template_directory_uri() . '/js/blogger.js"></script>';
		$twitter_tweets .=  '<script src="http://api.twitter.com/1/statuses/user_timeline/' . $username . '.json?callback=twitterCallback2&amp;count=' . $count . '&exclude_replies=true"></script>';
		$twitter_tweets .=  '</aside>';
		
		return $twitter_tweets;
	}
	
	add_shortcode( 'twitter_tweets', 'twitter_tweets' );

/* ============================================================================================================================================= */

	function your_admin_enqueue_scripts()
	{
		// Register style
		wp_register_style( 'adminstyle', get_template_directory_uri() . '/admin/adminstyle.css' );
		// wp_register_style( 'colorpicker', get_template_directory_uri() . '/admin/colorpicker/colorpicker.css' );
		
		
		// Enqueue style
		wp_enqueue_style( 'thickbox' );
		wp_enqueue_style( 'adminstyle' );
		// wp_enqueue_style( 'colorpicker' );
		
		
		// Enqueue script
		wp_enqueue_script( 'thickbox' );
		wp_enqueue_script( 'media-upload' );
	}

	add_action( 'admin_enqueue_scripts', 'your_admin_enqueue_scripts' );

/* ============================================================================================================================================= */

	function colorpicker_css()
	{
		echo '<link rel="stylesheet" media="screen" type="text/css"  href="' . get_template_directory_uri() . '/admin/colorpicker/colorpicker.css" />';
	}
	
	add_action( 'admin_head', 'colorpicker_css' );

/* ============================================================================================================================================= */

	if ( is_admin() )
	{
		include_once 'theme-options.php';
	}

/* ============================================================================================================================================= */

	include_once 'shortcode-generator.php';

/* ============================================================================================================================================= */

	function options_wp_head()
	{
		$custom_css = stripcslashes( get_option( 'custom_css', "" ) );
		
		if ( $custom_css != "" )
		{
			echo '<style type="text/css">' . "\n";
			
				echo $custom_css;
			
			echo "\n" . '</style>' . "\n";
		}
		// end if
		
		
		$external_css = stripcslashes( get_option( 'external_css', "" ) );
		echo $external_css;
		
		
		$tracking_code_head = stripcslashes( get_option( 'tracking_code_head', "" ) );
		echo $tracking_code_head;
	}
	// end options_wp_head
	
	add_action( 'wp_head', 'options_wp_head' );

/* ============================================================================================================================================= */

	function options_wp_footer()
	{
		$tracking_code = stripcslashes( get_option( 'tracking_code', "" ) );
		echo $tracking_code;
	}
	
	add_action( 'wp_footer', 'options_wp_footer' );

/* ============================================================================================================================================= */

?>