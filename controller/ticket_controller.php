<?php
include_once __DIR__."/pdo_controller.php";
include_once __DIR__."/../model/ticket_model.php";

class Ticket_controller {
    private $pdo;
    private $ticket_model;
    private $question_model;
    private $user_model;

    public function __construct($pdo_controller) {
        $this->pdo = $pdo_controller->get_pdo();
        $this->ticket_model = new Ticket_model($this->pdo);
        $this->question_model = new Question_model($this->pdo);
        $this->user_model = new User_model($this->pdo);
    }

    public function show_ticket($id_question) {
        if (!$id_question) {
            header("Location: index.php?url=questions");
            exit;
        }

        $question_label = $this->question_model->get_question_label($id_question);
        include __DIR__."/../vue/ticket.php";
    }

    public function submit_ticket($type_ticket, $contenu, $id_question) {
        if ($type_ticket && $contenu) {
            // $email   = $_SESSION['email'] ?? null;
            // $id_user = $this->get_user_id_by_email($email);

            // if ($id_user) {
            //     $this->ticket_model->insert_ticket($id_user, $id_question, $type_ticket, $contenu);
            //     header("Location: /questions");
            //     exit;
            // }

            $this->ticket_model->insert_ticket(7, $id_question, $type_ticket, $contenu);
            header("Location: index.php");
            exit;
        }
    }

    public function show_question_tickets($id_question) {
        if (!$id_question) {
            header("Location: index.php?url=questions");
            exit;
        }
        $all_tickets = array();

        $question_label = $this->question_model->get_question_label($id_question);
        $TEMP_all_tickets = $this->ticket_model->get_tickets_from_question($id_question);
        foreach ($TEMP_all_tickets as $TEMP_ticket){
            $TEMP_name_user = $this->user_model->get_user_from_id($TEMP_ticket["id_user"])["name"];

            $all_tickets[] = (["user" => $TEMP_name_user, "type" => $TEMP_ticket["type_ticket"],
            "contenu" => $TEMP_ticket["contenu"]]);
        }
        include __DIR__."/../vue/tickets.php";
    }
}
?>