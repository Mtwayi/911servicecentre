<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php', // Theme customizer
  'lib/wp_bootstrap_navwalker.php' // Nav Walker
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


if( function_exists('acf_add_options_page') ) {

  acf_add_options_page();

}

// Option to show or hide form field labels on gravity forms
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );
add_action( 'wp_default_scripts', function( $scripts ) {
    if ( ! empty( $scripts->registered['jquery'] ) ) {
        $scripts->registered['jquery']->deps = array_diff( $scripts->registered['jquery']->deps, array( 'jquery-migrate' ) );
    }
} );

/* Gravity Forms After Submission Goes to Anchor */
add_filter( 'gform_confirmation_anchor', '__return_true' );
add_filter( 'gform_confirmation_anchor', function() {
    return 20;
} );


// Registering Top Bar widget
add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Top Bar', 'theme-slug' ),
        'id' => 'top_bar',
        'description' => __( 'Top Bar Section', 'theme-slug' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}


/*limit excerpt length using characters*/
function get_excerpt($count){
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_excerpt();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = $excerpt.'... <br /><a href="'.$permalink.'" class="read-more">Read More<i class="fa-chevron-right"></i></a>';
  return $excerpt;
}
function get_excerpt_button_green($count){
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_excerpt();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = $excerpt.'... <br /><a href="'.$permalink.'" class="btn green">Read More</a>';
  return $excerpt;
}

function get_excerpt_button_green_without_dots($count){
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_excerpt();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = $excerpt.'<br /><a href="'.$permalink.'" class="btn green">Read More</a>';
  return $excerpt;
}
function get_excerpt_without_button_dots($count){
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_excerpt();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = $excerpt.'';
  return $excerpt;
}
function get_excerpt_with_dots_not_button($count){
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_excerpt();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = $excerpt.'...';
  return $excerpt;
}

function get_excerpt_button_green_find_out_more($count){
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_excerpt();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = $excerpt.'... <br /><a href="'.$permalink.'" class="btn green">Find Out More</a>';
  return $excerpt;
}

