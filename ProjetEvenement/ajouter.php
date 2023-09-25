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
    <title>Ajouter une entreprise</title>
</head>
<body class="h-100" id="bg">

    <?php
     if(isset($_SESSION["connexion"]))
     {
 
        $nom = $desc = $lieu = $date= $departement= "";
        $nomErreur = $descErreur = $lieuErreur =$dateErreur=$departementErreur = "";
     
       
        $erreur = false;
      
        if($_SERVER['REQUEST_METHOD']== 'POST')
        {



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
                if($erreur == false)
                {
                    $servername = "localhost";
                    $username = "root";
                    $password = "root";
                    $dbname = "evenement";
                    // Create connection
                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                    // Check connection
                    if (!$conn) {
                      die("Connection failed: " . mysqli_connect_error());
                    }
                    $sql = "INSERT INTO entreprise (idEntreprise,nom , description,contentEtu,neutreEtu,mecontentEtu,contentEmp,neutreEmp,mecontentEmp ,lieu, date, departement)
                    VALUES (NULL, '$nom','$desc', 0, 0, 0,0,0,0 ,'$lieu', '$date','$departement')";
                    if (mysqli_query($conn, $sql)) {
                      echo "Enregistrement réussi";
                    } else {
                      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    mysqli_close($conn);
                    
                }
        
        }
            
                 
        ?>
       
            <div class="container-fluid h-100" id="bg" >
            <div  class="row h-100   text-center" >
                    <div class="col-2">
            <img src="img/logo.jpg" id="logo"/>
            </div>
            <div class="row text-center">
            <div class="col-12 ">
            <a href="index.php" class="btn btn-primary text-center" id="retour">retour à la page principale</a>
            </div>
            <div class="col-12">
                    <h1>Veuillez remplir le formulaire pour ajouter une entreprise</h1>
                    <form action="ajouter.php" method="post">

<div class="form-group ">
  <div>
  <label> Nom de l'entreprise : </label>
  </div>
 <input type="text" placeholder="Nom..." name="nom" class="form-control " maxLength="50" value="<?php echo $nom ?>"><br>
    <p style="color:red;"><?php echo $nomErreur; ?></p>
 </div>


    <div>
    <label>Description de l'entreprise :</label> 
    </div>
    <input type="text" placeholder="Description..."  class="form-control " name="description" value="<?php echo $desc ?>"><br>
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
    <option value="Mathématiques">Mathématiques</option>
    <option value="Éducation physique">Éducation physique</option>
    <option value="Physique">Physique</option>
    <option value="Géo, Histoire et Sciences politiques">Géo, Histoire et Sciences politiques</option>
    <option value="Philosophie">Philosophie</option>
    <option value=" Psychologie"> Psychologie</option>
    <option value="Sciences sociales">Sciences sociales</option>
    <option value="Arts visuels">Arts visuels</option>
    <option value="Musique">Musique</option>
    <option value="Littérature et communication">Littérature et communication</option>
    <option value="Langues">Langues</option>
    <option value="Techniques d'hygiène dentaire">Techniques d'hygiène dentaire</option>
    <option value="Techniques de diététique">Techniques de diététique</option>
    <option value=" Techniques de soins infirmiers"> Techniques de soins infirmiers</option>
    <option value="Technologie de l'architecture">Technologie de l'architecture</option>
    <option value="Technologie du génie civil">Technologie du génie civil</option>
    <option value="Technologie de la mécanique du bâtiment">Technologie de la mécanique du bâtiment</option>
    <option value="Techniques de génie mécanique">Techniques de génie mécanique</option>
    <option value="Technologie de la mécanique industrielle">Technologie de la mécanique industrielle</option>
    <option value="Technologie du génie électrique">Technologie du génie électrique</option>
    <option value="Technologie du génie métallurgique">Technologie du génie métallurgique</option>
    <option value="Techniques policières">Techniques policières</option>
    <option value="Techniques d'éducation à l'enfance">Techniques d'éducation à l'enfance</option>
    <option value="Techniques de travail social">Techniques de travail social</option>
    <option value="Techniques de la documentation">Techniques de la documentation</option>
    <option value="Techniques administratives">Techniques administratives</option>
    <option value="Techniques de l'informatique">Techniques de l'informatique</option>
    <option value="Techniques de design d'intérieur">Techniques de design d'intérieur</option>
    </select> <br>
   <p style="color:red;"><?php echo $departementErreur; ?></p>
   
  
   


   <button type="submit" class="btn btn-primary ">Soumettre</button>
</form>
                </div>
                </div>
                </div>
                </div>
            </div>
        
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