<?php
/**
 * The template for displaying the venue page
 *
 ***************** NOTICE: *****************
 *  Do not make changes to this file. Any changes made to this file
 * will be overwritten if the plug-in is updated.
 *
 * To overwrite this template with your own, make a copy of it (with the same name)
 * in your theme directory. See http://docs.wp-event-organiser.com/theme-integration for more information
 *
 * WordPress will automatically prioritise the template in your theme directory.
 ***************** NOTICE: *****************
 *
 * @package Event Organiser (plug-in)
 * @since 1.0.0
 */

get_header();

if ( is_front_page() ) {

	// Featured Slider, Carousel
	if ( ashe_options( 'featured_slider_label' ) === true && ashe_options( 'featured_slider_location' ) !== 'blog' ) {
		if ( ashe_options( 'featured_slider_source' ) === 'posts' ) {
			get_template_part( 'templates/header/featured', 'slider' );
		} else {
			get_template_part( 'templates/header/featured', 'slider-custom' );
		}
	}

	// Featured Links, Banners
	if ( ashe_options( 'featured_links_label' ) === true && ashe_options( 'featured_links_location' ) !== 'blog' ) {
		get_template_part( 'templates/header/featured', 'links' ); 
	}

}

?>

<div class="main-content clear-fix<?php echo esc_attr(ashe_options( 'general_content_width' )) === 'boxed' ? ' boxed-wrapper': ''; ?>" data-sidebar-sticky="<?php echo esc_attr( ashe_options( 'general_sidebar_sticky' )  ); ?>">
	
	<?php
	
	// Sidebar Left
	get_template_part( 'templates/sidebars/sidebar', 'left' ); 

	?>

	<!-- Main Container -->
	<div class="main-container">
		<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php $venue_id = get_queried_object_id(); ?>
		
			<h1 class="page-title">
				<?php printf( __( '%s', 'eventorganiser' ), '<span>' . eo_get_venue_name( $venue_id ) . '</span>' );?>
			</h1>

			<h4>
			<?php $address_details = eo_get_venue_address(); 
				echo $address_details['address']; 
				echo "<br>";
				echo $address_details['city'];
				echo ", ";
				echo $address_details['state'];
				echo " ";
				echo $address_details['postcode'];?>
			</h4>
		
			<?php
			if ( $venue_description = eo_get_venue_description( $venue_id ) ) {
				echo '<div class="venue-archive-meta">' . $venue_description . '</div>';
			}
			?>

			<!-- Display the venue map. If you specify a class, ensure that class has height/width dimensions-->
			<?php
			if ( eo_venue_has_latlng( $venue_id ) ) {
				echo eo_get_venue_map( $venue_id, array( 'width' => '100%' ) );
			}
			?>

			<!-- <h2>
				<?php printf( __( 'Events at %s', 'eventorganiser' ), '<span>' . eo_get_venue_name( $venue_id ) . '</span>' );?>
			</h2> -->

			<?php //eo_get_template_part( 'eo-loop-events' ); //Lists the events ?>

		</article>

	</div><!-- .main-container -->

	<?php
	
	// Sidebar Right
	get_template_part( 'templates/sidebars/sidebar', 'right' ); 

	?>

</div><!-- .page-content -->

<?php get_footer(); ?>
