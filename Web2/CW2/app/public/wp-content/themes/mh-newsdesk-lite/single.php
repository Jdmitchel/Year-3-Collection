<?php get_header(); ?>
<div class="mh-section mh-group">
	<div id="main-content" class="mh-content"><?php
		mh_newsdesk_lite_before_post_content();
		while (have_posts()) : the_post();
			get_template_part('content', 'single');
			mh_newsdesk_lite_postnav();
			get_template_part('template', 'authorbox');
			comments_template();
		endwhile; ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>