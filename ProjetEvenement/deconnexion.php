<?php 
session_start(); 
?>
 <!DOCTYPE html> 
 <html> 
    <body>  
        <?php // Supprimes toutes les variables
         session_unset(); 
          // Détruire la session
           session_destroy(); 
           header("Location:choixEtu.php");
           ?>  
    </body> 
</html>
