<?php

class ActivationModel extends Model
{

    public function changeEmailStatus($token,$email){
        try {
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE user SET email_status = 1 WHERE email = :email and token = :token";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':token', $token);
            $stmt->execute();
            return true;
        }catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
            return false;
        }
    }
}