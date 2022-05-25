<?php
session_start();
include 'variables.php';
include_once 'header.php';

if(isset($_GET['recipe_id'])){
    $sqlRecipeQuery= 'SELECT * FROM recettes WHERE recpe_id = :recpe_id' ;
    $recipeStatement = $db->prepare($sqlRecipeQuery);
    $recipeStatement->execute(
        ['recpe_id' => $_GET['recipe_id'],]
    );
    $recipe = $recipeStatement->fetch();
}
?>
<?php if(isset($recipe)):?>
    <?php if($recipe['author']==$_SESSION['logged_user']):?>
        <h3 class="mt-4">Supprimer definitivement la recette  : <?php echo($recipe['title'] . " (id : " . $recipe['recpe_id'].")") ?></h3>
        <form action="./submit_delete_recipe.php" method="post">
        <input type="hidden" name="recipe_id" value="<?php echo($recipe['recpe_id']);?>">
            <button type="submit" class="btn btn-danger mb-3">Supprimer</button>
        </form>
    <?php else:?>
        <p class="alert alert-warning mt-5">Vous ne pouvez pas editer des recettes qui ne sont pas les votre</p>
<?php endif;
endif;
include_once 'footer.php';
?>