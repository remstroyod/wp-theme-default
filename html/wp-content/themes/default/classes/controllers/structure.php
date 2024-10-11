<?php
namespace controllers;

class Structure
{

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {

        add_action('header_parts', [$this, 'header'], 10);
        add_action('footer_parts', [$this, 'footer'], 10);

    }

    public function header()
    {
        get_template_part('template-parts/partials/partial', 'header');
    }

    public function footer()
    {
        get_template_part('template-parts/partials/partial', 'footer');
    }

}
