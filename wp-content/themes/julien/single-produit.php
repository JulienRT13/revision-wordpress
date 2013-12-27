<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<?php get_sidebar('product'); ?>
	<div id="templatemo_content_right">

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="templatemo_post_section" id="post-<?php the_ID(); ?>">

                                            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                </div>

				

			<?php endwhile; // end of the loop. ?>
                        <div class="cleaner_with_height">&nbsp;</div>
		</div>
                <div class="cleaner_with_height">&nbsp;</div>
<?php get_footer(); ?>