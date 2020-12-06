<?php 
require_once("index.php");

if(isset($_REQUEST['id'])){
    
    $id   = $_REQUEST['id'];
    $qur = "DELETE FROM `users` WHERE id= '$id'";
     mysqli_query($con, $qur);
    header('location: index.php');
}


?>