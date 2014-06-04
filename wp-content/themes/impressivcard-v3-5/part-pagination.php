<?php
	if ( get_previous_posts_link() == "" )
	{
		?>
			<!-- NAV -->
			<ul id="filters">
				<li class="current pf-all-items">
					<?php
						echo get_next_posts_link( __( 'Older Posts', 'impressivcard' ) );
					?>
				</li>
			</ul>
			<!-- end NAV -->
		<?php
	}
	elseif ( get_next_posts_link() == "" )
	{
		?>
			<!-- NAV -->
			<ul id="filters">
				<li class="current pf-all-items">
					<?php
						echo get_previous_posts_link( __( 'Newer Posts', 'impressivcard' ) );
					?>
				</li>
			</ul>
			<!-- end NAV -->
		<?php
	}
	else
	{
		?>
			<!-- NAV -->
			<ul id="filters">
				<li class="current pf-all-items">
					<?php
						echo get_previous_posts_link( __( 'Newer Posts', 'impressivcard' ) );
					?>
				</li>
				
				<li class="current pf-all-items">
					<?php
						echo get_next_posts_link( __( 'Older Posts', 'impressivcard' ) );
					?>
				</li>
			</ul>
			<!-- end NAV -->
		<?php
	}
	// end if
?>