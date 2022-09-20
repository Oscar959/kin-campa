<?php
session_start();
include("../connect.php");
    if(isset($_SESSION['name']) AND ($_SESSION['firstname']) AND($_SESSION['mdp'])){
        
    }else{
        header('location:login.php');
    }

$out = "";

if(isset($_POST['name'])){
   $name = $_POST['name'];

   $query = mysqli_query($conn, "SELECT p.id, name,middlename,firstname, libelle, g.id as id_groupe 
            FROM publishers as p 
                INNER JOIN groups as g 
                    ON p.groups_id= g.id 
                        WHERE name LIKE '%$name%' OR 
                             middlename LIKE '%$name%' OR firstname LIKE '%$name%'");

   
   if(mysqli_num_rows($query)<1){
    $out="<small class='alert alert-warning'>Ecrivez le nom du proclamateur mais son postnom ou son prenom au cas ou on oubliait son nom</small>";
   }else{
    while($row= mysqli_fetch_array($query)){
        $out = "
            <small class='text-muted'>Son Postnom</small>
            <input type='hidden' name='id' class='form-control border-success p-2' value=".$row['id']." id='id' disabled>

            <small class='text-muted'>Son Postnom</small>
            <input type='text' name='middlename' class='form-control border-success p-2' value=".$row['middlename']." id='middlename' disabled>
    
            <small class='text-muted'>Son prenom</small>
            <input type='text' name='firstname' class='form-control border-success p-2' value=".$row['firstname']." id='firstname' disabled>

            <small class='text-muted'>id-groupe</small>
            <input type='hidden' name='id-groupe' class='form-control border-success p-2' value=".$row['id_groupe']." id='id-groupe' disabled>

            <small class='text-muted'>Son Groupe </small>
            <input type='text' name='groupe' class='form-control border-success p-2' value=".$row['libelle']." id='groupe' disabled>

            
        ";
       }
   }
   
    echo $out;
    
}
?>