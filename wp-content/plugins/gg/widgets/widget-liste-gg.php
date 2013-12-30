<?php 

class GG extends WP_Widget {

	// Configuration globale du widget
	function __construct() {

		$widget_args = array(
			'classname' => 'widget_gg',
			'description' => 'Widget pour gg'
		);

		$control_args = array(
			'width' => 250
		);

		parent::__construct(
			'widget_gg_id',
			'Widget Gg',
			$widget_args,
			$control_args
		);
	}

	// Affichage en front-end
	function widget($args, $instance) {
		extract($args);
		$title = strip_tags($instance['title']);
                global $post;
		$tab_post_temoignage = get_posts(
                    array(
                            'orderby' => 'date',
                            'order' => 'ASC',
                            'post_type' => 'temoignage'
                    )
                );
                
                $temoignage_data = array();

                foreach ($tab_post_temoignage as $temoignage) {

                        $content .= '<h4>'.$temoignage->post_title.'</h4>
                            <p>'.$temoignage->post_content.'</p><hr>';
                }
                
		echo $before_widget;

		echo $before_title . $title . $after_title;

		echo $content;

		echo $after_widget;
	}

	// Traitement des données avant sauvegarde
	function update( $new_instance, $old_instance ) {
		$new_instance['title'] = strip_tags($new_instance['title']);
		return $new_instance;
	}

	// Affichage du formulaire de réglages du widget en back-end
	function form($instance) {
		$instance = wp_parse_args(
			$instance,
			array(
				'title' => 'Témoignages',
			)
		);

		$title = strip_tags($instance['title']);

		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Titre :</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>



	<?php }
}

function init_gg_widget() {
	register_widget('GG');
}
add_action('widgets_init', 'init_gg_widget');