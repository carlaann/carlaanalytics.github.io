<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Carla_Analytics
 * @since Carla Analytics 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<footer class="footerContainer">	
	<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
    <div class="ftr_mdll_container">
    	<div class="container">
        	<div class="row">
            	<?php dynamic_sidebar( 'sidebar-4' ); ?>
            </div>
        </div>
	</div>
    <?php endif; ?>
	<div class="ftrBottomContainer">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<?php if(get_theme_mod('ftr_copyright')):?><p class="copyRight text-center"><?php echo get_theme_mod( 'ftr_copyright' ); ?></p><?php endif; ?>
				</div>

			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
