<?php
$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">
    <section id="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <ul class="contact-dets">
                        <li><a href="tel:<?=formatPhoneNumber(get_option('phone'))?>"><?=get_option('phone')?></a></li>
                        <li><?=get_option('address')?></li>
                    </ul>
                    <?=socialMedia()?>
                </div>
            </div>
        </div>
    </section>
    <section id="header">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 no-padding">
                    <div class="logo-wrapper">
                        <?=the_custom_logo()?>
                    </div>
                    <div class="menu-wrapper">
                        <div class="main-nav wrapper-fluid wrapper-navbar" id="wrapper-navbar">
                            <nav class="site-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'primary',
                                        'container_class' => 'collapse navbar-collapse navbar-responsive-collapse',
                                        'menu_class' => 'nav navbar-nav',
                                        'fallback_cb' => '',
                                        'menu_id' => 'main-menu'
                                    )
                                );
                                ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>