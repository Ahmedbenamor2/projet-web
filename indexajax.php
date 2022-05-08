
    <?php 
    include "connexion2.php";
    


        $req="SELECT  distinct Classe  from `etudiant`";
        $res=mysqli_query($conn,$req);
       $row=mysqli_fetch_all($res,MYSQLI_ASSOC);
   
       echo json_encode($row);


   
   
      
       

   
    
    
    
        
        
    ?>

    
