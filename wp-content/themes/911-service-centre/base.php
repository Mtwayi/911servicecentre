<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->

    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>

    <div class="wrap base" role="document">
      <div class="content">
        <main>

          <?php function custom_fields() { ?> <?php // *** START Creating function to be pulled through accross all pages ***/ ?>

              <?php if( have_rows('page_builder') ): ?> <?php // *** START Creating page builder fields ***/ ?>

                <?php $block_id = 0; ?> <?php // assigns zero index to ID ?>

                <?php while ( have_rows('page_builder') ) : the_row(); ?>

                  <?php //************* TWO COLUMN BANNER *************?>
                  <?php if( get_row_layout() == 'two_column_banner' ): ?>

                    <?php

                      if (get_sub_field('background_type') == 'image'){ // checks to see if the radio button's value is image

                        $style = "background-repeat: no-repeat; background-size: cover; background-position: top center; background-image: url('" . get_sub_field('background_type_image') ."')";

                      } else { // defaults value to colour

                        $style = "background-color: " . get_sub_field('background_type_colour');
                      }
                    ?>

                    <div id="banner" class="<?php the_sub_field('section_class'); ?> desktop hidden-sm hidden-xs" style="<?php echo $style; ?>">
                      <div class="container">
                        <div class="content">
                          <div class="col-md-6" style="height:100%">
                            <section>
                              <?php the_sub_field('content_area_1'); ?>
                            </section>
                          </div>
                          <div class="col-md-5 col-lg-5 offset-md-1 offset-lg-1 form-desktop">
                              <?php the_sub_field('content_area_2'); ?>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div id="banner" class="<?php the_sub_field('section_class'); ?> mobile hidden-lg hidden-md visible-sm visible-xs">
                      <?php
                        if( kdmfi_has_featured_image( 'mobile-featured-image' ) ) {
                          $image_url = kdmfi_get_featured_image_src('mobile-featured-image', 'mobile-banner');
                          $mobilestyle = "background-repeat: no-repeat; background-position: top center; background-size: cover; background-image: url('" . $image_url ."')";
                        } else {
                          $mobilestyle = "background: #2c2c2c;";
                        }
                      ?>
                      <div class="thumb" style="<?php echo $mobilestyle ?>">
                        <div class="container">
                          <div class="content">
                            <div class="col-sm-12"  style="height:100%">
                              <section>
                                <?php the_sub_field('content_area_1'); ?>
                              </section>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form">
                        <div class="container">
                          <div class="content">
                            <div class="col-sm-12 form-desktop">
                              <?php the_sub_field('content_area_2'); ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  

                  <?php //************* MAIN BANNER *************?>
                  <?php elseif( get_row_layout() == 'main_banner' ): ?>

                    <?php
                      if (get_sub_field('background_type') == 'image'){ // checks to see if the radio button's value is image

                        $style = "background-repeat: no-repeat; background-position: top center; background-size: cover; background-image: url('" . get_sub_field('background_type_image') ."')";

                      } else { // defaults value to colour

                        $style = "background-position-y: 0px; background-size: cover; background-color: " . get_sub_field('background_type_colour');
                      }
                    ?>

                    <div id="banner" class="<?php the_sub_field('section_class'); ?> desktop hidden-sm hidden-xs" style="<?php echo $style; ?>">
                      <div class="container">
                        <div class="content">
                          <section>
                            <?php the_sub_field('content_area_1'); ?>
                          </sectio>
                        </div>
                      </div>
                    </div>


                    <?php  if (is_page( 'services' )) { ?>

                        <div id="banner" class="<?php the_sub_field('section_class'); ?> mobile hidden-lg hidden-md visible-sm visible-xs">
                          <?php
                            if (get_sub_field('background_type') == 'image'){ // checks to see if the radio button's value is image
                              $image_url = get_sub_field('background_type_image', 'mobile-banner');
                              $mobilestyle = "background-repeat: no-repeat; background-position: top center; background-size: cover; background-image: url('" . $image_url ."')";
                            } else { // defaults value to colour
                              $mobilestyle = "background: #2c2c2c;";
                            }
                          ?>
                          <div class="thumb" style="<?php echo $mobilestyle ?>">
                            <div class="container">
                              <div class="content">
                                <section>
                                  <?php the_sub_field('content_area_1'); ?>
                                </section>
                              </div>
                            </div>
                          </div>
                        </div>

                    <?php } else { ?>

                        <div id="banner" class="<?php the_sub_field('section_class'); ?> mobile hidden-lg hidden-md visible-sm visible-xs">
                          <?php
                            if( kdmfi_has_featured_image( 'mobile-featured-image' ) ) {
                              $image_url = kdmfi_get_featured_image_src('mobile-featured-image', 'mobile-banner');
                              $mobilestyle = "background-repeat: no-repeat; background-position: top center; background-size: cover; background-image: url('" . $image_url ."')";
                            } else {
                              $mobilestyle = "background: #2c2c2c;";
                            }
                          ?>
                          <div class="thumb" style="<?php echo $mobilestyle ?>">
                            <div class="container">
                              <div class="content">
                                <section>
                                  <?php the_sub_field('content_area_1'); ?>
                                </section>
                              </div>
                            </div>
                          </div>
                        </div>

                    <?php } ?>


                    <?php elseif( get_row_layout() == 'banner_two' ): ?>

                    <?php
                      if (get_sub_field('background_type') == 'image'){ // checks to see if the radio button's value is image

                        $style = "background-repeat: no-repeat; background-position: top center; background-size: cover; background-image: url('" . get_sub_field('background_type_image') ."')";

                      } else { // defaults value to colour

                        $style = "background-position-y: 0px; background-size: cover; background-color: " . get_sub_field('background_type_colour');
                      }
                    ?>

                    <div id="banner" class="<?php the_sub_field('section_class'); ?> desktop hidden-sm hidden-xs" style="<?php echo $style; ?>">
                      <div class="container">
                        <div class="content">
                          <section>
                            <?php the_sub_field('content_area_1'); ?>
                          </sectio>
                        </div>
                      </div>
                    </div>

                    <div id="banner" class="<?php the_sub_field('section_class'); ?> mobile hidden-lg hidden-md visible-sm visible-xs">
                      <div class="thumb" style="<?php echo $style; ?>">
                        <div class="container">
                          <div class="content">
                            <section>
                              <?php the_sub_field('content_area_1'); ?>
                            </section>
                          </div>
                        </div>
                      </div>
                    </div>


                  <?php //************* COL-SM-12 ROW *************?>
                  <?php elseif( get_row_layout() == 'full_width' ): ?>

                    <?php

                      if (get_sub_field('background_type') == 'image'){ // checks to see if the radio button's value is image

                        $style = "background-repeat: no-repeat; background-size: cover; background-position: center center; background-image: url('" . get_sub_field('background_type_image') ."')";

                      } else { // defaults value to colour

                        $style = "background-color: " . get_sub_field('background_type_colour');
                      }
                    ?>

                    <div id="<?php echo $block_id++; ?>" class="<?php the_sub_field('section_class'); ?>" style="<?php echo $style; ?>">
                      <?php the_sub_field('content_area'); ?>
                    </div>


                  <?php //************* COL-SM-12 ROW *************?>
                  <?php elseif( get_row_layout() == 'column_12' ): ?>

                    <?php

                      if (get_sub_field('background_type') == 'image'){ // checks to see if the radio button's value is image

                        $style = "background-repeat: no-repeat; background-size: cover; background-position: center center; background-image: url('" . get_sub_field('background_type_image') ."')";

                      } else { // defaults value to colour

                        $style = "background-color: " . get_sub_field('background_type_colour');
                      }
                    ?>

                    <div id="<?php echo $block_id++; ?>" class="<?php the_sub_field('section_class'); ?>" style="<?php echo $style; ?>">
                      <div class="container">
                        <!-- <div class="col-sm-12"> -->
                          <?php the_sub_field('content_area'); ?>
                        <!-- </div> -->
                      </div>
                    </div>

                  
                  <?php //************* COL-SM-6 ROW *************?>
                  <?php elseif( get_row_layout() == 'column_6' ): ?>

                    <?php

                      if (get_sub_field('background_type') == 'image'){ // checks to see if the radio button's value is image

                        $style = "background-repeat: no-repeat; background-size: cover; background-position: center center; background-image: url('" . get_sub_field('background_type_image') ."')";

                        } else { // defaults value to colour

                          $style = "background-color: " . get_sub_field('background_type_colour');
                        }
                      ?>

                      <div id="<?php echo $block_id++; ?>" class="<?php the_sub_field('section_class'); ?>" style="<?php echo $style; ?>">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-12 col-md-6 left">
                              <?php the_sub_field('content_area_1'); ?>
                            </div>
                            <div class="col-sm-12 col-md-6 right">
                              <?php the_sub_field('content_area_2'); ?>
                            </div>
                          </div>
                        </div>
                      </div>

                  
                  <?php //************* COL-SM-6 FULL WIDTH ROW *************?>
                  <?php elseif( get_row_layout() == 'column_6_full_width' ): ?>

                    <?php

                      if (get_sub_field('background_type') == 'image') { // checks to see if the radio button's value is image

                        $style = "background-repeat: no-repeat; background-size: cover; background-position: center center; background-image: url('" . get_sub_field('background_type_image') ."')";

                        } else { // defaults value to colour

                          $style = "background-color: " . get_sub_field('background_type_colour');
                        }
                      ?>

                      <?php
                        if (get_sub_field('background_type_2') == 'image') { // checks to see if the radio button's value is image

                        $style2 = "background-repeat: no-repeat; background-size: cover; background-position: center center; background-image: url('" . get_sub_field('background_type_image_2') ."')";

                        } else { // defaults value to colour

                          $style2 = "background-color: " . get_sub_field('background_type_colour_2');
                        }
                      ?>

                      <div id="<?php echo $block_id++; ?>" class="<?php the_sub_field('section_class'); ?>" >
                        <div class="row">
                          <div class="col-sm-12 col-md-6 left" style="<?php echo $style; ?>">
                            <div class="content">
                              <?php the_sub_field('content_area_1'); ?>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-6 right" style="<?php echo $style2; ?>">
                            <div class="content">
                              <?php the_sub_field('content_area_2'); ?>
                            </div>
                          </div>
                        </div>
                      </div>

                  
                  <?php //************* COL-SM-8-4 ROW *************?>
                  <?php elseif( get_row_layout() == 'column_8_4' ): ?>

                    <?php

                      if (get_sub_field('background_type') == 'image'){ // checks to see if the radio button's value is image

                        $style = "background-repeat: no-repeat; background-size: cover; background-position: center center; background-image: url('" . get_sub_field('background_type_image') ."')";

                        } else { // defaults value to colour

                          $style = "background-color: " . get_sub_field('background_type_colour');
                        }
                      ?>

                      <div id="<?php echo $block_id++; ?>" class="<?php the_sub_field('section_class'); ?>" style="<?php echo $style; ?>">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-12 col-md-8 left">
                              <?php the_sub_field('content_area_1'); ?>
                            </div>
                            <div class="col-sm-12 col-md-4 right">
                              <?php the_sub_field('content_area_2'); ?>
                            </div>
                          </div>
                        </div>
                      </div>


                  <?php //************* COL-SM-4 ROW *************?>
                  <?php elseif( get_row_layout() == 'column_4' ): ?>

                    <?php

                      if (get_sub_field('background_type') == 'image'){ // checks to see if the radio button's value is image

                        $style = "background-repeat: no-repeat; background-size: cover; background-position: center center; background-image: url('" . get_sub_field('background_type_image') ."')";

                      } else { // defaults value to colour

                        $style = "background-color: " . get_sub_field('background_type_colour');
                      }
                    ?>

                      <div id="<?php echo $block_id++; ?>" class="<?php the_sub_field('section_class'); ?>" style="<?php echo $style; ?>">
                        <div class="container">
                          <div class="row">
                            <div class="fourCols">
                              <div class="col-sm-3 cols">
                                <?php the_sub_field('content_area_1'); ?>
                              </div>
                              <div class="col-sm-3 cols">
                                <?php the_sub_field('content_area_2'); ?>
                              </div>
                              <div class="col-sm-3 cols">
                                <?php the_sub_field('content_area_3'); ?>
                              </div>
                              <div class="col-sm-3 cols">
                                <?php the_sub_field('content_area_4'); ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    <?php //************* COL-SM-3 ROW *************?>

                    <?php elseif( get_row_layout() == 'column_3' ): ?>

                      <?php

                          if (get_sub_field('background_type') == 'image'){ // checks to see if the radio button's value is image

                        $style = "background-repeat: no-repeat; background-size: cover; background-position: center center; background-image: url('" . get_sub_field('background_type_image') ."')";

                      } else { // defaults value to colour

                        $style = "background-color: " . get_sub_field('background_type_colour');
                      }
                    ?>

                      <div id="<?php echo $block_id++; ?>" class="<?php the_sub_field('section_class'); ?>" style="<?php echo $style; ?>">
                        <div class="container">
                          <div class="header"><?php the_sub_field('header'); ?></div>
                          <div class="row">
                            <div class="threeCols">
                              <div class="col-sm-12 col-md-4 cols">
                                <?php the_sub_field('content_area_1'); ?>
                              </div>
                              <div class="col-sm-12 col-md-4 cols">
                                <?php the_sub_field('content_area_2'); ?>
                              </div>
                              <div class="col-sm-12 col-md-4 cols">
                                <?php the_sub_field('content_area_3'); ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                  
                  <?php //************* OUR SERVICES ROW *************?>
                  <?php elseif( get_row_layout() == 'home_our_services' ): ?>

                    <?php

                      if (get_sub_field('background_type') == 'image'){ // checks to see if the radio button's value is image

                        $style = "background-repeat: no-repeat; background-size: cover; background-position: center center; background-image: url('" . get_sub_field('background_type_image') ."')";

                      } else { // defaults value to colour

                        $style = "background-color: " . get_sub_field('background_type_colour');
                      }
                    ?>

                    <?php

                       $args = array(
                        'post_type' => 'services',
                        // 'category_name' => 'services',
                        'orderby' => 'title',
                        'order' => 'ASC',
                        'posts_per_page' => 6
                      );

                      $the_query = new WP_Query( $args );
                    ?>

                    <?php if ( $the_query->have_posts() ) : ?>
                      <div id="ourServices-Column" class="<?php the_sub_field('section_class'); ?>" style="<?php echo $style; ?>">
                        <div class="container">
                          <div class="content">
                            <div class="row">
                              <div class="header col-lg-12 col-md-12 col-sm-12 col-xs-12"><h1><?php the_sub_field('header'); ?></h1></div>
                              <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 articles">
                                  <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full') ?></a>
                                  <div class="title"><h2><?php the_title(); ?></h2></div>
                                  <div class="excerpt"><?php the_excerpt(); ?></div>
                                </div>
                              <?php endwhile; endif; ?>
                              <?php wp_reset_query(); ?>
                            </div>
                            <div class="row">

                              <div class="description default">

                                <div class="default">
                                  <div class="intro col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <?php the_sub_field('content_area_1'); ?>
                                  </div>
                                  <div class="content col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                    <?php the_sub_field('content_area_2'); ?>
                                  </div>
                                  <div class="content col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                    <?php the_sub_field('content_area_3'); ?>
                                  </div>
                                </div>

                                <!-- <div class="article">
                                  <div class="intro col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <?php the_sub_field('content_area_1'); ?>
                                  </div>
                                  <div class="content col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                    <?php the_sub_field('content_area_2'); ?>
                                  </div>
                                  <div class="content col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                    <?php the_sub_field('content_area_3'); ?>
                                  </div>
                                </div> -->

                              </div>

                            </div>

                          </div>
                        </div>
                      </div>
                    <?php endif; ?>


                  <?php //************* TIMELINE ROW *************?>
                  <?php elseif( get_row_layout() == 'timeline' ): ?>

                    <?php if( have_rows('timeline_date') ): ?>
                      <div id="<?php echo $block_id++; ?>" class="section timeline no-top-padding"> 
                        <div class="container">
                          <div class="row">
                            <ul class="slides">

                              <?php while( have_rows('timeline_date') ): the_row(); 

                                // vars
                                $date = get_sub_field('date' );
                                $content = get_sub_field('content');
                                ?>

                                <li class="slide">
                                  <div class="date"><?php echo $date; ?></div>
                                </li>

                              <?php endwhile; ?>

                            </ul>

                            <ul class="slides-content">

                              <?php while( have_rows('timeline_date') ): the_row(); 

                                // vars
                                $date = get_sub_field('date' );
                                $content = get_sub_field('content');
                                ?>

                                <li class="slide">
                                  <div class="content"><?php echo $content; ?></div>
                                </li>

                              <?php endwhile; ?>

                            </ul>
                            
                          </div>
                        </div>
                      </div>
                    <?php endif; ?>

                  
                  <?php //************* HOME CASE STUDIES ROW *************?>
                  <?php elseif( get_row_layout() == 'home_case_studies' ): ?>

                    <?php
                      /* Background 1=====================================================*/
                      if (get_sub_field('background_type1') == 'image'){ // checks to see if the radio button's value is image

                        $style1 = "background-repeat: no-repeat; background-size: cover; background-position: center center; background-image: url('" . get_sub_field('background_type_image1') ."')";

                      } else { // defaults value to colour

                        $style1 = "background-color: " . get_sub_field('background_type_colour1');
                      }

                      /* Background 2=====================================================*/
                      if (get_sub_field('background_type2') == 'image'){ // checks to see if the radio button's value is image

                        $style2 = "background-repeat: no-repeat; background-size: cover; background-position: center center; background-image: url('" . get_sub_field('background_type_image2') ."')";

                      } else { // defaults value to colour

                        $style2 = "background-color: " . get_sub_field('background_type_colour2');
                      }

                      /* Background 3=====================================================*/
                      if (get_sub_field('background_type3') == 'image'){ // checks to see if the radio button's value is image

                        $style3 = "background-repeat: no-repeat; background-size: cover; background-position: center center; background-image: url('" . get_sub_field('background_type_image3') ."')";

                      } else { // defaults value to colour

                        $style3 = "background-color: " . get_sub_field('background_type_colour3');
                      }

                      /* Background 4=====================================================*/
                      if (get_sub_field('background_type4') == 'image'){ // checks to see if the radio button's value is image

                        $style4 = "background-repeat: no-repeat; background-size: cover; background-position: center center; background-image: url('" . get_sub_field('background_type_image4') ."')";

                      } else { // defaults value to colour

                        $style4 = "background-color: " . get_sub_field('background_type_colour4');
                      }
                    ?>

                    <div id="hp-case-studies" class="<?php the_sub_field('section_class'); ?>">
                      <div class="full-container">
                          <div class="col-sm-6 hover-zoom" style="<?php echo $style1; ?>">
                            <div class="content">
                              <h1><?php the_sub_field('header1'); ?></h1>
                              <?php the_sub_field('content_area_1'); ?>
                            </div>
                          </div>
                          <div class="col-sm-3 col_2 hover-zoom" style="<?php echo $style2; ?>">
                            <?php the_sub_field('content_area_2'); ?>
                          </div>
                          <div class="col-sm-3 col_3 hover-zoom">
                            <div class="row" style="<?php echo $style3; ?>">
                              <?php the_sub_field('content_area_3'); ?>
                            </div>
                            <div class="row" style="<?php echo $style4; ?>">
                              <?php the_sub_field('content_area_4'); ?>
                            </div>
                          </div>
                      </div>
                    </div>

                  
                  <?php //************* MAPS ROW *************?>
                  <?php elseif( get_row_layout() == 'maps' ): ?>
                    <div id="<?php the_sub_field('section_class'); ?>">
                      <div id="map_container">
                        <div id="map"></div>
                      </div>
                    </div>

                  <?php //************* THREE COLUMNS AND THREE ROWS  *************?>
                  <?php elseif( get_row_layout() == 'column_4_x_9' ): ?>

                      <?php

                      if (get_sub_field('background_type') == 'image'){ // checks to see if the radio button's value is image

                        $style = "background-repeat: no-repeat; background-size: cover; background-position: center center; background-image: url('" . get_sub_field('background_type_image') ."')";

                      } else { // defaults value to colour

                        $style = "background-color: " . get_sub_field('background_type_colour');
                      }
                      ?>

                      <div id="<?php echo $block_id++; ?>" class="<?php the_sub_field('section_class'); ?>" style="<?php echo $style; ?>">
                        <div class="container">
                          <div class="row">

                            <?php if( get_sub_field('content_area_1') ): ?>
                              <div class="col-xs-12 col-sm-6 col-md-4 content">
                                <?php the_sub_field('content_area_1'); ?>
                              </div>
                            <?php endif; ?>

                            <?php if( get_sub_field('content_area_2') ): ?>
                              <div class="col-xs-12 col-sm-6 col-md-4 content">
                                <?php the_sub_field('content_area_2'); ?>
                              </div>
                            <?php endif; ?>

                            <?php if( get_sub_field('content_area_3') ): ?>
                            <div class="col-xs-12 col-sm-6 col-md-4 content">
                              <?php the_sub_field('content_area_3'); ?>
                            </div>
                            <?php endif; ?>

                            <?php if( get_sub_field('content_area_4') ): ?>
                            <div class="col-xs-12 col-sm-6 col-md-4 content">
                              <?php the_sub_field('content_area_4'); ?>
                            </div>
                            <?php endif; ?>

                            <?php if( get_sub_field('content_area_5') ): ?>
                            <div class="col-xs-12 col-sm-6 col-md-4 content">
                              <?php the_sub_field('content_area_5'); ?>
                            </div>
                            <?php endif; ?>

                            <?php if( get_sub_field('content_area_6') ): ?>
                            <div class="col-xs-12 col-sm-6 col-md-4 content">
                              <?php the_sub_field('content_area_6'); ?>
                            </div>
                            <?php endif; ?>

                            <?php if( get_sub_field('content_area_7') ): ?>
                            <div class="col-xs-12 col-sm-6 col-md-4 content">
                              <?php the_sub_field('content_area_7'); ?>
                            </div>
                            <?php endif; ?>

                            <?php if( get_sub_field('content_area_8') ): ?>
                            <div class="col-xs-12 col-sm-6 col-md-4 content">
                              <?php the_sub_field('content_area_8'); ?>
                            </div>
                            <?php endif; ?>

                            <?php if( get_sub_field('content_area_9') ): ?>
                              <div class="col-xs-12 col-sm-6 col-md-4 content">
                                <?php the_sub_field('content_area_9'); ?>
                              </div>
                            <?php endif; ?>
                          </div>
                        </div>
                      </div>


                  <?php endif; ?>

                <?php endwhile; ?>

              <?php else : ?>

              <?php endif; ?><?php // *** END Creating page builder fields ***/ ?>

              <?php if( have_rows('post_builder') ): ?> <?php // *** START Creating post builder fields ***/ ?>

                <?php $block_id = 0; ?> <?php // assigns zero index to ID ?>

                <?php while ( have_rows('post_builder') ) : the_row(); ?>

                  <?php //************* MAIN BANNER *************?>

                  <?php if( get_row_layout() == 'main_banner' ): ?>


                    <?php


                      if (get_sub_field('background_type') == 'image'){ // checks to see if the radio button's value is image

                        $style = "background-repeat: no-repeat; background-size: cover; background-position: top center; background-image: url('" . get_sub_field('background_type_image') ."')";

                      } else { // defaults value to colour

                        $style = "background-color: " . get_sub_field('background_type_colour');
                      }
                    ?>

                    <div id="banner" class="<?php the_sub_field('section_class'); ?> desktop hidden-sm hidden-xs" style="<?php echo $style; ?>">
                      <div class="container">
                        <div class="content">
                          <section>
                            <?php the_sub_field('content_area'); ?>
                          </sectio>
                        </div>
                      </div>
                    </div>

                    <div id="banner" class="<?php the_sub_field('section_class'); ?> mobile hidden-lg hidden-md visible-sm visible-xs">
                      <?php
                        if( kdmfi_has_featured_image( 'mobile-featured-image' ) ) {
                          $image_url = kdmfi_get_featured_image_src('mobile-featured-image', 'mobile-banner');
                          $mobilestyle = "background-repeat: no-repeat; background-position: top center; background-size: cover; background-image: url('" . $image_url ."')";
                        } else {
                          $mobilestyle = "background: #2c2c2c;";
                        }
                      ?>
                      <div class="thumb" style="<?php echo $mobilestyle ?>">
                        <div class="container">
                          <div class="content">
                            <section>
                              <?php the_sub_field('content_area'); ?>
                            </section>
                          </div>
                        </div>
                      </div>
                    </div>


                  <?php elseif( get_row_layout() == 'full_width' ): ?>

                    <?php

                      if (get_sub_field('background_type') == 'image'){ // checks to see if the radio button's value is image

                        $style = "background-repeat: no-repeat; background-size: cover; background-position: center center; background-image: url('" . get_sub_field('background_type_image') ."')";

                      } else { // defaults value to colour

                        $style = "background-color: " . get_sub_field('background_type_colour');
                      }
                    ?>

                    <div id="<?php echo $block_id++; ?>" class="<?php the_sub_field('section_class'); ?>" style="<?php echo $style; ?>">
                      <?php the_sub_field('content_area'); ?>
                    </div>


                  <?php elseif( get_row_layout() == 'column_12' ): ?>

                    <?php

                      if (get_sub_field('background_type') == 'image'){ // checks to see if the radio button's value is image

                        $style = "background-repeat: no-repeat; background-size: cover; background-position: center center; background-image: url('" . get_sub_field('background_type_image') ."')";

                      } else { // defaults value to colour

                        $style = "background-color: " . get_sub_field('background_type_colour');
                      }
                    ?>

                    <div id="<?php echo $block_id++; ?>" class="<?php the_sub_field('section_class'); ?>" style="<?php echo $style; ?>">
                      <div class="container">
                        <div class="row">
                          <div class="col-sm-12">
                            <?php the_sub_field('content_area'); ?>
                          </div>
                        </div>
                      </div>
                    </div>

                  <?php elseif( get_row_layout() == 'column_6' ): ?>

                    <?php

                      if (get_sub_field('background_type') == 'image'){ // checks to see if the radio button's value is image

                        $style = "background-repeat: no-repeat; background-size: cover; background-position: center center; background-image: url('" . get_sub_field('background_type_image') ."')";

                        } else { // defaults value to colour

                          $style = "background-color: " . get_sub_field('background_type_colour');
                        }
                      ?>

                      <div id="<?php echo $block_id++; ?>" class="<?php the_sub_field('section_class'); ?>" style="<?php echo $style; ?>">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-12 col-md-6 left">
                              <?php the_sub_field('content_area_1'); ?>
                            </div>
                            <div class="col-sm-12 col-md-6 right">
                              <?php the_sub_field('content_area_2'); ?>
                            </div>
                          </div>
                        </div>
                      </div>


                    <?php elseif( get_row_layout() == 'column_4' ): ?>

                      <?php

                      if (get_sub_field('background_type') == 'image'){ // checks to see if the radio button's value is image

                        $style = "background-repeat: no-repeat; background-size: cover; background-position: center center; background-image: url('" . get_sub_field('background_type_image') ."')";

                      } else { // defaults value to colour

                        $style = "background-color: " . get_sub_field('background_type_colour');
                      }
                      ?>

                      <div id="<?php echo $block_id++; ?>" class="<?php the_sub_field('section_class'); ?>" style="<?php echo $style; ?>">
                        <div class="container">
                          <div class="row">

                            <div class="col-sm-4">
                              <?php the_sub_field('content_area_1'); ?>
                            </div>
                            <div class="col-sm-4">
                              <?php the_sub_field('content_area_2'); ?>
                            </div>
                            <div class="col-sm-4">
                              <?php the_sub_field('content_area_3'); ?>
                            </div>
                          </div>
                        </div>
                      </div>


                    <?php elseif( get_row_layout() == 'column_4_x_9' ): ?>

                      <?php

                      if (get_sub_field('background_type') == 'image'){ // checks to see if the radio button's value is image

                        $style = "background-repeat: no-repeat; background-size: cover; background-position: center center; background-image: url('" . get_sub_field('background_type_image') ."')";

                      } else { // defaults value to colour

                        $style = "background-color: " . get_sub_field('background_type_colour');
                      }
                      ?>

                      <div id="<?php echo $block_id++; ?>" class="<?php the_sub_field('section_class'); ?>" style="<?php echo $style; ?>">
                        <div class="container">
                          <div class="row">

                            <?php if( get_sub_field('content_area_1') ): ?>
                              <div class="col-xs-12 col-sm-6 col-md-4 content">
                                <?php the_sub_field('content_area_1'); ?>
                              </div>
                            <?php endif; ?>

                            <?php if( get_sub_field('content_area_2') ): ?>
                              <div class="col-xs-12 col-sm-6 col-md-4 content">
                                <?php the_sub_field('content_area_2'); ?>
                              </div>
                            <?php endif; ?>

                            <?php if( get_sub_field('content_area_3') ): ?>
                            <div class="col-xs-12 col-sm-6 col-md-4 content">
                              <?php the_sub_field('content_area_3'); ?>
                            </div>
                            <?php endif; ?>

                            <?php if( get_sub_field('content_area_4') ): ?>
                            <div class="col-xs-12 col-sm-6 col-md-4 content">
                              <?php the_sub_field('content_area_4'); ?>
                            </div>
                            <?php endif; ?>

                            <?php if( get_sub_field('content_area_5') ): ?>
                            <div class="col-xs-12 col-sm-6 col-md-4 content">
                              <?php the_sub_field('content_area_5'); ?>
                            </div>
                            <?php endif; ?>

                            <?php if( get_sub_field('content_area_6') ): ?>
                            <div class="col-xs-12 col-sm-6 col-md-4 content">
                              <?php the_sub_field('content_area_6'); ?>
                            </div>
                            <?php endif; ?>

                            <?php if( get_sub_field('content_area_7') ): ?>
                            <div class="col-xs-12 col-sm-6 col-md-4 content">
                              <?php the_sub_field('content_area_7'); ?>
                            </div>
                            <?php endif; ?>

                            <?php if( get_sub_field('content_area_8') ): ?>
                            <div class="col-xs-12 col-sm-6 col-md-4 content">
                              <?php the_sub_field('content_area_8'); ?>
                            </div>
                            <?php endif; ?>

                            <?php if( get_sub_field('content_area_9') ): ?>
                              <div class="col-xs-12 col-sm-6 col-md-4 content">
                                <?php the_sub_field('content_area_9'); ?>
                              </div>
                            <?php endif; ?>
                          </div>
                        </div>
                      </div>


                  <?php endif; ?>
                <?php endwhile; ?>
              <?php endif; ?>

          <?php }?> <?php // *** END Creating function to be pulled through accross all pages ***/ ?>
          <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>

    <!-- Modal -->
    <div class="modal fade" id="ReviewModal" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="modal-body">
            <?php 
                // gravity_form(1, true, false, false, '', true, 12); 
                echo do_shortcode('[gravityform id=1 title=true description=false ajax=true]');
            ?>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
