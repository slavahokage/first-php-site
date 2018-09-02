<?php

class ActivationController extends Controller
{
    private $pageTpl = "/views/activation.tpl.php";

    public function __construct()
    {
        $this->model = new ActivationModel();
        $this->view = new View();
    }


    public function index()
    {
        if(isset($_GET['token']) && !empty($_GET['token'])){

            $token = $_GET['token'];

        }else{

            exit("<p><strong>Error!</strong> Where is token?.</p>");

        }

        if(isset($_GET['email']) && !empty($_GET['email'])){

            $email = $_GET['email'];

        }else{

            exit("<p><strong>Error!</strong> Where is email?.</p>");

        }

        if($this->model->changeEmailStatus($token,$email)){
            $this->pageData['title'] = "Activation";
            $this->view->render($this->pageTpl, $this->pageData);
        }else{
            exit("<p><strong>Error!</strong> Something wrong with your activate?.</p>");
        }

    }

}