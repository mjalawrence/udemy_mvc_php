<?php

class Post {
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

//    public function getPosts(){
//        $this->db->query('SELECT * FROM `pokemon-species-data`');
//        return $this->db->resultSet();
//    }
}