<?php 
try{
    $mysqlClient = new PDO(
        'mysql:host=localhost;dbname=site_recettes;chartset-utf8',
        'root',
        ''
    );
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

$sqlQuery= 'SELECT * FROM recettes';
$recipesStatement = $mysqlClient->prepare($sqlQuery);
$recipesStatement->execute();
$recipes = $recipesStatement->fetchAll();

foreach($recipes as $recipe) {
?>
    <p><?php echo $recipe['author'] ?></p>

<?php } ?>
