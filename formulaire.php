<?php
$msg="";
$css_class="";
$db= mysqli_connect("localhost","root","","projet");

if(isset($_POST["Ajouter"])){
   
    $nom =$_POST["nom"];
    $email =$_POST["email"];
    $pass =$_POST["password"];

    $target ="images/".basename($_FILES["profile"]["name"]);
    $sql ="INSERT INTO users (profileImage,Nom,email,passwordUser) VALUES ("$_FILES["profile"]["name"]","$nom","$email" ,"$pass")";
  

}


?>