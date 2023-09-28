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

    <title>Liste des usagers</title>
</head>
<body>
<?php

if(isset($_SESSION["connexion"]))
{



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
$conn->query('SET NAMES utf8');$sql = "SELECT id, usager,email,password FROM usager";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  ?>
  <div class="container-fluid ">
    <div class="row text-center">
      <div class="col-2 ">
          <img src="img/logo.jpg" id="logo"/>
       </div>
       </div>
    <div class="row text-center">
        <div class="col-12">
            <div class="col-12 lien">
                <a href="ajoutUsager.php" class="btn btn-primary text-center " >ajouter un nouvel usager</a>
                <a href="index.php" class="btn btn-primary text-center " >Retour à la gestion d'entreprises</a>
            </div>
            <div class="col-6 lien">
                
            </div>
       </div>
    </div>
  <table class="table text-center">
  <thead>
    <tr>
    <th scope="col-1">Id</th>
      <th scope="col-1">Nom</th>
      <th scope="col-1">Email</th>
      <th scope="col-1">Modifier</th>
      <th scope="col-1">Supprimer</th>
    </tr>
  </thead>
  <?php
  while($row = $result->fetch_assoc()) {
    ?>

 

  <tbody>

    <tr>
      <th scope="row"><?php echo $row["id"] ?></th>
      <td><?php echo $row["usager"] ?></td>
      <td><?php echo $row["email"] ?></td>
      <td><a href=<?php echo "modifierUsager.php?id=".$row["id"] ?> ><img src="img/modif.png" id="imagecss" /> </a></td>
      <td><a href=<?php echo "supprimerUsager.php?id=".$row["id"] ?> ><img src="img/supp.png" id="imagecss" /> </a></td>
    </tr>
  </tbody>

    
    
    
   
  
  <?php
  
}
} else {
  echo "0 results";
}
}else
{
  header("Location:usager.php");
}

$conn->close();
?>
</table>
</div>
</body>
</html>




