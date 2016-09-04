<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

					<main id="main" class="m-all t-all d-5of7 cf" role="main">
						<h1 class="archive-title"><span>Result for:</span> <?php echo esc_attr(get_search_query()); ?></h1>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

								<?php get_template_part('list', 'header'); ?>

								<section class="entry-content">
									<?php get_template_part('list', 'eyecatch'); ?>

									<?php the_content('Continue Reading'); ?>
								</section>

								<?php get_template_part('list', 'footer'); ?>

							</article>

						<?php endwhile; ?>

								<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Sorry, No Results.', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Try your search again.', 'bonestheme' ); ?></p>
										</section>
										<section class="search">
											<p><?php get_search_form(); ?></p>
										</section>
										<footer class="article-footer">
											<!--	<p><?php _e( 'This is the error message in the search.php template.', 'bonestheme' ); ?></p>	-->
										</footer>
									</article>

							<?php endif; ?>

						</main>

							<?php get_sidebar(); ?>

					</div>

			</div>

<?php get_footer(); ?>
