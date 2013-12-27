<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to twentytwelve_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>


<div class="comment_section">
    <?php $compteur_commentaire = 0; ?>
    <?php if ( have_comments() ) : ?>
    <div class="comment_section_title">Comments </div>
    <?php while ( have_comments() ) : the_comment(); ?>
    <?php $compteur_commentaire++; ?>
        <div class="comment_box">
            <div class="comment_title"><?php echo $compteur_commentaire.'. ';comment_author(); ?></div>
          <div class="comment_body">
            <?php comment_text();?>
          </div>
        </div>
            <?php if ( ! comments_open() && get_comments_number() ) : ?>
                <p class="nocomments">Les commentaires sont fermés !!</p>
            <?php endif; ?>
    <?php endwhile; ?>
    <?php endif; // have_comments() ?>
    <div class="leave_comment_section">
    <div class="leave_comment_section_title">Leave a comment</div>
        <?php comment_form(); ?>
    </div> 
                
</div>