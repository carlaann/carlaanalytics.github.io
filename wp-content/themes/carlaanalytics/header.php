<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Carla_Harrell
 * @since Carla Harrell 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta name="format-detection" content="telephone=no">
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js?ver=3.7.0" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="site_page">

    <header class="site-masthead">
        <nav class="navbar navbar-default">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="navbar-wrapper">
              <?php wp_nav_menu(array('theme_location' => 'primary','menu_class' => 'nav navbar-nav navbar-right', 'container' => ''));?>              
            </div><!-- /.navbar-collapse -->

          </div><!-- /.container-fluid -->
        </nav>
    </header>
	
    <div class="banner_wrapper">
    <?php 
          $innerbnr = get_field('banner_image',$post->ID);        
		?>
    <?php if(!empty($innerbnr)){?>
          <img src="<?php echo $innerbnr; ?>" alt="<?php the_title(); ?>" class="img-responsive">          
    <?php }else{?>
          <img src="<?php bloginfo('template_url'); ?>/images/new-inner-banner.jpg" alt="<?php the_title(); ?>" class="img-responsive">
      <?php }?>
    </div>
    
	<div class="main_wrapper">
