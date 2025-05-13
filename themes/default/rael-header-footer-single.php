<?php
/**
 * Single Post/Page File.
 *
 * @package Responsive_Addons_For_Elementor
 */

use Responsive_Addons_For_Elementor\ModulesManager\Theme_Builder\RAEL_Theme_Builder;


@get_header();

// Check if we're in Elementor editor mode
if (\Elementor\Plugin::$instance->editor->is_edit_mode() || \Elementor\Plugin::$instance->preview->is_preview_mode()) {
    error_log( 'in edit mode or preview mode' );
    // Output the content directly for Elementor editor
    // echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display($single_post_id, true);
    // the_content();
    echo wp_kses_post( apply_filters( 'the_content', get_the_content() ) );
} else {
    // Frontend display
    error_log( 'frontend display' );
    // echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display($single_post_id);
    RAEL_Theme_Builder::get_single_content();
}

// RAEL_Theme_Builder::get_single_content();

@get_footer();

