<?php
if (!function_exists('ohair2_scripts')):
    function ohair2_scripts() {
        wp_enqueue_style(
            'ohair2_app_css',
            get_theme_file_uri('public/css/app.css'),
            ['ohair2_vendor_css'],
            '1.0.0'
        );
        wp_enqueue_style(
            'ohair2_vendor_css',
            get_theme_file_uri('public/css/vendor.css'),
            [],
            '1.0.0'
        );
        wp_enqueue_script(
            'ohair2_app_js',
            get_theme_file_uri('public/js/app.js'),
            ['ohair2_vendor_js'],
            '1.0.0',
            true
        );
        wp_enqueue_script(
            'ohair2_vendor_js',
            get_theme_file_uri('public/js/vendor.js'),
            [],
            '1.0.0',
            true
        );
    }
endif;
add_action('wp_enqueue_scripts', 'ohair2_scripts');
