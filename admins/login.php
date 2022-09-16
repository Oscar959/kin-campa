<?php
session_start();
include("../connect.php");

if(isset($_POST['name'])){
    $name = $_POST['name'];
    $firstname = $_POST['firstname'];
    $mdp = $_POST['mdp'];
    
    $query = mysqli_query($conn, "SELECT * FROM admins WHERE name='$name' AND firstname='$firstname'AND mdp='$mdp'");

    if($row=mysqli_num_rows($query)>0){
        //echo "<p class='alert alert-danger'><button class='btn btn-outline-danger'>reussie</button></p>";
        $_SESSION['name']= $name;
        $_SESSION['firstname']= $firstname;
        $_SESSION['mdp']= $mdp; 
        
        header('location:centre.php');
    }
    

   /* if($query){
        echo "<p class='alert alert-danger'><button class='btn btn-outline-danger'>reussie</button></p>";
    }else{
        echo "<p class='alert alert-danger'><button class='btn btn-outline-danger'>NON</button></p>";
    }*/
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
</head>
<style>
    *{
        font-family:verdana;
    }
</style>
<body class="m-5">
    <div class="row">
        <div class="offset-md-2 col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header alert alert-default">
                    <p class="h3">Bienvenu</p>
                </div>

                <div class="card-body text-left">
                    <p class="h4">
                        Formulaire de connection
                    </p>

                    <form action="" method="post">
                        <small class="text-muted">Entrez votre nom</small>
                        <input type="text" name="name" class="form-control p-2" id="name">

                        <small class="text-muted">Entrez votre prenom</small>
                        <input type="text" name="firstname" class="form-control p-2" id="firstname">

                        <small class="text-muted">Entrez votre mot de passe</small>
                        <input type="text" name="mdp" class="form-control p-2" id="mdp">

                        <input type="submit" value="Send" class="btn btn-outline-primary btn-lg btn-block m-2">
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>
</html>