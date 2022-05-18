<?php session_start()?>
<?php include_once('header.php');
?>  

    
<h1>Site de Recettes !</h1>
<?php include_once('login.php')?>


<?php if ($_SESSION['logged_user']) : ?>
    <?php foreach (get_recipes($recipes, $limit) as $recipe) : ?>
        <article>
            <h3><?php echo ($recipe['title']); ?></h3>
            <div><?php echo ($recipe['recipe']); ?></div>
            <i><?php echo (display_author($recipe['author'], $users)); ?></i>
        </article>
    <?php endforeach ?>
<?php endif; ?>
    
<?php include_once('footer.php'); ?>


