<?php 

include "connexion2.php";
if (isset($_GET['deletecin'])){
    $cin=$_GET['deletecin'];
$req="DELETE FROM `etudiant`WHERE cin=$cin ";
$result=mysqli_query($conn,$req);
if($result){
    echo "suppression reussie";
}
}
?>