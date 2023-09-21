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
    <title>Ajouter une entreprise</title>
</head>
<body>

    <?php
     if(isset($_SESSION["connexion"]))
     {
 
        $nom = $desc = $lieu = $date= $departement= "";
        $nomErreur = $descErreur = $lieuErreur =$dateErreur=$departementErreur = "";
     
       
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
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "INSERT INTO entreprise (idEntreprise,nom , description,content,neutre,mecontent ,lieu, date, departement)
            VALUES (NULL, '$nom','$desc', 0, 0, 0 ,'$lieu', '$date','$departement')";
            if (mysqli_query($conn, $sql)) {
              echo "Enregistrement réussi";
            } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            
        }
            
                 
        ?>
       
            <div class="container-fluid" id="bg" >
            <div  class="row h-100   text-center" >
                    <div class="col-2">
            <img src="img/logo.jpg" id="logo"/>
            </div>
            <div class="col-10">
                    <h1>Veuillez remplir le formulaire pour ajouter une entreprise</h1>
                <form action="ajouter.php" method="post">
                <label> Nom de l'entreprise : </label> <input type="text" name="nom" maxLength="50" value="<?php echo $nom ?>"><br>
                    <p style="color:red;"><?php echo $nomErreur; ?></p>
    
                    <label>Description de l'entreprise :</label> <input type="text" name="description" value="<?php echo $desc ?>"><br>
                    <p style="color:red;"><?php echo $descErreur; ?></p>
    
                   <label> Lieu :</label> <input type="text" name="lieu" value="<?php echo $lieu ?>"> <br>
                   <p style="color:red;"><?php echo $lieuErreur; ?></p>
    
    
                   <label>Date: </label> <input type="date" name="date" value="<?php echo $date ?>">  <br>
                   <p style="color:red;"><?php echo $dateErreur; ?></p>
                   <label>Departement: </label> <input type="text" name="departement" value="<?php echo $departement ?>">  <br>
                   <p style="color:red;"><?php echo $departementErreur; ?></p>
                   
                  
                   
    
             
                    <input type="submit" />
                </form>
                </div>
                </div>
                </div>
                </div>
            </div>
        
        <?php
        }else{
            header("Location:usager.php");
          }
        

        function trojan($data){
            $data = trim($data); //Enleve les caractères invisibles
            $data = addslashes($data); //Mets des backslashs devant les ' et les  "
            $data = htmlspecialchars($data); // Remplace les caractères spéciaux par leurs symboles comme ­< devient &lt
            
            return $data;
        }

    ?>

    
    
  

<div class="row text-center">
    <div class="col-12">
  <a href="index.php" class="btn btn-primary text-center" id="retour">retour à la page principale</a>
  </div>
</div>
</body>
</html>