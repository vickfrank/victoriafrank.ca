<?php

/* ====================================================================================================================================================== */

	function create_tabs( $current = 'general' )
	{
		$tabs = array(  'general' => 'General',
						'animation' => 'Animation',
						'style' => 'Style',
						'fonts' => 'Fonts',
						'blog' => 'Blog',
						'seo' => 'SEO' );
						
		?>
			<h2 class="nav-tab-wrapper">
				<div id="icon-themes" class="icon32"></div>
				
				<div>
					<h2>Theme Options</h2>
				</div>
				
				<?php
					foreach ( $tabs as $tab => $name )
					{
						$class = ( $tab == $current ) ? ' nav-tab-active' : '';
						
						echo "<a class='nav-tab$class' href='?page=theme-options&tab=$tab'>$name</a>";
						
					}
				?>
			</h2>
			<!-- end .nav-tab-wrapper -->
		<?php
	}
	// end create_tabs

/* ====================================================================================================================================================== */

	function theme_options_page()
	{
		global $pagenow;
		
		?>
		
		<div class="wrap wrap2">
			<script src="<?php echo get_template_directory_uri(); ?>/admin/colorpicker/colorpicker.js"></script>
			
			<div class="status">
				<img width="16" height="16" alt="..." src="<?php echo get_template_directory_uri(); ?>/admin/ajax-loader.gif">
				
				<strong></strong>
			</div>
			<!-- end .status -->
			
			<script>
				jQuery(document).ready( function( $ )
				{
				
				// -------------------------------------------------------------------------
				
					var uploadID = '',
						uploadImg = '';

					jQuery( '.upload-button' ).click(function()
					{
						uploadID = jQuery(this).prev( 'input' );
						uploadImg = jQuery(this).next( 'img' );
						formfield = jQuery( '.upload' ).attr( 'name' );
						tb_show( "", 'media-upload.php?post_id=0&amp;type=image&amp;TB_iframe=true' );
						return false;
					});
					
					window.send_to_editor = function( html )
					{
						imgurl = jQuery( 'img', html ).attr( 'src' );
						uploadID.val( imgurl );
						uploadImg.attr('src', imgurl);
						tb_remove();
					}
				
				// -------------------------------------------------------------------------
				
					$(".alert-success p").click(function()
					{
						$(this).fadeOut("slow", function()
						{
							$( ".alert-success" ).slideUp( "slow" );
						});
					});
				
				// -------------------------------------------------------------------------
					
					$( '.color-selector' ).each( function()
					{
						var cp = $( this );
						
						cp.ColorPicker(
						{
							color: '#ffffff',
							
							onBeforeShow: function ()
							{
								var myColor = $( this ).next( 'input' ).val();
								
								if ( myColor != "" )
								{
									$(this).ColorPickerSetColor( myColor );
									// cp.find( 'div' ).css( 'backgroundColor', '#' + myColor );
								}
							},
							onChange: function ( hsb, hex, rgb )
							{
								cp.find( 'div' ).css( 'backgroundColor', '#' + hex );
								cp.next( 'input' ).val( hex );
							},
							onSubmit: function( hsb, hex, rgb, el )
							{
								$( el ).val( hex );
								$( el ).ColorPickerHide();
							}
						});
					});
					
					
					$( '.color' ).change( function()
					{
						var myColor = $( this ).val();
						
						$( this ).prev( 'div' ).find( 'div' ).css( 'backgroundColor', '#' + myColor );
					});
					
					
					$( '.color' ).keypress( function()
					{
						var myColor = $( this ).val();
						
						$( this ).prev( 'div' ).find( 'div' ).css( 'backgroundColor', '#' + myColor );
					});
				
				// -------------------------------------------------------------------------
				
					$( 'form.ajax-form' ).submit(function()
					{
						$.ajax(
						{
							data : $(this).serialize(),
							type: "POST",
							beforeSend: function()
							{
								$('.status img').show();
								$('.status strong').html('Saving...');
								$('.status').fadeIn();
							},
							success: function(data)
							{
								$('.status img').hide();
								$('.status strong').html('Done.');
								$('.status').delay(1000).fadeOut();
							}
						});
						
						return false;
					});
				
				// -------------------------------------------------------------------------

					
				
				// -------------------------------------------------------------------------
				
					/*
					
					var calcHeight = function()
					{
						$( "#preview-frame" ).height($(window).height() - 100);
					}

					$(document).ready(function()
					{
						calcHeight();
					});

					$(window).resize(function()
					{
						calcHeight();
						
					}).load(function()
					{
						calcHeight();
					});
					
					*/
				
				// -------------------------------------------------------------------------
				});
			</script>
			
			<script>
				jQuery(document).ready( function( $ )
				{
					$.getJSON( 'https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyB0rWmDdkA9XmNfGKBpBF9jgkk1759sBHc&callback=?',  {}, function ( data )
					{
						$.each( data.items, function ( index, value )
						{
							$( '#site_name_font, #heading_font, #content_font' ).append( $( '<option></option>' ).attr( 'value', value.family ).text( value.family ) );
						});
						
						$( '#site_name_font option[value="' + $( '#site_name_font_family' ).val() + '"]' ).attr( 'selected', 'selected' );
						
						$( '#heading_font option[value="' + $( '#heading_font_family' ).val() + '"]' ).attr( 'selected', 'selected' );
						
						$( '#content_font option[value="' + $( '#content_font_family' ).val() + '"]' ).attr( 'selected', 'selected' );
						
						$( '#site_name_font' ).trigger('change');
						
						$( '#heading_font' ).trigger('change');
						
						$( '#content_font' ).trigger('change');
					});
					
					
					
					
					
					$( '#site_name_font' ).live( 'change', function ()
					{
						$( 'body' ).append( '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' + escape( $( this ).val() ) + '">' );

						$( 'body .site_name_font_live' ).css( { 'font-family' : '"' + $( this ).val() + '"' } );
						
						$( '#site_name_font_family' ).attr( 'value', $( this ).val() );
					});
					
					
					$( '#heading_font' ).live( 'change', function ()
					{
						$( 'body' ).append( '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' + escape( $( this ).val() ) + '">' );

						$( 'body .heading_font_live' ).css( { 'font-family' : '"' + $( this ).val() + '"' } );
						
						$( '#heading_font_family' ).attr( 'value', $( this ).val() );
					});
					
					
					$( '#content_font' ).live( 'change', function ()
					{
						$( 'body' ).append( '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' + escape( $( this ).val() ) + '">' );

						$( 'body .content_font_live' ).css( { 'font-family' : '"' + $( this ).val() + '"' } );
						
						$( '#content_font_family' ).attr( 'value', $( this ).val() );
					});
					
				});
			</script>
			
			<?php
				if ( isset( $_GET['tab'] ) )
				{
					create_tabs( $_GET['tab'] );
				}	
				else
				{
					create_tabs( 'general' );
				}
			?>

			<div id="poststuff">
				<?php
					// options page
					if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-options' )
					{
						// tab from url
						if ( isset( $_GET['tab'] ) )
						{
							$tab = $_GET['tab'];
						}
						else
						{
							$tab = 'general'; 
						}
						// end tab from url
						
						
						// tab content
						switch ( $tab )
						{
							case 'general' :
								
								if ( esc_attr( @$_GET['saved'] ) == 'true' )
								{
									echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
								}
								
								?>
									<div class="postbox">
										<div class="inside">
											<form class="ajax-form" method="post" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>">
												<?php
													wp_nonce_field( "settings-page" );
												?>
												
												<table>
													<tr>
														<td class="option-left">
															<h4>Image Logo</h4>
															
															<?php
																$image_logo = get_option( 'image_logo' );
															?>
															<input type="text" id="image_logo" name="image_logo" class="upload code2" style="width: 100%;" value="<?php echo $image_logo; ?>">
															
															<input type="button" class="button upload-button" style="margin-top: 10px;" value="Browse">
															
															<img style="margin-top: 10px; max-height: 50px;" align="right" alt="" src="<?php echo $image_logo; ?>">
														</td>
														
														<td class="option-right">
															Upload a logo or specify an image address of your online logo.<br>Recommended dimensions: (230x60)px
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Text Logo</h4>
															
															<textarea id="text_logo" name="text_logo" style="width: 100%;" rows="1" cols="50"><?php echo stripcslashes( get_option( 'text_logo' ) ); ?></textarea>
														</td>
														
														<td class="option-right">
															Site title.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Tagline</h4>
															
															<textarea id="text_slogan" name="text_slogan" style="width: 100%;" rows="2" cols="50"><?php echo stripcslashes( get_option( 'text_slogan' ) ); ?></textarea>
														</td>
														
														<td class="option-right">
															In a few words, explain what this site is about.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Favicon</h4>
															
															<?php
																$favicon = get_option( 'favicon' );
															
															?>
															<input type="text" id="favicon" name="favicon" class="upload code2" style="width: 100%;" value="<?php echo $favicon; ?>">
															
															<input type="button" class="button upload-button" style="margin-top: 10px;" value="Browse">
															
															<img style="margin-top: 10px; max-height: 16px;" align="right" alt="" src="<?php echo $favicon; ?>">
														</td>
														
														<td class="option-right">
															(16x16)px ICO, PNG or GIF format.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Apple Touch Icon</h4>
															
															<?php
																$apple_touch_icon = get_option( 'apple_touch_icon' );
															?>
															<input type="text" id="apple_touch_icon" name="apple_touch_icon" class="upload code2" style="width: 100%;" value="<?php echo $apple_touch_icon; ?>">
															
															<input type="button" class="button upload-button" style="margin-top: 10px;" value="Browse">
															
															<img style="margin-top: 10px; max-height: 50px;" align="right" alt="" src="<?php echo $apple_touch_icon; ?>">
														</td>
														
														<td class="option-right">
															Minimum (145x145)px PNG image that will represent your website's favicon for Apple devices such as the iPod Touch, iPhone and iPad, as well as some Android devices.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Login Logo</h4>
															
															<?php
																$login_logo = get_option( 'login_logo' );
															?>
															<input type="text" id="login_logo" name="login_logo" class="upload code2" style="width: 100%;" value="<?php echo $login_logo; ?>">
															
															<input type="button" class="button upload-button" style="margin-top: 10px;" value="Browse">
															
															<img style="margin-top: 10px; max-height: 50px;" align="right" alt="" src="<?php echo $login_logo; ?>">
															
															<br>
															
															<label><input type="checkbox" id="hide_login_logo" name="hide_login_logo" <?php if ( get_option( 'hide_login_logo' ) ) { echo 'checked="checked"'; } ?>> Hide Login Logo Module</label>
														</td>
														
														<td class="option-right">
															Upload.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
															
															<input type="hidden" name="settings-submit" value="Y">
														</td>
														
														<td class="option-right">
															
														</td>
													</tr>
												</table>
											</form>
										</div>
										<!-- end .inside -->
									</div>
									<!-- end .postbox -->
								<?php
							break;
							
							case 'animation' :
							
								if ( esc_attr( @$_GET['saved'] ) == 'true' )
								{
									echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
								}
								
								?>
									<div class="postbox">
										<div class="inside">
											<form method="post" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>" class="ajax-form">
												<?php
													wp_nonce_field( "settings-page" );
												?>
												
												<table>
													<tr>
														<td class="option-left">
															<h4>Regular Pages</h4>
															
															<?php
																$single_page_viewing = get_option( 'single_page_viewing', 'Yes' );
															?>
															<select id="single_page_viewing" name="single_page_viewing" style="width: 100%;">
																<option <?php if ( $single_page_viewing == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																
																<option <?php if ( $single_page_viewing == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
															</select>
														</td>
														
														<td class="option-right">
															Enable/disable single page viewing.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<label><input type="checkbox" id="enable_safe_mod" name="enable_safe_mod" <?php if ( get_option( 'enable_safe_mod' ) ) { echo 'checked="checked"'; } ?> value="enable_safe_mod"> Activate Classic Layout</label>
														</td>
														
														<td class="option-right">
															Disable 3D layout for all devices.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<label><input type="checkbox" id="disable_mobile_safe_mod" name="disable_mobile_safe_mod" <?php if ( get_option( 'disable_mobile_safe_mod' ) ) { echo 'checked="checked"'; } ?> value="disable_mobile_safe_mod"> Use 3D Layout on Mobile Devices</label>
														</td>
														
														<td class="option-right">
															Enable 3D layout on smartphones.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<label><input type="checkbox" id="enable_scrollbar" name="enable_scrollbar" value="enable_scrollbar" <?php if ( get_option( 'enable_scrollbar' ) ) { echo 'checked="checked"'; } ?>> Always Show Scrollbar</label>
														</td>
														
														<td class="option-right">
															Enable scrollbar.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Safe Mode Page-in Animation</h4>
															
															<?php
																if ( get_option( 'safe_mod_page_in_animation' ) )
																{
																	$safe_mod_page_in_animation = get_option( 'safe_mod_page_in_animation' );
																}
																else
																{
																	$safe_mod_page_in_animation = 'fadeInLeft';
																}
															?>
															<select id="safe_mod_page_in_animation" name="safe_mod_page_in_animation" style="width: 100%;">
																<option <?php if ( $safe_mod_page_in_animation == "" ) { echo 'selected="selected"'; } ?>></option>
																
																<option <?php if ( $safe_mod_page_in_animation == 'flash' ) { echo 'selected="selected"'; } ?>>flash</option>
																<option <?php if ( $safe_mod_page_in_animation == 'bounce' ) { echo 'selected="selected"'; } ?>>bounce</option>
																<option <?php if ( $safe_mod_page_in_animation == 'shake' ) { echo 'selected="selected"'; } ?>>shake</option>
																<option <?php if ( $safe_mod_page_in_animation == 'tada' ) { echo 'selected="selected"'; } ?>>tada</option>
																<option <?php if ( $safe_mod_page_in_animation == 'swing' ) { echo 'selected="selected"'; } ?>>swing</option>
																<option <?php if ( $safe_mod_page_in_animation == 'wobble' ) { echo 'selected="selected"'; } ?>>wobble</option>
																<option <?php if ( $safe_mod_page_in_animation == 'wiggle' ) { echo 'selected="selected"'; } ?>>wiggle</option>
																<option <?php if ( $safe_mod_page_in_animation == 'pulse' ) { echo 'selected="selected"'; } ?>>pulse</option>
																<option <?php if ( $safe_mod_page_in_animation == 'flip' ) { echo 'selected="selected"'; } ?>>flip</option>
																<option <?php if ( $safe_mod_page_in_animation == 'flipInX' ) { echo 'selected="selected"'; } ?>>flipInX</option>
																<option <?php if ( $safe_mod_page_in_animation == 'flipInY' ) { echo 'selected="selected"'; } ?>>flipInY</option>
																<option <?php if ( $safe_mod_page_in_animation == 'fadeIn' ) { echo 'selected="selected"'; } ?>>fadeIn</option>
																<option <?php if ( $safe_mod_page_in_animation == 'fadeInUp' ) { echo 'selected="selected"'; } ?>>fadeInUp</option>
																<option <?php if ( $safe_mod_page_in_animation == 'fadeInDown' ) { echo 'selected="selected"'; } ?>>fadeInDown</option>
																<option <?php if ( $safe_mod_page_in_animation == 'fadeInLeft' ) { echo 'selected="selected"'; } ?>>fadeInLeft</option>
																<option <?php if ( $safe_mod_page_in_animation == 'fadeInRight' ) { echo 'selected="selected"'; } ?>>fadeInRight</option>
																<option <?php if ( $safe_mod_page_in_animation == 'fadeInUpBig' ) { echo 'selected="selected"'; } ?>>fadeInUpBig</option>
																<option <?php if ( $safe_mod_page_in_animation == 'fadeInDownBig' ) { echo 'selected="selected"'; } ?>>fadeInDownBig</option>
																<option <?php if ( $safe_mod_page_in_animation == 'fadeInLeftBig' ) { echo 'selected="selected"'; } ?>>fadeInLeftBig</option>
																<option <?php if ( $safe_mod_page_in_animation == 'fadeInRightBig' ) { echo 'selected="selected"'; } ?>>fadeInRightBig</option>
																<option <?php if ( $safe_mod_page_in_animation == 'bounceIn' ) { echo 'selected="selected"'; } ?>>bounceIn</option>
																<option <?php if ( $safe_mod_page_in_animation == 'bounceInDown' ) { echo 'selected="selected"'; } ?>>bounceInDown</option>
																<option <?php if ( $safe_mod_page_in_animation == 'bounceInUp' ) { echo 'selected="selected"'; } ?>>bounceInUp</option>
																<option <?php if ( $safe_mod_page_in_animation == 'bounceInLeft' ) { echo 'selected="selected"'; } ?>>bounceInLeft</option>
																<option <?php if ( $safe_mod_page_in_animation == 'bounceInRight' ) { echo 'selected="selected"'; } ?>>bounceInRight</option>
																<option <?php if ( $safe_mod_page_in_animation == 'rotateIn' ) { echo 'selected="selected"'; } ?>>rotateIn</option>
																<option <?php if ( $safe_mod_page_in_animation == 'rotateInDownLeft' ) { echo 'selected="selected"'; } ?>>rotateInDownLeft</option>
																<option <?php if ( $safe_mod_page_in_animation == 'rotateInDownRight' ) { echo 'selected="selected"'; } ?>>rotateInDownRight</option>
																<option <?php if ( $safe_mod_page_in_animation == 'rotateInUpLeft' ) { echo 'selected="selected"'; } ?>>rotateInUpLeft</option>
																<option <?php if ( $safe_mod_page_in_animation == 'rotateInUpRight' ) { echo 'selected="selected"'; } ?>>rotateInUpRight</option>
																<option <?php if ( $safe_mod_page_in_animation == 'lightSpeedIn' ) { echo 'selected="selected"'; } ?>>lightSpeedIn</option>
																<option <?php if ( $safe_mod_page_in_animation == 'rollIn' ) { echo 'selected="selected"'; } ?>>rollIn</option>
															</select>
														</td>
														
														<td class="option-right">
															Determines the animation type for page transitions when in safe mode.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Portfolio Single Page-in Animation</h4>
															
															<?php
																if ( get_option( 'pf_details_page_in_animation' ) )
																{
																	$pf_details_page_in_animation = get_option( 'pf_details_page_in_animation' );
																}
																else
																{
																	$pf_details_page_in_animation = 'fadeInLeft';
																}
															?>
															<select id="pf_details_page_in_animation" name="pf_details_page_in_animation" style="width: 100%;">
																<option <?php if ( $pf_details_page_in_animation == "" ) { echo 'selected="selected"'; } ?>></option>
																
																<option <?php if ( $pf_details_page_in_animation == 'flash' ) { echo 'selected="selected"'; } ?>>flash</option>
																<option <?php if ( $pf_details_page_in_animation == 'bounce' ) { echo 'selected="selected"'; } ?>>bounce</option>
																<option <?php if ( $pf_details_page_in_animation == 'shake' ) { echo 'selected="selected"'; } ?>>shake</option>
																<option <?php if ( $pf_details_page_in_animation == 'tada' ) { echo 'selected="selected"'; } ?>>tada</option>
																<option <?php if ( $pf_details_page_in_animation == 'swing' ) { echo 'selected="selected"'; } ?>>swing</option>
																<option <?php if ( $pf_details_page_in_animation == 'wobble' ) { echo 'selected="selected"'; } ?>>wobble</option>
																<option <?php if ( $pf_details_page_in_animation == 'wiggle' ) { echo 'selected="selected"'; } ?>>wiggle</option>
																<option <?php if ( $pf_details_page_in_animation == 'pulse' ) { echo 'selected="selected"'; } ?>>pulse</option>
																<option <?php if ( $pf_details_page_in_animation == 'flip' ) { echo 'selected="selected"'; } ?>>flip</option>
																<option <?php if ( $pf_details_page_in_animation == 'flipInX' ) { echo 'selected="selected"'; } ?>>flipInX</option>
																<option <?php if ( $pf_details_page_in_animation == 'flipInY' ) { echo 'selected="selected"'; } ?>>flipInY</option>
																<option <?php if ( $pf_details_page_in_animation == 'fadeIn' ) { echo 'selected="selected"'; } ?>>fadeIn</option>
																<option <?php if ( $pf_details_page_in_animation == 'fadeInUp' ) { echo 'selected="selected"'; } ?>>fadeInUp</option>
																<option <?php if ( $pf_details_page_in_animation == 'fadeInDown' ) { echo 'selected="selected"'; } ?>>fadeInDown</option>
																<option <?php if ( $pf_details_page_in_animation == 'fadeInLeft' ) { echo 'selected="selected"'; } ?>>fadeInLeft</option>
																<option <?php if ( $pf_details_page_in_animation == 'fadeInRight' ) { echo 'selected="selected"'; } ?>>fadeInRight</option>
																<option <?php if ( $pf_details_page_in_animation == 'fadeInUpBig' ) { echo 'selected="selected"'; } ?>>fadeInUpBig</option>
																<option <?php if ( $pf_details_page_in_animation == 'fadeInDownBig' ) { echo 'selected="selected"'; } ?>>fadeInDownBig</option>
																<option <?php if ( $pf_details_page_in_animation == 'fadeInLeftBig' ) { echo 'selected="selected"'; } ?>>fadeInLeftBig</option>
																<option <?php if ( $pf_details_page_in_animation == 'fadeInRightBig' ) { echo 'selected="selected"'; } ?>>fadeInRightBig</option>
																<option <?php if ( $pf_details_page_in_animation == 'bounceIn' ) { echo 'selected="selected"'; } ?>>bounceIn</option>
																<option <?php if ( $pf_details_page_in_animation == 'bounceInDown' ) { echo 'selected="selected"'; } ?>>bounceInDown</option>
																<option <?php if ( $pf_details_page_in_animation == 'bounceInUp' ) { echo 'selected="selected"'; } ?>>bounceInUp</option>
																<option <?php if ( $pf_details_page_in_animation == 'bounceInLeft' ) { echo 'selected="selected"'; } ?>>bounceInLeft</option>
																<option <?php if ( $pf_details_page_in_animation == 'bounceInRight' ) { echo 'selected="selected"'; } ?>>bounceInRight</option>
																<option <?php if ( $pf_details_page_in_animation == 'rotateIn' ) { echo 'selected="selected"'; } ?>>rotateIn</option>
																<option <?php if ( $pf_details_page_in_animation == 'rotateInDownLeft' ) { echo 'selected="selected"'; } ?>>rotateInDownLeft</option>
																<option <?php if ( $pf_details_page_in_animation == 'rotateInDownRight' ) { echo 'selected="selected"'; } ?>>rotateInDownRight</option>
																<option <?php if ( $pf_details_page_in_animation == 'rotateInUpLeft' ) { echo 'selected="selected"'; } ?>>rotateInUpLeft</option>
																<option <?php if ( $pf_details_page_in_animation == 'rotateInUpRight' ) { echo 'selected="selected"'; } ?>>rotateInUpRight</option>
																<option <?php if ( $pf_details_page_in_animation == 'lightSpeedIn' ) { echo 'selected="selected"'; } ?>>lightSpeedIn</option>
																<option <?php if ( $pf_details_page_in_animation == 'rollIn' ) { echo 'selected="selected"'; } ?>>rollIn</option>
															</select>
														</td>
														
														<td class="option-right">
															Determines the animation type for ajax portfolio details page in animation.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Portfolio Single Page-out Animation</h4>
															
															<?php
																if ( get_option( 'pf_details_page_out_animation' ) )
																{
																	$pf_details_page_out_animation = get_option( 'pf_details_page_out_animation' );
																}
																else
																{
																	$pf_details_page_out_animation = 'fadeOutRightBig';
																}
															?>
															<select id="pf_details_page_out_animation" name="pf_details_page_out_animation" style="width: 100%;">
																<option <?php if ( $pf_details_page_out_animation == "" ) { echo 'selected="selected"'; } ?>></option>
																
																<option <?php if ( $pf_details_page_out_animation == 'flipOutX' ) { echo 'selected="selected"'; } ?>>flipOutX</option>
																<option <?php if ( $pf_details_page_out_animation == 'flipOutY' ) { echo 'selected="selected"'; } ?>>flipOutY</option>
																<option <?php if ( $pf_details_page_out_animation == 'fadeOut' ) { echo 'selected="selected"'; } ?>>fadeOut</option>
																<option <?php if ( $pf_details_page_out_animation == 'fadeOutUp' ) { echo 'selected="selected"'; } ?>>fadeOutUp</option>
																<option <?php if ( $pf_details_page_out_animation == 'fadeOutDown' ) { echo 'selected="selected"'; } ?>>fadeOutDown</option>
																<option <?php if ( $pf_details_page_out_animation == 'fadeOutLeft' ) { echo 'selected="selected"'; } ?>>fadeOutLeft</option>
																<option <?php if ( $pf_details_page_out_animation == 'fadeOutRight' ) { echo 'selected="selected"'; } ?>>fadeOutRight</option>
																<option <?php if ( $pf_details_page_out_animation == 'fadeOutUpBig' ) { echo 'selected="selected"'; } ?>>fadeOutUpBig</option>
																<option <?php if ( $pf_details_page_out_animation == 'fadeOutDownBig' ) { echo 'selected="selected"'; } ?>>fadeOutDownBig</option>
																<option <?php if ( $pf_details_page_out_animation == 'fadeOutLeftBig' ) { echo 'selected="selected"'; } ?>>fadeOutLeftBig</option>
																<option <?php if ( $pf_details_page_out_animation == 'fadeOutRightBig' ) { echo 'selected="selected"'; } ?>>fadeOutRightBig</option>
																<option <?php if ( $pf_details_page_out_animation == 'bounceOut' ) { echo 'selected="selected"'; } ?>>bounceOut</option>
																<option <?php if ( $pf_details_page_out_animation == 'bounceOutDown' ) { echo 'selected="selected"'; } ?>>bounceOutDown</option>
																<option <?php if ( $pf_details_page_out_animation == 'bounceOutUp' ) { echo 'selected="selected"'; } ?>>bounceOutUp</option>
																<option <?php if ( $pf_details_page_out_animation == 'bounceOutLeft' ) { echo 'selected="selected"'; } ?>>bounceOutLeft</option>
																<option <?php if ( $pf_details_page_out_animation == 'bounceOutRight' ) { echo 'selected="selected"'; } ?>>bounceOutRight</option>
																<option <?php if ( $pf_details_page_out_animation == 'rotateOut' ) { echo 'selected="selected"'; } ?>>rotateOut</option>
																<option <?php if ( $pf_details_page_out_animation == 'rotateOutDownLeft' ) { echo 'selected="selected"'; } ?>>rotateOutDownLeft</option>
																<option <?php if ( $pf_details_page_out_animation == 'rotateOutDownRight' ) { echo 'selected="selected"'; } ?>>rotateOutDownRight</option>
																<option <?php if ( $pf_details_page_out_animation == 'rotateOutUpLeft' ) { echo 'selected="selected"'; } ?>>rotateOutUpLeft</option>
																<option <?php if ( $pf_details_page_out_animation == 'rotateOutUpRight' ) { echo 'selected="selected"'; } ?>>rotateOutUpRight</option>
																<option <?php if ( $pf_details_page_out_animation == 'lightSpeedOut' ) { echo 'selected="selected"'; } ?>>lightSpeedOut</option>
																<option <?php if ( $pf_details_page_out_animation == 'hinge' ) { echo 'selected="selected"'; } ?>>hinge</option>
																<option <?php if ( $pf_details_page_out_animation == 'rollOut' ) { echo 'selected="selected"'; } ?>>rollOut</option>
															</select>
														</td>
														
														<td class="option-right">
															Determines the animation type for ajax portfolio details page out animation.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Lightbox-in Animation</h4>
															
															<?php
																if ( get_option( 'lightbox_in_animation' ) )
																{
																	$lightbox_in_animation = get_option( 'lightbox_in_animation' );
																}
																else
																{
																	$lightbox_in_animation = 'fadeInLeftBig';
																}
															?>
															<select id="lightbox_in_animation" name="lightbox_in_animation" style="width: 100%;">
																<option <?php if ( $lightbox_in_animation == "" ) { echo 'selected="selected"'; } ?>></option>
																
																<option <?php if ( $lightbox_in_animation == 'flash' ) { echo 'selected="selected"'; } ?>>flash</option>
																<option <?php if ( $lightbox_in_animation == 'bounce' ) { echo 'selected="selected"'; } ?>>bounce</option>
																<option <?php if ( $lightbox_in_animation == 'shake' ) { echo 'selected="selected"'; } ?>>shake</option>
																<option <?php if ( $lightbox_in_animation == 'tada' ) { echo 'selected="selected"'; } ?>>tada</option>
																<option <?php if ( $lightbox_in_animation == 'swing' ) { echo 'selected="selected"'; } ?>>swing</option>
																<option <?php if ( $lightbox_in_animation == 'wobble' ) { echo 'selected="selected"'; } ?>>wobble</option>
																<option <?php if ( $lightbox_in_animation == 'wiggle' ) { echo 'selected="selected"'; } ?>>wiggle</option>
																<option <?php if ( $lightbox_in_animation == 'pulse' ) { echo 'selected="selected"'; } ?>>pulse</option>
																<option <?php if ( $lightbox_in_animation == 'flip' ) { echo 'selected="selected"'; } ?>>flip</option>
																<option <?php if ( $lightbox_in_animation == 'flipInX' ) { echo 'selected="selected"'; } ?>>flipInX</option>
																<option <?php if ( $lightbox_in_animation == 'flipInY' ) { echo 'selected="selected"'; } ?>>flipInY</option>
																<option <?php if ( $lightbox_in_animation == 'fadeIn' ) { echo 'selected="selected"'; } ?>>fadeIn</option>
																<option <?php if ( $lightbox_in_animation == 'fadeInUp' ) { echo 'selected="selected"'; } ?>>fadeInUp</option>
																<option <?php if ( $lightbox_in_animation == 'fadeInDown' ) { echo 'selected="selected"'; } ?>>fadeInDown</option>
																<option <?php if ( $lightbox_in_animation == 'fadeInLeft' ) { echo 'selected="selected"'; } ?>>fadeInLeft</option>
																<option <?php if ( $lightbox_in_animation == 'fadeInRight' ) { echo 'selected="selected"'; } ?>>fadeInRight</option>
																<option <?php if ( $lightbox_in_animation == 'fadeInUpBig' ) { echo 'selected="selected"'; } ?>>fadeInUpBig</option>
																<option <?php if ( $lightbox_in_animation == 'fadeInDownBig' ) { echo 'selected="selected"'; } ?>>fadeInDownBig</option>
																<option <?php if ( $lightbox_in_animation == 'fadeInLeftBig' ) { echo 'selected="selected"'; } ?>>fadeInLeftBig</option>
																<option <?php if ( $lightbox_in_animation == 'fadeInRightBig' ) { echo 'selected="selected"'; } ?>>fadeInRightBig</option>
																<option <?php if ( $lightbox_in_animation == 'bounceIn' ) { echo 'selected="selected"'; } ?>>bounceIn</option>
																<option <?php if ( $lightbox_in_animation == 'bounceInDown' ) { echo 'selected="selected"'; } ?>>bounceInDown</option>
																<option <?php if ( $lightbox_in_animation == 'bounceInUp' ) { echo 'selected="selected"'; } ?>>bounceInUp</option>
																<option <?php if ( $lightbox_in_animation == 'bounceInLeft' ) { echo 'selected="selected"'; } ?>>bounceInLeft</option>
																<option <?php if ( $lightbox_in_animation == 'bounceInRight' ) { echo 'selected="selected"'; } ?>>bounceInRight</option>
																<option <?php if ( $lightbox_in_animation == 'rotateIn' ) { echo 'selected="selected"'; } ?>>rotateIn</option>
																<option <?php if ( $lightbox_in_animation == 'rotateInDownLeft' ) { echo 'selected="selected"'; } ?>>rotateInDownLeft</option>
																<option <?php if ( $lightbox_in_animation == 'rotateInDownRight' ) { echo 'selected="selected"'; } ?>>rotateInDownRight</option>
																<option <?php if ( $lightbox_in_animation == 'rotateInUpLeft' ) { echo 'selected="selected"'; } ?>>rotateInUpLeft</option>
																<option <?php if ( $lightbox_in_animation == 'rotateInUpRight' ) { echo 'selected="selected"'; } ?>>rotateInUpRight</option>
																<option <?php if ( $lightbox_in_animation == 'lightSpeedIn' ) { echo 'selected="selected"'; } ?>>lightSpeedIn</option>
																<option <?php if ( $lightbox_in_animation == 'rollIn' ) { echo 'selected="selected"'; } ?>>rollIn</option>
															</select>
														</td>
														
														<td class="option-right">
															Determines the animation type for lightbox in animation.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Profile Image Animation</h4>
															
															<?php
																if ( get_option( 'profile_image_animation' ) )
																{
																	$profile_image_animation = get_option( 'profile_image_animation' );
																}
																else
																{
																	$profile_image_animation = 'rotate-left';
																}
															?>
															
															<select id="profile_image_animation" name="profile_image_animation" style="width: 100%;">
																<option <?php if ( $profile_image_animation == 'fade' ) { echo 'selected="selected"'; } ?>>fade</option>
																<option <?php if ( $profile_image_animation == 'slide' ) { echo 'selected="selected"'; } ?>>slide</option>
																<option <?php if ( $profile_image_animation == 'rotate-down' ) { echo 'selected="selected"'; } ?>>rotate-down</option>
																<option <?php if ( $profile_image_animation == 'rotate-left' ) { echo 'selected="selected"'; } ?>>rotate-left</option>
																<option <?php if ( $profile_image_animation == 'rotate-right' ) { echo 'selected="selected"'; } ?>>rotate-right</option>
																<option <?php if ( $profile_image_animation == 'fly-out' ) { echo 'selected="selected"'; } ?>>fly-out</option>
															</select>
														</td>
														
														<td class="option-right">
															Determines the animation type for profile image.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Page Transition Duration</h4>
															
															<?php
																$page_transition_duration = get_option( 'page_transition_duration', '1000' );
																
																if ( $page_transition_duration == "" )
																{
																	$page_transition_duration = "1000";
																}
															?>
															<input type="text" id="page_transition_duration" name="page_transition_duration" maxlength="6" size="6" value="<?php echo $page_transition_duration; ?>">
															
															<span style="display: inline-block; font-size: 11px; color: #666666;">Default: 1000</span>
														</td>
														
														<td class="option-right">
															3D page transition animation duration in miliseconds.
															<br>
															<br>
															Sample:
															<br>
															2000 = 2 seconds
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
															
															<input type="hidden" name="settings-submit" value="Y">
														</td>
														
														<td class="option-right">
															
														</td>
													</tr>
												</table>
											</form>
										</div>
										<!-- end .inside -->
									</div>
									<!-- end .postbox -->
								<?php
							break;
							
							case 'style' :
								
								if ( esc_attr( @$_GET['saved'] ) == 'true' )
								{
									echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
								}
								
								?>
									<div class="postbox">
										<div class="inside">
											<form class="ajax-form" method="post" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>">
												<?php
													wp_nonce_field( "settings-page" );
												?>
												
												<table>
													<tr>
														<td class="option-left">
															<h4>Base Skin</h4>
															
															<?php
																$base_skin = get_option( 'base_skin' );
															?>
															
															<select id="base_skin" name="base_skin" style="width: 100%;">
																<option <?php if ( $base_skin == "" ) { echo 'selected="selected"'; } ?>></option>
																
																<option <?php if ( $base_skin == 'dark-text' ) { echo 'selected="selected"'; } ?>>dark-text</option>
																<option <?php if ( $base_skin == 'light-text' ) { echo 'selected="selected"'; } ?>>light-text</option>
															</select>
														</td>
														
														<td class="option-right">
															Select.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Primary Color</h4>
															
															<?php
																$primary_color = get_option( 'primary_color' );
															?>
															
															<select id="primary_color" name="primary_color" style="width: 100%;">
																<option <?php if ( $primary_color == "" ) { echo 'selected="selected"'; } ?>></option>
																
																<option <?php if ( $primary_color == 'black' ) { echo 'selected="selected"'; } ?>>black</option>
																<option <?php if ( $primary_color == 'blue' ) { echo 'selected="selected"'; } ?>>blue</option>
																<option <?php if ( $primary_color == 'blue-aqua' ) { echo 'selected="selected"'; } ?>>blue-aqua</option>
																<option <?php if ( $primary_color == 'blue-old' ) { echo 'selected="selected"'; } ?>>blue-old</option>
																<option <?php if ( $primary_color == 'brown-coffee' ) { echo 'selected="selected"'; } ?>>brown-coffee</option>
																<option <?php if ( $primary_color == 'denim' ) { echo 'selected="selected"'; } ?>>denim</option>
																<option <?php if ( $primary_color == 'eggshell' ) { echo 'selected="selected"'; } ?>>eggshell</option>
																<option <?php if ( $primary_color == 'fandango-pink' ) { echo 'selected="selected"'; } ?>>fandango-pink</option>
																<option <?php if ( $primary_color == 'gainsboro' ) { echo 'selected="selected"'; } ?>>gainsboro</option>
																<option <?php if ( $primary_color == 'gold' ) { echo 'selected="selected"'; } ?>>gold</option>
																<option <?php if ( $primary_color == 'gray' ) { echo 'selected="selected"'; } ?>>gray</option>
																<option <?php if ( $primary_color == 'green' ) { echo 'selected="selected"'; } ?>>green</option>
																<option <?php if ( $primary_color == 'green-grass' ) { echo 'selected="selected"'; } ?>>green-grass</option>
																<option <?php if ( $primary_color == 'green-light' ) { echo 'selected="selected"'; } ?>>green-light</option>
																<option <?php if ( $primary_color == 'green-old' ) { echo 'selected="selected"'; } ?>>green-old</option>
																<option <?php if ( $primary_color == 'lime' ) { echo 'selected="selected"'; } ?>>lime</option>
																<option <?php if ( $primary_color == 'navy' ) { echo 'selected="selected"'; } ?>>navy</option>
																<option <?php if ( $primary_color == 'orange' ) { echo 'selected="selected"'; } ?>>orange</option>
																<option <?php if ( $primary_color == 'pink' ) { echo 'selected="selected"'; } ?>>pink</option>
																<option <?php if ( $primary_color == 'pink-rose' ) { echo 'selected="selected"'; } ?>>pink-rose</option>
																<option <?php if ( $primary_color == 'purple' ) { echo 'selected="selected"'; } ?>>purple</option>
																<option <?php if ( $primary_color == 'red' ) { echo 'selected="selected"'; } ?>>red</option>
																<option <?php if ( $primary_color == 'red-dark' ) { echo 'selected="selected"'; } ?>>red-dark</option>
																<option <?php if ( $primary_color == 'red-old' ) { echo 'selected="selected"'; } ?>>red-old</option>
																<option <?php if ( $primary_color == 'timberwolf' ) { echo 'selected="selected"'; } ?>>timberwolf</option>
																<option <?php if ( $primary_color == 'tufts-blue' ) { echo 'selected="selected"'; } ?>>tufts-blue</option>
																<option <?php if ( $primary_color == 'white' ) { echo 'selected="selected"'; } ?>>white</option>
																<option <?php if ( $primary_color == 'wild-blue' ) { echo 'selected="selected"'; } ?>>wild-blue</option>
																<option <?php if ( $primary_color == 'yellow' ) { echo 'selected="selected"'; } ?>>yellow</option>
																<option <?php if ( $primary_color == 'yellow-light' ) { echo 'selected="selected"'; } ?>>yellow-light</option>
															</select>
														</td>
														
														<td class="option-right">
															Select.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Custom Primary Color</h4>
															
															<?php
																$custom_primary_color = get_option( 'custom_primary_color' );
															?>
															
															<div class="color-selector"><div style="background-color: #<?php echo stripcslashes( $custom_primary_color ); ?>;"></div></div>
															
															<input type="text" id="custom_primary_color" name="custom_primary_color" class="color" maxlength="6" size="6" value="<?php echo stripcslashes( $custom_primary_color ); ?>">
														</td>
														
														<td class="option-right">
															Select.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Menu Skin</h4>
															
															<?php
																$menu_skin = get_option( 'menu_skin' );
															?>
															
															<select id="menu_skin" name="menu_skin" style="width: 100%;">
																<option <?php if ( $menu_skin == "" ) { echo 'selected="selected"'; } ?>></option>
																
																<option <?php if ( $menu_skin == 'dark' ) { echo 'selected="selected"'; } ?>>dark</option>
																<option <?php if ( $menu_skin == 'dark-transparent' ) { echo 'selected="selected"'; } ?>>dark-transparent</option>
																<option <?php if ( $menu_skin == 'light-transparent' ) { echo 'selected="selected"'; } ?>>light-transparent</option>
																<option <?php if ( $menu_skin == 'white' ) { echo 'selected="selected"'; } ?>>white</option>
															</select>
														</td>
														
														<td class="option-right">
															Select.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Menu Background Color</h4>
															
															<?php
																$menu_bg_color = get_option( 'menu_bg_color' );
															?>
															
															<div class="color-selector"><div style="background-color: #<?php echo stripcslashes( $menu_bg_color ); ?>;"></div></div>
															
															<input type="text" id="menu_bg_color" name="menu_bg_color" class="color" maxlength="6" size="6" value="<?php echo stripcslashes( $menu_bg_color ); ?>">
														</td>
														
														<td class="option-right">
															Select.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Menu Hover Background Color</h4>
															
															<?php
																$menu_hover_bg_color = get_option( 'menu_hover_bg_color' );
															?>
															
															<div class="color-selector"><div style="background-color: #<?php echo stripcslashes( $menu_hover_bg_color ); ?>;"></div></div>
															
															<input type="text" id="menu_hover_bg_color" name="menu_hover_bg_color" class="color" maxlength="6" size="6" value="<?php echo stripcslashes( $menu_hover_bg_color ); ?>">
														</td>
														
														<td class="option-right">
															Select.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Menu Shadow Color</h4>
															
															<?php
																$menu_shadow_color = get_option( 'menu_shadow_color' );
															?>
															
															<div class="color-selector"><div style="background-color: #<?php echo stripcslashes( $menu_shadow_color ); ?>;"></div></div>
															
															<input type="text" id="menu_shadow_color" name="menu_shadow_color" class="color" maxlength="6" size="6" value="<?php echo stripcslashes( $menu_shadow_color ); ?>">
														</td>
														
														<td class="option-right">
															Select.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Background Color</h4>
															
															<?php
																$background_color = get_option( 'background_color' );
															?>
															<select id="background_color" name="background_color" style="width: 100%;">
																<option <?php if ( $background_color == "" ) { echo 'selected="selected"'; } ?>></option>
																
																<option <?php if ( $background_color == 'black' ) { echo 'selected="selected"'; } ?>>black</option>
																<option <?php if ( $background_color == 'blue' ) { echo 'selected="selected"'; } ?>>blue</option>
																<option <?php if ( $background_color == 'blue-aqua' ) { echo 'selected="selected"'; } ?>>blue-aqua</option>
																<option <?php if ( $background_color == 'blue-cold' ) { echo 'selected="selected"'; } ?>>blue-cold</option>
																<option <?php if ( $background_color == 'blue-dark' ) { echo 'selected="selected"'; } ?>>blue-dark</option>
																<option <?php if ( $background_color == 'blue-soft' ) { echo 'selected="selected"'; } ?>>blue-soft</option>
																<option <?php if ( $background_color == 'blue-softer' ) { echo 'selected="selected"'; } ?>>blue-softer</option>
																<option <?php if ( $background_color == 'brown-coffee' ) { echo 'selected="selected"'; } ?>>brown-coffee</option>
																<option <?php if ( $background_color == 'brown-soft' ) { echo 'selected="selected"'; } ?>>brown-soft</option>
																<option <?php if ( $background_color == 'grainsboro' ) { echo 'selected="selected"'; } ?>>grainsboro</option>
																<option <?php if ( $background_color == 'gray' ) { echo 'selected="selected"'; } ?>>gray</option>
																<option <?php if ( $background_color == 'gray-light' ) { echo 'selected="selected"'; } ?>>gray-light</option>
																<option <?php if ( $background_color == 'green' ) { echo 'selected="selected"'; } ?>>green</option>
																<option <?php if ( $background_color == 'green-dark' ) { echo 'selected="selected"'; } ?>>green-dark</option>
																<option <?php if ( $background_color == 'green-soft' ) { echo 'selected="selected"'; } ?>>green-soft</option>
																<option <?php if ( $background_color == 'lime' ) { echo 'selected="selected"'; } ?>>lime</option>
																<option <?php if ( $background_color == 'orange' ) { echo 'selected="selected"'; } ?>>orange</option>
																<option <?php if ( $background_color == 'orange-dark' ) { echo 'selected="selected"'; } ?>>orange-dark</option>
																<option <?php if ( $background_color == 'orange-strong' ) { echo 'selected="selected"'; } ?>>orange-strong</option>
																<option <?php if ( $background_color == 'pink' ) { echo 'selected="selected"'; } ?>>pink</option>
																<option <?php if ( $background_color == 'pink-dark' ) { echo 'selected="selected"'; } ?>>pink-dark</option>
																<option <?php if ( $background_color == 'pink-soft' ) { echo 'selected="selected"'; } ?>>pink-soft</option>
																<option <?php if ( $background_color == 'purple' ) { echo 'selected="selected"'; } ?>>purple</option>
																<option <?php if ( $background_color == 'purple-light' ) { echo 'selected="selected"'; } ?>>purple-light</option>
																<option <?php if ( $background_color == 'red' ) { echo 'selected="selected"'; } ?>>red</option>
																<option <?php if ( $background_color == 'red-dark' ) { echo 'selected="selected"'; } ?>>red-dark</option>
																<option <?php if ( $background_color == 'red-old' ) { echo 'selected="selected"'; } ?>>red-old</option>
																<option <?php if ( $background_color == 'yellow' ) { echo 'selected="selected"'; } ?>>yellow</option>
																<option <?php if ( $background_color == 'yellow-soft' ) { echo 'selected="selected"'; } ?>>yellow-soft</option>
															</select>
														</td>
														
														<td class="option-right">
															Select.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Custom Background Color</h4>
															
															<?php
															
																$custom_background_color = get_option( 'custom_background_color' );
															
															?>
															<div class="color-selector">
																<div style="background-color: #<?php echo stripcslashes( $custom_background_color ); ?>;"></div>
															</div>
															
															<input type="text" id="custom_background_color" name="custom_background_color" class="color" maxlength="6" size="6" value="<?php echo stripcslashes( $custom_background_color ); ?>">
														</td>
														
														<td class="option-right">
															Select.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Background Image</h4>
															
															<?php
																$background_image = get_option( 'background_image' );
															?>
															<select id="background_image" name="background_image" style="width: 100%;">
																<option <?php if ( $background_image == "" ) { echo 'selected="selected"'; } ?>></option>
																
																<option <?php if ( $background_image == 'pattern-arches' ) { echo 'selected="selected"'; } ?>>pattern-arches</option>
																<option <?php if ( $background_image == 'pattern-birds' ) { echo 'selected="selected"'; } ?>>pattern-birds</option>
																<option <?php if ( $background_image == 'pattern-blueprint' ) { echo 'selected="selected"'; } ?>>pattern-blueprint</option>
																<option <?php if ( $background_image == 'pattern-brushed' ) { echo 'selected="selected"'; } ?>>pattern-brushed</option>
																<option <?php if ( $background_image == 'pattern-carbon' ) { echo 'selected="selected"'; } ?>>pattern-carbon</option>
																<option <?php if ( $background_image == 'pattern-carbon2' ) { echo 'selected="selected"'; } ?>>pattern-carbon2</option>
																<option <?php if ( $background_image == 'pattern-card' ) { echo 'selected="selected"'; } ?>>pattern-card</option>
																<option <?php if ( $background_image == 'pattern-dark' ) { echo 'selected="selected"'; } ?>>pattern-dark</option>
																<option <?php if ( $background_image == 'pattern-dark-lines' ) { echo 'selected="selected"'; } ?>>pattern-dark-lines</option>
																<option <?php if ( $background_image == 'pattern-dots' ) { echo 'selected="selected"'; } ?>>pattern-dots</option>
																<option <?php if ( $background_image == 'pattern-grid' ) { echo 'selected="selected"'; } ?>>pattern-grid</option>
																<option <?php if ( $background_image == 'pattern-lines' ) { echo 'selected="selected"'; } ?>>pattern-lines</option>
																<option <?php if ( $background_image == 'pattern-metal' ) { echo 'selected="selected"'; } ?>>pattern-metal</option>
																<option <?php if ( $background_image == 'pattern-old-paper' ) { echo 'selected="selected"'; } ?>>pattern-old-paper</option>
																<option <?php if ( $background_image == 'pattern-paper' ) { echo 'selected="selected"'; } ?>>pattern-paper</option>
																<option <?php if ( $background_image == 'pattern-squares' ) { echo 'selected="selected"'; } ?>>pattern-squares</option>
																<option <?php if ( $background_image == 'pattern-wood' ) { echo 'selected="selected"'; } ?>>pattern-wood</option>
															</select>
														</td>
														
														<td class="option-right">
															Select.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Custom Background Image</h4>
															
															<?php
																$custom_background_image = get_option( 'custom_background_image' );
															?>
															
															<input type="text" id="custom_background_image" name="custom_background_image" class="upload code2" style="width: 100%;" value="<?php echo $custom_background_image; ?>">
															
															<input type="button" class="button upload-button" style="margin-top: 10px;" value="Browse">
															
															<img style="margin-top: 10px; max-height: 50px;" align="right" alt="" src="<?php echo $custom_background_image; ?>">
														</td>
														
														<td class="option-right">
															Upload.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Extra Skin</h4>
															
															<label><input type="checkbox" id="glow" name="glow" <?php if ( get_option( 'glow' ) ) { echo 'checked="checked"'; } ?>> Glow</label>
															
															<br>
															
															<label><input type="checkbox" id="light_glow" name="light_glow" <?php if ( get_option( 'light_glow' ) ) { echo 'checked="checked"'; } ?>> Light Glow</label>
															
															<br>
															
															<label><input type="checkbox" id="noise" name="noise" <?php if ( get_option( 'noise' ) ) { echo 'checked="checked"'; } ?>> Noise</label>
															
															<br>
															
															<label><input type="checkbox" id="overlay" name="overlay" <?php if ( get_option( 'overlay' ) ) { echo 'checked="checked"'; } ?>> Overlay</label>
															
															<br>
															
															<label><input type="checkbox" id="alternate_portfolio" name="alternate_portfolio" <?php if ( get_option( 'alternate_portfolio' ) ) { echo 'checked="checked"'; } ?>> Alternate Portfolio</label>
															
															<br>
															
															<label><input type="checkbox" id="portfolio_transparent" name="portfolio_transparent" <?php if ( get_option( 'portfolio_transparent' ) ) { echo 'checked="checked"'; } ?>> Portfolio Transparent</label>
															
															<br>
															
															<label><input type="checkbox" id="pf_details_light_transparent" name="pf_details_light_transparent" <?php if ( get_option( 'pf_details_light_transparent' ) ) { echo 'checked="checked"'; } ?>> Portfolio Details Light Transparent</label>
															
															<br>
															
															<label><input type="checkbox" id="pf_details_dark_transparent" name="pf_details_dark_transparent" <?php if ( get_option( 'pf_details_dark_transparent' ) ) { echo 'checked="checked"'; } ?>> Portfolio Details Dark Transparent</label>
															
															<br>
															
															<label><input type="checkbox" id="retro" name="retro" <?php if ( get_option( 'retro' ) ) { echo 'checked="checked"'; } ?>> Retro</label>
														</td>
														
														<td class="option-right">
															Select.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Site Name Color</h4>
															
															<?php
																$site_name_color = get_option( 'site_name_color' );
															?>
															<div class="color-selector"><div style="background-color: #<?php echo stripcslashes( $site_name_color ); ?>;"></div></div>
															
															<input type="text" id="site_name_color" name="site_name_color" class="color" maxlength="6" size="6" value="<?php echo stripcslashes( $site_name_color ); ?>">
														
														</td>
														
														<td class="option-right">
															Select.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Site Slogan Color</h4>
															
															<?php
																$site_slogan_color = get_option( 'site_slogan_color' );
															?>
															<div class="color-selector"><div style="background-color: #<?php echo stripcslashes( $site_slogan_color ); ?>;"></div></div>
															
															<input type="text" id="site_slogan_color" name="site_slogan_color" class="color" maxlength="6" size="6" value="<?php echo stripcslashes( $site_slogan_color ); ?>">
														</td>
														
														<td class="option-right">
															Select.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Link Color</h4>
															
															<?php
																$link_color = get_option( 'link_color' );
															?>
															
															<div class="color-selector"><div style="background-color: #<?php echo stripcslashes( $link_color ); ?>;"></div></div>
															
															<input type="text" id="link_color" name="link_color" class="color" maxlength="6" size="6" value="<?php echo stripcslashes( $link_color ); ?>">
														</td>
														
														<td class="option-right">
															Select.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Link Background Color</h4>
															
															<?php
																$link_background_color = get_option( 'link_background_color' );
															?>
															
															<div class="color-selector"><div style="background-color: #<?php echo stripcslashes( $link_background_color ); ?>;"></div></div>
															
															<input type="text" id="link_background_color" name="link_background_color" class="color" maxlength="6" size="6" value="<?php echo stripcslashes( $link_background_color ); ?>">
														</td>
														
														<td class="option-right">
															Select.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Link Hover Color</h4>
															
															<?php
																$link_hover_color = get_option( 'link_hover_color' );
															?>
															
															<div class="color-selector"><div style="background-color: #<?php echo stripcslashes( $link_hover_color ); ?>;"></div></div>
															
															<input type="text" id="link_hover_color" name="link_hover_color" class="color" maxlength="6" size="6" value="<?php echo stripcslashes( $link_hover_color ); ?>">
														</td>
														
														<td class="option-right">
															Select.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Link Hover Background Color</h4>
															
															<?php
																$link_hover_background_color = get_option( 'link_hover_background_color' );
															?>
															
															<div class="color-selector"><div style="background-color: #<?php echo stripcslashes( $link_hover_background_color ); ?>;"></div></div>
															
															<input type="text" id="link_hover_background_color" name="link_hover_background_color" class="color" maxlength="6" size="6" value="<?php echo stripcslashes( $link_hover_background_color ); ?>">
														</td>
														
														<td class="option-right">
															Select.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Text Color</h4>
															
															<?php
																$text_color = get_option( 'text_color' );
															?>
															
															<div class="color-selector"><div style="background-color: #<?php echo stripcslashes( $text_color ); ?>;"></div></div>
															
															<input type="text" id="text_color" name="text_color" class="color" maxlength="6" size="6" value="<?php echo stripcslashes( $text_color ); ?>">
														</td>
														
														<td class="option-right">
															Select.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Text Selection Color</h4>
															
															<?php
																$selection_color = get_option( 'selection_color' );
															?>
															
															<div class="color-selector"><div style="background-color: #<?php echo stripcslashes( $selection_color ); ?>;"></div></div>
															
															<input type="text" id="selection_color" name="selection_color" class="color" maxlength="6" size="6" value="<?php echo stripcslashes( $selection_color ); ?>">
														</td>
														
														<td class="option-right">
															Select.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Text Selection Background Color</h4>
															
															<?php
																$selection_bg_color = get_option( 'selection_bg_color' );
															?>
															
															<div class="color-selector"><div style="background-color: #<?php echo stripcslashes( $selection_bg_color ); ?>;"></div></div>
															
															<input type="text" id="selection_bg_color" name="selection_bg_color" class="color" maxlength="6" size="6" value="<?php echo stripcslashes( $selection_bg_color ); ?>">
														</td>
														
														<td class="option-right">
															Select.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Custom CSS</h4>
															
															<textarea id="custom_css" name="custom_css" class="code2" style="width: 100%;" rows="10" cols="50"><?php echo stripcslashes( get_option( 'custom_css' ) ); ?></textarea>
														</td>
														
														<td class="option-right">
															Quickly add custom css.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>External CSS/JS</h4>
															
															<textarea id="external_css" name="external_css" class="code2" style="width: 100%;" rows="10" cols="50"><?php echo stripcslashes( get_option( 'external_css' ) ); ?></textarea>
														</td>
														
														<td class="option-right">
															Add your custom external stylesheet (.css) and/or javascript (.js) file(s).
															<br>
															<br>
															Sample (.css):
															<br>
															<span class="code2">&lt;link rel="stylesheet" type="text/css" href="yourstyle.css"&gt;</span>
															<br>
															<br>
															Sample (.js):
															<br>
															<span class="code2">&lt;script src="yourscript.js"&gt;&lt;/script&gt;</span>
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
															
															<input type="hidden" name="settings-submit" value="Y">
														</td>
														
														<td class="option-right">
															
														</td>
													</tr>
												</table>
											</form>
										</div>
										<!-- end .inside -->
									</div>
									<!-- end .postbox -->
								<?php
							break;
							
							case 'fonts' :
								
								if ( esc_attr( @$_GET['saved'] ) == 'true' )
								{
									echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
								}
								
								?>
									<div class="postbox">
										<div class="inside">
											<form class="ajax-form" method="post" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>">
												<?php
													wp_nonce_field( "settings-page" );
												?>
												
												<table>
													<tr>
														<td class="option-left">
															<h4>Text Logo Font</h4>
															
															<select id="site_name_font" name="site_name_font" style="width: 100%;"></select>
															
															<?php
																if ( get_option( 'site_name_font_family' ) )
																{
																	$site_name_font_family = get_option( 'site_name_font_family' );
																}
																else
																{
																	$site_name_font_family = 'Patua One';
																}
															?>
															<input type="hidden" id="site_name_font_family" name="site_name_font_family" value="<?php echo $site_name_font_family; ?>">
															
															<h1 class="site_name_font_live">Hello font world</h1>
														</td>
														
														<td class="option-right">
															Select.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Text Logo Font Size</h4>
															
															<input type="text" id="site_name_font_size" name="site_name_font_size" class="code2" maxlength="6" size="6" value="<?php echo stripcslashes( get_option( 'site_name_font_size' ) ); ?>"> <span style="font-size: 11px; color: #666;">Default: 2.00em</span>
														</td>
														
														<td class="option-right">
															Sample: 2.00em
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Heading Font</h4>
															
															<select id="heading_font" name="heading_font" style="width: 100%;"></select>
															
															<?php
																if ( get_option( 'heading_font_family' ) )
																{
																	$heading_font_family = get_option( 'heading_font_family' );
																}
																else
																{
																	$heading_font_family = 'Rokkitt';
																}
															?>
															<input type="hidden" id="heading_font_family" name="heading_font_family" value="<?php echo $heading_font_family; ?>">
															
															<h1 class="heading_font_live">Hello font world</h1>
														</td>
														
														<td class="option-right">
															Select.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Heading Font Size</h4>
															
															Heading 1: <input type="text" id="h1_font_size" name="h1_font_size" class="code2" maxlength="6" size="6" value="<?php echo stripcslashes( get_option( 'h1_font_size' ) ); ?>">
															
															<br>
															<br>
															
															Heading 2: <input type="text" id="h2_font_size" name="h2_font_size" class="code2" maxlength="6" size="6" value="<?php echo stripcslashes( get_option( 'h2_font_size' ) ); ?>">
															
															<br>
															<br>
															
															Heading 3: <input type="text" id="h3_font_size" name="h3_font_size" class="code2" maxlength="6" size="6" value="<?php echo stripcslashes( get_option( 'h3_font_size' ) ); ?>">
															
															<br>
															<br>
															
															Heading 4: <input type="text" id="h4_font_size" name="h4_font_size" class="code2" maxlength="6" size="6" value="<?php echo stripcslashes( get_option( 'h4_font_size' ) ); ?>">
															
															<br>
															<br>
															
															Heading 5: <input type="text" id="h5_font_size" name="h5_font_size" class="code2" maxlength="6" size="6" value="<?php echo stripcslashes( get_option( 'h5_font_size' ) ); ?>">
															
															<br>
															<br>
															
															Heading 6: <input type="text" id="h6_font_size" name="h6_font_size" class="code2" maxlength="6" size="6" value="<?php echo stripcslashes( get_option( 'h6_font_size' ) ); ?>">
														</td>
														
														<td class="option-right">
															Sample: 1.80em
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Content Font</h4>
															
															<select id="content_font" name="content_font" style="width: 100%;"></select>
															
															<?php
																if ( get_option( 'content_font_family' ) )
																{
																	$content_font_family = get_option( 'content_font_family' );
																}
																else
																{
																	$content_font_family = 'Lora';
																}
															?>
															<input type="hidden" id="content_font_family" name="content_font_family" value="<?php echo $content_font_family; ?>">
															
															<p class="content_font_live" style="font-size: 14px; line-height: 22px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt dictum arcu, quis convallis lacus lacinia nec. Suspendisse quam nisl, fringilla et bibendum non, dictum id quam.</p>
														</td>
														
														<td class="option-right">
															Select.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
															
															<input type="hidden" name="settings-submit" value="Y">
														</td>
														
														<td class="option-right">
															
														</td>
													</tr>
												</table>
											</form>
										</div>
										<!-- end .inside -->
									</div>
									<!-- end .postbox -->
								<?php
							break;
							
							case 'blog' :
								
								if ( esc_attr( @$_GET['saved'] ) == 'true' )
								{
									echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
								}
								
								?>
									<div class="postbox">
										<div class="inside">
											<form class="ajax-form" method="post" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>">
												<?php
													wp_nonce_field( 'settings-page' );
												?>
												
												<table>
													<tr>
														<td class="option-left">
															<h4>Blog Sidebar</h4>
															
															<?php
																$blog_sidebar = get_option( 'blog_sidebar', 'Yes' );
															?>
															<select id="blog_sidebar" name="blog_sidebar" style="width: 100%;">
																<option <?php if ( $blog_sidebar == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																
																<option <?php if ( $blog_sidebar == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
															</select>
														</td>
														
														<td class="option-right">
															For blog page template. Enable or disable.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
															
															<input type="hidden" name="settings-submit" value="Y">
														</td>
														
														<td class="option-right">
															
														</td>
													</tr>
												</table>
											</form>
										</div>
										<!-- end .inside -->
									</div>
									<!-- end .postbox -->
								<?php
							break;
							
							case 'seo' :
								
								if ( esc_attr( @$_GET['saved'] ) == 'true' )
								{
									echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
								}
								
								?>
									<div class="postbox">
										<div class="inside">
											<form class="ajax-form" method="post" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>">
												<?php
													wp_nonce_field( "settings-page" );
												?>
												
												<table>
													<tr>
														<td class="option-left">
															<h4>Theme SEO Fields</h4>
															
															<?php
																$theme_seo_fields = stripcslashes( get_option( 'theme_seo_fields', 'No' ) );
															?>
															<select id="theme_seo_fields" name="theme_seo_fields" style="width: 100%;">
																<option <?php if ( $theme_seo_fields == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																
																<option <?php if ( $theme_seo_fields == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
															</select>
														</td>
														
														<td class="option-right">
															Enable or disable built-in seo fields.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Description</h4>
															
															<textarea id="site_description" name="site_description" style="outline: none; width: 100%;" rows="4" cols="50"><?php echo stripcslashes( get_option( 'site_description' ) ); ?></textarea>
														
														</td>
														
														<td class="option-right">
															Used in front page.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Keywords</h4>
															
															<textarea id="site_keywords" name="site_keywords" style="outline: none; width: 100%;" rows="4" cols="50"><?php echo stripcslashes( get_option( 'site_keywords' ) ); ?></textarea>
														
														</td>
														
														<td class="option-right">
															Separate keywords with commas.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Tracking Code (/head)</h4>
															
															<textarea id="tracking_code_head" name="tracking_code_head" class="code2" style="outline: none; width: 100%;" rows="10" cols="50"><?php echo stripcslashes( get_option( 'tracking_code_head' ) ); ?></textarea>
														
														</td>
														
														<td class="option-right">
															Paste your Google Analytics (or other) tracking code here. It will be inserted before the closing head tag.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<h4>Tracking Code (/body)</h4>
															
															<textarea id="tracking_code" name="tracking_code" class="code2" style="outline: none; width: 100%;" rows="10" cols="50"><?php echo stripcslashes( get_option( 'tracking_code' ) ); ?></textarea>
														
														</td>
														
														<td class="option-right">
															Paste your Google Analytics (or other) tracking code here. It will be inserted before the closing body tag.
														</td>
													</tr>
													
													<tr>
														<td class="option-left">
															<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
															
															<input type="hidden" name="settings-submit" value="Y">
														</td>
														
														<td class="option-right">
															
														</td>
													</tr>
												</table>
											</form>
										</div>
										<!-- end .inside -->
									</div>
									<!-- end .postbox -->
								<?php
							break;
						}
						// end tab content
					}
					// end settings page
				?>
			</div>
			<!-- end #poststuff -->
		</div>
		<!-- end .wrap2 -->
	<?php
	}
	// end theme_options_page
	
/* ====================================================================================================================================================== */
	
	function save_settings()
	{
		global $pagenow;
		
		if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-options' )
		{
			if ( isset ( $_GET['tab'] ) )
			{
				$tab = $_GET['tab'];
			}
			else
			{
				$tab = 'general';
			}
			// end if
			
			
			switch ( $tab )
			{
				case 'general' :
					
					update_option( 'text_logo', $_POST['text_logo'] );
					update_option( 'text_slogan', $_POST['text_slogan'] );
					update_option( 'image_logo', esc_attr( $_POST['image_logo'] ) );
					update_option( 'login_logo', esc_attr( $_POST['login_logo'] ) );
					update_option( 'hide_login_logo', esc_attr( $_POST['hide_login_logo'] ) );
					update_option( 'favicon', esc_attr( $_POST['favicon'] ) );
					update_option( 'apple_touch_icon', esc_attr( $_POST['apple_touch_icon'] ) );
					
				break;
					
				case 'animation' :
				
					update_option( 'single_page_viewing', $_POST['single_page_viewing'] );
					update_option( 'enable_safe_mod', esc_attr( $_POST['enable_safe_mod'] ) );
					update_option( 'disable_mobile_safe_mod', esc_attr( $_POST['disable_mobile_safe_mod'] ) );
					update_option( 'enable_scrollbar', esc_attr( $_POST['enable_scrollbar'] ) );
					update_option( 'safe_mod_page_in_animation', esc_attr( $_POST['safe_mod_page_in_animation'] ) );
					update_option( 'pf_details_page_in_animation', esc_attr( $_POST['pf_details_page_in_animation'] ) );
					update_option( 'pf_details_page_out_animation', esc_attr( $_POST['pf_details_page_out_animation'] ) );
					update_option( 'lightbox_in_animation', esc_attr( $_POST['lightbox_in_animation'] ) );
					update_option( 'profile_image_animation', esc_attr( $_POST['profile_image_animation'] ) );
					update_option( 'page_transition_duration', esc_attr( $_POST['page_transition_duration'] ) );
					
				break;
					
				case 'style' :
				
					update_option( 'base_skin', esc_attr( $_POST['base_skin'] ) );
					update_option( 'primary_color', esc_attr( $_POST['primary_color'] ) );
					update_option( 'custom_primary_color', esc_attr( $_POST['custom_primary_color'] ) );
					update_option( 'menu_skin', esc_attr( $_POST['menu_skin'] ) );
					update_option( 'menu_bg_color', esc_attr( $_POST['menu_bg_color'] ) );
					update_option( 'menu_hover_bg_color', esc_attr( $_POST['menu_hover_bg_color'] ) );
					update_option( 'menu_shadow_color', esc_attr( $_POST['menu_shadow_color'] ) );
					update_option( 'background_color', esc_attr( $_POST['background_color'] ) );
					update_option( 'custom_background_color', esc_attr( $_POST['custom_background_color'] ) );
					update_option( 'background_image', esc_attr( $_POST['background_image'] ) );
					update_option( 'custom_background_image', esc_attr( $_POST['custom_background_image'] ) );
					
					update_option( 'glow', esc_attr( $_POST['glow'] ) );
					update_option( 'light_glow', esc_attr( $_POST['light_glow'] ) );
					update_option( 'noise', esc_attr( $_POST['noise'] ) );
					update_option( 'overlay', esc_attr( $_POST['overlay'] ) );
					update_option( 'alternate_portfolio', esc_attr( $_POST['alternate_portfolio'] ) );
					update_option( 'portfolio_transparent', esc_attr( $_POST['portfolio_transparent'] ) );
					update_option( 'pf_details_light_transparent', esc_attr( $_POST['pf_details_light_transparent'] ) );
					update_option( 'pf_details_dark_transparent', esc_attr( $_POST['pf_details_dark_transparent'] ) );
					update_option( 'retro', esc_attr( $_POST['retro'] ) );
					
					update_option( 'site_name_color', esc_attr( $_POST['site_name_color'] ) );
					update_option( 'site_slogan_color', esc_attr( $_POST['site_slogan_color'] ) );
					update_option( 'link_color', esc_attr( $_POST['link_color'] ) );
					update_option( 'link_background_color', esc_attr( $_POST['link_background_color'] ) );
					update_option( 'link_hover_color', esc_attr( $_POST['link_hover_color'] ) );
					update_option( 'link_hover_background_color', esc_attr( $_POST['link_hover_background_color'] ) );
					update_option( 'text_color', esc_attr( $_POST['text_color'] ) );
					update_option( 'selection_color', esc_attr( $_POST['selection_color'] ) );
					update_option( 'selection_bg_color', esc_attr( $_POST['selection_bg_color'] ) );
					
					update_option( 'custom_css', $_POST['custom_css'] );
					update_option( 'external_css', $_POST['external_css'] );
					
				break;
				
				case 'fonts' :
					
					update_option( 'site_name_font_family', esc_attr( $_POST['site_name_font_family'] ) );
					update_option( 'site_name_font_size', esc_attr( $_POST['site_name_font_size'] ) );
					
					update_option( 'heading_font_family', esc_attr( $_POST['heading_font_family'] ) );
					update_option( 'h1_font_size', esc_attr( $_POST['h1_font_size'] ) );
					update_option( 'h2_font_size', esc_attr( $_POST['h2_font_size'] ) );
					update_option( 'h3_font_size', esc_attr( $_POST['h3_font_size'] ) );
					update_option( 'h4_font_size', esc_attr( $_POST['h4_font_size'] ) );
					update_option( 'h5_font_size', esc_attr( $_POST['h5_font_size'] ) );
					update_option( 'h6_font_size', esc_attr( $_POST['h6_font_size'] ) );
					
					update_option( 'content_font_family', esc_attr( $_POST['content_font_family'] ) );
					
				break;
				
				case 'blog' :
					
					update_option( 'blog_sidebar', $_POST['blog_sidebar'] );
					
				break;
				
				case 'seo' :
				
					update_option( 'theme_seo_fields', $_POST['theme_seo_fields'] );
					update_option( 'site_description', $_POST['site_description'] );
					update_option( 'site_keywords', $_POST['site_keywords'] );
					update_option( 'tracking_code_head', $_POST['tracking_code_head'] );
					update_option( 'tracking_code', $_POST['tracking_code'] );
					
				break;
			}
			// end switch tab
		}
		// end if page
	}
	// end save_settings

/* ====================================================================================================================================================== */

	function load_settings_page()
	{
		if ( @$_POST["settings-submit"] == 'Y' )
		{
			check_admin_referer( "settings-page" );
			
			save_settings();
			
			$url_parameters = isset( $_GET['tab'] ) ? 'tab=' . $_GET['tab'] . '&saved=true' : 'saved=true';
			
			wp_redirect( admin_url( 'themes.php?page=theme-options&' . $url_parameters ) );
			
			exit;
		}
	}

/* ====================================================================================================================================================== */

	function my_theme_menu()
	{
		$settings_page = add_theme_page('Theme Options',
										'Theme Options',
										'edit_theme_options',
										'theme-options',
										'theme_options_page' );
		
		add_action( "load-{$settings_page}", 'load_settings_page' );
	}

	add_action( 'admin_menu', 'my_theme_menu' );

/* ====================================================================================================================================================== */

?>