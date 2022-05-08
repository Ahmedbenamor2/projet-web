<?php
session_start();
if($_SESSION["autoriser"]!="oui"){
    header("location:login1.php");
    exit();
 }
$mod=$_SESSION["module"];
$jour1=date("d-m-Y",strtotime($_SESSION["debut"]."-1"));
 $jour2=date("d-m-Y",strtotime($_SESSION["debut"]."-2"));
  $jour3=date("d-m-Y",strtotime($_SESSION["debut"]."-3"));
  $jour4=date("d-m-Y",strtotime($_SESSION["debut"]."-4"));
  $jour5=date("d-m-Y",strtotime($_SESSION["debut"]."-5"));
  $jour6=date("d-m-Y",strtotime($_SESSION["debut"]."-6"));
$date=array($jour1,$jour2,$jour3,$jour4,$jour5,$jour6);

include("connexion.php");
$req=$pdo->prepare("select nom,prenom from etudiant where Classe=?");
$req->execute(array($_SESSION["classe"]));
$tab=$req->fetchAll();




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
<style>
    #msg {
        font-family: 'Times New Roman', Times, serif;
        font-size: 25px;
        background-color:#1B71CC;
    }
    strong:hover{
        color:red;
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
              <h1 class="display-4">Signaler l'absence pour tout un groupe</h1>
              <p>Pour signaler, annuler ou justifier une absence, choisissez d'abord le groupe, le module puis l'étudiant concerné!</p>
            </div>
          </div>

<div class="container">
<form action="saisirAbsence1.php" method="post">
<table rules="cols" frame="box">
  <tr><th><?php echo count($tab); ?> étudiants</th>
  
<th colspan="3" width="120px" style="padding-left: 5px; padding-right: 5px;">Lundi</th>
<th colspan="3" width="120px" style="padding-left: 5px; padding-right: 5px;">Mardi</th>
<th colspan="3" width="120px" style="padding-left: 5px; padding-right: 5px;">Mercredi</th>
<th colspan="3" width="120px" style="padding-left: 5px; padding-right: 5px;">Jeudi</th>
<th colspan="3" width="120px" style="padding-left: 5px; padding-right: 5px;">Vendredi</th>
<th colspan="3" width="120px" style="padding-left: 5px; padding-right: 5px;">Samedi</th>
</tr><tr id="demo"><td>&nbsp;</td> 
<th colspan="3" width="120px" style="padding-left: 5px; padding-right: 5px;" name><?php  echo $jour1; ?></th>
<th colspan="3" width="120px" style="padding-left: 5px; padding-right: 5px;"><?php  echo $jour2; ?></th>
<th colspan="3" width="120px" style="padding-left: 5px; padding-right: 5px;"><?php  echo $jour3; ?></th>
<th colspan="3" width="120px" style="padding-left: 5px; padding-right: 5px;"><?php  echo $jour4; ?></th>
<th colspan="3" width="120px" style="padding-left: 5px; padding-right: 5px;"><?php  echo $jour5; ?></th>
<th colspan="3" width="120px" style="padding-left: 5px; padding-right: 5px;"><?php  echo $jour6; ?></th>
</tr><tr><td><strong><?php  echo "Module : ".$_SESSION["module"];?></strong></td>
<th>AM</th><th>PM</th><th>J</th><th>AM</th><th>PM</th><th>J</th><th>AM</th><th>PM</th><th>J</th><th>AM</th><th>PM</th><th>J</th><th>AM</th><th>PM</th><th>J</th><th>AM</th><th>PM</th><th>J</th>
</tr>
<?php for($i=0;$i<count($tab);$i++) {
    $am=@$_POST["am"];$pm=@$_POST["pm"];$j=@$_POST["j"];
    error_reporting(0);
    $table[$tab[$i]["nom"]." ".$tab[$i]["prenom"]]=array($am[$i],$pm[$i],$j[$i]); 
    ?>
<tr class="row_3"><td><b><?php echo $tab[$i]["nom"]." ".$tab[$i]["prenom"]; ?></b></td>
<td><input type="checkbox" name="am[<?php echo $i;?>][]" value="lundi"></td>
<td><input type="checkbox" name="pm[<?php echo $i;?>][]" value="lundi"></td>
<td><input type="checkbox"name="j[<?php echo $i;?>][lundi]" value="oui"> </td>
<td><input type="checkbox" name="am[<?php echo $i;?>][]" value="mardi"></td>
<td><input type="checkbox" name="pm[<?php echo $i;?>][]" value="mardi"></td>
<td><input type="checkbox" name="j[<?php echo $i;?>][mardi]" value="oui"></td>
<td><input type="checkbox" name="am[<?php echo $i;?>][]" value="mercredi"></td>
<td><input type="checkbox" name="pm[<?php echo $i;?>][]" value="mercredi"></td>
<td><input type="checkbox" name="j[<?php echo $i;?>][mercredi]" value="oui"></td>
<td><input type="checkbox" name="am[<?php echo $i;?>][]" value="jeudi"></td>
<td><input type="checkbox" name="pm[<?php echo $i;?>][]" value="jeudi"></td>
<td><input type="checkbox" name="j[<?php echo $i;?>][jeudi]" value="oui"></td>
<td><input type="checkbox" name="am[<?php echo $i;?>][]" value="vendredi"></td>
<td><input type="checkbox" name="pm[<?php echo $i;?>][]" value="vendredi"></td>
<td><input type="checkbox" name="j[<?php echo $i;?>][vendredi]" value="oui"></td>
<td><input type="checkbox" name="am[<?php echo $i;?>][]" value="samedi"></td>
<td><input type="checkbox" name="pm[<?php echo $i;?>][]" value="samedi"></td>
<td><input type="checkbox" name="j[<?php echo $i;?>][samedi]" value="oui"></td>

</tr>
<?php

}; ?>

</table>


<br>
 <!--Bouton Valider-->
 <button  type="submit" class="btn btn-primary btn-block" name="submit">Valider</button>
 <br>
 
 <a href="saisirAbsence.php">changer les donnée(retour à la page de filtrage)</a>
 
</form>
<?php 
include("connexion.php");
$req2=$pdo->prepare("insert into absence(nom,module,date,ampm,justifié) values(?,?,?,?,?)");
for($k=0;$k<count($tab);$k++)
{

    $name=$tab[$k]["nom"]." ".$tab[$k]["prenom"];
    if(array_key_exists($name,$table)){
        if($table[$name][0]!=null){
        for($l=0;$l<count($table[$name][0]);$l++){
            switch ($table[$name][0][$l]){
                case "lundi":{
                    if( is_array($table[$name][2]) && array_key_exists("lundi",$table[$name][2])) {
                        $req2->execute(array($name,$mod,$date[0],"am","oui"));
                    }
                    else $req2->execute(array($name,$mod,$date[0],"am","non"));
                    break;
                }
                case "mardi":{
                    if( is_array($table[$name][2]) && array_key_exists("mardi",$table[$name][2])) {
                        $req2->execute(array($name,$mod,$date[1],"am","oui"));
                    }
                    else $req2->execute(array($name,$mod,$date[1],"am","non")); 
                    break;                   
                }
                case "mercredi":{
                    if( is_array($table[$name][2]) && array_key_exists("mercredi",$table[$name][2])) {
                        $req2->execute(array($name,$mod,$date[2],"am","oui"));
                    }
                    else $req2->execute(array($name,$mod,$date[2],"am","non"));
                    break;
                }
                case "jeudi":{
                    if( is_array($table[$name][2]) && array_key_exists("jeudi",$table[$name][2])) {
                        $req2->execute(array($name,$mod,$date[3],"am","oui"));
                    }
                    else $req2->execute(array($name,$mod,$date[3],"am","non"));
                    break;
                }
                case "vendredi":{
                    if( is_array($table[$name][2]) && array_key_exists("vendredi",$table[$name][2])) {
                        $req2->execute(array($name,$mod,$date[4],"am","oui"));
                    }
                    else $req2->execute(array($name,$mod,$date[4],"am","non"));
                    break;
                }
                case "samedi":{
                    if( is_array($table[$name][2]) && array_key_exists("samedi",$table[$name][2])) {
                        $req2->execute(array($name,$mod,$date[5],"am","oui"));
                    }
                    else $req2->execute(array($name,$mod,$date[5],"am","non"));
                    break;
                }
            }
        }
       }
       if($table[$name][1]!=null){
        for($m=0;$m<count($table[$name][1]);$m++){
            switch ($table[$name][1][$m]){
                case "lundi":{
                    if( is_array($table[$name][2]) && array_key_exists("lundi",$table[$name][2])) {
                        $req2->execute(array($name,$mod,$date[0],"pm","oui"));
                    }
                    else $req2->execute(array($name,$mod,$date[0],"pm","non"));
                    break;
                }
                case "mardi":{
                    if( is_array($table[$name][2]) && array_key_exists("mardi",$table[$name][2])) {
                        $req2->execute(array($name,$mod,$date[1],"pm","oui"));
                    }
                    else $req2->execute(array($name,$mod,$date[1],"pm","non")); 
                    break;                   
                }
                case "mercredi":{
                    if( is_array($table[$name][2]) && array_key_exists("mercredi",$table[$name][2])) {
                        $req2->execute(array($name,$mod,$date[2],"pm","oui"));
                    }
                    else $req2->execute(array($name,$mod,$date[2],"pm","non"));
                    break;
                }
                case "jeudi":{
                    if( is_array($table[$name][2]) && array_key_exists("jeudi",$table[$name][2])) {
                        $req2->execute(array($name,$mod,$date[3],"pm","oui"));
                    }
                    else $req2->execute(array($name,$mod,$date[3],"pm","non"));
                    break;
                }
                case "vendredi":{
                    if( is_array($table[$name][2]) && array_key_exists("vendredi",$table[$name][2])) {
                        $req2->execute(array($name,$mod,$date[4],"pm","oui"));
                    }
                    else $req2->execute(array($name,$mod,$date[4],"pm","non"));
                    break;
                }
                case "samedi":{
                    if( is_array($table[$name][2]) && array_key_exists("samedi",$table[$name][2])) {
                        $req2->execute(array($name,$mod,$date[5],"pm","oui"));
                    }
                    else $req2->execute(array($name,$mod,$date[5],"pm","non"));
                    break;
                }
            }
        }
    }
    }
}

?>
<div id="msg">
<?php if(isset($_POST["submit"])) {?>
    <strong> Absences ajoutés avec success !</strong><br>
<?php } ?>
</div>
</div>

</main>

<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
</body>
</html>