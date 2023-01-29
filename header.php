<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <style>@font-face {font-family: 'Lato';font-style: normal;font-weight: 400;font-display: swap;src: url(https://fonts.gstatic.com/s/lato/v23/S6uyw4BMUTPHjx4wXiWtFCc.woff2) format('woff2');unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;}@font-face {font-family: 'Lato';font-style: normal;font-weight: 700;font-display: swap;src: url(https://fonts.gstatic.com/s/lato/v23/S6u9w4BMUTPHh6UVSwiPGQ3q5d0.woff2) format('woff2');unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;}</style>
    <?php wp_head(); ?>
    <!-- Google Tag Manager -->
    <script>
    var gtmHeader = {
        gtmHeadDelay: function() {
            setTimeout(function(){

            // (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            // new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            // j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            // 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            // })(window,document,'script','dataLayer','GTM-M424LCP');
            // 
			}, 3000);
        }
    }
    gtmHeader.gtmHeadDelay.call();
    </script>
    <!-- End Google Tag Manager -->
</head>

<body <?php body_class( 'bg-white antialiased debug-screens' ); ?>>
<?php if(is_page_template('templates/page-front.php')) : $wrapper_class='homepage'; else : $wrapper_class='internal'; endif; ?>
<?php // Fixed Header Options
$fixed_header = carbon_get_theme_option('fixed_header');
if ( $fixed_header === 'yes') :
    $position = 'fixed ';
    $header_position = 'transform -translate-x-1/2 -translate-y-1/2 logo-menu-wrapper left-1/2 ';
else : 
    $position = 'relative ';
    $header_position = '';
endif; ?>
<div id="wrapper" class="flex flex-col overflow-hidden <?= $wrapper_class; ?>">
    <?php // Show/Hide Utility Menu 
        $utility_menu = carbon_get_theme_option( 'utility_menu' );
        if ($utility_menu === 'yes') :
            $show_menu = 'lg:block ';
        else : 
            $show_menu = '';
        endif; ?>
    <div id="header-top" class="<?php echo $position . $show_menu ?>z-10 w-full hidden">
        <div id="utility-menu-wrapper" class="w-11/12 mx-auto max-w-screen-2xl">
            <?php // Utlity Menu
                wp_nav_menu(
                    array(
                        'container_id'    => 'utility-menu',
                        'container_class' => '',
                        'menu_class'      => 'lg:flex lg:justify-end',
                        'theme_location'  => 'utility',
                        'li_class'        => '',
                        'fallback_cb'     => false,
                    )
                ); ?>
        </div>
    </div>
    <header id="header" class="<?php echo $position . $header_position ?>z-10 w-full logo-menu-wrapper">
        <div class="w-11/12 mx-auto lg:flex lg:justify-between lg:items-center max-w-screen-2xl">
            <div class="flex items-center justify-between w-full">

                <div>
                    <?php if ( has_custom_logo() ) { ?>
                        <?php the_custom_logo(); ?>
                    <?php } else { ?>
                        <div class="text-lg uppercase">
                            <a href="<?php echo get_bloginfo( 'url' ); ?>" class="text-lg font-extrabold uppercase">
                                <?php echo get_bloginfo( 'name' ); ?>
                            </a>
                        </div>

                        <p class="text-sm font-light">
                            <?php echo get_bloginfo( 'description' ); ?>
                        </p>

                    <?php } ?>
                </div>
            
                <nav id="main-nav">
                    <input class="side-menu" type="checkbox" id="side-menu"/>
                    <label class="hamb" for="side-menu"><span class="hamb-line"></span></label>
                    <?php
                    wp_nav_menu(
                        array(
                            'container_id'    => 'primary-menu',
                            'container_class' => 'mt-4 p-4 xl:mt-0 lg:p-0 xl:block',
                            'menu_class'      => 'xl:flex lg:-mx-4 items-center',
                            'theme_location'  => 'primary',
                            'li_class'        => 'lg:mx-4',
                            'fallback_cb'     => false,
                            'before'          => '<input class="mobile-nav-checkbox" type="checkbox">',
                        )
                    );
                    ?>
                </nav>
            </div>
        </div>
	</header> 
