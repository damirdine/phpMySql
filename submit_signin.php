<?php
    session_start();
    include_once 'variables.php';

    foreach ($users as $user) {
        if (($user['email'] == $_POST['email'])) {
            $alredyAccount = 'Vous avez deja un compte associe a : ' . $_POST['email'];
        }
    }

    if(!isset($alredyAccount) && $_POST['password']==$_POST['confirm_password']){

        $user_fullname = $_POST['fullname'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];
        $user_confirm_password = $_POST['confirm_password'];
        $user_age = $_POST['age'];
        $addUserSqlREquest = "INSERT INTO users (fullname,email,password,age) VALUES (:fullname, :email, :password, :age); ";
        $addUser = $db -> prepare($addUserSqlREquest);
        $addUser->execute(
            [
                'fullname'=> $user_fullname,
                'email'=>$user_email,
                'password'=> $user_password,
                'age' => $user_age,
            ]
        )or die(print_r($db->errorInfo()));
        $_SESSION['logged_user'] = $user_email;
        $_SESSION['logged_user_name'] = $user_fullname;
    
    }else{
           $checkForm = 'Veillez bien remplir le formulaire';
    }

    include_once 'header.php';
?>
<?php if(isset($alredyAccount)):?>
    <h3 class="alert alert-warning my-5"><?php echo($alredyAccount);?> </h3>
<?php elseif(isset($checkForm)):?>
    <h3 class="alert alert-warning my-5"><?php echo($checkForm);?> </h3>
<?php else:?>
    <h3 class="alert alert-success my-5">Bienvenue parmis nous <?php echo(htmlspecialchars(($_SESSION['logged_user_name'])))?></h3>
    <a class="btn btn-primary" href="./index.php">Retour a l'accueil</a>
<?php endif;?>
<?php include_once 'footer.php';?>