<?php

  include "includes/db_connect.inc.php";

  $fName = $lName = $uPass = $uEmail = $err = $uEmailInDB = "" ;
	
	
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(!empty($_POST['first_name'])){
      $fName = mysqli_real_escape_string($conn, $_POST['first_name']);
    }
    if(!empty($_POST['last_name'])){
      $lName = mysqli_real_escape_string($conn, $_POST['last_name']);
    }
	if(!empty($_POST['email'])){
      $uEmail = mysqli_real_escape_string($conn, $_POST['email']);
    }
    if(!empty($_POST['user_pass'])){
      $uPass = mysqli_real_escape_string($conn, $_POST['user_pass']);
      
    }
   

    $sqlUserCheck = "SELECT email FROM users WHERE email = '$uEmail'";
    $result = mysqli_query($conn, $sqlUserCheck);
	$rowCount = mysqli_num_rows($result);
    
    if($rowCount>0){
      $err = "UserEmail already exists!";
    }
    else{
      $sql = "INSERT INTO users (first_name, last_name, email, password)
              VALUES ('$fName','$lName','$uEmail','$uPass');";

      mysqli_query($conn, $sql);
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Rest Inn Hotel</title>
	<link rel="stylesheet" href="registration.css">
	
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="CSS/font-awesome.css">
</head>
<body>

<div class="home-header">
 	
 	<div class="mid">
 		<div class="home-name">
 			<h1><span>Rest Inn</span> <span>Hotel</span></h1>
 			<h4>Your Dream Hotel</h4>
 		</div>
 		<div class="menu">
 		<ul>
 			<li><a href="home.php">Home</a></li>
 			<li><a href="about.php">About</a></li>
 			<li><a href="team.php">Team</a></li>
 			<li><a href="gallery.php">Gallery</a></li>
 			<li><a href="room.php">Rooms</a></li>
 			<li><a href="contact us.php">Contact us</a></li>
 			<li><a href="login.php">Login</a></li>
 		</ul>
 		</div>

 	</div>

 </div>

	<div class="loginbox">
		<img src="user.jpg" alt="loginpic" class="userlogo">
		<h1>Registration here..</h1>
		<form action="registration.php" method="post">
			<label for="first_name">First Name:</label>
			<input type="text" name="first_name" placeholder="Enter Firstname">
			<label for="last_name">Last Name:</label>
			<input type="text" name="last_name" placeholder="Enter Lastname">
			<label for="email">Email:</label>
			<input type="text" name="email" placeholder="Enter email">
			<label for="user_pass">Password:</label>
			<input type="Password" name="user_pass" placeholder="Enter Password">
			<input type="submit" name="button" value="Registration">
			<span style="color:red;"><?php echo $err; ?></span>
			<span style="color:red;"><b>Or Log In <a href="login.php">here</a></b></span>
			

		</form>
	</div>

</body>
</html>