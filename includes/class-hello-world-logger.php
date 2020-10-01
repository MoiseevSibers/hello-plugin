<?php

class Hello_World_Logger
{

    private $lastPost;


    public function __construct()
    {

        $this->lastPost = (new Hello_World_DB())->get_last_post();

        add_action('wp_ajax_is_last_post', [$this, 'is_last_post']);
        add_action('wp_ajax_nopriv_is_last_post', [$this, 'is_last_post']);
    }

    public function is_last_post()
    {
        echo wp_send_json_success(['lastPostId' => $this->lastPost[0]->ID]);
    }


}