<?php

class CabinetModel extends Model {

    public function getUsersCount() {
        $sql = "SELECT COUNT(*) FROM user";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchColumn();
        return $res;
    }

    public function getInformationAboutUser() {
        $sql = "SELECT id,login,password,email,email_status FROM user";
        $result = array();
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }

        return $result;
    }

    public function removeUser($remove)
    {
        try {
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE  FROM user WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $remove);
            $stmt->execute();
            return true;
        }catch (PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
            return false;
        }
    }

    public function banUser($ban, $id)
    {
        try {
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE user SET blocking = :blocking WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':blocking', $ban);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

}
