<?php
session_start();
if($_SESSION["autoriser"]!="oui"){
  header("location:login1.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/jumbotron.css" rel="stylesheet">
    <title>recherche Etudiant </title>
</head>
<style>
    input[type="text"]{
        width: 440px;
    }
h2{
  color:blue;
}
    </style>
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="index2.php">SCO-Enicar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index2.php">Home <span class="sr-only">(current)</span></a>
      </li>
  
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="index.html" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Groupes</a>        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="afficherEtudiants1.php">Lister tous les étudiants</a>
          <a class="dropdown-item" href="afficherEtudiantsParClasse.php">Etudiants par Groupe</a>
          <a class="dropdown-item" href="ajoutergroupe.php">Ajouter Groupe</a>
          <a class="dropdown-item" href="modifiergroupe.php">Modifier Groupe</a>
          <a class="dropdown-item" href="supprimergroupe.php">Supprimer Groupe</a>

        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Etudiants</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="ajouterEtudiant.php">Ajouter Etudiant</a>
          <a class="dropdown-item" href="chercheretudiant.php">Chercher Etudiant</a>
          <a class="dropdown-item" href="modifieretudiant.php">Modifier Etudiant</a>
          <a class="dropdown-item" href="supprimeretudiant.php">Supprimer Etudiant</a>


        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Absences</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="saisirAbsence.php">Saisir Absence</a>
          <a class="dropdown-item" href="etatAbsence.php">État des absences pour un groupe</a>
        </div>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="deconnexion.php">Se Déconnecter <span class="sr-only">(current)</span></a>
      </li>

    </ul>
  
    <form class="form-inline my-2 my-lg-0" action="recherche.php" method="POST">
      <input class="form-control mr-sm-2"  name ="groupesearch"type="text" placeholder="Saisir un groupe" aria-label="Chercher un groupe">
      <input type="submit" class="btn btn-outline-success my-2 my-sm-0" name="searchid">
    </form>
  

  </div>
</nav>
<main role="main">
        <div class="jumbotron">
            <div class="container">
    <h2>Chercher Etudiant </h2>
    <form method="POST" action="chercheretudiant.php">
    <input type="text" name="etudiant" placeholder="donner quelques informations sur l etudiant pour le trouver">
    <input type="submit" name="confirmation" class="btn btn-primary btn-block">
    </form>
  
   
    <?php 
    
include "connexion2.php";



if (isset($_POST['confirmation'])){
  
    $etudiant=$_POST["etudiant"];
    $req=" SELECT * FROM `etudiant` WHERE cin like '$etudiant' OR email LIKE '$etudiant' OR nom like '$etudiant' OR prenom like '$etudiant' OR adresse like '$etudiant' ";
    $res=mysqli_query($conn,$req);
    $count=0;
    
if (mysqli_num_rows($res)>0){
  
    $count++;
    while ($row=mysqli_fetch_array($res)){




   
    







?>
<div class="container">
<div class="row">
<div class="table-responsive"> 
<table class="table table-striped table-hover">
<tr>
        <th>cin</th>
        <th>email</th>
        <th>nom</th>
        <th>prenom</th>
        <th>adresse</th>
        <th>classe</th>

    </tr>

<tr>
    
<td><?php echo $row["cin"]?>;</td>
<td><?php echo $row ["email"]?></td>
<td><?php echo $row ["nom"] ?></td>
<td><?php echo $row ["prenom"] ?></td>
<td><?php echo $row ["adresse"] ?></td>
<td><?php echo $row ["Classe"] ?></td>
</tr>
</table>
<?php 

}}
else {
    echo "erreur pas de resultat valide";
}}?>









</body>
</html>
