<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "projet");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['Ajouter'])) {
  	// Get image name
  	$image = $_FILES['profile']['name'];
  	// Get text
  	
      $nom = $_POST['nom'];
      $email = $_POST['email'];
      $pass = $_POST['password'];

  	// image file directory
  	$target = "usersImage/".basename($image);

  	$sql = "INSERT INTO users (profileImage,Nom,email,passwordUser) VALUES ('$image', '$nom','$email','$pass')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['profile']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <link rel="stylesheet" href="style4.css">
    <title>Document</title>
</head>
<body>
    <div class="formulaire">
        
        <form method="post" action ="index1.php" enctype="multipart/form-data">
        <input type="hidden" name="size" value="1000000">
        <div class="image">
            <input type="file" name="profile" id="profile" onchange=displayImage(this) style=" display:none ;">
            <img src="plusss.png" id="profileDisplay" onclick=triggerClick() alt="">
            </div>
            <div class="text_field">
                <input type="text" placeholder="Nom"  name="nom" id="nom"  required>
            </div>
            <div class="text_field">
                <input type="text" placeholder="E-mail" name="email" id="email" required>
            </div>
            <div class="text_field">
                <input type="password"placeholder="Mot de passe" name="password" id="password" required>
            </div>
            <div class="submit">
            <input type="submit" name="Ajouter" value="Ajouter"></div>
        </form>
         </div>
    
    
    <div class="content">
    <?php
        while ($row = mysqli_fetch_array($result)) {
          echo "<div id='img_div'>";
              echo "<img src='usersImage/".$row['profileImage']."' >";
              echo "<div id='text_div'>";
              echo "<p>".$row['Nom']."</p>";
              echo "<p>".$row['email']."</p>";
              echo "</div>";
          echo "</div>";
        }
      ?>
    </div>
    </div>
    
</body>
<script src="script.js"></script>
</html>