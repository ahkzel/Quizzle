<?php
include_once "controller/pdo_controller.php";

if (session_status() === PHP_SESSION_NONE) session_start();

$request = str_replace('/index.php', '', $_SERVER['REQUEST_URI']);
$queryString = parse_url($request, PHP_URL_QUERY) ?? '';
parse_str($queryString, $queryParams);
$url = trim($queryParams["url"] ?? "", '/');

$datas = $_GET ?? NULL;
$forms = $_POST ?? NULL;

switch (TRUE) {
    case ($url === "") :
        include __DIR__."/vue/home.php";
        break;
    default :
        header("Location : /");
        exit;
}
?>