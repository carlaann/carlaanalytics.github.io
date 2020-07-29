<?php
/**
 * Implement an optional custom function for Carla Harrell
 *
 * See http://codex.wordpress.org/Custom_Function
 *
 * @package WordPress
 * @subpackage Carla_Harrell
 * @since Carla Harrell 1.0
 */
?>
<?php
//Add Image Size

add_image_size( 'service-thumb', 104, 104, true );
add_image_size( 'blog-thumb', 314, 235, true );


// ADD Script
function theme_scripts() {
	wp_enqueue_style( 'font-awesome-style','https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '', false );
	wp_enqueue_script('jquery');	
	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '', true );
	wp_enqueue_script( 'site-script',get_template_directory_uri() . '/js/custom-script.js?hls='.time(), array(), '', true );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

// ADD CSS
function load_css_files() {
	wp_deregister_style( 'carlaann-style' );
	wp_deregister_style( 'cnss_font_awesome_v4_shims' );
	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/bootstrap.css', array(), '', false );
	wp_enqueue_style( 'normalize-theme', get_template_directory_uri() . '/css/bootstrap-theme.min.css', array(), '', false );
    wp_register_style( 'carlaann', get_stylesheet_uri(), array( 'normalize' ));
    wp_enqueue_style( 'carlaann' );
	wp_enqueue_style( 'gfont-style','https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Bebas+Neue&display=swap', array(), '', false );
	wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/custom-style.css?hls='.time(), array(), '', false );
}
add_action( 'wp_enqueue_scripts', 'load_css_files' );

// Register logo section
function site_theme_customizer( $wp_customize ) {

	$wp_customize->add_panel('theme_panel',array(
		'title'=>__( 'Theme Settings', 'site' ),
		'description'=> 'Edit Theme Settings',
		'priority'=> 32,
	));
	
	$wp_customize->add_section( 'page_footer_section' , array(
		'title'       => __( 'Footer', 'site' ),
		'priority'    => 3,
		'description' => 'Footer Settings',
		'panel'=>'theme_panel',
	) );

	$wp_customize->add_setting('ftr_copyright',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'ftr_copyright',
		array(
			'label' => 'Copyright Text',
			'section' => 'page_footer_section',
			'type' => 'text',
		)
	);
	
		
}
add_action('customize_register', 'site_theme_customizer');

function footer_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Footer Sidebar', 'carlaann' ),
		'id' => 'sidebar-4',
		'description' => __( 'Appears on posts and pages footer', 'carlaann' ),
		'before_widget' => '<aside id="%1$s" class="widget col-sm-4 %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}
add_action( 'widgets_init', 'footer_widgets_init' );	

// Shortcodes within a WordPress Text widget
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');

function font_admin_init() {
   wp_enqueue_style('font-awesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'); 
}

add_action('admin_init', 'font_admin_init');

function custom_post_css() {
   echo "<style type='text/css' media='screen'>
			#adminmenu .menu-icon-crlnservice div.wp-menu-image:before {
				font-family:  FontAwesome !important;
				content: '\\f085'; // this is where you enter the fontaweseom font code
			}

			#adminmenu .menu-icon-carlaannevent div.wp-menu-image:before {
				font-family:  FontAwesome !important;
				content: '\\f073'; // this is where you enter the fontaweseom font code
			}
     </style>";
}
add_action('admin_head', 'custom_post_css');


function get_the_content_with_formatting ($more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
	$content = get_the_content($more_link_text, $stripteaser, $more_file);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}


