<?php 

/*
 * Plugin Name: Widget Test
 * Plugin URI: http://julienpasini.fr
 * Description: Un widget Test
 * Version: 1.0
 * Author: Julien Pasini
 * Author URI: http://julienpasini.fr
 */

class Test extends WP_Widget {

	// Configuration globale du widget
	function __construct() {

		$widget_args = array(
			'classname' => 'widget_test',
			'description' => 'Widget pour test'
		);

		$control_args = array(
			'width' => 250
		);

		parent::__construct(
			'widget_test_id',
			'Widget Test',
			$widget_args,
			$control_args
		);
	}

	// Affichage en front-end
	function widget($args, $instance) {
		extract($args);
		$title = strip_tags($instance['title']);
		$description = $instance['description'];

		echo $before_widget;

		echo $before_title . $title . $after_title;

		echo $description;

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
				'title' => 'Titre test',
				'description' => '',
			)
		);

		$title = strip_tags($instance['title']);
		$description = $instance['description'];

		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Titre :</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('description'); ?>">Description :</label>
			<textarea class="widefat" rows="16" col="20" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>"><?php echo esc_textarea($description); ?></textarea>
		</p>



	<?php }
}

function init_test_widget() {
	register_widget('Test');
}
add_action('widgets_init', 'init_test_widget');