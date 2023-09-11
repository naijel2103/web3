<?php// On démarre toujours la session en haut et dans tous les fichiers.
session_start();
?>

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
<?php// Set session variables
$_SESSION["connexion"] = true;
echo "La connexion est réussie" . $_SESSION["connexion"];
?>
    <?php
        $nom = $image = $region = $role= "";
        $nomErreur = $imageErreur = $regionErreur =$roleErreur = "";
        if(isset($_GET['id']))
        $id =$_GET['id'];
        $erreur = false;
      
        if($_SERVER['REQUEST_METHOD']== 'POST')
        {


      
            $id =$_POST['id'];
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
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            $sql = "UPDATE personnages SET  nom='".$_POST['nom']."', image='".$_POST['image']."', region='".$_POST['region']."', role='".$_POST['role']."' WHERE id=$id";
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
        $dbname = "league";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $conn->query('SET NAMES utf8');$sql = "SELECT id, nom,image,region,role FROM personnages WHERE id=$id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            ?>
            <div class="container-fluid" id="bg" >
                <div  class="row text-center" >
                <div  class="col-12">
                    <h1>Veuillez remplir le formulaire pour modifier</h1>
                <form action="modifier.php" method="post">
                <label> Nom du personnage : </label> <input type="text" name="nom" maxLength="50" value="<?php echo $row["nom"] ?>"><br>
                    <p style="color:red;"><?php echo $nomErreur; ?></p>
    
                    <label>Lien vers une image du personnage :</label> <input type="text" name="image" value="<?php echo $row["image"] ?>"><br>
                    <p style="color:red;"><?php echo $imageErreur; ?></p>
    
                   <label> Region :</label> <input type="text" name="region" value="<?php echo $row["region"] ?>"> <br>
                   <p style="color:red;"><?php echo $regionErreur; ?></p>
    
    
                   <label>Role: </label> <input type="text" name="role" value="<?php echo $row["role"] ?>">  <br>
                   <p style="color:red;"><?php echo $roleErreur; ?></p>
                   
                   <input name="id" type="hidden" id="id" value="<?php echo $row["id"]?>"/>
                   
    
             
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