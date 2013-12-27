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
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    <?php echo $prix = get_post_meta($post->ID,'_produit_info',true); ?>
                                    <?php echo $dispo = get_post_meta($post->ID,'_dispo_produit',true); ?>
                                    <?php echo $image = get_post_meta($post->ID,'_image',true); ?>
                                </div><!-- #post -->
                                <p>---------------------------</p>
			<?php endwhile; // end of the loop. ?>

</div>
                <div class="cleaner_with_height">&nbsp;</div>

<?php get_footer(); ?>