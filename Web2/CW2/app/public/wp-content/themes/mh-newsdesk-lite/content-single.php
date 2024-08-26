<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header mh-clearfix">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php the_tags('<div class="entry-tags mh-clearfix"><span>' . esc_html__('TOPICS:', 'mh-newsdesk-lite') . '</span>','','</div>'); ?>
	</header>
	<?php mh_newsdesk_lite_featured_image(); ?>
	<?php mh_newsdesk_lite_post_meta(); ?>
	<div class="entry-content mh-clearfix">
		<?php the_content(); ?>
	</div>
</article>