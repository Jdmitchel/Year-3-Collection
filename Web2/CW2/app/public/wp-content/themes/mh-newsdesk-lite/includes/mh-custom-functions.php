<?php

/***** Logo/Sitename *****/

if (!function_exists('mh_newsdesk_lite_logo')) {
	function mh_newsdesk_lite_logo() {
		$header_img = get_header_image();
		$header_title = get_bloginfo('name');
		$header_desc = get_bloginfo('description');
		echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr($header_title) . '" rel="home">' . "\n";
		echo '<div class="logo-wrap" role="banner">' . "\n";
		if ($header_img) {
			echo '<img src="' . esc_url($header_img) . '" height="' . get_custom_header()->height . '" width="' . get_custom_header()->width . '" alt="' . esc_attr($header_title) . '" />' . "\n";
		}
		if (display_header_text()) {
			$text_color = get_header_textcolor();
			if ($text_color != get_theme_support('custom-header', 'default-text-color')) {
				echo '<style type="text/css" id="mh-header-css">';
					echo '.logo-title, .logo-tagline { color: #' . esc_attr($text_color) . '; }';
				echo '</style>' . "\n";
			}
			echo '<div class="logo">' . "\n";
			if ($header_title) {
				echo '<h1 class="logo-title">' . esc_attr($header_title) . '</h1>' . "\n";
			}
			if ($header_desc) {
				echo '<h2 class="logo-tagline">' . esc_attr($header_desc) . '</h2>' . "\n";
			}
			echo '</div>' . "\n";
		}
		echo '</div>' . "\n";
		echo '</a>' . "\n";
	}
}

/***** Page Title Output *****/

if (!function_exists('mh_newsdesk_lite_page_title')) {
	function mh_newsdesk_lite_page_title() {
		if (!is_front_page()) {
			echo '<h1 class="page-title">';
			if (is_archive()) {
				if (is_category() || is_tax()) {
					single_cat_title();
				} elseif (is_tag()) {
					single_tag_title();
				} elseif (is_author()) {
					global $author;
					$user_info = get_userdata($author);
					printf(_x('Articles by %s', 'post author', 'mh-newsdesk-lite'), esc_attr($user_info->display_name));
				} elseif (is_day()) {
					echo get_the_date();
				} elseif (is_month()) {
					echo get_the_date('F Y');
				} elseif (is_year()) {
					echo get_the_date('Y');
				} elseif (is_post_type_archive()) {
					global $post;
					$post_type = get_post_type_object(get_post_type($post));
					echo $post_type->labels->name;
				} else {
					esc_html_e('Archives', 'mh-newsdesk-lite');
				}
			} else {
				if (is_home()) {
					echo get_the_title(get_option('page_for_posts', true));
				} elseif (is_404()) {
					esc_html_e('Page not found (404)', 'mh-newsdesk-lite');
				} elseif (is_search()) {
					printf(__('Search Results for %s', 'mh-newsdesk-lite'), esc_attr(get_search_query()));
				} else {
					the_title();
				}
			}
			echo '</h1>' . "\n";
		}
	}
}

/***** Output Post Meta Data *****/

if (!function_exists('mh_newsdesk_lite_post_meta')) {
	function mh_newsdesk_lite_post_meta() {
		echo '<p class="entry-meta">' . "\n";
			if (has_category() && !is_single()) {
				echo '<span class="entry-meta-cats">' . get_the_category_list(', ', '') . '</span>' . "\n";
			}
			if (is_single()) {
				echo '<span class="entry-meta-author vcard author">' . sprintf(_x('Posted By: %s', 'post author', 'mh-newsdesk-lite'), '<a class="fn" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a>') . '</span>' . "\n";
			}
			echo '<span class="entry-meta-date updated">' . get_the_date() . '</span>' . "\n";
		echo '</p>' . "\n";
	}
}

/***** Featured Image on Posts *****/

