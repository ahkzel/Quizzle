<?php
include_once "controller/pdo_controller.php";
include_once "controller/user_controller.php";
include_once "controller/quizz_controller.php";
include_once "controller/question_controller.php";
include_once "controller/ticket_controller.php";

if (session_status() === PHP_SESSION_NONE) session_start();

$request = str_replace('/index.php', '', $_SERVER['REQUEST_URI']);
$queryString = parse_url($request, PHP_URL_QUERY) ?? '';
parse_str($queryString, $queryParams);
$url = trim($queryParams["url"] ?? "", '/');

$datas = $_GET ?? NULL;
$forms = $_POST ?? NULL;

$PDOC = new Pdo_controller();
$userC = new User_controller($PDOC);
$quizzC = new Quizz_controller($PDOC);
$questionC = new Question_controller($PDOC);
$ticketC = new Ticket_controller($PDOC);

switch (TRUE) {
    case ($url === "") :
        $quizzC->show_homepage();
        break;
    case ($url === "login"):
        $userC->show_login();
        break;
    case ($url === "create-account"):
        $userC->show_create_account();
        break;
    case ($url === "questions"):
        $id_questionnaire = isset($_GET['id_questionnaire']) ? (int)$_GET['id_questionnaire'] : null;
        $questionC->show_questions($id_questionnaire);
        break;
    case ($url === "ticket"):
        $id_question = isset($_GET['id_question']) ? (int)$_GET['id_question'] : null;
        $ticketC->show_ticket($id_question);
        break;
    case ($url === "tickets"):
        $id_question = isset($_GET['id_question']) ? (int)$_GET['id_question'] : null;
        $ticketC->show_question_tickets($id_question);
        break;
    case ($url === "ticket-submit"):
        $type_ticket = $_POST['type_ticket'] ?? null;
        $contenu = $_POST['contenu'] ?? null;
        $id_question = isset($_GET['id_question']) ? (int)$_GET['id_question'] : null;
        $ticketC->submit_ticket($type_ticket, $contenu, $id_question);
        break;
    default :
        header("Location : /");
        exit;
}
?>