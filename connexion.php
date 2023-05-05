<?php
  $con = mysqli_connect("localhost","root","","gestion_stock");
  if(!$con){
     echo "Vous n'êtes pas connecté à la base de donnée";
  }
?>