<?php 
 session_start();
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Ajouter un usager</title>
</head>
<body class="h-100" id="bg">

    <?php
      $_SESSION["connexion"] = true;
     if(isset($_SESSION["connexion"]))
     {
        if(isset($_GET['id']))
        $id =$_GET['id'];
        $erreur = false;
      
        $nom = $mdp = $cmdp = $addr = "";
        $nomErreur = $mdpErreur = $cmdpErreur =$addrErreur = $same= "";
     
       
        $erreur = false;
      
    
           
            if($_SERVER['REQUEST_METHOD']== 'POST')
            {

                
               
                if(empty($_POST["nom"])){
                    $nomErreur = "Le nom ne peut pas être vide";
                    $erreur  = true;
                }
                else{
                    $nom = trojan($_POST['nom']);
                }
                
                
                
                if(empty($_POST["mdp"])){
                    $mdpErreur = "Le mot de passe ne peut pas etre vide";
                    $erreur  = true;
                }
                else{
                   
                
                    $mdp = trojan($_POST['mdp']);
                    $mdp = md5($mdp,false);
                }
                
                  
               
                
                   if(empty($_POST["cmdp"])){
                    $cmdpErreur = "vous devez remplir la confirmation ";
                    $erreur  = true;
                }
                else{
                    
                
                     $cmdp = trojan($_POST['cmdp']);
                     $cmdp = md5($mdp,false);
                }
                
                   if(empty($_POST["addr"])){
                    $addrErreur = "L'adresse courriel ne peut pas être vide";
                    $erreur  = true;
                }
                else{
                   $addr = trojan($_POST['addr']);
                }
                
               
    
                if(($_POST["mdp"]) != ($_POST["cmdp"])){
                    $same = "les mots de passe ne sont pas identiques";
                    $erreur  = true;
                }
                else{
                 
                    $mdp = trojan($_POST['mdp']);
                    $cmdp = trojan($_POST['cmdp']);
                    $mdp = md5($mdp,false);
                    $cmdp = md5($mdp,false);
                }
              
                
                if(filter_var(($_POST["addr"]), FILTER_VALIDATE_EMAIL)){
                    
                    $addr = trojan($_POST['addr']);
                    
                  }else{
                    $addrErreur = "l'addresse courriel n'est pas valide";
                    $erreur  = true;
                    
                  }
                if($erreur == false)
                {
                    $servername = "localhost";
                    $username = "root";
                    $password = "root";
                    $dbname = "evenement";
                    // Create connection
                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                    // Check connection
                    if (!$conn) {
                      die("Connection failed: " . mysqli_connect_error());
                    }
                    $sql = "INSERT INTO usager (id,usager , email, password, ip)
                    VALUES (NULL, '$nom','$addr', '$mdp',  '172.16.1.2')";
                    if (mysqli_query($conn, $sql)) {
                      echo "Enregistrement réussi";
                    } else {
                      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    mysqli_close($conn);
                    
                }
        
        }
            
                 
        ?>
            <div class="container-fluid" id="bg" >
            <div  class="row text-center" >
            <div  class="col-12">
                <h1>Veuillez remplir le formulaire</h1>
                <div class="col-12 ">
            <a href="gestionUsager.php" class="btn btn-primary text-center" id="retour">retour à la page de gestion d'usager</a>
            </div>
            <form action="ajoutUsager.php" method="post">
            <label> Nom d'usager : </label> <input type="text" name="nom" class="form-control " maxLength="15" value="<?php echo $nom;?>"><br>
                <p style="color:red;"><?php echo $nomErreur; ?></p>

               <label> Mot de passe :</label> <input type="password" name="mdp" class="form-control " value="<?php echo $mdp;?>"> <br>
               <p style="color:red;"><?php echo $mdpErreur; ?></p>


               <label>  Confirmation du mot de passe :</label> <input type="password" class="form-control " name="cmdp" value="<?php echo $cmdp;?>">  <br>
               <p style="color:red;"><?php echo $cmdpErreur; ?></p>
               <p style="color:red;"><?php echo $same; ?></p>
               <label> Adresse courriel :</label> <input type="email" name="addr" class="form-control " value="<?php echo $addr;?>"> <br>
               <p style="color:red;"><?php echo $addrErreur; ?></p>

              

               <button type="submit" class="btn btn-primary ">Soumettre</button>
            </form>
            </div>
            </div>
        </div>
          
           
        
        <?php
        }else{
            header("Location:choixEtu.php");
          }
        function trojan($data){
            $data = trim($data); //Enleve les caractères invisibles
            $data = addslashes($data); //Mets des backslashs devant les ' et les  "
            $data = htmlspecialchars($data); // Remplace les caractères spéciaux par leurs symboles comme ­< devient &lt
            
            return $data;
        }

    ?>

    
    
  


</div>
</body>
</html>