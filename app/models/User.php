<?php
class User {
    private database $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function register ($data)
    {
        $this->db->query('INSERT INTO `users` (`name`, `email`, `password`)
            VALUES (:name, :email, :password);');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

//Find user by email
    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

    //Check whether a row is occupied by the email being checked
        if($this->db->rowCount() > 0)
        {
            return true;
        } else {
            return false;
        }
    }


}






























