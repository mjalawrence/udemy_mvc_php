<?php

class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            'title' => 'SharePosts',
            'description' => 'Simple social network
                                built on PHP MVC udemy framework'
        ];
        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'Get it',
            'description' => 'App for sharing your nonsense with the world'
        ];
        $this->view('pages/about', $data);
    }
}

