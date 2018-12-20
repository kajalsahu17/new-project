<?php
$connection =	mysqli_connect('localhost' , 'root' ,'' ,'kajal');




if(isset($_POST['email'])){
	
	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$college = $_POST['college'];
	$email = $_POST['email'];
	$mob = $_POST['mob'];
	$id = $_POST['id'];

	//  query to update data 
	 
	$result  = mysqli_query($connection , "UPDATE user SET name='$name' , gender='$gender' , college = '$college' , email = '$email' mob = '$mob' WHERE id='$id'");
	if($result){
		echo 'data updated';
	}

}
?>