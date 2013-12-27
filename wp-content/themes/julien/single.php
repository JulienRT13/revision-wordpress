<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<?php get_sidebar(); ?>
	<div id="templatemo_content_right">

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="templatemo_post_section" id="post-<?php the_ID(); ?>">
                                    <div class="date_section">
                                            <?php the_time('d'); ?><span><?php the_time('M'); ?></span>                   
                                    </div>
                                    <div class="post_content">                	
                                        <div class="post_title">
                                            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                            <div class="post_info">
                                                Posted by <?php the_author();?> | <?php the_category(',');?> | <a href="#"><span class="comment"><?php comments_popup_link('No comment', '<span>1</span> comment', '<span>%</span> comments'); ?></span></a>
                                            </div>
                                        </div>

                                        <div class="post_body">
                                            <?php the_content(); ?>
                                        </div>
                                        <?php comments_template( '', true ); ?>
                                    </div>
                                </div>

				

			<?php endwhile; // end of the loop. ?>
                        <div class="cleaner_with_height">&nbsp;</div>
		</div>
                <div class="cleaner_with_height">&nbsp;</div>
<?php get_footer(); ?>