<?php
/**
 * The template for displaying posts in the Status post format
 *
 * @package WordPress
 * @subpackage Carla_Analytics
 * @since Carla Analytics 1.0
 */

/* translators: %s: Post title. */
$post_title = sprintf( __( 'Permalink to %s', 'carlaanalytics' ), the_title_attribute( 'echo=0' ) );
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-header">
			<header>
				<h1><?php the_author(); ?></h1>
				<h2><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( $post_title ); ?>" rel="bookmark"><?php echo get_the_date(); ?></a></h2>
			</header>
			<?php
			/**
			 * Filter the status avatar size.
			 *
			 * @since Carla Analytics 1.0
			 *
			 * @param int $size The height and width of the avatar in pixels.
			 */
			$status_avatar = apply_filters( 'carlaanalytics_status_avatar', 48 );
			echo get_avatar( get_the_author_meta( 'ID' ), $status_avatar );
			?>
		</div><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'carlaanalytics' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
			<?php if ( comments_open() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'carlaanalytics' ) . '</span>', __( '1 Reply', 'carlaanalytics' ), __( '% Replies', 'carlaanalytics' ) ); ?>
			</div><!-- .comments-link -->
			<?php endif; // comments_open() ?>
			<?php edit_post_link( __( 'Edit', 'carlaanalytics' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
