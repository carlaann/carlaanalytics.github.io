<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Carla Harrell already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Carla_Harrell
 * @since Carla Harrell 1.0
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title">
				<?php
				if ( is_day() ) {
					/* translators: %s: Date. */
					printf( __( 'Daily Archives: %s', 'carlaann' ), '<span>' . get_the_date() . '</span>' );
				} elseif ( is_month() ) {
					/* translators: %s: Date. */
					printf( __( 'Monthly Archives: %s', 'carlaann' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'carlaann' ) ) . '</span>' );
				} elseif ( is_year() ) {
					/* translators: %s: Date. */
					printf( __( 'Yearly Archives: %s', 'carlaann' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'carlaann' ) ) . '</span>' );
				} else {
					_e( 'Archives', 'carlaann' );
				}
				?>
				</h1>
			</header><!-- .archive-header -->

			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the post format-specific template for the content. If you want
				 * to use this in a child theme then include a file called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

			endwhile;

			carlaann_content_nav( 'nav-below' );
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>