<?php

if (!function_exists('ohair2_setup')) {

    function ohair2_setup() {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');

        register_nav_menus([
            'nav-mobile' => 'Menu mobile',
            'nav-header' => 'Menu desktop',
            'nav-footer' => 'liens du footer en bas'
        ]);
    }
}

add_action('after_setup_theme', 'ohair2_setup');