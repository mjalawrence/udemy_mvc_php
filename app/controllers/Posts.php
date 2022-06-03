<?php
class Posts extends Controller
{

    public function __construct()
    {
        if(!isLoggedIn()){
            redirect('index.php?url=users/login');
        }
        $this->postModel = $this->model('Post');
    }
    public function index()
    {
    //Get Posts
        $posts = $this->postModel->getPost();

        $data = [
            'posts' => $posts
        ];

        $this->view('posts/index', $data);
    }
}
