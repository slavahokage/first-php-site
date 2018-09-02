<?php


class IndexModel extends Model
{


    public function checkUser()
    {
        $login = $_POST['login'];
        $password = md5($_POST['password']);
        $email_status = 1;
        $blocking= 0;

        $sql = "SELECT * FROM user WHERE login = :login AND password = :password AND email_status = :emailStatus AND blocking = :blocking";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->bindValue(":password", $password, PDO::PARAM_STR);
        $stmt->bindValue(":emailStatus", $email_status, PDO::PARAM_STR);
        $stmt->bindValue(":blocking", $blocking, PDO::PARAM_STR);
        $stmt->execute();

        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($res)) {
            $_SESSION['user'] = $_POST['login'];
            header("Location: /cabinet");
        } else {
            return false;
        }

    }

}