<?php if(isset($_SESSION['logged_user'])):?>



<?php include_once 'header.php' ?>
<h1 class="mt-4">Ajouter une nouvelle recette</h1>
<form class="mt-4" action="">

    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Titre</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Titre de votre recette">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Votre recette</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Détailler votre recette" rows="10"></textarea>
    </div>
</form>

<?php include_once 'footer.php' ?>


<?php else: echo('Accees refuser') ?>
    
<?php endif ?>