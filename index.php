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
        <article class="my-4">
            <a class="text-dark" href="./post.php?recipe_id=<?php echo($recipe['recpe_id'])?>"><h3><?php echo ($recipe['title']); ?></h3></a>
            <div><?php echo ($recipe['recipe']); ?></div>
            <i><?php echo ($recipe['author']); ?></i>
            <?php if ($_SESSION['logged_user']==$recipe['author']) : ?>
                <div class="btn-container d-flex gap-3">
                    <form action="./edit_recipe.php" methode="GET">
                        <input type="hidden" name="recipe_id" value="<?php echo ($recipe['recpe_id']); ?>">
                        <input type="submit" class="btn btn-warning" value="Editer">
                    </form>
                    <form action="./delete_recipe.php" methode="GET">
                        <input type="hidden" name="recipe_id" value="<?php echo ($recipe['recpe_id']); ?>">
                        <input type="submit" class="btn btn-danger" value="Supprimer">
                    </form>
                </div>
        </article>
        <?php endif;?>
    <?php endforeach ?>
<?php endif; ?>
    
<?php include_once('footer.php'); ?>


