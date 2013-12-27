<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<?php get_sidebar(); ?>

<div id="templatemo_content_right">
			<?php while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <div class="entry-header">
                                            <h1 class="entry-title"><?php the_title(); ?></h1>
                                    </div>

                                    <div class="entry-content">
                                            <?php the_content(); ?>
                                    </div>
                                </div><!-- #post -->
			<?php endwhile; // end of the loop. ?>

</div>
                <div class="cleaner_with_height">&nbsp;</div>

<?php get_footer(); ?>