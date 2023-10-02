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
    <title>usager</title>
</head>
<body class="h-100" id="bg">  
    <?php
     $user = $mdp = "";
     $userErreur = $mdpErreur  = "";

     $erreur = false;
    
            if ($_SERVER['REQUEST_METHOD'] == "POST" ){
    
            //On vient de recevoir le formulaire
                $user = $_POST["user"];
                $mdp = $_POST["mdp"];

           
                
            
            if(empty($_POST["user"])){
                $userErreur = "Le nom ne peut pas être vide";
                $erreur  = true;
            }
           
            else{
                $user = trojan($_POST['user']);
            }
            
            if(empty($_POST["user"])){
                $mdpErreur = "Le mot de passe ne peut pas être vide";
                $erreur  = true;
            }
           
            else{
                $mdp = trojan($_POST['mdp']);
                $mdp = md5($mdp,false);
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
            ?>
                 <div class="container-fluid h-100">
           <div class="col-2">
                         <img src="img/ctr.jpg" id="logo"/>
                  </div>
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">

            <form class="form-example" action="" method="post">
                <h1>Entrer votre login</h1>
                
             
                <div class="form-group">
                    <label for="user">Email:</label>
                    <input type="text" class="form-control username" id="username" placeholder="Entrer votre Email..." name="user">
                    <p style="color:red;"><?php echo $userErreur; ?></p>
                </div>
                <div class="form-group">
                    <label for="mdp">Mot de passe:</label>
                    <input type="password" class="form-control password" id="password" placeholder="Mot de passe..." name="mdp" value="<?php echo $mdp;?>">
                    <p style="color:red;"><?php echo $mdpErreur; ?></p>
                </div>
                <button type="submit" class="btn btn-primary btn-customized">Soumettre</button>
            
               
            </form>
           
             </div>
                </div>
            </div>
            <?php
        }
       
        ?>


        <?php
            }
            if ($_SERVER['REQUEST_METHOD'] == "GET" ){
                
                ?>
           <div class="container-fluid h-100">
           <div class="col-2">
                         <img src="img/ctr.jpg" id="logo"/>
                  </div>
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">

            <form class="form-example" action="" method="post">
                <h1>Entrer votre login</h1>
                
             
                <div class="form-group">
                    <label for="user">Email:</label>
                    <input type="text" class="form-control username" id="username" placeholder="Entrer votre Email..." name="user">
                    <p style="color:red;"><?php echo $userErreur; ?></p>
                </div>
                <div class="form-group">
                    <label for="mdp">Mot de passe:</label>
                    <input type="password" class="form-control password" id="password" placeholder="Mot de passe..." name="mdp" value="<?php echo $mdp;?>">
                    <p style="color:red;"><?php echo $mdpErreur; ?></p>
                </div>
                <button type="submit" class="btn btn-primary btn-customized">Soumettre</button>
            
               
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