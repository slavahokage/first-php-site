<?php

class CabinetController extends Controller {

    private $pageTpl = "/views/cabinet.tpl.php";

    public function __construct() {
        $this->model = new CabinetModel();
        $this->view = new View();
    }

    public function index() {


        $this->pageData['title'] = "Cabinet";
        if(!$_SESSION['user']){
            header("Location: /");
        }

        if(isset($_GET['idForRemove']) && !empty($_GET['idForRemove'])) {
            $remove = $_GET['idForRemove'];
            if($this->model->removeUser($remove)){
                header("Location: /cabinet");
            }
        }


        if(isset($_POST['ban']) && !empty($_POST['ban']) && isset($_POST['id']) && !empty($_POST['id'])) {
            /*print_r($_POST['ban']);
            print_r($_POST['id']);*/
            $ban = $_POST['ban'];
            $id = $_POST['id'];
            if($ban === "true"){
                $ban = 1;
            }else{
                $ban = 0;
            }
            print_r($ban);
            $this->model->banUser($ban,$id);
        }





        $usersCount = $this->model->getUsersCount();
        $this->pageData['usersCount'] = $usersCount;
        $information = $this->model->getInformationAboutUser();
        $this->pageData['informationAboutUsers'] = $information;
        $this->view->render($this->pageTpl, $this->pageData);



    }

    public function logout() {
        session_destroy();
        header("Location: /");
    }

}

?>