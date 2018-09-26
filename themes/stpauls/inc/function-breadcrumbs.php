<?php 
// Add function to create breadcrumbs based on page heirarchy

function get_breadcrumb() {

	global $post;

	$trail = '';
	$page_title = get_the_title($post->ID);

	if($post->post_parent) {
		$parent_id = $post->post_parent;

		while ($parent_id) {
			$page = get_page($parent_id);
			$breadcrumbs[] = '<span class="breadcrumbs__trail--item"><a class="breadcrumbs__trail--link" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></span>';
			$parent_id = $page->post_parent;
		}

		$breadcrumbs = array_reverse($breadcrumbs);
		foreach($breadcrumbs as $crumb) $trail .= $crumb;
	}

    $trail .= '<span class="breadcrumbs__trail--item">';
    $trail .= $page_title;
    $trail .= '</span>';

	echo $trail;

}