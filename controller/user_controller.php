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

    public function show_login() {
        include __DIR__."/../vue/login.php";
    }

    public function show_create_account() {
        include __DIR__."/../vue/create_account.php";
    }
}
?>