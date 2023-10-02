<?php
session_start();
?>



<?php
$_SESSION["connexion"] = true;
if(isset($_SESSION["connexion"]))
{

    $id =$_GET['idEntreprise'];

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
$sql = "UPDATE entreprise SET neutreEmp = neutreEmp + 1  WHERE idEntreprise=$id";
if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}$conn->close();

header("Location:voteEmp.php?idEntreprise=".$id );
}else{
  header("Location:choixEtu.php");
}
?>
<input name="idEntreprise" type="hidden" id="idEntreprise" value="<?php echo $row["idEntreprise"]?>"/>