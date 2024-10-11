<?php
namespace controllers;

use controllers\modules\UkrToLat;

class Setup
{

    private static $instance;

    public $navigation;

    public function __construct()
    {
        add_filter('doing_it_wrong_trigger_error', function () {
            return false;
        }, 10, 0);

        add_action('after_setup_theme', [ &$this, 'init' ]);
        add_action('init', [ &$this, 'run' ]);

        remove_action('wp_head', 'wp_generator');

        add_filter('intermediate_image_sizes_advanced', [ &$this, 'images' ]);

        $this->navigation = new Navigations();
    }

    /**
     * Initialize theme settings and features
     * Loads the default theme text domain, adds various theme supports,
     * and removes Emoji scripts and styles from the theme.
     *
     * @return void
     */
    public function init()
    {

        load_theme_textdomain('default', get_template_directory() . '/languages');

        add_theme_support('automatic-feed-links');

        add_theme_support('title-tag');

        add_theme_support('post-thumbnails');

        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );

        /**
         * Remove Emoji
         */
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('admin_print_styles', 'print_emoji_styles');
    }

    /**
     * Run Controllers
     * @return void
     */
    public function run()
    {

        new Metaboxes();
        new Widgets();
        new Shortcodes();
        new PostType();
        new Structure();
        if (class_exists('acf')) {
            new Acf();
        }
        new EnqueueScripts();
        new UkrToLat();
    }

    /**
     * Handle images sizes
     *
     * @param array $new_sizes An array of image sizes to modify
     * @return array Updated array of image sizes
     */
    public function images($new_sizes)
    {
        unset($new_sizes['medium']);
        unset($new_sizes['medium_large']);
        unset($new_sizes['large']);
        unset($new_sizes['1536x1536']);
        unset($new_sizes['2048x2048']);

        unset($new_sizes['thumbnail']);
        unset($new_sizes['100x100']);
        unset($new_sizes['300x300']);
        unset($new_sizes['600x334']);

        return $new_sizes;
    }

    public static function getInstance()
    {
        if (!Setup::$instance instanceof self) {
            Setup::$instance = new self();
        }
        return Setup::$instance;
    }
}
