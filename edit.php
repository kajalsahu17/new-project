<?php
session_start();
$questionID = "";

$db = mysqli_connect('localhost', 'root', '', 'kajal');
    if (isset($_GET['id'])) 
    {
      $email = $_GET['id'];
      $query    = "UPDATE user WHERE email = '$email'" ;
      $result   = mysqli_query($db, $query);
      $check    = mysqli_fetch_array($result);
      if(isset($check))
      {
        header('location: index.php');
      }
      else
      {
         header('location: index.php');
      }
    }
session_destroy();
    
?>
