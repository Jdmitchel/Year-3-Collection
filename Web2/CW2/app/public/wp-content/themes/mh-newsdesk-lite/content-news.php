<?php /* Template for displaying posts page and category archives */
if (have_posts()) :
	$counter = 1;
	$max_posts = $wp_query->post_count;
	while (have_posts()) : the_post();
		if ($counter == 1) :
			get_template_part('content', 'lead'); ?>
			<hr class="mh-separator"><?php
		else :
			get_template_part('content');
		endif;
		$counter++;
	endwhile;
else :
	get_template_part('content', 'none');
endif;
mh_newsdesk_lite_pagination(); ?>