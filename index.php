<?php
include_once "controller/pdo_controller.php";
include_once "controller/user_controller.php";
include_once "controller/quizz_controller.php";

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
    default :
        header("Location : /");
        exit;
}
?>