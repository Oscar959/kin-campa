<?php
session_start();
include("../connect.php");
    if(isset($_SESSION['name']) AND ($_SESSION['firstname']) AND($_SESSION['mdp'])){
        
    }else{
        header('location:login.php');
    }

    $name = $_SESSION['name'];
    $firstname= $_SESSION['firstname'];
    $mdp = $_SESSION['mdp'];
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
        <div class="row">
            <div class="offset-md-2 col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header alert alert-default">
                        <p class="h4">Bienvenu dans la page d'admnistrateur <?= $name ?> <?= $firstname ?></p>
                    </div>

                    <div class="card-body">
                        <p class="h5 ">Quelques options pour l'admnistrateur</p>

                        <p class="h6">
                            <button class="btn btn-outline-success alert alert-success add-report">Ajouter un rapport</button> 
                        </p>

                        <form id="form-report" style="display:none">
                            <small class="text-muted">Ecrivez le nom du proclamateur</small>
                            <input type="text" name="name" class="form-control border-success p-2 name-keyup" id="name">

                            <div class="provided-input" style="display:none">
                                
                            </div> 

                            <hr>

                            <small class="text-muted">Mois de rapport</small>
                            <select name="categories" id="categories" class="form-control">
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM month");
                                $out = "";
                                while($res = mysqli_fetch_array($query)){
                                    $out .="
                                    <option value=".$res['id']." class='form-control'>".$res['libelle']."</option>
                                    ";

                                }
                                echo $out;
                                ?>     
                 
                             </select>


                            <small class="text-muted">Heures</small>
                            <input type="number" name="Heures" class="form-control border-success p-2" id="Heures">

                            <small class="text-muted">Publications</small>
                            <input type="number" name="Publications" class="form-control border-success p-2" id="Publications">

                            <small class="text-muted">Videos</small>
                            <input type="number" name="Videos" class="form-control border-success p-2" id="Videos">

                            <small class="text-muted">Nouvelle visite</small>
                            <input type="number" name="nv" class="form-control border-success p-2" id="nv">

                            <small class="text-muted">Cours biblique</small>
                            <input type="number" name="cb" class="form-control border-success p-2" id="cb">

                            <input type="submit" value="Send" class="btn btn-outline-primary btn-lg btn-block m-2">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(document).on('click', '.add-report', function(){
                $("#form-report").css("display", "block");
            });

            $(document).on('keyup', '.name-keyup', function(){
                var name= $(".name-keyup").val();
                if(name == ''){
                    $(".provided-input").css("display", "none");
                }else{
                    $.ajax({
                    url:"ajax_file.php",
                    method:"POST",
                    data:{name:name},
                    success:function(data){
                        $(".provided-input").css("display", "block");
                        $(".provided-input").html(data);
                    }
                });
                }
            });


        })
    </script>
</body>
</html>