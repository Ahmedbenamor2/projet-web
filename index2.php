<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login1.php");
      exit();
   }
   if(date("H")<18)
      $bienvenue="Bonjour Mr/M "." ". 
      $_SESSION["Nom"]." !";
   else
      $bienvenue="Bonjour Mr/M "." ". 
      $_SESSION["Nom"]." !";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Walid SAAD">
    <meta name="generator" content="Hugo 0.88.1">
    <title>SCO-ENICAR</title>
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Custom styles for this template -->
    
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      a{

        text-decoration: none;
        color: green;
      }
      a:hover{
        text-decoration: none;
        color: white;
      }
      .test1{
        background-color: white;
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

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      
    <div class="jumbotron">
    <div class="container">
      <h1 class="display-3"> <?php echo $bienvenue;?> </h1>
      
      <p><a role="button" class="btn btn-primary btn-lg" id="mesgroupes">Mes Groupes &raquo;</a></p>
      <div id="grouperesultat"> </div >
    </div>
  </div>
 
  <div class="container">
    <!-- Example row of columns -->
  <script>
document.getElementById('mesgroupes').addEventListener('click',affichergroupes);
    function affichergroupes(){

   
var xhr=new XMLHttpRequest();
xhr.open('GET','indexajax.php',true);

xhr.onload=function(){
  if (this.status==200){
    console.log(this.responseText);
    var user= JSON.parse(this.response);
    var html='<div class="test1">'+'<th>'+'nomdegroupe'+'</th>'+'</div>';
    for (var a in user){
      
        html+='<div class="test1">'+'<table>'+'<td>'+user[a].Classe+'</td>'+'</table'+'</div>';
       
    }
    document.getElementById('grouperesultat').innerHTML=html;
  }
  
}

xhr.send();

      
    }
  </script>
    </main>
      </div>
      
      


    <hr>

  </div> <!-- /container -->




<footer class="container">
  <p>&copy; ENICAR 2021-2022</p>
</footer>


   
      
  </body>
</html>
