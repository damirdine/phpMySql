<?php
    session_start();
    include_once('variable.php');
    include_once('header.php');
    try{
        $db;
    }catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
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
        <?php if ($_SESSION['logged_user']==$recipe['author']) : ?>
        <div class="button">
            <a href='./edit_recipe.php' class="btn btn-warning">Editer</a>
            <a class="btn btn-danger">Supprimer</a>
        </div>
        <?php endif;?>
    <?php endforeach ?>
<?php endif; ?>
    
<?php include_once('footer.php'); ?>


