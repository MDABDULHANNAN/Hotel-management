<?php
include "includes/db_connect.inc.php";

session_start();
$uPass = $uEmail = $message = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	if(!empty($_POST['email'])){
		$uEmail = mysqli_real_escape_string($conn, $_POST['email']);
	}
	if(!empty($_POST['u_pass'])){
		$uPass = mysqli_real_escape_string($conn, $_POST['u_pass']);
	}

	$sqlUserCheck = "SELECT email, password FROM users WHERE email = '$uEmail'";
	$result = mysqli_query($conn, $sqlUserCheck);
	$rowCount = mysqli_num_rows($result);

	if($rowCount < 1){
		$message = "User does not exist!";
	}
	else{
		while($row = mysqli_fetch_assoc($result)){
			$uPassInDB = $row['password'];

			if($uPass == $uPassInDB){
				$_SESSION['useremail'] = $uEmail;
				header("Location: reservation.php");
			}
			else{
				$message = "Wrong Password!";
			}
		}
	}
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>logIn-Page</title>
	<link rel="stylesheet" href="login.css">
</head>
<body>

	<div class="loginbox">
		<img src="user.jpg" alt="loginpic" class="userlogo">
		<h1>Login here..</h1>
		<form action="login.php" method="post">
			<label for="email">Email:</label>
			<input type="text" name="email" placeholder="Enter email">
			<label for="u_pass">Password:</label>
			<input type="Password" name="u_pass" placeholder="Enter Password">
			<a href="reservation.php"><input type="submit" name="" value="Login">
			<span style="color:red"><?php echo $message; ?></span>
			<br>
			<a href="#">Lost Your Password?</a></br>
			<a href="registration.php">Don't Have an Account?</a></br>

		</form>
	</div>

</body>
</html>