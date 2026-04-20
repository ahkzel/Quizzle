<?php
class Answer_model {
    private $pdo;

    public function __construct($pdo) {
        if (isset($pdo)) $this->pdo = $pdo;
    }

    public function get_answers_from_question($id_question) {
        $answers = array();

        try {
            $req = $this->pdo->prepare("
                select reponses.id as id, reponses.valeur as label, verifie.veracite as veracity, verifie.num_reponse as num
                from reponses inner join verifie on reponses.id = verifie.id_reponse inner join question
                on question.id = verifie.id_question where verifie.id_question = :id_question;
            ");
            $req->bindValue(':id_question', $id_question, PDO::PARAM_INT);
            $req->execute();

            $an_answer = $req->fetch(PDO::FETCH_ASSOC);
            while ($an_answer){
                $answers[] = $an_answer;
                $an_answer = $req->fetch(PDO::FETCH_ASSOC);
            }
        }
        catch (PDOException $e) {
            print($e->getMessage());
            die();
        }
        return $answers;
    }
}
?>