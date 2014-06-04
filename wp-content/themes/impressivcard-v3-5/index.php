<?php
	get_header();
?>

<div id="pages">
	<!-- WIDGETS -->
	<?php
		if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'pages' ) ) :
		endif;
	?>
	<!-- end WIDGETS -->
</div>
<!-- end #pages -->

<?php
	get_footer();
?>