<?php
class Post {
    private database $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function Post ($data)
    {
        $this->db->query('INSERT INTO `posts` (`user_id`, `title`, `post_body`, `created_at`)
            VALUES (:user_id, :title, :post_body, CURRENT_TIMESTAMP());');
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':post_body', $data['post_body']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
//Get Posts from database
    public function getPost(){

        $this->db->query('SELECT *,
                              posts.id as postId,
                              users.id as userId, 
                              posts.created_at as postCreated,
                              users.created_at as userCreated
                              FROM posts 
                              INNER JOIN users
                              ON posts.user_id = users.id
                              ORDER BY posts.created_at DESC 
                              ');

        $posts = $this->db->resultSet();

        if(isset($posts)){
            return $posts;
        } else {
            return false;
        }
    }
}
////Practice
//    public function getPost($user_id){
//        $this->db->query('SELECT * FROM posts WHERE user_id = :user_id');
//        $this->db->bind(':user_id', $user_id);
//
//        $posts = $this->db->resultSet();
//
//        if(isset($posts)){
//            return $posts;
//        } else {
//            return false;
//        }
//    }
//}

