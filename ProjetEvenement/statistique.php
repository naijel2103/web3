<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>statistiques</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>

        <div>
            <canvas id="myChart"></canvas>
        </div>
        <?php
if(isset($_SESSION["connexion"]))
{


$id =$_GET['idEntreprise'];
        if(isset($_GET['idEntreprise']))


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
$conn->query('SET NAMES utf8');$sql = "SELECT idEntreprise,nom, contentEtu,neutreEtu,mecontentEtu,contentEmp,neutreEmp,mecontentEmp  FROM entreprise WHERE idEntreprise = $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  
  while($row = $result->fetch_assoc()) {
$nom = $row['nom'];
$contentEtu = $row['contentEtu'];
$neutreEtu = $row['neutreEtu'];
$mecontentEtu = $row['mecontentEtu'];
$contentEmp = $row['contentEmp'];
$neutreEmp = $row['neutreEmp'];
$mecontentEmp = $row['mecontentEmp'];
 

  
    
    
   
  
  
  




?>

<div class="container-fluid  h-100"  >
            <div  class="row h-100   text-center" >
                    <div class="col-12 col-md-12 col-sm-12 text-center">

                    <?php
                        echo "<h1>vote pour l'entreprise: $nom</h1>";
                    ?>
                    <script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Étudiant aimé', 'Étudiant neutre', 'Étudiant pas aimé', 'Employé Aimé', 'Employé neutre', 'Employé pas aimé'],
      datasets: [{
        label: 'niveau de satisfaction',
        backgroundColor:[
            'rgba(255,99,132,1)',
            'rgba(54,162,235,1)',
            'rgba(255,206,86,1)',
            'rgba(75,192,192,1)',
            'rgba(153,102,255,1)',
            'rgba(255,159,64,1)'
        ],
        borderColor:[
            'rgba(255,99,132,1)',
            'rgba(54,162,235,1)',
            'rgba(255,206,86,1)',
            'rgba(75,192,192,1)',
            'rgba(153,102,255,1)',
            'rgba(255,159,64,1)'
        ],
        data: [<?php echo json_encode($contentEtu) ?>,<?php echo json_encode($neutreEtu) ?>,<?php echo json_encode($mecontentEtu) ?>,<?php echo json_encode($contentEmp) ?>,<?php echo json_encode($neutreEmp) ?>,<?php echo json_encode($mecontentEmp) ?>],
        borderWidth: 1
    
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>



                </div>
                </div>
            </div>

 
<a href="index.php" class="btn btn-primary text-center" id="retour">retour à la page de gestion des entreprises</a>
  
<?php
  

}
} else {
  echo "0 results";
}
}else
{
  header("Location:choixEtu.php");
}

$conn->close();
?>
</body>
</html>