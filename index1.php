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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>PROJET</title>
    <style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap');

   
</style>
</head>
<body>
<div class="content">
      <input type="radio" name="slider" checked id="para">
      <input type="radio" name="slider" id="util">
      <input type="radio" name="slider" id="info">
      <input type="radio" name="slider" id="decon">
      <input type="radio" name="slider" id="about">
      <div class="list">
        <label for="para" class="para">
            <i class="fas fa-sliders-h"></i>
        <span class="title">para</span>
      </label>
      <label for="util" class="util">
        <span class="icon"><i class="fas fa-users"></i></span>
        <span class="title">util</span>
      </label>
      <label for="info" class="info">
        <span class="icon"><i class="fas fa-info-circle"></i></span>
        <span class="title">info</span>
      </label>
      <label for="decon" class="decon">
        <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
        <span class="title">decon</span>
      </label>
      
      <div class="slider"></div>
    </div>
      <div class="text-content">
       
<div class="para text">
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
<div class="util text">
          <div class="title">util Content</div>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias tempora, unde reprehenderit incidunt excepturi blanditiis ullam dignissimos provident quam? Fugit, enim! Architecto ad officiis dignissimos ex quae iusto amet pariatur, ea eius aut velit, tempora magnam hic autem maiores unde corrupti tenetur delectus! Voluptatum praesentium labore consectetur ea qui illum illo distinctio, sunt, ipsam rerum optio quibusdam cum a? Aut facilis non fuga molestiae voluptatem omnis reprehenderit, dignissimos commodi repellat sapiente natus ipsam, ipsa distinctio. Ducimus repudiandae fuga aliquid, numquam.</p>
        </div>
        <div class="info text">
          <div class="title">info Content</div>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores error neque, officia excepturi dolores quis dolor, architecto iusto deleniti a soluta nostrum. Fuga reiciendis beatae, dicta voluptatem, vitae eligendi maxime accusamus. Amet totam aut odio velit cumque autem neque sequi provident mollitia, nisi sunt maiores facilis debitis in officiis asperiores saepe quo soluta laudantium ad non quisquam! Repellendus culpa necessitatibus aliquam quod mollitia perspiciatis ducimus doloribus perferendis autem, omnis, impedit, veniam qui dolorem? Ipsam nihil assumenda, sit ratione blanditiis eius aliquam libero iusto, dolorum aut perferendis modi laboriosam sint dolor.</p>
          
        </div>
        <div class="decon text">
         
          <iframe src="index.php" frameborder="1"></iframe>
        </div>

    
</div>
</div>
</body>
<script src="script.js"></script>
</html>