<?php
/**
 * Template Name: Custom Page Template
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Carla_Harrell
 * @since Carla Harrell 1.0
 */
get_header(); ?>
<div class="main_container">
  <?php while ( have_posts() ) : the_post(); ?>
  <?php the_content();?>
  <?php endwhile; // end of the loop. ?>
</div>
<?php get_footer(); ?>
