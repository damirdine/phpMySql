<?php
    session_start();
    include_once('header.php');
    try{
        $db;
    }catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
    
    $sqlQuery= 'SELECT * FROM recettes';
    $recipesStatement = $db->prepare($sqlQuery);
    $recipesStatement->execute();
    $recipes = $recipesStatement->fetchAll();  
?>  
    
<h1 class="mt-4">Site de Recettes !</h1>
<?php include_once('login.php')?>


<?php if ($_SESSION['logged_user']) : ?>
    <?php foreach ($recipes as $recipe) : ?>
        <article>
            <h3><?php echo ($recipe['title']); ?></h3>
            <div><?php echo ($recipe['recipe']); ?></div>
            <i><?php echo ($recipe['author']); ?></i>
        </article>
    <?php endforeach ?>
<?php endif; ?>
    
<?php include_once('footer.php'); ?>


