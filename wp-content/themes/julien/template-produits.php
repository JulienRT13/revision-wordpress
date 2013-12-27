<?php
/*
Template Name: Liste de produits
*/
?>

<?php get_header(); ?>
<?php get_sidebar('product'); ?>

<div id="templatemo_content_right">
        <?php
            $args = array( 'post_type' => 'produit', 'posts_per_page' => 10 );
            $loop = new WP_Query( $args );
        ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <div class="entry-header">
                                            <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                    </div>

                                    <div class="entry-content">
                                            <?php the_content(); ?>
                                    </div>
                                </div><!-- #post -->
			<?php endwhile; // end of the loop. ?>

</div>
                <div class="cleaner_with_height">&nbsp;</div>

<?php get_footer(); ?>