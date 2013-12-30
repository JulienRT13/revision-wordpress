<?php

function shortcode_series($param) {
	extract(
		shortcode_atts(
			array(
				'title' => 'Article n°<strong>%nb%</strong> de la série <em>%serie%</em>'
			),
			$param
		)
	);

	global $post;
        
	// Dans quel taxonomie "Série" est catégorisé notre article ?
	$serie = wp_get_post_terms($post->ID, 'serie');


	// Si fait partie d'une série, récupérer des informations cruciales sur cette série (nom, slug)
	if (!empty($serie)) {
		$serie_name = $serie[0]->name;
		$serie_slug = $serie[0]->slug;
	}

	// Récupérons les AUTRES articles de cette série
	$posts_in_serie = get_posts(
		array(
			'orderby' => 'date',
			'order' => 'ASC',
			'tax_query' => array(
				array(
					'taxonomy' => 'serie',
					'field' => 'slug',
					'terms' => $serie_slug
				)
			)
		)
	);

	$serie_data = array();

	foreach ($posts_in_serie as $k=>$post_in_serie) {
		if ($post->ID == $post_in_serie->ID) { $current_post_index = $k+1; }

		$serie_data[] = array(
			'id' => $post_in_serie->ID,
			'title' => $post_in_serie->post_title
		);
	}

	// Modifier les marqueurs %nb% et %serie% par les valeurs correctes à afficher

	$nice_title = str_replace('%nb%', $current_post_index, $title);
	$nice_title = str_replace('%serie%', $serie_name, $nice_title);

	// Afficher la liste des articles de notre série

	ob_start();

	echo '<section id="post-serie" class="clearfix">';
	echo '<h4>' . $nice_title . '</h4>';

	echo '<ol>';
	foreach ($serie_data as $article) {
		if ($article['id'] == $post->ID) {
			echo '<li><strong>' . $article['title'] . '</strong></li>';
		} else {
			echo '<li><a href="' . get_permalink($article['id']) . '" title="' . esc_attr($article['title']) . '">' . $article['title'] . '</a></li>';
		}
	}
	echo '</ol>';
	echo '</section>';

	$post_serie_data = ob_get_contents();
	ob_end_clean();

	return $post_serie_data;
}
add_shortcode('series', 'shortcode_series');

function shortcode_test()
{
    return 'Ok le shortcode test marche';
}
add_shortcode('test', 'shortcode_test');