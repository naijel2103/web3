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
    <title>Mofification</title>
</head>
<body>

    <?php

        $_SESSION["connexion"] = true;
        echo "La connexion est réussie" . $_SESSION["connexion"];
        if(isset($_SESSION["connexion"]))
        {
        $nom = $desc = $lieu = $date= $departement= "";
        $nomErreur = $descErreur = $lieuErreur =$dateErreur=$departementErreur = "";
        if(isset($_GET['idEntreprise']))
        $id =$_GET['idEntreprise'];
        $erreur = false;
      
        if($_SERVER['REQUEST_METHOD']== 'POST')
        {


      
            $id =$_POST['idEntreprise'];
            if(empty($_POST["nom"])){
                $nomErreur = "Le nom ne peut pas être vide";
                $erreur  = true;
            }

            else{
                $nom = trojan($_POST['nom']);
            }
            
            
        
               if(empty($_POST["description"])){
                $descErreur = "La description ne peut pas être vide";
                $erreur  = true;
            }
            else{
                 $desc = ($_POST['description']);
            }
            if(empty($_POST["lieu"])){
                $lieuErreur = "vous devez avoir un lieu";
                $erreur  = true;
            }
            else{
                 $lieu = trojan($_POST['lieu']);
            }
            
               if(empty($_POST["date"])){
                $dateErreur = "vous devez remplir la date ";
                $erreur  = true;
            }
            else{
                 $date = trojan($_POST['date']);
            }

            if(empty($_POST["departement"])){
                $DepartementErreur = "vous devez remplir la date ";
                $erreur  = true;
            }
            else{
                 $departement = trojan($_POST['departement']);
            }

            
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "evenement";
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            $sql = "UPDATE entreprise SET nom='".$_POST['nom']."', description='".$_POST['description']."', lieu='".$_POST['lieu']."', date='".$_POST['date']."', departement='".$_POST['departement']."'  WHERE idEntreprise=$id";
            if ($conn->query($sql) === TRUE) {
              echo "Record updated successfully";
            } else {
              echo "Error updating record: " . $conn->error;
            }
            $conn->close();
            
        }
            
        
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "evenement";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $conn->query('SET NAMES utf8');$sql = "SELECT * FROM entreprise WHERE idEntreprise=$id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            ?>
            <div class="container-fluid" id="bg" >
            <img src="img/happy.png" id="emoji"/>
                    <h1>Veuillez remplir le formulaire pour modifier</h1>
                <form action="modifier.php" method="post">
                <label> Nom de l'entreprise : </label> <input type="text" name="nom" maxLength="50" value="<?php echo $row["nom"] ?>"><br>
                    <p style="color:red;"><?php echo $nomErreur; ?></p>
    
                    <label>Description de l'entreprise :</label> <input type="text" name="description" value="<?php echo $row["description"] ?>"><br>
                    <p style="color:red;"><?php echo $descErreur; ?></p>
    
                   <label> Lieu :</label> <input type="text" name="lieu" value="<?php echo $row["lieu"] ?>"> <br>
                   <p style="color:red;"><?php echo $lieuErreur; ?></p>
    
    
                   <label>Date: </label> <input type="date" name="date" value="<?php echo $row["date"] ?>">  <br>
                   <p style="color:red;"><?php echo $dateErreur; ?></p>
                   <label>Departement: </label> <input type="text" name="departement" value="<?php echo $row["departement"] ?>">  <br>
                   <p style="color:red;"><?php echo $departementErreur; ?></p>
                   
                   <input name="idEntreprise" type="hidden" id="id" value="<?php echo $row["idEntreprise"]?>"/>
                   
    
             
                    <input type="submit" />
                </form>
                </div>
                </div>
            </div>
            <?php
          }
        } else {
          echo "0 results";
        }
    }else{
        header("Location:usager.php");
      }
    
        $conn->close();
        
            
        ?>
      
        <?php
        
        

        function trojan($data){
            $data = trim($data); //Enleve les caractères invisibles
            $data = addslashes($data); //Mets des backslashs devant les ' et les  "
            $data = htmlspecialchars($data); // Remplace les caractères spéciaux par leurs symboles comme ­< devient &lt
            
            return $data;
        }

    ?>

    
    
  

<div class="row text-center">
    <div class="col-12">
  <a href="index.php" class="btn btn-info text-center" id="retour">retour à la page principale</a>
  </div>
</div>
</body>
</html>