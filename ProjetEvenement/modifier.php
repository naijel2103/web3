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
    <title>Mofification</title>
</head>
<body class="h-100" id="bg">

    <?php

        $_SESSION["connexion"] = true;

        if(isset($_SESSION["connexion"]))
        {
        $nom = $desc = $lieu = $date= $departement= "";
        $nomErreur = $descErreur = $lieuErreur =$dateErreur=$departementErreur = "";
        if(isset($_GET['idEntreprise']))
        $id =$_GET['idEntreprise'];
        $erreur = false;
      
        if($_SERVER['REQUEST_METHOD']== 'POST')
        {


      
            $id =$_POST['idEntreprise'];
            if(empty($_POST["nom"])){
                $nomErreur = "Le nom ne peut pas être vide";
                $erreur  = true;
            }

            else{
                $nom = trojan($_POST['nom']);
            }
            
            
        
               if(empty($_POST["description"])){
                $descErreur = "La description ne peut pas être vide";
                $erreur  = true;
            }
            else{
                 $desc = ($_POST['description']);
            }
            if(empty($_POST["lieu"])){
                $lieuErreur = "vous devez avoir un lieu";
                $erreur  = true;
            }
            else{
                 $lieu = trojan($_POST['lieu']);
            }
            
               if(empty($_POST["date"])){
                $dateErreur = "vous devez remplir la date ";
                $erreur  = true;
            }
            else{
                 $date = trojan($_POST['date']);
            }

            if(empty($_POST["departement"])){
                $DepartementErreur = "vous devez remplir la date ";
                $erreur  = true;
            }
            else{
                 $departement = trojan($_POST['departement']);
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
            $sql = "UPDATE entreprise SET nom='".$_POST['nom']."', description='".$_POST['description']."', lieu='".$_POST['lieu']."', date='".$_POST['date']."', departement='".$_POST['departement']."'  WHERE idEntreprise=$id";
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
           
           <div class="container-fluid h-100" id="bg" >
            <div  class="row h-100   text-center" >
                    <div class="col-2">
            <img src="img/logo.jpg" id="logo"/>
            </div>
            <div class="row text-center h-100">
            <div class="col-12 ">
            <a href="index.php" class="btn btn-primary text-center" id="retour">retour à la page principale</a>
            </div>
            <div class="col-12 justify-content-center align-items-center">
                    <h1>Veuillez remplir le formulaire pour modifier une entreprise</h1>
                <form action="modifier.php" method="post">

                <div class="form-group ">
                  <div>
                  <label> Nom de l'entreprise : </label>
                  </div>
                 <input type="text" placeholder="Nom..." class="form-control " name="nom" maxLength="50" value="<?php echo $nom ?>"><br>
                    <p style="color:red;"><?php echo $nomErreur; ?></p>
                 </div>


                    <div>
                    <label>Description de l'entreprise :</label> 
                    </div>
                    <input type="text" placeholder="Description..." class="form-control " name="description" value="<?php echo $desc ?>"><br>
                    <p style="color:red;"><?php echo $descErreur; ?></p>
    

                    <div>
                   <label> Lieu de l'entreprise:</label> 
                   </div>
                   <input type="text" placeholder="Lieu..." class="form-control " name="lieu" value="<?php echo $lieu ?>"> <br>
                   <p style="color:red;"><?php echo $lieuErreur; ?></p>
    
    

                   <div>
                   <label>Date: </label>
                   </div>
                    <input type="date" name="date" class="form-control " value="<?php echo $date ?>">  <br>
                   <p style="color:red;"><?php echo $dateErreur; ?></p>
                   
                   
                   <div>
                   <label>Departement: </label> 
                   </div>
                   <select name="departement" id="departement" class="form-control ">
                   <option value="Biologie">Biologie</option>
                    <option value="Mathematiques">Mathematiques</option>
                    <option value="education physique">education physique</option>
                    <option value="Physique">Physique</option>
                    <option value="Geo, Histoire et Sciences politiques">Geo, Histoire et Sciences politiques</option>
                    <option value="Philosophie">Philosophie</option>
                    <option value=" Psychologie"> Psychologie</option>
                    <option value="Sciences sociales">Sciences sociales</option>
                    <option value="Arts visuels">Arts visuels</option>
                    <option value="Musique">Musique</option>
                    <option value="Litterature et communication">Litterature et communication</option>
                    <option value="Langues">Langues</option>
                    <option value="Techniques d'hygiene dentaire">Techniques d'hygiene dentaire</option>
                    <option value="Techniques de dietetique">Techniques de dietetique</option>
                    <option value=" Techniques de soins infirmiers"> Techniques de soins infirmiers</option>
                    <option value="Technologie de l'architecture">Technologie de l'architecture</option>
                    <option value="Technologie du genie civil">Technologie du genie civil</option>
                    <option value="Technologie de la mecanique du bâtiment">Technologie de la mecanique du bâtiment</option>
                    <option value="Techniques de genie mecanique">Techniques de genie mecanique</option>
                    <option value="Technologie de la mecanique industrielle">Technologie de la mecanique industrielle</option>
                    <option value="Technologie du genie electrique">Technologie du genie electrique</option>
                    <option value="Technologie du genie metallurgique">Technologie du genie metallurgique</option>
                    <option value="Techniques policieres">Techniques policieres</option>
                    <option value="Techniques d'education à l'enfance">Techniques d'education à l'enfance</option>
                    <option value="Techniques de travail social">Techniques de travail social</option>
                    <option value="Techniques de la documentation">Techniques de la documentation</option>
                    <option value="Techniques administratives">Techniques administratives</option>
                    <option value="Techniques de l'informatique">Techniques de l'informatique</option>
                    <option value="Techniques de design d'interieur">Techniques de design d'interieur</option>
                    </select> <br>
                   <p style="color:red;"><?php echo $departementErreur; ?></p>
                   
                   <input name="idEntreprise" type="hidden" id="idEntreprise" value="<?php echo $row["idEntreprise"]?>"/>
                   
    
             
                   <button type="submit" class="btn btn-primary ">Soumettre</button>
                </form>
                </div>
                </div>
                </div>
                </div>
            </div>
            <?php
          }
        } else {
          echo "0 results";
        }
    }else{
        header("Location:usager.php");
      }
    
        $conn->close();
        
            
        ?>
      
        <?php
        
        

        function trojan($data){
            $data = trim($data); //Enleve les caracteres invisibles
            $data = addslashes($data); //Mets des backslashs devant les ' et les  "
            $data = htmlspecialchars($data); // Remplace les caracteres speciaux par leurs symboles comme ­< devient &lt
            
            return $data;
        }

    ?>

    
    
  


</div>
</body>
</html>