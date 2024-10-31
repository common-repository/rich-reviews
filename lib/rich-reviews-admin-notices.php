<?php

function rr_admin_notice_new_owners() {
    $user_id = get_current_user_id();
	$alert_guid = 'rr_new_owner_alert';
    if(!get_user_meta($user_id,$alert_guid)) {
        $notice = '<div class="notice notice-info rr-admin-notice">';
        $notice .= '<div class="rr-admin-notice-icon">';
        $notice .= '<img src=" '. RR_PLUGIN_URL . '/assets/icon-128x128.png" alt="">';
        $notice .= '</div>';
        $notice .= '<div class="rr-admin-notice-content">';
        $notice .= '<button onclick="location.href=\''.RR_HOME_URL.'/wp-admin/?rr-admin-notice-dismiss='.$alert_guid.'\'" class="rr-admin-notice-dismiss-button button button-primary">Dismiss</button>';
        $notice .= '<h2>' . __( 'Hello, our team at Starfish recently adopted this plugin and made it secure!', 'rich-reviews' ) . '</h2>';
        $notice .= __( "To learn more about the security of Rich Reviews, read our <a href='https://starfish.reviews/rich-reviews-plugin-is-now-secure-part-of-the-starfish-family/?utm_source=rich_reviews_plugin&utm_medium=wp_admin&utm_campaign=welcome_notification' target='_blank'>blog post about it</a>. We want to welcome you to the Starfish users community and would love it if you'd join our Facebook group. Or check out our other plugin: Starfish Reviews.", "rich-reviews" );
        $notice .= '<p>';
        $notice .= '<button onclick="window.open(\'https://www.facebook.com/groups/wpreviews/\')" class="rr-admin-notice-button button button-primary">Facebook</button>';
        $notice .= '<button onclick="window.open(\'https://starfish.reviews/?utm_source=rich_reviews_plugin&utm_medium=wp_admin&utm_campaign=welcome_notification\')" class="rr-admin-notice-button button button-secondary">Starfish Reviews</button>';
        $notice .= '<a href="https://wordpress.org/support/plugin/rich-reviews/#new-post" target="_blank">Report a Problem with Rich Reviews</a>';
        $notice .= '</p>';
        $notice .= '</div>';
        $notice .= '</div>';
        print $notice;
    }
}

add_action( 'admin_notices', 'rr_admin_notice_new_owners' );

function rr_admin_notice_endoflife() {
	$user_id = get_current_user_id();
	$alert_guid = 'rr_eol_alert';
	if(!get_user_meta($user_id,$alert_guid)) {
		$notice = '<div class="notice notice-info rr-admin-notice">';
		$notice .= '<div class="rr-admin-notice-icon">';
		$notice .= '<img src=" '. RR_PLUGIN_URL . '/assets/default_testimonial_source_icon.png" alt="">';
		$notice .= '</div>';
		$notice .= '<div class="rr-admin-notice-content">';
		$notice .= '<button onclick="location.href=\''.RR_HOME_URL.'/wp-admin/?rr-admin-notice-dismiss='.$alert_guid.'\'" class="rr-admin-notice-dismiss-button button button-primary">Dismiss</button>';
		$notice .= '<h2>' . __( 'Migrate Rich Reviews to Starfish Reviews as Testimonials.', 'rich-reviews' ) . '</h2>';
		$notice .= __( 'Hello, our team at Starfish has now added the same features as Rich Reviews into the flagship Starfish Reviews plugin as "testimonials"! FOR FREE. <br/>You can even migrate all of your Rich Reviews into Starfish Reviews as Testimonials.', 'rich-reviews' );
		$notice .= __( "To learn more about the new Testimonial feature read our <a href='https://docs.starfish.reviews/category/201-testimonials' target='_blank'>Help Docs</a>.", "rich-reviews" );
		$notice .= '<p>';
		$notice .= '<button onclick="location.href=\''.RR_HOME_URL.'/wp-admin/plugin-install.php?s=starfish%2520reviews&tab=search&type=term\'" class="rr-admin-notice-button button button-primary">Free Starfish Reviews</button>';
		$notice .= '<button onclick="window.open(\'https://starfish.reviews/plans-pricing/\')" class="rr-admin-notice-button button button-secondary"><img style="margin-right:10px" src=" '. RR_PLUGIN_URL . '/assets/starfish.png" alt="" width="20px">Premium Starfish Reviews</button>';
		$notice .= '</p>';
		$notice .= '<p style="margin-bottom:20px">';
		$notice .= '<img style="float:left; margin-right: 13px;" src=" '. RR_PLUGIN_URL . '/assets/alert.png" alt="" width="50px">';
		$notice .= __( '<div style="margin-top:-13px;">Rich Reviews will no longer be updated or supported, the <a href="https://wordpress.org/plugins/rich-reviews/" target="_blank">Rich Reviews plugin</a> will be removed from the WordPress.org plugin library on 12/31/2023. <br/> We recommend migrating to Starfish Reviews as soon as possible and reporting any issues or questions there so we can continue to strengthen the new Testimonial features in Starfish Reviews.</div>', "rich-reviews" );
		$notice .= '</p>';
		$notice .= '</div>';
		$notice .= '</div>';
		print $notice;
	}
}

add_action( 'admin_notices', 'rr_admin_notice_endoflife' );

function rr_admin_notice_dismissals() {

    $user_id = get_current_user_id();
    if( isset($_GET['rr-admin-notice-dismiss']) && current_user_can('manage_options') ) {
        add_user_meta($user_id, esc_html($_GET['rr-admin-notice-dismiss']), false);
    }

}

add_action( 'admin_init', 'rr_admin_notice_dismissals' );