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

    <title>creation personnages</title>
</head>
<body>
<?php
// Set session variables
echo $_SESSION['connexion'];
if(isset($_SESSION["connexion"]))
{


$servername = "localhost";
$username = "root";
$password = "root";
$db = "league";
// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>



<?php
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
$conn->query('SET NAMES utf8');$sql = "SELECT id, nom, image, region, role FROM personnages";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  ?>

  <table class="table">
  <thead>
    <tr>
      <th scope="col-2">#</th>
      <th scope="col-2">Nom</th>
      <th scope="col-2">icone</th>
      <th scope="col-2">Region</th>
      <th scope="col-2">Role</th>
      <th scope="col-2">Modifier</th>
      <th scope="col-2">Supprimer</th>
    </tr>
  </thead>
  <?php
  while($row = $result->fetch_assoc()) {
    ?>

 

  <tbody>
    <tr>
      <th scope="row"> <?php echo $row["id"] ?></th>
      <td><?php echo $row["nom"] ?></td>
      <td><img src="<?php echo $row["image"] ?>" id="imagecss"/></td>
      <td><?php echo $row["region"] ?></td>
      <td><?php echo $row["role"] ?></td>
      <td><a href=<?php echo "modifier.php?id=".$row["id"] ?>><img src="img/hammer.png" id="imagecss" /> </a></td>
      <td><a href=<?php echo "supprimer.php?id=".$row["id"] ?>><img src="img/Delete.png" id="imagecss" /> </a></td>
    </tr>
  </tbody>

    
    
    
   
  
  <?php
  
}
} else {
  echo "0 results";
}
}else
{
  header("Location:usager.php?test=bizarre");
}
$conn->close();
?>
</table>
<div class="row text-center">
    <div class="col-12">
  <a href="ajouter.php" class="btn btn-danger text-center" >ajouter un nouveau personnage</a>
  </div>
</div>
</body>
</html>




