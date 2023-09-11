<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>usager</title>
</head>
<body>  
    <?php
     $user = $mdp = "";
     $userErreur = $mdpErreur  = "";

     $erreur = false;
    
            if ($_SERVER['REQUEST_METHOD'] == "POST" ){
        echo "post";
            //On vient de recevoir le formulaire
                $user = $_POST["user"];
                $mdp = $_POST["mdp"];

                $mdp = md5($mdp,false);
                echo $mdp;
            
            if(empty($_POST["user"])){
                $userErreur = "Le nom ne peut pas être vide";
                $erreur  = true;
            }
           
            else{
                $user = trojan($_POST['user']);
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
            $conn->query('SET NAMES utf8');
            $sql = "SELECT * FROM usager where email='$user' and password = '$mdp'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {


                $row = $result -> fetch_assoc();
                $_SESSION["connexion"] = true;
                echo "connecter";
                header("Location: index.php");
                echo "header location";
                
        }else
        {
            echo"<h2>nom d'usager ou mot de passe invalide </h2>";
        }
       
        ?>


        <?php
            }
            if ($_SERVER['REQUEST_METHOD'] == "GET" ){
                echo "get";
                ?>
                <div class="container-fluid" id="bg" >
                    <div  class="row text-center" >
                    <div  class="col-12">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <label> Email : </label> <input type="text" name="user"  value="<?php echo $user;?>"><br>
                        <p style="color:red;"><?php echo $userErreur; ?></p>
        
                       <label> Mot de passe :</label> <input type="password" name="mdp" value="<?php echo $mdp;?>"> <br>
                       <p style="color:red;"><?php echo $mdpErreur; ?></p>
                       <input type="submit">
                       </form>
                       </div>
                    </div>
                </div>
                <?php
            }
            function trojan($data){
                $data = trim($data); //Enleve les caractères invisibles
                $data = addslashes($data); //Mets des backslashs devant les ' et les  "
                $data = htmlspecialchars($data); // Remplace les caractères spéciaux par leurs symboles comme ­< devient &lt
                
                return $data;
            }
        ?>
</body>
</html>