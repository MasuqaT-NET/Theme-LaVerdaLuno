<?php
	$categories = get_the_category();
	$tags = get_the_tags();

	// get a category, returns html-tag
	$category_formatter = function($c)
	{
		return '<a href="' . get_category_link($c->term_id) . '">' . $c->cat_name . '</a>';
	};

	// get a tag, returns html-tag
	$tag_formatter = function($t)
	{
		return '<a href="' . get_tag_link($t->term_id) . '">' . $t->name . '</a>';
	};
?>
<p class="entry-meta vcard">
	<span class="posted-on"><i class="fa fa-calendar"></i><a href="<?php echo get_month_link('',''); ?>"><time class="updated entry-time" datetime="<?php echo get_the_time('Y-m-d'); ?>" itemprop="datePublished"><?php echo get_the_time(get_option('date_format')); ?></time></a></span>
	<span class="category-link"><i class="fa fa-folder"></i><?php if($categories) { echo implode(', ', array_map($category_formatter, $categories)); } else { echo 'N/A'; } ?></span>
	<span class="tag-links"><i class="fa fa-tags"></i><?php if($tags) { echo implode(', ', array_map($tag_formatter, $tags)); } else { echo 'N/A'; } ?></span>
	<span class="comments"><i class="fa fa-comment"></i><?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></span>
</p>