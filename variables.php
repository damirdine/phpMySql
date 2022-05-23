<?php


if(isset($_GET['limit']) && is_numeric($_GET['limit'])) {
    $limit = (int) $_GET['limit'];
} else {
    $limit = 100;
}

///// DB CONFIG

$DB_HOST = 'localhost';
$DB_NAME = 'site_recettes';
$DB_USER = 'root';
$DB_PASSWORD = '';

$db = new PDO(
    "mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8",
    $DB_USER,
    $DB_PASSWORD,
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
);