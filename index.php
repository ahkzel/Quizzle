<?php
include_once "controller/pdo_controller.php";
<<<<<<< HEAD
=======
include_once "controller/user_controller.php";
include_once "controller/quizz_controller.php";
>>>>>>> 21cf8a92e555a037057e7dc963aba8561e37cf85

if (session_status() === PHP_SESSION_NONE) session_start();

$request = str_replace('/index.php', '', $_SERVER['REQUEST_URI']);
$queryString = parse_url($request, PHP_URL_QUERY) ?? '';
parse_str($queryString, $queryParams);
$url = trim($queryParams["url"] ?? "", '/');

$datas = $_GET ?? NULL;
$forms = $_POST ?? NULL;

<<<<<<< HEAD
switch (TRUE) {
    case ($url === "") :
        include __DIR__."/vue/home.php";
=======
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
>>>>>>> 21cf8a92e555a037057e7dc963aba8561e37cf85
        break;
    default :
        header("Location : /");
        exit;
}
?>