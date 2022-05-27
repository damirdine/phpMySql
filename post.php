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

    $sqlCommentsQuery= 'SELECT * FROM comments WHERE recipe = :recipe' ;
    $commentsStatement = $db->prepare($sqlCommentsQuery);
    $commentsStatement->execute(
        ['recipe' => $_GET['recipe_id'],]
    )or die(print_r($db->errorInfo()));
    $comments = $commentsStatement->fetchAll();
};

if(isset($_POST['comment']) && isset($_POST['recipe_id']) && isset($_POST['user']) ){

    $addCommentSqlREquest = "INSERT INTO comments (comment,recipe,user_id,created_at) VALUES (:comment, :recipe, :user_id, :created_at,); ";
    $addComment = $db -> prepare($addCommentSqlREquest);
    $addComment->execute(
        [
            'comment'=> $_POST['comment'],
            'recipe'=>$_POST['recipe_id'],
            'user_id'=> $_POST['user'],
            'created_at' => date('Y-m-d\TH:i:s'),
            'ranking' => null
        ]
    )or die(print_r($db->errorInfo()));
};
var_dump(date('Y-m-d\TH:i:s'));
?>
<?php if(isset($recipe)):?>
    <?php if(isset($_SESSION['logged_user'])):?>
        <h1 class="my-5"><?php echo($recipe['title']) ?></h1>
        <p><?php echo($recipe['recipe'])?></p>
        <hr>
        <form class="mt-4" action="./post.php?recipe_id=<?php echo($recipe['recpe_id'])?>" method="POST">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Commentaire</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name='comment' placeholder="Détailler votre recette" rows="2" required></textarea>
            </div>
            <input type="hidden" name="user" value="<?php echo($_SESSION['logged_user']);?>">
            <input type="hidden" name="recipe_id" value="<?php echo($recipe['recpe_id']);?>">
            <button type="submit" class="btn btn-warning mb-3">commenter</button>
        </div>
        </form>
        <div class="comments-container">
        <?php foreach ($comments as $comment) : ?>
            <article class="my-4">
                <h4><?php echo ($comment['user_id']); ?></h4>
                <p><?php echo ($comment['comment']); ?></p>
            </article>
        <?php endforeach; ?>
        </div>
    <?php else:?>
        <p class="alert alert-warning mt-5"></p>
<?php endif;
endif;
include_once 'footer.php';
?>