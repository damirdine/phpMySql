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
        <h1 class="mt-4">Modifier la recette : <?php echo($recipe['title']) ?></h1>
        <form class="mt-4" action="./submit_update_recipe.php" method="POST">
            <p><?php //var_dump($recipe); ?></p>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Titre</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name='title' placeholder="Titre de votre recette" required value="<?php echo($recipe['title']);?>">
            </div>
            <input type="hidden" name="recipe_id" value="<?php echo($recipe['recpe_id']);?>">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Votre recette</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name='recipe' placeholder="Détailler votre recette" rows="10" required><?php echo($recipe['recipe']);?></textarea>
            </div>
            <div class="col-auto">
            <button type="submit" class="btn btn-warning mb-3">Appliquer les modifications</button>
        </div>
        </form>
    <?php else:?>
        <p class="alert alert-warning mt-5">Vous ne pouvez pas editer des recettes qui ne sont pas les votre</p>
<?php endif;
endif;
include_once 'footer.php';
?>