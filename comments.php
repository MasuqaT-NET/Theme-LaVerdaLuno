<?php
/*
The comments page for Bones
*/

// don't load it if you can't comment
if ( post_password_required() ) {
  return;
}

?>

<?php // You can start editing here. ?>
<div id="comments">
  <?php if ( have_comments() ) : ?>

    <h3 id="comments-title" class="h2"><?php comments_number('0 Comments', '1 Comment', '% Comments');?></h3>

    <section class="commentlist">
      <?php
        wp_list_comments( array(
          'style'             => 'ul', //'div',
          'short_ping'        => true,
          'avatar_size'       => 40,
          'callback'          => '', //'bones_comments',
          'type'              => 'all',
          'reply_text'        => 'Reply',
          'page'              => '',
          'per_page'          => '',
          'reverse_top_level' => null,
          'reverse_children'  => ''
        ) );
      ?>
    </section>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
              global $cpage;
              if( $cpage == '') {
                $latest_comment = get_comments( array('number' => 1, 'post_id' => get_the_ID(), 'status' => 'approve') );
                if( $latest_comment ) foreach ($latest_comment as $c) {
                  $current_num = get_page_of_comment($c->comment_ID);
                }
              } else {
                $current_num = $cpage;
              }
    ?>
    	<nav class="cf navigation comment-navigation" role="navigation">
      	<div class="comment-nav-prev"><?php previous_comments_link('<span class="meta-nav"><i class="fa fa-chevron-left"></i> Older Comments</span> Page ' . ($current_num - 1)); ?></div>
      	<div class="comment-nav-next"><?php next_comments_link('<span class="meta-nav">Newer Comments <i class="fa fa-chevron-right"></i></span> Page ' . ($current_num + 1)); ?></div>
    	</nav>
    <?php endif; ?>

    <?php if ( ! comments_open() ) : ?>
    	<p class="no-comments"><?php _e( 'Comments are closed.' , 'bonestheme' ); ?></p>
    <?php endif; ?>

  <?php endif; ?>

  <?php comment_form(array('label_submit'=>'Post Comment')); ?>
</div>