<?php /* Template Name: Page - Full Width */ ?>
<?php get_header(); ?>
<div class="page-full-width"><?php
	mh_newsdesk_lite_before_page_content();
	while (have_posts()) : the_post();
		get_template_part('content', 'page');
		comments_template();
	endwhile; ?>
</div>
<?php get_footer(); ?>