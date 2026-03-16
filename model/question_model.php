<?php
class Question_model {
    private $pdo;

    public function __construct($pdo) {
        if (isset($pdo)) $this->pdo = $pdo;
    }

    public function get_all_questions() {
        $all_questions = array();

        try {
            $req = $this->pdo->prepare("select question.id as id, question.label as label, type_question.label_type as type from
            question inner join type_question on question.id_type = type_question.id;");
            $req->execute();

            $a_question = $req->fetch(PDO::FETCH_ASSOC);
            while ($a_question){
                $all_questions[] = $a_question;
                $a_question = $req->fetch(PDO::FETCH_ASSOC);
            }
        }
        catch (PDOException $e) {
            print($e->getMessage());
            die();
        }

        return $all_questions;
    }

    public function get_questions_by_questionnaire($id_questionnaire) {
        $questions = array();

        try {
            $req = $this->pdo->prepare("
                select question.id as id, question.label as label, type_question.label_type as type, comporte.num_question as num 
                from question inner join comporte on question.id = comporte.id_question inner join type_question 
                on question.id_type = type_question.id where comporte.id_questionnaire = :id_questionnaire
                order by comporte.num_question ASC;
            ");
            $req->bindValue(':id_questionnaire', $id_questionnaire, PDO::PARAM_INT);
            $req->execute();

            $a_question = $req->fetch(PDO::FETCH_ASSOC);
            while ($a_question){
                $questions[] = $a_question;
                $a_question = $req->fetch(PDO::FETCH_ASSOC);
            }
        }
        catch (PDOException $e) {
            print($e->getMessage());
            die();
        }
        return $questions;
    }

    public function get_question_label($id_question) {
        $question = array();

        try {
            $req = $this->pdo->prepare("select label from question where id = :id_question;");
            $req->bindValue(':id_question', $id_question, PDO::PARAM_INT);
            $req->execute();
            $question = $req->fetch(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) {
            print($e->getMessage());
            die();
        }
        return $question["label"];
    }
}
?>