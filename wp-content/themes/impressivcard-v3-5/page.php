<?php
	$single_page_viewing = get_option( 'single_page_viewing', 'Yes' );
	
	if ( $single_page_viewing == 'Yes' )
	{
		get_template_part( 'page', 'single' );
	}
	else
	{
		$post = get_post( get_the_ID() );
		$slug = $post->post_name;
		
		wp_redirect( home_url() . '/#/' . $slug );
	}
	// end if
?>