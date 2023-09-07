<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Formulaire</title>
</head>
<body>
    
    <?php
        $nom = $image = $region = $role= "";
        $nomErreur = $imageErreur = $regionErreur =$roleErreur = "";

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
            
            
        
               if(empty($_POST["image"])){
                $imageErreur = "Le lien ne peut pas etre vide";
                $erreur  = true;
            }
            else{
                 $image = ($_POST['image']);
            }
            if(empty($_POST["region"])){
                $regionErreur = "vous devez avoir une region";
                $erreur  = true;
            }
            else{
                 $region = trojan($_POST['region']);
            }
            
               if(empty($_POST["role"])){
                $roleErreur = "vous devez remplir la confirmation ";
                $erreur  = true;
            }
            else{
                 $role = trojan($_POST['role']);
            }

            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "league";
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "INSERT INTO personnages (id,nom , image ,region, role)
            VALUES (NULL, '$nom','$image' ,'$region', '$role')";
            if (mysqli_query($conn, $sql)) {
              echo "Enregistrement réussi";
            } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            
        }
            
        ?>
        <div class="container-fluid" id="bg" >
            <div  class="row text-center" >
            <div  class="col-12">
                <h1>Veuillez remplir le formulaire</h1>
            <form action="ajouter.php" method="post">
            <label> Nom du personnage : </label> <input type="text" name="nom" maxLength="50" value="<?php echo $nom;?>"><br>
                <p style="color:red;"><?php echo $nomErreur; ?></p>

                <label>Lien vers une image du personnage :</label> <input type="text" name="image" value="<?php echo $image;?>"><br>
                <p style="color:red;"><?php echo $imageErreur; ?></p>

               <label> Region :</label> <input type="text" name="region" value="<?php echo $region;?>"> <br>
               <p style="color:red;"><?php echo $regionErreur; ?></p>


               <label>Role: </label> <input type="text" name="role" value="<?php echo $role;?>">  <br>
               <p style="color:red;"><?php echo $roleErreur; ?></p>
               
               
               

         
                <input type="submit">
            </form>
            </div>
            </div>
        </div>
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