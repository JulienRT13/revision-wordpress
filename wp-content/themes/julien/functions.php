<?php

/**
 * Enqueue styles for front-end.
 *
 *
 * @return void
 */
function julien_styles() {

	// Loads our main stylesheet.
	wp_enqueue_style( 'julien-style', get_stylesheet_uri() );

}
add_action( 'wp_enqueue_scripts', 'julien_styles' );

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 */
function julien_widgets_init() {
	register_sidebar( array(
		'name' => 'Left Sidebar',
		'id' => 'sidebar-1',
		'description' => 'description',
		'before_widget' => '<div class="templatemo_content_left_section" id="%1$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<div class="left_section_title">',
		'after_title' => '</div><div class="left_section_content">',
	) );

	register_sidebar( array(
		'name' => 'Header Sidebar',
		'id' => 'sidebar-2',
		'description' => 'description',
		'before_widget' => '<div id="search_box" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'Footer Sidebar',
		'id' => 'sidebar-3',
		'description' => 'description',
		'before_widget' => '<div id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="bottom_section_title">',
		'after_title' => '</div>',
	) );
        
        register_sidebar( array(
		'name' => 'Left Sidebar Product',
		'id' => 'sidebar-4',
		'description' => 'description',
		'before_widget' => '<div class="templatemo_content_left_section" id="%1$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<div class="left_section_title">',
		'after_title' => '</div><div class="left_section_content">',
	) );
}
add_action( 'widgets_init', 'julien_widgets_init' );


/**
 * Manage comment_form()
 *
 * Change la mise en place et supprime le champ "url" du formulaire
 *
*/
add_filter( 'comment_form_defaults', 'julien_manage_default_fields');
if ( !function_exists('julien_manage_default_fields')) {
   function julien_manage_default_fields( $default ) {
 
      // Récupération des infos connues sur le visiteur
      // Permet de pré-remplir nos nouveaux champs
 
      $commenter = wp_get_current_commenter();
 
      // Suppression d'un champ par défaut parmi : author, email, url
 
      unset ( $default['fields']['url'] );
      
      $default['fields']['author'] = '<div class="form_row">
                        <label>Your Name ( Required )</label><span class="required">*</span><br />
                        <input type="text" name="author" id="fullname" value="'.$commenter['comment_author'].'" />
                    </div>
        ';
      $default['fields']['email'] = '<div class="form_row">
                        <label>Email  (Required, but not published)</label><span class="required">*</span><br />
                        <input type="text" name="email" id="email" value="'.$commenter['comment_email'].'"/>
                    </div>
        ';
      $default['comment_notes_before'] = '';
      $default['title_reply'] = '';
      $default['comment_notes_after'] = '';
      $default['label_submit'] = 'gg=G';
      $default['comment_field'] = '<div class="form_row">
                        <label>Your comment</label><span class="required">*</span><br />
                        <textarea  name="comment"></textarea>
                    </div>';
 
      // Ajout des champs dans le tableau "fields"
      // $commenter[] contient les infos sur le visiteur
 
      return $default;
   }
}

/**
 * Ajouter champ Titter
 *
 * Ajoute un champ twitter dans la page de profil
 *
*/
function julien_author_profile_twit( $twitfields )
{
    $twitfields['twitter'] = 'Twitter';
    return $twitfields;
}
add_filter('user_contactmethods','julien_author_profile_twit');

/**
 * Ajouter de nouveau post type et taxonomy
 *
*/
add_action( 'init', 'julien_create_post_type' );
function julien_create_post_type() {
  register_post_type( 'produit',
    array(
      'labels' => array(
        'name' => __( 'Produits' ),
        'singular_name' => __( 'Produit' )
      ),
      'public' => true
    )
  );
register_taxonomy( 'couleur', 'produit', array( 'hierarchical' => true, 'label' => 'Couleur', 'query_var' => true, 'rewrite' => true ) );
}

/**
 * Défini quelle post type sont sur la page d'accueil
 *
*/
/*
add_filter( 'pre_get_posts', 'julien_my_get_posts' );
function julien_my_get_posts( $query ) {
 if ( is_home() )
 $query->set( 'post_type', array( 'post', 'produit' ) );

 return $query;
}
*/

/**
 * Ajoute des customs fields
 *
*/
add_action('wp_insert_post', 'julien_champs_personnalises_defaut');
 function julien_champs_personnalises_defaut($post_id)
 {
 if ( $_GET['post_type'] == 'produit' ) {
 add_post_meta($post_id, 'custom_field_1', '', true);
 add_post_meta($post_id, 'custom_field_2', '', true);
 }
 return true;
 }
