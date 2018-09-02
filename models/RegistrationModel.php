<?php;

class RegistrationModel extends Model
{
    public $email;
    public $login;
    public $password;
    public $blocking;
    public $emailStatus;
    public $token;


    public function addUser()
    {
        global $email,$login,$password,$blocking,$emailStatus,$token;
        $email = $_POST['email'];
        $login = $_POST['login'];
        $password = md5($_POST['password']);
        $blocking = 0;
        $emailStatus = 0;
        $token=md5($email.time());

        try {
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO user (login, email, password,blocking,email_status,token) VALUES (:login,:email,:password,:blocking,:emailStatus,:token)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':login', $login);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':blocking', $blocking);
            $stmt->bindParam(':emailStatus', $emailStatus);
            $stmt->bindParam(':token', $token);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
            return false;
        }

    }

    public function sendEmailToCheck(){
        global $email, $token;
        $subject = "Подтверждение почты на сайте " . $_SERVER['HTTP_HOST'];
        $subject = "=?utf-8?B?" . base64_encode($subject) . "?=";
        $message = 'Здравствуйте! <br/> <br/> Сегодня ' . date("d.m.Y", time()) . ', 
        неким пользователем была произведена регистрация на сайте <a href="' . ROOT . '">' . $_SERVER['HTTP_HOST'] .
            '</a> используя Ваш email. Если это были Вы, то, пожалуйста, подтвердите адрес вашей электронной почты, перейдя по этой ссылке:
         <a href="' . ROOT . '/activation?token=' . $token . '&email=' . $email . '">' . ROOT . '/activation?token=' . $token . '&email=' . $email . '</a>
         <br/> <br/> В противном случае, если это были не Вы, то, просто игнорируйте это письмо. 
         <br/> <br/> <strong>Внимание!</strong> Ссылка действительна 24 часа. После чего Ваш аккаунт будет удален из базы.';

        $headers = "FROM: $email\r\nReply-to: $email\r\nContent-type: text/html; charset=utf-8\r\n";

        if(mail($email, $subject, $message, $headers)){
            $_SESSION["success_messages"] = "<h4><strong>Регистрация прошла успешно!!!</strong></h4><p> Теперь необходимо подтвердить введенный адрес электронной почты. Для этого, перейдите по ссылке указанную в сообщение, которую получили на почту ".$email." </p>";


        } else {
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка при отправлении письма с сылкой подтверждения, на почту " . $email . " </p>";
        }
    }

    public function banUser($id)
    {

    }
}