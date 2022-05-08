<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>recherchegroupe</title>
     <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/jumbotron.css" rel="stylesheet">
</head>
<style> 

</style>
<body>

<?php 
include "connexion2.php";
$erreur="";
if (isset($_POST['searchid'])){
    $groupesearch=$_POST['groupesearch'];

$req="select * from `etudiant` where Classe='$groupesearch'";
$resultat=mysqli_query($conn,$req);
if(mysqli_num_rows($resultat)==0){
    echo "pas de groupe correspondant a ce nom";
}
else{
while ($row=mysqli_fetch_array($resultat)){
   






?>
<main role="main">
        <div class="jumbotron">
         
    

<table class="table table-striped table-hover">
    <thead>
    <th> cin</th>
<th>  email</th>
<th> nom </th>
<th> prenom</th>
<th>adresse </th>
<th>  Classe </th>
    </thead>
    <div class="container">
<div class="row">
<div class="table-responsive"> 
<tbody><td><?php echo $row["cin"]?>;</td>
<td><?php echo $row ["email"]?></td>
<td><?php echo $row ["nom"] ?></td>
<td><?php echo $row ["prenom"] ?></td>
<td><?php echo $row ["adresse"] ?></td>
<td><?php echo $row ["Classe"] ?></td></tbody>

</table>

</div>
</div>
</div>


<?php }}}?>
</body>
</html>


