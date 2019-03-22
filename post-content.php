<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php

if ( have_posts() ) :

	// Loop Start
	while ( have_posts() ) :

		the_post();

?>	

	<div class="post-media">
		<?php the_post_thumbnail('ashe-full-thumbnail'); ?>
	</div>

	<header class="post-header">

		<?php if ( get_the_title() ) : ?>
		<h1 class="post-title"><?php the_title(); ?></h1>
		<?php endif; ?>

	</header>

	<div class="post-content">

		<?php

		// The Post Content
		the_content('');

		?>
	</div>

	<footer class="post-footer">

		<?php 

		// The Tags
		$tag_list = get_the_tag_list( '<div class="post-tags">','','</div>');
		
		if ( $tag_list ) {
			echo ''. $tag_list;
		}

		?>
		
	</footer>

<?php

	endwhile; // Loop End
endif; // have_posts()

?>

</article>