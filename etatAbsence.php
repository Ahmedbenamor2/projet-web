<?php
session_start();
if($_SESSION["autoriser"]!="oui"){
  header("location:login1.php");
  exit();
}
  
@$erreur="";
if(isset($_POST["submit"])){
  if(strtotime($_POST["fin"])>=strtotime($_POST["debut"])){
    $_SESSION["debutdate"]=$_POST["debut"];
    $_SESSION["findate"]=$_POST["fin"];
    $_SESSION["class"]=$_POST["classe"];
    header("location:etatAbsence1.php");
  }
  else $erreur="veillez donner une période valide!! ";

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Etat Absence</title>
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
<style>
  #erreur {
    color: red;
    border-style: solid;
    width: 50%;
    text-align:center;
    margin: auto;
  }
  #erreur:hover{
    color:white ;
    background-color: red;
  }
</style>
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
              <h1 class="display-4">État des absences pour un groupe</h1>
              <p>Pour afficher l'état des absences, choisissez d'abord le groupe  et la periode concernée!</p>
            </div>
          </div>

<div class="container">
<form action="" method="post">
  <table><tr><td>Date de début (j/m/a) : </td><td>
    <input type="date" name="debut" size="10"  class="datepicker" required/>
    </td></tr><tr><td>Date de fin : </td><td>
    <input type="date" name="fin" size="10"  class="datepicker" required/>
    </td></tr></table>

<div class="form-group">
<label for="classe">Choisir une classe:</label><br>
<!--
<input list="classe">
<datalist id="classe" name="classe">
    <option value="1-INFOA">1-INFOA</option>
    <option value="1-INFOB">1-INFOB</option>
    <option value="1-INFOC">1-INFOC</option>
    <option value="1-INFOD">1-INFOD</option>
    <option value="1-INFOE">1-INFOE</option>
</datalist>
-->
<select id="classe" name="classe"  class="custom-select custom-select-sm custom-select-lg">
<option value="INFO1-A">1-INFO A</option>
    <option value="INFO1-B">1-INFO B</option>
    <option value="INFO1-C">1-INFO C</option>
    <option value="INFO1-D">1-INFO D</option>
    <option value="INFO1-E">1-INFO E</option>
</select>

</div>
<button  type="submit" class="btn btn-primary btn-block" name="submit">Valider</button>
<br>
<p id="erreur"><?php echo $erreur;?></p>
<br>

<?php //echo $debut;echo "<br>";echo $fin;echo "<br>";echo strtotime($debut)." ".strtotime($fin) ?>
</form>
</div>  
</main>

<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
</body>
</html>