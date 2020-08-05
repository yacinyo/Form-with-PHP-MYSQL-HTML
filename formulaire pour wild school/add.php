
<?php
$servername = "localhost";
$username = "yassine";
$password = "test1234";
$dbname="mywildschool";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}else { echo "good connexion";}

$name='';
$errors=array('name'=>'');
if (isset($_POST['submit'])){
//checking if the filed is empty:
      if (empty($_POST['name'])){
      $errors['name']="entrez votre nom ";
      }else{
        $name=$_POST['name'];    
        if(!preg_match("/^([a-zA-Z' ]+)$/", $name)){  //name validation
        $errors['name'] ='entrez un nom valide';   
        }
       
    }
    
    if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			//echo 'form is valid';
			
			// escape sql chars
      $name = $_POST['name'];
      
      
     
      $sql1.="CREATE TABLE IF NOT EXISTS Users (
        id int(11) NOT NULL Auto_INCREMENT, name varchar(30) NOT NULL, PRIMARY KEY (id))";
        if (mysqli_query($conn, $sql1)) {
          echo "Table created successfully";
        } else {
          echo "Error creating Table: "; 
        }
			// create sql query
      $sql= "INSERT INTO Users (name) VALUES('$name')";
      $insertion= mysqli_query($conn, $sql);
      
			// save to db and check
			if($insertion){
        // success 
        header('Location: index.php');
        echo "inserted with succes";
				
			} else {
				echo 'query error: '. mysqli_error($conn);
			}


		}

	} // end POST check
   
   
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>
          <img src="https://www.wildcodeschool.com/assets/logo_main-e4f3f744c8e717f1b7df3858dce55a86c63d4766d5d9a7f454250145f097c2fe.png" alt="Wild Code School logo" />
          Les Argonautes
        </h1>
      </header>
      
      <!-- Main section -->
      <main>
        
        <!-- New member form -->
        <h2>Ajouter un(e) Argonaute</h2>
        <form class="new-member-form" actin="add.php"  method="POST">
          <label for="name">Nom de l&apos;Argonaute</label>
          <input id="name"  name="name" type="text" value="<?php echo $name?>"
           placeholder="Charalampos" />
          <div class="printerrors"><?php echo $errors['name']; ?></div>

          <button type="submit" name="submit">Envoyer</button>
        </form>
        
        <!-- Member list -->
        <h2>Membres de l'équipage</h2>
        <section class="member-list">
          <div class="member-item">Eleftheria</div>
          <div class="member-item">Gennadios</div>
          <div class="member-item">Lysimachos</div>
        </section>
      </main>
      
      <footer>
        <p>Réalisé par Jason en Anthestérion de l\'an 515 avant JC</p>
      </footer>
    
</body>
</html>


