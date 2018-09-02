<?php

class RegistrationController extends Controller
{
    private $pageTpl = '/views/registration.tpl.php';

    public function __construct() {
        $this->model = new RegistrationModel();
        $this->view = new View();
    }

    public function index()
    {
        $this->pageData['title'] = "Registration";

        if (!empty($_POST)) {
            if ($this->registrationOfUser() === false) {
                $this->pageData['error'] = "This username or password is busy";
            } else {
                $this->pageData['activation'] = "We sent a message to your email. Confirm your email";
            }
        }

        $this->view->render($this->pageTpl, $this->pageData);
    }

    public function registrationOfUser()
    {
        if ($this->model->addUser() === false) {
            return false;
        }
        else{
            $this->model->sendEmailToCheck();
            return true;
        }
    }

}