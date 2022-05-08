<?php
session_start();
if($_SESSION["autoriser"]!="oui"){
  header("location:login1.php");
  exit();
}
@$input=$_POST["debut"];
@$classe=$_POST["classe"];
@$matiere=$_POST["module"];
@$sub=$_POST["submit"];
if(isset($sub))
{
  $_SESSION["debut"]=$input;
  $_SESSION["classe"]=$classe;
  $_SESSION["module"]=$matiere;
  header("location:saisirAbsence1.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Saisir Absence</title>
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/jumbotron.css" rel="stylesheet">

</head>
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
              <a class="nav-link dropdown-toggle" href="index2.php" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Groupes</a>              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="afficherEtudiants.html">Lister tous les étudiants</a>
                <a class="dropdown-item" href="afficherEtudiantsParClasse.html">Etudiants par Groupe</a>
                <a class="dropdown-item" href="ajoutergroupe.php">Ajouter Groupe</a>
                <a class="dropdown-item" href="modifiergroupe.php">Modifier Groupe</a>
                <a class="dropdown-item" href="supprimergroupe.php">Supprimer Groupe</a>
      
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Etudiants</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="ajouterEtudiant.html">Ajouter Etudiant</a>
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
              <h1 class="display-4">Signaler l'absence pour tout un groupe</h1>
              <p>Pour signaler, annuler ou justifier une absence, choisissez d'abord le groupe, le module puis l'étudiant concerné!</p>
            </div>
          </div>

<div class="container">
<form action="" method="post">
<div class="form-group">
  <label for="semaine">Choisir une semaine:</label><br>
  <input id="semaine" type="week" name="debut" size="10" class="datepicker"  onclick="refrech()"/>
</div>
  <div class="form-group">
<label for="classe">Choisir un groupe:</label><br>
<!--
<input list="classe">
<datalist id="classe" name="classe">
    <option value="INFO1-A">1-INFOA</option>
    <option value="INFO1-B">1-INFOB</option>
    <option value="INFO1-C">1-INFOC</option>
    <option value="INFO1-D">1-INFOD</option>
    <option value="INFO1-E">1-INFOE</option>
</datalist>
-->
<select id="classe" name="classe"  class="custom-select custom-select-sm custom-select-lg">
    <option value="INFO1-A">1-INFO A</option>
    <option value="INFO1-B">1-INFO B</option>
    <option value="INFO1-C">1-INFO C</option>
    <option value="INFO1-D">1-INFO D</option>
    <option value="INFO1-E">1-INFO E</option>
</select>
<?php echo $classe;?>
</div>


<div class="form-group">
  <label for="module">Choisir un module:</label><br>
  <select id="module" name="module"  class="custom-select custom-select-sm custom-select-lg">
      <option value="web">Tech. Web</option>
      <option value="SGBD">SGBD</option>
  </select>
  </div>


<br>
 <!--Bouton Valider-->
 <button  type="submit" class="btn btn-primary btn-block" name="submit">Valider</button>
 
</form>
</div>

</main>

<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
</body>
</html>