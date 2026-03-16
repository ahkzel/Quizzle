<?php
class Ticket_model {
    private $pdo;

    public function __construct($pdo) {
        if (isset($pdo)) $this->pdo = $pdo;
    }

    public function insert_ticket($id_user, $id_question, $type_ticket, $contenu) {
        try {
            $req = $this->pdo->prepare("insert into ticket (id_user, id_question, type_ticket, contenu) 
                                        VALUES (:id_user, :id_question, :type_ticket, :contenu);");
            $req->bindValue(':id_user', $id_user, PDO::PARAM_INT);
            $req->bindValue(':id_question', $id_question, PDO::PARAM_INT);
            $req->bindValue(':type_ticket', $type_ticket, PDO::PARAM_STR);
            $req->bindValue(':contenu', $contenu, PDO::PARAM_STR);
            $req->execute();
        }
        catch (PDOException $e) {
            print($e->getMessage());
            die();
        }
    }

    public function get_tickets_from_question($id_question) {
        $all_tickets = array();

        try {
            $req = $this->pdo->prepare("select id_user, type_ticket, contenu from ticket where id_question = :id_question");
            $req->bindValue(':id_question', $id_question, PDO::PARAM_INT);
            $req->execute();

            $a_ticket = $req->fetch(PDO::FETCH_ASSOC);
            while ($a_ticket){
                $all_tickets[] = $a_ticket;
                $a_ticket = $req->fetch(PDO::FETCH_ASSOC);
            }
        }
        catch (PDOException $e) {
            print($e->getMessage());
            die();
        }

        return $all_tickets;
    }
    
}
?>