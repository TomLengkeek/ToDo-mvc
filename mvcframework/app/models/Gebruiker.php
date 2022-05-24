<?php 

Class Gebruiker{
    private $db;
    public $email;

    //slaat databse connectie op in $db
    public function __construct(){
        $this->db = new Database();
    }

    public function getAllGebruikers(){
        $this->db->query("SELECT * FROM gebruiker");
        return $this->db->resultSet();
    }

    public function getSingle(){
        $this->db->query("SELECT * FROM gebruiker WHERE email = :email");
        $this->db->bind(":email", $this->email);

        return $this->db->single();
    }

    public function deleteGebruiker(){
        $this->db->query("DELETE FROM gebruiker WHERE email = :email");
        $this->db->bind(":email", $this->email);

        $this->db->execute();
    }
}

?>