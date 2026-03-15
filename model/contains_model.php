<?php
class Contains_model {
    private $pdo;

    public function __construct($pdo) {
        if (isset($pdo)) $this->pdo = $pdo;
    }

    public function get_question_number_from_quizz_id($id_quizz) {
        $question_nb = 0;

        try {
            $req = $this->pdo->prepare("select count(id_question) as nb_questions from comporte inner join questionnaire on 
            questionnaire.id = comporte.id_questionnaire where comporte.id_questionnaire = :id_quizz");
            $req->bindValue(':id_quizz', $id_quizz, PDO::PARAM_INT);
            $req->execute();

            $question_nb = $req->fetch(PDO::FETCH_ASSOC)["nb_questions"];
        }
        catch (PDOException $e) {
            print($e->getMessage());
            die();
        }

        return $question_nb;
    }
}
?>