// Create Custom Post type for Team
add_action('init', 'service_register');
function service_register() {
	$labels = array(
        'name' => _x( 'Services', 'crlnservice' ),
        'singular_name' => _x( 'Service', 'crlnservice' ),
        'add_new' => _x( 'Add New', 'crlnservice' ),
        'add_new_item' => _x( 'Add Service', 'crlnservice' ),
        'edit_item' => _x( 'Edit Service', 'crlnservice' ),
        'new_item' => _x( 'New New', 'crlnservice' ),
        'view_item' => _x( 'View Service', 'crlnservice' ),
        'search_items' => _x( 'Search Service', 'crlnservice' ),
        'not_found' => _x( 'Nothing found', 'crlnservice' ),
        'not_found_in_trash' => _x( 'Nothing found in Trash', 'crlnservice' ),
        'parent_item_colon' => _x( 'Parent Service List:', 'crlnservice' ),
        'menu_name' => _x( 'Work', 'crlnservice' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Service Lists filterable by Category',
        'supports' => array( 'title','editor','excerpt', 'thumbnail' ),
        'taxonomies' => array( '' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 30,
        'menu_icon' => '',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    ); 
 	register_post_type( 'crlnservice' , $args );
}


function service_collections( $atts, $content ) {
    extract(shortcode_atts(array(
		'per_page' => '-1',
        ), $atts));
		
	$shortcode_id = rand(0,99999);
	$output = '';

	// WP_Query arguments
		$args = array (
		'post_type'              => 'crlnservice',
		'post_status'            => 'publish',
		'posts_per_page'         => -1,
	);
	
	
	// The Query
	$the_query = new WP_Query( $args );
	// The Loop
	if ( $the_query->have_posts() ) {

		$output.='<div class="service_area"><div class="row" id="teamlist-'.$shortcode_id.'">';
		while ( $the_query->have_posts() ) {
			$the_query->the_post();

			$service_thumb = wp_get_attachment_image_src( get_post_thumbnail_id($the_query->post->ID),'service-thumb' );
			$iconurl = get_field('icon_url',$post->ID);
			
			$output.='<div class="col-sm-6"><div class="service_wraper">';
			if(!empty($iconurl)){
				$output.='<div class="pull-left"><a href="'.$iconurl.'" target="_blank"><img src="'.$service_thumb[0].'" class="img-responsive" /></a></div>';
			}else{
				$output.='<div class="pull-left"><img src="'.$service_thumb[0].'" class="img-responsive" /></div>';
			}			
			$output.='<h3>'.$the_query->post->post_title.'</h3>'.get_the_content_with_formatting($the_query->post->ID);			
			$output.='</div></div>';
		}
		$output.='</div></div>';
	} else {
		$output .= 'Not Found';
	}


	// Restore original Post Data
	wp_reset_postdata();
	return $output;
}
add_shortcode( 'work_list', 'service_collections' );




function free_form( $atts, $content ) {
    extract(shortcode_atts(array(
		'email' => 'abc@xyz.com',
        ), $atts));
		
	$shortcode_id = rand(0,99999);
	$output = '';

	$output.= '<form action="https://formspree.io/'.$email.'" method ="POST"><div class="onlineform"><div class="row"><div class="col-sm-6"><div class="form-group"><input type="text" class="form-control" id="your-name" name="name" placeholder="Name" required></div></div><div class="col-sm-6"><div class="form-group"><input type="text" name="_replyto" class="form-control" id="your-email" placeholder="E-mail" required></div></div><div class="col-sm-12"><div class="form-group"><input type="tel" name="phone" class="form-control" id="your-phone" placeholder="Phone"></div></div><div class="col-sm-12"><div class="form-group"><textarea name="message" class="form-control" placeholder="Message" required></textarea></div></div><div class="col-sm-12 text-center"><input type="submit" class="btn btn-default" value="Submit"></div></div></div></form>';

	return $output;
}
add_shortcode( 'contact_form', 'free_form' );

function blog_collections( $atts, $content ) {
    extract(shortcode_atts(array(
		'per_page' => '-1',
        ), $atts));
		
	$shortcode_id = rand(0,99999);
	$output = '';
	$i=1;
	$even= '';
	$left='';
	$right='';
	$last='';

	// WP_Query arguments
		$args = array (
		'post_type'              => 'post',
		'post_status'            => 'publish',
		'posts_per_page'         => -1,
		'cat'					 => 3
	);
	
	
	// The Query
	$the_query = new WP_Query( $args );

	$count = $the_query->found_posts;
	// The Loop
	if ( $the_query->have_posts() ) {

		$output.='<div class="blog_area" id="teamlist-'.$shortcode_id.'">';
		while ( $the_query->have_posts() ) {
			$the_query->the_post();

			$service_thumb = wp_get_attachment_image_src( get_post_thumbnail_id($the_query->post->ID),'blog-thumb' );
			if($i%2 == 0){
				$even= ' even';
				$left=' col-sm-push-8';
				$right=' col-sm-pull-4';
			}else{
				$even= '';
				$left='';
				$right='';
			}
			if($i == $count){
				$last=' last';
			}else{
				$last='';
			}
			
			$output.='<div class="blog_wrapper'.$even.$last.'"><div class="row vertical-align">';
			$output.='<div class="col-sm-4'.$left.'"><img src="'.$service_thumb[0].'" class="img-responsive" /></div>';
			$output.='<div class="col-sm-8'.$right.'"><h3>'.$the_query->post->post_title.'</h3><p>'.$the_query->post->post_content.'</p></div>';			
			$output.='</div></div>';
			$i++;
		}
		$output.='</div>';

	} else {
		$output .= 'Not Found';
	}


	// Restore original Post Data
	wp_reset_postdata();
	return $output;
}
add_shortcode( 'blog_list', 'blog_collections' );


function carlaann_rewrite_rules() {
    service_register();
    /*event_register();*/

    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'carlaann_rewrite_rules' );


