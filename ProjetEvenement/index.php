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

    <title>Liste des entreprises</title>
</head>
<body>



<?php
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
$conn->query('SET NAMES utf8');$sql = "SELECT idEntreprise, nom, description, departement, lieu,date FROM entreprise";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  ?>

  <table class="table text-center">
  <thead>
    <tr>
    <th scope="col-1">Id</th>
      <th scope="col-1">Nom</th>
      <th scope="col-1">Description</th>
      <th scope="col-1">Departement</th>
      <th scope="col-1">Lieu</th>
      <th scope="col-1">Date</th>
      <th scope="col-1">Vote pour les étudiants</th>
      <th scope="col-1">Vote pour les employeurs</th>
      <th scope="col-1">Modifier</th>
      <th scope="col-1">Supprimer</th>
    </tr>
  </thead>
  <?php
  while($row = $result->fetch_assoc()) {
    ?>

 

  <tbody>
    <tr>
      <th scope="row"><?php echo $row["idEntreprise"] ?></th>
      <td><?php echo $row["nom"] ?></td>
      <td><?php echo $row["description"] ?></td>
      <td><?php echo $row["departement"] ?></td>
      <td><?php echo $row["lieu"] ?></td>
      <td><?php echo $row["date"] ?></td>
      <td><a href=<?php echo "voteEtu.php?id=".$row["idEntreprise"] ?>><img src="img/voteEtu.png" id="imagecss" /> </a></td>
      <td><a href="" ><img src="img/voteEmp.png" id="imagecss" /></a></td>
      <td><a href="" ><img src="img/modif.png" id="imagecss" /> </a></td>
      <td><a href=<?php echo "supprimer.php?idEntreprise=".$row["idEntreprise"] ?> ><img src="img/supp.png" id="imagecss" /> </a></td>
    </tr>
  </tbody>

    
    
    
   
  
  <?php
  
}
} else {
  echo "0 results";
}

$conn->close();
?>
</table>
<div class="row text-center">
    <div class="col-12">
    <a href="" class="btn btn-primary text-center" >ajouter une nouvelle entreprise</a>
  </div>
</div>
</body>
</html>




