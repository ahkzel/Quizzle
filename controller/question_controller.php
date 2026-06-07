<?php
include_once __DIR__."/pdo_controller.php";
include_once __DIR__."/answer_controller.php";
include_once __DIR__."/verify_controller.php";
include_once __DIR__."/../model/question_model.php";
include_once __DIR__."/../model/quizz_model.php";

class Question_controller {
    private $pdo;
    private $answer_controller;
    private $verify_controller;
    private $question_model;
    private $quizz_model;

    public function __construct($pdo_controller, $answerC, $verifyC) {
        $this->pdo = $pdo_controller->get_pdo();
        $this->answer_controller = $answerC;
        $this->verify_controller = $verifyC;
        $this->question_model = new Question_model($this->pdo);
        $this->quizz_model = new Quizz_model($this->pdo);
    }

    public function show_questions($id_questionnaire) {
        $all_questions  = $this->question_model->get_questions_by_questionnaire($id_questionnaire);
        $questionnaire_nom = $this->quizz_model->get_questionnaire_nom($id_questionnaire);
        include __DIR__."/../vue/questions.php";
    }

    public function prepare_answer_quizz($id_questionnaire) {
        $all_questions = array();
        $TEMP_all_questions  = $this->question_model->get_questions_by_questionnaire($id_questionnaire);

        foreach ($TEMP_all_questions as &$TEMP_question) {
            $TEMP_answers = $this->answer_controller->get_answers_from_question($TEMP_question['id']);
            $TEMP_weight = $this->verify_controller->get_weight_from_question_answer($TEMP_question['id'], $TEMP_answers[0]['id']);
            $TEMP_question['weight'] = $TEMP_weight;
            $TEMP_question['reponses'] = $TEMP_answers;

            $all_questions[] = $TEMP_question;
        }
        $questionnaire_nom = $this->quizz_model->get_questionnaire_nom($id_questionnaire);
        include __DIR__."/../vue/answer_quizz.php";
    }

    public function show_results($id_questionnaire, $user_results) {
        $number_right_answer = 0;
        $total_number_of_answer = 0;
        $user_score = 0;
        $max_score = 0;

        $questionnaire_nom = $this->quizz_model->get_questionnaire_nom($id_questionnaire);
        foreach ($user_results as $TEMP_id_question => $TEMP_id_reponse_choisie) {
            $TEMP_question_verify = $this->verify_controller->get_verify_from_question_answer($TEMP_id_question, $TEMP_id_reponse_choisie);
            $TEMP_right_answer_id = $this->verify_controller->get_right_answer_from_question($TEMP_id_question);
            $max_score += $TEMP_question_verify['weight'];
            $total_number_of_answer++;
            if ($TEMP_right_answer_id == $TEMP_id_reponse_choisie) {
                $user_score += $TEMP_question_verify['weight'];
                $number_right_answer++;
            }
        }
        include __DIR__."/../vue/results_quizz.php";
    }
}
?>