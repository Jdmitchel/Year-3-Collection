<article <?php post_class('content-lead'); ?>>
	<div class="content-thumb content-lead-thumb">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php if (has_post_thumbnail()) { the_post_thumbnail('content-single'); } else { echo '<img src="' . get_template_directory_uri() . '/images/placeholder-content-single.jpg' . '" alt="' . esc_html__('No Image', 'mh-newsdesk-lite') . '" />'; } ?></a>
	</div>
	<?php mh_newsdesk_lite_post_meta(); ?>
	<h3 class="content-lead-title"><a href="<?php echo get_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
	<div class="content-lead-excerpt">
		<?php the_excerpt(); ?>
		<?php mh_newsdesk_lite_more(); ?>
	</div>
</article>