<?php
include_once __DIR__."/pdo_controller.php";
include_once __DIR__."/../model/question_model.php";
include_once __DIR__."/../model/quizz_model.php";

class Question_controller {
    private $pdo;
    private $question_model;
    private $quizz_model;

    public function __construct($pdo_controller) {
        $this->pdo = $pdo_controller->get_pdo();
        $this->question_model = new Question_model($this->pdo);
        $this->quizz_model = new Quizz_model($this->pdo);
    }

    public function show_questions($id_questionnaire) {
        $all_questions  = $this->question_model->get_questions_by_questionnaire($id_questionnaire);
        $questionnaire_nom = $this->quizz_model->get_questionnaire_nom($id_questionnaire);
        include __DIR__."/../vue/questions.php";
    }
}
?>