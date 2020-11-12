<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="sha384-2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/> -->
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('url'); ?>/wp-content/themes/911-service-centre/assets/styles/slick.css"/>

    <script async src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="sha384-VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"> </script>

    <?php gravity_form_enqueue_scripts(1,true); ?>

    <?php wp_head(); ?>
    
    <!-- <script async type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script> -->
    <script async src="<?php bloginfo('url'); ?>/wp-content/themes/911-service-centre/assets/scripts/slick.min.js" type="text/javascript"></script>


    <!-- <script async="" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/1.5.25/jquery.isotope.min.js"></script> -->
    <!-- <script src="<?php bloginfo('url'); ?>/wp-content/themes/911-service-centre/assets/scripts/jquery.isotope.min.js" type="text/javascript"></script> -->

    <?php  if (is_page( 'contact-us' )) { ?>
        <script async src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAcizyF6OYB-hL06GDM3BgauNAtSbPqLTw"></script>
    <?php } ?>

    <!-- <script async src="//www.google-analytics.com/analytics.js"></script> -->
    <script async src="<?php bloginfo('url'); ?>/wp-content/themes/911-service-centre/assets/scripts/analytics.js" type="text/javascript"></script>

    <?php /*if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } */?>



</head>