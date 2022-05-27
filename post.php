<?php
session_start();
include 'variables.php';
include_once 'header.php';
if(isset($_GET['recipe_id'])){
    $sqlRecipeQuery= 'SELECT * FROM recettes WHERE recpe_id = :recpe_id' ;
    $recipeStatement = $db->prepare($sqlRecipeQuery);
    $recipeStatement->execute(
        ['recpe_id' => $_GET['recipe_id'],]
    )or die(print_r($db->errorInfo()));
    $recipe = $recipeStatement->fetch();
}
?>
<?php if(isset($recipe)):?>
    <?php if(isset($_SESSION['logged_user'])):?>
        <h1 class="my-5"><?php echo($recipe['title']) ?></h1>
        <p><?php echo($recipe['recipe'])?></p>
        <hr>
        <form class="mt-4" action="./post" method="POST">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Commentaire</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name='update_recipe' placeholder="Détailler votre recette" rows="2" required></textarea>
            </div>
            <input type="hidden" name="recipe_id" value="<?php echo($recipe['recpe_id']);?>">
            <button type="submit" class="btn btn-warning mb-3">commenter</button>
        </div>
        </form>
    <?php else:?>
        <p class="alert alert-warning mt-5">Vous ne pouvez pas éditer une recette qui n'est pas la vôtre</p>
<?php endif;
endif;
include_once 'footer.php';
?>