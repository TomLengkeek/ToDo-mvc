<?php 

Class Gebruiker{
    private $db;
    public $email;
    public $voornaam;
    public $achternaam;
    public $oldemail;

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

    public function updateGebruiker(){
        $this->db->query("UPDATE gebruiker 
        SET email = :email, voornaam = :voornaam, achternaam = :achternaam 
        WHERE email = :oldemail");

        $this->db->bind(":email", $this->email);
        $this->db->bind(":voornaam", $this->voornaam);
        $this->db->bind(":achternaam", $this->achternaam);
        $this->db->bind(":oldemail", $this->oldemail);

        $this->db->execute();
    }
}

?>