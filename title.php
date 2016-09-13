<title>
<?php if(is_home()): ?>
<?php bloginfo('name'); ?> ― <?php bloginfo('description'); ?>

<?php elseif(is_page()): ?>
<?php wp_title(''); ?> §§ <?php bloginfo('name'); ?>

<?php elseif(is_single()): ?>
<?php wp_title(''); ?> §§ <?php bloginfo('name'); ?>

<?php elseif(is_category()): ?>
Category: '<?php single_cat_title() ?>' §§ <?php bloginfo('name'); ?>

<?php elseif(is_tag()): ?>
Tag: '<?php single_tag_title() ?>' §§ <?php bloginfo('name'); ?>

<?php elseif(is_year()): ?>
Year: <?php the_time("Y") ?> §§ <?php bloginfo('name'); ?>

<?php elseif(is_month()): ?>
Month: <?php the_time("Y/m") ?> §§ <?php bloginfo('name'); ?>

<?php elseif(is_date()): // not care about is_time() ?>
Date: <?php the_time("Y/m/d") ?> §§ <?php bloginfo('name'); ?>

<?php elseif(is_search()): ?>
Result for: '<?php echo esc_attr(get_search_query()); ?>' §§ <?php bloginfo('name'); ?>

<?php else: ?>
<?php bloginfo('name'); ?>

<?php endif; ?>
</title>