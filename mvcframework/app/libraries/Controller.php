<?php
    //Load the model and the view
    class Controller {
        public function model($model) {
            //Require model file
            require_once '../app/models/' . $model . '.php';
            //Instantiate model
            return new $model();
        }

        //Load the view (checks for the file)
        public function view($view, $data = []) {
            if (file_exists('../app/views/' . $view . '.php')) {
                require_once '../app/views/' . $view . '.php';
            } else {
                die("View does not exists.");
            }
        }
        //check if any of the given values is empty inside the post arrray
        protected function validate($values = []){
            $validated = true;
            foreach($values as $key){
                if(empty($_POST[$key])){
                    $validated = false;
                    break;
                }
            }
            return $validated;
        }

        //clears the string of html characters and spaces 
        protected function sanitize($value){
            $value = htmlspecialchars($value);
            $value = trim($value);

            return $value;
        }
    }
