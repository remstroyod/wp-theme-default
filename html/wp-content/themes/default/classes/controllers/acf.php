<?php
namespace controllers;

class Acf
{

    /**
     * ACF Controllers
     * Constructor
     **/
    function __construct()
    {

        add_filter('acf/settings/save_json', [ &$this, 'acf_json_save_callback']);
        add_filter('acf/settings/load_json', [ &$this, 'acf_json_load_callback']);

        $this->options_page();
    }

    /**
     * ACF Controllers
     * init
     *
     * @return void
     **/
    private function init()
    {
    }

    /**
     * ACF Controllers
     *
     * Method acf_json_save_callback
     *
     * @param string $path The path where ACF JSON files are saved.
     * @return string The updated path to where ACF JSON files should be saved.
     */
    public function acf_json_save_callback($path)
    {

        $path = get_stylesheet_directory() . '/acf-json';
        return $path;
    }

    /**
     * ACF JSON Load Callback
     *
     * Updates the list of ACF JSON paths by removing the first element, then adding the child theme's 'acf-json' directory.
     *
     * @param array $paths An array containing the paths where ACF JSON files are stored.
     *
     * @return array The updated list of paths after modifications.
     */
    public function acf_json_load_callback($paths)
    {

        unset($paths[0]);
        $paths[] = get_stylesheet_directory() . '/acf-json';
        return $paths;
    }

    /**
     * Create an options page using Advanced Custom Fields (ACF) plugin.
     *
     * @return void
     **/
    private function options_page()
    {
        acf_add_options_page(array(
            'page_title'    => 'Theme General Settings',
            'menu_title'    => 'Theme Settings',
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));

    }
}
