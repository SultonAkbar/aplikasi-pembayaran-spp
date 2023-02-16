<?php

class userModel
{

    protected $table = 'pengguna',
        $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function findUserByUsername($username)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE username=:username");
        $this->db->bind("username", $username);

        return $this->db->Single();
    }
}
