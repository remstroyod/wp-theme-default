<?php
namespace controllers;

class Widgets
{

    private static $instance;

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {

        add_filter('gutenberg_use_widgets_block_editor', '__return_false');
        add_filter('use_widgets_block_editor', '__return_false');

        $this->register();
    }

    private function register()
    {


    }

    public static function getInstance()
    {
        if (!Widgets::$instance instanceof self) {
            Widgets::$instance = new self();
        }
        return Widgets::$instance;
    }
}
