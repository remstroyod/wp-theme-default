<?php
namespace controllers;

class Shortcodes
{

    private static $instance;

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {

        add_filter('widget_text', 'do_shortcode');

        add_shortcode('email', [ &$this, 'shortcode_email']);

    }

    public function shortcode_email($atts, $content, $tag)
    {

        $atts = shortcode_atts([
            'class' => '',
            'without_link' => false
        ], $atts);

        $value = get_field('cfg_contacts_email', 'option');

        if($atts['without_link'])
        {
            return $value;
        }

        return sprintf('<a href="mailto:%s" class="%s">%s</a>', $value, $atts['class'], $value);
    }

    public static function getInstance()
    {
        if (!Shortcodes::$instance instanceof self) {
            Shortcodes::$instance = new self();
        }
        return Shortcodes::$instance;
    }
}
