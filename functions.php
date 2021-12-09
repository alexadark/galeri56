<?php

/* ====================== Constants ==================================================================== */

    define( 'TEMPPATH', get_bloginfo('stylesheet_directory'));
    define('IMAGES', TEMPPATH."/img/");

/* ====================== Theme Support ================================================================ */

    add_theme_support( 'post-thumbnails' );
    add_image_size( 'big-2880', 2880, 9999999 );
    add_image_size( 'big-1440', 1440, 9999999 );
    add_image_size( 'grid-356x503', 356, 503, array( 'center', 'center' ) );
    add_image_size( 'list-166x110', 166, 110, array( 'center', 'center' ) );
    add_image_size( 'table-228', 228, 9999999 );
    add_image_size( 'square-166x166', 166, 166, array( 'center', 'center' ) );

/* ====================== Custom Excerpt Function ====================================================== */

    function sma_get_excerpt($count){
        global $post;
        $permalink = get_permalink($post->ID);
        $excerpt = get_the_content();
        $excerpt = strip_tags($excerpt);
        $excerpt = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $excerpt);
        $excerpt = substr($excerpt, 0, $count);
        $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
        $excerpt = $excerpt.'... <a href="'.$permalink.'">read more</a>';
        return $excerpt;
    }

/* ====================== Mime Type Mgmt. ============================================================== */

    function modify_post_mime_types($post_mime_types) {
    	$post_mime_types['application/pdf'] = array(__('PDF'), __('Manage PDF'), _n_noop('PDF <span class="count">(%s)</span>', 'PDF <span class="count">(%s)</span>'));
    	return $post_mime_types;
	}

	add_filter('post_mime_types', 'modify_post_mime_types');

/* ====================== ACF Options Page ============================================================= */

    if( function_exists('acf_add_options_page') ) {
        acf_add_options_page(array(
            'page_title'    => 'Global Settings',
            'menu_title'    => 'Global',
            'menu_slug'     => 'sma-menu-global',
            'capability'    => 'edit_posts',
            'redirect'      => false,
            'position'         => '4.3'
        ));
    }

/* ====================== Add Scripts ================================================================== */

    function sp_add_scripts() {
        wp_deregister_script('jquery');
        wp_enqueue_script( 'jquery', get_bloginfo( 'template_url' ).'/js/jquery-1.11.2.min.js', array(), '1.0.0', true );
        wp_enqueue_script( 'sp_plugins', get_bloginfo( 'template_url' ).'/js/plugins.min.js', array(), '1.0.0', true );
        wp_enqueue_script( 'spScripts', get_bloginfo( 'template_url' ).'/js/scripts.min.js', array(), '1.0.0', true );
        $the_site_url = get_home_url();
        wp_localize_script( 'spScripts', 'spScripts_script_params', array( 'siteURL' => $the_site_url ) );
    }

    add_action( 'wp_footer', 'sp_add_scripts' );

/* ====================== RSS ========================================================================== */

    // display featured post thumbnails in WordPress feeds
    function wcs_post_thumbnails_in_feeds( $content ) {
        global $post;
        if( has_post_thumbnail( $post->ID ) ) {
            $content = '<p>' . get_the_post_thumbnail( $post->ID ) . '</p>' . get_the_content();
        }
        return $content;
    }
    add_filter( 'the_excerpt_rss', 'wcs_post_thumbnails_in_feeds' );
    add_filter( 'the_content_feed', 'wcs_post_thumbnails_in_feeds' );

/* ====================== Misc. ======================================================================== */
	
	function default_attachment_display_settings() {
		update_option( 'image_default_align', 'left' );
		update_option( 'image_default_link_type', 'none' );
        update_option( 'image_default_size', 'large' );
	}

	add_action( 'after_setup_theme', 'default_attachment_display_settings' );

    function sp_social_title( $title ) {
        $title = html_entity_decode( $title );
        $title = urlencode( $title );
        return $title;
    }

    function get_the_content_by_id($post_id) {
        $page_data = get_page($post_id);
        if ($page_data) {
            return $page_data->post_content;
        }
        else return false;
    }

    function is_tree($pid) {
        global $post;

        if(is_page()&&($post->post_parent==$pid||is_page($pid))) {
            return true;
        } else {
            return false;
        }
    }

    add_filter("gform_init_scripts_footer", "init_scripts");
    
    function init_scripts() {
        return true;
    }

    function disable_emojis() {
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
        remove_action( 'admin_print_styles', 'print_emoji_styles' );
        remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
        remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
        remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
        add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    }

    add_action( 'init', 'disable_emojis' );
    
    function disable_emojis_tinymce( $plugins ) {
        if ( is_array( $plugins ) ) {
            return array_diff( $plugins, array( 'wpemoji' ) );
        } else {
            return array();
        }
    }

    remove_action('wp_head', 'wp_generator');
?>