<?php
/*
Template Name: Liste des témoignages
*/
?>

<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="templatemo_content_right">
    
    <div id="form-temoignage">
        <?php

        /*
         * Si envoyé, analyser les données du formulaire et les stocker dans des variables
         */

        if (isset($_POST['submit'])) {
                $name = htmlspecialchars($_POST['myname']);
                $email = sanitize_email($_POST['myemail']);
                $message = wp_kses_post($_POST['mymessage']);

        /*
         * Créer un post de type 'contact'
         */

        $contact_post = array(
                'post_title' => $name . ' | ' . $email,
                'post_content' => $message,
                'post_type' => 'temoignage',
                'post_status' => 'publish'
        );

        if (wp_insert_post($contact_post)) echo 'Votre message a bien été enregistré.<br>';
        else echo 'Erreur d\'enregistrement du message';

        /*
         * Affichage basique du formulaire
         */

        } else { ?>

                <form action="<?php echo the_permalink(); ?>" method="post">
                        <label for="name">Nom complet</label>
                        <input type="text" name="myname" id="name" placeholder="Votre nom" />
                        <hr>
                        <label for="email">Adresse e-mail</label>
                        <input type="email" name="myemail" id="email" placeholder="Votre e-mail" />
                        <hr>
                        <label for="message">Avis</label>
                        <textarea cols="50" rows="10" name="mymessage" id="message" placeholder="Votre message..."></textarea>
                        <br>
                        <input type="submit" name="submit" value="Envoyer votre message" />
                </form>

        <?php } ?>
    </div>
    
    
    
        <?php
            $args = array( 'post_type' => 'temoignage', 'posts_per_page' => 10 );
            $loop = new WP_Query( $args );
        ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <h3><?php the_title(); ?></h3>
                                    <p><?php the_content(); ?></p>
                                </div><!-- #post -->
                                <hr>
			<?php endwhile; // end of the loop. ?>
                    <?php julien_content_nav( 'nav-below' ); ?>

</div>
                <div class="cleaner_with_height">&nbsp;</div>

<?php get_footer(); ?>