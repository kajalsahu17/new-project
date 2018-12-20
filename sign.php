<?php
include_once 'dbConnection.php';
ob_start();
$name = $_POST['name'];
$name= ucwords(strtolower($name));
$gender = $_POST['gender'];
$email = $_POST['email'];
$college = $_POST['college'];
$mob = $_POST['mob'];
$password = $_POST['password'];
$name = stripslashes($name);
$name = addslashes($name);
$name = ucwords(strtolower($name));
$gender = stripslashes($gender);
$gender = addslashes($gender);
$email = stripslashes($email);
$email = addslashes($email);
$college = stripslashes($college);
$college = addslashes($college);
$mob = stripslashes($mob);
$mob = addslashes($mob);

$password = stripslashes($password);
$password = addslashes($password);
$password = md5($password);

$q3=mysqli_query($con,"INSERT INTO user(name,gender,college,email,mob) VALUES  ('$name' , '$gender' , '$college','$email' ,'$mob')");
if($q3)
{
header("location:index.php?q8=Student information saved !");
}
else
{
header("location:index.php?q7=Email Already Registered!!!");
}
ob_end_flush();
?>