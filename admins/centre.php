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
                    <div class="alert alert-info text-dark" id="alert-message" style="display:none">
                       
                    </div>
                    <div class="card-header alert alert-default">
                        <p class="h4">Bienvenu dans la page d'admnistrateur <?= $name ?> <?= $firstname ?></p>
                    </div>

                    <div class="card-body">
                    <div class="div row principal-div">
                    <p class="h5 ">Quelques options pour l'admnistrateur</p>
                        <div class="col-lg-3">
                            <p class="h6">
                                <button class="btn btn-outline-success alert alert-success add-report">Ajouter un rapport</button> 
                            </p>

                            <p class="h6">
                                <button class="btn btn-outline-warning alert alert-warning see-report">Imprimer un rapport</button> 
                            </p>
                        </div>

                        <div class="col-lg-3">
                            <p class="h6">
                                <button class="btn btn-outline-info alert alert-info modify-report">Modifier un rapport</button> 
                            </p>

                            <p class="h6">
                                <button class="btn btn-outline-dark alert alert-dark group-report"> Mon groupe de predication</button> 
                            </p>
                        </div>

                        
                    </div>

                        <form id="form-report" style="display:none">
                            <p class="h5 text-center text-success">Remplissez le formulaire de raport du proclammateur</p>
                            <small class="text-muted">Ecrivez le nom du proclamateur</small>
                            <input type="text" name="name" class="form-control border-success p-2 name-keyup" id="name">

                            <div class="provided-input" style="display:none">
                                
                            </div> 

                            <hr>

                            <small class="text-muted">Mois de rapport</small>
                            <select name="month" id="month" class="form-control">
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
                            <input type="number" name="heures" class="form-control border-success p-2" id="heures">

                            <small class="text-muted">publications</small>
                            <input type="number" name="publications" class="form-control border-success p-2" id="publications">

                            <small class="text-muted">Videos</small>
                            <input type="number" name="videos" class="form-control border-success p-2" id="videos">

                            <small class="text-muted">Nouvelle visite</small>
                            <input type="number" name="nv" class="form-control border-success p-2" id="nv">

                            <small class="text-muted">Cours biblique</small>
                            <input type="number" name="cb" class="form-control border-success p-2" id="cb">

                            <input type="submit" value="Send" class="btn btn-outline-primary btn-lg btn-block m-2">
                        </form>

                    </div>

                    <div id="see-report-div" class="m-2" style="display:none">
                        <p class="h5 text-center text-warning">Formulaire du mois d'impression de rapport</p>
                        <form action="report.php" method="GET">
                            <small class="text-muted text-warning">Choisissez le mois à imprimer le rapport</small>
                            <select name="month" id="month" class="form-control">
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
                            <small class="text-danger text-muted text-see-report" style="display:none">Rassurez-vous que vous qu'au cas ou vous cliquez sur janvier,
                                 vous ayez d'abord choisir un autre mois après revenir sur janvier
                            </small>
                            <input type="submit" value="Imprimer" class="btn btn-outline-warning m-2">
                        </form>
                    </div>

                    <div id="group-report-div" class="m-2 bg-outline-dark" style="display:none">
                        <p class="h5 text-center">Quelques options pour mon groupe de predication</p>

                        <div class="div row mt-2">
                            <div class="col-lg-4">
                                <p class="h6">
                                    <button class="btn btn-outline-success alert alert-success accept-publisher">Accepter la demande d'un proclamateur</button> 
                                </p>

                                <p class="h6">
                                    <button class="btn btn-outline-warning alert alert-warning see-report">Liberer un proclamateur pour un autre groupe</button> 
                                </p>
                            </div>
                            
                        </div>
                    </div>

                    <div id="accept-publisher-div" class="text-warning" style="display:none">
                        <p class="h5 text-center text-warning">La liste de ceux qui ont envoyé les demandes pour faire partie du groupe</p>
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
                $(".principal-div").css("display", "none");
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

            $(document).on('submit', '#form-report', function(e){
                e.preventDefault();
                var heures = $("#heures").val();
                var videos = $("#videos").val();
                var publications = $("#publications").val();
                var publishers = $("#id").val();
                var cb = $("#cb").val();
                var nv = $("#nv").val();
                var month = $("#month").val();
                
                $.ajax({
                    url:"ajax_file.php",
                    method:"POST",
                    data: {
                        heures:heures,
                        videos:videos,
                        publications:publications,
                        publishers:publishers,
                        cb:cb,
                        nv:nv,
                        month:month
                    },
                    success:function(data){
                        $("#form-report").css("display", "none");
                        $("#form-report")[0].reset();
                        $("#alert-message").html(data);
                        $("#alert-message").fadeIn(3000);
                        $("#alert-message").fadeOut(5000);
                    }
                });
            })

            $(document).on('click', '.see-report', function(){
                $("#see-report-div").css("display", "block");
                $(".principal-div").css("display", "none");
            });

            $(document).on('change', '#month', function(){
                /* var month_on_change = $("#month").val();
                //sending the id of the selected month to the server in order to prepapre the pdf that we are going to display 
                $.ajax({
                    url:"report.php",
                    method:"GET",
                    data:{id:month_on_change},
                    success:function(data){
                        
                    }
                }); */
            });

            $(document).on('click', '.group-report', function(){
                $("#group-report-div").css("display", "block");
                $(".principal-div").css("display", "none");
                
            });

            $(document).on('click', '.accept-publisher', function(){
                $("#accept-publisher-div").css("display", "block");
                //$(".principal-div").css("display", "none");
            });


        })
    </script>
</body>
</html>