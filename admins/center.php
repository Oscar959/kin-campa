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
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            *{
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        
                        <div class="row">
                            <div class="offset-md-2 col-md-8 offset-md-2">
                            <div class="card">
                                <div class="alert alert-info text-dark" id="alert-message" style="display:none">
                                
                                </div>
                                <div class="card-header alert alert-default">
                                    <p class="h4 text-center">Bienvenu dans la page d'admnistrateur <?= $name ?> <?= $firstname ?></p>
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
                                    <p class="h5 text-center text-group-head">Quelques options pour mon groupe de predication</p>

                                    <div class="div row mt-2">
                                        <div class="col-lg-4">
                                            <p class="h6">
                                                <button class="btn btn-outline-success alert alert-success accept-publisher">Accepter la demande d'un proclamateur</button> 
                                            </p>

                                            <p class="h6">
                                                <button class="btn btn-outline-warning alert alert-warning changement-pub ">Liberer un proclamateur pour un autre groupe</button> 
                                            </p>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div id="accept-publisher-div" class="text-success" style="display:none">
                                    <p class="h5 text-center text-success">La liste de ceux qui ont envoyé les demandes pour faire partie du groupe</p>

                                    <p class="h6">
                                        <button class="btn btn-outline-success alert alert-success accept-publisher-return  m-5">Retourner à la page d'accueil</button> 
                                    </p>
                                </div>


                                <div id="changement-pub-div" class="text-warning" style="display:none">
                                    <p class="h5 text-center text-warning">Liberer un proclammateur</p>



                                    <p class="h6">
                                        <button class="btn btn-outline-warning alert alert-warning changement-pub-return  m-5">Retourner à la page d'accueil</button> 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                        
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
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

                // a function to align center an element
                //Another function  $(".accept-publisher").css({top:'50%',left:'50%',margin:'-'+($('.accept-publisher').height() / 2)+'px 0 0 -'+($('.accept-publisher').width() / 2)+'px'});
                /*jQuery.fn.center = function () {
                    this.css("position","center");
                    this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) + $(window).scrollTop()) + "px");
                    this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) + $(window).scrollLeft()) + "px");
                    return this;
                }*/

                $.fn.center = function() {
                    this.css({
                        'position': 'fixed',
                        'left': '50%',
                        'top': '30%'
                    });
                    this.css({
                        'margin-left': -this.outerWidth() / 2 + 'px',
                        'margin-top': -this.outerHeight() / 2 + 'px'
                    });

                    return this;
                }

                $(document).on('click', '.accept-publisher', function(){
                    $(".accept-publisher").center();
                    $(".accept-publisher").css("display", "none");
                    $(".text-group-head").css("display", "none");
                    $("#accept-publisher-div").css("display", "block");
                    $(".changement-pub").css("display", "none");
                    $("#changement-pub-div").css("display", "none");
                });

                $(document).on('click', '.changement-pub', function(){
                    $(".changement-pub").center();
                    $(".changement-pub").css("display", "none");
                    $(".text-group-head").css("display", "none");
                    $("#changement-pub-div").css("display", "block");
                    $(".accept-publisher").css("display", "none");
                    $("#accept-publisher-div").css("display", "none");
                });

                $(document).on('click', '.accept-publisher-return', function(){
                    window.location.replace("center.php");
                });

                $(document).on('click', '.changement-pub-return', function(){
                    window.location.replace("center.php");
                });

            
            })
        </script>
    </body>
</html>
