<?php 
try{
    $db = new PDO(
        'mysql:host=localhost;dbname=site_recettes;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}


$sqlQuery= 'SELECT * FROM recettes WHERE is_enabled = :is_enabled';
$recipesStatement = $db->prepare($sqlQuery);
$recipesStatement->execute(
    ['is_enabled' => true,]
);
$recipes = $recipesStatement->fetchAll();

foreach($recipes as $recipe) {
    //if($recipe['is_enabled']==1){
?>

    <p><?php echo $recipe['title']?></p>
    <p><?php echo $recipe['author']?></p>
    <p><?php echo $recipe['recipe']?></p>
    <hr>

<?php //}
} ?>
