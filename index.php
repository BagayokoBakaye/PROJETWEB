<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "image_upload");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM images");
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<link rel="stylesheet" href="style7.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<style type="text/css">
   
   
</style>
</head>
<body>
<div class="wrapper">
        <div class="sidebar">
           
            <div  class="g1">
               <a href="index5.php"> <button id="button" onclick="showhide()" style=" background-color: rgb(82, 197, 82); color:white;width: 115px;
                border: rgb(82, 197, 82); margin-left: 6px;"><i class="fas fa-sliders-h" style="font-size: 40px;"></i></button></a>
                <div id="newpost"  class="hidden" style="margin-top: 5px; color:white; font-size:15px;">
                    <h3>Store</h3>
                </div>  
            </div>
                <div  class="g1">
                    <button id="button" onclick="showhide1()" style=" background-color: rgb(82, 197, 82); color:white;width: 115px;
                    border: rgb(82, 197, 82); margin-left: 7px;"><i class="fa-solid fa-users" style="font-size: 40px;"></i></button>
                    <div id="newpost1"  class="hidden1" style="margin-top: 5px; color:white; font-size:15px;">
                        <h3>Utilisateurs</h3>
                    </div>  
                </div>
                <div  class="g1">
                    <button id="button" onclick="showhide2()" style=" background-color: rgb(82, 197, 82); color:white;width: 115px;
                    border:#4d9754; rgb(82, 197, 82); margin-left: 7px;"><i class="fa-solid fa-circle-info" style="font-size: 40px;"></i></button>
                    <div id="newpost2"  class="hidden2" style="margin-top: 5px; color:white; font-size:15px;">
                        <h3>Logs</h3>
                    </div>  
                </div>
                <div  class="g1">
                    <button id="button" onclick="showhide3()" style=" background-color: rgb(82, 197, 82); color:white;width: 115px;
                    border: rgb(82, 197, 82); margin-left: 8px;"><i class="fa-solid fa-right-from-bracket" style="font-size: 40px;"></i></button>
                    <div id="newpost3"  class="hidden3" style="margin-top: 5px; color:white; font-size:15px;">
                        <h3>Deconnexion</h3>
                    </div>  
                </div>

               
              
             
        </div>
        
        
         
    
    
         <div id="content3">
  
  <form method="POST" action="index.php" enctype="multipart/form-data" name ="formulaire">
  	<input type="hidden" name="size" value="1000000">
  	<div id="ajout">
      <input type="file" name="profile" id="profile"  style=" display:none ;">
        <img src="plusss.png" id="profileDisplay" onclick=triggerClick() alt="">
  	</div>
    <div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="image_text" 
      	placeholder="Say something about this image..."></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  	
  </form>
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='imgagede'>";
      echo "<div id='img_divde'>";
      echo "<img src='images/".$row['location']."' >";
      echo "</div>";
      echo "<p>".$row['image_text']."</p>";
      echo "</div>";
      
    }
  ?>
</div>
    
           
    </div>
    </div>
    
    

    <script src="script.js"></script>

</body>

</html>
