<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package Julien
 */

get_header(); ?>
<?php get_sidebar(); ?>

        <div id="templatemo_content_right">
            <h1 class="entry-title"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'twentytwelve' ); ?></h1>
            <div class="entry-content">
                <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'twentytwelve' ); ?></p>
                <?php get_search_form(); ?>
            </div>
        </div>
        <div class="cleaner_with_height">&nbsp;</div>

<?php get_footer(); ?>