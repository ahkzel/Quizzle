<?php
include_once __DIR__."/pdo_controller.php";
include_once __DIR__."/../model/user_model.php";

class User_controller {
    private $pdo;
    private $user_model;

    public function __construct($pdo_controller) {
        $this->pdo = $pdo_controller->get_pdo();
        $this->user_model = new User_model($this->pdo);
    }

    public function check_connexion($user_email, $user_pwd) {
        $hashed_pwd = $this->string_to_hash($user_pwd);
        $user = $this->user_model->get_user_from_email_pwd($user_email, $hashed_pwd);
        if ($user) {
            $_SESSION["emailU"] = $user_email;
        }
    }

    public function create_account($user_name, $user_first_name, $user_email, $user_pwd) {
        $hashed_pwd = $this->string_to_hash($user_pwd);
        $this->user_model->add_user($user_name, $user_first_name, $user_email, $hashed_pwd);
        $_SESSION["emailU"] = $user_email;
    }

    public function show_login() {
        include __DIR__."/../vue/login.php";
    }

    public function show_create_account() {
        include __DIR__."/../vue/create_account.php";
    }

    public function string_to_hash($string) {
        return strtoupper(md5($string));
    }
}
?>