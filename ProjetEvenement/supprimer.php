<?php
$_SESSION["connexion"] = true;
if(isset($_SESSION["connexion"]))
{

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "evenement";
 $id =$_GET['idEntreprise'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// sql to delete a record
$sql = "DELETE FROM entreprise WHERE idEntreprise=$id";
if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}$conn->close();

header("Location:index.php");
}else{
  header("Location:usager.php");
}
?>
