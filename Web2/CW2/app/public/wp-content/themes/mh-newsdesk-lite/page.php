<?php get_header(); ?>
<div class="mh-section mh-group">
	<div id="main-content" class="mh-content"><?php
		mh_newsdesk_lite_before_page_content();
		while (have_posts()) : the_post();
			get_template_part('content', 'page');
			comments_template();
		endwhile; ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>