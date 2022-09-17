<?php
session_start();
include("../connect.php");
    if(isset($_SESSION['name']) AND ($_SESSION['firstname']) AND($_SESSION['mdp'])){
        
    }else{
        header('location:login.php');
    }


if(isset($_POST['name'])){
   $name = $_POST['name'];

   $query = mysqli_query($conn, "SELECT p.id, name,middlename,firstname, libelle 
            FROM publishers as p 
                INNER JOIN groups as g 
                    ON p.groups_id= g.id 
                        WHERE name LIKE '%$name%' OR 
                             middlename LIKE '%$name%' OR firstname LIKE '%$name%'");
   $out = "";

   
   if(mysqli_num_rows($query)<1){
    $out="<small class='alert alert-warning'>Ecrivez le nom du proclamateur mais son postnom ou son prenom au cas ou on oubliait son nom</small>";
   }else{
    while($row= mysqli_fetch_array($query)){
        $out = "
            <small class='text-muted'>Son Postnom</small>
            <input type='text' name='firstname' class='form-control border-success p-2' value=".$row['middlename']." id='firstname' disabled>
    
            <small class='text-muted'>Son prenom</small>
            <input type='text' name='firstname' class='form-control border-success p-2' value=".$row['firstname']." id='firstname' disabled>

            <small class='text-muted'>Son prenom</small>
            <input type='text' name='firstname' class='form-control border-success p-2' value=".$row['libelle']." id='firstname' disabled>

            
        ";
       }
   }
   
    echo $out;
    
}    
?>