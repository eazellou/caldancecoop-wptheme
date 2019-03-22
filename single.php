<?php get_header(); ?>

<!-- Page Content -->
<div class="main-content clear-fix<?php echo ( ashe_options( 'general_single_width' ) === 'boxed'  ) ? ' boxed-wrapper': ''; ?>" data-sidebar-sticky="<?php echo esc_attr( ashe_options( 'general_sidebar_sticky' )  ); ?>">


	<?php

	// Sidebar Alt 
	get_template_part( 'templates/sidebars/sidebar', 'alt' ); 

	// Sidebar Left
	get_template_part( 'templates/sidebars/sidebar', 'left' );

	?>

	<!-- Main Container -->
	<div class="main-container">

		<?php

		// Single Post
		get_template_part( 'post', 'content' );

		?>

	</div><!-- .main-container -->


	<?php // Sidebar Right

	get_template_part( 'templates/sidebars/sidebar', 'right' );

	?>

</div><!-- .page-content -->

<?php get_footer(); ?>