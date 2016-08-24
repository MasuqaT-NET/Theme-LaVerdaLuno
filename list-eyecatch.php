<?php

if (has_post_thumbnail()) :
	the_post_thumbnail('thumbnail', array('class' => "alignright"));
else :
	$category = get_the_category();
	$dir =  wp_upload_dir();
	$eyecatch_png_dir = $dir['basedir'] . '/categories/' . $category[0]->slug . '.png';
	if (file_exists($eyecatch_png_dir)) {
		$eyecatch_url = $dir['baseurl'] . '/categories/' . $category[0]->slug . '.png';
	} else {
		$eyecatch_url = get_template_directory_uri() . '/library/images/nothumb.gif';
	}
	echo '<img src="' . $eyecatch_url . '" width="150" height="150" class="alignright wp-post-image" alt="default" />';
endif;

?>