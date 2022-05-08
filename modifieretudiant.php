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
    <title>modifierEtudiant </title>
</head>
<style> 

.part1 h1{
  color: blue;
}
.part2 h2{
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
    <form method="post" action="modifieretudiant.php">
      <div class="part1">
      <h1 class="display-4">ModificationdEtudiant</h1>
    <h2 class="display-4">NomdEtudiantAmodifier</h2>
    <input type="text" name="nometudiant"placeholder="nometudiant"class="form-control" >
    <h2 class="display-4">PrenomdEtudiantAmodifier</h2>
    <input type="text" name="prenometudiant"placeholder="prenometudiant"class="form-control" >
      </div>

   <div class="part2">
   <h2 class="display-4">nouvellesInformations</h2>
    <h3 class="display-4">CIN   </h3>
    <input type="CIN" name="CIN"placeholder="CIN"class="form-control">
    <h3 class="display-4">email</h3>
    <input type="email" name="email"placeholder="email"class="form-control">
    <h3 class="display-4">password</h3>
    <input type="password" name="password"placeholder="password" class="form-control">
    <h3 class="display-4">nom</h3>
    <input type="text" name="nouveaunometudiant"placeholder="nouveaunometudiant" class="form-control">
    <h3 class="display-4">prenom</h3>
    <input type="text" name="prenometudiant"placeholder="prenometudiant" class="form-control" >
    <h3 class="display-4">classe</h3>
    <input type="text" name="classe"placeholder="classe" class="form-control">
    <h3 class="display-4">adresse</h3>
    <input type="text" name="adresse"placeholder="adresse" class="form-control">
    <input type="submit" value="confirmer" name="confirmation" class="btn btn-primary btn-block">
   </div>

    



    </form>
    <?php 
    include "connexion2.php";
    $resultat="";

if (isset($_POST['confirmation'])){
$prenom=$_POST['prenometudiant'];
    $cin=$_POST['CIN'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $nouveaunometudiant=$_POST['nouveaunometudiant'];
    $nometudiant=$_POST['nometudiant'];
    $nouveauprenom=$_POST['prenometudiant'];
    $classe=$_POST['classe'];
    $adresse=$_POST["adresse"];
    
    $req2="SELECT * from etudiant  where nom='$nometudiant' and prenom='$prenom'";
    $res1=mysqli_query($conn,$req2);
    if (mysqli_num_rows($res1)==0){
        echo "etudiant  not found";
    }
    else{
   
    $req="UPDATE `etudiant` set email='$email', password=md5('$password'),prenom='$nouveauprenom',adresse='$adresse',Classe='$classe' ,nom='$nouveaunometudiant'WHERE nom = '$nometudiant' and prenom='$prenom' ";
$direct=mysqli_query($conn,$req);
if ($direct){
    $resultat="modification reussie";

}
else{
    $resultat="something went wrong sorry";
}
}
}
?>
    <div class="resultat"><?php echo $resultat ?></div>
</body>
</html>