/*limit excerpt length using characters*/
function get_excerpt_without_readmore($count){
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_excerpt();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  return $excerpt;
}

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  } 
  $content = preg_replace('/[.+]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}


$team_args = array(
    'id' => 'team-featured-image',
    'desc' => 'Team featured image',
    'label_name' => 'Team Featured Image',
    'label_set' => 'Set Team featured image',
    'label_remove' => 'Remove Team featured image',
    'label_use' => 'Set Team featured image',
    'post_type' => 'team',
);
$featured_images[] = $team_args;


add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {

    add_theme_support( 'post-thumbnails' );

    /* Mobile Banners*/
    add_image_size( 'mobile-banner', 800, 350, array( 'right', 'top' ) );

    /*Gallery*/
    add_image_size( 'gallery-thumb', 350, 250, array( 'right', 'top' ) );
    add_image_size( 'gallery-popup', 807, 547, array( 'right', 'top' ) );
    

    /*Blog*/
    add_image_size( 'blog-listings', 410, 195, array( 'right', 'top' ) );

    add_image_size( 'blog-ralated', 350, 220, array( 'right', 'top' ) );
    add_image_size( 'blog-article-banner', 850, 373, array( 'right', 'top' ) );

    /*Features Story*/
    add_image_size( 'features-story', 535, 355, array( 'right', 'top' ) );
    add_image_size( 'features-story2', 535, 280, array( 'right', 'top' ) );

    /*Upcoming Events*/
    add_image_size( 'upcoming-events', 519, 240, array( 'right', 'top' ) );

    /*Features Team*/
    add_image_size( 'features-team', 150, 150, array( 'right', 'top' ) );
}


function searchfilter($query) {
  if ($query->is_search && !is_admin() ) {
    $query->set('post_type',array('leader', 'story', 'event'));
    //$query->set('post_type','blog');
  }

  return $query;
}
add_filter('pre_get_posts','searchfilter');


// function gmap() {
//   if ( is_page( 'contact-us') ) {
//     wp_register_script('googleMap', ('http://maps.google.com/maps/api/js?sensor=false'));
//     wp_enqueue_script('googleMap'); 
//   }
// }
// add_action( 'wp_print_scripts', 'gmap');



/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
**/
function add_testimonial_filter_taxonomies() {
  // Add new "Locations" taxonomy to Posts
  register_taxonomy('testimonialfilter', 'testimonial', array(
    // Hierarchical taxonomy (like categories)
    'hierarchical' => true,
    // This array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => _x( 'Testimonial Category', 'taxonomy general name' ),
      'singular_name' => _x( 'Testimonial Category', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Testimonial Categories' ),
      'all_items' => __( 'All Testimonial Categories' ),
      'parent_item' => __( 'Parent Testimonial Category' ),
      'parent_item_colon' => __( 'Parent Testimonial Category:' ),
      'edit_item' => __( 'Edit Testimonial Category' ),
      'update_item' => __( 'Update Testimonial Category' ),
      'add_new_item' => __( 'Add New Testimonial Category' ),
      'new_item_name' => __( 'New Testimonial Category Name' ),
      'menu_name' => __( 'Testimonial Categories' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'testimonial', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/filters/"
      'hierarchical' => true // This will allow URL's like "/filters/boston/cambridge/"
    ),
  ));
}
add_action( 'init', 'add_testimonial_filter_taxonomies', 0 );




function add_gallery_filter_taxonomies() {
  // Add new "Locations" taxonomy to Posts
  register_taxonomy('galleryfilter', 'vm_gallery', array(
    // Hierarchical taxonomy (like categories)
    'hierarchical' => true,
    // This array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => _x( 'Gallery Category', 'taxonomy general name' ),
      'singular_name' => _x( 'Gallery Category', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Gallery Categories' ),
      'all_items' => __( 'All Gallery Categories' ),
      'parent_item' => __( 'Parent Gallery Category' ),
      'parent_item_colon' => __( 'Parent Gallery Category:' ),
      'edit_item' => __( 'Edit Gallery Category' ),
      'update_item' => __( 'Update Gallery Category' ),
      'add_new_item' => __( 'Add New Gallery Category' ),
      'new_item_name' => __( 'New Gallery Category Name' ),
      'menu_name' => __( 'Gallery Categories' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'vm_gallery', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/filters/"
      'hierarchical' => true // This will allow URL's like "/filters/boston/cambridge/"
    ),
  ));
}
add_action( 'init', 'add_gallery_filter_taxonomies', 0 );





add_filter( 'kdmfi_featured_images', function( $featured_images ) {
    /* START Mobile Featured Images*/

    $mobile_args = array(
        'id' => 'mobile-featured-image',
        'desc' => 'Mobile banner image',
        'label_name' => 'Mobile Featured Image',
        'label_set' => 'Set Mobile featured image',
        'label_remove' => 'Remove Mobile featured image',
        'label_use' => 'Set Mobile featured image',
        'post_type' => array( 'page', 'post' ),
    );
    $featured_images[] = $mobile_args;

    /*
      kdmfi_the_featured_image( 'homepage-story-featured-image', 'mobile-banner' );
    */

    /* END Mobile Featured Images*/

    return $featured_images;


});



/* =======================================
  START FUNCTIONS WITH SHORTCODES
======================================= */


/* START Banner Slider */
    function banner_slider_function( $atts ) {
        $slider_args = array(
          'post_type'      => 'banner_slider',
          'posts_per_page' => -1,
          'post_status'    => 'publish',
          'post__not_in'   => array( get_the_ID() ),
        );
        // print_r($slider_args);

        $slider = new WP_Query( $slider_args );

        if( $slider->have_posts() ): ?>
          <div class="banner-sliders">
            <div id="bannerSlider" class="owl-carousel slider-for">
              <?php while( $slider->have_posts() ): $slider->the_post(); ?>
                <?php
                  $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
                ?>
                <div class="owl-slide" style="background-repeat: no-repeat; background-size: cover; background-position: top center; background-image: url('<?php echo $thumb['0'];?>')">
                  <div class="owl--text">
                    <div class="title"><?php the_title(); ?></div>
                    <div class="summary"><?php the_content(); ?></div>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
          </div>
        <?php endif;
        wp_reset_postdata();
    }
/* END Banner Slider */


/* START Testimonials */
    function testimonials_function( $atts ) {
        $slider_args = array(
          'post_type'      => 'testimonial',
          'posts_per_page' => -1,
          'post_status'    => 'publish',
          'post__not_in'   => array( get_the_ID() ),
        );
        // print_r($slider_args);

        $slider = new WP_Query( $slider_args );

        if( $slider->have_posts() ): ?>
          <?php while( $slider->have_posts() ): $slider->the_post(); ?>
            <div class="col-sm-12 col-md-4 cols">
              <div class="summary"><q><?php the_content(); ?></q></div>
              <div class="title">-<?php the_title(); ?>-</div>
            </div>
          <?php endwhile; ?>
        <?php endif;
        wp_reset_postdata();
    }
/* END Testimonials */


/* START All Testimonial Slide */
    function testimonial_slider_function( $atts ) {
        $slider_args = array(
          'post_type'      => 'testimonial',
          'posts_per_page' => -1,
          'post_status'    => 'publish',
          'post__not_in'   => array( get_the_ID() ),
        );
        // print_r($slider_args);

        $slider = new WP_Query( $slider_args );

        if( $slider->have_posts() ): ?>
          <div class="testimonial-sliders">
            <div id="testimonialSlider" class="owl-carousel slider-nav">
              <?php while( $slider->have_posts() ): $slider->the_post(); ?>
                <div class="owl-slide">
                  <div class="owl--text">
                    <div class="summary"><q><?php the_content(); ?></q></div>
                    <div class="title">-<?php the_title(); ?>-</div>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
          </div>
        <?php endif;
        wp_reset_postdata();
    }
/* END All Testimonial Slide */


/* START Porsche Testimonial Slide */
    function porsche_testimonial_slider_function( $atts ) {
        $slider_args = array(
          'post_type'      => 'testimonial',
          'posts_per_page' => -1,
          'post_status'    => 'publish',
          'post__not_in'   => array( get_the_ID() ),
          'tax_query'      => array(
              array(
                  'taxonomy' => 'testimonialfilter',
                  'field'    => 'slug',
                  'terms'    => 'porsche'
              )
          )
        );
        // print_r($slider_args);

        $slider = new WP_Query( $slider_args );

        if( $slider->have_posts() ): ?>
          <div class="testimonial-sliders">
            <div id="testimonialSlider" class="owl-carousel slider-nav">
              <?php while( $slider->have_posts() ): $slider->the_post(); ?>
                <div class="owl-slide">
                  <div class="owl--text">
                    <div class="summary"><q><?php the_content(); ?></q></div>
                    <div class="title">-<?php the_title(); ?>-</div>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
          </div>
        <?php endif;
        wp_reset_postdata();
    }
/* END Porsche Testimonial Slide */


/* START VW/Audi Testimonial Slide */
    function vw_audi_testimonial_slider_function( $atts ) {
        $slider_args = array(
          'post_type'      => 'testimonial',
          'posts_per_page' => -1,
          'post_status'    => 'publish',
          'post__not_in'   => array( get_the_ID() ),
          'tax_query'      => array(
              array(
                  'taxonomy' => 'testimonialfilter',
                  'field'    => 'slug',
                  'terms'    => 'vw_audi'
              )
          )
        );
        // print_r($slider_args);

        $slider = new WP_Query( $slider_args );

        if( $slider->have_posts() ): ?>
          <div class="testimonial-sliders">
            <div id="testimonialSlider" class="owl-carousel slider-nav">
              <?php while( $slider->have_posts() ): $slider->the_post(); ?>
                <div class="owl-slide">
                  <div class="owl--text">
                    <div class="summary"><q><?php the_content(); ?></q></div>
                    <div class="title">-<?php the_title(); ?>-</div>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
          </div>
        <?php endif;
        wp_reset_postdata();
    }
/* END VW/Audi Testimonial Slide */



/* START All Testimonial Slide */
    function restoration_procedure_slider_function( $atts ) {
        $slider_args = array(
          'post_type'      => 'restoration',
          'posts_per_page' => -1,
          'post_status'    => 'publish',
          'post__not_in'   => array( get_the_ID() ),
        );
        // print_r($slider_args);

        $slider = new WP_Query( $slider_args );

        if( $slider->have_posts() ): ?>
          <div class="restorationProcedure-sliders">
            <div id="restorationProcedure-Slider" class="owl-carousel slider-nav">
              <?php while( $slider->have_posts() ): $slider->the_post(); ?>
                <div class="owl-slide">
                  <div class="owl--text">
                    <div class="col-sm-12 col-md-6">
                      <div class="title"><?php the_title(); ?></div>
                      <div class="summary"><?php the_content(); ?></div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                      <div class="thumb"><?php the_post_thumbnail(); ?></div>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
          </div>
        <?php endif;
        wp_reset_postdata();
    }
/* END All Testimonial Slide */



/* START Porsche Gallery Slide */
  function porsche_gallery_function( $atts ) {

    $size=large;
    $num=1;

    $cat = get_post_meta($post_id, 'galleryfilter', true);

    $galerry_args = array(
      'post_type'      => 'vm_gallery',
      'posts_per_page' => -1,
      'post_status'    => 'publish',
      'orderby'        => 'title', 
      'order'          => 'ASC',
      'post__not_in'   => array( get_the_ID() ),
      'tax_query'      => array(
              array(
                  'taxonomy' => 'galleryfilter',
                  'field'    => 'slug',
                  'terms'    => 'porsche_gallery'
              )
          )
    );
    $galerry = new WP_Query($galerry_args);

    //Count to track initial ID added to shortcode
    $count = 0;  

    //Start gallery shortcode - using new shortcode [portfolio_gallery]
    $gallery= '[gallery columns="3" order="ASC" orderby="ID" size="medium" link="file" data-rel="lightbox" ids="';

      //Cycle through each post that met requirements
      while ( $galerry->have_posts() ) : $galerry->the_post(); {
        echo($post->ID. " "); 
        $categories = get_the_terms($post->ID, 'portfolio_type');
        foreach($categories as $category){
          if($category->slug == $cat) {
            //Check for gallery in post, if present, take those images
              if ( get_post_gallery($post->ID) ) { 
                $post_gallery = get_post_gallery( $post->ID , false );
                if($count == 0) { $gallery = $gallery . $post_gallery['ids']; }
                else { $gallery = $gallery . ', '. $post_gallery['ids']; }
              }
          }
          //If no images, do nothing  - echo left from testing 
          else {
            //echo "No Image";
          }
          $count++;
        }
      }
      endwhile;        
      //Close out gallery shortcode
      $gallery = $gallery . '"]';

    //echo($gallery);
    echo('<div class="portfolio-gallery">'.do_shortcode($gallery).'</div>');
    //wp_reset_query();
    wp_reset_postdata();
  }
/* END Porsche Testimonial Slide */


/* START VW/ Audi Gallery */
  function vw_audi_gallery_function( $atts ) {

    $size=large;
    $num=1;

    $cat = get_post_meta($post_id, 'galleryfilter', true);

    $galerry_args = array(
      'post_type'      => 'vm_gallery',
      'posts_per_page' => -1,
      'post_status'    => 'publish',
      'orderby'        => 'title', 
      'order'          => 'ASC',
      'post__not_in'   => array( get_the_ID() ),
      'tax_query'      => array(
              array(
                  'taxonomy' => 'galleryfilter',
                  'field'    => 'slug',
                  'terms'    => 'vw_audi_gallery'
              )
          )
    );
    $galerry = new WP_Query($galerry_args);

    //Count to track initial ID added to shortcode
    $count = 0;  

    //Start gallery shortcode - using new shortcode [portfolio_gallery]
    $gallery= '[gallery columns="3" order="ASC" orderby="ID" size="medium" link="file" data-rel="lightbox" ids="';

      //Cycle through each post that met requirements
      while ( $galerry->have_posts() ) : $galerry->the_post(); {
        echo($post->ID. " "); 
        $categories = get_the_terms($post->ID, 'portfolio_type');
        foreach($categories as $category){
          if($category->slug == $cat) {
            //Check for gallery in post, if present, take those images
              if ( get_post_gallery($post->ID) ) { 
                $post_gallery = get_post_gallery( $post->ID , false );
                if($count == 0) { $gallery = $gallery . $post_gallery['ids']; }
                else { $gallery = $gallery . ', '. $post_gallery['ids']; }
              }
          }
          //If no images, do nothing  - echo left from testing 
          else {
            //echo "No Image";
          }
          $count++;
        }
      }
      endwhile;        
      //Close out gallery shortcode
      $gallery = $gallery . '"]';

    //echo($gallery);
    echo('<div class="portfolio-gallery">'.do_shortcode($gallery).'</div>');
    //wp_reset_query();
    wp_reset_postdata();
  }
/* END VW/ Audi Gallery */


/* START All Gallery */
  function all_gallery_function( $atts ) {
    $size=large;
    $num=1;


    $cat = get_post_meta($post_id, 'galleryfilter', true);

    $galerry_args = array(
      'post_type'      => 'vm_gallery',
      'posts_per_page' => -1,
      'post_status'    => 'publish',
      'orderby'        => 'title', 
      'order'          => 'ASC',
      'post__not_in'   => array( get_the_ID() ),
    );
    $galerry = new WP_Query($galerry_args);

    //Count to track initial ID added to shortcode
    $count = 0;  

    //Start gallery shortcode - using new shortcode [portfolio_gallery]
    $gallery= '[gallery columns="3" order="ASC" orderby="ID" size="medium" link="file" data-rel="lightbox" ids="';

      //Cycle through each post that met requirements
      while ( $galerry->have_posts() ) : $galerry->the_post(); {
        echo($post->ID. " "); 
        $categories = get_the_terms($post->ID, 'portfolio_type');
        foreach($categories as $category){
          if($category->slug == $cat) {
            //Check for gallery in post, if present, take those images
              if ( get_post_gallery($post->ID) ) { 
                $post_gallery = get_post_gallery( $post->ID , false );
                if($count == 0) { $gallery = $gallery . $post_gallery['ids']; }
                else { $gallery = $gallery . ', '. $post_gallery['ids']; }
              }
          }
          //If no images, do nothing  - echo left from testing 
          else {
            //echo "No Image";
          }
          $count++;
        }
      }
      endwhile;        
      //Close out gallery shortcode
      $gallery = $gallery . '"]';

    //echo($gallery);
    echo('<div class="portfolio-gallery">'.do_shortcode($gallery).'</div>');
    //wp_reset_query();
    wp_reset_postdata();
  }
/* END All Gallery */


/* REGISTER ALL SHORTCODES */

  function register_shortcodes(){
    add_shortcode('banner_slider', 'banner_slider_function');
    add_shortcode('testimonials', 'testimonials_function');
    add_shortcode('testimonial_slider', 'testimonial_slider_function');
    add_shortcode('porsche_testimonial_slider', 'porsche_testimonial_slider_function');
    add_shortcode('vw_audi_testimonial_slider', 'vw_audi_testimonial_slider_function');
    add_shortcode('restoration_procedure_slider', 'restoration_procedure_slider_function');
    add_shortcode('porsche_gallery', 'porsche_gallery_function');
    add_shortcode('vw_audi_gallery', 'vw_audi_gallery_function');
    add_shortcode('all_gallery', 'all_gallery_function');    
  }
  add_action( 'init', 'register_shortcodes');

/* =======================================
  END FUNCTIONS WITH SHORTCODES
======================================= */




/* ==============================================================
  Fix Gravity Form Tabindex Conflicts
  https://gravitywiz.com/fix-gravity-form-tabindex-conflicts/
============================================================== */
add_filter( 'gform_tabindex', 'gform_tabindexer', 10, 2 );
function gform_tabindexer( $tab_index, $form = false ) {
    $starting_index = 1000; // if you need a higher tabindex, update this number
    if( $form )
        add_filter( 'gform_tabindex_' . $form['id'], 'gform_tabindexer' );
    return GFCommon::$tab_index >= $starting_index ? GFCommon::$tab_index : $starting_index;
}
/* ==============================================================
  END
============================================================== */



/* =================================================
  START REMOVE QUERY STRINGS FROM STATIC RESOURCES
================================================= */
function ewp_remove_script_version( $src ){
  return remove_query_arg( 'ver', $src );
}
add_filter( 'script_loader_src', 'ewp_remove_script_version', 10, 2 );
add_filter( 'style_loader_src', 'ewp_remove_script_version', 10, 2 );
/* =================================================
  END REMOVE QUERY STRINGS FROM STATIC RESOURCES
================================================= */