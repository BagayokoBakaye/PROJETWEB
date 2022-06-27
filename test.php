<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "image_upload");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  
  if (isset($_POST['submit'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_name = mysqli_real_escape_string($db, $_POST['image_name']);
     
      $image_text = mysqli_real_escape_string($db, $_POST['image_text']);
      $image_prices = mysqli_real_escape_string($db, $_POST['image_prices']);
      $image_number = mysqli_real_escape_string($db, $_POST['image_number']);
      

  	// image file directory
  	$image_location = "images/".basename($image);

  	$sql = "INSERT INTO images (name, location,text,prices,number,image) VALUES ('$image_name','$image_location','$image_text','$image_prices', '$image_number','$image')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $image_location)) {
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
<style type="text/css">
    .wrapper{
  display: flex;
  position: relative;
  
}

.wrapper .sidebar{
  width: 200px;
  height: 100%;
  background-color: rgb(82, 197, 82);
  padding: 30px 0px;
  position: fixed;
  text-align: center;
}



.hidden{
    display : none;
    padding: 15px;
    border-bottom: 1px solid #bdb8d7;
    border-bottom: 1px solid rgba(0,0,0,0.05);
    border-top: 1px solid rgba(255,255,255,0.05);
    color: white;
    text-align: center;
    font-size:14px;
    margin-top: 10px;
}
.hidden1{
    display : none;
    padding: 15px;
    border-bottom: 1px solid #bdb8d7;
    border-bottom: 1px solid rgba(0,0,0,0.05);
    border-top: 1px solid rgba(255,255,255,0.05);
    color: white;
    text-align: center;
    font-size:14px;
    margin-top: 10px;
}
.hidden2{
    display : none;
    padding: 15px;
    border-bottom: 1px solid #bdb8d7;
    border-bottom: 1px solid rgba(0,0,0,0.05);
    border-top: 1px solid rgba(255,255,255,0.05);
    color: white;
    text-align: center;
    font-size:14px;
    margin-top: 10px;
}
.hidden3{
    display : none;
    padding: 15px;
    border-bottom: 1px solid #bdb8d7;
    border-bottom: 1px solid rgba(0,0,0,0.05);
    border-top: 1px solid rgba(255,255,255,0.05);
    color: white;
    text-align: center;
    font-size:14px;
    margin-top: 10px;
}

.wrapper .sidebar .g1{
    padding: 15px;
    border-bottom: 1px solid #bdb8d7;
    border-bottom: 1px solid rgba(0,0,0,0.05);
    border-top: 1px solid rgba(255,255,255,0.05);
    color: white;
  }    
  
  .wrapper .sidebar .g1 a{
    color: #bdb8d7;
    display: block;
  }
  
  .wrapper .sidebar .g1 a .fa{
    display: block;
    position: relative;
    padding: 10px 50px 20px;
    color: white;
   

  }
   button:hover{
    transform: scale(1.2);
  }

  

  .wrapper .sidebar .g1:hover{
    background-color:  rgb(82, 197, 82);
    
  }
      
  .wrapper .sidebar .g1:hover a{
    color: #fff;
  }
   #content{
    width: 100%;
 height: auto;
 display: flex;
 
 flex-flow : wrap;
 margin-left: 250px;
 padding:5px;
   }
   form{
    width: 100%;
    height: 100%;
 background-color:gray;
 border-radius:5px;
 display:block;
 
   }
   .ajouter{
    width: 100%;
    height: 100%;
    position: absolute;
 background-color:green;
 border-radius:5px;

 
   }
   
  
   .ajoutform{
    position: relative;
    width: 350px;
    height: 300px;

   }
   .ajoutform:hover >.ajouter{
    display: none;
   }
   
   #img_div{
    width: 100%;
 height: 100%;
    padding: 5px;
 border-radius:5px;
 display: block;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   
   
    width: 350px;
    height: 300px;
    border-radius: 5px;
   }
   #content3{
    width: 100%;
 height: auto;
 display: flex;
 flex-flow : wrap;
 margin-left: 250px;
}





#img_divde:after{
    content: "";
    display: block;
    clear: both;
 float: left;
}
#img_divde img{
    width: 100%;
    height: 300px;
    border-radius: 5px;
}
#ajout img {
 width: 70px;
height: 70px;
 margin: 35%;
}
textarea{
    margin-left:10px;
    border-radius:5px;
    border:none;
    decoration:none;
    
}
input[type="file"]{
    margin-left:10px;
    margin-top:5px;
}

#accept{
    height: 25px;
    width: 25px;
    border-radius:50%;
}
#text3{
   float: left;
}
#text4{
   float: right;
}
.priceNumber{
    margin-right:10px;
}
#upload{
    height:35px;
    width: 35px;
    border-radius:50%;
    margin-left:93%;
    margin-top:-15px;
}

#accept:hover{
    transform:scale(1.3)
}
textarea:hover{
    background-color:rgb(82, 197, 82);
  
}
#soumettre{
   
   
    margin-left:90%;
    margin-top:-15px;
   
    
}
#imagede{
    position: relative;
    width: 350px;
    height: 300px;
    margin: 20px;
   
    
}


#img_divde{
    width: 100%;
    height: 100%;
 background-color:gray;
 border-radius:5px;
 display:block;
 position: relative;
}
#img_textde{
 width: 100%;
 height: 100%;
 position:absolute;
 background-color: rgba(0 0 0 0.6);
 color:white;
 font-size:20px;
 display:flex;
 
 
}

    

   
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
<div id="content">
    <div class="ajoutform">
        <div class="ajouter">
 <img src="plusss.png" style="height: 30%; width:30%; margin:30% ;horizontal-align:middle" alt="">
        </div>
  
<form method="POST" action="test.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">

  	<div>
      <div class="soume">
  		
         
          <input type="submit" name="submit" id="submit" >
  	</div>
      <textarea 
      	id="text1" 
      	cols="40" 
      	rows="1" 
      	name="image_name" 
      	placeholder="Name here" required></textarea>
          <textarea 
      	id="text2" 
      	cols="15" 
      	rows="1" 
      	name="image_location" 
      	placeholder="Location" required></textarea>
      <textarea 
      	id="text3" 
      	cols="40" 
      	rows="8" 
      	name="image_text" 
      	placeholder="Description here" required></textarea>
          <div>
  	  <input type="file" name="image">
  	</div>
    <div class="priceNumber">
          <textarea 
      	id="text4" 
      	cols="18" 
      	rows="1" 
      	name="image_number" 
      	placeholder="Number of copies" required ></textarea>
          <textarea 
      	id="text2" 
      	cols="18" 
      	rows="1" 
      	name="image_prices" 
      	placeholder="Prices"></textarea>
          </div>
  	</div>
  	
  </form>
  </div>
  
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='imagede'>";
      echo "<div id='img_divde'><img src='images/".$row['image']."' ></div>";
      echo "<div id='img_textde'>";

      echo "<div class='name'>".$row['name']."</div>";
      echo "<div class='description'>".$row['text']."</div>";
      echo "<div class='price'>".$row['prices']."</div>";
      echo "<div class='number'>".$row['number']."</div>";
      echo "</div>";
      echo "</div>";
      
      
    }
  ?>
  </div>
</div>
</div>
</div>

</body>
<script src="script.js"></script>
</html>