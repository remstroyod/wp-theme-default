<?php
namespace controllers;

class EnqueueScripts
{

    public function __construct()
    {

        add_action('wp_enqueue_scripts', [ &$this, 'init' ], 100);
    }

    /**
     * @return void
     */
    public function init()
    {

        $this->styles();
        $this->javascript();
    }

    /**
     * Remove styles by dequeuing them.
     *
     * @return void
     */
    private function styles()
    {

        /**
         * Remove Styles
         */
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('wc-block-style');

    }

    /**
     * Localizes javascript script with necessary data for AJAX requests
     *
     * @return void
     */
    private function javascript()
    {

        $script_data_array = [
            'ajaxurl' => admin_url('admin-ajax.php'),
        ];
        wp_localize_script('script', 'ajax_global_handle', $script_data_array);
    }
}