if (!function_exists('mh_newsdesk_lite_featured_image')) {
	function mh_newsdesk_lite_featured_image() {
		global $page, $post;
		if (has_post_thumbnail() && $page == '1') {
			echo "\n" . '<figure class="entry-thumbnail">' . "\n";
				the_post_thumbnail('content-single');
				if (get_the_post_thumbnail_caption()) {
					echo '<figcaption class="wp-caption-text">' . wp_kses_post(get_the_post_thumbnail_caption()) . '</figcaption>' . "\n";
				}
			echo '</figure>' . "\n";
		}
	}
}

/***** Custom Excerpts *****/

if (!function_exists('mh_newsdesk_lite_trim_excerpt')) {
	function mh_newsdesk_lite_trim_excerpt($text = '') {
		$raw_excerpt = $text;
		if ('' == $text) {
			$mh_newsdesk_lite_lite_options = mh_newsdesk_lite_theme_options();
			$text = get_the_content('');
			$text = strip_shortcodes($text);
			$text = apply_filters('the_content', $text);
			$text = str_replace(']]>', ']]&gt;', $text);
			$excerpt_length = apply_filters('excerpt_length', $mh_newsdesk_lite_lite_options['excerpt_length']);
			$excerpt_more = apply_filters('excerpt_more', '...');
			$text = wp_trim_words($text, $excerpt_length, $excerpt_more);
		}
		return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
	}
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'mh_newsdesk_lite_trim_excerpt');

/***** Pagination *****/

if (!function_exists('mh_newsdesk_lite_pagination')) {
	function mh_newsdesk_lite_pagination() {
		if (get_the_posts_pagination()) {
			echo '<div class="mh-loop-pagination mh-clearfix">';
				the_posts_pagination(array(
					'mid_size' => 1,
					'prev_text' => esc_html__('&laquo;', 'mh-newsdesk-lite'),
					'next_text' => esc_html__('&raquo;', 'mh-newsdesk-lite'),
				));
			echo '</div>';
		}
	}
}

/***** Pagination for paginated Posts *****/

if (!function_exists('mh_newsdesk_lite_posts_pagination')) {
	function mh_newsdesk_lite_posts_pagination($content) {
		if (is_singular() && is_main_query()) {
			$content .= wp_link_pages(array('before' => '<div class="pagination clear">', 'after' => '</div>', 'link_before' => '<span class="pagelink">', 'link_after' => '</span>', 'nextpagelink' => __('&raquo;', 'mh-newsdesk-lite'), 'previouspagelink' => __('&laquo;', 'mh-newsdesk-lite'), 'pagelink' => '%', 'echo' => 0));
		}
		return $content;
	}
}
add_filter('the_content', 'mh_newsdesk_lite_posts_pagination', 1);

/***** Post / Image Navigation *****/

if (!function_exists('mh_newsdesk_lite_postnav')) {
	function mh_newsdesk_lite_postnav() {
		global $post;
		$parent_post = get_post($post->post_parent);
		$attachment = is_attachment();
		$previous = ($attachment) ? $parent_post : get_adjacent_post(false, '', true);
		$next = get_adjacent_post(false, '', false);

		if (!$next && !$previous)
		return;

		if ($attachment) {
			$attachments = get_children(array('post_type' => 'attachment', 'post_mime_type' => 'image', 'post_parent' => $parent_post->ID));
			$count = count($attachments);
		}
		echo '<nav class="post-nav-wrap" role="navigation">' . "\n";
			echo '<ul class="post-nav mh-clearfix">' . "\n";
				echo '<li class="post-nav-prev">' . "\n";
					if ($attachment) {
						if ($count == 1) {
							$permalink = get_permalink($parent_post);
							echo '<a href="' . $permalink . '"><i class="fa fa-chevron-left"></i>' . esc_html__('Back to post', 'mh-newsdesk-lite') . '</a>';
						} else {
							previous_image_link('%link', '<i class="fa fa-chevron-left"></i>' . esc_html__('Previous image', 'mh-newsdesk-lite'));
						}
					} else {
						previous_post_link('%link', '<i class="fa fa-chevron-left"></i>' . esc_html__('Previous post', 'mh-newsdesk-lite'));
					}
				echo '</li>' . "\n";
				echo '<li class="post-nav-next">' . "\n";
					if ($attachment) {
						next_image_link('%link', esc_html__('Next image', 'mh-newsdesk-lite') . '<i class="fa fa-chevron-right"></i>');
					} else {
						next_post_link('%link', esc_html__('Next post', 'mh-newsdesk-lite') . '<i class="fa fa-chevron-right"></i>');
					}
				echo '</li>' . "\n";
			echo '</ul>' . "\n";
		echo '</nav>' . "\n";
	}
}

