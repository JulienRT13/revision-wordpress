<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<?php get_sidebar(); ?>

                
	<div id="templatemo_content_right">

		<?php if ( have_posts() ) : ?>
				<h1 class="archive-title"><?php printf( __( 'Tag Archives: %s', 'twentytwelve' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
                                </br>
			<?php if ( tag_description() ) : // Show an optional tag description ?>
				<div class="archive-meta"><?php echo tag_description(); ?></div></br>
			<?php endif; ?>

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
                                        </div>
                                    </div>

                            <?php endwhile; // end of the loop. ?>

		<?php else : ?>
			<p>Aucun article pour ce tag</p>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_footer(); ?>