<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div id="page">
            <div id="header">
                <div id="templatemo_top_panel">
                    <div id="templatemo_header_section">
                        <?php get_sidebar('header'); ?>
                        <!--
                        <div id="search_box">
                            <form method="get" action="#">
                                <input type="text" name="searchfield" id="search_field" title="searchfield" />
                                <input type="submit" name="search" value="" alt="Search" id="search_button" title="Search" />
                            </form>
                        </div>
                        -->
                    </div> <!-- end of header -->
                </div>    

                <div id="templatemo_menu_panel">
                    <div id="templatemo_menu_section">
                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu-header' ) ); ?>
                    </div>
                </div> <!-- end of menu -->
            </div>
            
            <div id="templatemo_content_panel">
                <div id="templatemo_content">