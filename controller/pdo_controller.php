<?php
include_once __DIR__."/../model/pdo.php";

class Pdo_controller {
    private $pdo;

    public function __construct() {
        $con = new CoPDO();
        $this->pdo = $con->co_pdo();
    }

    public function get_pdo() {
        return $this->pdo;
    }
}
?>