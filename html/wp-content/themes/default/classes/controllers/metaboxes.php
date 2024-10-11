<?php
namespace controllers;

class Metaboxes
{

    /**
     * ACF Controllers
     * Constructor
     **/
    function __construct()
    {

        add_action('add_meta_boxes', [$this, 'add_metaboxes']);
        add_action('save_post', [$this, 'save_metaboxes']);

    }

    /**
     * ACF Controllers
     * Initializes the class
     *
     * @return void
     **/
    private function init()
    {

    }

    /**
     * Add Metaboxes
     *
     * This method is responsible for adding metaboxes to the post editor screen.
     *
     * @return void
     **/
    public function add_metaboxes()
    {

    }

    /**
     * Save metaboxes for a given post
     *
     * @param int $post_id The ID of the post being saved
     *
     * @return void
     */
    public function save_metaboxes($post_id)
    {


    }

}
