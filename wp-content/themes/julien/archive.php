<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Twelve already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 */

get_header(); ?>
<?php get_sidebar(); ?>


<div id="templatemo_content_right">

            <h1 class="archive-title"><?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'twentytwelve' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'twentytwelve' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twentytwelve' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'twentytwelve' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'twentytwelve' ) ) . '</span>' );
					else :
						_e( 'Archives', 'twentytwelve' );
					endif;
				?></h1>
            </br>
                        <?php if ( have_posts() ) : ?>
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
                                <p>Aucun article dans cette archive !</p>
                       <?php endif; ?>

		</div>
                <div class="cleaner_with_height">&nbsp;</div>

		


<?php get_footer(); ?>