/***** Custom Commentlist *****/

if (!function_exists('mh_newsdesk_lite_comments')) {
	function mh_newsdesk_lite_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; ?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<div id="comment-<?php comment_ID(); ?>">
				<div class="vcard meta">
					<?php echo get_avatar($comment->comment_author_email, 70); ?>
					<?php echo get_comment_author_link() ?> |
					<a href="<?php echo esc_url(get_comment_link($comment->comment_ID)) ?>"><?php printf(__('%1$s at %2$s', 'mh-newsdesk-lite'), get_comment_date(),  get_comment_time()) ?></a> |
					<?php if (comments_open() && $args['max_depth']!=$depth) { ?>
					<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
					<?php } ?>
					<?php edit_comment_link(__('(Edit)', 'mh-newsdesk-lite'),'  ','') ?>
				</div>
				<?php if ($comment->comment_approved == '0') : ?>
					<div class="comment-info"><?php esc_html_e('Your comment is awaiting moderation.', 'mh-newsdesk-lite') ?></div>
				<?php endif; ?>
				<div class="comment-text">
					<?php comment_text() ?>
				</div>
			</div><?php
	}
}

/***** Custom Comment Fields *****/

if (!function_exists('mh_newsdesk_lite_comment_fields')) {
	function mh_newsdesk_lite_comment_fields($fields) {
		$commenter = wp_get_current_commenter();
		$req = get_option('require_name_email');
		$aria_req = ($req ? " aria-required='true'" : '');
		$consent = empty($commenter['comment_author_email']) ? '' : ' checked="checked"';
		$fields =  array(
			'author'	=>	'<p class="comment-form-author"><label for="author">' . esc_html__('Name ', 'mh-newsdesk-lite') . '</label>' . ($req ? '<span class="required">*</span>' : '') . '<br/><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></p>',
			'email' 	=>	'<p class="comment-form-email"><label for="email">' . esc_html__('Email ', 'mh-newsdesk-lite') . '</label>' . ($req ? '<span class="required">*</span>' : '' ) . '<br/><input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></p>',
			'url' 		=>	'<p class="comment-form-url"><label for="url">' . esc_html__('Website', 'mh-newsdesk-lite') . '</label><br/><input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></p>',
			'cookies' 	=>  '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' . '<label for="wp-comment-cookies-consent">' . esc_html__('Save my name, email, and website in this browser for the next time I comment.', 'mh-newsdesk-lite') . '</label></p>'
		);
		return $fields;
	}
}
add_filter('comment_form_default_fields', 'mh_newsdesk_lite_comment_fields');

/***** Read More Button *****/

function mh_newsdesk_lite_more() {
	$mh_newsdesk_lite_lite_options = mh_newsdesk_lite_theme_options(); ?>
	<a class="button" href="<?php the_permalink(); ?>">
		<span><?php echo esc_attr($mh_newsdesk_lite_lite_options['excerpt_more']); ?></span>
	</a><?php
}

/***** Add CSS classes to body tag *****/

if (!function_exists('mh_newsdesk_lite_body_class')) {
	function mh_newsdesk_lite_body_class($classes) {
		$mh_newsdesk_lite_lite_options = mh_newsdesk_lite_theme_options();
		$classes[] = 'mh-' . $mh_newsdesk_lite_lite_options['sidebar'] . '-sb';
		return $classes;
	}
}
add_filter('body_class', 'mh_newsdesk_lite_body_class');

/***** Add CSS3 Media Queries Support for older versions of IE *****/

function mh_newsdesk_lite_ie_media_queries() {
	echo '<!--[if lt IE 9]>' . "\n";
	echo '<script src="' . get_template_directory_uri() . '/js/css3-mediaqueries.js"></script>' . "\n";
	echo '<![endif]-->' . "\n";
}
add_action('wp_head', 'mh_newsdesk_lite_ie_media_queries');

?>