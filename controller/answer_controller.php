<?php
include_once __DIR__."/pdo_controller.php";
include_once __DIR__."/../model/answer_model.php";
include_once __DIR__."/../model/question_model.php";

class Answer_controller {
    private $pdo;
    private $answer_model;
    private $question_model;

    public function __construct($pdo_controller) {
        $this->pdo = $pdo_controller->get_pdo();
        $this->answer_model = new Answer_model($this->pdo);
        $this->question_model = new Question_model($this->pdo);
    }

    public function get_answers_from_question($id_question) {
        return $this->answer_model->get_answers_from_question($id_question);
    }
}
?>