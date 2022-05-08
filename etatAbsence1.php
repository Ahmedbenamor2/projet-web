<?php
session_start();
if($_SESSION["autoriser"]!="oui"){
  header("location:login1.php");
  exit();
}

@$classe=$_SESSION["class"]; 
@$debut=date("d-m-Y",strtotime($_SESSION["debutdate"]));
@$fin=date("d-m-Y",strtotime($_SESSION["findate"]));
include("connexion.php");
$select=$pdo->prepare("select nom,prenom from etudiant where classe=?");
$select->execute(array($classe));
$ttab=$select->fetchAll();

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

    <!-- Custom styles for this template -->
    <link href="./assets/jumbotron.css" rel="stylesheet">
<style>
  em{
    color: #1B71CC;
  }
</style>
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
              <h1 class="display-4">État des absences pour le groupe <?php echo $classe;?></h1>
              <h5>entre <em><?php echo $debut;?></em> et <em><?php echo $fin;?></em> :</h5>
            </div>
          </div>

<div class="container">
<form action="" method="post">
<div class="table-responsive"> 
  <table class="table table-striped table-hover">
  <thead>
  <tr class="gt_firstrow " ><th >Nom</th><th>Justifiées</th><th >Non justifiées</th><th >Total</th></tr>
  </thead>
  <tbody>
    <?php for($i=0;$i<count($ttab);$i++) {
      $name1=$ttab[$i]["nom"]." ".$ttab[$i]["prenom"];
      $select2=$pdo->prepare("select date,justifié from absence where nom=?");
      $select2->execute(array($name1));
      $tab2=$select2->fetchAll();
      $tot=0;$totj=0;$totnj=0;
      for($k=0;$k<count($tab2);$k++){
        if(strtotime($tab2[$k]["date"])>= strtotime($debut) && strtotime($tab2[$k]["date"])<= strtotime($fin)){
          $tot++;
          if($tab2[$k]["justifié"]=="oui") $totj++;
          else $totnj++;
        }
      }
      ?>
  <tr><td><b><?php echo $ttab[$i]["nom"]." ".$ttab[$i]["prenom"]?></b></td><td ><?php echo $totj; ?></td><td ><?php echo $totnj; ?></td><td ><?php echo $tot; ?></td></tr>
  <?php } ?>
  </tbody>
  <tfoot>
  </tfoot>
  </table>
 </div>
 <a href="etatAbsence.php">retour à la page de filtrage</a>
<?php //echo $debut;echo "<br>";echo $fin;echo "<br>";echo strtotime($debut)." ".strtotime($fin) ?>
</form>
</div>  
</main>

<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
</body>
</html>