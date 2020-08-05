


      
      
      
      
<?php
$servername = "localhost";
$username = "yassine";
$password = "test1234";
$dbname="myWildschool";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


/*$sql1="CREATE TABLE IF NOT EXISTS lesargonautes (
  id int(11) NOT NULL, name varchar(30) NOT NULL)";
  if (mysqli_query($conn, $sql1)) {
    echo "Table created successfully";
  } else {
    echo "Error creating Table: "; 
  }*/
  
  //écrire une requette pour tous les argonotes
 
  $sql= 'SELECT name, id FROM Users';
  if (mysqli_query($conn, $sql)) {
    echo "séléction établie";
  } else {
    echo "error selecting: "; 
  }
 

 //stocker le résultat de la requette  dans une variable $result
  $result=mysqli_query($conn, $sql);

  if (mysqli_query($conn, $sql)) {
    echo "result etabli";
  } else {
    echo "error seting result:"; 
  }

 //récuperer les résultat sous forme de lignes d'un array

 $Users=mysqli_fetch_all($result,MYSQLI_ASSOC);
//  print_r($Users);

 
 //retirer $result dela mémoire (bonne pratique)
 	mysqli_free_result($result);

 //fermer la connexion
  mysqli_close($conn);
  
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fc338e43d0.js"></script>
    <link rel="stylesheet" href="style.css">
    
<body>
  
    <body>
        <header>
            <h1>
              <img src="https://www.wildcodeschool.com/assets/logo_main-e4f3f744c8e717f1b7df3858dce55a86c63d4766d5d9a7f454250145f097c2fe.png" alt="Wild Code School logo" />
              Les Argonautes
            </h1>
         </header>
           
        <main>
         <div class="container-fluid">
          <div class="row">
          <?php foreach ($Users as $user):?>
           <div class="col-md-6 col-lg-6">  
           <h6><?php echo ($user['name']);?></h6>
           </div>
             <?php endforeach; ?> 
          </div>

           

         </div>
            



               
        </main>
      

        <footer>
        <p>Réalisé par Jason en Anthestérion de l\'an 515 avant JC</p>
      </footer>




