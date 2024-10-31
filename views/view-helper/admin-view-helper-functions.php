<?php

class NMRichReviewsAdminHelper {

	public static function render_header($title, $echo = TRUE) {
		global $file;
		$plugin_data = get_plugin_data( $file);
		$output = '';
		$output .= '<h1>' . $plugin_data['Name'] . '</h1>';
		if ($echo) {
			echo $output;
		} else {
			return $output;
		}
	}

	public static function render_tabs($echo = TRUE) {
		/*
		 * key value pairs of the form:
		 * 'admin_page_slug' => 'Tab Label'
		 * where admin_page_slug is from
		 * the add_menu_page or add_submenu_page
		 */
		$tabs = array(
			'rich_reviews_settings_main' => 'Dashboard',
            'fp_admin_pending_reviews_page' => 'Pending Reviews',
            'fp_admin_approved_reviews_page' => 'Approved Reviews',
			'fp_admin_options_page' => 'Options',
			'fp_admin_add_edit' => 'Add Review',
		);

		// what page did we request?
		$current_slug = '';
		if (isset($_GET['page'])) {
			$current_slug = esc_html($_GET['page']);
		}

		// render all the tabs
		$output = '';
		$output .= '<div class="tabs-container">';
		foreach ($tabs as $slug => $label) {
			$output .= '<div class="tab ' . ($slug == $current_slug ? 'active' : '') . '">';
			$output .= '<a href="' . admin_url('admin.php?page='.$slug) . '">' . $label . '</a>';
			$output .= '</div>';
		}
		$output .= '</div>'; // end .tabs-container

		if ($echo) {
			echo $output;
		} else {
			return $output;
		}
	}

	public static function render_postbox_open($title = '') {
		?>
		<div class="postbox">
			<div class="handlediv" title="Click to toggle"><br/></div>
			<h3 class="hndle"><span><?php echo $title; ?></span></h3>
			<div class="inside">
		<?php
	}

	public static function render_postbox_close() {
		echo '</div>'; // end .inside
		echo '</div>'; // end .postbox
	}

	public static function render_container_open($extra_class = '', $echo = TRUE) {
		$output = '';
		$output .= '<div class="metabox-holder ' . $extra_class . '">';
		$output .= '  <div class="postbox-container nm-postbox-container">';
		$output .= '    <div class="meta-box-sortables ui-sortable">';

		if ($echo) {
			echo $output;
		} else {
			return $output;
		}
	}

	public static function render_container_close($echo = TRUE) {
		$output = '';
		$output .= '</div>'; // end .ui-sortable
		$output .= '</div>'; // end .nm-postbox-container
		$output .= '</div>'; // end .metabox-holder

		if ($echo) {
			echo $output;
		} else {
			return $output;
		}
	}

}
