<?php

class Hello_World_DB extends wpdb
{

    public function __construct()
    {
        parent::__construct(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);

    }


	public function get_last_post()
	{
		return $this->get_results("SELECT ID FROM est_posts as p ORDER BY p.post_date DESC LIMIT 1;");
	}
}
