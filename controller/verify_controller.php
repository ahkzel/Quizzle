<?php
include_once __DIR__."/pdo_controller.php";
include_once __DIR__."/../model/verify_model.php";
include_once __DIR__."/../model/answer_model.php";

class Verify_controller {
    private $pdo;
    private $verify_model;
    private $answer_model;

    public function __construct($pdo_controller) {
        $this->pdo = $pdo_controller->get_pdo();
        $this->verify_model = new Verify_model($this->pdo);
        $this->answer_model = new Answer_model($this->pdo);
    }

    public function get_verify_from_question_answer($id_question, $id_answer) {
        return $this->verify_model->get_verify_from_question_answer($id_question, $id_answer);
    }

    public function get_weight_from_question_answer($id_question, $id_answer) {
        return $this->get_verify_from_question_answer($id_question, $id_answer)['weight'];
    }
}
?>