<?php get_header(); ?>
<div class="mh-section mh-group">
	<div id="main-content" class="mh-loop"><?php
		mh_newsdesk_lite_before_page_content();
		mh_newsdesk_lite_page_title();
		if (is_home() && $paged < 2 || is_category() && $paged < 2) {
			get_template_part('content', 'news');
		} else {
			if (have_posts()) :
				while (have_posts()) : the_post();
					get_template_part('content');
				endwhile;
				mh_newsdesk_lite_pagination();
			else :
				get_template_part('content', 'none');
			endif;
		} ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>