<?php
class User_model {
    private $pdo;

    public function __construct($pdo) {
        if (isset($pdo)) $this->pdo = $pdo;
    }

    public function get_user_from_email_pwd($email, $pwd) {
        $user = array();

        try {
            $req = $this->pdo->prepare("select email, password from user where email = :email and password = :password;");
            $req->bindValue(':email', $email, PDO::PARAM_STR);
            $req->bindValue(':password', $pwd, PDO::PARAM_STR);
            $req->execute();

            $user = $req->fetch(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) {
            print($e->getMessage());
            die();
        }
        return $user;
    }

    public function add_user($name, $first_name, $email, $pwd) {
        try {
            $req = $this->pdo->prepare("insert into user (first_name, name, email, password) values (:first_name, :name, :email, :password);");
            $req->bindValue(':first_name', $first_name, PDO::PARAM_STR);
            $req->bindValue(':name', $name, PDO::PARAM_STR);
            $req->bindValue(':email', $email, PDO::PARAM_STR);
            $req->bindValue(':password', $pwd, PDO::PARAM_STR);

            return $req->execute();
        }
        catch (PDOException $e) {
            print($e->getMessage());
            die();
        }
    }

    public function get_user_from_id($id_user) {
        $user = array();

        try{
            $req = $this->pdo->prepare("select * from user where id = :id_user;");
            $req->bindValue(':id_user', $id_user, PDO::PARAM_INT);
            $req->execute();

            $user = $req->fetch(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) {
            print($e->getMessage());
            die();
        }

        return $user;
    }

    public function get_user_id_by_email($email) {
        $user = array();

        try {
            $req = $this->pdo->prepare("select id from user where email = :email;");
            $req->bindValue(':email', $email, PDO::PARAM_STR);
            $req->execute();

            $user = $req->fetch(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) {
            print($e->getMessage());
            die();
        }

        return $user["id"];
    }
}
?>