<?php
namespace controllers;

use helpers\Helper;
use Walker_Nav_Menu;

class Navigations
{

    private static $instance;

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        register_nav_menus(
            [
                'primary' => esc_html__('Primary Navigation', 'exp'),
            ]
        );
    }

    /**
     * Retrieves the primary navigation menu.
     *
     * This method fetches the menu assigned to the theme location "primary" using wp_nav_menu function.
     * The menu is wrapped in a div container with the class "nav__links" and the items are displayed using the items_wrap format "%3$s".
     * It also defines a custom walker class NavigationWalker for menu traversal and rendering.
     *
     * @return mixed The output of the wp_nav_menu function.
     */
    public function primary()
    {

        return wp_nav_menu([
            'theme_location' => 'primary',
            'container' => 'div',
            'container_class' => 'nav__links',
            'items_wrap' => '%3$s',
            'walker'  => new NavigationWalker(),
        ]);

    }

    /**
     * Retrieves a specific navigation menu based on the provided ID and arguments.
     *
     * This method fetches a specific menu based on the provided $id using the wp_nav_menu function.
     * It allows customization of various menu parameters through the $args array.
     * If no $args are provided, default menu settings are used.
     *
     * @param string $id The theme location or menu name to retrieve.
     * @param array $args {
     *     Optional. An array of arguments for customizing the menu output.
     *
     * @type string $theme_location The theme location to use. Default is the provided $id.
     * @type string $menu The menu name. Default empty.
     * @type string $container The container element. Default empty.
     * @type string $container_class The class for the container element. Default empty.
     * @type string $container_id The ID for the container element. Default empty.
     * @type string $menu_class The class for the menu element. Default empty.
     * @type string $menu_id The ID for the menu element. Default empty.
     * @type bool $echo Whether to output the menu rather than return it. Default true.
     * @type string $fallback_cb The fallback function to use if the menu is not found. Default 'wp_page_menu'.
     * @type string $before Content to prepend to the menu. Default empty.
     * @type string $after Content to append to the menu. Default empty.
     * @type string $link_before Content to prepend to each link within the menu. Default empty.
     * @type string $link_after Content to append to each link within the menu. Default empty.
     * @type string $items_wrap The format for the list of items. Default '<ul id="%1$s" class="%2$s">%3$s</ul>'.
     * @type int $depth The depth of the menu. Default 0.
     * @type mixed $walker An optional walker class for custom menu rendering. Default empty.
     * }
     *
     * @return mixed The output of the wp_nav_menu function.
     */
    public function menu($id, $args = [])
    {

        $default = [
            'theme_location'  => $id,
            'menu'            => '',
            'container'       => '',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => '',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth'           => 0,
            'walker'          => '',
        ];

        $options = wp_parse_args($args, $default);

        return wp_nav_menu($options);
    }

    public static function getInstance()
    {
        if (!Navigations::$instance instanceof self) {
            Navigations::$instance = new self();
        }
        return Navigations::$instance;
    }
}
