<?php
class Pages extends Controller
{
    public function __construct()
    {
        //$this->userModel = $this->model('User');
    }


    //view index page
    public function index()
    {
        $data = [
            'title' => 'Home page'
        ];

        $this->view('index', $data);
    }

    // test om pagina te viewen
    public function test()
    {

        $this->view('project/test');
    }
}
