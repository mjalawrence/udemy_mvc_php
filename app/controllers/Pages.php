<?php

class Pages extends Controller {
    public function __construct() {

    }

    public function index()
    {
        $data = [
            'title' => 'welcome to homepage buddy',
        ];
        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'whats this all about'
        ];
        $this->view('pages/about', $data);
    }
}