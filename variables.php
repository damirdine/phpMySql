<?php

if(isset($_GET['limit']) && is_numeric($_GET['limit'])) {
    $limit = (int) $_GET['limit'];
} else {
    $limit = 100;
}

///// DB CONFIG

//$DB_HOST = 'localhost';
//$DB_NAME = 'site_recettes';
// $DB_USER = 'root';
//$DB_PASSWORD = '';

//PROD DB

$DB_HOST = 'eu-cdbr-west-02.cleardb.net'; 
$DB_NAME = 'heroku_b78654bfa6ae6d8';
$DB_USER = 'bcfcecbbcd0988'; 
$DB_PASSWORD = 'cfa88139'; 

$db = new PDO(
    "mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8",
    $DB_USER,
    $DB_PASSWORD,
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
);

$sqlRecipesQuery= 'SELECT * FROM recettes';
$recipesStatement = $db->prepare($sqlRecipesQuery);
$recipesStatement->execute();
$recipes = $recipesStatement->fetchAll();

$sqlUsersQuery= 'SELECT * FROM users';
$usersStatement = $db->prepare($sqlUsersQuery);
$usersStatement->execute();
$users = $usersStatement->fetchAll();