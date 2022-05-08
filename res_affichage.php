<?php
include "connexion2.php";
$query="SELECT * from `etudiant`";
$result=mysqli_query($conn,$query);
$users=mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($users);
?> 
