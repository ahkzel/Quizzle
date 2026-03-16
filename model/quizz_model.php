<?php
class Quizz_model {
    private $pdo;

    public function __construct($pdo) {
        if (isset($pdo)) $this->pdo = $pdo;
    }

    public function get_all_quizzes() {
        $all_quizzes = array();

        try {
            $req = $this->pdo->prepare("select * from questionnaire;");
            $req->execute();

            $a_quizz = $req->fetch(PDO::FETCH_ASSOC);
            while ($a_quizz){
                $all_quizzes[] = $a_quizz;
                $a_quizz = $req->fetch(PDO::FETCH_ASSOC);
            }
        }
        catch (PDOException $e) {
            print($e->getMessage());
            die();
        }

        return $all_quizzes;
    }

    public function get_questionnaire_nom($id_questionnaire) {
        $result = array();
        try {
            $req = $this->pdo->prepare("select nom from questionnaire where id = :id_questionnaire;");
            $req->bindValue(':id_questionnaire', $id_questionnaire, PDO::PARAM_INT);
            $req->execute();

            $result = $req->fetch(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) {
            print($e->getMessage());
            die();
        }
        return $result['nom'];
    }
}
?>