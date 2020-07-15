<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ample_OnePage
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class('at-sticky-sidebar'); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}
?>
<!--==========================
  Header
============================-->
<header id="masthead-header" class="site-header" role="banner">
    <div class="top-header">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-8">
                    <?php
                    $section_option_company_info = business_form_get_option('business_form_top_header_section');
                    $location_icon = business_form_get_option('business_form_info_header_section_location_icon');
                    $location = business_form_get_option('business_form_info_header_location');

                    $number_icon = business_form_get_option('business_form_info_header_section_phone_number_icon');
                    $number = business_form_get_option('business_form_info_header_phone_no');

                    $email_icon = business_form_get_option('business_form_email_icon');
                    $email = business_form_get_option('business_form_info_header_email');


                    if ($section_option_company_info == 'show') {
                        ?>
                        <div class="contact-info">
                            <ul>
                                <?php if (!empty( $location)){ ?>
                                    <li><i class="fa <?php echo esc_html($location_icon);?>"></i><?php echo esc_html( $location);?></li>
                                <?php }if (!empty($number)){ ?>
                                    <li><i class="fa <?php echo  esc_html( $number_icon);?>"></i> <?php echo esc_html( $number);?></li>
                                <?php } if (!empty( $email)){
                                    ?>
                                    <li><i class="fa <?php echo esc_html( $email_icon);?> "></i> <?php echo esc_html( $email);?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php }
                    $social_menu = business_form_get_option('business_form_social_link_hide_option');
                    $social_fb = business_form_get_option('business_form_facebook_url');
                    $social_youtube = business_form_get_option('business_form_youtube_url');
                    $social_linkedin = business_form_get_option('business_form_linkedin_url');
                    $social_twitter = business_form_get_option('business_form_twitter_url');
                    $social_insta = business_form_get_option('business_form_instagram_url');
                    $social_google = business_form_get_option('business_form_google_plus_url');


                    ?>
                </div>
                <?php
                if ($social_menu == 1) { ?>
                    <div class="col-md-4">

                        <div class="social-links text-right">
                            <?php if(!empty($social_twitter)){ ?>
                                <a href="<?php echo esc_url($social_twitter);?>" class="twitter"><i class="fab fa-twitter"></i></a>
                            <?php }if(!empty($social_fb)){?>
                                <a href="<?php echo esc_url(($social_fb));?>" class="facebook"><i class="fab fa-facebook-f"></i></a>
                            <?php }

                            if(!empty($social_youtube)){?>
                                <a href="<?php echo esc_url($social_youtube);?>" class="facebook"><i class="fab fa-youtube"></i></a>
                            <?php }

                            if(!empty($social_insta)){ ?>
                                <a href="<?php echo esc_url(($social_insta));?>" class="instagram"><i class="fab fa-instagram"></i></a>
                            <?php } if(!empty( $social_google)){ ?>
                                <a href="<?php echo esc_url(($social_google));?>" class="google-plus"><i class="fab fa-google-plus-g"></i></a>
                            <?php }
                            if(!empty( $social_linkedin)){ ?>
                                <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>


    <!-- Start Top header Section -->
    <?php
    /**
     * The template for displaying all pages.
     *
     * This is the template that displays all pages by default.
     * Please note that this is the WordPress construct of pages
     * and that other 'pages' on your WordPress site may use a
     * different template.
     *
     * @link https://codex.wordpress.org/Template_Hierarchy
     *
     * @subpackage Business Epic
     */
    // retrieving Customizer Value
    ?>
    <!-- Start logo and menu Section -->
    <div class="main-header">
        <div class="container-fluid">
            <div class="site-branding-wrap">
                <!-- Start Site title Section -->
                <div class="site-identity">
                    <!-- <img src="images/logo.png" alt=""> -->
                    <h1 class="site-title">
                        <!-- <img src="images/logo.png" alt=""> -->
                        <?php
                        if (has_custom_logo()) { ?>
                            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                                <?php the_custom_logo(); ?>
                            </a>
                        <?php } else {
                        if (is_front_page() && is_home()) : ?>
                            <h1 class="site-title">
                                <a href="<?php echo esc_url(home_url('/')); ?>"
                                   rel="home"><?php bloginfo('name'); ?></a>
                            </h1>
                        <?php else : ?>
                            <p class="site-title">
                                <a href="<?php echo esc_url(home_url('/')); ?>"
                                   rel="home"><?php bloginfo('name'); ?></a>
                            </p>
                            <?php
                        endif;
                        ?>
                    </h1>
                    <?php
                    $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) : ?>
                        <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                        <?php
                    endif;
                    } ?>
                </div>



                <!-- for toogle menu -->
                    <span id="showbutton">
                        <img
                            class="img-responsive grow"
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/button.png" alt=""/>
                    </span>
            </div>


            <!-- End Site title Section -->
            <!-- Start Menu Section -->
            <div class="menu">
                <!--<nav id="site-navigation" class="main-navigation" role="navigation"> -->
                <div class="nav-wrapper">


                    <nav class="column-12 im-hiding">
                        <?php
                        if (has_nav_menu('primary')) {
                            wp_nav_menu(array(
                                    'theme_location' => 'primary',
                                    'menu_class' => 'main-nav',
                                    'depth' => 4,

                                )
                            );
                        }
                        ?>
                    </nav>
                    <!-- / main nav -->
                </div>
                <!-- </nav> -->
            </div>
            <!-- End Menu Section -->

        </div>
    </div>
    <!-- End logo and menu Section -->


</header><!-- #header -->




