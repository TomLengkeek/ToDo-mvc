<?php 
Class ToDo extends Controller{
    private $GebruikerModel;

    public function __construct(){
        $this->GebruikerModel = $this->model('Gebruiker');
    }

    public function index($message = ""){

        $alert = '';
        switch($message){
            case "delete-success":
                $alert = '<div class="alert alert-success" role="alert">
                            Gebruiker is succesvol verwijderd
                        </div>';
                break;
            case "delete-failed":
                $alert = '<div class="alert alert-danger" role="alert">
                            Gebruiker is helaas niet verwijderd probeer opnieuw
                        </div>';
                break;
            case "update-failed":
                $alert = '<div class="alert alert-danger" role="alert">
                            Gebruiker kon niet geupdate worden probeer opnieuw
                        </div>';
                break;
            case "update-success":
                $alert = '<div class="alert alert-success" role="alert">
                            Gebruiker is succesvol geupdate
                        </div>';
                break;
        }

        try{
            $records = "";
            foreach($this->GebruikerModel->getAllGebruikers() as $record){
                $records .= '<tr>
                <td>'. $record->email . '</td>
                <td>'. $record->voornaam . '</td>
                <td>'. $record->achternaam . '</td>
                <td>
                    <a href="'. URLROOT .'/todo/delete/'. $record->email . '">
                        <button type="button" class="btn btn-danger">delete</button>
                    </a>
                </td>
                <td>
                    <a href="'. URLROOT .'/todo/update/'. $record->email . '">
                        <button type="button" class="btn btn-success">update</button>
                    </a>
                </td>
            </tr>';
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $data = [
            "records" => $records,
            "alert" => $alert
        ];

        $this->view('ToDo/index',$data);
    }

    public function delete($email){
        try{
            $this->GebruikerModel->email = $email;

            if($this->GebruikerModel->getSingle()){
                $this->GebruikerModel->deleteGebruiker();

                header("Location: " . URLROOT . "/todo/index/delete-success");
            }
            else{
                header("Location: " . URLROOT . "/todo/index/delete-failed");
            }
        }catch(PDOException $e){
            header("Location: " . URLROOT . "/todo/index/delete-failed");
        }
    }

    public function update($email = ""){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $values = ["voornaam", "achternaam", "email", "oldemail"];

            if(!$this->validate($values)){
                header("Location: " . URLROOT . "/todo/index/update-failed");
            }
            
            $this->GebruikerModel->voornaam = $this->sanitize($_POST["voornaam"]);
            $this->GebruikerModel->achternaam = $this->sanitize($_POST["achternaam"]);
            $this->GebruikerModel->email = $this->sanitize($_POST["email"]);
            $this->GebruikerModel->oldemail = $this->sanitize($_POST["oldemail"]);

            $this->GebruikerModel->updateGebruiker();
            header("Location: " . URLROOT . "/todo/index/update-success");

        }else{
            try{
                $this->GebruikerModel->email = $email;

                $result = $this->GebruikerModel->getSingle();
            }catch(PDOException $e){

            }

            $data = [
                "info" => $result
            ];
            $this->view("ToDo/update",$data);
        }
        
    }

}

