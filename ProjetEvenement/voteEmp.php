<?php// On démarre toujours la session en haut et dans tous les fichiers.
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
    <title>Vote Employée</title>
</head>
<body>

    <?php
    $_SESSION["connexion"] = true;
     if(isset($_SESSION["connexion"]))
     {
        $id =$_GET['idEntreprise'];
        if(isset($_GET['idEntreprise']))
        

      
        $erreur = false;
      
        if($_SERVER['REQUEST_METHOD']== 'POST')
        {

          
            
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
                <img src="img/neutral.png" id="emoji"/>
                <img src="img/sad.png" id="emoji"/>   
            
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

    
    
  


</div>
</body>
</html>