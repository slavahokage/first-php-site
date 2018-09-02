<?php

class IndexController extends Controller
{

    private $pageTpl = '/views/main.tpl.php';


    public function __construct()
    {
        $this->model = new IndexModel();
        $this->view = new View();
    }


    public function index()
    {
        $this->pageData['title'] = "Login to your account";

        if (!empty($_POST)) {
            if (!$this->login()) {
                $this->pageData['error'] = "Wrong password or login, or you don't confirm your email, or you are ban";
            }
        }
        $this->view->render($this->pageTpl, $this->pageData);
    }


    public function login()
    {
        if (!$this->model->checkUser()) {
            return false;
        }
    }

    public function registration()
    {
        if (!$this->model->checkUser()) {
            return false;
        }
    }


}