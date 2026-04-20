<?php
class Verify_model {
    private $pdo;

    public function __construct($pdo) {
        if (isset($pdo)) $this->pdo = $pdo;
    }

    public function get_verify_from_question_answer($id_question, $id_answer) {
        try {
            $req = $this->pdo->prepare("
                select question.label as question_label, reponses.valeur as answer_label, verifie.num_reponse as num, 
                verifie.veracite as veracity, verifie.poids as weight
                from verifie inner join question on verifie.id_question = question.id inner join reponses on verifie.id_reponse = reponses.id
                where verifie.id_question = :id_question and verifie.id_reponse = :id_answer;
            ");
            $req->bindValue(':id_question', $id_question, PDO::PARAM_INT);
            $req->bindValue(':id_answer', $id_answer, PDO::PARAM_INT);
            $req->execute();

            $verify = $req->fetch(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) {
            print($e->getMessage());
            die();
        }
        return $verify;
    }
}
?>