<?php
  include_once "connexion.php";
  $id= $_GET['id'];
  $req = mysqli_query($con , "DELETE FROM stock WHERE id = $id");
  header("Location:index.php")
?>